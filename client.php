<?php
$host = "127.0.0.1";
$port = 80811;


if(isset($_POST['submit']) && $_POST['msg'] != ""){
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Not Created !");
    socket_connect($socket, $host, $port) or die('socket not connected ');
    $msg = $_POST['msg'];
    socket_write($socket, $msg, strlen($msg));

    $reply = socket_read($socket, 1024);
    $reply = trim($reply);
    echo $reply;

    socket_close($socket);
}

?>


<form  method="post">
    <input type="text" name="msg"><br>
    <input type="submit" name="submit">
</form>

