   <!-- Modal log in -->
    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"id='ad_user_cntnr'>
                <form action="\" class="checkout-form p-0" style=''>
                    <div class="row m-0 p-0" style=''>
                        <div class="col-12 p-0" style='margin:auto;'>
                            <div class='modal-header'>
                                <div id='logn_scses' class='col-12 row mt-2 mr-0 ml-0  alert alert-success'style='display:none;'>your Are loged In ....</div>
                                <div id='logn_faild' class='col-12 row mt-2 mr-0 ml-0  alert alert-danger'style='display:none;'>One Or More Of Your Data Are Faild ....</div>
                                <h2  id='logn_titl'>log In</h2>
                                <span aria-hidden='true' style='cursor: pointer;font-weight:1000;float:left;' data-dismiss='modal' id='clos'>&times;</span>
                            </div>
                            <div class="modal-body">
                                <div class="form-groub">
                                    <span class='err_msg alert-danger'id='usernm_msg'> </span>
                                    <label class='col-3 pl-1 mb-2' for="username">Username *</label>
                                    <input type="text"class='endlogin'  id="usernm" >
                                </div>
                                <div class="form-groub">
                                    <span class='err_msg alert-danger'id='pswrdd_msg'> </span>
                                    <label class='col-3 pl-1 mb-2' for="pass">Password *</label>
                                    <input type="text"class='endlogin'  id="pswrdd">
                                </div>
                            </div><hr>
                            <div class='modal-footer mt-0 pt-0' style='border-style:none;'>
                                <input type="button" class="btn btn-danger col-3" id='clos_loginmodal' data-dismiss="modal" value="Close">
                                <input type="button" class="btn btn-info col-3"id='login_btn'value='Log In'>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   <!-- Modal log in -->


    <script>
    $("document").ready(function(){
        
        $("#usernm").on("blur",function(){
            var inpt_id = "usernm";
            var inpt_vl =  $("#usernm").val();
            $.get('ajax/login_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
                $("#usernm_msg").html(data);
            });
        });
        $("#pswrdd").on("blur",function(){
            var inpt_id = "pswrdd";
            var inpt_vl =  $("#pswrdd").val();
            $.get('ajax/login_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
                $("#pswrdd_msg").html(data);
            });
        });
        $(".endlogin").on("focus",function(){
            $("#logn_titl").css("display","block");
            $("#logn_scses").css("display","none");
            $("#logn_faild").css("display","none");
            $(".err_msg").css("display","block");
        });
        $("#login_btn").on("click",function(){
            var nambx    = $('#usernm').val();
            var emailbx  = $('#emaill').val();
            var paswrdbx = $('#pswrdd').val();
            var inpt_id  = "login_btn";
            var inpt_vl  =  " ";
         $.get('ajax/login_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl + '&logn=logn' + 
            '&nambx=' + nambx + '&emailbx=' + emailbx + '&paswrdbx=' + paswrdbx , function(data){
            //alert("oiuyoi");
            if(data == 'faild'){
                $("#logn_faild").css('display','block');
                $(".err_msg").css('display','none');
                $("#logn_titl").css("display","none");
                $("#logn_scses").css("display","none");
            }else{
                $("#logn_faild").css('display','none');
                $(".err_msg").css('display','block');
                $("#logn_titl").css("display","none");
                $("#logn_scses").css("display","block");
                var clas = $('.active').attr('id');
                clas = '#' + clas;
                location.reload();
                /*$("#header").load(location.href + " #header");
                $("#ad_ordr_btn").load(location.href + " #ad_ordr_btn");//to relod add order bttn after log in
                $("#the_order").load(location.href + " #the_order");//to relod add responding after log in
                $("#sortvw_cat").change();//to relod caegory area after log in
                $("#sortvw_prdct").change();//to relod prdct area after log in
                $("#search_sortvw").change();
                $.get('favorit_order/favorites_ajx.php?inptid=fvrt_icon', function(data){///get num fvrt
                    $("#fvrt_nm").html(data);
                });
                   setTimeout(function(){
                     $(clas).addClass('active');
                     $('#clos_loginmodal').click();
                   }, 1500);
                */
            }
          });
        });
});
    //////////////logn//////////////////////
    </script>