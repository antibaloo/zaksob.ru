<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->addExternalCss("./styles.css");
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
?>
    <div class="section__body">
	<?if($arParams["SHOW_TAGS_CLOUD"] == "Y")
	{
		$arCloudParams = Array(
			"SEARCH" => $arResult["REQUEST"]["~QUERY"],
			"TAGS" => $arResult["REQUEST"]["~TAGS"],
			"CHECK_DATES" => $arParams["CHECK_DATES"],
			"arrFILTER" => $arParams["arrFILTER"],
			"SORT" => $arParams["TAGS_SORT"],
			"PAGE_ELEMENTS" => $arParams["TAGS_PAGE_ELEMENTS"],
			"PERIOD" => $arParams["TAGS_PERIOD"],
			"URL_SEARCH" => $arParams["TAGS_URL_SEARCH"],
			"TAGS_INHERIT" => $arParams["TAGS_INHERIT"],
			"FONT_MAX" => $arParams["FONT_MAX"],
			"FONT_MIN" => $arParams["FONT_MIN"],
			"COLOR_NEW" => $arParams["COLOR_NEW"],
			"COLOR_OLD" => $arParams["COLOR_OLD"],
			"PERIOD_NEW_TAGS" => $arParams["PERIOD_NEW_TAGS"],
			"SHOW_CHAIN" => "N",
			"COLOR_TYPE" => $arParams["COLOR_TYPE"],
			"WIDTH" => $arParams["WIDTH"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"RESTART" => $arParams["RESTART"],
		);

		if(is_array($arCloudParams["arrFILTER"]))
		{
			foreach($arCloudParams["arrFILTER"] as $strFILTER)
			{
				if($strFILTER=="main")
				{
					$arCloudParams["arrFILTER_main"] = $arParams["arrFILTER_main"];
				}
				elseif($strFILTER=="forum" && IsModuleInstalled("forum"))
				{
					$arCloudParams["arrFILTER_forum"] = $arParams["arrFILTER_forum"];
				}
				elseif(strpos($strFILTER,"iblock_")===0)
				{
					foreach($arParams["arrFILTER_".$strFILTER] as $strIBlock)
						$arCloudParams["arrFILTER_".$strFILTER] = $arParams["arrFILTER_".$strFILTER];
				}
				elseif($strFILTER=="blog")
				{
					$arCloudParams["arrFILTER_blog"] = $arParams["arrFILTER_blog"];
				}
				elseif($strFILTER=="socialnetwork")
				{
					$arCloudParams["arrFILTER_socialnetwork"] = $arParams["arrFILTER_socialnetwork"];
				}
			}
		}
		$APPLICATION->IncludeComponent("bitrix:search.tags.cloud", ".default", $arCloudParams, $component, array("HIDE_ICONS" => "Y"));
	}
	?>
        <div class="filter highlighted">
            <form action="" method="get"> 
                <input type="hidden" name="tags" value="<?echo $arResult["REQUEST"]["TAGS"]?>" /> 
                <input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
                <div class="filter__inner"> 
                        <div class="filter__item">
                            <label class="label label--dark label--full-width label--normal" for="search-main">
                                <span>Поиск по порталу</span>

                                <?if($arParams["USE_SUGGEST"] === "Y"):
                                        if(strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
                                        {
                                                $arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
                                                $obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
                                                $obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
                                        }
                                        ?>
                                        <?$APPLICATION->IncludeComponent(
                                                "bitrix:search.suggest.input",
                                                "",
                                                array(
                                                        "NAME" => "q",
                                                        "VALUE" => $arResult["REQUEST"]["~QUERY"],
                                                        "INPUT_SIZE" => -1,
                                                        "DROPDOWN_SIZE" => 10,
                                                        "FILTER_MD5" => $arResult["FILTER_MD5"],
                                                ),
                                                $component, array("HIDE_ICONS" => "Y")
                                        );?>
                                <?else:?>
                                        <input  id="search-main" class="input search-query" name="q1" type="text" value="<?=trim($arResult["REQUEST"]["QUERY"],"'")?>" />
                                        <input  id="realSearch" type="hidden" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" />
                                <?endif;?>

                            </label>
                        </div>
                        <div class="filter__item">
                            <input class="btn btn--dark btn--small btn--lower search-button" type="submit" value="<?echo GetMessage("CT_BSP_GO")?>" />
                        </div>
                </div>
              <br>
              <input type="checkbox" id="strict" name="strict" value="y" <?=($_REQUEST["strict"] == "y")?"checked":""?>> Искать точно, как в запросе
              <hr>
              <p>Разделы, в которых ведется поиск:</p>
              <input type="checkbox" id="all" name="all" value="all" <?=($_REQUEST["all"] == "all")?"checked":""?> <?=(isset($_REQUEST["param2"]) || isset($_REQUEST["module_id"]))?"":"checked"?>/> Искать везде<br>
              <hr>
              <input type="checkbox" class="iblock" name="news" value="7" <?=($_REQUEST["news"] == "7")?"checked":""?>/> Новости<br>
              <input type="checkbox" class="iblock" name="photo" value="24" <?=($_REQUEST["photo"] == "24")?"checked":""?>/> Фото<br>
              <input type="checkbox" class="iblock" name="video" value="25" <?=($_REQUEST["video"] == "25")?"checked":""?>/> Видео<br>
              <input type="checkbox" class="iblock" name="deputies" value="8" <?=($_REQUEST["deputies"] == "8")?"checked":""?>/> Депутаты<br>
              <input type="checkbox" class="iblock" name="apparat" value="26" <?=($_REQUEST["apparat"] == "26")?"checked":""?>/>Аппарат ЗС<br>
              <input type="checkbox" class="iblock" name="zakony" value="21" <?=($_REQUEST["zakony"] == "21")?"checked":""?>/>Законы и постановления<br>
              <input type="checkbox" class="iblock" name="project" value="22" <?=($_REQUEST["project"] == "22")?"checked":""?>/>Проекты законов<br>
              <input type="checkbox" class="iblock" name="zased" value="23" <?=($_REQUEST["zased"] == "23")?"checked":""?>/>Заседания<br>
              <input type="checkbox" class="iblock" name="bullet" value="28" <?=($_REQUEST["bullet"] == "28")?"checked":""?>/>Бюллетени ЗС<br>
              
              <input id="param2" type="hidden" name="param2" value="<?=(isset($_REQUEST["param2"]))?$_REQUEST["param2"]:""?>">
              <input id="countParam2" type="hidden" name="countParam2" value="<?=(isset($_REQUEST["countParam2"]))?$_REQUEST["countParam2"]:""?>">
              <hr>
              <input type="checkbox" id="main" class="notAll" name="module_id" value="main" <?=($_REQUEST["module_id"] == "main")?"checked":""?>/> Остальное<br>
              <hr>
              Период создания страницы или документа: 
              <?$APPLICATION->IncludeComponent(
                  'bitrix:main.calendar',
									'',
									array(
										'SHOW_INPUT' => 'Y',
										'INPUT_NAME' => 'from',
										'INPUT_VALUE' => $arResult["REQUEST"]["~FROM"],
										'INPUT_NAME_FINISH' => 'to',
										'INPUT_VALUE_FINISH' =>$arResult["REQUEST"]["~TO"],
										'INPUT_ADDITIONAL_ATTR' => 'class="input-field" size="10"',
									),
									null,
									array('HIDE_ICONS' => 'Y')
								);?>
          </form>
        </div>
    </div> 

    
    <div class="results" data-preloader-place>
    
        <?if(is_object($arResult["NAV_RESULT"])):?>
                <div class="results__count"><?echo GetMessage("CT_BSP_FOUND", array("#QUERY#" => trim($arResult["REQUEST"]["QUERY"],"'")))?> <?=plural_form(
                        $arResult["NAV_RESULT"]->SelectedRowsCount(),
                        array('найден','найдено','найдено'),
                        array('результат','результата','результатов')
                      );?>
                </div>
        <?endif;?>
                                
        <?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
                ?>
                <div class="search-language-guess">
                        <?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
                </div><br /><?
        endif;?>

	<div class="results__items">
            <?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
            <?elseif($arResult["ERROR_CODE"]!=0):?>
		<p><?=GetMessage("CT_BSP_ERROR")?></p>
		<?ShowError($arResult["ERROR_TEXT"]);?>
		<p><?=GetMessage("CT_BSP_CORRECT_AND_CONTINUE")?></p>
		<br /><br />
		<p><?=GetMessage("CT_BSP_SINTAX")?><br /><b><?=GetMessage("CT_BSP_LOGIC")?></b></p>
		<table border="0" cellpadding="5">
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_OPERATOR")?></td><td valign="top"><?=GetMessage("CT_BSP_SYNONIM")?></td>
				<td><?=GetMessage("CT_BSP_DESCRIPTION")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_AND")?></td><td valign="top">and, &amp;, +</td>
				<td><?=GetMessage("CT_BSP_AND_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_OR")?></td><td valign="top">or, |</td>
				<td><?=GetMessage("CT_BSP_OR_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_NOT")?></td><td valign="top">not, ~</td>
				<td><?=GetMessage("CT_BSP_NOT_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top">( )</td>
				<td valign="top">&nbsp;</td>
				<td><?=GetMessage("CT_BSP_BRACKETS_ALT")?></td>
			</tr>
		</table>
            <?elseif(count($arResult["SEARCH"])>0):?>
		<?if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
		<?foreach($arResult["SEARCH"] as $arItem):?>
			<div class="results__items-item">
                            <div class="results__items-item-head">
                              <?=((IBLOCK_NEWS == $arItem["PARAM2"]) ? "Новость " : "")?>от <time datetime="<?=$arItem["DATE_CHANGE"]?>"><?=$arItem["DATE_CHANGE"]?></time>
                            </div>
                            <div class="results__items-item-link">
                              <?if ($arItem['PARAM2']<>26){?>
                                <a rel="bookmark"   target='_blank' href="<?echo $arItem["URL"]?>"><?echo $arItem["TITLE_FORMATED"]?></a>
                              <?}else echo "<strong>".$arItem["TITLE_FORMATED"]."</strong>"?>
                            </div>
				<div class="search-preview"><?echo $arItem["BODY_FORMATED"]?></div>
				<?if(
					($arParams["SHOW_ITEM_DATE_CHANGE"] != "N")
					|| ($arParams["SHOW_ITEM_PATH"] == "Y" && $arItem["CHAIN_PATH"])
					|| ($arParams["SHOW_ITEM_TAGS"] != "N" && !empty($arItem["TAGS"]))
				):?>
				<div class="search-item-meta">
					<?if (
						$arParams["SHOW_RATING"] == "Y"
						&& strlen($arItem["RATING_TYPE_ID"]) > 0
						&& $arItem["RATING_ENTITY_ID"] > 0
					):?>
					<div class="search-item-rate">
					<?
					$APPLICATION->IncludeComponent(
						"bitrix:rating.vote", $arParams["RATING_TYPE"],
						Array(
							"ENTITY_TYPE_ID" => $arItem["RATING_TYPE_ID"],
							"ENTITY_ID" => $arItem["RATING_ENTITY_ID"],
							"OWNER_ID" => $arItem["USER_ID"],
							"USER_VOTE" => $arItem["RATING_USER_VOTE_VALUE"],
							"USER_HAS_VOTED" => $arItem["RATING_USER_VOTE_VALUE"] == 0? 'N': 'Y',
							"TOTAL_VOTES" => $arItem["RATING_TOTAL_VOTES"],
							"TOTAL_POSITIVE_VOTES" => $arItem["RATING_TOTAL_POSITIVE_VOTES"],
							"TOTAL_NEGATIVE_VOTES" => $arItem["RATING_TOTAL_NEGATIVE_VOTES"],
							"TOTAL_VALUE" => $arItem["RATING_TOTAL_VALUE"],
							"PATH_TO_USER_PROFILE" => $arParams["~PATH_TO_USER_PROFILE"],
						),
						$component,
						array("HIDE_ICONS" => "Y")
					);?>
					</div>
					<?endif;?>
					<?if($arParams["SHOW_ITEM_TAGS"] != "N" && !empty($arItem["TAGS"])):?>
						<div class="search-item-tags"><label><?echo GetMessage("CT_BSP_ITEM_TAGS")?>: </label><?
						foreach ($arItem["TAGS"] as $tags):
							?><a href="<?=$tags["URL"]?>"><?=$tags["TAG_NAME"]?></a> <?
						endforeach;
						?></div>
					<?endif;?>

					<?if($arParams["SHOW_ITEM_DATE_CHANGE"] != "N"):?>
						<div class="search-item-date"><label><?echo GetMessage("CT_BSP_DATE_CHANGE")?>: </label><span><?echo $arItem["DATE_CHANGE"]?></span></div>
					<?endif;?>
				</div>
				<?endif;
        	if($arItem["CHAIN_PATH"]):?>
        <small><?=GetMessage("SEARCH_PATH")?>&nbsp;<?=$arItem["CHAIN_PATH"]?></small>
        <?endif;?>
        <hr/>
			</div>
    
		<?endforeach;?>
    <?//Добавление параметров поиска к адресной строке для сохранения результатов при изменении сортировки
    if (isset($_REQUEST["strict"])) $arResult["URL"] .="&amp;strict=".$_REQUEST["strict"];
    if (isset($_REQUEST["all"])) $arResult["URL"] .="&amp;all=".$_REQUEST["all"];
    if (isset($_REQUEST["news"])) $arResult["URL"] .="&amp;news=".$_REQUEST["news"];
    if (isset($_REQUEST["photo"])) $arResult["URL"] .="&amp;photo=".$_REQUEST["photo"];
    if (isset($_REQUEST["video"])) $arResult["URL"] .="&amp;video=".$_REQUEST["video"];
    if (isset($_REQUEST["deputies"])) $arResult["URL"] .="&amp;deputies=".$_REQUEST["deputies"];
    if (isset($_REQUEST["fractions"])) $arResult["URL"] .="&amp;fractions=".$_REQUEST["fractions"];
    if (isset($_REQUEST["committees"])) $arResult["URL"] .="&amp;committees=".$_REQUEST["committees"];
    if (isset($_REQUEST["apparat"])) $arResult["URL"] .="&amp;apparat=".$_REQUEST["apparat"];
    if (isset($_REQUEST["zakony"])) $arResult["URL"] .="&amp;zakony=".$_REQUEST["zakony"];
    if (isset($_REQUEST["project"])) $arResult["URL"] .="&amp;project=".$_REQUEST["project"];
    if (isset($_REQUEST["zased"])) $arResult["URL"] .="&amp;zased=".$_REQUEST["zased"];
    if (isset($_REQUEST["bullet"])) $arResult["URL"] .="&amp;bullet=".$_REQUEST["bullet"];
    if ($_REQUEST["module_id"] == "main") $arResult["URL"] .="&amp;module_id=main";
    if (isset($_REQUEST["param2"])) $arResult["URL"] .="&amp;param2=".$_REQUEST["param2"];
    if (isset($_REQUEST["countParam2"])) $arResult["URL"] .="&amp;countParam2=".$_REQUEST["countParam2"];
    if (isset($_REQUEST["from"])) $arResult["URL"] .="&amp;from=".$_REQUEST["from"];
    if (isset($_REQUEST["to"])) $arResult["URL"] .="&amp;to=".$_REQUEST["to"];
    //--------------------------------------------------------------------------------------------------?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
		<?if($arParams["SHOW_ORDER_BY"] != "N"):?>
			<div class="search-sorting"><label><?echo GetMessage("CT_BSP_ORDER")?>:</label>&nbsp;
			<?if($arResult["REQUEST"]["HOW"]=="d"):?>
				<a href="<?=$arResult["URL"]?>&amp;how=r"><?=GetMessage("CT_BSP_ORDER_BY_RANK")?></a>&nbsp;<b><?=GetMessage("CT_BSP_ORDER_BY_DATE")?></b>
			<?else:?>
				<b><?=GetMessage("CT_BSP_ORDER_BY_RANK")?></b>&nbsp;<a href="<?=$arResult["URL"]?>&amp;how=d"><?=GetMessage("CT_BSP_ORDER_BY_DATE")?></a>
			<?endif;?>
			</div>
		<?endif;?>
            <?else:?>
		<?ShowNote(GetMessage("CT_BSP_NOTHING_TO_FOUND"));?>
            <?endif;?>

	</div>
</div>
<script>
  Array.prototype.unset = function(value) {
    if(this.indexOf(value) != -1) { // Make sure the value exists
        this.splice(this.indexOf(value), 1);
    }   
}
  BX.ready(function () {
    $("#search-main").on('keyup', function(){
      $("#realSearch").val($(this).val());
      if ($('#strict').is(':checked')) {
        $("#realSearch").val("'"+$(this).val()+"'");
      }
    })
    $('#strict').on('click',function() {
      if ($(this).is(':checked')) {
        $("#realSearch").val("'"+$("#realSearch").val()+"'");
      }else{
        $("#realSearch").val($("#realSearch").val().slice(1,-1));
      }
    });
    $('#all').on('click',function() {
      if ($(this).is(':checked')) {
        $("#param2").val("");
        $("#main").attr("checked", false);
        $(".iblock").each(function(index){
          $(this).attr("checked", false);
        });
        $("#countParam2").val("");
      }else{
        $(".iblock").each(function(index){
          $(this).attr("checked", true);
        });
        $("#countParam2").val("?PARAM2");
      }
    });
    
    $('#main').change(function() {
      if ($(this).is(':checked')) {
        $("#param2").val("");
        $("#all").attr("checked", false);
        $(".iblock").each(function(index){
          $(this).attr("checked", false);
        });
        $("#countParam2").val("");
      }else{
        $(".iblock").each(function(index){
          $(this).attr("checked", true);
        });
        $("#countParam2").val("?PARAM2");
      }
    });
    $('.iblock').change(function() {
      var param2array= [];
      if ($(this).is(':checked')) {
        if ($("#param2").val()!="") {
          param2array=$("#param2").val().split("|");
          param2array.push($(this).val());
          $("#param2").val(param2array.join("|"));
        }else{
          $("#param2").val($(this).val());
        }
        $("#all").attr("checked", false);
        $("#main").attr("checked", false);
        
      }else{
        var n=0;
        $(".iblock").each(function(index){
           if ($(this).is(':checked')) n=n+1;
        });
        if (n==0)  {
          $("#all").attr("checked", true);
          $("#param2").val("");
        }else{
          param2array=$("#param2").val().split("|");
          param2array.unset($(this).val());
          $("#param2").val(param2array.join("|"));
        }
      }
      param2array=$("#param2").val().split("|");
      if (param2array.length>1) $("#countParam2").val("?PARAM2");
      if (param2array.length == 1) $("#countParam2").val("=PARAM2");
    });
  });
</script>