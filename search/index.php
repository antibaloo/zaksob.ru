<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результат поиска");
?>


<?$APPLICATION->IncludeComponent(
            "bitrix:search.page", 
            "clear", 
            array(
                    "RESTART" => "N",
                    "CHECK_DATES" => "N",
                    "USE_TITLE_RANK" => "N",
                    "DEFAULT_SORT" => "rank",
                    "arrFILTER" => array(
                            0 => "no",
                    ),
                    "SHOW_WHERE" => "N",
                    "SHOW_WHEN" => "N",
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
                    "SHOW_ITEM_DATE_CHANGE" => "N",
                    "SHOW_ORDER_BY" => "N",
                    "SHOW_TAGS_CLOUD" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "COMPONENT_TEMPLATE" => "clear",
                    "NO_WORD_LOGIC" => "N",
                    "FILTER_NAME" => "",
                    "USE_LANGUAGE_GUESS" => "Y",
                    "SHOW_RATING" => "",
                    "RATING_TYPE" => "",
                    "PATH_TO_USER_PROFILE" => ""
                ),
                false
          );?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>