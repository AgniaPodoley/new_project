<?php
class Mallmenus extends Db 
{
    function return_menus()
	{
		$sql = "SELECT id, menu_name, language, visible, header_visible FROM menus WHERE visible ='1' AND language ='".$_SESSION['language']."' ORDER BY position"; // готовим запрос
				
		$res = $this->sql($sql); // выполняем запрос
        return $res; // возвращаем результат
    }
}
?>