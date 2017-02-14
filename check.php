<?php
session_start();


$conn = mysqli_connect("localhost","id466665_contests2016","csclub2016","id466665_contests");


$username = $_POST['username'];
$password = $_POST['password'];



if("admin"==$username AND "password"==$password)
{

echo 'Username and Password Found'; 
             header('Location: http://othscompetitionhost.000webhostapp.com/admin.html ');
             
             exit;

}
else{
if ($conn) 
{
$result =mysqli_query($conn,"SELECT 1 FROM UserInfo WHERE `Username` = '$username' AND `Password` = '$password' ");

if ($result && mysqli_num_rows($result) > 0)
{
        
             echo 'Username and Password Found'; 
             
             if(!isset($_SESSION['user']))
             {
                      $_SESSION['user'] = $username;
             }
             header('Location: http://othscompetitionhost.000webhostapp.com/user.php ');
            
             exit;
        
}
else
{
    echo 'Username and Password NOT Found';
}}
else
{
    print "Database NOT Found.";
    mysql_close($db_handle);
}}

?>