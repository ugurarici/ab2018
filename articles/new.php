<?php
require_once "models/Article.php";

//  yeni bir Article ekleyeceğiz

if($_SERVER['REQUEST_METHOD']==="POST") {
  $article = new Article;
  $article->title = $_POST['title'];
  $article->content = $_POST['content'];
  $article->save();
  header("Location: detail.php?id=$article->id");
  die();
}

require "views/new.php";
