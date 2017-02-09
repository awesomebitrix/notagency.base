<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($item = $arResult['ELEMENT']) {
    $this->AddEditAction('iblock_element_' . $item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($arResult['IBLOCK']['ID'], 'ELEMENT_EDIT'));
    $this->AddDeleteAction('iblock_element_' . $item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($arResult['IBLOCK']['ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BNI_ELEMENT_DELETE_CONFIRM')));

    ?><div id="<?= $this->GetEditAreaId('iblock_element_' . $item['ID']); ?>"><?php
        ?><h1><?= $item['NAME'] ?></h1><?php
        ?><p>Цена: <?= $item['PRICE_FORMATTED'] ?></p><?php
        ?><p>Количество: <?= $item['QUANTITY'] ?></p><?php
        ?><div><?= $item['DETAIL_TEXT'] ?></div><?php
    ?></div><?php
}