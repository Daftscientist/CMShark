<?php
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
        return false;
    }

    require '../vendor/autoload.php';
    use eftec\bladeone\BladeOne;
    $views = __DIR__ . '/views';
    $cache = __DIR__ . '/cache';
    $blade = new BladeOne ( $views , $cache , BladeOne::MODE_AUTO); 

    $router = new \Bramus\Router\Router();
    $router->set404(function () {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404, route not found!';
    });
?>
<!DOCTYPE html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="/tailwind.config.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
        <title>Admin | CMShark</title>
        <meta name="title" content="Admin">
    </head>
    <body class="bg-backgroundColor">
<?php
    $router->get('/',function () {
        global $blade;
        echo $blade->run("nav", array("page"=>"admin-home"));
        ?>
            <form method="post">

            </form>
        </div>
        <?php
    });

    $router->get('/settings',function () {
        global $blade;
        echo $blade->run("nav", array("page"=>"admin-page-settings"));
        ?>
            <form method="post">

            </form>
        </div>
        <?php
    });

    $router->get('/settings/account',function () {
        global $blade;
        echo $blade->run("nav", array("page"=>"admin-account-settings"));
        ?>
            <form method="post">

            </form>
        </div>
        <?php
    });

    $router->post('/',function () {

    });

    $router->post('/settings',function () {

    });

    $router->post('/settings/account',function () {

    });

    $router->run();
?>
    </body>
</html>
