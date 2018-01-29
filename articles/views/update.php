<?php include "header.php" ?>
<form action="update.php?id=<?=$article->id?>" method="post">
  <input type="text" name="title" placeholder="Başlık" value="<?=$article->title?>"><br>
  <textarea name="content"><?=$article->content?></textarea><br>
  <button type="submit">Güncelle</button>
</form>
<hr>
<a href="index.php">Geri Dön</a>
<?php include "footer.php" ?>
