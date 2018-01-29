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
      content = :contentInQuery,
      updated_at = CURRENT_TIMESTAMP
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

  public function getPaginated($count = 10, $orderBy = "DESC", $pageSelector = "page")
  {
    //  sayfada kaç tane olacak -> $count
    //  kaçıncı sayfadayım -> $_GET[$pageSelector]
    //  neye göre listelenecek -> $orderBy
    $page = 1;
    if(isset($_GET[$pageSelector])) $page = (int)$_GET[$pageSelector];
    $articles = $this->connection
      ->query("SELECT * FROM articles ORDER BY created_at $orderBy, id DESC LIMIT ".(($page-1)*$count).", $count")
      ->fetchAll(PDO::FETCH_CLASS, 'Article');

    return $articles;
  }

  public function initById($id)
  {
    $result = $this->connection->query("SELECT * FROM articles WHERE id = $id")->fetch(PDO::FETCH_OBJ);
    if(!$result) return false;
    $this->id = $result->id;
    $this->title = $result->title;
    $this->content = $result->content;
    $this->created_at = $result->created_at;
    $this->updated_at = $result->updated_at;
    return $this;
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

  public static function paginate($count = 10, $orderBy = "DESC", $pageSelector = "page")
  {
    $articleWorker = new self;
    return $articleWorker->getPaginated($count, $orderBy, $pageSelector);
  }

  public static function find($id)
  {
    $articleWorker = new self;
    return $articleWorker->initById($id);
  }
}
