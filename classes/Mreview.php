<?php

class Mreview extends Db
{
    public function return_reviews($id)
    {
        $sql = "SELECT id, name, review, autor, created FROM reviews WHERE visible ='1' AND page_id ='".$id."' AND state ='good' ORDER BY id"; // готовим запрос

        $res = $this->sql($sql); // выполняем запрос
        return $res; // возвращаем результат
    }

    public function add_new_review($review){

        $dt = time(); // текущая метка времени

        $sql = "INSERT into reviews (page_id,name,review,autor,visible,state,created) VALUES ('{$review['page_id']}','{$review['name']}','{$review['review']}','{$review['autor']}','1','new','{$dt}')";

        $res = $this->sql($sql);
        return $res; // возвращаем результат
    }

}