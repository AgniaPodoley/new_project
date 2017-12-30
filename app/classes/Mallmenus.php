<?php
namespace app\classes;

class Mallmenus
{
    function return_menus()
	{
		$sql = "SELECT id, menu_name, language, visible, header_visible FROM menus WHERE visible ='1' AND language ='".$_SESSION['language']."' ORDER BY position"; // готовим запрос

        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res; // возвращаем результат
    }
}
?>