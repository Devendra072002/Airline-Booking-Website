       
<html>
    <head>
        <title>HOME</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Akronim&display=swap" rel="stylesheet">
    <style>
        body{
            margin:0px;
        }
        header{
            background-color: saddlebrown ;
            border: 1px solid saddlebrown;
            border-radius: 15px;
            color:white;
            font-weight: bolder;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
            box-sizing: border-box;
            font-size: 200%;
            font-style: italic;
        }
        a{
            text-decoration: none;
            color:white;
            font-weight: bolder;
            font-style: italic;
            font-size: 140%;
            font-family: 'Roboto Slab', serif;
        }
        a:hover{
            color:black;
            font-size: 140%;
        }
        nav{
            background-color:crimson;
            padding-top:10px;
            padding-bottom:10px;
            padding-left: 10px;
            box-sizing: border-box;
            border: 1px solid crimson;
            border-radius: 15px;
        }
        table{
            border: 1px solid white;
            border-radius: 20px;
        }
    </style>
    </head>
    
    <body>
        <nav>
            <a href="home.html" >&nbsp;HOME&nbsp;</a>
            <a href="about.html" >&nbsp;|&nbsp;ABOUT US&nbsp;</a>
            <a href="login.php" style="margin-left: 750px;" >&nbsp;LOGIN</a>
            <a href="signup.php" >&nbsp;|&nbsp;&nbsp;NEW USER</a>
        </nav>
    </body>
</html>
           
<link rel="stylesheet" type="text/css" href="styled-table.css" />

<?php
$link = mysqli_connect('localhost', 'root', '', 'airline'); 
if(!$link){ 
die('Failed to connect to server'); 
} 
$query="select flight_name,source_name,destination_name,
    depart_date,departure_time,arrival_date,arrival_time
    from flight,source,destination 
    where flight.source_id=source.source_id and
    flight.destination_id=destination.destination_id";
    $result=mysqli_query($link,$query);
if($result == FALSE) 
echo mysqli_error($link) . '<br>'; 
else { 
echo '<br>DETAILS OF ALL FLIGHTS!!<br>
<table ><thead>
<tr><th>flight name</th><th>source_name</th><th>destination_name</th>
<th>depart_date</th><th>departure_time</th><th>arrival_date</th><th>arrival_time</th></tr></thead><tbody>';
while($row=mysqli_fetch_array($result)){
echo 
'<tr><td>'.$row['flight_name'].'</td><td>'.$row['source_name'].'</td><td>'
.$row['destination_name'].'</td><td>'.$row['depart_date'].'</td><td>'
.date("h:i A", strtotime($row['departure_time'])).'</td><td>'.$row['arrival_date'].
'</td><td>'.date("h:i A", strtotime($row['arrival_time'])).'</td></tr>';
}
echo '</tbody></table>';
}
?>