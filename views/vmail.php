<?php
function __autoload($name)
{
   require_once('../'.$name.'.php');
}
if($_POST['submit'])
{
    $send = new \app\classes\SendMail($_POST['from'],$_POST['subject'],$_POST['mess'],$_POST['phone']);
    $send->send();
}
?>