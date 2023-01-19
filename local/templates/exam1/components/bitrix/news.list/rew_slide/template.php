<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<? //dump($arResult) ?>
<div class="news-list">
    <div class="item-wrap">
        <div class="rew-footer-carousel">
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <div class="item">
                    <div class="side-block side-opin">
                        <div class="inner-block">
                            <div class="title">
                                <div class="photo-block">
                                    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                                        <? $renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array("width" => 39, "height" => 39)); ?>
                                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img class="image-slide"
                                                                                         src="<?= $renderImage['src'] ?>"
                                                                                         alt="img"></a>
                                    <? else: ?>
                                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
                                                src="<?= SITE_TEMPLATE_PATH ?>/img/no_photo_left_block.jpg"
                                                alt="img"></a>
                                    <? endif; ?>
                                </div>
                                <div class="name-block"><a
                                        href="<? echo $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["NAME"] ?></a>
                                </div>
                                <div class="pos-block">
                                    <? if ($arItem["PROPERTIES"]["POSITION"]["VALUE"]): ?>
                                        <?= $arItem["PROPERTIES"]["POSITION"]["VALUE"] ?>,
                                    <? endif; ?>
                                    <? if ($arItem["PROPERTIES"]["COMPANY"]["VALUE"]): ?>
                                        <?= $arItem["PROPERTIES"]["COMPANY"]["VALUE"] ?>
                                    <? endif; ?>
                                </div>
                            </div>
                            <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                                <div class="text-block">
                                    <?= TruncateText($arItem["PREVIEW_TEXT"], 150) ?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
