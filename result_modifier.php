<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

$arResult["nStartPage"] = 1;
$arResult["nEndPage"] = $arResult["NavPageCount"];
$arResult['NAV']['PAGE_NUMBER'] = $arResult['NavPageNomer'];
$arResult['NAV']['SHOW_ALL_MODE'] = $arResult['NavShowAll'];
$arResult['NAV']['DO_SHOW_ALL'] = $arResult['bShowAll'];

$arResult['NavQueryString'] = str_replace('&amp;', '&', $arResult['NavQueryString']);

parse_str($arResult['NavQueryString'], $GLOBALS['NAV']['parsed_url']);

$GLOBALS['NAV']['nav_filename'] = $arResult['sUrlPath'];

// identificator of pages
$arResult['NAV']['PAGER_ID'] = 'PAGEN_'.$arResult['NavNum'];
$arResult['NAV']['SHOWALL_ID'] = 'SHOWALL_'.$arResult['NavNum'];

if (!$arResult['NavShowAlways']) {
    if ($arResult['NavRecordCount'] == 0 || ($arResult['NavPageCount'] == 1 && $arResult['NavShowAll'] == false)) {
        return;
    }
}

if(!function_exists('MakeNewNavUrl')) {
    function MakeNewNavUrl($arAdd) {
        $nav_url = $GLOBALS['NAV']['nav_filename'] . '?'
                   . http_build_query(array_merge($GLOBALS['NAV']['parsed_url'], $arAdd), '', '&amp;');

        return $nav_url;
    }
}

// previous page url
$arResult['NAV']['URL']['PREV_PAGE']  = MakeNewNavUrl(array($arResult['NAV']['PAGER_ID']=>$arResult['NAV']['PAGE_NUMBER']-1));

// next page url
$arResult['NAV']['URL']['NEXT_PAGE'] = MakeNewNavUrl(array($arResult['NAV']['PAGER_ID']=>$arResult['NAV']['PAGE_NUMBER']+1));

// show all url
$arResult['NAV']['URL']['SHOW_ALL'] = MakeNewNavUrl(array($arResult['NAV']['SHOWALL_ID']=>1));

// show by page url
$arResult['NAV']['URL']['SHOW_BY_PAGE'] = MakeNewNavUrl(array($arResult['NAV']['SHOWALL_ID']=>0));
?>