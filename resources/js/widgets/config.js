export const SMALL_CHART_COMMON_CONFIG = {
    "width": "100%",
    "colorTheme": "dark",
    "isTransparent": false,
    "locale": "en"
};

export const SMALL_CHART_BTC = {
    ...SMALL_CHART_COMMON_CONFIG,
    "symbol": "BITBAY:BTCUSD",
    "container_id": "btc_widget"
};

export const SMALL_CHART_ETH = {
    ...SMALL_CHART_COMMON_CONFIG,
    "symbol": "KRAKEN:ETHUSD"
};

export const SMALL_CHART_BCH = {
    ...SMALL_CHART_COMMON_CONFIG,
    "symbol": "KRAKEN:BCHUSD"
};

export function getConfig(currencyType) {
    if (currencyType === 'btc') return SMALL_CHART_BTC;
    if (currencyType === 'bch') return SMALL_CHART_BCH;
    if (currencyType === 'eth') return SMALL_CHART_ETH;
}
