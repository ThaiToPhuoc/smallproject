<?php
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    //Lưu file
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

    //kết nối mySQL để thêm tài khoản

    $conn = mysqli_connect('localhost','root','','test') or die('Lỗi kết nối!');

    //Kiểm tra username
    if ($username)
    {
        $query = mysqli_query($conn, 'SELECT * FROM account WHERE username = "'.$username.'"');
    
        if (mysqli_num_rows($query) > 0){
            die('Tên đăng nhập đã tồn tại!');
        }
        
    }

    //Kiểm tra email

    if ($email)
    {
        $query = mysqli_query($conn, 'SELECT * FROM account WHERE email = "'.$email.'"');
    
        if (mysqli_num_rows($query) > 0){
            die('Email đã tồn tại!');
        }
    }
    $filename = $_FILES['file']['name'];
    $query = mysqli_query($conn, "INSERT INTO `account` (`username`, `password`, `avatar`, `email`, `admin`) VALUES ('$username', '$pass', '$filename', '$email','0')");
    die('success');
?>