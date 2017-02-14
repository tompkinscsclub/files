<?php
 $conn = mysqli_connect("localhost","id466665_contests2016","csclub2016","id466665_contests");


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


$query = "INSERT INTO test (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

if ($conn->query($query) === TRUE) {
             echo "New contest created successfully!";
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }


echo "<br>File $fileName uploaded<br>";
} 
 
?>