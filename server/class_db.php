<?php
/************************************************************
*															*
*	Класс для работы с БД									*
*	В конструктор передаём данные:							*
*	- ip сервера ($server)									*
*	- название БД ($db)										*
*	- имя пользователя ($user)								*
*	- пароль ($password)									*
*															*
*	Создание объекта класса:								*
*	$db=new class_db($server,$db,$user,$password);			*
*															*
*	Уничтожение класса:										*
*	unset($db);												*
*															*
*	Методы:													*
*	-select_query											*
*	-amount_row												*
*	-insert_query											*
*	-update_query											*
*	-last_insert_id											*
*	-error													*
*															*
*															*
************************************************************/

class class_db{

	private $connect;	//Переменная где хранится информация о подключении к БД
	private $result;	//Переменная с результатом выполненого запроса через метод select_query

	//Конструктор
	public function __construct($server,$db,$user,$password){
		$this->connect=new mysqli($server,$user,$password,$db);	//Подключаемся
		!$this->connect->connect_errno ? $this->connect->set_charset('UTF8') : $this->error($this->connect->connect_errno);	//Если всё нормально, то задаём кодировку, если нет, то выводим ошибку.
	}

	//Метод выполнения запроса с select'ом
	public function select_query($query){
		$this->connect->real_query($query);				//Выполняем запрос
		if(!$this->connect->errno){
			$this->result=$this->connect->use_result();	//Готовим к выводу
			//return $this->result->fetch_all();			//Возвращаем массив с данными из выполненого запроса
			$array_all=array();
			while($row=$this->result->fetch_assoc()){
				$array_all[]=$row;
			}
			$this->result->free();
			return $array_all;
		}
		else{
			$this->error($this->connect->errno);		//Выводим ошибку, если запрос некорректный
		}
	}

	//Метод для получения количества записей в запросе
	public function amount_row($query){
		$this->result=$this->connect->query($query);
		$amount_row=$this->result->num_rows;
		$this->result->free();
		return $amount_row;
	}

	//Метод для вставки записи в БД
	public function insert_query($query){
		$this->connect->real_query($query);				//Выполняем запрос
		if($this->connect->errno){
			$this->error($this->connect->errno);		//Выводим ошибку, если запрос некорректный
		}
	}

	//Метод для обновления записи в БД
	public function update_query($query){
		$this->insert_query($query);					//Используем для обновления метод insert_query, если нужно, то можно переделать
	}

	//Метод для удаления записи в БД
	public function delete_query($query){
		$this->insert_query($query);					//Используем для удаления метод insert_query, если нужно, то можно переделать
	}

	//Метод для получения последнего добавленного id после выполнения метода insert_query
	public function last_insert_id(){
		return $this->connect->insert_id;				//Возвращаем ID последней записи
	}

	//Метод для вывода ошибок
	private function error($error){
		if($error=='2002' || $error=='1049' || $error=='1044' || $error=='1045'){
			trigger_error($error.' #'.$this->connect->connect_error,E_USER_WARNING);		//Эти ошибки связаны с подключением к БД
		}
		else{
			trigger_error($error.' #'.$this->connect->error,E_USER_WARNING);				//Все остальные ошибки связанные с выполнением запросов
		}
		switch($error){
			case '1136':
				echo 'Количество добавляемых столбцов не совпадает с количеством добавляемых значений. Обратитесь к системному администратору.';
			break;
			case '1044':
			case '1045':
				echo 'Доступ к базе данных запрещён. Обратитесь к системному администратору.';
			break;
			case '1049':
				echo 'Нет соединения с базой данных. Обратитесь к системному администратору.';
			break;
			case '1052':
				echo 'Выбираемая колонка не однозначна. Обратитесь к системному администратору.';
			break;
			case '1054':
				echo 'Ошибка в запросе, неизвестное поле. Обратитесь к системному администратору.';
			break;
			case '1064':
				echo 'Ошибка в синтаксисе запроса. Обратитесь к системному администратору.';
			break;
			case '1146':
				echo 'Ошибка в запросе, неизвестная таблица. Обратитесь к системному администратору.';
			break;
			case '2002':
				echo 'Нет соединения с сервером баз данных. Обратитесь к системному администратору.';
			break;
			default:
				echo 'Неизвестная ошибка базы данных. Обратитесь к системному администратору';
			break;
		}
		exit('Дальнейшая работа данной страницы невозможна.');								//Останавливаем выполнение скрипта
	}

	//Деструктор
	public function __destruct(){
		!$this->connect->connect_errno ? $this->connect->close() : false;					//Закрываем соединение с БД при вызове деструктора, если к БД подключились без проблем, иначе ничего не делаем
	}

}
?>