<?php

class Mreview extends Db
{
    // пагинация
    public function pagination()
    {
        $reviews_per_page = 3;

        $sql = "SELECT COUNT (*) FROM reviews"; // готовим запрос
        $res = $this->sql($sql); // выполняем запрос

        $col_pages = $res/$reviews_per_page;

        return $col_pages;


    }

    public function return_reviews($id)
    {
        $sql = "SELECT id, name, review, autor, created, rating FROM reviews WHERE visible ='1' AND page_id ='".$id."' AND state ='good' ORDER BY id DESC"; // готовим запрос

        $res = $this->sql($sql); // выполняем запрос
        return $res; // возвращаем результат
    }

    public function add_new_review($review){

        $dt = time(); // текущая метка времени

        $sql = "INSERT into reviews (page_id,name,review,autor,email,visible,state,created,rating) VALUES ('{$review['page_id']}','{$review['name']}','{$review['review']}','{$review['autor']}','{$review['email']}','1','new','{$dt}','{$review['rating']}')";

        $res = $this->sql($sql);
        return $res; // возвращаем результат
    }

}