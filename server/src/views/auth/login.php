<?php View::render('header', ['title' => 'Login']); ?>

<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <?php if (isset($errors) && !empty($errors)): ?>
        <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger">
            <?=$error?>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <div class=" text-center">
            <form method="post">
                <input class="form-control" type="text" autofocus autocorrect="off" autocapitalize="none" name="id"
                    placeholder="Username or E-mail" required value="<?=Input::post('id')?>" />
                <input class="form-control" type="password" name="password" placeholder="Password" required />
                <?php if (Configs::get('captcha')): ?>
                    <br/>
                    <br/>
                      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                
                    <div class="g-recaptcha" style="display:inline-block" data-sitekey="6Le-pZ8mAAAAAEC1w-UEh2QX-p7lvq5IBPJtiD8E"></div>
                                <br/>
                    <?php endif; ?>
                <button class="btn btn-primary" type="submit" name="action" value="login">
                    <i class="fa-solid fa-face-smile"></i> Login
                </button>
            </form>
            <br />
            <a class="btn btn-sm btn-primary" href="<?=BASE_URL?>/auth/register">Create a new account</a>
        </div>
    </div>
</div>

<?php View::render('footer'); ?>
