<h1>Edit chuyen muc</h1>
<form method="POST" action="<?php echo route('categories.edit')?>">
    <input type="text" placeholder="Edit chuyen muc">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <button type="Submit">Submit</button>
</form>