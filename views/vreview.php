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
        echo "<div class=\"review\">";
        foreach ($value as $key=>$item){
            $res[$key]=$item;
        }
        echo "<h3 class=\"review_header\">".$res["name"]."</h3>";
        getRating($res["rating"]);
        echo "<p><i class=\"icon-table icon-large\"> </i>".date("d.m.Y",$res["created"])." <i class=\" icon-time icon-large\"> </i> ".date("H:i:s",$res["created"])."</p>";
        echo "<blockquote><div id=\"review\">".$res["review"]."</div></blockquote>";
        echo "<p class=\"review_autor\"><span class=\"review_bold\"></span><i class=\"icon-user icon-large\"> </i><span class=\"review_italic\">".$res["autor"]."</span></p>";
        echo "</div>";
    }
}

