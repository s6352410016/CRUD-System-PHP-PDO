<?php 

    include('server.php');

    if(isset($_GET['id'])){
        $userid = $_GET['id'];
        $sql = $conn->query("DELETE FROM userdata WHERE id = $userid");
        $sql->execute();
        
        if($sql){
            header('location: index.php');
        }
    }

?>