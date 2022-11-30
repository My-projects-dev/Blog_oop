<?php 

if (!is_numeric(@$_GET['sehifeno'])) {
  $sehife = 1;
}else{
  $sehife = @ceil($_GET['sehifeno']);
  if ($sehife < 1) { $sehife = 1;}
}

$db = new DB();
$countdata = $db->count($sql);

$sehife_sayi = ceil($countdata/$Limit);

if($sehife > $sehife_sayi){$sehife = $sehife_sayi;}

$goster = $sehife * $Limit - $Limit;
if ($goster<0) {
  $goster=0;
}

$gorunenSehife = 5;

?>