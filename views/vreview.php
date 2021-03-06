<?php
// создаём объект для работы с отзывами
$reviews = new \app\classes\Creview();
$review = array();
$lng = $_SESSION['language'];

// проверяем не зашёл ли пользователь впервые
if(!$_GET['id']||!$_GET['review'])
{
    $id = 1;
    $start = 1; // номер начальной страницы отзывов
}
else
{
    $id = $_GET['id'];
    $start = $_GET['review']; // номер текущей страницы отзывов
}

$review = $reviews->get_reviews_from_DB($lng,$id,$start);

// выводим отзывы
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

// ПОСТРАНИЧНАЯ НАВИГАЦИЯ ДЛЯ ОТЗЫВОВ

$col_page_links = $reviews->pagination($lng,$id); // получаем количество страниц для отзывов

$neighbours = $reviews->get_neighbours_links(); // получаем количество соседних ссылок от текущей
$left_neighbour = $start - $neighbours; // начальная ссылка слева
$right_neighbour = $start + $neighbours; // последняя ссылка справа

// делаем проверки
if($left_neighbour < 1)
{
    $left_neighbour = 1;
}

if($right_neighbour > $col_page_links)
{
    $right_neighbour = $col_page_links;
}

// выводим ссылку на предыдущую страницу
if($start != 1)
{
    echo "<a href=\"?id={$_GET['id']}&review=".($start-1)."\">Предыдущая</a> ";
}

if($start != 1)
{
    echo "<a href=\"?id={$_GET['id']}&review=1\">1 ...</a> ";
}


// выводим ссылки с номерами страниц
for ($i=$left_neighbour; $i<=$right_neighbour;$i++)
{
    echo "<a  href=\"?id={$_GET['id']}&review={$i}\">";
    // выделяем номер активной ссылки
    if($start==$i)
    {
       echo "<span class='current'>{$i}</span>"; // если ссылка текущая, то выводим жирным
    }
    else
    {

        echo $i;
    }

    echo "</a>&nbsp;";
}

// выводим общее количество страниц для отзывов в виде ссылки и ссылку на следующую страницу
if($start != $col_page_links)
{
    echo "... <a href=\"?id={$_GET['id']}&review={$col_page_links}\">{$col_page_links}</a> ";
    echo "<a href=\"?id={$_GET['id']}&review=".($start+1)."\">Следующая</a>";
}


