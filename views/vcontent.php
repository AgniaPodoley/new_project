<?php
$id = $_GET['id'];
$vcontent = new Ccontent();
$page = array();
$page = $vcontent->print_content($id);
?>
