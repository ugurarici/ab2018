<?php

require_once "Article.php";

//  Article yönetim sistemi

//  Article listesini getirmeli
//  Article detayını görüntülemeli

//  Yeni bir Article ekleyebilmeliyim
//  Mevcut Article üzerinde değişiklik yapabilmeliyim
//  Mevcut bir Article'ı silebilmeliyim

//  tamamını çekip döngüye sokuyoruz
foreach (Article::all() as $article) {
  echo $article->title . "<hr>";
}

///////////
//  Yeni bir tane ekleyip hemen ardından güncelliyoruz
$article = new Article;
$article->title = "bu ilk hali";
$article->content = "İçeriğimiz daha da hayırlı olsun inşallah";
$article->save();
$article->title = "ama böyle değişmesi lazım";
$article->save();
