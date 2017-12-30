<?php
$id = $_GET['id'];
$vcontent = new \app\classes\Ccontent();
$page = array();
$page = $vcontent->print_content($id);
?>
