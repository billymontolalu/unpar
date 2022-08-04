<?php
    include "config.php";
    
    $sql = "SELECT * FROM user WHERE email = '".$_POST["username"]."' AND password = '".$_POST["password"]."'";
    $result = $conn->query($sql);
    $status = "tidak ok";
    $username = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $username = $row["email"];
        }
        $status = "ok";
    }
    $conn->close();
    echo json_encode(array("status" => $status, "username" => $username));
?>