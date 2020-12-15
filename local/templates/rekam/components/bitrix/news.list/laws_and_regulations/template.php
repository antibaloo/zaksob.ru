<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CJSCore::Init(array("jquery"));
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

<?
$categories = [];
if(CModule::IncludeModule("iblock")){
    
    $property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>IBLOCK_LAWS, "CODE"=>"CATEGORIES"));
    while($enum_fields = $property_enums->GetNext()){
        $categories[$enum_fields["ID"]] = $enum_fields["VALUE"];
    }
        
}
?>
<div class="filter highlighted">
  <form class="filter__form" action="<?=$APPLICATION->GetCurPage();?>" method="GET">
    <div class="filter__inner">
      <div class="filter__item">
        <label class="label label--dark label--full-width" for="filter2">
          <span>Введите поисковый запрос:</span>
          <input id="filter2" name="q" class="input " value="<?=$_REQUEST["q"]?>">
        </label>
      </div>
      <div class="filter__item">
        <button id="search" type="submit" class="btn btn--dark btn--small btn--lower"><?=GetMessage("DE_LAWS_SEARCH_BUTTON");?></button>
      </div>
    </div>
    <br>
    <div class="filter__inner">
      <div class="filter__item">
        <label class="label label--dark label--full-width" for="filter2">
          <span>Вы можете указать точную дату принятия или период для поиска:</span>
        </label>
              <?$APPLICATION->IncludeComponent(
                  'bitrix:main.calendar',
									'',
									array(
										'SHOW_INPUT' => 'Y',
										'INPUT_NAME' => 'from',
										'INPUT_VALUE' => $_REQUEST["from"],
										'INPUT_NAME_FINISH' => 'to',
										'INPUT_VALUE_FINISH' =>$_REQUEST["to"],
										'INPUT_ADDITIONAL_ATTR' => 'class="input-field" size="10"',
									),
									null,
									array('HIDE_ICONS' => 'Y')
								);?>
      </div>
    </div>
  </form>
</div>
<div class="results">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
            <?=$arResult["NAV_STRING"]?><br />
    <?endif;?>
  <?if ((!empty($_REQUEST["q"]) || !empty($_REQUEST["from"]) || !empty($_REQUEST["to"])) && count($arResult["ITEMS"]) == 0):?>
  <p><span style="color:red">К сожалению, по вашему поисковому запросу ничего не найдено. Попробуйте изменить параметры поиска.</span></p>
  <?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):
       // PR($arItem["DISPLAY_PROPERTIES"]);?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
        
        <a target="_blank"  id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>">
            <?if(!empty($arItem["DISPLAY_PROPERTIES"]["FULL_NAME"]["VALUE"])){
                echo $arItem["DISPLAY_PROPERTIES"]["FULL_NAME"]["VALUE"];
            }else{
                echo $arItem["NAME"];
            }?>
        </a>
            
        <br>
        Дата принятия: <?=mb_strtolower(FormatDate("d F Y г.", MakeTimeStamp($arItem["DISPLAY_PROPERTIES"]["DATE"]["VALUE"])))?><br>
        <br>
        
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>