<form method="post">
<legend>Добавьте свой отзыв</legend>
    <input type="hidden" name="page_id" value="<?php echo $_GET['id'];?>">
    <label>Название отзыва</label>
    <input type="text" name="name" placeholder="Дайте название своему отзыву">
    <label>Отзыв</label>
    <textarea rows="10" cols="45" name="review" placeholder="Текст отзыва"></textarea>
    <label>Ваше имя</label>
    <input type="text" name="autor" placeholder="Как вас зовут">
    <button type="submit" class="btn btn-primary">Добавить отзыв</button>
</form>