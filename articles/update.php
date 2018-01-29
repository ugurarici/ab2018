<?php
require_once "Article.php";
//  mevcut article'ı güncelleyeceğiz
$article = Article::find((int)$_GET['id']);
//  article yoksa ana sayfaya yallah
if(!$article) {
  header("Location: index.php");
  die();
}

if($_SERVER['REQUEST_METHOD']==="POST") {
  $article->title = $_POST['title'];
  $article->content = $_POST['content'];
  $article->save();
  header("Location: detail.php?id=$article->id");
  die();
}
?>
<form action="update.php?id=<?=$article->id?>" method="post">
  <input type="text" name="title" placeholder="Başlık" value="<?=$article->title?>"><br>
  <textarea name="content"><?=$article->content?></textarea><br>
  <button type="submit">Güncelle</button>
</form>
