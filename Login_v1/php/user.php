<?php
    $username = $_POST['username'];
    $conn = mysqli_connect('localhost', 'root', '', 'test') or die ('Can not connect!');
    $query = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username'");

    if(mysqli_num_rows($query) > 0)
    {
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            $result[] = array(
                'id' => $row['id'],
                'username' => $row['username'],
                'avatar' => $row['avatar'],
                'email' => $row['email'],
                'admin' => $row['admin']
            );
        }
    }
    die(json_encode($result));
?>