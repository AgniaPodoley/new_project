<?php

$reviews = new Creview();
$review = array();

// проверяем не зашёл ли пользователь впервые
if(!$_GET['id']){
    $id = 1;
}
else{
    $id = $_GET['id'];
}

$review = $reviews->get_reviews_from_DB($id);

if(!empty($review)){
    echo "<h2>Отзывы</h2>";
    foreach ($review as $value){
        echo "<p>";
        foreach ($value as $key=>$item){
            $res[$key]=$item;
        }
        echo "<h3>".$res["name"]."</h3>";
        echo "<p>Дата отзыва: ".date("d.m.Y \в H:i:s",$res["created"])."</p>";
        echo "<div id=\"review\">".$res["review"]."</div>";
        echo "<p class=\"review_autor\"><span class=\"review_bold\">Автор отзыва: </span><span class=\"review_italic\">".$res["autor"]."</span></p>";
        echo "</p>";
    }
}

