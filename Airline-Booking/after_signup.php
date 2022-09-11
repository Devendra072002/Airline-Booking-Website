<?php
if($_POST['submit']== "signup"){
        $reg_id=$_POST['reg_id'];
        $pwd=$_POST['pwd'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $contact=$_POST['contact'];
        $link = mysqli_connect('localhost', 'root', '', 'airline'); 
        if(!$link){ 
            die('Failed to connect to server'); 
            } 
     
    $query="insert into user values ('$reg_id','$pwd','$fname','$lname','$email','$address','$contact')";
    $result=mysqli_query($link,$query);
if($result == FALSE) 
echo mysqli_error($link) . '<br>'; 
else { 
    $_SESSION['msg']="Registered successfully,Now you can login!!";
    header('location: login.php');
    exit();
    }

}
?>
