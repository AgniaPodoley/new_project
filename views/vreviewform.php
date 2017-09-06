<h1>Добавьте свой отзыв</h1>
<form method="post">
    <input type="hidden" name="page_id" value="<?php echo $_GET['id'];?>">
    Название отзыва<input type="text" name="name">
    Отзыв<input type="text" name="review">
    Ваше имя<input type="text" name="autor">
    <input type="submit" value="Добавить оззыв">
</form>