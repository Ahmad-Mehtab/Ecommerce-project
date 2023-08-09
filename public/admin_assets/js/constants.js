const globals = {
  currentAccount: null,
  currentContractAddress: null,
  currentAbi: null,
  currentCoin: null,
  currentContract: null,
  currentPkgPrice: null,
  currentPkgID: null,
  exchangeRate: null,
  stdGasPrice: null,
  b_wallet: null,
  o_wallet: null,
  wallet_connect: false,
};

const constants = Object.freeze({
  coins: {
    ETH: "ETH",
    USDT: "USDT",
    BNB: "BNB",
    BUSD: "BUSD",
  },
  networks: {
    ETH: 1,
    BNB: 56,
  },
});
