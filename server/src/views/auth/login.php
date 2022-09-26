<?php View::render('header', ['title' => 'Login']); ?>

<form method="post">
  <input type="text" name="id" placeholder="Username or E-mail"/>
  <input type="password" name="password" placeholder="Password"/>
  <button type="submit" name="action" value="login">
    Login
  </button>
</form>

<?php View::render('footer'); ?>
