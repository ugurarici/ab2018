<?php
require_once "Article.php";
//  burada ilgili article'ın detayını göstereceğiz
$article = Article::find((int)$_GET['id']);
if(!$article) {
  header("Location: index.php");
  die();
}
?>
<h1><?=$article->title?></h1>
<?=$article->content?>
<hr>
<small>Oluşturulma: <?=$article->created_at?></small>
<br>
<a href="update.php?id=<?=$article->id?>">Düzenle</a> - 
<a href="delete.php?id=<?php echo $article->id?>">Sil</a>
<hr>
<a href="index.php">Tam Listeye Dön</a>
