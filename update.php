<?php 
    include "partials/_dbconnect.php";
    if(isset($_POST["submit"])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $last = $_POST['last'];
        $course = $_POST['course'];
        $date = $_POST['date'];
        $sql = "UPDATE student SET sname = '$name', last_name = '$last', dob = '$date', course = '$course' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql) or die("Query Failed");
        header("Location: home.php");
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>CRUD | UPDATE</title>
</head>

<body>
    <?php include "partials/header.php"; ?>

    <div class="container my-4">
        <h2 class="text-danger">UPDATE STUDENT RECORD</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="my-4">
        <?php 
            include "partials/_dbconnect.php";
            if(isset($_GET['data'])) {
                $data = $_GET['data'];
                $sql = "SELECT * FROM student WHERE id='$data'";
                $result = mysqli_query($conn, $sql) or die("Query Failed");
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $dob = $row['dob'];
        ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">NAME</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="id" hidden placeholder="Name" value="<?php echo $row['id']; ?>">
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Name" value="<?php echo $row['sname']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="last" class="col-sm-2 col-form-label">LAST NAME</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="last" id="last" required placeholder="Last Name" value="<?php echo $row['last_name']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="course" class="col-sm-2 col-form-label">COURSES</label>
                <div class="col-sm-10">
                    <!-- <option>Choose...</option> -->
                    <?php
                        echo '<select id="course" class="form-control" name="course" required>';
                        $sl = "SELECT * FROM exam";
                        $risk = mysqli_query($conn, $sl);
                        while($row1 = mysqli_fetch_assoc($risk)) {
                            if($row['course'] == $row1['cid']) {
                                $selected = "selected";
                            }
                            else {
                                $selected = "";
                            }
                            
                            echo '<option '.$selected.' value="'.$row1['cid'].'">'.$row1['gradution'].'</option>';
                        }
                        echo "</select>";
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">DATE OF BIRTH</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="date" id="date" required value="<?php echo $dob; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <button name="submit" class="btn btn-outline-success">CREATE</button>
                </div>
            </div>
            <?php 
                    }
                }
            }
            ?>
        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>