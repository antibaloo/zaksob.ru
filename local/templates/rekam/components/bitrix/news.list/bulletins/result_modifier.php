<?php
/** @var array $arResult */
foreach ($arResult["ITEMS"] as $j => $item) {
  $arResult["ITEMS"][$j]['NEWSPAPER_URL'] = CFile::GetPath($item['PROPERTIES']['FILE']['VALUE']);
}