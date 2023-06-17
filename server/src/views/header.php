<html>

<head>
    <title><?=$title?></title>
    <base href="/project-omega/server/public_html/">
    <link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
   
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <?php if (Input::cookie('consent') !== 'true'): ?>
    <div class="cookies">
      <p>
        We use cookies to ensure that we give you the best experience on our website. They help us both in term of analytics and to provide you with a complete experience (e.g. our comic creator). <br/>You can read our <a href="<?=BASE_URL . '/pages/privacy-policy'?>">Privacy Policy</a> and <a href="<?=BASE_URL . '/pages/terms-of-service'?>">Terms and Conditions</a>.
      </p>  
      <form method="post">
        <button type="submit" class="btn btn-lg btn-primary" name="cookies" value="accept">
          Accept Cookies
        </button>
      </form>
    </div>
  <?php else: ?>
  <style>.cookies{display:none!important;}</style>
  <?php endif; ?>

    <div class="container">
    <br/>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?=BASE_URL?>">Home</a>
            </li>
              <?php if (Session::currentSession()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=BASE_URL?>/auth/logout">Logout</a>
                </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <br/>
    <br/>

