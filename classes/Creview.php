<?php

class Creview extends Mreview
{
    // возвращаем отзывы длдя определенной страницы
    public function get_reviews_from_DB($page){

        $res = $this->return_reviews($page); // запрос к БД
        while ($row = mysqli_fetch_assoc($res))
        {
            $review[$row['id']] = $row;
        }
        return $review;
    }
}