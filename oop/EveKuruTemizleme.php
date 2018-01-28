<?php

class EveKuruTemizleme extends KuruTemizleme
{
  protected function evdenAl()
  {
    echo $this->camasir . " evden alindi";
    echo "<hr>";
  }

  protected function eveBirak()
  {
    echo $this->camasir . " eve teslim edildi";
    echo "<hr>";
  }

  public function temizle()
  {
    $this->evdenAl();
    parent::temizle();
    $this->eveBirak();
  }
}
