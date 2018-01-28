<?php

class Garson
{
  public $siparisListesi = [];

  public function sipariseEkle($urun)
  {
    //  gelen ürün değişkenini siparişe ekleyeceğiz
    $this->siparisListesineEkle($urun);
    //  siparişe eklenen ürün değişikliği mutfağa bildirilecek
    $this->mutfagaBildir($urun);
  }

  protected function siparisListesineEkle($urun)
  {
    $this->siparisListesi[] = $urun;
    echo $urun . " siparişe eklendi<hr>";
  }

  protected function mutfagaBildir($urun)
  {
    echo $urun . " mutfağa bildirildi<hr>";
  }

  public function siparisleriGetir()
  {
    //  sipariş listesindeki ürünleri mutfaktan alacağız
    $this->mutfaktanTeslimAl();
    //  mutfaktan alınan ürünleri masaya teslim edeceğiz
    $this->teslimEt();
  }

  protected function mutfaktanTeslimAl()
  {
    foreach ($this->siparisListesi as $urun) {
      echo $urun . " mutfaktan teslim alındı<hr>";
    }
  }

  protected function teslimEt()
  {
    foreach ($this->siparisListesi as $urun) {
      echo $urun . " teslim edildi<hr>";
    }
  }

  public function __destruct()
  {
    echo "sipariş tamamlandı<hr>";
  }
}
