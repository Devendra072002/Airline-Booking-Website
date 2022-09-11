<?php
include 'session.php';
include 'dbconnect.php';
if (isset($_POST['submit'])) {
    $query2 = "SELECT source_id FROM source WHERE source_name='{$_POST["from"]}'";
    $result2 = mysqli_query($conn, $query2) or die("Query Failed : " . mysqli_error(($conn)));
    $row2 = mysqli_fetch_assoc($result2);
    $s_id = $row2['source_id'];
    $query1 = "SELECT destination_id FROM destination WHERE destination_name='{$_POST["to"]}'";
    $result1 = mysqli_query($conn, $query1) or die("Query Failed : " . mysqli_error(($conn)));
    $row1 = mysqli_fetch_assoc($result1);
    $dest_id = $row1['destination_id'];
    $query = "INSERT INTO flight (flight_id,flight_name,source_id,destination_id,arrival_time,departure_time,fare,capacity,depart_date,arrival_date) VALUES ( '{$_POST["fid"]}','{$_POST["fname"]}','{$s_id}','{$dest_id}','{$_POST["arr"]}',
    '{$_POST["dept"]}','{$_POST["fare"]}','{$_POST["seat"]}','{$_POST["deptdate"]}','{$_POST["arrdate"]}')";
    echo $query;
    $result = mysqli_query($conn, $query) or die("Query Failed : " . mysqli_error(($conn)));
    if ($result) {
        header("location:Adminhome.php");
    } else {
        echo "Error";
    }
}
