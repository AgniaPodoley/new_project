<?php
class Mlanguages extends Db 
{		
	// возвращает список всех языков
	function language_list($exclude)
	{ 
        $sql = "SELECT * FROM languages WHERE language <> '{$exclude}'";        
        $res = $this->sql($sql);
        return $res;
    }
	
	// возвращает выбранный язык для редактирования
    function retr_languageedit($id)
	{ 
        $sql = 'SELECT * FROM languages WHERE id = '.$id.'';
        $result = $this->sql($sql);
        return $result;
    }
	
	// редактируем язык
    function update_language($aux_sql, $post)
	{                
        $sql = 'UPDATE languages SET ' .$aux_sql. ' WHERE id ='.$post['id'].'';
        if ($this->sql($sql) == 'true')
        {
            echo "<p class = 'center'><img src='image/ok.png' border=0>   Данные были успешно изменены!</p><p class = 'center'><a class = 'links' href=''>редактировать</a>&nbsp;|&nbsp;<a class = 'links' href='?page=languages'>список языков</a></p>";
        }
        else
		{
            echo "<p class = 'center'><img src='image/error.png' border=0>   Возникла ошибка при изменении данных!</p>";
        }
    }
}
?>