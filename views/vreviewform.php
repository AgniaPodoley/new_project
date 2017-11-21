<form method="post">
<p></p><legend>Добавьте свой отзыв</legend>
    <p></p> <input type="hidden" name="page_id" value="<?php echo $_GET['id'];?>">
    <p><label>Ваша оценка</label></p>
    <p>
        <select name="rating" multiple class="form-control">
            <option value="1"><?php //getRating(1); ?>1</option> //
            <option value="2"><?php //getRating(2); ?>2</option>
            <option value="3"><?php //getRating(3); ?>3</option>
            <option value="4"><?php //getRating(4); ?>4</option>
            <option value="5"><?php //getRating(5); ?>5</option>
        </select>
    </p>
    <p><label>Название отзыва</label></p>
    <p><input type="text" name="name" placeholder="Название отзыва"></p>
    <p><label>Отзыв</label></p>
    <p><textarea rows="10" cols="45" name="review" placeholder="Текст отзыва"></textarea></p>
    <p><label>Ваше имя</label></p>
    <p><input type="text" name="autor" placeholder="Как вас зовут"></p>
    <p><button type="submit" class="btn btn-primary">Добавить отзыв</button></p>
</form>