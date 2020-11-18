<?php
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    if (!empty($_FILES['file'])) {
        $filetype = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
        $type = $filetype[(count($filetype) - 1)]; //lấy ra đuôi file
        // Kiểm tra xem có phải file ảnh không
        if ($type === 'jpg' || $type === 'png' || $type === 'gif' || $type === 'jpeg') {
            // tiến hành upload
            move_uploaded_file($_FILES['file']['tmp_name'], '../images/' . $_FILES['file']['name']);
        } else { // nếu không phải file ảnh
            die('Chỉ được upload ảnh'); // in ra thông báo
        }
    } 

    $avatar = $_FILES['file']['name'];

    $conn = mysqli_connect('localhost','root','','test') or die('Lỗi kết nối!');
    $query = mysqli_query($conn, "UPDATE `account` SET `email` = '$email' WHERE username = '$username'");
    $query = mysqli_query($conn, "UPDATE `account` SET `password` = '$pass' WHERE username = '$username'");
    $query = mysqli_query($conn, "UPDATE `account` SET `avatar` = '$avatar' WHERE username = '$username'");

    die ('success');
?>