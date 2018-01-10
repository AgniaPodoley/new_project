<?php
class Mmenu extends Db 
{
	// возвращает список всех меню со всей информацией по каждому
	function menu_pos($lng)
	{ 
        $sql = "SELECT * FROM menus WHERE language = '{$lng}' ORDER BY position ASC";
        $res = $this->sql($sql);
        return $res;
    }
	
	// создает новое меню
	function create($post) 
	{ 			
		$dt = time(); // текущая метка времени
        
        $sql = "insert into
				menus(menu_name,position,language,created,visible,header_visible)
				VALUES('{$post['menu_name']}','{$post['position']}','{$post['language']}','{$dt}','{$post['visible']}','{$post['header_visible']}')" ;

                        if ($this->sql($sql) == 'true')
                        {
                        echo "<p class = 'center'><img src='image/ok.png' border=0>   Новое меню успешно добавлено!</p><p class = 'center'><a class = 'links' href=''>создать еще</a>&nbsp;|&nbsp;<a class = 'links' href='?page=".$post['language']."menulist'>список меню</a></p>";
                        }
                        else
						{
                        echo "<p class = 'center'><img src='image/error.png' border=0>   Возникла ошибка при добавлении нового меню!</p>";
                        }
                       	return true ;
	}
	
	// возвращает выбранное меню для редактирования
    function retr_menuedit($id)
	{ 
        $sql = 'SELECT * FROM menus WHERE id = '.$id.'';
        $result = $this->sql($sql);
        return $result;
    }
	
	// редактируем меню
    function update_menu($aux_sql, $post)
	{
        $dt = time(); // текущая метка времени
        
        $sql = 'UPDATE menus SET ' .$aux_sql. ',lastmod='.$dt.'  WHERE id ='.$post['id'].'';
        if ($this->sql($sql) == 'true')
        {
            echo "<p class = 'center'><img src='image/ok.png' border=0>   Данные были успешно изменены!</p><p class = 'center'><a class = 'links' href=''>редактировать</a>&nbsp;|&nbsp;<a class = 'links' href='?page=".$post['language']."menulist'>список меню</a></p>";
        }
        else
		{
            echo "<p class = 'center'><img src='image/error.png' border=0>   Возникла ошибка при изменении данных!</p>";
        }
    }
	
	// удаляем выбранное меню
    function delete_menu($id)
	{
        $sql = 'DELETE  FROM menus WHERE id = '.$id.'';
        if (!$res=$this->sql($sql))
		{
			echo "<p class = 'center'><img src='image/error.png' border=0>   Возникла ошибка при удалении меню!</p>";	
		}        
		else
		{
			return $res;	
		}
		
    }
	
	// позиция
	function pos_inc($pos)
	{
        $sql = "UPDATE menus SET position = position+1 WHERE position >= {$pos}";
        $this->sql($sql);
    }

}
?>