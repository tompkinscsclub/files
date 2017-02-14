<?php
session_start();
$name=$_SESSION["userna"];
session_destroy();
session_start();
$_SESSION["usernam"]=$name;

$conn = mysqli_connect("localhost","id466665_contests2016","csclub2016","id466665_contests");
$fooderchoice = $_POST['foodchoice'];
$school = $_POST['school'];
$memberone = $_POST['one'];
$membertwo = $_POST['two'];
$memberthree = $_POST['three'];
if ($conn) 
{
$result =mysqli_query($conn,"UPDATE UserInfo SET FoodChoice='$fooderchoice'  WHERE Username = '$name' ");
$resulttwo =mysqli_query($conn,"UPDATE UserInfo SET School='$school'  WHERE Username = '$name' ");
$resultthree =mysqli_query($conn,"UPDATE UserInfo SET MemberOne='$memberone'  WHERE Username = '$name' ");
$resultfour =mysqli_query($conn,"UPDATE UserInfo SET MemberTwo='$membertwo'  WHERE Username = '$name' ");
$resultfive =mysqli_query($conn,"UPDATE UserInfo SET MemberThree='$memberthree'  WHERE Username = '$name' ");
$resultfive =mysqli_query($conn,"UPDATE UserInfo SET InfoSet=1  WHERE Username = '$name' ");
echo "Your information has been updated! Please close this tab and reopen it!";
}


?>