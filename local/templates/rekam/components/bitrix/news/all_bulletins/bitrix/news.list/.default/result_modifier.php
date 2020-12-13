<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach ($arResult["ITEMS"] as $j => $item) {
  $arResult["ITEMS"][$j]['NEWSPAPER_URL'] = CFile::GetPath($item['PROPERTIES']['FILE']['VALUE']);
}
         
    foreach($arResult["ITEMS"] as $j=>$item){
        if($item["PREVIEW_PICTURE"]["ID"]){
            $thumb_image = CFile::ResizeImageGet($item["PREVIEW_PICTURE"]["ID"], array("width" => 490, "height" => 279), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
            $arResult["ITEMS"][$j]["PREVIEW_PICTURE"]["SRC"] = $thumb_image["src"];
            $arResult["ITEMS"][$j]["PREVIEW_PICTURE"]["WIDTH"] = $thumb_image["width"];
            $arResult["ITEMS"][$j]["PREVIEW_PICTURE"]["HEIGHT"] = $thumb_image["height"];
        }else{
            $arResult["ITEMS"][$j]["PREVIEW_PICTURE"]["SRC"] =  SITE_TEMPLATE_PATH.NO_IMG;
        }
        
        if($item["ACTIVE_FROM"]){
		$arResult["ITEMS"][$j]["SHOW_DATE"] = FormatDate("d.m.Y", MakeTimeStamp($item["ACTIVE_FROM"]));            
        }elseif($item["DATE_CREATE"]){	
		$arResult["ITEMS"][$j]["SHOW_DATE"] = FormatDate("d.m.Y", MakeTimeStamp($item["DATE_CREATE"]));
	}
        
        
    $anons = strip_tags($arResult["ITEMS"][$j]["PREVIEW_TEXT"]);

    if(iconv_strlen($anons) > 300){
            //$anons = iconv("utf-8", "windows-1251", $anons);
            $anons = substr($anons, 0, 300);
            //$anons = iconv("windows-1251", "utf-8", $anons);

            $anons = rtrim($anons, "!,.-");

            $anons = substr($anons, 0, strrpos($anons, ' '));
            $anons .= "...";

    }
    
    $arResult["ITEMS"][$j]["PREVIEW_TEXT"] = $anons;
    
        
    }
    
    if($arParams["DE_NEWS_DEP_ID"]){
        
        $res = CIBlockElement::GetByID($arParams["DE_NEWS_DEP_ID"]);
        if($ar_res = $res->GetNext()){
            $arResult["DEP_NAME"] = $ar_res['NAME'];
            $cp = $this->__component;
            $cp->SetResultCacheKeys(array("DEP_NAME"));
        }
    }
    
    