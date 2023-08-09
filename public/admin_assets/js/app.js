let web3 = new Web3(Web3.givenProvider);
const testAddress = "0x57c5B6c4eE3452a5929503bE9f7551Cc7E9BA039";
const ownerWallet = "0x94a3e8f7555DbeF59e4B9ed995291aae70627204";
const bscscanUrl = "https://bscscan.com";
let currentAccount = null;
const Web3Modal = window.Web3Modal.default;
const WalletConnectProvider = window.WalletConnectProvider.default;
const evmChains = window.evmChains;
const Trust = window.ethereum;
let packages = null;
// const BASE_URL = "http://127.0.0.1:8000";
toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "10000",
    extendedTimeOut: "10000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

// const testFunction = () => {
//   // web3.setProvider(new web3.providers.HttpProvider('http://localhost:8545'));

//   const wallet = new WalletConnect({
//     bridge: 'https://bridge.walletconnect.org'
//   });

//   wallet.connect().then(() => {
//     console.log('Connected to WalletConnect');
//     const accounts = wallet.accounts;
//     console.log('Accounts:', accounts);
//   });

// }

const truncateHash = (hash) => {
    return hash.slice(1, 6) + "..." + hash.slice(hash.length - 5);
};

const connectMetamask = () => {
    if (typeof window.ethereum !== "undefined") {
        ethereum
            .request({ method: "eth_requestAccounts" })
            .then((accounts) => {
                currentAccount = accounts[0];
                $(".curr_acc").text(currentAccount);
                globals.currentAccount = currentAccount;
                wallet_connect = true;
                fetchAccountData();
            })
            .catch((error) => {
                console.log("error", error);
                toastr.error(error.message);
            });
    } else {
        // console.log("no metamask");
        toastr.error("Please install metamask");
    }
    // setAccountBalance();
    // onChangeAccount();
};

const fetchAccountData = async () => {
    // web3 = new Web3(provider);

    // console.log("Web3 instance is", web3);

    const chainId = await web3.eth.getChainId();
    // if (!chainId) {
    //   throw new Error(
    //     "Cannot retrieve an account. Please refresh the browser"
    //   );
    // }
    const accounts = await web3.eth.getAccounts();
    currentAccount = accounts[0];
    // fetchUserInfo();
    // console.log(currentAccount, chainId);

    globals.currentAccount = currentAccount;
    $(".curr_acc").text(currentAccount);
    $(".btn-connect").text(truncateAddress(currentAccount));
    // $("#btn_paymnt").removeClass("d-none");
    if (!currentAccount) {
        localStorage.setItem("current_account", null);
        $("#btn-connect").removeClass("d-none");
        $("#wallet_address").val("");
        $("#wallet").text("");
    } else {
        localStorage.setItem("current_account", currentAccount);
        wallet_connect = true;
        $("#btn_paymnt1").removeClass("d-none");
        $("#btn-connect").addClass("d-none");
        $("#pay_en_btn").removeClass("d-none");
        $("#wallet_address").val(currentAccount);
        $("#wallet").text(currentAccount);
    }
};

const onConnect = async () => {
    console.log("Opening a dialog", web3Modal);
    try {
        provider = await web3Modal.connect();
    } catch (e) {
        console.log("Could not get a wallet connection", e);
        return;
    }

    // Subscribe to accounts change
    provider.on("accountsChanged", (accounts) => {
        currentAccount = accounts[0];
        // console.log(currentAccount);
        if (currentAccount) {
            localStorage.setItem("current_account", currentAccount);
        } else {
            localStorage.setItem("current_account", null);
        }
        let prevAccount = localStorage.getItem("current_account");
        if (currentAccount != prevAccount && prevAccount != null) {
            localStorage.setItem("current_account", currentAccount);
        }
        $(".curr_acc").text(currentAccount);
        globals.currentAccount = currentAccount;
        wallet_connect = true;
        fetchAccountData();
    });

    // Subscribe to chainId change
    provider.on("chainChanged", (chainId) => {
        fetchAccountData();
    });

    // Subscribe to networkId change
    provider.on("networkChanged", (networkId) => {
        fetchAccountData();
    });

    // await refreshAccountData();
    await fetchAccountData();
};

const truncateAddress = (address) => {
    return address.slice(1, 6) + "..." + address.slice(address.length - 5);
};

const adjustToken = (coin) => {
    if (coin !== constants.coins.ETH && coin !== constants.coins.BNB) {
        globals.currentContractAddress = contracts[coin].contractAddress;
        globals.currentAbi = contracts[coin].contractAbi;

        setupContract();
    }
    globals.currentCoin = coin;
    checkNetwork();
};

const checkNetwork = () => {
    web3.eth.getChainId().then((id) => {
        let coin = globals.currentCoin;
        if (coin == constants.coins.ETH || coin == constants.coins.USDT) {
            if (id !== constants.networks.ETH) {
                switchNetwork(constants.networks.ETH);
            }
        } else if (
            coin == constants.coins.BNB ||
            coin == constants.coins.BUSD
        ) {
            if (id !== constants.networks.BNB) {
                switchNetwork(constants.networks.BNB);
            }
        }
    });
};

const setupContract = () => {
    globals.currentContract = new web3.eth.Contract(
        globals.currentAbi,
        globals.currentContractAddress
    );
};

const getExchangeRate = async (callback) => {
    // console.log(globals.currentCoin);
    let get = await fetch(
        `https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=${globals.currentCoin}`,
        {
            method: "GET",
        }
    );
    let res = await get.json();
    // let rate = res.rate;
    let rate = res[globals.currentCoin];
    localStorage.getItem("infiniteScrollEnabled") === null;
    // if (localStorage.getItem("tx") != null && localStorage.getItem("tx")) {
    //     const total = parseInt(localStorage.getItem("tx"));
    //     globals.currentPkgPrice = total;
    // } else {
    globals.currentPkgPrice = 0.05;
    // }
    globals.exchangeRate = globals.currentPkgPrice * rate;
    globals.exchangeRate = globals.exchangeRate.toFixed(5);
    // console.log(globals.exchangeRate);
    callback(true);
};

const insertTransactionHash = (hash) => {
    let nav = new URLSearchParams(window.location.search);
    let referral = nav.get("referral");
    $.ajax({
        url: `${BASE_URL}/user/insert_package_payment`,
        method: "POST",
        data: {
            txn_hash: hash,
            package_id: globals.currentPkgID,
            token_type: globals.currentCoin,
            dollar_amount: globals.currentPkgPrice,
            token_amount: globals.exchangeRate,
            to: ownerWallet,
            from: currentAccount,
            referral: referral,
        },
        success: (response) => {
            let res = JSON.parse(response);
            if (res.status === true) {
                toastr.success(res.message);
            } else if (res.status === false) {
                toastr.error(res.message);
            }
        },
        error: (err) => {
            toastr.error(err.message);
        },
    });
};

const insertTxn = (hash, userId,film_id,role_id) => {
    // if (localStorage.getItem("tx") != null && localStorage.getItem("tx")) {
    //     var price = parseInt(localStorage.getItem("tx"));
    // } else {
    var price = 0.05;
    //console.log("film id =>", film_id);
    //console.log("role id =>",role_id);
    // }
    $.ajax({
        url: `${BASE_URL}/user/insert_package_payment_admin`,
        method: "POST",
        data: {
            user_id: userId,
            txn_hash: hash,
            film_id:film_id,
            role_id:role_id,
            token_type: globals.currentCoin,
            type: globals.currentPkgType,
            purchase_type: 1,
            price: price,
            dollar_amount: price,
            token_amount: globals.exchangeRate,
            to: ownerWallet,
            from: currentAccount,
        },
        success: (response) => {
            let res = response;
            if (res.status === true) {
                toastr.success(res.message);
                // localStorage.setItem("successMsg", res.message);

                // SAIF EDIT
                // window.location = mobileVerifyRoute;
                //   window.location = LoginRoute;
                // SAIF END EDIT
                //$(".referral_form :input").val("");
                //$("#referral").val(values.referral);
                //let html = `<div class="alert alert-success">${res.message}</div>`;
                //$(".res_message").append(html);
                //alert("successfully paid!");
                location.href = BASE_URL + "/" + "user/upload_files";
            } else if (res.status === false) {
                toastr.error(res.message);
            }
        },
        error: (err) => {
            loader(0);
            toastr.error(err.message);
        },
    });
};

const transferToken = (userId,film_id,role_id) => {
    getExchangeRate((success) => {
        if (success) {
            if (
                globals.currentCoin === constants.coins.ETH ||
                globals.currentCoin === constants.coins.BNB
            ) {
                transferETH(userId,film_id,role_id);
            } else {
                if (globals.currentCoin === constants.coins.USDT) {
                    transferAltToken("mwei", userId,film_id,role_id);
                } else {
                    transferAltToken("ether", userId,film_id,role_id);
                }
            }
        }
    });
};
// const transferToken = () => {
//   web3.eth.getChainId().then((id) => {
//     if (id === constants.networks.ETH) {
//       getExchangeRate((success) => {
//         if (success) {
//           if (
//             globals.currentCoin === constants.coins.ETH ||
//             globals.currentCoin === constants.coins.BNB
//           ) {
//             transferETH();
//           } else {
//             transferAltToken();
//           }
//         }
//       });
//     } else {
//       // alert("change network to eth");
//       toastr.warning("Change Network to ETH MAINNET");
//       switchNetwork(constants.networks.ETH).then((success) => {
//         transferToken();
//       });
//     }
//   });
// };

const transferETH = (userId,film_id,role_id) => {
    if (currentAccount) {
        web3.eth
            .sendTransaction({
                from: currentAccount,
                to: ownerWallet,
                value: web3.utils.toWei(globals.exchangeRate.toString()),
                gasPrice: globals.stdGasPrice,
                gas: "21000",
            })
            .on("transactionHash", (hash) => {
                console.log(hash);
                insertTxn(hash, userId,film_id,role_id);
            })
            .on("receipt", (receipt) => {
                console.log(receipt);
            })
            .on("error", (err) => {
                // console.log(err.message);
                toastr.error(err.message);
            });
    } else {
        // alert("Connect wallet");
        toastr.error("Connect you wallet!");
    }
};

const transferAltToken = (unit, userId,film_id,role_id) => {
    //console.log("idr aya ha");
    //console.log(globals.exchangeRate);
    globals.currentContract.methods
        .transfer(
            ownerWallet,
            web3.utils.toWei(globals.exchangeRate.toString(), unit)
        )
        .estimateGas({ from: currentAccount })
        .then((gas) => {
            globals.currentContract.methods
                .transfer(
                    ownerWallet,
                    web3.utils.toWei(globals.exchangeRate.toString(), unit)
                )
                .send({
                    from: currentAccount,
                    gas: gas,
                    gasPrice: globals.stdGasPrice,
                })
                .on("transactionHash", (hash) => {
                    console.log(hash);
                    insertTxn(hash, userId,film_id,role_id);
                })
                .on("receipt", (receipt) => {
                    console.log(receipt);
                })
                .on("error", (err) => {
                    // console.log(err.message);
                    toastr.error(err.message);
                });
        })
        .catch((err) => {
            // console.log("error ======>", err.message);
            toastr.error(err.message);
        });
};
// const transferAltToken = (unit) => {
//   if (currentAccount) {
//     globals.currentContract.methods
//       .balanceOf(currentAccount)
//       .call()
//       .then((balance) => {
//         let bal = Number(web3.utils.fromWei(balance, "mwei"));
//         if (bal >= globals.exchangeRate) {
//           globals.currentContract.methods
//             .transfer(
//               ownerWallet,
//               web3.utils.toWei(globals.exchangeRate.toString(), "mwei")
//             )
//             .estimateGas({ from: currentAccount })
//             .then((gas) => {
//               // console.log("gas =======>", gas);
//               globals.currentContract.methods
//                 .transfer(
//                   ownerWallet,
//                   web3.utils.toWei(globals.exchangeRate.toString(), "mwei")
//                 )
//                 .send({
//                   from: currentAccount,
//                   gas: gas,
//                   gasPrice: web3.utils.toWei("10", "Gwei"),
//                 })
//                 .on("transactionHash", (hash) => {
//                   console.log(hash);
//                   insertTransactionHash(hash);
//                 })
//                 .on("receipt", (receipt) => {
//                   console.log(receipt);
//                 })
//                 .on("error", (err) => {
//                   // console.log(err.message);
//                   toastr.error(err.message);
//                 });
//             })
//             .catch((err) => {
//               // console.log("error ======>", err.message);
//               toastr.error(err.message);
//             });
//         } else {
//           // alert("Not enough tokens");
//           toastr.error("Not enough Tokens!");
//         }
//       });
//   } else {
//     toastr.error("Connect your wallet!");
//   }
// };

const setupPackeges = () => {
    let html = ``;
    packages.map((package, index) => {
        html += `<div class="pkg-card" pkg-id="${index}">
              <h3 class="pkg-title">${package.title}</h3>
              <h4 class="pkg-price">$${package.price}</h4>
              <h5 class="crs-title ms-semi-bold">${package.course_title}</h5>
              <ul class="courses">
    `;

        package.courses.map((crs) => {
            html += `<li>${crs}</li>`;
        });

        html += `</ul>
      <ul class="features">
    `;

        package.features.map((feature) => {
            html += `<li>${feature}</li>`;
        });

        // <button type="button" class="btn-buy-course btn-gradient-gold border-0">Buy Now</button>
        html += `</ul>
    </div>
  `;
    });

    $(".pkg-container").empty();
    $(".pkg-container").html(html);
};

const switchNetwork = (id) => {
    let networkData;
    switch (id) {
        case 1:
            networkData = [
                {
                    chainId: web3.utils.toHex(1),
                },
            ];
            break;
        case 4:
            networkData = [
                {
                    chainId: web3.utils.toHex(4),
                },
            ];
            break;
        case 56:
            networkData = [
                {
                    chainId: web3.utils.toHex(56),
                },
            ];
            break;
    }

    return window.ethereum.request({
        method: "wallet_switchEthereumChain",
        params: networkData,
    });
};

const addNetwork = (id) => {
    let networkData;
    switch (id) {
        //bsctestnet
        case 97:
            networkData = [
                {
                    chainId: "0x61",
                    chainName: "BSCTESTNET",
                    rpcUrls: ["https://data-seed-prebsc-1-s1.binance.org:8545"],
                    nativeCurrency: {
                        name: "BINANCE COIN",
                        symbol: "BNB",
                        decimals: 18,
                    },
                    blockExplorerUrls: ["https://testnet.bscscan.com/"],
                },
            ];
            break;
        //bscmainet
        case 56:
            networkData = [
                {
                    chainId: "0x38",
                    chainName: "BSCMAINET",
                    rpcUrls: ["https://bsc-dataseed1.binance.org"],
                    nativeCurrency: {
                        name: "BINANCE COIN",
                        symbol: "BNB",
                        decimals: 18,
                    },
                    blockExplorerUrls: ["https://bscscan.com/"],
                },
            ];
            break;
        default:
            break;
    }
    // agregar red o cambiar red
    return window.ethereum.request({
        method: "wallet_addEthereumChain",
        params: networkData,
    });
};

// const getPackages = async () => {
//   let get = await fetch(`${BASE_URL}/user/get-packages`);
//   let res = await get.json();
//   packages = res.data;
// };

const getGasPrice = () => {
    web3.eth.getGasPrice().then((price) => {
        globals.stdGasPrice = price;
    });
};
const connectMetamask_new = () => {
    if (typeof window.ethereum !== "undefined") {
        ethereum
            .request({ method: "eth_requestAccounts" })
            .then((accounts) => {
                currentAccount = accounts[0];
                // setAccountBalance();
                // setMaxSwapAmt();
                // let str1 = currentAccount.slice(0, 5);
                // let str2 = currentAccount.slice(38, 42);
                // let shortAddress = `${str1}...${str2}`;
                // localStorage.setItem("current_account", currentAccount);
                // localStorage.setItem("short_address", shortAddress);
                // localStorage.setItem("btn_color", "#ff1982");
                // $(".curr_acc").text(currentAccount);
                // $(".token_nav_id").show();
                // $(".acc_no").text(shortAddress);
                // $(".btn-connect").css("background", "#ff1982");
                if (currentAccount) {
                    localStorage.setItem("current_account", currentAccount);
                } else {
                    localStorage.setItem("current_account", null);
                }
                $(".curr_acc").text(currentAccount);
                globals.currentAccount = currentAccount;
                wallet_connect = true;
                fetchAccountData();
                $("#ConnectWallet").modal("hide");
                $("#btn_paymnt1").removeClass("d-none");
                // $("#reg_wallet_1").val(currentAccount);
                // $("#user_wallet").val(currentAccount);
                // $("#nft_reg_wallet").val(currentAccount);
                // $(".wallet_container input").val(currentAccount);
            })
            .catch((error) => {
                console.log("error", error);
            });
    } else {
        return toastr.error("Please install Metamask");
    }
    // setAccountBalance();
    // onChangeAccount();
};
const walletConnect = async () => {
    try {
        const Web3Modal = window.Web3Modal.default;
        const WalletConnectProvider = window.WalletConnectProvider.default;
        const providerOptions = {
            walletconnect: {
                package: WalletConnectProvider,
                options: {
                    infuraId: "b1378a54d10d4ede9a7d46fb2468a49e",
                },
            },
        };

        web3Modal = new Web3Modal({
            cacheProvider: false, // optional
            providerOptions, // required
            disableInjectedProvider: "MetaMask", // optional. For MetaMask / Brave / Opera.
        });
        let provider = await web3Modal.connect();
        accounts = provider.accounts;
        // Subscribe to provider disconnection
        provider.on("accountsChanged", async () => {
            if (accounts.length === 0) {
                $(".acc_no").text("Connect Wallet");
                $(".btn-connect").css("background", "#3F3D3F");
                localStorage.clear();
            } else {
                currentAccount = accounts[0];
                let prevAccount = localStorage.getItem("current_account");
                if (currentAccount != prevAccount && prevAccount != null) {
                    localStorage.setItem("current_account", currentAccount);
                    let str1 = currentAccount.slice(0, 5);
                    let str2 = currentAccount.slice(38, 42);
                    let shortAddress = `${str1}...${str2}`;
                    $(".acc_no").text(shortAddress);
                    if ($("#reg_wallet_1").val() != currentAccount) {
                        $("#reg_wallet_2").val(currentAccount);
                    }
                }
                // $("#btn_paymnt").removeClass("d-none");
                if (!currentAccount) {
                    localStorage.setItem("current_account", null);
                    $("#btn-connect").removeClass("d-none");
                    $("#wallet_address").val("");
                    $("#wallet").text("");
                } else {
                    localStorage.setItem("current_account", currentAccount);
                    $("#btn_paymnt1").removeClass("d-none");
                    $("#btn-connect").addClass("d-none");
                    $("#pay_en_btn").removeClass("d-none");
                    $("#wallet_address").val(currentAccount);
                    $("#wallet").text(currentAccount);
                }
                // $("#current-account").text(currentAccount);
                // $("#user_wallet").val(currentAccount);
                // $("#nft_reg_wallet").val(currentAccount);
                // $(".wallet_container input").val(currentAccount);
                // setAccountBalance();
                // userInfo();
            }
        });

        provider.on("disconnect", () => {
            $(".acc_no").text("Connect Wallet");
            $(".btn-connect").css("background", "#3F3D3F");
            localStorage.clear();
        });
        if (accounts.length > 0) {
            currentAccount = accounts[0];
            let str1 = currentAccount.slice(0, 5);
            let str2 = currentAccount.slice(38, 42);
            let shortAddress = `${str1}...${str2}`;
            localStorage.setItem("current_account", currentAccount);
            localStorage.setItem("short_address", shortAddress);
            localStorage.setItem("btn_color", "#ff1982");
            $("#reg_wallet_1").val(currentAccount);
            $(".token_nav_id").show();
            $(".acc_no").text(shortAddress);
            $(".wallet_container input").val(currentAccount);
            $(".btn-connect").css("background", "#ff1982");
            $("#ConnectWallet").modal("hide");
            // $("#btn_paymnt").removeClass("d-none");
            if (!currentAccount) {
                $("#btn-connect").removeClass("d-none");
                $("#wallet_address").val("");
                $("#wallet").text("");
            } else {
                $("#btn_paymnt1").removeClass("d-none");
                $("#ConnectWallet").modal("hide");
                $("#btn-connect").addClass("d-none");
                $("#pay_en_btn").removeClass("d-none");
                $("#wallet_address").val(currentAccount);
                $("#wallet").text(currentAccount);
            }
        } else {
            $(".acc_no").text("Connect Wallet");
            $(".btn-connect").css("background", "#3F3D3F");
            localStorage.clear();
        }
    } catch (e) {
        console.log("Could not get a wallet connection", e);
        return;
    }
    // setAccountBalance();
    // userInfo();
};
const connectBinance = () => {
    if (typeof window.BinanceChain !== "undefined") {
        BinanceChain.request({ method: "eth_accounts" })
            .then((accounts) => {
                currentAccount = accounts[0];
                // setAccountBalance();
                // setMaxSwapAmt();
                let str1 = currentAccount.slice(0, 5);
                let str2 = currentAccount.slice(38, 42);
                let shortAddress = `${str1}...${str2}`;
                localStorage.setItem("current_account", currentAccount);
                localStorage.setItem("short_address", shortAddress);
                localStorage.setItem("btn_color", "#ff1982");
                // $(".token_nav_id").show();
                // $(".acc_no").text(shortAddress);
                // $(".btn-connect").css("background", "#ff1982");

                // $("#nft_reg_wallet").val(currentAccount);
                // $(".wallet_container input").val(currentAccount);
                // $("#btn_paymnt").removeClass("d-none");
                if (!currentAccount) {
                    $("#btn-connect").removeClass("d-none");
                    $("#wallet_address").val("");
                    $("#wallet").text("");
                } else {
                    $("#btn_paymnt1").removeClass("d-none");
                    $("#ConnectWallet").modal("hide");
                    $("#btn-connect").addClass("d-none");
                    $("#pay_en_btn").removeClass("d-none");
                    $("#wallet_address").val(currentAccount);
                    $("#wallet").text(currentAccount);
                }
            })
            .catch((error) => {
                console.log("error", error.message);
            });
    } else {
        return toastr.error("Please install Binance smart chain");
    }
    // setAccountBalance();
};
$(document).ready(function () {
    // setupPackeges();
    // checkNetwork(); saifEdit
    $("body").on("click", ".connect-metamask", function () {
        connectMetamask_new();
    });
    $("body").on("click", ".wallet-connect", function () {
        walletConnect();
    });
    $("body").on("click", ".connect-binance", function () {
        connectBinance();
    });
    // getPackages();
    getGasPrice();
    const providerOptions = {
        walletconnect: {
            package: WalletConnectProvider,
            options: {
                rpc: {
                    56: "https://bsc-dataseed.binance.org/",
                },
                network: "binance",
                chainId: 56,
                //infuraId: "dc255cb746804c658bcd31cad3d29f23",
            },
        },
    };

    // console.log("providerOption", providerOptions);

    web3Modal = new Web3Modal({
        cacheProvider: false, // optional
        providerOptions, // required
        disableInjectedProvider: false, // optional. For MetaMask / Brave / Opera.
    });

    if (localStorage.getItem("current_account")) {
        $("#reg_wallet_1").val(currentAccount);
    }

    $("body").on("click", ".btn-connect", onConnect);
    $("body").on("change", ".coin", function () {
        let coin = $(this).find(":selected").val();
        if (coin) {
            adjustToken(coin);
        }
    });

    // $("body").on("click", ".btn-pay", transferToken);

    $("body").on("click", ".btn-buy-course", function () {
        let pkgId = Number($(this).parents(".pkg-card").attr("pkg-id"));
        let pkg = packages.filter((pkg) => pkg.id === pkgId && pkg);
        pkg = pkg[0];
        globals.currentPkgPrice = pkg.price;
        globals.currentPkgID = pkg.id;
        $("#paymentModal").modal("show");
        // transferToken();
    });

    $("body").on("click", ".btn-pay", transferToken);
});
