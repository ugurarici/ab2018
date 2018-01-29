<?php
require_once "models/Article.php";
//  burada ilgili article'ın detayını göstereceğiz
$article = Article::find((int)$_GET['id']);
if(!$article) {
  header("Location: index.php");
  die();
}

require "views/detail.php";
