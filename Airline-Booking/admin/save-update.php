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
    $query = "UPDATE flight SET 
    flight_name='{$_POST["fname"]}',
    source_id='{$s_id}',
    destination_id='{$dest_id}',
    arrival_time='{$_POST["arr"]}',
    departure_time='{$_POST["dept"]}',
    depart_date='{$_POST["deptdate"]}',
    arrival_date='{$_POST["arrdate"]}',
    fare='{$_POST["fare"]}',
    capacity='{$_POST["seat"]}'
    WHERE flight_id='{$_POST["fid"]}'";
    $result = mysqli_query($conn, $query) or die("Query Failed : " . mysqli_error(($conn)));
    if ($result) {
        header("location:Adminhome.php");
    } else {
        echo "Error";
    }
}
