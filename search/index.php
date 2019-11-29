<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результат поиска");
global $arrFilter;
//$arrFilter=array("%SITE_URL" => "novosti");
//$arrFilter=array("?PARAM1" => "news|deputies");
//$arrFilter=array("!=PARAM1" => "news");
//$arrFilter=array("%DETAIL_PAGE_URL" => "novosti");
/*$arrFilter=array(
  "LOGIC" => "AND",
  array(
    "=PARAM1" => "deputies",
  ),
  array(
    "=PARAM1" => "news",
  )
);*/
if($_REQUEST["module_id"]) $arrFilter["=MODULE_ID"] = $_REQUEST["module_id"];
//if($_REQUEST["param2"]) $arrFilter[$_REQUEST["countParam2"]] = $_REQUEST["param2"];
if($_REQUEST["param2"]) $arrFilter["=PARAM2"] = explode("|",$_REQUEST["param2"]);
//if($_REQUEST["dep"]) $arrFilter["=PROPERTY_DEPUTY"] = $_REQUEST["dep"];
?>

<?$APPLICATION->IncludeComponent(
            "bitrix:search.page", 
            "clear", 
            array(
                    "SHOW_ITEM_PATH" => "Y",
                    "RESTART" => "N",
                    "CHECK_DATES" => "N",
                    "USE_TITLE_RANK" => "N",
                    "DEFAULT_SORT" => "rank",
                    "arrFILTER" => array(
                            0 => "no"
                    ),
                    "SHOW_WHERE" => "N",
                    "SHOW_WHEN" => "Y",
                    "PAGE_RESULT_COUNT" => "20",
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_SHADOW" => "Y",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "DISPLAY_TOP_PAGER" => "Y",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Результаты поиска",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "",
                    "USE_SUGGEST" => "N",
                    "SHOW_ITEM_TAGS" => "N",
                    "SHOW_ITEM_DATE_CHANGE" => "Y",
                    "SHOW_ORDER_BY" => "Y",
                    "SHOW_TAGS_CLOUD" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "COMPONENT_TEMPLATE" => "clear",
                    "NO_WORD_LOGIC" => "N",
                    "FILTER_NAME" => "arrFilter",
                    "USE_LANGUAGE_GUESS" => "Y",
                    "SHOW_RATING" => "",
                    "RATING_TYPE" => "",
                    "PATH_TO_USER_PROFILE" => ""
                ),
                false
          );?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>