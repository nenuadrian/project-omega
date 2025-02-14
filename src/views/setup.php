<?php View::render('header', ['title' => 'Setup']); ?>
<div class="row">
    <div class="col-12">
    <form method="post">
        <input type="text" name="db_host" placeholder="db_host"/>
        <input type="text" name="db_user" placeholder="db_user"/>
        <input type="text" name="db_pass" placeholder="db_pass"/>
        <input type="text" name="db_name" placeholder="db_name"/>
        <button type="submit" class="btn btn-success" name="action" value="install">Configure</button>
    </form>
</div>
</div>

<?php View::render('footer'); ?>
