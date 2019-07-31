<?php
class class_main{

	public function __construct(){
	}

	public function get_template(){

		global $db;

		$result_array=$db->select_query("
			SELECT
				`table_name`,
				`cell_name`,
				`day`,
				`year`,
				`text_mail`
			FROM
				`template`
		");

		return $result_array;

	}

	public function search_users($table_name,$cell_name,$day,$year){

		global $db;

		$query_more='';
		if($day!=0){
			if($day<0){
				$date_array=getdate(mktime(0, 0, 0, date('m'), date('d') + abs($day), date('Y')));
			}
			else{
				$date_array=getdate(mktime(0, 0, 0, date('m'), date('d') - $day, date('Y')));
			}
			if(mb_strlen($date_array['mon'])==1){
				$date_for_query=$date_array['mday'].'.0'.$date_array['mon'];
			}
			else{
				$date_for_query=$date_array['mday'].'.'.$date_array['mon'];
			}
			$query_more="LEFT(`".$cell_name."`,5)='".$date_for_query."'";
		}
		else{
			$query_more="LEFT(`".$cell_name."`,5)='".date('d.m')."'";
		}
		if(!empty($year)){
			$query_more.=" and RIGHT(`".$cell_name."`,4)+".$year."='".date('Y')."'";
		}
		$result_array=$db->select_query("
			SELECT
				`userid`
			FROM
				`".$table_name."`
			WHERE
				".$query_more."
		");

		return $result_array;

	}

	public function send_mail($id_user,$text_mail){

		$user_info_array=$this->get_user_info($id_user);

		return mail($user_info_array['email'],'Название письма',$text_mail.' '.mt_rand(1,100000000));

	}

	private function get_user_info($id_user){

		global $db;

		$result_array=$db->select_query("
			SELECT
				`email`
			FROM
				`data`
			WHERE
				`userid`='".$id_user."'
		");

		return $result_array[0];

	}

	public function __destruct(){
	}

}
?>