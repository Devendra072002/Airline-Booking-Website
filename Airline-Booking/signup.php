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
            <a href="home.html" >&nbsp;&nbsp;HOME&nbsp;</a>
            <a href="flights.php" >&nbsp;|&nbsp;FLIGHT&nbsp;</a>
            <a href="login.php" >&nbsp;|&nbsp;LOGIN&nbsp;</a>
        </nav>
    </body>
</html>
<html>   
<head>
        <title>signup page</title>
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
                width: 100%;
                box-sizing: border-box;
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
            button:hover{
                color:gold;
                background-color: indigo;
            }
            div{
                padding:15px;
                margin-top:120px;
                border: 5px solid red;
                margin-left: 710px;
                margin-right: 90px;
                margin-bottom: 50px;
                padding-bottom: 15px;
                border-radius: 100px;
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
            
        </style>
    </head>
    <body style="text-align:center">
        <div width=50px >
        <form action="after_signup.php" method="POST">
            <span><h1 style="text-align:center; font-weight:bolder; font-style: italic; font-size: 230%; color:red; font-family: 'Roboto Slab', serif; ">---CREATE AN ACCOUNT---</h1></span><br><br>
            
            <input type="text" name="reg_id" placeholder="Registration id:" required="required"><br><br><br>

          
            <input type="password" name="pwd" placeholder="PASSWORD:" required="required"><br><br><br>


            <input type="text" name="fname" placeholder="FIRST NAME:" required="required"><br><br><br>

            
            <input type="text" name="lname" placeholder="LAST NAME:" required="required"><br><br><br>

 
            <input type="text" name="email" placeholder="EMAIL ID:"><br><br><br>
            <input type="text" name="address" placeholder="address:"><br><br><br>
            <input type="text" name="contact" placeholder="contact"><br><br><br>
            <button name="submit" value="signup">REGISTER</button>
        </form> 
    </div>   
    </body>
</html>
