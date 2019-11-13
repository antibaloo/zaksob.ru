<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);
?> 

<?if($APPLICATION->GetCurPage(false) !== SITE_DIR)
    $isMain = false;
else
    $isMain = true;

$show_useful_links = $APPLICATION->GetPageProperty("show_useful_links");
if(($show_useful_links != "Y") && ($show_useful_links != "N") )
    $show_useful_links = $APPLICATION->GetDirProperty("show_useful_links");
?>


            <?if(!$isMain):?>
            
                        </article>
                    </section>
                            
            <? endif; ?>
                
                
                <?if($show_useful_links == "Y"):?>

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "usefullinks",
                        Array(
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "CHECK_DATES" => "Y",
                            "COMPONENT_TEMPLATE" => "infoservices",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_DATE" => "N",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(0=>"",1=>"",),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                            "IBLOCK_ID" => "6",
                            "IBLOCK_TYPE" => "content",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "8",
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
                            "PROPERTY_CODE" => array(0=>"LINK",1=>"",),
                            "SET_BROWSER_TITLE" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SORT_BY1" => "SORT",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER1" => "DESC",
                            "SORT_ORDER2" => "ASC",
                            "STRICT_SECTION_CHECK" => "N",
                            "DE_BLOCK_LINKS_TITLE" => "Полезные ссылки"
                        )
                    );?>
                <?endif;?>
                    
            <?//if(!$isMain):?>
            
                </div>
                            
            <?// endif; ?>
            
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer__wrap">
                <div class="footer__left">
                    <div class="footer__logo">
                        <div class="logo">
                            <a href="./" class="logo__link">
                                <div class="logo__img-wrap">
                                    <?= Tools::includeFile("logo_footer") ?>
                                </div>
                                <div class="logo__text">
                                    <?= Tools::includeFile("footer_name") ?>
                                </div>
                            </a>
                        </div>
                    </div>
                  
                    <div class="footer__aux"></div>
                </div>
                <div class="footer__middle">
                    <address class="address">
                        <div class="address_item" data-address-addr><?= Tools::includeFile("footer_address") ?></div>
                        <div class="address_item" data-address-phone><?= Tools::includeFile("footer_phones") ?></div>
                        <div class="address_item" data-address-fax><?= Tools::includeFile("footer_fax") ?></div>
                        <div class="address_item" data-address-email><?= Tools::includeFile("footer_email") ?></div>
                    </address>
                </div>
                <div class="footer__right">
                    
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:news.list",
                                    "soc_serv",
                                    Array(
                                        "DISPLAY_DATE" => "N",
                                        "DISPLAY_NAME" => "N",
                                        "DISPLAY_PICTURE" => "Y",
                                        "DISPLAY_PREVIEW_TEXT" => "N",
                                        "AJAX_MODE" => "N",
                                        "IBLOCK_TYPE" => "content",
                                        "IBLOCK_ID" => "12",
                                        "NEWS_COUNT" => "7",
                                        "SORT_BY1" => "SORT",
                                        "SORT_ORDER1" => "ASC",
                                        "SORT_BY2" => "ID",
                                        "SORT_ORDER2" => "DESC",
                                        "FILTER_NAME" => "",
                                        "FIELD_CODE" => Array("DETAIL_PICTURE"),
                                        "PROPERTY_CODE" => Array("LINK"),
                                        "CHECK_DATES" => "N",
                                        "DETAIL_URL" => "",
                                        "PREVIEW_TRUNCATE_LEN" => "",
                                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                        "SET_TITLE" => "N",
                                        "SET_BROWSER_TITLE" => "N",
                                        "SET_META_KEYWORDS" => "N",
                                        "SET_META_DESCRIPTION" => "N",
                                        "SET_LAST_MODIFIED" => "N",
                                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                        "ADD_SECTIONS_CHAIN" => "N",
                                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                        "PARENT_SECTION" => "",
                                        "PARENT_SECTION_CODE" => "",
                                        "INCLUDE_SUBSECTIONS" => "N",
                                        "CACHE_TYPE" => "A",
                                        "CACHE_TIME" => "3600",
                                        "CACHE_FILTER" => "Y",
                                        "CACHE_GROUPS" => "Y",
                                        "DISPLAY_TOP_PAGER" => "N",
                                        "DISPLAY_BOTTOM_PAGER" => "N",
                                        "PAGER_TITLE" => "",
                                        "PAGER_SHOW_ALWAYS" => "N",
                                        "PAGER_TEMPLATE" => "",
                                        "PAGER_DESC_NUMBERING" => "Y",
                                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                        "PAGER_SHOW_ALL" => "Y",
                                        "PAGER_BASE_LINK_ENABLE" => "Y",
                                        "SET_STATUS_404" => "Y",
                                        "SHOW_404" => "Y",
                                        "MESSAGE_404" => "",
                                        "PAGER_BASE_LINK" => "",
                                        "PAGER_PARAMS_NAME" => "arrPager",
                                        "AJAX_OPTION_JUMP" => "N",
                                        "AJAX_OPTION_STYLE" => "Y",
                                        "AJAX_OPTION_HISTORY" => "N",
                                        "AJAX_OPTION_ADDITIONAL" => "",
                                        "DE_BLOCK_TITLE" => "Мы в социальных сетях"
                                    )
                                );?>
                </div>
            </div>
        </div>
    </footer>
</div>


<div class="modal modal--no-closer" id="modal-small" role="alert"></div>
<div class="modal modal--large" id="modal-large" role="alert"></div>


    <div class="overlay"></div>

    <div class="visually-impaired-panel" data-vi-panel>
        <div class="container visually-impaired-panel__wrapper">
            <div class="visually-impaired-panel__col">
                <div class="visually-impaired-panel__col-title">Размер шрифта</div>
                <div class="visually-impaired-panel__col-wrapper"><a class="visually-impaired-panel__btn visually-impaired-panel__btn--fsmall" href="#" data-font="small">а   </a><a class="visually-impaired-panel__btn visually-impaired-panel__btn--fmedium" href="#" data-font="medium">а</a><a class="visually-impaired-panel__btn visually-impaired-panel__btn--flarge" href="#" data-font="large">а</a></div>
            </div>
            <div class="visually-impaired-panel__col">
                <div class="visually-impaired-panel__col-title">Кёрнинг</div>
                <div class="visually-impaired-panel__col-wrapper"><a class="visually-impaired-panel__btn visually-impaired-panel__btn--ksmall" href="#" data-kerning="small">aa  </a><a class="visually-impaired-panel__btn visually-impaired-panel__btn--klarge" href="#" data-kerning="large">aa</a></div>
            </div>
            <div class="visually-impaired-panel__col">
                <div class="visually-impaired-panel__col-title">Цветовая гамма</div>
                <div class="visually-impaired-panel__col-wrapper"><a class="visually-impaired-panel__btn visually-impaired-panel__btn--hc1" href="#" data-high-contrast="1">ц  </a><a class="visually-impaired-panel__btn visually-impaired-panel__btn--hc2" href="#" data-high-contrast="2">ц</a><a class="visually-impaired-panel__btn visually-impaired-panel__btn--hc3" href="#" data-high-contrast="3">ц</a></div>
            </div>
            <div class="visually-impaired-panel__col">
                <div class="visually-impaired-panel__col-wrapper">
                    <div class="visually-impaired-panel__col-title"><a href="#" data-exit-vi="">К обычному виду</a></div>
                </div>
            </div>
        </div>
    </div>

    <?
    $APPLICATION->AddHeadScript( SITE_TEMPLATE_PATH . FRONTEND_TEMPLATE_PATH . "/bundle.js");
    ?>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(9429553, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/9429553" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>