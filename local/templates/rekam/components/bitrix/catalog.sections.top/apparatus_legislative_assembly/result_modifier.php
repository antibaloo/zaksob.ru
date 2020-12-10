<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSecrionID = [];
$SectionSort = [];
$arNewSection = [];

foreach($arResult["SECTIONS"] as $i=>$arSection){
    
    if($arSection["DEPTH_LEVEL"] > 1)
        $SectionSort[$arSection["IBLOCK_SECTION_ID"]][] = $arSection["ID"];
    else
        $SectionSort[$arSection["ID"]] = [];
   
    $arSecrionID[] = $arSection["ID"];
  
    foreach($arSection["ITEMS"] as $j=>$arItem){
        $arResult["SECTIONS"][$i]["ITEMS"][$j]["SHOW"] = array(
            "NAME" => $arItem["NAME"],
            "PHONE" => $arItem["PROPERTIES"]["PHONE"]["VALUE"],
            "POSITION" => $arItem["PROPERTIES"]["POSITION"]["VALUE"],
            "EMAIL" => $arItem["PROPERTIES"]["EMAIL"]["VALUE"],
            "FAX" => $arItem["PROPERTIES"]["FAX"]["VALUE"],
            "SORT" => $arItem["PROPERTIES"]["FAX"]["SORT"],
            "EMAIL_IMG" => CFile::GetFileArray($arItem["PROPERTIES"]["EMAIL_IMG"]["VALUE"])
        );
    }

    //сортируем внутри массива
    $names = array_column($arResult["SECTIONS"][$i]["ITEMS"], 'SORT');
    array_multisort($names, SORT_ASC, $arResult["SECTIONS"][$i]["ITEMS"]);

    $arNewSection[$arSection["ID"]] = $arResult["SECTIONS"][$i];
}

$arResult["SECTIONS"] = $arNewSection;

$COMMITTEE_EMPLOYEES = [];

$arSelect = Array("ID", "NAME", "PROPERTY_APPARATUS", "PROPERTY_POSITION", "PROPERTY_PHONE", "PROPERTY_EMAIL", "PROPERTY_EMAIL_IMG", "SORT");
$arFilter = Array("IBLOCK_ID"=>COMMITTEE_EMPLOYEES, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_APPARATUS" => $arSecrionID);
$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
while($ob = $res->GetNext()){
    $COMMITTEE_EMPLOYEES[$ob["PROPERTY_APPARATUS_VALUE"]][] = array(
            "NAME"      => $ob["NAME"],
            "PHONE"     => $ob["PROPERTY_PHONE_VALUE"],
            "POSITION"  => $ob["PROPERTY_POSITION_VALUE"],
            "EMAIL"     => $ob["PROPERTY_EMAIL_VALUE"],
            "EMAIL_IMG" => CFile::GetFileArray($ob["PROPERTY_EMAIL_IMG_VALUE"])
    );
}
$arResult["COMMITTEE_EMPLOYEES"] = $COMMITTEE_EMPLOYEES;
$strSectionSort = [];

foreach($SectionSort as $k=>$id){
  $strSectionSort[] = $k;
  $strSectionSort = array_merge($strSectionSort, $id);
}
$arResult["SECTION_SORT"] = $strSectionSort;