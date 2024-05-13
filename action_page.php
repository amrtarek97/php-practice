<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    //database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die('Connection failed: '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare('insert into test(name, email, password, number)
            values(?, ?, ?, ?)');
        $stmt->bind_param('sssi', $name, $email, $password, $number);
        $stmt->execute();
        echo'registration successful...';
        $stmt->close();
        $conn->close();
    }
?>