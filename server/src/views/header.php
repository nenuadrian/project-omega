<!DOCTYPE html><html lang="en"><head>
  <meta charset="utf-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
     <link rel="icon" type="image/png" href="/assets/img/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
    <?php if (Input::cookie('consent') !== 'true'): ?>
    <div class="cookies" id="cookies" style="display:none">
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
        cookieStore.get('consent').then(v => { if (v && v.value !== 'true') document.getElementById("cookies").style.display = 'block'; })
    </script>
  <?php endif; ?>

    <div class="container">
    <br/>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?=BASE_URL?>" data-bs-toggle="collapse" data-bs-target=".navbar-collapse.show">App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?=BASE_URL?>" data-bs-toggle="collapse" data-bs-target=".navbar-collapse.show">Home</a>
            </li>
          </ul>

          <div class="nav-text">
             <ul class="navbar-nav me-auto">
             <li class="nav-item">
                  <a class="btn btn-sm btn-info" href="<?=BASE_URL?>/auth/register" data-bs-toggle="collapse" data-bs-target=".navbar-collapse.show">Register</a>
                  </li>
                  <li class="nav-item">
                  <a class="btn btn-sm btn-primary" href="<?=BASE_URL?>/auth/login" data-bs-toggle="collapse" data-bs-target=".navbar-collapse.show">Login</a>
                  </li>

            </ul>
          </div>
        </div>
      </div>
    </nav>
    <br/>
    <br/>

