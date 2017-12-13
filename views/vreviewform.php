<form method="post">
    <legend><?=REVIEWADD?></legend>
    <p><input type="hidden" name="page_id" value="<?php echo $_GET['id'];?>"> </p>

    <fieldset class="rating radiogroup">
        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
    </fieldset>

    <p><label><?=REVIEWNAME?></label></p>
    <p><input type="text" name="name" placeholder="<?=REVIEWNAMEINPUT?>"></p>
    <p><label><?=REVIEW?></label></p>
    <p><textarea rows="10" cols="45" name="review" placeholder="<?=REVIEWINPUT?>"></textarea></p>
    <p><label><?=REVIEWUSERNAME?></label></p>
    <p><input type="text" name="autor" placeholder="<?=REVIEWUSERNAMEINPUT?>"></p>
    <p><label><?=REVIEWUSEREMAIL?></label></p>
    <p><input type="text" name="email" placeholder="<?=REVIEWUSEREMAILINPUT?>"></p>
    <p><button type="submit" class="btn btn-primary"><?=REVIEWBUTTON?></button></p>
</form>