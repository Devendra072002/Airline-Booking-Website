<link rel="stylesheet" type="text/css" href="styled-table.css" />
  <style>
            body{
                margin:0;
                
                background-repeat: no-repeat;
                background-size: cover;
            }
            h2,h3{
                margin-left: 12%;
                text-align: center;                     
                font-size: 220%;
                font-weight: bolder;
                font-style: italic;
                color:white;
            }
            div{
                border: 5px solid white;
                border-radius: 25px;
                padding: 20px;
                margin-left: 30%;
                margin-right: 18%;
                padding-left: 30px;
                padding-right: 40px;
            }
            ::placeholder{
                color:crimson;
                font-style: italic;
                font-size: larger;
                font-weight: bolder;
                font-family: 'Roboto Slab', serif;
            }
            input{
                padding-top: 11px;
                padding-bottom: 11px;
                padding-left: 11px;
                width: 100%;
                font-style: italic;
                border-radius: 15px;
                font-weight: bolder;
                font-family: 'Roboto Slab', serif;
                color:crimson;
                font-style: italic;
            }
            label{
                font-size: 170%;
                color:white;
                font-style: italic;
            }
            h2,h3,label,input,button{
                font-family: 'Roboto Slab', serif;
            }
            button{
                font-size: 170%;
                color:white;
                font-style: italic;
                padding: 10px 20px;
                background-color: rgb(18, 202, 18);
                border: none;
                border-radius: 15px;
                margin-top: 34px;
                margin-left: 25%;
            }
            button:hover{
                background-color: aqua;
                color:crimson;
                font-weight: bolder;
            }
            span{
            background-color: aqua;
            padding: 8px;
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
        </style>
    </head>
    <body>
        <nav>
            <a href="home.html" >&nbsp<span>HOME&nbsp;</span></a>
            <a href="flights.php" >&nbsp;<span>FLIGHT&nbsp;</span></a>
            <a href="cancel_ticket.php" >&nbsp;<span>CANCEL TICKET&nbsp;</span></a>
            <a href="logout.php" >&nbsp;<span>LOG OUT&nbsp;</span></a>
        </nav>

<?php
session_start();
if(isset($_SESSION['reg_id'])){ 
if($_POST['submit']== "search flights oneway"){
        //require('menu.php');
        $reg_id=$_SESSION['reg_id'];
        $source_id=$_POST['source_id'];
        $destination_id=$_POST['destination_id'];
        $depart_date=$_POST['depart_date'];
                       $arrival_date=$_POST['arrival_date'];            
        $adult=$_POST['adult'];
        $children=$_POST['children'];
        $count=$adult+$children;
        $link = mysqli_connect('localhost', 'root', '', 'airline'); 
        if(!$link){ 
            die('Failed to connect to server'); 
            } 
    $query="select * from flight where source_id='$source_id' 
    and destination_id='$destination_id' and depart_date='$depart_date' and arrival_date='$arrival_date' ";
    $result=mysqli_query($link,$query);
    if(!mysqli_num_rows($result)){
        $_SESSION['msg']="No flight is available between 
        the source and the destination which you have opted for!!";
        header('location: onewaytrip.php');
        exit();
    }
    if($result == FALSE) 
echo mysqli_error($link) . '<br>'; 
else {
    $count1=0;
    while($row=mysqli_fetch_array($result)){ 
    if($row['capacity']>= $count){
        break;
    }
    else $count1++;
    if($count1==mysqli_num_rows($result)){
        $_SESSION['msg']="no of seats you want are more than the available!!";
                            header('location: onewaytrip.php');
                             exit();
    }
}
        $_SESSION['count']=$count;
        $query="select flight_id,flight_name,source_name,destination_name,
        arrival_time,departure_time,arrival_date,depart_date,fare,capacity
        from flight,source,destination where flight.source_id='$source_id' 
        and flight.destination_id='$destination_id' and depart_date='$depart_date' 
        and flight.source_id=source.source_id and flight.destination_id=destination.destination_id";    
    $result=mysqli_query($link,$query) or die("Error:".mysqli_error($link)); 
echo 'FLIGHTS...<br><table border="1">
<tr><td>flight_id</td><td>flight_name</td><td>source_name</td>
<td>destination_name</td><td>arrival_time</td><td>departure_time
</td><td>arrival_date</td><td>depart_date</td><td>fare per person</td><td>capacity</td></tr>';
while($row=mysqli_fetch_array($result)){
echo 
'<tr><td>'.$row['flight_id'].'</td><td>'.$row['flight_name'].'</td><td>'.$row['source_name'].'</td>
<td>'.$row['destination_name'].'</td><td>'.date("h:i A", strtotime($row['arrival_time'])).'</td><td>'.date("h:i A", strtotime($row['departure_time'])).
'</td><td>'.$row['arrival_date'].'</td><td>'.$row['depart_date'].'</td><td>'.$row['fare'].'</td><td>'.$row['capacity'].'</td></tr>';
}
echo '</table>';
}
}
}
else{
    $_SESSION['msg']="Seems that you are not logged in, first log in!!";
        header('location: login.php');
        exit();
}
?>
</link>
<html>
<body>
<center>
<h1>Choose a Flight Id from above</h1>
<form action="payment.php" method="post"> 
<table cellpadding = "10"> 
<tr>     
<td>Enter flight id*</td> 
<td><input type="text" name="flight_id" maxlength="15" required="required"></td> 
</tr> 
<tr ><td colspan=2><input type="submit" name="submit" value="book" /></td></tr>
</table> 
</form> 
</center> 
</body> 
</html>