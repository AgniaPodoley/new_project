<?php
namespace app\classes;

class Callmenus extends Mallmenus
{      
    // возвращаем меню с БД
    public function get_menus_from_DB(){	
        
        $res = $this->return_menus(); // запрос к БД
		while ($row = mysqli_fetch_assoc($res))
		{
			$mname[$row['id']] = $row; 
		}
        return $mname;
    }
       
}
?>