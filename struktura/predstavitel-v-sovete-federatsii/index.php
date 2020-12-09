<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Представитель в Совете Федерации");
?>
<?$APPLICATION->IncludeComponent(
"kp:predstavitel",
".default",
array(),
false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>