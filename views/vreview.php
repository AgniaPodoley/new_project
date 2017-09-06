<?php

$reviews = new Creview();
$review = array();
$review = $reviews->get_reviews_from_DB($_GET['id']);

if(!empty($review)){
    echo "<h2>Отзывы</h2>";
    foreach ($review as $value){
        echo "<p>";
        foreach ($value as $key=>$item){
            $res[$key]=$item;
        }
        echo "<h3>".$res["name"]."</h3>";
        echo "<div id=\"review\">".$res["review"]."</div>";
        echo "<p class=\"review_autor\"><span class=\"review_bold\">Автор отзыва: </span><span class=\"review_italic\">".$res["autor"]."</span></p>";
        echo "</p>";
    }
}

