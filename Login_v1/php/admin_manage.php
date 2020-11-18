<?php
    $conn = mysqli_connect('localhost', 'root', '', 'test') or die ('Can not connect!');
    $query = mysqli_query($conn, 'SELECT * FROM account');

    $result = array();
    if (mysqli_num_rows($query) > 0)
    {
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            $result[] = array(
                'id' => $row['id'],
                'username' => $row['username'],
                'pass' => $row['password'],
                'email' => $row['email'],
                'avatar' => $row['avatar']
            );
        }
    }
    echo json_encode($result);
?>