<?php
    $email = $_POST['email'];
    $passsword = $_POST['password'];

    $con = new mysqli('localhost','root','','test');
    if ($con->connect_error) {
        die('Failed to connect : '. $con->connect_error);
    }else{
        $stmt = $con->prepare("select * from test where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $passsword){
                echo'<h2>Login Successfully! Welcome!</h2>';
            }
    }else{
        echo"<h2>Invalid Email or password!</h2>";
    }
};
?>