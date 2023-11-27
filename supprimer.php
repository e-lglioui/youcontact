<?php

require('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM contact WHERE id=$id");
    header('Location: contact.php');
    exit();
} else {
    header('Location: contact.php');
    exit();
}
?>
