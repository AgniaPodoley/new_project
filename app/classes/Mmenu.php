<?php
namespace app\classes;

class Mmenu
{
    function return_menu()
	{
		$sql = "SELECT id, parent_id, menu_icon, icon_size, menu_name FROM pages WHERE visible_in_main_menu ='1' AND language ='".$_SESSION['language']."' ORDER BY position"; // готовим запрос

        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res; // возвращаем результат
    }
}
?>