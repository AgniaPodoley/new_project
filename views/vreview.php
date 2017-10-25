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

function getRating($rating)
{
    switch ($rating){
        case 1: echo "<i class=\" icon-star icon-large rating_red\"> </i>" ;break;
        case 2: for($i=1;$i<=$rating;$i++){echo "<i class=\" icon-star icon-large rating_red\"> </i>";} break;
        case 3: for($i=1;$i<=$rating;$i++){echo "<i class=\" icon-star icon-large rating_yellow\"> </i>";} break;
        case 4: for($i=1;$i<=$rating;$i++){echo "<i class=\" icon-star icon-large rating_green\"> </i>";} break;
        case 5: for($i=1;$i<=$rating;$i++){echo "<i class=\" icon-star icon-large rating_green\"> </i>";} break;
    }

}

if(!empty($review)){
    echo "<h2>Отзывы</h2>";
    foreach ($review as $value){
        echo "<p>";
        foreach ($value as $key=>$item){
            $res[$key]=$item;
        }
        echo "<h3 class=\"review_header\">".$res["name"]."</h3>";
        getRating($res["rating"]);
        echo "<p><i class=\"icon-table icon-large\"> </i>".date("d.m.Y",$res["created"])." <i class=\" icon-time icon-large\"> </i> ".date("H:i:s",$res["created"])."</p>";
        echo "<blockquote><div id=\"review\">".$res["review"]."</div></blockquote>";
        echo "<p class=\"review_autor\"><span class=\"review_bold\"></span><i class=\"icon-user icon-large\"> </i><span class=\"review_italic\">".$res["autor"]."</span></p>";
        echo "</p>";
    }
}

