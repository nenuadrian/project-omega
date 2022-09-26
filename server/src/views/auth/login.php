<?php require (SRC_DIR . '/views/header.php'); ?>

<form method="post">
  <input type="text" name="id" placeholder="Username or E-mail"/>
  <input type="password" name="password" placeholder="Password"/>
  <button type="submit" name="action" value="login">
    Login
  </button>
</form>

<?php require (SRC_DIR . '/views/footer.php'); ?>
