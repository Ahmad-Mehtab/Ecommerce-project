let enPrice;

const getExRate = async (callback) => {
    // console.log(globals.currentCoin);
    let get = await fetch(
        `https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=BNB`,
        {
            method: "GET",
        }
    );
    let res = await get.json();
    // console.log(" ===========>", res);
    // let rate = res.rate;
    let rate = res["BNB"];
    // if(localStorage.getItem("chk") != null && localStorage.getItem("chk") == 1){
    // alert('tax2');
    // enPrice = rate * "99" + "22";
    // }else{
    // alert('no-tax2');
    enPrice = rate * "0.05";
    // }

    enPrice = enPrice.toFixed(8);
    // console.log(globals.exchangeRate);
    callback(true);
};

const initEnrollmentPurchase = (userId) => {
    if (currentAccount) {
        getExRate((success) => {
            if (success) {
                web3.eth
                    .sendTransaction({
                        from: currentAccount,
                        to: ownerWallet,
                        value: web3.utils.toWei(enPrice.toString()),
                        gas: "21000",
                        gasPrice: web3.utils.toWei("10", "Gwei"),
                    })
                    .on("transactionHash", (hash) => {
                        insertTxn(hash, userId);
                    })
                    .on("receipt", (receipt) => {
                        console.log(receipt);
                    })
                    .on("error", (error) => {
                        console.log(error);
                    });
            }
        });
    } else {
        toastr.error("Please connect your wallet");
    }
};

const confirmPaymentMethod = (callback) => {
    $("#paymentModal").modal("show");
    $("body").on("click", ".btn-proceed", function () {
        $("#paymentModal").modal("hide");
        getGasPrice();
        callback(true);
    });
};
