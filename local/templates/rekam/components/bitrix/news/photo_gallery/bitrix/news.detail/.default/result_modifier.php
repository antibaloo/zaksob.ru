<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arFiles = [];
if(!empty($arResult["PREVIEW_PICTURE"])){
  $thumb_image = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"]["ID"], array("width" => 373, "height" => 219), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
  $arResult["PREVIEW_PICTURE"]["SRC_2"] = $thumb_image["src"];
  $arResult["PREVIEW_PICTURE"]["WIDTH_2"] = $thumb_image["width"];
  $arResult["PREVIEW_PICTURE"]["HEIGHT_2"] = $thumb_image["height"];
}

if(!empty($arResult["DISPLAY_PROPERTIES"]["PHOTO"]["VALUE"])){
  foreach($arResult["DISPLAY_PROPERTIES"]["PHOTO"]["VALUE"] as $j=>$arPhoto){
    //    PR($arItem["DISPLAY_PROPERTIES"]);
    //    PR($arItem["PREVIEW_PICTURE"]);
    
    
    $file = CFile::GetFileArray($arPhoto);
    $thumb_image = CFile::ResizeImageGet($arPhoto, array("width" => 373, "height" => 219), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
    $arFiles[] = array(
      "SRC" => $file["SRC"],
      "SRC_2" => $thumb_image["src"],
      "WIDTH_2" => $thumb_image["width"],
      "HEIGHT_2" => $thumb_image["height"],
    );
    
    /*   
    
    if(!empty($arItem["DISPLAY_PROPERTIES"]["PHOTO"]["VALUE"])){
    
    if(empty($arItem["PREVIEW_PICTURE"])){            
    $thumb_image = CFile::ResizeImageGet(CFile::GetFileArray($arItem["DISPLAY_PROPERTIES"]["PHOTO"]["VALUE"][0]), array("width" => 373, "height" => 219), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
    $arResult["ITEMS"][$j]["PREVIEW_PICTURE"]["SRC_2"] = $thumb_image["src"];
    $arResult["ITEMS"][$j]["PREVIEW_PICTURE"]["SRC"] =  CFile::GetPath($arItem["DISPLAY_PROPERTIES"]["PHOTO"]["VALUE"][0]);
    }
    
    foreach($arItem["DISPLAY_PROPERTIES"]["PHOTO"]["VALUE"] as $i=>$photoID){
    $arFiles[] = CFile::GetPath($photoID);
    }        
    }
    
    $arResult["ITEMS"]["$j"]["GALLERY"] = $arFiles;
    */
  }
}

$arResult["FILES"] = $arFiles;
/*Фрагмент кода для работы тегов в фотогалерее*/
$dep = [];
if (!empty($arResult["PROPERTIES"]["DEPUTY"]["VALUE"])) {

    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => IBLOCK_DEP, "=ID" => $arResult["PROPERTIES"]["DEPUTY"]["VALUE"], "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array("ACTIVE_FROM" => "DESC", "SORT" => "ASC"), $arFilter, false, false, $arSelect);

    while ($ob = $res->GetNext()) {

        $dep[] = array(
            "NAME" => $ob["NAME"],
            "LINK" => "/press-tsentr/multimedia/fotogalerei/?dep=".$ob["ID"]."&tagName=".$ob["NAME"]
        );
    }
}
$arResult["TAG"]["DEP"] = $dep;

$com = [];
if (!empty($arResult["PROPERTIES"]["COMMITTEES"]["VALUE"])) {

    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => IBLOCK_COMMITTEES, "=ID" => $arResult["PROPERTIES"]["COMMITTEES"]["VALUE"], "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array("ACTIVE_FROM" => "DESC", "SORT" => "ASC"), $arFilter, false, false, $arSelect);

    while ($ob = $res->GetNext()) {

        $com[] = array(
            "NAME" => $ob["NAME"],
            "LINK" => "/press-tsentr/multimedia/fotogalerei/?committees=".$ob["ID"]."&tagName=".$ob["NAME"]
        );
    }
}
$arResult["TAG"]["COMMITTEES"] = $com;

$fractions = [];
if (!empty($arResult["PROPERTIES"]["FRACTIONS"]["VALUE"])) {

    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => IBLOCK_FRACTIONS, "=ID" => $arResult["PROPERTIES"]["FRACTIONS"]["VALUE"], "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array("ACTIVE_FROM" => "DESC", "SORT" => "ASC"), $arFilter, false, false, $arSelect);

    while ($ob = $res->GetNext()) {

        $fractions[] = array(
            "NAME" => $ob["NAME"],
            "LINK" => "/press-tsentr/multimedia/fotogalerei/?fractions=".$ob["ID"]."&tagName=".$ob["NAME"]
        );
    }
}
$arResult["TAG"]["FRACTIONS"] = $fractions;

if (!empty($arResult["PROPERTIES"]["ADVISORY_COUNCIL"]["VALUE"])) {
    $arResult["TAG"]["ADVISORY_COUNCIL"] = array(
        "NAME" => getNewsPropertyName($arResult['ID'], 'ADVISORY_COUNCIL'),
        "LINK" => "/press-tsentr/multimedia/fotogalerei/?advisory_counsil=да&tagName=".getNewsPropertyName($arResult['ID'], 'ADVISORY_COUNCIL')
    );
}

if (!empty($arResult["PROPERTIES"]["YOUTH_PARLIAMENT"]["VALUE"])) {
    $arResult["TAG"]["YOUTH_PARLIAMENT"] = array(
        "NAME" => getNewsPropertyName($arResult['ID'],'YOUTH_PARLIAMENT'),
        "LINK" => "/press-tsentr/multimedia/fotogalerei/?youth_parliament=да&tagName=".getNewsPropertyName($arResult['ID'],'YOUTH_PARLIAMENT')
    );
}

if (!empty($arResult["PROPERTIES"]["ASSOCIATION"]["VALUE"])) {
    $arResult["TAG"]["ASSOCIATION"] = array(
        "NAME" => getNewsPropertyName($arResult['ID'],'ASSOCIATION'),
        "LINK" => "/press-tsentr/multimedia/fotogalerei/?association=да&tagName=".getNewsPropertyName($arResult['ID'],'ASSOCIATION')
    );
}

if (!empty($arResult["PROPERTIES"]["YEARS25"]["VALUE"])) {
    $arResult["TAG"]["YEARS25"] = array(
        "NAME" => getNewsPropertyName($arResult['ID'],'YEARS25'),
        "LINK" => "/press-tsentr/multimedia/fotogalerei/?years25=да&tagName=".getNewsPropertyName($arResult['ID'],'YEARS25')
    );
}
/*Конец фрагмент кода для работы тегов в фотогалерее*/