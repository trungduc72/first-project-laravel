<h1>Them chuyen muc</h1>
<form method="POST"  action="<?php echo route('categories.add'); ?>">
    <input type="text" placeholder="Them chuyen muc">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <button type="Submit">Submit</button>
</form>