<?php 
    include "partials/_dbconnect.php";
    if(isset($_GET['id'])) {
        $del = $_GET['id'];
        $sql = "DELETE FROM student WHERE id = '$del'";
        $result = mysqli_query($conn, $sql);
        header("Location: home.php");
    }
?>