<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
Bitrix\Main\Diag\Debug::dumpToFile(array('ID' => date("r"), 'fields'=>$_REQUEST ),"","debug.txt");
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
/*--------------------Правки связанные с фильтрацией результатов поиска по разделам---------------------------*/
$sectionFilter = array(
  'a' => '/activity/obshchie-svedeniya/',
  'b' => '/activity/zakonotvorcheskaya-deyatelnost/',
  'c' => '/activity/zasedaniya/',
  'd' => '/activity/byudzhet-orenburgskoy-oblasti/',
  'e' => '/activity/sotrudnichestvo/',
  'f' => '/activity/zakupki/',
  'g' => '/activity/vakansii/',
  'h' => '/activity/kadrovoe-obespechenie/',
  'i' => '/activity/protivodeystvie-korruptsii/',
  'j' => '/servisy/nayti-deputata/sergey-ivanovich-grachev/',
  'k' => '/struktura/zamestiteli-predsedatelya/',
  'l' => '/servisy/nayti-deputata/',
  'm' => '/struktura/',
/*  'n' => '/struktura/komitety/',
  'o' => '/struktura/predstavitel-v-sovete-federatsii/',
  'p' => '/struktura/sovet-zakonodatelnogo-sobraniya/',
  'q' => '/struktura/apparat-zakonodatelnogo-sobraniya/',
  'r' => '/struktura/organy-pri-zakonodatelnom-sobranii/',*/
  's' => '/press-tsentr/multimedia/videomaterialy/',
  't' => '/servisy/oprosy/',
  'u' => '/servisy/moya-zakonodatelnaya-initsiativa/',
  'v' => '/servisy/rabota-s-obrashcheniyami/',
  'w' => '/servisy/grafik-priema-izbirateley/',
  'x' => '/press-tsentr/novosti/',
  'y' => '/press-tsentr/multimedia/fotogalerei/',
  'z' => '/press-tsentr/izdaniya-i-analiticheskie-materialy/'
);
$arResult["REQUEST"]["filterCheck"] = $_REQUEST["filterCheck"];
$filterCheckArray = str_split(implode($_REQUEST["filterCheck"]));
Bitrix\Main\Diag\Debug::dumpToFile(array('ID' => date("r"), 'fields'=>$filterCheckArray),"","debug.txt");
/*-----------------------------------------------------------------------------------------------------------*/
?>