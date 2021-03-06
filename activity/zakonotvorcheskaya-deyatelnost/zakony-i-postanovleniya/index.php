<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Законы и постановления");
CJSCore::Init(array("date"));
?>

<?
global $arFilter;
$arFilter = [];
if (!empty($_REQUEST['q'])){
  $arFilter['%PROPERTY_FULL_NAME'] = $_REQUEST['q'];  
}
if (!empty($_REQUEST['from'])){
  $arFilter['>=PROPERTY_DATE'] =  ConvertDateTime($_REQUEST['from'], "YYYY-MM-DD");  
}
if (!empty($_REQUEST['to'])){
  $arFilter['<=PROPERTY_DATE'] =  ConvertDateTime($_REQUEST['to'], "YYYY-MM-DD");  
}
?>
 <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list", 
                    "laws_and_regulations", 
                    array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "N",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "CHECK_DATES" => "Y",
                            "COMPONENT_TEMPLATE" => "news",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(
                                    0 => "PREVIEW_TEXT",
                                    1 => "",
                            ),
                            "FILTER_NAME" => "arFilter",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                            "IBLOCK_ID" => "21",
                            "IBLOCK_TYPE" => "content",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "20",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => array(
                                    0 => "DATE",
                                    1 => "FILE",
                                    2 => "FULL_NAME",
                            ),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "property_DATE",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "STRICT_SECTION_CHECK" => "N",
                    ),
                    false
            );?>

<?/*
<a target="_blank" href="http://zaksob.ru/doc.aspx?id=2498">О внесении изменений в Закон Оренбургской области «О бюджетном процессе в Оренбургской области» (1347)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2497">О внесении изменений в Закон Оренбургской области «О дорожном фонде Оренбургской области» (1345)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2499">О внесении изменений в Закон Оренбургской области «О межбюджетных отношениях в Оренбургской области» (1348)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2500">О внесении изменений в Закон Оренбургской области «О наделении органов местного самоуправления муниципальных районов государственными полномочиями Оренбургской области по расчету и предоставлению дотаций бюджетам поселений на выравнивание бюджетной обеспеченности за счет средств областного бюджета» (1349)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2507">О внесении изменений в Закон Оренбургской области «О наделении органов местного самоуправления Оренбургской области отдельными государственными полномочиями по защите населения от болезней, общих для человека и животных, в части сбора, утилизации и уничтожения биологических отходов» (1370)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2494">О внесении изменений в Закон Оренбургской области «О налоге на имущество организаций» (1344)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2503">О внесении изменений в Закон Оренбургской области «О порядке осуществления муниципального земельного контроля на территории Оренбургской области» (1355)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2501">О внесении изменений в Закон Оренбургской области «О разграничении полномочий органов государственной власти Оренбургской области в сфере лесных отношений на территории Оренбургской области» (1353)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2506">О внесении изменений в Закон Оренбургской области «О регулировании отдельных вопросов в сфере содействия занятости населения в Оренбургской области» (1359)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2505">О внесении изменений в Закон Оренбургской области «Об установлении пенсии за выслугу лет государственным гражданским служащим Оренбургской области» (1358)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2502">О внесении изменений в отдельные законодательные акты Оренбургской области (1354)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2512">О внесении изменений в отдельные законодательные акты Оренбургской области (1369)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2513">О внесении изменений в отдельные законодательные акты Оренбургской области (1373)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2524">О внесении изменений в план работы Законодательного Собрания Оренбургской области на 2018 год (1368)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2496">О внесении изменений в Регламент Законодательного Собрания Оренбургской области (1367)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2510">О внесении изменения в Закон Оренбургской области «О ведомственном контроле за соблюдением трудового законодательства и иных нормативных правовых актов, содержащих нормы трудового права» (1360)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2508">О внесении изменения в Закон Оренбургской области «О личном подсобном хозяйстве» (1371)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2504">О внесении изменения в Закон Оренбургской области «О пособии на ребенка гражданам, имеющим детей» (1357)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2511">О внесении изменения в Закон Оренбургской области «Об образовании в Оренбургской области» (1365)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2495">О внесении изменения в постановление Законодательного Собрания Оренбургской области «Об утверждении порядка работы комиссии по соблюдению требований к служебному поведению государственных гражданских служащих, замещающих должности государственной гражданской службы Оренбургской области в аппарате Законодательного Собрания Оренбургской области, и урегулированию конфликта интересов» (1366)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2509">О назначении мировыми судьями Оренбургской области (1374)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2519">О поручении Счетной палате Оренбургской области на проведение контрольных мероприятий в 2019 году (1356)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2517">О принятии в первом чтении проекта закона Оренбургской области «О бюджете Территориального фонда обязательного медицинского страхования Оренбургской области на 2019 год и на плановый период 2020 и 2021 годов» и об основных характеристиках бюджета Территориального фонда обязательного медицинского страхования Оренбургской области (1351)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2516">О принятии в первом чтении проекта закона Оренбургской области «Об областном бюджете на 2019 год и на плановый период 2020 и 2021 годов» и об основных характеристиках областного бюджета (1350)</a><br>
 Дата принятия: 29 ноября 2018 г.<br>
 <br>
 <a target="_blank" href="http://zaksob.ru/doc.aspx?id=2514">О проекте закона Оренбургской области «О внесении изменений в Закон Оренбургской области «О налоге на имущество организаций» (1343)</a><br>
Дата принятия: 29 ноября 2018 г.
    */?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>