<?php

class Mreview extends Db
{
    function return_reviews($id)
    {
        $sql = "SELECT id, name, review, autor FROM reviews WHERE visible ='1' AND page_id ='".$id."' AND state ='good' ORDER BY id"; // готовим запрос

        $res = $this->sql($sql); // выполняем запрос
        return $res; // возвращаем результат
    }
}