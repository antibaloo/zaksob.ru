<?
function sortActiveDate($a, $b){
  if (strtotime($a['ACTIVE_FROM']) === strtotime($b['ACTIVE_FROM'])) return 0;
  return strtotime($a['ACTIVE_FROM']) < strtotime($b['ACTIVE_FROM']) ? 1 : -1;
}
$maxSlides = 20;
if (count($arResult["ITEMS"]) > $maxSlides){
  $arResult["ITEMS"] = array_slice($arResult["ITEMS"], 0, $maxSlides);
  $arResult["ELEMENTS"] = array_slice($arResult["ELEMENTS"], 0, $maxSlides);
}else{
  $countNews = $maxSlides - count($arResult["ITEMS"]);
}
if ($countNews > 0) {
  $res = CIBlockElement::GetList(array("ACTIVE_FROM" => "DESC"), array("IBLOCK_ID"=>7, "!PROPERTY_SLIDER" => false), false, array("nTopCount" => $countNews), array("PROPERTY_SLIDER","NAME","CODE","DETAIL_PAGE_URL","ACTIVE_FROM"));
  while ($ob = $res->GetNext()){
    $toSlider = array();
    $toSlider["ACTIVE_FROM"] = $ob["ACTIVE_FROM"];
    $toSlider["NAME"] = $ob["NAME"];
    $toSlider["~NAME"] = $ob["NAME"];
    $toSlider["PREVIEW_PICTURE"]["SRC"] = CFile::GetPath($ob["PROPERTY_SLIDER_VALUE"]);
    $toSlider["PREVIEW_PICTURE"]["ALT"] = $ob["NAME"];
    $toSlider["PREVIEW_PICTURE"]["TITLE"] = $ob["NAME"];
    $toSlider["PROPERTIES"]["LINK"]["VALUE"] = $ob["DETAIL_PAGE_URL"];
    $arResult["ITEMS"][] = $toSlider;
  }
  uasort( $arResult["ITEMS"], 'sortActiveDate');
}
?>