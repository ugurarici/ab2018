<?php

require_once "models/Article.php";
require_once "controllers/ArticleController.php";

//  Article yönetim sistemi

//  Article listesini getirmeli
//  Article detayını görüntülemeli

//  Yeni bir Article ekleyebilmeliyim
//  Mevcut Article üzerinde değişiklik yapabilmeliyim
//  Mevcut bir Article'ı silebilmeliyim

// mevcut sayfayı çekip döngüye sokuyoruz
// ArticleController::index();

//  Artık controller dosyamda işlemleri ayırdığım için bütün talepleri burada karşılayıp ona göre Controller çağırmam gerekecek

$routes = array(
  "index" => ["ArticleController", "index"],
  "detail" => ["ArticleController", "detail"],
  "new" => ["ArticleController", "new"],
  "store" => ["ArticleController", "store"],
  "delete" => ["ArticleController", "delete"],
  "edit" => ["ArticleController", "edit"],
  "update" => ["ArticleController", "update"],
);

$action = "index";
if(isset($_GET['a'])){
  if(isset($routes[$_GET['a']])) $action = $_GET['a'];
}

$controller = $routes[$action][0];
$method = $routes[$action][1];

$controller::$method();
