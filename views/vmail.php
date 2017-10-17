<?php
function __autoload($name)
{
   require_once('../classes/' . $name . '.php'); 
}
if($_POST['submit'])
{
    $send = new SendMail($_POST['from'],$_POST['subject'],$_POST['mess'],$_POST['phone']);
    $send->send();
}
?>