<?php

    include('server.php');

    if(isset($_POST['insert'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];

        $sql = $conn->prepare("INSERT INTO userdata(fname , lname , email , phonenumber) VALUES(:fname , :lname , :email , :phonenumber)");
        $sql->bindParam(":fname" , $fname);
        $sql->bindParam(":lname" , $lname);
        $sql->bindParam(":email" , $email);
        $sql->bindParam(":phonenumber" , $phonenumber);
        $sql->execute();

        if($sql){
            echo "<script>alert('Insert success');</script>";
            header("location: index.php");
        }else{
            echo "<script>alert('Failed to insert');</script>";
            header("location: create.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <h1 class="mt-5">Insert</h1>
        <a href="index.php" class="btn btn-danger">Back</a>
        <br><br>
        <form method="post">
            <div class="mb-3">
                <label for="fname" class="form-label">Firstname</label>
                <input type="text" class="form-control" name="fname" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Lastname</label>
                <input type="text" class="form-control" name="lname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phonenumber</label>
                <input type="text" class="form-control" name="phonenumber" required>
            </div>
            <button type="submit" class="btn btn-primary" name="insert">Insert</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>