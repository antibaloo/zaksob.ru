<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
                                        <input  id="search-main" class="input search-query" type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" />
                                <?endif;?>

                            </label>
                        </div>
                        <div class="filter__item">
                            <input class="btn btn--dark btn--small btn--lower search-button" type="submit" value="<?echo GetMessage("CT_BSP_GO")?>" />
                        </div>
                </div>
              <p>Разделы, в которых ведется поиск:</p>
              <p>
                <input type="checkbox" name="filterCheck[1]" value="x" <?=($arResult["REQUEST"]["filterCheck"][1] or count($arResult["REQUEST"]["filterCheck"]) == 0)?"checked":"" ?>>Новости<br>
                <input type="checkbox" name="filterCheck[2]" value="s" <?=($arResult["REQUEST"]["filterCheck"][2] or count($arResult["REQUEST"]["filterCheck"]) == 0)?"checked":"" ?>>Видеоматериалы<br>
                <input type="checkbox" name="filterCheck[3]" value="y" <?=($arResult["REQUEST"]["filterCheck"][3] or count($arResult["REQUEST"]["filterCheck"]) == 0)?"checked":"" ?>>Фотогалерея<br>
                <input type="checkbox" name="filterCheck[4]" value="l" <?=($arResult["REQUEST"]["filterCheck"][4] or count($arResult["REQUEST"]["filterCheck"]) == 0)?"checked":"" ?>>Депутаты<br>
                <input type="checkbox" name="filterCheck[5]" value="m" <?=($arResult["REQUEST"]["filterCheck"][5] or count($arResult["REQUEST"]["filterCheck"]) == 0)?"checked":"" ?>>Структура Законодательного Собрания<br>
                <input type="checkbox" name="filterCheck[6]" value="b" <?=($arResult["REQUEST"]["filterCheck"][6] or count($arResult["REQUEST"]["filterCheck"]) == 0)?"checked":"" ?>>Законотворческая деятельность<br>
                <input type="checkbox" name="filterCheck[7]" value="c" <?=($arResult["REQUEST"]["filterCheck"][7] or count($arResult["REQUEST"]["filterCheck"]) == 0)?"checked":"" ?>>Заседания Законодательного Собрания<br>
                <input type="checkbox" name="filterCheck[8]" value="d" <?=($arResult["REQUEST"]["filterCheck"][8] or count($arResult["REQUEST"]["filterCheck"]) == 0)?"checked":"" ?>>Бюджет Оренбургской области<br>
                <input type="checkbox" name="filterCheck[9]" value="g" <?=($arResult["REQUEST"]["filterCheck"][9] or count($arResult["REQUEST"]["filterCheck"]) == 0)?"checked":"" ?>>Кадровое обеспечение<br>
                <input type="checkbox" name="filterCheck[10]" value="aefhijktuvwz" <?=($arResult["REQUEST"]["filterCheck"][10] or count($arResult["REQUEST"]["filterCheck"]) == 0)?"checked":"" ?>>Другие<br>
              </p>
          </form>
        </div>
    </div>

    
    <div class="results" data-preloader-place>
    
        <?if(is_object($arResult["NAV_RESULT"])):?>
                <div class="results__count"><?echo GetMessage("CT_BSP_FOUND", array("#QUERY#" => $arResult["REQUEST"]["QUERY"]))?> <?=plural_form(
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
  console.log(<?=\CUtil::PhpToJSObject($arParams)?>);
  console.log(<?=\CUtil::PhpToJSObject($arResult)?>);
</script>