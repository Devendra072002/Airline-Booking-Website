<link rel="stylesheet" type="text/css" href="select.css" />
<?php
session_start();
if(isset($_SESSION['reg_id'])){
    $reg_id=$_SESSION['reg_id'];
    $pwd=$_SESSION['pwd'];
    $link = mysqli_connect('localhost', 'root', '', 'airline'); 
            if(!$link){ 
                die('Failed to connect to server'); 
                } 
        $query="select * from user where reg_id='$reg_id' and pwd='$pwd'";
        $result=mysqli_query($link,$query);
    if($result == FALSE) { 
    echo mysqli_error($link) . '<br>'; 
    }
    echo '<font color=red size=5 >Welcome!! ';
    while($row=mysqli_fetch_array($result)){
    echo 
    $row['f_name'].' '.$row['l_name'].'</font>';
    }
    }
elseif($_POST['submit']== "login" ){
        $reg_id=$_POST['reg_id'];
        $pwd=$_POST['pwd'];
        $link = mysqli_connect('localhost', 'root', '', 'airline'); 
        if(!$link){ 
            die('Failed to connect to server'); 
            } 
    $query="select * from user where reg_id='$reg_id' and pwd='$pwd'";
    $result=mysqli_query($link,$query);
if($result == FALSE) { 
echo mysqli_error($link) . '<br>'; 
}
else {
if(!mysqli_num_rows($result)){
    $_SESSION['msg']="Invalid registration id or password!!";
    header('location: login.php');
    exit();
}
else{

$_SESSION['reg_id'] = $reg_id; 
$_SESSION['pwd'] = $pwd;  
}
echo '<font color=red size=5 >Welcome!! ';
while($row=mysqli_fetch_array($result)){
echo 
$row['f_name'].' '.$row['l_name'].'</font>';
}
}
}

else{
    header("location: login.php");
    exit();
}
?>
<html>
    <head>
        <title>ONEWAYTRIP</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="select.css" />
        <style>
            body{
                margin:0;
                background-image: url("best.jpg");
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
        <h2>BOOK YOUR FLIGHT</h2>
        <h3>ONE WAY TRIP</h3>
        <div>
            <form action="search_flights.php" method=POST>
     <?php
                if(isset($_SESSION['msg'])){ 
                    echo '<font color=orange size=6 align=center>'.$_SESSION['msg'].'</font><br>';
                    unset($_SESSION['msg']);
                    }
                echo ' 
                <label>&nbsp;LEAVING FROM :</label><br><br>';
                $link = mysqli_connect('localhost', 'root', '', 'airline'); 
            if(!$link){ 
            die('Failed to connect to server'); 
            } 
            $query="SELECT source_name,source_id FROM source order by source_name"; 

echo "<select name=source_id >source Name</option>"; // list box select command

foreach ($link->query($query) as $row){//Array or records stored in $row

echo "<option value=$row[source_id]>$row[source_name]</option>"; 

/* Option values are added by looping through the array */ 

}

 echo "</select><br><br><br>";// Closing of list box
                echo '<label>&nbsp;GOING TO :</label><br><br>';
                $query="SELECT destination_name,destination_id FROM destination order by destination_name"; 

echo "<select name=destination_id>destination Name</option>"; // list box select command

foreach ($link->query($query) as $row){//Array or records stored in $row

echo "<option value=$row[destination_id]>$row[destination_name]</option>"; 

/* Option values are added by looping through the array */ 

}
echo "</select><br><br><br>";// Closing of list box

               echo'  <label>&nbsp;DEPART DATE :</label><br><br> ';
                ?>
                <input type="text" name="depart_date" placeholder="ENTER THE LEAVING DATE" required="required" onfocus="(this.type='date')"><br><br><br>
<label>&nbsp;ARRIVAL DATE :</label><br><br>
<input type="text" name="arrival_date" placeholder="ENTER THE ARRIVAL DATE" required="required" onfocus="(this.type='date')"><br><br><br>
                
                <label>ADULT :</label>&nbsp;
                <input type="number" style="width:20%" placeholder="NO. OF ADULTS" required="required" name="adult">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>CHILDREN :</label>&nbsp;
                <input type="number" style="width:20%" placeholder="NO. OF CHILDREN" required="required" name="children">&nbsp;&nbsp;<br>&nbsp;&nbsp;
                <button name="submit" value="search flights oneway">SEARCH FLIGHTS</button>
            </form>
        </div>
    </body>
</html>