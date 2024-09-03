<?php
function db_query($query) {
    $connection = mysqli_connect("localhost","root","","ananda_spa");
    $result = mysqli_query($connection,$query);

    return $result; 
}




function select_id($tblname,$field_name,$field_ID){
	$sql = "Select * from ".$tblname." where ".$field_name." = ".$field_ID."";
	$db=db_query($sql);
	$GLOBALS['row'] = mysqli_fetch_object($db);
	return $sql;
}
?>