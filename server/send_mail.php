<?php
require_once './class_db.php';
require_once './class_main.php';
require_once './db.php';
$main=new class_main();
$template_array=$main->get_template();
if(count($template_array)>0){
	foreach($template_array as $template_row){
		$id_user_array=$main->search_users($template_row['table_name'],$template_row['cell_name'],$template_row['day'],$template_row['year']);
		if(count($id_user_array)>0){
			foreach($id_user_array as $id_user_row){
				echo $main->send_mail($id_user_row['userid'],$template_row['text_mail']);
			}
			unset($id_user_row);
		}
		unset($id_user_array);
	}
	unset($template_row);
}
unset($template_array,$db);
?>