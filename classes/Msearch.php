<?php 
class Msearch extends Db
{
	function return_search($search)
	{
        $sql = "SELECT id, menu_name, content FROM pages WHERE menu_name LIKE '%$search%' OR content  LIKE '%$search%'";
        $res = $this->sql($sql);
        return $res;
    }
}
?>