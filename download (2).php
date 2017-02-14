<?php

$contest=$_GET['name'];
echo $contest;
    if(isset($_GET['id'])) {

        $file_name= ($_GET['id']);

    if($file_name == NULL) {
        die('The name is invalid!');
    }
    else {

        $conn = mysqli_connect("localhost","id466665_contests2016","csclub2016","id466665_contests");
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ".mysqli_connect_error());
        }

        $query = "
            SELECT `type`, `name`, `size`, `content`
            FROM `Contests`
            WHERE ContestName='$contest'";
        $result = $conn->query($query);

        if($result) {

            if($result->num_rows == 1) {
            
                $row = mysqli_fetch_assoc($result);

                header("Content-Type: ".$row['type']);
                header("Content-Length: ".$row['size']);
                header("Content-Disposition: attachment"); 
         
               
                echo $row['content'];
            }
            else {
                echo 'Error! No file exists with that ID.';
            }

            @mysqli_free_result($result);
        }
        else {

            echo "Error! Query failed: <pre>{$conn->error}</pre>";
        }

        @mysqli_close($conn);
    }
}
	?>