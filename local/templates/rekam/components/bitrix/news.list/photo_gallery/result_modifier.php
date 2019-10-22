<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if ($arResult["ID"]!=7){
  foreach($arResult["ITEMS"] as $j=>$arItem){
    //    PR($arItem["DISPLAY_PROPERTIES"]);
    //    PR($arItem["PREVIEW_PICTURE"]);
    
    $arFiles = [];
    
    if(!empty($arItem["PREVIEW_PICTURE"])){
      $thumb_image = CFile::ResizeImageGet(CFile::GetFileArray($arItem["PREVIEW_PICTURE"]["ID"]), array("width" => 373, "height" => 219), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
      $arResult["ITEMS"][$j]["PREVIEW_PICTURE"]["SRC_2"] = $thumb_image["src"];
      $arResult["ITEMS"][$j]["PREVIEW_PICTURE"]["WIDTH_2"] = $thumb_image["width"];
      $arResult["ITEMS"][$j]["PREVIEW_PICTURE"]["HEIGHT_2"] = $thumb_image["height"];
      $arFiles[] = $arItem["PREVIEW_PICTURE"]["SRC"];
    }
    
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
  }
}else{
  
}