<?php
include 'session.php';
include 'dbconnect.php';
if (isset($_POST['submit'])) {
    $query = "UPDATE source SET 
    source_name='{$_POST["airname"]}'
    WHERE source_id='{$_POST["airid"]}'";
    echo $query;
    $result = mysqli_query($conn, $query) or die("Query Failed : " . mysqli_error(($conn)));
    if ($result) {
        $query1 = "UPDATE destination SET 
        destination_name='{$_POST["airname"]}'
        WHERE destination_id='{$_POST["airid"]}'";
        echo $query1;
        $result1 = mysqli_query($conn, $query1) or die("Query Failed : " . mysqli_error(($conn)));
        if ($result1) {
            header("location:Adminairport.php");
        }
    }
}
