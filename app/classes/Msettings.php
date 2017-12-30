<?php
namespace app\classes;

class Msettings
{
    // возвращает название домена
	function return_domain()
	{
        $sql = "SELECT domainname  FROM constants WHERE id = 1";
		$dom = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
		$res = mysqli_fetch_assoc($dom);
        return $res;
    }

	// возвращает настройки сайта для языковых констант
	function return_settings($lng)
	{
		$sql = "SELECT site,footer  FROM constants WHERE language ='".$lng."'";
		$lgs = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
		$res = mysqli_fetch_assoc($lgs);
        return $res;
	}	
	
	// проверяет включен ли язык на сайте
	function return_active_language()
	{
		$sql = "SELECT visible FROM languages WHERE language !='".$_SESSION['language']."'";
		$lgs = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
		$res = mysqli_fetch_assoc($lgs);   
		return $res;
	}
		
	// проверяет язык на сайте по умолчанию
	function return_default_language()
	{
		$sql = "SELECT language FROM languages  WHERE default_lng = '1'";
		$lgs = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
		$res = mysqli_fetch_assoc($lgs);   
		return $res;
	}
}
?>