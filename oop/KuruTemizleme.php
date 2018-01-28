<?php

//  KuruTemizleme işlemine ihtiyacımız

class KuruTemizleme
{
  public $camasir;

  public function __construct()
  {
    echo "KuruTemizlemeciye hos geldiniz";
    echo "<hr>";
  }

  public function __destruct()
  {
    echo "bizi tercih ettiginiz icin tesekkurler";
    echo "<hr>";
  }

  public function temizle()
  {
    $this->yika();
    $this->kurula();
    $this->utule();
    $this->paketle();
  }

  protected function yika()
  {
    echo $this->camasir . " yikandi";
    echo "<hr>";
  }

  protected function kurula()
  {
    echo $this->camasir . " kurulandi";
    echo "<hr>";
  }

  protected function utule()
  {
    echo $this->camasir . " utulendi";
    echo "<hr>";
  }

  protected function paketle()
  {
      echo $this->camasir . " paketlendi";
      echo "<hr>";
  }
}
