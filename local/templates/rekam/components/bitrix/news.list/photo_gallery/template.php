<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<section class="section">
    <header class="section__header">
        <?if(!empty($arParams["DE_BLOCK_NEWS_TITLE"])):?>
            <div class="section__title h2"><?=$arParams["DE_BLOCK_NEWS_TITLE"]?></div>
        <?endif;?>
        <?if(!empty($arParams["DE_BLOCK_NEWS_LINK_TEXT"]) && !empty($arParams["DE_BLOCK_NEWS_LINK"])):?>
            <div class="section__header-right">
                <a href="<?=$arParams["DE_BLOCK_NEWS_LINK"]?>" class="section__link"><?=$arParams["DE_BLOCK_NEWS_LINK_TEXT"]?></a>
            </div>
        <?endif;?>
    </header>
    <div class="section__body">
        <div class="card-slider slider">
            <div class="swiper-container">
                <div class="swiper-wrapper" data-js-gallery-container>


                    <? foreach($arResult["ITEMS"] as $arItem): ?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>

                        <div class="card-slider__slide card flow__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
                            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                                    <?/*<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="card__image-wrap">
                                        <img border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC_2"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
                                    </a>*/?>
                            
                                <?$js_gallery = '';
                                if(!empty($arItem["GALLERY"])){
                                    $j = 0;
                                    $js_gallery = array();
                                    foreach($arItem["GALLERY"] as $file){
                                        $js_gallery[] = array(
                                            "index" => $j, 
                                            "type"  => "image", 
                                            "src"   => $file
                                        );
                                        $j++;
                                    }
                                }?>
                                
                            
                                <a data-js-open-gallery data-js-gallery-custom='<?=json_encode($js_gallery)?>' href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="card__image-wrap">

                                    <img border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC_2"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />

                                </a>
                            <?endif?>

                            <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                                <div class="card__date">
                                    <time class="date" datetime="<?echo $arItem["DISPLAY_ACTIVE_FROM"]?>"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></time>
                                </div>
                            <?endif?>

                            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                                <div class="card__title">
                                    <a  href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="card__link"><?echo $arItem["NAME"]?></a>                                
                                </div>
                            <?endif;?>

                            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                                <div class="card__text">
                                    <?echo $arItem["PREVIEW_TEXT"];?>
                                </div>
                            <?endif;?>
                        </div>

                    <?endforeach;?>


                </div>
            </div>
        </div>
    </div>
</section>
