<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Издания и аналитические материалы");
?><h2>Информационный бюллетень Законодательного Собрания Оренбургской области</h2>
<div class="news_block">
	<div class="news_card">
 <img alt="Парламент Оренбуржья 11 февраля 2020 года" src="/upload/iblock/doc/newspaper/11022020.jpg" title="Парламент Оренбуржья 11 февраля 2020 года"><br>
 <b>Февраль 2020 г.</b><br>
 <a href="/upload/iblock/doc/newspaper/Парламент Оренбуржья 11 февраля 2020 года.pdf">СКАЧАТЬ</a>
	</div>
	<div class="news_card">
 <img alt="Парламент Оренбуржья 30 марта 2020 года" src="/upload/iblock/doc/newspaper/30032020.jpg" title="Парламент Оренбуржья 30 марта 2020 года"><br>
 <b>Март 2020 г.</b><br>
 <a href="/upload/iblock/doc/newspaper/Парламент Оренбуржья 30 марта 2020 года.pdf">СКАЧАТЬ</a>
	</div>
	<div class="news_card">
 <img alt="Парламент Оренбуржья 30 июня 2020 года" src="/upload/iblock/doc/newspaper/30062020.jpg" title="Парламент Оренбуржья 30 июня 2020 года"><br>
 <b>Июнь 2020 г.</b><br>
 <a href="/upload/iblock/doc/newspaper/Парламент Оренбуржья 30 июня 2020 года.pdf">СКАЧАТЬ</a>
	</div>
</div>
 <br>
 <a href="/upload/iblock/doc/projects/Документ.pdf">Ежегодный доклад «О соблюдении и защите прав, свобод и законных интересов детей в Оренбургской области в 2019 году»</a> <br>
 <br>
 <br>
 <a href="/upload/iblock/doc/newspaper/dokl-upch2019.pdf">Ежегодный доклад «О соблюдении прав и свобод человека в Оренбургской области и деятельности Уполномоченного по правам человека в Оренбургской области в 2019 году» </a> <br>
 <br>
<h2>Бюллетени Законодательного Собрания Оренбургской области</h2>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog",
	"bulletin",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ALSO_BUY_ELEMENT_COUNT" => "3",
		"ALSO_BUY_MIN_BUYES" => "2",
		"BASKET_URL" => "/personal/cart/",
		"BIG_DATA_RCM_TYPE" => "bestsell",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"COMPARE_POSITION" => "top left",
		"COMPARE_POSITION_FIXED" => "Y",
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "bulletin",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(0=>"BUY",),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"DETAIL_FB_APP_ID" => "",
		"DETAIL_FB_USE" => "Y",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => "",
		"DETAIL_OFFERS_PROPERTY_CODE" => "",
		"DETAIL_PROPERTY_CODE" => "",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"DETAIL_SHOW_BASIS_PRICE" => "Y",
		"DETAIL_SHOW_MAX_QUANTITY" => "N",
		"DETAIL_STRICT_SECTION_CHECK" => "Y",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_USE_VOTE_RATING" => "Y",
		"DETAIL_VK_USE" => "N",
		"DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "name",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "",
		"FIELDS" => array(0=>"ADDRESS",1=>"PHONE",),
		"FILTER_FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"FILTER_OFFERS_FIELD_CODE" => "",
		"FILTER_OFFERS_PROPERTY_CODE" => array(0=>"",1=>"",),
		"FILTER_PRICE_CODE" => array(),
		"FILTER_PROPERTY_CODE" => array(0=>"",1=>"",),
		"FILTER_VIEW_MODE" => "VERTICAL",
		"FORUM_ID" => "",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "28",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "NEWPRODUCT",
		"LINE_ELEMENT_COUNT" => "3",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_OFFERS_FIELD_CODE" => "",
		"LIST_OFFERS_LIMIT" => "0",
		"LIST_OFFERS_PROPERTY_CODE" => "",
		"LIST_PROPERTY_CODE" => "",
		"MAIN_TITLE" => "Наличие на складах",
		"MESSAGES_PER_PAGE" => "10",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"OFFERS_CART_PROPERTIES" => "",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => "",
		"PAGER_BASE_LINK" => "",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_PARAMS_NAME" => "arrPager",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "15",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"POST_FIRST_MESSAGE" => "N",
		"PRICE_CODE" => array(),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => "",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"REVIEW_AJAX_POST" => "Y",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_VIEW_MODE" => "TEXT",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_TOP_DEPTH" => "1",
		"SEF_FOLDER" => "/press-tsentr/izdaniya-i-analiticheskie-materialy/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => array("sections"=>"","section"=>"#SECTION_CODE#/","element"=>"#SECTION_CODE#/#ELEMENT_CODE#/","compare"=>"compare/","smart_filter"=>"#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"SHOW_LINK_TO_FORUM" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_TOP_ELEMENTS" => "N",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "/examples/index_inc.php",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"STORES" => array(0=>"1",),
		"STORE_PATH" => "/store/#store_id#",
		"TEMPLATE_THEME" => "blue",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_VIEW_MODE" => "SECTION",
		"URL_TEMPLATES_READ" => "",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USER_FIELDS" => "",
		"USE_ALSO_BUY" => "Y",
		"USE_BIG_DATA" => "Y",
		"USE_CAPTCHA" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"USE_COMPARE" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"USE_GIFTS_SECTION" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"USE_MIN_AMOUNT" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_REVIEW" => "N",
		"USE_SALE_BESTSELLERS" => "Y",
		"USE_STORE" => "N"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>