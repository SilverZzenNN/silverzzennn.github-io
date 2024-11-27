<?php
session_start();
session_destroy();
header('Location: edit.php');
exit;
?>
