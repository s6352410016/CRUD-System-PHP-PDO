<?php
    include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Information</title>
</head>
<body>
    
    <div class="container">
        <h1 class="mt-5">Information</h1>
        <a href="create.php" class="btn btn-primary">Insert</a>
        <br><br>
        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phonenumber</th>
                <th>Register date</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php
                    $sql = $conn->query("SELECT * FROM userdata");
                    $sql->execute();
                    while($data = $sql->fetch()){
                ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['fname']; ?></td>
                    <td><?php echo $data['lname']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['phonenumber']; ?></td>
                    <td><?php echo $data['regdate']; ?></td>
                    <td><a href="update.php?id=<?php echo $data['id']; ?>" class="btn btn-success">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>