<?php
class Msidebarmenu extends Db 
{
    function return_menu($menu_number)
	{	
		$sql="SELECT id, parent_id, menu_icon, icon_size, menu_name, active_link_in_sidebar FROM pages WHERE visible_in_sidebar ='1' AND menu_number ='".$menu_number."' AND language ='".$_SESSION['language']."' ORDER BY position";
		$res = $this->sql($sql); // выполняем запрос
        return $res; // возвращаем результат
    }
}
?>