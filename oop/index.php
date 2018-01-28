<?php

//  KuruTemizleme işlemine ihtiyacımız
require_once "KuruTemizleme.php";
require_once "EveKuruTemizleme.php";

use EveKuruTemizleme as KuruTemizleme;

//  Bir Kuru temizlemeci çağıracağız
//  kendisine bir çamaşır vereceğiz
//  yıkamasını isteyeceğiz
$temizlemeci = new KuruTemizleme;
$temizlemeci->camasir = "pantul";
$temizlemeci->temizle();
