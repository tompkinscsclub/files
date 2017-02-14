<?php 
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $num = $_POST['numteams'];
        $foodopt = $_POST['foodops'];
	$conn = mysqli_connect("localhost","id466665_contests2016","csclub2016","id466665_contests");
        if($conn == false){
            echo "Connection to database unsuccessful!";
        }
        
        for ($x = 1; $x <= $num; $x++) {
            $username=$name."-".$x;
            $password=rand(10000000,100000000);
            $sql="INSERT INTO `UserInfo` (`Username`, `Password`) VALUES ('',''),       
                     ('".$username."','".$password."')";
            if ($conn->query($sql) === TRUE) {
               
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
        } 

               if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}


$sqlitwo = mysqli_query($conn,"INSERT INTO Contests (ContestName,NumTeams,FoodOptions,HostSchool,name, size, type, content ) ".
"VALUES ('".$name."','".$num."','".$foodopt."','OTHS','".$fileName."', '".$fileSize."', '".$fileType."', '".$content."')");







} 
        }
?>