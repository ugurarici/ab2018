<?php include "header.php" ?>
<?php foreach ($articles as $article): ?>
  <a href="index.php?a=detail&id=<?=$article->id?>"><?=$article->title?></a><br>
<?php endforeach; ?>
<hr>
<a href="index.php?a=new">Yeni Ekle</a>
<?php include "footer.php" ?>
