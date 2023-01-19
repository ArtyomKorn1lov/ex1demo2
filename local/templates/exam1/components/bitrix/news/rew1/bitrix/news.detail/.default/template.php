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

    <? //dump($arResult) ?>

    <div class="review-block">
        <div class="review-text">
            <div class="review-text-cont">
                <?= $arResult["DETAIL_TEXT"] ?>
            </div>
            <div class="review-autor">
                <? if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"]): ?>
                    <?= $arResult["NAME"] ?>,
                <? endif ?>
                <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
                    <?= $arResult["DISPLAY_ACTIVE_FROM"] ?>,
                <? endif ?>
                <? if ($arResult["PROPERTIES"]["POSITION"]["VALUE"]): ?>
                    <?= $arResult["PROPERTIES"]["POSITION"]["VALUE"] ?>,
                <? endif ?>
                <? if ($arResult["PROPERTIES"]["COMPANY"]["VALUE"]): ?>
                    <?= $arResult["PROPERTIES"]["COMPANY"]["VALUE"] ?>.
                <? endif ?>
            </div>
        </div>

        <div style="clear: both;" class="review-img-wrap">
            <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
                <img src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
                     alt="img">
            <? else: ?>
                <img src="<?= SITE_TEMPLATE_PATH ?>/img/no_photo.jpg"
                     alt="img">
            <? endif; ?>
        </div>
    </div>

    <? //dump($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"]) ?>

    <div class="exam-review-doc">
        <p>Документы:</p>
        <? foreach ($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"] as $pid => $arProperty): ?>
            <div class="exam-review-item-doc"><img class="rew-doc-ico"
                                                   src="<?= SITE_TEMPLATE_PATH ?>/img/icons/pdf_ico_40.png">
                <a href="<?= $arProperty['SRC'] ?>"><?= $arProperty["ORIGINAL_NAME"] ?></a></div>
        <? endforeach ?>
    </div>
    <hr>
    <a href="<?= $arResult["LIST_PAGE_URL"] ?>" class="review-block_back_link"> &larr; К списку отзывов</a>
</div>
