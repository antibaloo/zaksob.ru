<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

	 
        $CHAIRMAN = $VICE_CHAIRMAN = $COMPOSITION = $DISTRICT = '';
        $arDeputiesID = $arDeputies = $arDISTRICT = [];
        
        if(!empty($arResult["DISPLAY_PROPERTIES"]["CHAIRMAN"]["VALUE"])){
            $CHAIRMAN = $arResult["DISPLAY_PROPERTIES"]["CHAIRMAN"]["VALUE"];
            $arDeputiesID[] = $arResult["DISPLAY_PROPERTIES"]["CHAIRMAN"]["VALUE"];
        }
        
        if(!empty($arResult["DISPLAY_PROPERTIES"]["VICE_CHAIRMAN"]["VALUE"])){
            $VICE_CHAIRMAN = $arResult["DISPLAY_PROPERTIES"]["VICE_CHAIRMAN"]["VALUE"];
           // $arDeputiesID[] = $arResult["DISPLAY_PROPERTIES"]["VICE_CHAIRMAN"]["VALUE"];
            $arDeputiesID = array_merge($arDeputiesID, $arResult["DISPLAY_PROPERTIES"]["VICE_CHAIRMAN"]["VALUE"]);
        }
        
        if(!empty($arResult["DISPLAY_PROPERTIES"]["COMPOSITION"]["VALUE"])){
            $COMPOSITION = $arResult["DISPLAY_PROPERTIES"]["COMPOSITION"]["VALUE"];
            $arDeputiesID = array_merge($arDeputiesID, $arResult["DISPLAY_PROPERTIES"]["COMPOSITION"]["VALUE"]);
        }

        if(!empty($arDeputiesID)){
            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_POSITION", "PROPERTY_DISTRICT", "PROPERTY_PHONE", "PROPERTY_FAX", "PROPERTY_EMAIL", "PROPERTY_EMAIL_IMG", "DETAIL_PICTURE");
            $arFilter = Array("IBLOCK_ID"=>IBLOCK_DEP, "ID"=>$arDeputiesID, "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
            while($ob = $res->GetNext()){ 
                
                $POSITION = '';
                if(is_array($ob["PROPERTY_POSITION_VALUE"]))
                    $POSITION = $ob["PROPERTY_POSITION_VALUE"]["TEXT"];
                else
                    $POSITION = $ob["PROPERTY_POSITION_VALUE"];
                
                if($ob["PROPERTY_DISTRICT_VALUE"])
                    $arDISTRICT[] = $ob["PROPERTY_DISTRICT_VALUE"];
                
                $IMG = [];
                
                if($ob["DETAIL_PICTURE"]){
                    $thumb_image = CFile::ResizeImageGet($ob["DETAIL_PICTURE"], array("width" => 250, "height" => 309), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
                    $IMG = array(
                        "SRC" => $thumb_image["src"],
                        "WIDTH" => $thumb_image["width"],
                        "HEIGHT" => $thumb_image["height"]
                    );
                    
                }else{
                    $IMG["SRC"] = SITE_TEMPLATE_PATH.NO_IMG;
                }
                
                $arDeputies[$ob["ID"]] = array(
                    "NAME" => $ob["NAME"],
                    "POSITION" => $POSITION,
                    "DISTRICT" => $ob["PROPERTY_DISTRICT_VALUE"],
                    "PHONE" => $ob["PROPERTY_PHONE_VALUE"],
                    "EMAIL" => $ob["PROPERTY_EMAIL_VALUE"],
                    "EMAIL_IMG" => CFile::GetFileArray($ob["PROPERTY_EMAIL_IMG_VALUE"]),
                    "FAX" => $ob["PROPERTY_FAX_VALUE"],
                    "LINK" => $ob["DETAIL_PAGE_URL"],
                    "IMG" => $IMG
                );
            }
        }
        
        if(!empty($arDISTRICT)){
            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_TEXT");
            $arFilter = Array("IBLOCK_ID"=>IBLOCK_CONSTITUENCY, "ID"=>$arDISTRICT, "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
            while($ob = $res->GetNext()){ 
                
                $DISTRICT[$ob["ID"]] = array(
                    "NAME" => $ob["NAME"],
                    "TEXT" => $ob["DETAIL_TEXT"]
                );
            }
            
        }
/*------------------------------------Старый вариант вывода состава по обеспечению деятельногсти комитета-------------------------------------------        
        $arCOMPOSITION = [];
        $DEPARTMENT = '';
        
        if(!empty($arResult["DISPLAY_PROPERTIES"]["DEPARTMENT"]["VALUE"])){
            
            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_POSITION", "PROPERTY_PHONE", "PROPERTY_EMAIL", "PROPERTY_EMAIL_IMG");
            $arFilter = Array("IBLOCK_ID"=>IBLOCK_STAFF_OF_COMMITTEE, "=ID"=>$arResult["DISPLAY_PROPERTIES"]["DEPARTMENT"]["VALUE"], "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
            while($ob = $res->GetNext()){ 
                $arCOMPOSITION[$ob["ID"]] = array(
                    "NAME" => $ob["NAME"],
                    "POSITION" => $ob["PROPERTY_POSITION_VALUE"],
                    "PHONE" => $ob["PROPERTY_PHONE_VALUE"],
                    "EMAIL" => $ob["PROPERTY_EMAIL_VALUE"],
                    "EMAIL_IMG" => CFile::GetFileArray($ob["PROPERTY_EMAIL_IMG_VALUE"]),
                );
            }
            
            $DEPARTMENT = $arResult["DISPLAY_PROPERTIES"]["DEPARTMENT"]["VALUE"];
        }
--------------------------------------Новый вариант вывода состава по обеспечению деятельногсти комитет------------------------------------------------*/        
$arCOMPOSITION_NEW = [];
$DEPARTMENT_NEW = [];
if(!empty($arResult["PROPERTIES"]["DEPARTMENT_NEW"]["VALUE"])){
  $arSelect = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_POSITION", "PROPERTY_PHONE", "PROPERTY_EMAIL");
  $arFilter = array("IBLOCK_ID"=>26, "SECTION_ID"=>$arResult["PROPERTIES"]["DEPARTMENT_NEW"]["VALUE"], "ACTIVE"=>"Y");
  $res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
   while($ob = $res->GetNext()){
                $DEPARTMENT_NEW[] = $ob["ID"];//Список ID котрудников отдела по обеспечению работы комитета
                $arCOMPOSITION_NEW[$ob["ID"]] = array(
                    "NAME" => $ob["NAME"],
                    "POSITION" => $ob["PROPERTY_POSITION_VALUE"],
                    "PHONE" => $ob["PROPERTY_PHONE_VALUE"],
                    "EMAIL" => $ob["PROPERTY_EMAIL_VALUE"],
                );
            }
            
}
/*------------------------------------------------------------------------------------------------*/        
        $news = [];
        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT", "DETAIL_PAGE_URL", "DATE_ACTIVE_FROM", "DATE_CREATE");
        $arFilter = Array("IBLOCK_ID"=>IBLOCK_NEWS, "=PROPERTY_COMMITTEES"=>$arResult["ID"], "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array("ACTIVE_FROM" => "DESC", "SORT" => "ASC"), $arFilter, false, false, $arSelect);
        
        while($ob = $res->GetNext()){ 
            
            $date = '';
            if($ob["DATE_ACTIVE_FROM"]){
                    $date = FormatDate("d.m.Y", MakeTimeStamp($ob["DATE_ACTIVE_FROM"]));            
            }elseif($ob["DATE_CREATE"]){	
                    $date = FormatDate("d.m.Y", MakeTimeStamp($ob["DATE_CREATE"]));
            }
            
            
            if($ob["PREVIEW_PICTURE"]){
                $thumb_image = CFile::ResizeImageGet($ob["PREVIEW_PICTURE"], array("width" => 374, "height" => 220), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
                $IMG = array(
                    "SRC" => $thumb_image["src"],
                    "WIDTH" => $thumb_image["width"],
                    "HEIGHT" => $thumb_image["height"]
                );

            }else{
                $IMG["SRC"] = SITE_TEMPLATE_PATH.NO_IMG;
            }
            
            if(!empty($ob["PREVIEW_TEXT"]))          
                $anons = strip_tags($ob["PREVIEW_TEXT"]);
            else
                $anons = strip_tags($ob["DETAIL_TEXT"]);

            if(iconv_strlen($anons) > 300){
                //$anons = iconv("utf-8", "windows-1251", $anons);
                $anons = substr($anons, 0, 300);
                //$anons = iconv("windows-1251", "utf-8", $anons);

                $anons = rtrim($anons, "!,.-");

                $anons = substr($anons, 0, strrpos($anons, ' '));
                $anons .= "...";

            }
            
            $news[] = array(
                "NAME" => $ob["NAME"],
                "IMG" => $IMG,
                "DATE" => $date,
                "LINK" => $ob["DETAIL_PAGE_URL"],
                "TEXT" => $anons
            );
            
        }
        
        
           
        
        $type = [];
        if(!empty($arResult["DISPLAY_PROPERTIES"]["TYPE"]["VALUE"])){    
            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_GENITIVE");
            $arFilter = Array("IBLOCK_ID"=>IBLOCK_COMIT_TYPE, "=ID"=>$arResult["DISPLAY_PROPERTIES"]["TYPE"]["VALUE"], "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
            while($ob = $res->GetNext()){ 
                $type = array(
                    "NAME" => mb_strtolower($ob["NAME"]),
                    "GENITIVE" => mb_strtolower($ob["PROPERTY_GENITIVE_VALUE"]),
                );
            }
        }

    $arResult["DEPARTMENT_NEW"] = $DEPARTMENT_NEW;
    $arResult["AR_COMPOSITION_NEW"] = $arCOMPOSITION_NEW;
        
    //$arResult["DEPARTMENT"] = $DEPARTMENT;
    //$arResult["AR_COMPOSITION"] = $arCOMPOSITION;
    $arResult["AR_DISTRICT"] = $DISTRICT;
    $arResult["DEPUTY"] = $arDeputies;
    $arResult["COMPOSITION"] = $COMPOSITION;
    $arResult["VICE_CHAIRMAN"] = $VICE_CHAIRMAN;
    $arResult["CHAIRMAN"] = $CHAIRMAN;
    $arResult["NEWS"] = $news;
    $arResult["TYPE"] = $type;
    