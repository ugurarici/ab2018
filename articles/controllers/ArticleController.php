<?php

class ArticleController
{
  public static function index()
  {
    $articles = Article::paginate();
    require "views/index.php";
  }

  public static function new()
  {
    require "views/new.php";
  }

  public static function store()
  {
    $article = new Article;
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->save();
    header("Location: index.php?a=detail&id=$article->id");
    die();
  }

  public static function detail()
  {
    $article = Article::find((int)$_GET['id']);
    if(!$article) {
      header("Location: index.php");
      die();
    }

    require "views/detail.php";
  }

  public static function edit()
  {
    //  mevcut article'ı güncelleyeceğiz
    $article = Article::find((int)$_GET['id']);
    //  article yoksa ana sayfaya yallah
    if(!$article) {
      header("Location: index.php");
      die();
    }

    require "views/update.php";
  }

  public static function update()
  {
    $article = Article::find((int)$_GET['id']);
    //  article yoksa ana sayfaya yallah
    if(!$article) {
      header("Location: index.php");
      die();
    }

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->save();
    header("Location: index.php?a=detail&id=$article->id");
    die();
  }

  public static function delete()
  {
    $article = Article::find((int)$_GET['id']);
    //  article yoksa ana sayfaya yallah
    if(!$article) {
      header("Location: index.php");
      die();
    }

    $article->delete();
    header("Location: index.php");
    die();
  }
}
