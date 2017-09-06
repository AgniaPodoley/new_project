<?php

/**
 * @filename install.class.php
 * модель для создания новой БД, таблиц с первоначальными данными
 * @author Клуб интеллектуалов
 * @copyright 01.04.2014
 * @updated 09.03.2017
 */
 
class Install extends Config
{
    private $connection; // идентефикатор соединения   
        
    // создаем новую БД и открываем соединение с сервером БД
    public function  __construct()
	{
        $this->create_new_db();
        $this->open_connection();                      
    }  
        
	// создание новой БД
    private function create_new_db()
	{         
        echo "Создаем новую базу данных ".$this->DB_NAME." ...";
        
        // открываем соединение с сервером БД        
        $this->connection = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASS);
        
        $sql= "CREATE DATABASE IF NOT EXISTS ";
        $sql .= $this->DB_NAME;
        $sql .= " CHARACTER SET utf8 COLLATE utf8_general_ci";

		if($this->sql($sql))
        {
			echo "OK<br />"; 
        }
    }
		
	// открываем соединение с сервером БД
    private function open_connection()
	{ 
        $this->connection = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);

        // если соединение не открыто, выдаем сообщение об ошибке
        if (!$this->connection)
		{
            die("Ошибка соединения с сервером баз данных: ". mysqli_error());
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