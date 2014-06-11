<h2> Create a new Item</h2>
<?php

echo validation_errors();
echo form_open('news/create');
?>

    <label for="title"> Title </label>
    <input type="input" name="title" /> <br />

    <label for="slug"> Slug </label>
    <input type="input" name="slug" /> <br />

    <label for="text"> Text </label>
    <textarea name="text"></textarea>


    <input type="submit" name="submit" value="Create news item" />

</form>