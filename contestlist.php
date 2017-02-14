<!DOCTYPE html>
<html>
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
<li><a href="#">STUFF</a></li>
<li><a href="#">STUFF</a></li>
<li class="dropdown">
<a href="javascript:void(0)" class="dropbtn">CONTEST</a>
<div class="dropdown-content">
<a href="createcontest.html">CREATE CONTEST</a>
<a href="contestlist.php">CONTEST LIST</a>
<a href="#">CONTEST STUFF</a>
</div>
</li>
</ul>
<center>
<p>Contest List</p>
</center>
<?php
echo "hello";
$conn = mysqli_connect("localhost","id466665_contests2016","csclub2016","id466665_contests");

if($conn)
{
     $sql = "SELECT ContestName FROM Contests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "Contest Name: " . $row["ContestName"]"<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
}
?>

</body>
</html>