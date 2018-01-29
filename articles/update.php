<?php
require_once "models/Article.php";
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

require "views/update.php";
