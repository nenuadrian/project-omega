<?php require (SRC_DIR . '/views/header.php'); ?>

<form method="post">
  <input type="email" name="email" placeholder="E-mail"/>
  <input type="text" name="username" placeholder="Username"/>
  <input type="password" name="password" placeholder="Password"/>
  <button type="submit" name="action" value="register">
    Register
  </button>
</form>

<?php require (SRC_DIR . '/views/footer.php'); ?>