<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'APP' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/styles.css">
    <link rel="icon" type="image/png" href="/assets/img/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="
        https://cdn.jsdelivr.net/npm/vis@4.21.0-EOL/dist/vis.min.js
        "></script>
    <link href="
        https://cdn.jsdelivr.net/npm/vis@4.21.0-EOL/dist/vis.min.css
        " rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?= BASE_URL ?>/hotkeys.min.js"></script>
    <script type="text/javascript">
        hotkeys('<?= implode(',', array_map(function ($shortcut) {
            return $shortcut['keys']; }, Shortcuts::shortcuts())) ?>',
            function (event, handler) {
                switch (handler.key) {
                <?php foreach (Shortcuts::shortcuts() as $shortcut): ?>
                    case '<?= $shortcut['keys'] ?>':
                    <?php if (isset($shortcut['location'])): ?>
                        document.location = '<?= $shortcut['location'] ?>';
                    <?php endif; ?>
                    <?php if (isset($shortcut['function'])): ?>
                        <?= $shortcut['function'] ?>();
                    <?php endif; ?>
                    break;
                <?php endforeach; ?>
            }
        });
    </script>
</head>

<body>
    <div class="container">
        <br />
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= BASE_URL ?>">App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                    aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_URL ?>">Home</a>
                        </li>
                    </ul>

                    <div class="nav-text">
                        <ul class="navbar-nav me-auto text-center">
                            <?php if (Session::currentSession()): ?>
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-info" href="<?= BASE_URL ?>/auth/logout">Logout</a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-info" href="<?= BASE_URL ?>/auth/register">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-primary" href="<?= BASE_URL ?>/auth/login">Login</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <br />
        <br />