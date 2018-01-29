<?php
require_once "Article.php";

//  yeni bir Article ekleyeceğiz

if($_SERVER['REQUEST_METHOD']==="POST") {
  $article = new Article;
  $article->title = $_POST['title'];
  $article->content = $_POST['content'];
  $article->save();
  header("Location: detail.php?id=$article->id");
  die();
}
?>
<form action="new.php" method="post">
  <input type="text" name="title" placeholder="Başlık"><br>
  <textarea name="content"></textarea><br>
  <button type="submit">Ekle</button>
</form>
