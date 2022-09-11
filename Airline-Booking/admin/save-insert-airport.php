<?php
include 'session.php';
include 'dbconnect.php';
if (isset($_POST['submit'])) {
    $query = "INSERT INTO source (source_id,source_name) VALUES ( '{$_POST["airid"]}','{$_POST["airname"]}')";
    $result = mysqli_query($conn, $query) or die("Query Failed : " . mysqli_error(($conn)));
    if ($result) {
        $query1 = "INSERT INTO destination (destination_id,destination_name) VALUES ( '{$_POST["airid"]}',
     '{$_POST["airname"]}')";
        $result1 = mysqli_query($conn, $query1) or die("Query Failed : " . mysqli_error(($conn)));
        if ($result1) {

            header("location:Adminairport.php");
        }
    }
}
