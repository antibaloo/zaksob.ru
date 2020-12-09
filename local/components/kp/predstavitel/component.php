<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (CModule::IncludeModule('iblock')){
  $arSelect = array("IBLOCK_ID", "ID", "NAME","DATE_CREATE", "PREVIEW_PICTURE","PROPERTY_*",);
  $arFilter = array("IBLOCK_ID"=>31, "ACTIVE"=>"Y");
  $arSort = array("DATE_CREATE"=>"DESC");
  $res = CIBlockElement::GetList($arSort, $arFilter, false, array("nPageSize"=>50), $arSelect);
  while($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();
    //$arResult[] = array_merge($arFields, $arProps);
    $predstavitel = array(
      "NAME" => $arFields["NAME"],
      "PHOTO" => CFile::GetPath($arFields["PREVIEW_PICTURE"]),
      "POSITION" => $arProps["POSITION"]["VALUE"]["TEXT"],
      "DATE_OF_BIRTH" => $arProps["DATE_OF_BIRTH"]["VALUE"],
      "PHONE" => explode("," ,$arProps["PHONE"]["VALUE"]),
      "EMAIL" => $arProps["EMAIL"]["VALUE"],
      "BIOGRAPHY"  => $arProps["BIOGRAPHY"]["VALUE"]["TEXT"]
    );
    $reports = array();
    for ($j = 0; $j < count ($arProps["REPORTS"]["VALUE"]);$j++){
      $reports[] = array(
        'DESCRIPTION' => $arProps["REPORTS"]["DESCRIPTION"][$j],
        'FILE' => CFile::GetPath($arProps["REPORTS"]["VALUE"][$j])
      );
    }
    $predstavitel["REPORTS"] = $reports;
    $arResult[] = $predstavitel;
  }
  $this->IncludeComponentTemplate();
}
?>