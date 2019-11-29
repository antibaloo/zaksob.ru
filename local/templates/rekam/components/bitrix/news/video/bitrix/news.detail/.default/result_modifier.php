<?
/*Фрагмента кода для работы тегов в видегалерее*/
$dep = [];
if (!empty($arResult["PROPERTIES"]["DEPUTY"]["VALUE"])) {

    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL");
    $arFilter = Array("IBLOCK_ID" => IBLOCK_DEP, "=ID" => $arResult["PROPERTIES"]["DEPUTY"]["VALUE"], "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array("ACTIVE_FROM" => "DESC", "SORT" => "ASC"), $arFilter, false, false, $arSelect);

    while ($ob = $res->GetNext()) {

        $dep[] = array(
            "NAME" => $ob["NAME"],
            "LINK" => "/press-tsentr/multimedia/videomaterialy/?dep=".$ob["ID"]."&tagName=".$ob["NAME"]
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
            "LINK" => "/press-tsentr/multimedia/videomaterialy/?committees=".$ob["ID"]."&tagName=".$ob["NAME"]
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
            "LINK" => "/press-tsentr/multimedia/videomaterialy/?fractions=".$ob["ID"]."&tagName=".$ob["NAME"]
        );
    }
}
$arResult["TAG"]["FRACTIONS"] = $fractions;

if (!empty($arResult["PROPERTIES"]["ADVISORY_COUNCIL"]["VALUE"])) {
    $arResult["TAG"]["ADVISORY_COUNCIL"] = array(
        "NAME" => getNewsPropertyName($arResult['ID'], 'ADVISORY_COUNCIL'),
        "LINK" => "/press-tsentr/multimedia/videomaterialy/?advisory_counsil=да&tagName=".getNewsPropertyName($arResult['ID'], 'ADVISORY_COUNCIL')
    );
}

if (!empty($arResult["PROPERTIES"]["YOUTH_PARLIAMENT"]["VALUE"])) {
    $arResult["TAG"]["YOUTH_PARLIAMENT"] = array(
        "NAME" => getNewsPropertyName($arResult['ID'],'YOUTH_PARLIAMENT'),
        "LINK" => "/press-tsentr/multimedia/videomaterialy/?youth_parliament=да&tagName=".getNewsPropertyName($arResult['ID'],'YOUTH_PARLIAMENT')
    );
}

if (!empty($arResult["PROPERTIES"]["ASSOCIATION"]["VALUE"])) {
    $arResult["TAG"]["ASSOCIATION"] = array(
        "NAME" => getNewsPropertyName($arResult['ID'],'ASSOCIATION'),
        "LINK" => "/press-tsentr/multimedia/videomaterialy/?association=да&tagName=".getNewsPropertyName($arResult['ID'],'ASSOCIATION')
    );
}

if (!empty($arResult["PROPERTIES"]["YEARS25"]["VALUE"])) {
    $arResult["TAG"]["YEARS25"] = array(
        "NAME" => getNewsPropertyName($arResult['ID'],'YEARS25'),
        "LINK" => "/press-tsentr/multimedia/videomaterialy/?years25=да&tagName=".getNewsPropertyName($arResult['ID'],'YEARS25')
    );
}
/*Конец фрагмента кода для работы тегов в видегалерее*/
?>