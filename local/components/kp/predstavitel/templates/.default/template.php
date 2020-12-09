<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="section__header">
	<h1 class="section__title h1"><?=$arResult[0]["NAME"]?></h1>
</div>
<div class="chief chief--full">
  <div class="chief__left">
    <div class="chief__image-wrap">
      <img src="<?=$arResult[0]["PHOTO"]?>" alt="<?=$arResult[0]["NAME"]?>">
    </div>
  </div>
  <div class="chief__right">
    <?if(!empty($arResult[0]["POSITION"])):?>
    <div class="chief__position">
      <?=$arResult[0]["POSITION"]?>
    </div>
    <?endif;?>
    <?if(!empty($arResult[0]["DATE_OF_BIRTH"])):?>
    <div class="chief__bd">
      <b>Дата рождения:</b> <?=$arResult[0]["DATE_OF_BIRTH"]?>
    </div>
    <?endif;?>
    <div class="chief__dls">
      <?if(!empty($arResult[0]["PHONE"])):?>
      <dl>
        <dt>телефоны</dt>
        <?foreach($arResult[0]["PHONE"] as $phone):?>
        <dd>
          <a href="tel:<?=$phone?>"><?=$phone?></a>
        </dd>
        <?endforeach;?>
      </dl>
      <?endif;?>
      <?if(!empty($arResult[0]["EMAIL"])):?>
      <dl>
        <dt>Электронная почта</dt>
        <dd>
          <a href="mailto:<?=$arResult[0]["EMAIL"]?>"><?=$arResult[0]["EMAIL"]?></a>
        </dd>
      </dl>
      <?endif;?>
    </div>
  </div>
</div>
<?if(!empty($arResult[0]["BIOGRAPHY"])):?>
<a name="dep_biography"></a>
<h3>Биография</h3>
<?=htmlspecialcharsback($arResult[0]["BIOGRAPHY"])?>
<?endif;?>
<h3>Отчеты о работе</h3>
<?foreach($arResult[0]["REPORTS"] as $report){?>
<p><a href="<?=$report["FILE"]?>"><?=$report["DESCRIPTION"]?></a></p>
<?}?>
<?
//echo "<pre>";print_r($arResult);echo "</pre>";
/*foreach($arResult as $predstavitel){
  echo "NAME: ".$predstavitel["NAME"]."<br>";
  echo "PHOTO: ".;
  echo "POSITION";
  echo "DATE_OF_BIRTH";
  echo "PHONE";
  echo "EMAIL";
  echo "BIOGRAPHY";
  echo "REPORTS";
}*/
