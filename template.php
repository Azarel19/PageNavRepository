<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
if (!$arResult['NavShowAlways']) {
    if ($arResult['NavRecordCount'] == 0 || ($arResult['NavPageCount'] == 1 && $arResult['NavShowAll'] == false)) {
        return;
    }
}
?>

<?
use Bitrix\Main\Localization\Loc;

?>

<div class="modern-page-navigation">

    <?

    $strNavQueryString     = ($arResult['NavQueryString'] != '' ? $arResult['NavQueryString'] . '&amp;' : '');
    $strNavQueryStringFull = ($arResult['NavQueryString'] != '' ? '?' . $arResult['NavQueryString'] : '');
    ?>

    <span class="modern-page-title"><?= Loc::GetMessage('pages') ?></span>
    <?

    $bFirst  = true;
    $bPoints = false;


    if ($arResult['NAV']['PAGE_NUMBER'] > 1) {
        ?>
        <a class="modern-page-previous"
           href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= ($arResult['NavPageNomer']
                                                                                                             - 1) ?>"><span
                class="arrow">&larr;</span></a>
        <?

    }


    do {
        if ($arResult['nStartPage'] < 2 || $arResult['nEndPage'] - $arResult['nStartPage'] < 1
            || abs($arResult['nStartPage'] - $arResult['NavPageNomer']) <= 1
        ) {

            if ($arResult['nStartPage'] == $arResult['NavPageNomer']) {
                ?>
                <span class="nav-current-page"><?= $arResult['nStartPage'] ?></span>
                <?
            } else {
                ?>
                <a href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= $arResult['nStartPage'] ?>"><?= $arResult['nStartPage'] ?></a>
                <?
            }
            $bFirst  = false;
            $bPoints = true;
        } else {
            if ($bPoints) {
                ?>...<?
                $bPoints = false;
            }
        }
        $arResult['nStartPage']++;
    } while ($arResult['nStartPage'] <= $arResult['nEndPage']);


    if ($arResult['NAV']['PAGE_NUMBER'] < $arResult['NavPageCount']) {
        ?>
        <a class="modern-page-next"
           href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= ($arResult['NavPageNomer']
                                                                                                             + 1) ?>"><span
                class="arrow">&rarr;</span></a>
        <?
    }

    if ($arResult['NAV']['DO_SHOW_ALL']) {
        if ($arResult['NAV']['SHOW_ALL_MODE']) {
            ?>
            <a class="modern-page-pagen"
               href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult['NavNum'] ?>=0"><?= Loc::GetMessage('nav_paged') ?></a>
            <?
        } else {
            ?>
            <a class="modern-page-all"
               href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult['NavNum'] ?>=1"><?= Loc::GetMessage('nav_all') ?></a>
            <?
        }
    }
    ?>
</div>

