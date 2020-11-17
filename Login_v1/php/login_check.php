<?php
    // Lấy thông tin username và email
    $username = isset($_POST['username']) ? $_POST['username'] : false;
    $pass = isset($_POST['pass']) ? $_POST['pass'] : false;
    
    // Nếu cả hai thông tin username và pass đều không có thì dừng, thông báo lỗi
    if (!$username && !$pass){
        die ('Chưa nhập đủ thông tin');
    }
    
    // Kết nối database
    $conn = mysqli_connect('localhost', 'root', '', 'test') or die ('{error:"bad_request"}');
    
    // Kiểm tra tên đăng nhập
    if ($username)
    {
        $query = mysqli_query($conn, 'SELECT * FROM account WHERE username = "'.$username.'" AND password = "'.$pass.'"');
    
        if (mysqli_num_rows($query) > 0){
            die('success!');
        }
        else{
            die ('Sai thông tin tài khoản');
        }
    }

?>