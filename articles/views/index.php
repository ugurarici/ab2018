<?php include "header.php" ?>
<?php foreach (Article::paginate() as $article): ?>
  <a href="detail.php?id=<?=$article->id?>"><?=$article->title?></a><br>
<?php endforeach; ?>
<hr>
<a href="new.php">Yeni Ekle</a>
<?php include "footer.php" ?>
