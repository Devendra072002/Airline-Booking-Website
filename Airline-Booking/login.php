<?php
session_start();
?>
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
            <a href="flights.php" >&nbsp;&nbsp;FLIGHT&nbsp;</a>
            <a href="home.html" >&nbsp;|&nbsp;HOME&nbsp;</a>
            
            
        </nav>
    </body>
</html>
<!DOCTYPE html>
<html>   
<head>
        <title>login page</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Proza+Libre&display=swap" rel="stylesheet">
        <style>
            body{
                background-image: url("airplane.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }
            input{
                padding: 9px;
                font-weight: bold;
                font-style:italic;
                border:3px solid blue;
                background-color: crimson;
                color:white;
                width: 190px;
                border-radius: 7px;
            }
            button{
                font-weight: bold;
                font-style:italic;
                width: 200px;
                height: 50px;
                border: 4px solid blue;
                border-radius: 15px;
                font-size: larger;
                background-color: crimson;
                color:white;

            }
            div{
                padding:20px;
                margin-top:120px;
                border: 5px solid red;
                margin-left: 650px;
                margin-right: 170px;
                padding-bottom: 25px;
                border-radius: 200px;
                background-color: aquamarine;
            }
            label{
                font-weight: bolder;
                font-style:italic;
                font-size: 150%;
                color:red;
            }
            ::placeholder{
                color:white;
            }
            button:hover{
                color:gold;
                background-color: indigo;
            }
            a:hover{
                color:gold;
                background-color: indigo;
            }
            a{
                text-decoration: none;
                font-weight: bold;
                font-style:italic;
                font-size: 100%;
        
                color:white;
            }
            
        </style>
    </head>
    <body style="text-align:center">
        <div width=70px >
        <form action="onewaytrip.php" method="POST">
            <span><h1 style="text-align:center; font-weight:bolder; font-style: italic; font-size: 230%; color:red; font-family: 'Roboto Slab', serif; ">---LOGIN---</h1></span><br><br>
            <label>USERNAME :</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="reg_id" placeholder="ENTER YOUR REG_ID" required="required"><br><br><br>

            <label>PASSWORD :</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="password" name="pwd" placeholder="ENTER YOUR PASSWORD" required="required"><br><br><br><br>
            <button name="submit" value="login" style="margin-bottom: 3px;">LOGIN</button><br>
            <button value="new user" style="margin-top: 3px; "><a href="signup.php">NEW USER</a></button>
        </form> 
    </div>   
    </body>
</html>
<?php
if(isset($_SESSION['msg'])){ 
echo '<font color=orange size=6 align=center>'.$_SESSION['msg'].'</font><br>';
echo "<font color=red size=7 align=center>If not registered, then <a href=signup.php>REGISTER</a></font>" ; 
unset($_SESSION['msg']);
} 
?>