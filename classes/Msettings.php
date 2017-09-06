<?php
class Msettings extends Db 
{
    // возвращает название домена
	function return_domain()
	{
        $sql = "SELECT domainname  FROM constants WHERE id = 1";
		$dom = $this->sql($sql);
		$res = mysqli_fetch_assoc($dom);
        return $res;
    }

	// возвращает настройки сайта для языковых констант
	function return_settings($lng)
	{
		$sql = "SELECT site,footer  FROM constants WHERE language ='".$lng."'";
		$lgs = $this->sql($sql);
		$res = mysqli_fetch_assoc($lgs);
        return $res;
	}	
	
	// проверяет включен ли язык на сайте
	function return_active_language()
	{
		$sql = "SELECT visible FROM languages WHERE language !='".$_SESSION['language']."'";
		$lgs = $this->sql($sql);
		$res = mysqli_fetch_assoc($lgs);   
		return $res;
	}
		
	// проверяет язык на сайте по умолчанию
	function return_default_language()
	{
		$sql = "SELECT language FROM languages  WHERE default_lng = '1'";
		$lgs = $this->sql($sql);
		$res = mysqli_fetch_assoc($lgs);   
		return $res;
	}
}
?>