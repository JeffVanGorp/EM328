<?php
session_start();
session_destroy();
header('Location: /em328/');
exit;
?>