<?php

require_once "Article.php";

//  Article yönetim sistemi

//  Article listesini getirmeli
//  Article detayını görüntülemeli

//  Yeni bir Article ekleyebilmeliyim
//  Mevcut Article üzerinde değişiklik yapabilmeliyim
//  Mevcut bir Article'ı silebilmeliyim

// mevcut sayfayı çekip döngüye sokuyoruz

foreach (Article::paginate() as $article): ?>
  <a href="detail.php?id=<?=$article->id?>"><?=$article->title?></a><br>
<?php endforeach; ?>
<hr>
<a href="new.php">Yeni Ekle</a>
