<?php require ('../header.php'); ?>
<div class="card">
    <div class="card-header">Stats</div>
    <div class="card-body">
        <?=number_format($users)?> users.<br/>
        <?=number_format($orgs)?> organizations.
        <?=number_format($servers)?> servers.
    </div>
    </div>
<br/>
<div class="card">
    <div class="card-header">Generate entities</div>
    <div class="card-body">
<?php if (isset($generated)): ?>
    <div class="alert alert-warning">
        <?=count($generated)?> generated.
    </div>
<?php endif; ?>
<form method="post">
<input type="text" placeholder="How many users to generate?" name="n" class="form-control" autocomplete="off"/>
<br/>
<button type="submit" class="btn btn-success" name="action" value="generate">Generate</button>
</form>

<form method="post">
<button type="submit" class="btn btn-success" name="action" value="servers">Generate servers</button>
</form>
</div>
</div>
<?php require ('../footer.php'); ?>