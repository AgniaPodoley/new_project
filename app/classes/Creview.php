<?php
namespace app\classes;

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

    // добавляем отзыв
    public function add_review($review){

        // проверяем не пришел ли отзыв с главной страницы
        if (!$review['page_id']) {
            $review['page_id'] = 1;
        }

        $result = $this->add_new_review($review);

        // если новый отзыв добавлен, то уведомим об этом администратора по электронной почте
        if($result){
            $message = "<b>Текст отзыва:</b> <br>";
            $message .= $review['review'];
            $message .= "<br><a href ='{$_SERVER['HTTP_HOST']}/admin/views/reviews'>Одобрить отзыв</a><br>";
            $send_notification = new \app\classes\SendMail("{$review['email']}","Новый отзыв от {$review['autor']} на сайте {$_SERVER['HTTP_HOST']}", "{$message}");
            $send_notification->send("silent");
            echo $review["autor"].", мы получили ваш отзыв и вскоре добавим его.";

        }
        else{
            echo "Извините, но в процессе отправки отзыва произошла ошибка.";
        }
    }
}