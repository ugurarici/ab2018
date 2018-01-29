<?php include "header.php" ?>
<form action="index.php?a=store" method="post">
  <input type="text" name="title" placeholder="Başlık"><br>
  <textarea name="content"></textarea><br>
  <button type="submit">Ekle</button>
</form>
<hr>
<a href="index.php">Geri Dön</a>
<?php include "footer.php" ?>
