<!- 
     Class : T.Y.BSc. Sem-5			
     Sem:  Div : A
     Subject Name: PHP
     PC No: SRKI_054
     Faculty Name: Priti Mam
     Enrollment Number: E17111920310101
     Roll_No: SRKI_54
     Student Name : Utkarsh Patil
     Assignment/Problem: 4/Q1
     Date: 04/September/2019
     Assignment Aim: Learn to work with Database CRUD operation in PHP.
-->


<html>
    <head>
        <meta charset="UTF-8">
        <title>Login By Utkarsh</title>
    </head>
    <body>
        <form method="post">
            Email ID  : <input type="text" name="EmpEmail" /><br/><br/>
            Password  : <input type="text" name="EmpPass" /><br/><br/>
            <input type="submit" name="submit" value="login"/>
        </form>
        <?php
            session_start();
            require_once 'Connection.php';
            
            if(isset($_POST['submit']))
            {
                $email=$_POST['EmpEmail'];
                $pass=$_POST['EmpPass'];
                $q="select * from EmpProfile where EmpEmail = '$email' and EmpPasswd='$pass' " or die(mysqli_error);
                $r= mysqli_query($con, $q);
                $row= mysqli_fetch_row($r);
               
                if($email==$row[1])
                {                    
                    echo $row[0];
                    echo $row[1];
                   
                    header('location:Welcome.php');
                    $_SESSION['EID']=$row[1];
                   
                }
                else 
                {
                    echo "Please check your usename and passeword. <br/>";
                }
            }
        ?>
    </body>
</html>


<?php

$host="localhost";
$username="root";
$password="";
$db="EmpInfo";

$con= mysqli_connect($host, $username, $password, $db);

if($con)
{
    echo "Connecterd <br/>";
}
else
{
    echo "Not Connected </br/>";
}
?>


<?php
    session_start();
    echo "Welcome".' '.$_SESSION['EID'];
?>


