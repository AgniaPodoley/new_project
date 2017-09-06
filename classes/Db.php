<?php

/**
 * @filename DB.class.php
 * набор компонентов для работы с БД
 * @author Любомир Пона
 * @copyright 24.09.2013
 */
 
class Db extends Config 
{
    private $connection; // идентефикатор соединения

    // открываем соединение с сервером БД
    public function  __construct() 
	{
        $this->open_connection();
    }

    private function open_connection()
	{ 
        $this->connection = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);

        // если соединение не открыто, выдаем сообщение об ошибке
        if (!$this->connection)
		{
            die("Ошибка соединения с базой данных: ". mysqli_error());
        }
        
        // установка принудительной кодировки UTF-8
        mysqli_query($this->connection, "set names utf8") or die ("set names utf8 failed");
    }

    // реализация запроса к БД
    public function sql($query)
	{
        $result = mysqli_query($this->connection, $query);
        
        // если запрос не удался, выдаем сообщение об ошибке
        if (!$result)
		{
             die ("Ошибка запроса к базе данных: ". mysqli_error());
        }
        return $result;
    }
	
	// закрываем соединение с сервером БД
	public function  __destruct()
	{
	    mysqli_close($this->connection);
	}
}
?>