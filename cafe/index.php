<?php

require_once "Garson.php";

$ahmet = new Garson;
$ahmet->sipariseEkle('çay');
$ahmet->sipariseEkle('pasta');
$ahmet->siparisleriGetir();

/*
  çay siparişe eklendi
  çay mutfağa bildirildi
  pasta siparişe eklendi
  pasta mutfağa bildirildi
  çay mutfaktan alındı
  pasta mutfaktan alındı
  çay teslim edildi
  pasta teslim edildi
  sipariş tamamlandı
*/
