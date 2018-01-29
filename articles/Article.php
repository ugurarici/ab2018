<?php

class Article
{
  public $id;
  public $title;
  public $content;
  public $created_at;
  public $updated_at;

  protected $connection;

  public function __construct()
  {
    try {
      $this->connection = new PDO(
        "mysql:host=localhost;dbname=ab2018_articles;charset=UTF8",
        "root",
        "root",
        [PDO::ATTR_PERSISTENT => true]
      );
    } catch (PDOException $e) {
      die("Veritabanına bağlanamadık: " . $e->getMessage());
    }
  }

  public function getAll()
  {
    $articles = $this->connection
      ->query("SELECT * FROM articles")
      ->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $articles;
  }

  public function searchArticles($searchTerm)
  {
    $articles = $this->connection
      ->query("SELECT * FROM articles WHERE title LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'")
      ->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $articles;
  }

  public function save()
  {
    if(is_null($this->id)) {
      return $this->create();
    } else {
      return $this->update();
    }
  }

  protected function create()
  {
    $createQuery = $this->connection->prepare(
      "INSERT INTO articles (title, content)
      VALUES
      (:titleInQuery, :contentInQuery)"
    );
    $create = $createQuery->execute(array(
      'titleInQuery'    => $this->title,
      'contentInQuery'  => $this->content
    ));
    $this->id = $this->connection->lastInsertId();
    return $create;
  }

  protected function update()
  {
    $updateQuery = $this->connection->prepare(
      "UPDATE articles SET
      title = :titleInQuery,
      content = :contentInQuery
      WHERE id = :idInQuery"
    );
    $update = $updateQuery->execute(array(
      'titleInQuery'    => $this->title,
      'contentInQuery'  => $this->content,
      'idInQuery'       => $this->id
    ));
    return $update;
  }

  public function delete()
  {
    $delete = $this->connection
      ->exec("DELETE FROM articles WHERE id = $this->id");

    return $delete;
  }

  public static function all()
  {
    $articleWorker = new self;
    return $articleWorker->getAll();
  }

  public static function search($searchTerm)
  {
    $articleWorker = new self;
    return $articleWorker->searchArticles($searchTerm);
  }
}
