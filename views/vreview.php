<?php
// создаём объект для работы с отзывами
$reviews = new \app\classes\Creview();
$review = array();

// проверяем не зашёл ли пользователь впервые
if(!$_GET['id']||!$_GET['review'])
{
    $id = 1;
    $start = 1; // номер начального отзыва
}
else
{
    $id = $_GET['id'];
    $start = $_GET['review'];
}

$review = $reviews->get_reviews_from_DB($id,$start);

// получаем количество страниц для отзывов
$cols = $reviews->pagination($id);

if(!empty($review))
{
    echo "<h2>".REVIEWS."</h2>";
    foreach ($review as $value)
    {
        echo "<div class=\"review\">";
        foreach ($value as $key=>$item)
        {
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

for ($i=1; $i<=$cols;$i++)
{
    echo "<a href=\"?id={$_GET['id']}&review={$i}\"> {$i}</a>";
}