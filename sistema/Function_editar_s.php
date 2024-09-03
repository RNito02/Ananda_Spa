<?php
function db_query($query) {
    $connection = mysqli_connect("localhost","root","","ananda_spa");
    $result = mysqli_query($connection,$query);

    return $result; 
}

function edit($tblname,$form_data,$field_ID,$ID){
	$sql = "UPDATE ".$tblname." SET ";
	$data = array();

	foreach($form_data as $column=>$value){

		$data[] =$column."="."'".$value."'";

	}
	$sql .= implode(',',$data);
	$sql.=" where ".$field_ID." = ".$ID."";
	return db_query($sql); 
}


function select_id($tblname,$field_name,$field_ID){
	$sql = "Select * from ".$tblname." where ".$field_name." = ".$field_ID."";
	$db=db_query($sql);
	$GLOBALS['row'] = mysqli_fetch_object($db);
	return $sql;
}
?>