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
            <div class="section__title h1"><?=$arParams["DE_BLOCK_NEWS_TITLE"]?></div>
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
                <div class="swiper-wrapper">


                    <? foreach($arResult["ITEMS"] as $arItem): ?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>

                        <div class="card-slider__slide " id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
                            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                          <img border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
                            <?endif?>

                            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                            <div class="card__title"><center><?echo $arItem["NAME"]?></center></div>
                            <?endif;?>
                          <div class="card__text"><center><a href="<?=$arItem['NEWSPAPER_URL']?>">СКАЧАТЬ</a></center></div>
  
                        </div>

                    <?endforeach;?>


                </div>
            </div>
        </div>
    </div>
</section>
