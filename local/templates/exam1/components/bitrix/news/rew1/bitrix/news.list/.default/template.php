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
<div class="news-list">
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?><br/>
    <? endif; ?>
    <? //dump($arResult["ITEMS"]) ?>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="review-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="review-text">
                <div class="review-block-title"><span
                        class="review-block-name"><? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?><a
                            href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a><? endif; ?></span>
                    <span class="review-block-description"><? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?><?= $arItem["DISPLAY_ACTIVE_FROM"] ?>,<? endif; ?>
                        <? if ($arItem["PROPERTIES"]): ?>
                            <? if ($arItem["PROPERTIES"]["POSITION"]["VALUE"]): ?>
                                <?= $arItem["PROPERTIES"]["POSITION"]["VALUE"] ?>,
                            <? endif; ?>
                            <? if ($arItem["PROPERTIES"]["COMPANY"]["VALUE"]): ?>
                                <?= $arItem["PROPERTIES"]["COMPANY"]["VALUE"] ?>
                            <? endif; ?>
                        <? endif; ?>
                    </span>
                </div>
                <div class="review-text-cont">
                    <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                        <?= $arItem["PREVIEW_TEXT"] ?>
                    <? endif; ?>
                </div>
            </div>
            <div class="review-img-wrap">
                <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                                                     alt="img"></a>
                <? else: ?>
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
                            src="<?= SITE_TEMPLATE_PATH ?>/img/no_photo_left_block.jpg"
                            alt="img"></a>
                <? endif; ?>
            </div>
        </div>
    <? endforeach; ?>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>
