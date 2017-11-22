<form method="post">

    <fieldset class="rating radiogroup">
        <legend>Ваша оценка</legend>
        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
    </fieldset>
<p></p><legend>Добавьте свой отзыв</legend>
    <p></p> <input type="hidden" name="page_id" value="<?php echo $_GET['id'];?>">

    <p><label>Название отзыва</label></p>
    <p><input type="text" name="name" placeholder="Название отзыва"></p>
    <p><label>Отзыв</label></p>
    <p><textarea rows="10" cols="45" name="review" placeholder="Текст отзыва"></textarea></p>
    <p><label>Ваше имя</label></p>
    <p><input type="text" name="autor" placeholder="Как вас зовут"></p>
    <p><button type="submit" class="btn btn-primary">Добавить отзыв</button></p>
</form>