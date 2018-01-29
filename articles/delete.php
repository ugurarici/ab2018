<?php
require_once "Article.php";
//  mevcut article'ı sileceğiz
$article = Article::find((int)$_GET['id']);
//  article yoksa ana sayfaya yallah
if(!$article) {
  header("Location: index.php");
  die();
}

$article->delete();
header("Location: index.php");
die();
