<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>CRUD | HOME</title>
</head>

<body>
    <?php include "partials/header.php"; ?>
    <?php include "partials/_dbconnect.php"; ?>

    <div class="container my-4">
    <h1 class="text-center text-danger">STUDENT RECORD</h1>
        <table class="table table-striped my-4">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">NAME</th>
                    <th scope="col">LAST NAME</th>
                    <th scope="col">DATE OF BIRTH</th>
                    <th scope="col">COURSE</th>
                    <th scope="col">TIME</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <?php
                $sql = "SELECT * FROM student JOIN exam WHERE student.course = exam.cid";
                $result = mysqli_query($conn, $sql) or die("Query Failed");
                if(mysqli_num_rows($result) > 0) {
            ?> 
            <tbody class="py-0 my-0">
            <?php 
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['sname']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['gradution']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $row['id']; ?>"><img src="button1.jpg" height="35px" width="35px"></a>
                        <a href="update.php?data=<?php echo $row['id']; ?> " class="btn btn-outline-danger text-dark">Update</a>
                    </td>
                </tr>
            <?php 
                }
            ?>
            </tbody>
        </table>
    <?php 
        }    
    ?>
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