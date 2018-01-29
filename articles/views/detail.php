<?php include "header.php" ?>
<h1><?=$article->title?></h1>
<?=$article->content?>
<hr>
<small>Oluşturulma: <?=$article->created_at?></small>
<br>
<a href="index.php?a=edit&id=<?=$article->id?>">Düzenle</a> -
<a href="index.php?a=delete&id=<?php echo $article->id?>">Sil</a>
<hr>
<a href="index.php">Tam Listeye Dön</a>
<?php include "footer.php" ?>
