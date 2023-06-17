<?php View::render('header', ['title' => 'Create account']); ?>

<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6 text-center">
      <form method="post">
        <?php if (isset($errors) && !empty($errors)): ?>
          <?php foreach ($errors as $error): ?>
            <div class="alert alert-danger">
              <?=$error?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
        <input class="form-control" required type="email" name="email" placeholder="E-mail" value="<?=Input::post('email')?>"/>
        <input class="form-control" required type="text" name="username" placeholder="Username" value="<?=Input::post('username')?>"/>
        <input class="form-control" required type="password" name="password" placeholder="Password" value="<?=Input::post('password')?>"/>
        <button class="btn btn-lg btn-primary" type="submit" name="action" value="register">
          Create account
        </button>
      </form>
  </div>
</div>

<?php View::render('footer'); ?>
