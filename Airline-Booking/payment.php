 
<html>
    <head>
        <title>ABOUT US</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Akronim&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@1,700&display=swap" rel="stylesheet">
    <style>
        body{
            margin:0px;
            background-image: url("last.jpg");
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
        <div>
            
                <h2 >PLEASE PROVIDE PASSENGER DETAILS</h2>
                <br><br><br>
                
                    <form action="ticket.php" method="POST">
                        
                        <h2>MAKE PAYMENT </h2>
                        <h2>&#34;&nbsp;PAY THE  AMOUNT GIVEN BELOW&nbsp;&#34;</h2> 
 
<?php
                        session_start();
                        if(isset($_SESSION['reg_id'])){ 
                        if($_POST['submit']== "book"){
                                //require('menu.php');
                                $reg_id=$_SESSION['reg_id'];
                                $count=$_SESSION['count'];
                                $flight_id=$_POST['flight_id'];
                                $_SESSION['flight_id']=$flight_id;
                                $link = mysqli_connect('localhost', 'root', '', 'airline'); 
                                if(!$link){ 
                                    die('Failed to connect to server'); 
                                    } 
                            $query="select * from flight where flight_id='$flight_id' ";
                            
                            $result=mysqli_query($link,$query);
                            if(!mysqli_num_rows($result)){
                                $_SESSION['msg']="No flight exists corresponding to your flight_id!!";
                            header('location: onewaytrip.php');
                             exit();
                            }
                            if($result == FALSE) 
                        echo mysqli_error($link) . '<br>'; 
                        else {
                            $row=mysqli_fetch_array($result);
                            if($row['capacity']<$count){
                                $_SESSION['msg']="no of seats you want are more than the available!!";
                            header('location: onewaytrip.php');
                             exit();
                            }
                            $total_cost=$row['fare'] * $count;
                            echo '<font color=red size=5>'.$total_cost.'</font><br>' ;
                        }
                        }
                        }
                        else{
                            $_SESSION['msg']="Seems that you are not logged in, first log in!!";
        header('location: login.php');
        exit();
                        }
                        ?>
          <button name="submit" value="MAKE PAYMENT">MAKE PAYMENT</button>
                    </form> 
               

        </div>
    </body>
</html> 
