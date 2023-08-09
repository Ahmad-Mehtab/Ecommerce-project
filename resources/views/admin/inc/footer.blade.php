
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; STARDOM UK {{ date('Y') }} </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="color: black" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button class="close text-right py-2 mr-3" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-header justify-content-center text-black">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    
                </div>
                <div class="modal-body text-center">Are you sure you want to log out?</div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a class="btn btn-primary d-flex flex-row  btn  bg-gradient-red text-white text-center" href="{{ url('admin/logout')}}"> Yes</a>
                </div>
            </div>
        </div>
    </div>

{{-- Payment model --}}
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content bg-dark-gray">
        <div class="modal-body">
            <div id="w_option" class="col-md-12 mb-2">
                <div class="row">
                  
                  <button type="button" id="" class="btn bg-gradient-red text-white btn-sm py-2  small" data-toggle="modal" data-target="#ConnectWallet">Connect Wallet</button>
                  
                  <span class="ml-2"><a class="text-white mx-auto " href="https://help.trubadger.io" target="_blank">Need A Wallet?</a></span>
                  
                </div>
                
                <div class="row">
                    <p class="small d-flex mt-3"> <span><b class="text-white">Wallet: </b> 
                    </span><span class="ml-2" id="wallet"></span>
                    </p>
                    <input type="hidden" name="wallet_address" id="wallet_address" class="form-control" >
                </div>

              </div>
          <h5 class="text-white">Select Payment Crypto</h5>
          <select
            name=""
            class="coin form-control mb-2 text-dark mx-auto mt-5"
            id="binance_pay"
          >
            <option class="bg-dark-gray" value="" selected>Select payment option</option>
            <option class="bg-dark-gray" value="ETH" >ETH</option>
            <option class="bg-dark-gray" value="BNB">BNB</option>
            {{-- <option class="bg-dark-gray" value="USDT">USDT</option> --}}
            {{-- <option class="bg-dark-gray" value="BUSD">BUSD</option> --}}
          </select>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-dismiss="modal"
          >
            Close
          </button>
          <button id="binance_proceed" type="button" class="btn bg-gradient-red text-white btn-proceed">
            Proceed
          </button>
        </div>
      </div>
    </div>
</div>

{{-- Select wallet model --}}
<div class="modal fade connectwallet-modal" id="ConnectWallet" aria-hidden="true" role="dialog" >
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content border-0 bg-transparent">
       <div class="modal-body">
       <div class="content w-100">
            <h3 class="text-secondary">Select a Wallet</h3>
            <div class="wallet_card connect-metamask">
                <span class="wallet_name">MetaMask</span>
                <img src="https://cataboltswap.io/assets/images/Metamask-icon.png" alt="" class="wallet_img">
            </div>
            <div class="wallet_card connect-metamask">
                <span class="wallet_name">Trust Wallet</span>
                <img src="https://cataboltswap.io/assets/images/trust_wallet.svg" alt="" class="wallet_img">
            </div>
            <div class="wallet_card wallet-connect">
                <span class="wallet_name">Wallet Connect</span>
                <img src="https://cataboltswap.io/assets/images/walletconnect-icon.png" alt="" style="width: 50px;" class="wallet_img">
            </div>
            {{-- <div class="wallet_card connect-binance">
                <span class="wallet_name">Binance</span>
                <img src="https://cataboltswap.io/assets/images/Binance-icon.png" alt="" class="wallet_img">
            </div> --}}
            {{-- <div class="wallet_card connect-binance">
                <span class="wallet_name">Exodus</span>
                <img src="https://lh3.googleusercontent.com/FX5p3lkSFGhNy888EmvEzuegJFhTnhB6ZdIAp9UyE_IuOWWVRigyEJeL0hi7cSu-4nApqY-MU3OqdEqROs070c_n=w128-h128-e365-rj-sc0x00ffffff" alt="" class="wallet_img">
            </div> --}}

       </div>
       </div>
       </div>
    </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>

<script
  src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"
  type="application/javascript"
></script>

<script type="text/javascript" src="https://unpkg.com/web3modal@1.9.4/dist/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" ></script>
<script  type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
<script  type="text/javascript"  src="https://unpkg.com/@walletconnect/web3-provider@1.6.5/dist/umd/index.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('admin_assets/js/app.js')}}"></script>

    {{-- <script src="{{ asset('site_assets/js/script.js')}}"></script> --}}
<script>
    const BASE_URL = "{{ url('/') }}";
    //     if($("#binance_pay").get(0).selectedIndex <= 0){
    
    // $('#binance_proceed').addClass('d-none');
    // }else if(localStorage.getItem("current_account") == null && !localStorage.getItem("current_account")){
    //     $('#binance_proceed').addClass('d-none');
    //     alert('please connect your wallet to proceed');
    //     $("#binance_pay").val("");
    // }
    // $(document).on('change', '#binance_pay', function(){
    // if($("#binance_pay").get(0).selectedIndex <= 0 ){
       
    //     $('#binance_proceed').addClass('d-none');
    // }else if(localStorage.getItem("current_account") == null && !localStorage.getItem("current_account")){
        
    //     $('#binance_proceed').addClass('d-none');
    //    alert('please connect your wallet to proceed')
    //     $("#binance_pay").val("");
        
    // }else{
    //     $('#binance_proceed').removeClass('d-none');
    // }
    // });



    $(document).ready(function() {
        
        localStorage.clear();
        if($("#binance_pay").get(0).selectedIndex <= 0){
        
        $('#binance_proceed').addClass('d-none');
        }else if(localStorage.getItem("current_account") == null && !localStorage.getItem("current_account")){
            $('#binance_proceed').addClass('d-none');
            alert('please connect your wallet to proceed');
            $("#binance_pay").val("");
        }
        
        $(document).on('change', '#binance_pay', function(){
        if($("#binance_pay").get(0).selectedIndex <= 0 ){
        
            $('#binance_proceed').addClass('d-none');
        }else if(localStorage.getItem("current_account") == null && !localStorage.getItem("current_account")){
            
            $('#binance_proceed').addClass('d-none');
            alert('please connect your wallet to proceed')
            $("#binance_pay").val("");
            
        }else{
            $('#binance_proceed').removeClass('d-none');
        }
        });
});

     function deletion(){
            var x = confirm('Are you sure ?');
            if(x){
                return true;
            }else{
                return false;
            }
        }
</script>
    @yield('extra_scripts')
</body>

</html>
