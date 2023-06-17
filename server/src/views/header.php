<html>

<head>
    <title><?=$title?></title>
    <base href="/project-omega/server/public_html/">
    <link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <?php if (Input::cookie('consent') !== 'true'): ?>
    <div class="cookies" id="cookies">
      <p>
        We use cookies to ensure that we give you the best experience on our website. They help us both in term of analytics and to provide you with a complete experience (e.g. our comic creator). <br/>You can read our <a href="<?=BASE_URL . '/pages/privacy-policy'?>">Privacy Policy</a> and <a href="<?=BASE_URL . '/pages/terms-of-service'?>">Terms and Conditions</a>.
      </p>  
      <form method="post">
        <button type="submit" class="btn btn-lg btn-primary" name="cookies" value="accept">
          Accept Cookies
        </button>
      </form>
    </div>
<script>
cookieStore.get('consent').then(v => { if (v && v.value == 'true') document.getElementById("cookies").style.display = 'none'; })
    </script>
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

