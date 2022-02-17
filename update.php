<?php

    include('server.php');

    if(isset($_GET['id'])){
        $userid = $_GET['id'];
        $sql = $conn->query("SELECT * FROM userdata WHERE id = $userid");
        $sql->execute();
        $data = $sql->fetch();

        if(isset($_POST['update'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];

            $update = $conn->prepare("UPDATE userdata SET fname = :fname , lname = :lname , email = :email , phonenumber = :phonenumber WHERE id = $userid");
            $update->bindParam(":fname" , $fname);
            $update->bindParam(":lname" , $lname);
            $update->bindParam(":email" , $email);
            $update->bindParam(":phonenumber" , $phonenumber);
            $update->execute();

            if($update){
                echo "<script>alert('Update success');</script>";
                header("location: index.php"); 
            }else{
                echo "<script>alert('Someting went wrong');</script>";
                header("location: update.php");
            }
        }
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Page</title>
</head>
<body>
    
    <div class="container">
        <h1 class="mt-5">Update</h1>
        <br><br>
        <form method="post">
            <div class="mb-3">
                <label for="fname" class="form-label">Firstname</label>
                <input type="text" class="form-control" name="fname" required value="<?php echo $data['fname']; ?>">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Lastname</label>
                <input type="text" class="form-control" name="lname" required value="<?php echo $data['lname']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required value="<?php echo $data['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phonenumber</label>
                <input type="text" class="form-control" name="phonenumber" required value="<?php echo $data['phonenumber']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>