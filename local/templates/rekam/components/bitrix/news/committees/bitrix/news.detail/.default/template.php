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
//echo "<pre>";print_r($arResult);echo "</pre>";
?>
<?if(!empty($arResult["DETAIL_TEXT"])):?>
    <div class="section__body">
        <?=$arResult["DETAIL_TEXT"]?>
    </div>
<?endif;?>

<?if(!empty($arResult["CHAIRMAN"]) || !empty($arResult["VICE_CHAIRMAN"])):?>
    <section class="section">

      <div class="section__body">

        <div class="chiefs-grid chiefs-grid--commit">
            <?if(!empty($arResult["CHAIRMAN"]) && !empty($arResult["DEPUTY"][$arResult["CHAIRMAN"]])):
                $personal = $arResult["DEPUTY"][$arResult["CHAIRMAN"]]; ?>
                <div class="chiefs-grid__col">
                  <div class="chiefs-grid__col-heading">
                    <h2><?=GetMessage("DE_DETAIL_COMMITTEE_CHAIRMAN_TITLE");?><?=$arResult["TYPE"]["GENITIVE"]?></h2>
                  </div>
                  <div class="chief">
                    <div class="chief__left">
                      <div class="chief__image-wrap">
                        <img src="<?=$personal["IMG"]["SRC"]?>" alt="">
                      </div>
                    </div>
                    <div class="chief__right">
                      <div class="chief__name">
                        <a href="<?=$personal["LINK"]?>"><?=$personal["NAME"]?></a>
                      </div>
                      <?if($personal["DISTRICT"] && $arResult["AR_DISTRICT"][$personal["DISTRICT"]]):?>  
                        <div class="chief__department">
                          <?=$arResult["AR_DISTRICT"][$personal["DISTRICT"]]["NAME"]?>
                        </div>
                      <?endif;?>
                      <div class="chief__position"></div>
                      <div class="chief__dls">
                          <?if(!empty($personal["PHONE"])):?>
                            <dl>
                              <dt><?=GetMessage("DE_DETAIL_COMMITTEE_PHONES");?></dt>
                              <dd>
                                <a href="tel:<?=$personal["PHONE"]?>"><?=$personal["PHONE"]?></a>
                              </dd>
                            </dl>
                          <?endif;?>
                          <?if(!empty($personal["EMAIL_IMG"])):?>
                            <dl>
                              <dt><?=GetMessage("DE_DETAIL_COMMITTEE_EMAIL");?></dt>
                              <dd>
                                  <img src="<?=$personal["EMAIL_IMG"]["SRC"]?>" />
                              </dd>
                            </dl>
                          <?elseif(!empty($personal["EMAIL"])):?>
                            <dl>
                              <dt><?=GetMessage("DE_DETAIL_COMMITTEE_EMAIL");?></dt>
                              <dd>
                                <a href="mailto:<?=$personal["EMAIL"]?>"><?=$personal["EMAIL"]?></a>
                              </dd>
                            </dl>
                          <?endif;?>
                      </div>
                    </div>
                  </div>
                </div>
            <?endif;?>
            
            <?if(!empty($arResult["VICE_CHAIRMAN"])):
                
                if(count($arResult["VICE_CHAIRMAN"]) > 1) echo "<div class='vicechiefs-grid' data-count='".count($arResult["VICE_CHAIRMAN"])."'>";
                
                foreach($arResult["VICE_CHAIRMAN"] as $Vcharman){
                    $personal = $arResult["DEPUTY"][$Vcharman]; 
                    if( !empty($arResult["DEPUTY"][$Vcharman])):?>

                        <div class="chiefs-grid__col">

                          <div class="chiefs-grid__col-heading">
                            <h2><?=GetMessage("DE_DETAIL_COMMITTEE_VICECHAIRMAN_TITLE");?><?=$arResult["TYPE"]["GENITIVE"]?></h2>
                          </div>

                          <div class="chief">
                            <div class="chief__left">
                              <div class="chief__image-wrap">
                                <img src="<?=$personal["IMG"]["SRC"]?>" alt="">
                              </div>
                            </div>
                            <div class="chief__right">
                              <div class="chief__name">
                                <a href="<?=$personal["LINK"]?>"><?=$personal["NAME"]?></a>
                              </div>
                              <?if($personal["DISTRICT"] && $arResult["AR_DISTRICT"][$personal["DISTRICT"]]):?>  
                                <div class="chief__department">
                                  <?=$arResult["AR_DISTRICT"][$personal["DISTRICT"]]["NAME"]?>
                                </div>
                              <?endif;?>
                              <div class="chief__position"></div>
                              <div class="chief__dls">
                                  <?if(!empty($personal["PHONE"])):?>
                                    <dl>
                                      <dt><?=GetMessage("DE_DETAIL_COMMITTEE_PHONES");?></dt>
                                      <dd>
                                        <a href="tel:<?=$personal["PHONE"]?>"><?=$personal["PHONE"]?></a>
                                      </dd>
                                    </dl>
                                  <?endif;?>

                                  <?if(!empty($personal["FAX"])):?>
                                    <dl>
                                      <dt><?=GetMessage("DE_DETAIL_COMMITTEE_FAX")?></dt>
                                      <dd>
                                        <a href="tel:<?=$personal["FAX"]?>"><?=$personal["FAX"]?></a>
                                      </dd>
                                    </dl>
                                  <?endif;?>

                                  <?if(!empty($personal["EMAIL_IMG"])):?>
                                    <dl>
                                      <dt><?=GetMessage("DE_DETAIL_COMMITTEE_EMAIL");?></dt>
                                      <dd>
                                          <img src="<?=$personal["EMAIL_IMG"]["SRC"]?>" />
                                        
                                      </dd>
                                    </dl>
                                  <?elseif(!empty($personal["EMAIL"])):?>
                                    <dl>
                                      <dt><?=GetMessage("DE_DETAIL_COMMITTEE_EMAIL");?></dt>
                                      <dd>
                                        <a href="mailto:<?=$personal["EMAIL"]?>"><?=$personal["EMAIL"]?></a>
                                      </dd>
                                    </dl>
                                  <?endif;?>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?endif;
                }
                
                if(count($arResult["VICE_CHAIRMAN"]) > 1) echo "</div>";
                
            endif;?>
            
            
            
        </div>


      </div>
    </section>
<?endif;?>

<?if(!empty($arResult["COMPOSITION"])):?>
    <section class="section">
      <div class="section__body">

        <div class="highlighted highlighted--large-paddings highlighted--relative">

          <h3><?=GetMessage("DE_DETAIL_COMMITTEE_COMPOSITION");?><?=$arResult["TYPE"]["GENITIVE"]?></h3>

          <div class="people-slider">

            <div class="swiper-container">
              <div class="swiper-wrapper">
                

                <?foreach($arResult["COMPOSITION"] as $personalID):
                    $personal = $arResult["DEPUTY"][$personalID];?>
                    <figure class="people-slider__slide swiper-slide">

                      <div class="people-slider__image">
                        <img src="<?=$personal["IMG"]["SRC"]?>" alt="<?=$personal["NAME"]?>" />
                      </div>

                      <figcaption class="people-slider__caption">
                          <a href="<?=$personal["LINK"]?>">
                            <?=$personal["NAME"]?>
                          </a>
                      </figcaption>
                    </figure>
                <?endforeach;?>

                
              </div>
            </div>

          </div>

          <div class="people-slider-prev">
            <svg class="i-icon">
              <use xlink:href="#icon-arrow"></use>
            </svg>
          </div>
          <div class="people-slider-next">
            <svg class="i-icon">
              <use xlink:href="#icon-arrow"></use>
            </svg>
          </div>

        </div>

      </div>
    </section>
<?endif;?>

<?if(!empty($arResult["NEWS"])):?>
    <section class="section">
      <header class="section__header">
        <div class="section__title h1"><?=GetMessage("DE_DETAIL_COMMITTEE_NEWS");?><?=$arResult["TYPE"]["GENITIVE"]?></div>
      </header>
      <div class="section__body">

        <div class="card-slider slider">
          <div class="swiper-container">
            <div class="swiper-wrapper">
              

                <?foreach($arResult["NEWS"] as $item):?>
                    <div class="card-slider__slide card">
                      <a href="<?=$item["LINK"]?>" class="card__image-wrap">
                        <img src="<?=$item["IMG"]["SRC"]?>" alt="<?=$item["NAME"]?>">
                      </a>
                      <div class="card__date">
                        <time class="date" datetime="<?=$item["DATE"]?>"><?=$item["DATE"]?></time>
                      </div>
                      <div class="card__title">
                        <a href="<?=$item["LINK"]?>" class="card__link">
                          <?=$item["NAME"]?>
                        </a>
                      </div>
                      <div class="card__text">
                        <?=$item["TEXT"]?>
                      </div>
                    </div>
                <?endforeach;?>
                            
            </div>
          </div>
        </div>
      </div>
    </section>
<?endif;?>

<?/*if(!empty($arResult["DEPARTMENT"])):?>
    <section class="section">
      <div class="section__body">

        <div class="highlighted highlighted--large-paddings">

          <h3><?=GetMessage("DE_DETAIL_COMMITTEE_DEPARTMENT");?><?=$arResult["TYPE"]["GENITIVE"]?></h3>

          <div class="chiefs-grid chiefs-grid--commit-sub">
              <?foreach($arResult["DEPARTMENT"] as $compositionID):
                  $composition = $arResult["AR_COMPOSITION"][$compositionID];?>
                <div class="chiefs-grid__col">
                  <div class="chief">
                    <div class="chief__dls">
                      <dl>
                        <?if($composition["POSITION"]):?>
                            <dt><?=$composition["POSITION"]?></dt>
                        <?endif;?>
                        <dd class="heading heading--bold heading--large">
                          <?=$composition["NAME"]?>
                        </dd>
                      </dl>
                        <?if(!empty($composition["PHONE"])):?>
                            <dl>
                              <dt><?=GetMessage("DE_DETAIL_COMMITTEE_PHONES");?></dt>
                              <dd>
                                <a href="tel:<?=$composition["PHONE"]?>"><?=$composition["PHONE"]?></a>
                              </dd>
                            </dl>
                        <?endif;?>
                        
                        <?if(!empty($composition["EMAIL"])):?>
                            <dl>
                              <dt><?=GetMessage("DE_DETAIL_COMMITTEE_EMAIL");?></dt>
                              <dd>
                                <a href="mailto:<?=$composition["EMAIL"]?>"><?=$composition["EMAIL"]?></a>
                              </dd>
                            </dl>
                        <?endif;?>
                    </div>
                  </div>
                </div>
              <?endforeach;?>
            
          </div>

        </div>

      </div>
    </section>
<?endif;*/?>
<?if(!empty($arResult["DEPARTMENT_NEW"])):?>
    <section class="section">
      <div class="section__body">

        <div class="highlighted highlighted--large-paddings">

          <h3><?=GetMessage("DE_DETAIL_COMMITTEE_DEPARTMENT");?><?=$arResult["TYPE"]["GENITIVE"]?></h3>

          <div class="chiefs-grid chiefs-grid--commit-sub">
              <?foreach($arResult["DEPARTMENT_NEW"] as $compositionID):
                  $composition = $arResult["AR_COMPOSITION_NEW"][$compositionID];?>
                <div class="chiefs-grid__col">
                  <div class="chief">
                    <div class="chief__dls">
                      <dl>
                        <?if($composition["POSITION"]):?>
                            <dt><?=$composition["POSITION"]?></dt>
                        <?endif;?>
                        <dd class="heading heading--bold heading--large">
                          <?=$composition["NAME"]?>
                        </dd>
                      </dl>
                        <?if(!empty($composition["PHONE"])):?>
                            <dl>
                              <dt><?=GetMessage("DE_DETAIL_COMMITTEE_PHONES");?></dt>
                              <dd>
                                <a href="tel:<?=$composition["PHONE"]?>"><?=$composition["PHONE"]?></a>
                              </dd>
                            </dl>
                        <?endif;?>
                        
                        <?if(!empty($composition["EMAIL"])):?>
                            <dl>
                              <dt><?=GetMessage("DE_DETAIL_COMMITTEE_EMAIL");?></dt>
                              <dd>
                                <a href="mailto:<?=$composition["EMAIL"]?>"><?=$composition["EMAIL"]?></a>
                              </dd>
                            </dl>
                        <?endif;?>
                    </div>
                  </div>
                </div>
              <?endforeach;?>
            
          </div>

        </div>

      </div>
    </section>
<?endif;?>