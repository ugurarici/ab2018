<?php

require_once "models/Article.php";

//  Article yönetim sistemi

//  Article listesini getirmeli
//  Article detayını görüntülemeli

//  Yeni bir Article ekleyebilmeliyim
//  Mevcut Article üzerinde değişiklik yapabilmeliyim
//  Mevcut bir Article'ı silebilmeliyim

// mevcut sayfayı çekip döngüye sokuyoruz

$articles = Article::paginate();

require "views/index.php";
