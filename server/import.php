<?php
if(isset($_POST['import'])){
    require_once './class_db.php';
    require_once './db.php';
    $file=fopen($_FILES['file']['tmp_name'],'r');
    while(!feof($file)){
	$str=fgets($file);
	$array=explode(';',$str);
	if(count($array)==14){
	    $db->insert_query("
		    INSERT INTO
			`data`(
			    `userid`,
			    `lastin_rpgu_date`,
			    `count_childs`,
			    `birthdate`,
			    `lastservice_use_frguid`,
			    `lastservice_use_date`,
			    `drivelicence`,
			    `adresschangedate`,
			    `drive_licencechange_date`,
			    `cars_change_date`,
			    `count_cars`,
			    `familyname_change_date`,
			    `telephone`,
			    `email`
			)
			values(
			    '".$array[0]."',
			    '".$array[1]."',
			    '".$array[2]."',
			    '".$array[3]."',
			    '".$array[4]."',
			    '".$array[5]."',
			    '".$array[6]."',
			    '".$array[7]."',
			    '".$array[8]."',
			    '".$array[9]."',
			    '".$array[10]."',
			    '".$array[11]."',
			    '".$array[12]."',
			    '".$array[13]."'
			)
	    ");
	}
    }
    unset($db);
}
echo '<form action="./import.php" method="post" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" name="import">
</form>';
?>