<?php
namespace app\classes;

class Mreview
{
    // пагинация
    public function rewiews_count($id)
    {
        $sql = "SELECT COUNT(*) FROM reviews WHERE page_id ='".$id."'"; // готовим запрос

        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res;
    }

    public function return_reviews($id,$start_from_page,$lim)
    {
        $sql = "SELECT id, name, review, autor, created, rating FROM reviews WHERE visible ='1' AND page_id ='".$id."' AND state ='good' ORDER BY id DESC LIMIT {$start_from_page}, {$lim} "; // готовим запрос
        echo $sql;

        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res; // возвращаем результат
    }

    public function add_new_review($review)
    {

        $dt = time(); // текущая метка времени

        $sql = "INSERT into reviews (page_id,name,review,autor,email,visible,state,created,rating) VALUES ('{$review['page_id']}','{$review['name']}','{$review['review']}','{$review['autor']}','{$review['email']}','1','new','{$dt}','{$review['rating']}')";

        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res; // возвращаем результат

    }

}