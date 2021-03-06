<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult["TAGS_CHAIN"] = array();
if($arResult["REQUEST"]["~TAGS"])
{
	$res = array_unique(explode(",", $arResult["REQUEST"]["~TAGS"]));
	$url = array();
	foreach ($res as $key => $tags)
	{
		$tags = trim($tags);
		if(!empty($tags))
		{
			$url_without = $res;
			unset($url_without[$key]);
			$url[$tags] = $tags;
			$result = array(
				"TAG_NAME" => htmlspecialcharsex($tags),
				"TAG_PATH" => $APPLICATION->GetCurPageParam("tags=".urlencode(implode(",", $url)), array("tags")),
				"TAG_WITHOUT" => $APPLICATION->GetCurPageParam((count($url_without) > 0 ? "tags=".urlencode(implode(",", $url_without)) : ""), array("tags")),
			);
			$arResult["TAGS_CHAIN"][] = $result;
		}
	}
}


foreach($arResult["SEARCH"] as $j=>$item){
    if($item["PARAM2"] == 28){
      $res = CIBlockElement::GetList(array(), array("IBLOCK_ID"=>28, "ID" => $item["ITEM_ID"]), false, false, array("IBLOCK_SECTION_ID","PROPERTY_FILE","PROPERTY_DATE"));
      if ($ob = $res->GetNext()){
        $res = CIBlockSection::GetByID($ob['IBLOCK_SECTION_ID']);
        if($ar_res = $res->GetNext()) $ob['IBLOCK_SECTION_NAME'] = $ar_res['NAME'];
        if ($ob['IBLOCK_SECTION_NAME']<>"") $arResult["SEARCH"][$j]["BODY_FORMATED"] = "<strong>".$ob['IBLOCK_SECTION_NAME'].":<br></strong>".$arResult["SEARCH"][$j]["BODY_FORMATED"];
        $arFile = CFile::GetFileArray($ob['PROPERTY_FILE_VALUE']);
        $arResult["SEARCH"][$j]["URL"] = $arFile['SRC'];
        $arResult["SEARCH"][$j]["FILE"] = "Y";
        $arResult["SEARCH"][$j]["DATE"] = $ob['PROPERTY_DATE_VALUE'];//Дата принятия
      }
    }
    if($item["PARAM2"] == 26){      
      $res = CIBlockElement::GetList(array(), array("IBLOCK_ID"=>26, "ID" => $item["ITEM_ID"]), false, false, array("IBLOCK_SECTION_ID","PROPERTY_POSITION","PROPERTY_PHONE","PROPERTY_FAX","PROPERTY_EMAIL"));
      if ($ob = $res->GetNext()){
        $res = CIBlockSection::GetByID($ob['IBLOCK_SECTION_ID']);
        if($ar_res = $res->GetNext()) $ob['IBLOCK_SECTION_NAME'] = $ar_res['NAME'];
        $arResult["SEARCH"][$j]["BODY_FORMATED"] = "Подразделение: ".$ob['IBLOCK_SECTION_NAME']."<br>";
        $arResult["SEARCH"][$j]["BODY_FORMATED"] .= "Должность: ".$ob['PROPERTY_POSITION_VALUE']."<br>";
        $arResult["SEARCH"][$j]["BODY_FORMATED"] .= "телефон: ".$ob['PROPERTY_PHONE_VALUE']."<br>";
        if ($ob['PROPERTY_FAX_VALUE']<>"") $arResult["SEARCH"][$j]["BODY_FORMATED"] .= "факс: ".$ob['PROPERTY_FAX_VALUE']."<br>";
        $arResult["SEARCH"][$j]["BODY_FORMATED"] .= "email: ".$ob['PROPERTY_EMAIL_VALUE']."<br>";
      }
    }  
    if($item["PARAM2"] == 22){
        
        $res = CIBlockElement::GetProperty(22, $item["ITEM_ID"], "sort", "asc", array("CODE" => "FULL_NAME"));
        if($ob = $res->GetNext()){
            
            if(!empty($ob['VALUE']))
                $arResult["SEARCH"][$j]["TITLE_FORMATED"] = $ob['VALUE'];
        }
        
        $res = CIBlockElement::GetProperty(22, $item["ITEM_ID"], "sort", "asc", array("CODE" => "FILE"));
        if($ob = $res->GetNext()){
           
            if($ob['VALUE']){
                $arFile = CFile::GetFileArray($ob['VALUE']);
                if($arFile){
                   $arResult["SEARCH"][$j]["URL"] = $arFile["SRC"];
                   $arResult["SEARCH"][$j]["FILE"] = "Y";
                }
            }
        }
      
    }
    
    if($item["PARAM2"] == 21){
      $res = CIBlockElement::GetProperty(21, $item["ITEM_ID"], "sort", "asc", array("CODE" => "DATE"));      
      if($ob = $res->GetNext()) $arResult["SEARCH"][$j]["DATE"] = $ob['VALUE'];//Дата принятия
      $res = CIBlockElement::GetProperty(21, $item["ITEM_ID"], "sort", "asc", array("CODE" => "FILE"));
      if($ob = $res->GetNext()){
        if($ob['VALUE']){
          $arFile = CFile::GetFileArray($ob['VALUE']);
          if($arFile){
            $arResult["SEARCH"][$j]["URL"] = $arFile["SRC"];
            $arResult["SEARCH"][$j]["FILE"] = "Y";
          }
        }
      }
    }
}
?>