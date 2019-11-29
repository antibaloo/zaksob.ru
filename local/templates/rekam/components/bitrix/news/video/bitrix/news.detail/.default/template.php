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
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
                
        <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
            <div class="card__date">
                <time class="date" datetime="<?echo $arItem["DISPLAY_ACTIVE_FROM"]?>"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></time>
            </div>
        <?endif?>
                
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	
        <?if(!empty($arResult["PROPERTIES"]["VIDEO_IFRAME"]["VALUE"])):?>
                <?=htmlspecialcharsback($arResult["PROPERTIES"]["VIDEO_IFRAME"]["VALUE"])?>
        <?endif;?>
                
	<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
            <div class="section__detail">
		<?echo $arResult["DETAIL_TEXT"];?>
            </div>
	<?else:?>
            <div class="section__detail">
		<?echo $arResult["PREVIEW_TEXT"];?>
            </div>
	<?endif?>
          
</div>
 <div class="tab__blocks ">
           

    <?if(!empty($arResult["TAG"]["DEP"])):?>
    
        <div class="tab__block__items">
            <span class="tab__block__subtitle">Депутаты</span>
            <div class="tag__items">
                <?foreach($arResult["TAG"]["DEP"] as $dep):?>
                    <a class="tab__block_tab" href="<?=$dep["LINK"]?>">
                        <?=$dep["NAME"]?>
                    </a>
                <?endforeach;?>
            </div>
        </div>
    <?endif;?>
               
    <?if(!empty($arResult["TAG"]["COMMITTEES"])):?>
    
        <div class="tab__block__items">
            <span class="tab__block__subtitle">Комитеты</span>
            <div class="tag__items">
                <?foreach($arResult["TAG"]["COMMITTEES"] as $dep):?>
                    <a class="tab__block_tab" href="<?=$dep["LINK"]?>">
                        <?=$dep["NAME"]?>
                    </a>
                <?endforeach;?>
            </div>
        </div>
    <?endif;?>
    
    <?if(!empty($arResult["TAG"]["FRACTIONS"])):?>
    
        <div class="tab__block__items">
            <span class="tab__block__subtitle">Фракции</span>
            <div class="tag__items">
                <?foreach($arResult["TAG"]["FRACTIONS"] as $dep):?>
                    <a class="tab__block_tab" href="<?=$dep["LINK"]?>">
                        <?=$dep["NAME"]?>
                    </a>
                <?endforeach;?>
            </div>
        </div>
    <?endif;?>
    
    <?if(!empty($arResult["TAG"]["ADVISORY_COUNCIL"]) || !empty($arResult["TAG"]["YOUTH_PARLIAMENT"]) || !empty($arResult["TAG"]["ASSOCIATION"]) || !empty($arResult["TAG"]["YEARS25"])):?>
    
        <div class="tab__block__items">
            <span class="tab__block__subtitle">Другое</span>
            <div class="tag__items">
                <?if(!empty($arResult["TAG"]["ADVISORY_COUNCIL"])):?>
                    <a class="tab__block_tab" href="<?=$arResult["TAG"]["ADVISORY_COUNCIL"]["LINK"]?>">
                        <?=$arResult["TAG"]["ADVISORY_COUNCIL"]["NAME"]?>
                    </a>
                <?endif;?>
                <?if(!empty($arResult["TAG"]["YOUTH_PARLIAMENT"])):?>
                    <a class="tab__block_tab" href="<?=$arResult["TAG"]["YOUTH_PARLIAMENT"]["LINK"]?>">
                        <?=$arResult["TAG"]["YOUTH_PARLIAMENT"]["NAME"]?>
                    </a>
                <?endif;?>
                <?if(!empty($arResult["TAG"]["ASSOCIATION"])):?>
                    <a class="tab__block_tab" href="<?=$arResult["TAG"]["ASSOCIATION"]["LINK"]?>">
                        <?=$arResult["TAG"]["ASSOCIATION"]["NAME"]?>
                    </a>
                <?endif;?>
                <?if(!empty($arResult["TAG"]["YEARS25"])):?>
                    <a class="tab__block_tab" href="<?=$arResult["TAG"]["YEARS25"]["LINK"]?>">
                        <?=$arResult["TAG"]["YEARS25"]["NAME"]?>
                    </a>
                <?endif;?>
            </div>
        </div>
    <?endif;?>

</div>