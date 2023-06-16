<?php View::render('header', ['title' => 'Login']); ?>

<div class="row">
  <div class="col-md-3">
    
  </div>
  <div class="col-md-6 text-center">
    <form method="post">
      <input class="form-control" type="text" name="id" placeholder="Username or E-mail"/>
      <input class="form-control" type="password" name="password" placeholder="Password"/>
      <button class="btn btn-primary" type="submit" name="action" value="login">
        Login
      </button>
    </form>
  </div>
</div>

<?php View::render('footer'); ?>
