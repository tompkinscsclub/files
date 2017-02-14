<!DOCTYPE html>
<html>
<head>
<body>

<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #081461;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
	
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #081431;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #081461;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: powderblue;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
	
}

.dropdown-content a:hover {background-color: red}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
  
<body>

<ul>
<li><a href="submit.php">SUBMIT SOLUTION</a></li>
<li><a href="user.php">HOME</a></li>
<li><a href="#">STUFF</a></li>

</ul>

<center>
<?php
session_start();
$name=$_SESSION["user"];
session_destroy();
echo "Hello ".$name."<br>" ;
$cont = explode("-",$name);
$contestname=$cont[0];

$conn = mysqli_connect("localhost","id466665_contests2016","csclub2016","id466665_contests");

session_start();
$_SESSION['userna'] = $name;
$foodselected=true;
if ($conn) 
{
$result =mysqli_query($conn,"SELECT 1 FROM Contests WHERE `ContestName` = '$contestname' ");
if($result)
{
   $sql=mysqli_query($conn,"SELECT FoodOptions FROM Contests WHERE ContestName='$contestname'");
echo "Food Options: ";
$food="";
while ($row = $sql->fetch_assoc()) {
    $food=$food.$row['FoodOptions']."<br>";

}
echo $food;
$sql=mysqli_query($conn,"SELECT NumTeams FROM Contests WHERE ContestName='$contestname'");
echo "Number of Teams: ";
while ($row = $sql->fetch_assoc()) {
    echo "".$row['NumTeams']."<br>";
}
$sql=mysqli_query($conn,"SELECT InfoSet FROM UserInfo WHERE Username='$name'");
$string="";
while ($row = $sql->fetch_assoc()) {
    $string= $string.$row['InfoSet'];
}

if('1'!=$string)
{
   
   $foodselected=false;
}
   




}

}




for ($i = 0; $i < count($cont); $i++) 
{
?>
<input type="radio" name="<?php echo $i; ?>">
<?php echo $cont[$i]?><br>
<?php
}

?>




<td><a href='download.php?name=<?php echo $contestname; ?>&amp;id={$row['name']}'>Download Instructions</a></td>
<form action="foodpicker.php" method="post" id="formnew">
<br><p id="foodPara">Food Choice: </p><input type="text" name="foodchoice" id="foodselect"><br><br>
<p id="schoolPara">School Name:</p> <input type="text" name="school" id="school"><br><br>
<p id="onePara">Member #1: </p><input type="text" name="one" id="one"><br><br>
<p id="twoPara">Member #2: </p><input type="text" name="two" id="two"><br><br>
<p id="threePara">Member #3: </p><input type="text" name="three" id="three"><br><br>
<input type="submit" id="submit">




<script>
var food = <?php echo json_encode($foodselected); ?>;
if(food==false)
{
  document.getElementById('foodselect').type="text";
  document.getElementById('submit').type="submit";
  
}
if(food==true)
{
  document.getElementById('foodPara').style.visibility="hidden";
  document.getElementById('foodselect').type="hidden";
  document.getElementById('school').type="hidden";
  document.getElementById('one').type="hidden";
  document.getElementById('two').type="hidden";
  document.getElementById('three').type="hidden";
  document.getElementById('submit').type="hidden";
  document.getElementById('schoolPara').style.visibility="hidden";
  document.getElementById('onePara').style.visibility="hidden";
  document.getElementById('twoPara').style.visibility="hidden";
  document.getElementById('threePara').style.visibility="hidden";
}

</script>


</center>


</body>
</html>