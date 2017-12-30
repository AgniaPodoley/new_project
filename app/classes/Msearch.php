<?php
namespace app\classes;

class Msearch
{
	function return_search($search)
	{
        $sql = "SELECT id, menu_name, content FROM pages WHERE menu_name LIKE '%$search%' OR content  LIKE '%$search%'";
        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res;
    }
}
?>