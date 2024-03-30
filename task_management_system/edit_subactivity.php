<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM sub_activity where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
    $$k = $v;
}
include 'add_subactivity.php';
?>


