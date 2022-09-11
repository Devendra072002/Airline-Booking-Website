 
    <style>
        body{
            margin:0px;
            //background-image: url("last.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        span{
            background-color: tomato;
            padding: 8px;
            border: 1px solid tomato;
            border-radius: 20px;
        }
        nav{
            margin-top: 30px;
            padding-top:10px;
            padding-bottom:10px;
            padding-left: 10px;
            box-sizing: border-box;
        }
        a{
            text-decoration: none;
            color:blueviolet;
            font-weight: bolder;
            font-style: italic;
            font-size: 140%;
            font-family: 'Roboto Slab', serif;
        }
        a:hover{
            color:black;
            font-size: 140%;
        }
       
       div{
           margin-top: 40px;
           margin-left: 50%;
           margin-right: 2%;
           background-image: url("best.jpg");
           background-size: cover;
           background-repeat: no-repeat;
           text-align: center;
           padding-top: 10px;
           padding-bottom: 10px;
           padding-left: 20px;
           padding-right: 20px;
           box-sizing: border-box;
           border: 8px solid rgb(250, 83, 111);
           border-radius: 20px;
           font-family: 'Roboto Slab', serif;
       }
       h2{
           color:#68f83d;
           font-weight: bolder;
           font-size: 200%;
           font-style: italic;
           font-family: 'Noto Sans', sans-serif;
       }
       input,textarea{
                padding: 9px;
                font-weight: bold;
                font-style:italic;
                border:3px solid blue;
                
                background-color: white;
                color:rgb(250, 83, 111);
                width: 100%;
                box-sizing: border-box;
                border-radius: 7px;
                font-size: larger;
       }
       ::placeholder{
                color:rgb(250, 83, 111);
        }
        button{
                font-weight: bold;
                font-style:italic;
                width: 200px;
                height: 50px;
                border: 4px solid blue;
                border-radius: 15px;
                font-size: larger;
                background-color: aqua;
                color:rgb(250, 83, 111);
         }
         button:hover{
             background-color: blue;
         }
    </style>
    </head>
    
    <body>
        <nav>
            <a href="home.html" >&nbsp<span>HOME&nbsp;</span></a>
            <a href="flights.php" >&nbsp;<span>FLIGHT&nbsp;</span></a>
            <a href="logout.php" >&nbsp;<span>LOG OUT&nbsp;</span></a>
        </nav>
<link rel="stylesheet" type="text/css" href="styled-table.css" />

<?php
session_start();
if(isset($_SESSION['reg_id'])&& isset($_SESSION['flight_id'])&& isset($_SESSION['count'])){ 
if($_POST['submit']== "MAKE PAYMENT"){
        //require('menu.php');
        $reg_id=$_SESSION['reg_id'];
        $flight_id=$_SESSION['flight_id'];
        $count=$_SESSION['count'];
        $link = mysqli_connect('localhost', 'root', '', 'airline'); 
        if(!$link){ 
            die('Failed to connect to server'); 
            } 
    
    $query="insert into ticket (reg_id,flight_id,count) values ('$reg_id','$flight_id','$count')";
    $result=mysqli_query($link,$query) or die("error:".mysqli_error($link));
    $query="select reg_id,ticket_id,count,flight_name,source_name,destination_name,
    depart_date,departure_time,arrival_date,arrival_time
    from ticket,flight,source,destination where reg_id='$reg_id' and ticket.flight_id='$flight_id'
    and ticket.flight_id=flight.flight_id and flight.source_id=source.source_id and
    flight.destination_id=destination.destination_id";
    $result=mysqli_query($link,$query);
if($result == FALSE) 
echo mysqli_error($link) . '<br>'; 
else { 
echo 'TICKET BOOKED BY YOU !!<br><table ><thead>
<tr><th>reg_id</th><th>ticket_id</th><th>count</th><th>flight_name</th><th>source_name</th><th>destination_name</th>
<th>depart_date</th><th>departure_time</th><th>arrival_date</th><th>arrival_time</th></tr></thead><tbody>';
while($row=mysqli_fetch_array($result)){
echo 
'<tr><td>'.$row['reg_id'].'</td><td>'.$row['ticket_id'].'</td><td>'.
$row['count'].'</td><td>'.$row['flight_name'].'</td><td>'.$row['source_name'].'</td><td>'
.$row['destination_name'].'</td><td>'.$row['depart_date'].'</td><td>'
.date("h:i A", strtotime($row['departure_time'])).'</td><td>'.$row['arrival_date'].
'</td><td>'.date("h:i A", strtotime($row['arrival_time'])).'</td></tr>';
}
echo '</tbody></table>';
$query="update flight set capacity=capacity-'$count' where flight_id='$flight_id'";
$result=mysqli_query($link,$query) or die("Error is:".mysqli_error($link));

    }

}
}
else{
    $_SESSION['msg']="Seems that you are not logged in, first log in!!";
        header('location: login.php');
        exit();
}
?>