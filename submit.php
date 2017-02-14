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
</center>
</body>
</html>