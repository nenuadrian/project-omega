<?php View::render('header', ['title' => 'Create account']); ?>

<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6 text-center">
      <form method="post">
        <input class="form-control" required type="email" name="email" placeholder="E-mail"/>
        <input class="form-control" required type="text" name="username" placeholder="Username"/>
        <input class="form-control" required type="password" name="password" placeholder="Password"/>
        <button class="btn btn-lg btn-primary" type="submit" name="action" value="register">
          Create account
        </button>
      </form>
  </div>
</div>

<?php View::render('footer'); ?>
