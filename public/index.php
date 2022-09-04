<?php 
use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
define('VIEWS',dirname(__DIR__). DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS',dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('DB_NAME','myapp');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');
$router  = new Router($_GET['url']);
$router->get('/','App\Controllers\BlogController@welcome');
$router->get('/posts', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->get('/tags/:id', 'App\Controllers\BlogController@tag');

$router->get('/login','App\Controllers\UserController@login');
$router->post('/login','App\Controllers\UserController@loginPost');
$router->get('/logout','App\Controllers\UserController@logout');

//Admin Controllers

$router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');
$router->get('/admin/posts/create', 'App\Controllers\Admin\PostController@create');
$router->post('/admin/posts/create', 'App\Controllers\Admin\PostController@createPost');
$router->post('/admin/posts/delete/:id','App\Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@update');
try{
    $router->run();
}catch(NotFoundException $e){
    echo $e->error404();
}