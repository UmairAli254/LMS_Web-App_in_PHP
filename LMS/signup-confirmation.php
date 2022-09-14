<?php
    session_start();
    
//Receive data via Ajax
    $json = file_get_contents("php://input");
    $data = json_decode($json);
        
    //Build Connection with a server/database :)
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
   
    $query = "select * from sign_form where email = '{$data->email}'";
    $qr = mysqli_query($con, $query);
    $rows = mysqli_num_rows($qr);

    if($rows > 0):
        echo "This email is already registered, Login to your account.";
    elseif($data->pass !== $data->conf_pass):
        echo "Password dosen't matched, please enter the same password";
    else:
        $query = "insert into sign_form(username, email, pass, c_pass) values ('{$data->username}', '{$data->email}', '{$data->pass}', '{$data->conf_pass}')";
        echo "Form is successfully submitted!";
        
        mysqli_query($con, $query);
        mysqli_close($con);
    endif;