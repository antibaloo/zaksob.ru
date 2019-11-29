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
    
    <div class="section__body">


      <div class="flow" data-js-gallery-container>

              <?if(!empty($arResult["PREVIEW_PICTURE"])):?>
                <div class="card flow__item photo__item" >

                  <a data-js-open-gallery href="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" class="card__image-wrap">

                    <img border="0" src="<?=$arResult["PREVIEW_PICTURE"]["SRC_2"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />

                  </a>

                </div>
              <?endif;?>

              <?if(!empty($arResult["FILES"])):
                  foreach($arResult["FILES"] as $file):?>

                    <div class="card flow__item photo__item" >

                      <a data-js-open-gallery href="<?=$file["SRC"]?>" class="card__image-wrap">

                        <img border="0" src="<?=$file["SRC_2"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />

                      </a>

                    </div>
                  <?endforeach;
              endif;?>

      </div>


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
</section>
