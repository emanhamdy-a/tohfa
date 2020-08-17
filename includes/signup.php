    <!-- Modal add new user -->
    <div class="modal fade" id="rgstr_modal" tabindex="-1" role="dialog" aria-labelledby="rgstr_modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"id='ad_user_cntnr'>

                <form action="\" class="checkout-form p-0" style=''>
                    <div class="row m-0 p-0" style=''>
                        <div class="col-12 p-0" style='margin:auto;'>
                            <div class='modal-header'>
                                <div id='msg_faild'class='col-12 row mt-2 mr-0 ml-0  alert alert-danger'style='display:none;'>Fill All Inputs With Vaild Data ....</div>
                                <div id='success' class='col-12 row mt-2 mr-0 ml-0  alert alert-success'style='display:none;'>your acount have created ....</div>
                                <h2 id='ahd_titl'>sign up</h2>
                                <span aria-hidden='true' style='cursor: pointer;font-weight:1000;float:left;' data-dismiss='modal' id='clos'>&times;</span>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class='col-4 pl-1'style='' for="afirst_name">    User Name<span>*</span></label>
                                    <span class='err_msg alert-danger' id='ausrnm_msg'> </span>
                                    <input class='mb-1 vldtn' type="text"   name='afirstnmbx'id='afirst_name'>
                                </div>
                                <div class="form-group">
                                    <label class='col-4 pl-1'style='' for="alast_name">Last Name<span>*</span></label>
                                    <span class='err_msg alert-danger' id='afulnm_msg'> </span>
                                    <input class='mb-1 vldtn' type="text"   name='afullnmbx'   id='alast_name' >                                </div>                                
                                <div class="form-group">
                                    <label class='col-4 pl-1'style='' for="aemail">Email Address<span>*</span></label>
                                    <span class='err_msg alert-danger' id='aemil_msg'> </span>
                                    <input class='mb-1 vldtn' type="text"   name='aemailbx'   id='aemail'>
                                </div>
                                <div class="form-group">
                                    <label class='col-4 pl-1'style='' for="apasword">password<span>*</span></label>
                                    <span class='err_msg alert-danger' id='apswrd_msg'> </span>
                                    <input class='mb-1 vldtn' type="text"   name='apswrdbx'   id='apasword'>
                                </div>
                                <div class="form-group">
                                    <label class='col-4 pl-1'style='' for="acnfrmpwrd">Repassword<span>*</span></label>
                                    <span class='err_msg alert-danger' id='arpswrd_msg'> </span>
                                    <input class='mb-1 vldtn' type="text"   name='arepswdbx'  id='acnfrmpwrd'>
                                </div>
                                <div class="form-group">
                                    <label class='col-4 pl-1'style='' for="aphone_number">Phone<span>*</span></label>
                                    <span class='err_msg alert-danger' id='aphon_msg'> </span>
                                    <input class='mb-1 vldtn' type="text"   name='aphonebx'   id='aphone_number'>
                                </div>
                            </div>
                                <div class='modal-footer'>
                                    <input type="button" class="btn btn-danger col-3" id='clos_rgstmodal' data-dismiss="modal" value="Close">
                                    <input type="button" name='acrtacntbtn'   id='asubmit'  class="btn btn-info col-3" value="Sign up">
                                </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
<!-- Modal edit user data -->


    <script>
    //////////////register//////////////////
    $("document").ready(function(){
       $("#afirst_name").on("blur",function(){
            var inpt_id = "first_name";
            var inpt_vl =  $("#afirst_name").val();
          $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#ausrnm_msg").html(data);
           });
        });

       $("#alast_name").on("blur",function(){
          var inpt_id = "last_name";
          var inpt_vl =  $("#alast_name").val();
          $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#afulnm_msg").html(data);
           });
        });

       $("#apasword").on("blur",function(){
          $("#acnfrmpwrd").val("");
          $("#arpswrd_msg").html("");
          var inpt_id = "pasword";
          var inpt_vl =  $("#apasword").val();
          $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#apswrd_msg").html(data);
           });
        });

       $("#acnfrmpwrd").on("blur",function(){
          var inpt_id = "cnfrmpwrd";
          var inpt_vl =  $("#acnfrmpwrd").val();
          var pswrd_vl =  $("#apasword").val();
          $.get('ajax/createacount_ajx.php?pswrd=' + pswrd_vl + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#arpswrd_msg").html(data);
          });
        });

       $("#aphone_number").on("blur",function(){
          var inpt_id = "phone_number";
          var inpt_vl =  $("#aphone_number").val();
          $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#aphon_msg").html(data);
           });
        });

       $("#aemail").on("blur",function(){
          var inpt_id = "email";
          var inpt_vl =  $("#aemail").val();
          $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#aemil_msg").html(data);
           });
        });
       $(".vldtn").on("focus",function(){
            $("#ahd_titl").css("display","block");
            $("#msg_faild ").css("display","none");
            $("#success").css("display","none");
        });
       $("#asubmit").on("click",function(){
            var inpt_id  = "submit";
            var inpt_vl  =  'byer';
            var usrnm    = $('#afirst_name').val();
            var flnm     = $('#alast_name').val();
            var pswrd    = $('#apasword').val();
            var rpswrd   = $('#acnfrmpwrd').val();
            var phn      = $('#aphone_number').val();
            var eml      = $('#aemail').val();
            var brth     = $('#abirth').val();
            $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl + '&firstnmbx=' + usrnm + 
             '&fullnmbx=' + flnm + '&emailbx=' + eml + '&pswrdbx=' + pswrd + '&repswrdbx=' + rpswrd + 
             '&phonebx=' + phn + '&birthbx=' + brth , function(data){

                if(data == "done"){
                    $(".vldtn").val("");
                    $(".err_msg").html("");
                    $("#ahd_titl").css("display","none");
                    $("#success").css("display","block");
                    $("#msg_faild").css("display","none");
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
                    $("#header").load(location.href + " #header");
                    $("#sortvw_cat").change();//to relod prdct area after log in
                    $("#search_sortvw").change();
                     var clas = $('.active').attr('id');
                     clas = '#' + clas;
                    setTimeout(function(){
                     $(clas).addClass('active');
                     $('#clos_rgstmodal').click();
                    }, 2000);
                }else if(data != "done"){
                   $("#success").css("display","none");
                   $("#ahd_titl").css("display","none");
                   $("#msg_faild").css("display","block");
                } 
             
            });
        });

    });
    //////////////register//////////////////
    </script>