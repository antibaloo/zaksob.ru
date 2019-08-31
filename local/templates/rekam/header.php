<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);

if($APPLICATION->GetCurPage(false) !== SITE_DIR)
    $isMain = false;
else
    $isMain = true;

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <script>
        var INLINE_SVG_REVISION = <?= filemtime($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/frontend/assets/icons.svg') ?>;
        var SITE_TEMPLATE_PATH = "<?= SITE_TEMPLATE_PATH ?>";
        var SITE_LANG = "<?= LANGUAGE_ID ?>";
    </script>
    <? $APPLICATION->ShowHead(); ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn:700&amp;text=%D0%97%D0%B0%D0%BA%D0%BE%D0%BD%D0%B4%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D1%81%D0%A1%D0%B1%D0%9E%D1%80%D0%B8%D1%83%D0%B3%D0%B9%20&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=cyrillic" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <?
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.FRONTEND_TEMPLATE_PATH . "/main.css");
    ?>
</head>
<body>
    <?= $APPLICATION->ShowPanel(); ?>
    <div class="flow-container ">
        <header class="header">
            <div class="header__wrap container">
                <div class="header__logo">
                    <div class="logo">
                        <a href="/" class="logo__link">
                            <div class="logo__img-wrap">
                                <?= Tools::includeFile("logo_header") ?>
                            </div>
                            <div class="logo__text">
                                <?= Tools::includeFile("header_name") ?>
                            </div>
                        </a>
                    </div>
                </div>
                
                
                <?$APPLICATION->IncludeComponent(
                    "bitrix:search.title", 
                    "", 
                    array(
//                            "NUM_CATEGORIES" => "1",
//                            "TOP_COUNT" => "5",
                            "CHECK_DATES" => "N",
                            "SHOW_OTHERS" => "N",
                            "PAGE" => SITE_DIR."search/",
//                            "CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS") ,
//                            "CATEGORY_0" => array(
//                                0 => "iblock_catalog",
//                            ),
//                            "CATEGORY_0_iblock_catalog" => array(
//                                0 => "all",
//                            ),
                            "CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
                            "SHOW_INPUT" => "Y",
                            "INPUT_ID" => "title-search-input",
                            "CONTAINER_ID" => "search",
                            "PRICE_CODE" => array(
                                0 => "BASE",
                            ),
                            "SHOW_PREVIEW" => "Y",
                            "PREVIEW_WIDTH" => "75",
                            "PREVIEW_HEIGHT" => "75",
                            "CONVERT_CURRENCY" => "Y"
                        ),
                        false
                );?>
                
                <div class="header__for-disabled">
                    <div class="for-disabled" data-open-vi-panel>
                        <div class="for-disabled__icon-wrap">
                            <svg class="i-icon">
                                <use xlink:href="#icon-glasses"></use>
                            </svg>
                        </div>
                        <div class="for-disabled__text">
                            <?= Tools::includeFile("header_visually_impaired") ?>
                        </div>
                    </div>
                </div>
                
                
                <?$APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "top",
                                Array(
                                    "ROOT_MENU_TYPE" => "top", 
                                    "MAX_LEVEL" => "2", 
                                    "CHILD_MENU_TYPE" => "left", 
                                    "USE_EXT" => "Y",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "Y",
                                    "MENU_CACHE_TYPE" => "N", 
                                    "MENU_CACHE_TIME" => "3600", 
                                    "MENU_CACHE_USE_GROUPS" => "Y", 
                                    "MENU_CACHE_GET_VARS" => "" 
                                )
                            );?>
            </div>
        </header>
        <div class="content">
            <div class="page <?= PageMain::pageClass() ?>">
                <div class="container">
                
                <?if(!$isMain):?>
                    
                    
                    <?$APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb",
                            "",
                            Array(
                                "START_FROM" => "0",
                                "PATH" => "",
                                "SITE_ID" => "s1"
                            )
                        );?>
                        

                    <section class="section">
                      <header class="section__header">
                        <h1 class="section__title h1"><?=$APPLICATION->ShowTitle()?></h1>
                      </header>
                      <article class="section__body">
                <?endif;?>
                