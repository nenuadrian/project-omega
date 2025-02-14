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
            <input class="form-control" required type="email" name="email" placeholder="E-mail" autofocus
                value="<?=Input::post('email')?>" />
            <input class="form-control" required type="text" name="username" placeholder="Username"
                value="<?=Input::post('username')?>" />
            <input class="form-control" required type="password" name="password" placeholder="Password"
                value="<?=Input::post('password')?>" />
            <?php if (Configs::get('captcha')): ?>
                    <br/>
                    <br/>
                      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                
                    <div class="g-recaptcha" style="display:inline-block" data-sitekey="6Le-pZ8mAAAAAEC1w-UEh2QX-p7lvq5IBPJtiD8E"></div>
                                <br/>
                    <?php endif; ?>

            <button class="btn btn-lg btn-primary" type="submit" name="action" value="register">
                <i class="fa-solid fa-user"></i> Create account
            </button>
        </form>
    </div>
</div>

<?php View::render('footer'); ?>
