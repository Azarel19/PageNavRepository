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

<div class='modern-page-navigation'>
    <?

    $strNavQueryString     = ($arResult['NavQueryString'] != '' ? $arResult['NavQueryString'] . '&amp;' : '');
    $strNavQueryStringFull = ($arResult['NavQueryString'] != '' ? '?' . $arResult['NavQueryString'] : '');
    ?>
    <span class="modern-page-title"><?= Loc::GetMessage('pages') ?></span>
    <?
    if ($arResult['bDescPageNumbering'] === true) {
        $bFirst = true;
        if ($arResult['NavPageNomer'] < $arResult['NavPageCount']) {
            if ($arResult['bSavePage']) {
                ?>

                <a class="modern-page-previous"
                   href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= ($arResult['NavPageNomer']
                                                                                                                     + 1) ?>"><span
                        class="arrow">&larr;</span></a>
                <?
            } else {
                if ($arResult['NavPageCount'] == ($arResult['NavPageNomer'] + 1)) {
                    ?>
                    <a class="modern-page-previous"
                       href="<?= $arResult['sUrlPath'] ?><?= $strNavQueryStringFull ?>"><span
                            class="arrow">&larr;</span></a>
                    <?
                } else {
                    ?>
                    <a class="modern-page-previous"
                       href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= ($arResult['NavPageNomer']
                                                                                                                         + 1) ?>"><span
                            class="arrow">&larr;</span></a>
                    <?
                }
            }

            if ($arResult['nStartPage'] < $arResult['NavPageCount']) {
                $bFirst = false;
                if ($arResult['bSavePage']) {
                    ?>
                    <a class="modern-page-first"
                       href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= $arResult['NavPageCount'] ?>">1</a>
                    <?
                } else {
                    ?>
                    <a class="modern-page-first" href="<?= $arResult['sUrlPath'] ?><?= $strNavQueryStringFull ?>">1</a>
                    <?
                }
                if ($arResult['nStartPage'] < ($arResult['NavPageCount'] - 1)) {
                    ?>
                    <a class="modern-page-dots"
                       href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= intVal($arResult['nStartPage']
                                                                                                                               + ($arResult['NavPageCount']
                                                                                                                                  - $arResult['nStartPage'])
                                                                                                                                 / 2) ?>">...</a>
                    <?
                }
            }
        }
        do {
            $NavRecordGroupPrint = $arResult['NavPageCount'] - $arResult['nStartPage'] + 1;

            if ($arResult['nStartPage'] == $arResult['NavPageNomer']) {
                ?>
                <span class="<?= ($bFirst ? 'modern-page-first '
                    : '') ?>modern-page-current"><?= $NavRecordGroupPrint ?></span>
                <?
            } elseif ($arResult['nStartPage'] == $arResult['NavPageCount'] && $arResult['bSavePage'] == false) {
                ?>
                <a href="<?= $arResult['sUrlPath'] ?><?= $strNavQueryStringFull ?>"
                   class="<?= ($bFirst ? 'modern-page-first' : '') ?>"><?= $NavRecordGroupPrint ?></a>
                <?
            } else {
                ?>
                <a href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= $arResult['nStartPage'] ?>"<?
                ?> class="<?= ($bFirst ? 'modern-page-first' : '') ?>"><?= $NavRecordGroupPrint ?></a>
                <?
            }

            $arResult['nStartPage']--;
            $bFirst = false;
        } while ($arResult['nStartPage'] >= $arResult['nEndPage']);

        if ($arResult['NavPageNomer'] > 1) {
            if ($arResult['nEndPage'] > 1) {
                if ($arResult['nEndPage'] > 2) {
                    ?>
                    <a class="modern-page-dots"
                       href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= round($arResult['nEndPage']
                                                                                                                              / 2) ?>">...</a>
                    <?
                }
                ?>
                <a href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=1"><?= $arResult['NavPageCount'] ?></a>
                <?
            }

            ?>
            <a class="modern-page-next"
               href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= ($arResult['NavPageNomer']
                                                                                                                 - 1) ?>"><span
                    class="arrow">&rarr;</span></a>
            <?
        }

    } else {
        $bFirst = true;

        if ($arResult['NavPageNomer'] > 1) {
            if ($arResult['bSavePage']) {
                ?>
                <a class="modern-page-previous"
                   href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= ($arResult['NavPageNomer']
                                                                                                                     - 1) ?>"><span
                        class="arrow">&larr;</span></a>
                <?
            } else {
                if ($arResult['NavPageNomer'] > 2) {
                    ?>
                    <a class="modern-page-previous"
                       href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= ($arResult['NavPageNomer']
                                                                                                                         - 1) ?>"><span
                            class="arrow">&larr;</span></a>
                    <?
                } else {
                    ?>
                    <a class="modern-page-previous"
                       href="<?= $arResult['sUrlPath'] ?><?= $strNavQueryStringFull ?>"><span
                            class="arrow">&larr;</span></a>
                    <?
                }

            }

            if ($arResult['nStartPage'] > 1) {
                $bFirst = false;
                if ($arResult['bSavePage']) {
                    ?>
                    <a class="modern-page-first"
                       href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=1">1</a>
                    <?
                } else {
                    ?>
                    <a class="modern-page-first" href="<?= $arResult['sUrlPath'] ?><?= $strNavQueryStringFull ?>">1</a>
                    <?
                }
                if ($arResult['nStartPage'] > 2) {
                    ?>
                    <a class="modern-page-dots"
                       href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= round($arResult['nStartPage']
                                                                                                                              / 2) ?>">...</a>
                    <?
                }
            }
        }

        do {
            if ($arResult['nStartPage'] == $arResult['NavPageNomer']) {
                ?>
                <span class="<?= ($bFirst ? 'modern-page-first '
                    : '') ?>modern-page-current"><?= $arResult['nStartPage'] ?></span>
                <?
            } elseif ($arResult['nStartPage'] == 1 && $arResult['bSavePage'] == false) {
                ?>
                <a href="<?= $arResult['sUrlPath'] ?><?= $strNavQueryStringFull ?>"
                   class="<?= ($bFirst ? 'modern-page-first' : '') ?>"><?= $arResult['nStartPage'] ?></a>
                <?
            } else {
                ?>
                <a href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= $arResult['nStartPage'] ?>"<?
                ?> class="<?= ($bFirst ? 'modern-page-first' : '') ?>"><?= $arResult['nStartPage'] ?></a>
                <?
            }
            $arResult['nStartPage']++;
            $bFirst = false;
        } while ($arResult['nStartPage'] <= $arResult['nEndPage']);

        if ($arResult['NavPageNomer'] < $arResult['NavPageCount']) {
            if ($arResult['nEndPage'] < $arResult['NavPageCount']) {
                if ($arResult['nEndPage'] < ($arResult['NavPageCount'] - 1)) {
                    ?>
                    <a class="modern-page-dots"
                       href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= round($arResult['nEndPage']
                                                                                                                              + ($arResult['NavPageCount']
                                                                                                                                 - $arResult['nEndPage'])
                                                                                                                                / 2) ?>">...</a>
                    <?
                }
                ?>
                <a href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= $arResult['NavPageCount'] ?>"><?= $arResult['NavPageCount'] ?></a>
                <?
            }
            ?>
            <a class="modern-page-next"
               href="<?= $arResult['sUrlPath'] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult['NavNum'] ?>=<?= ($arResult['NavPageNomer']
                                                                                                                 + 1) ?>"><span
                    class="arrow">&rarr;</span></a>
            <?
        }
    }

    if ($arResult['bShowAll']) {
        if ($arResult['NavShowAll']) {
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