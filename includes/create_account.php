    <!-- Modal add new user -->
    <div class="modal fade" id="crt_acnt_modal" tabindex="-1" role="dialog" aria-labelledby="crt_acnt_modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"id='ad_user_cntnr'>

            <form action='\' class='checkout-form '>
                <div  class='modal-header mb-3 pb-0'>
                    <div id='msg_faild' class='col-12 row mt-2 mr-0 ml-0  alert alert-danger'style='display:none;'>One Or More Of Your Data Are Faild ....</div>
                    <div id='msg_scces' class='col-12 row mt-2 mr-0 ml-0  alert alert-success'style='display:none;'>your Account Have Created ...</div>
                    <h4  class='modal-title' id='hd_titl'style='font-weight:700px;'>Create Account .. </h4>
                    <span aria-hidden='true' style='cursor: pointer;font-weight:1000;float:left;' data-dismiss='modal' id='clos'>&times;</span>
                </div>
                <div class='modal-body'> 
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='first_name'>First Name<span>*</span></label>
                        <span class='err_msg alert-danger' id='usrnm_msg'> </span>
                        <input class='form-control mb-1 endvldtn' type='text'   name='firstnmbx'id='first_name'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='last_name'>Last Name<span>*</span></label>
                        <span class='err_msg alert-danger' id='fulnm_msg'> </span>
                        <input class='form-control mb-1 endvldtn' type='text'   name='fullnmbx'   id='last_name' >
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='email'>Email Address<span>*</span></label>
                        <span class='err_msg alert-danger' id='emil_msg'> </span>
                        <input class='form-control mb-1 endvldtn' type='text'   name='emailbx'   id='email'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='phone_number'>Phone<span>*</span></label>
                        <span class='err_msg alert-danger' id='phon_msg'> </span>
                        <input class='form-control mb-1 endvldtn' type='text'   name='phonebx'   id='phone_number'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='pasword'>password<span>*</span></label>
                        <span class='err_msg alert-danger' id='pswrd_msg'> </span>
                        <input class='form-control mb-1 endvldtn' type='text'   name='pswrdbx'   id='pasword'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='cnfrmpwrd'>Re_password<span>*</span></label>
                        <span class='err_msg alert-danger' id='rpswrd_msg'> </span>
                        <input class='form-control mb-1 endvldtn' type='text'   name='repswdbx'  id='cnfrmpwrd'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='companynm'>Company Name</label>
                        <span class='err_msg alert-danger' id='cmpny_msg'> </span>
                        <input class='form-control mb-1 endvldtn' type='text'   name='cmpnynmbx'  id='companynm'>
                    </div>
                    <div  class='form-group m-0 p-0 'style=''>
                    <label for='user_type'>User Type</label>
                        <select value='' name='user_type'   id='user_type'  class='form-control'>
                            <option class='font' value='seler'     >Seler</option>
                            <option class='font' value='dress_maker'>Dress Maker</option>
                        </select>
                    </div>
                    <div id='usr_typ_slct' class='col-12 m-0 p-0 mb-2 mt-2'style='margin:auto;border:0px solid green;'>
                        <div  class='form-group m-0 p-0'style='width:48%;display:inline-block;'>
                            <label for='main_ct'>governates</label>
                            <select value='' name='catd'   id='main_ct'  class='form-control'>";
                                <?php
                                    $db = connect_to_database();    
                                    $result = @mysqli_query($db, "SELECT id, cty_nm from ctys WHERE parnt_id = 0 order by id asc ");
                                    while($row = mysqli_fetch_array($result))
                                        {
                                            $catId = $row['id'];
                                            $catName = $row['cty_nm'];
                                            ECHO "<option  class='font' value='$catId'>$catName</option>";        
                                        }
                                ?> 
                            </select>
                        </div> 
                        <div id='echo_sub_ct' class='form-group m-0  p-0'style='width:48%;display:inline-block;float:right;'>
                            <label for='exampleFormControlSelect1'>city</label>
                            <select value='' name='subctid'id='sub_ct'   class='form-control'>";
                               <?php
                                    $db = connect_to_database();    
                                    $result = @mysqli_query($db, "SELECT id,cty_nm from ctys WHERE parnt_id = 1 order by id asc ");
                                    while($row = mysqli_fetch_array($result))
                                        {
                                            $catId = $row['id'];
                                            $catName = $row['cty_nm'];
                                            ECHO "<option  class='font' value='$catId'>$catName</option>";        
                                        }
                                ?> 
                            </select>
                        </div>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='street_address'>Street Address<span>*</span></label>
                        <span class='err_msg alert-danger' id='adres_msg'> </span>
                        <input class='form-control mb-1 endvldtn street-first' type='text' name='strtadrsbx' id='street_address'>
                    </div>
                </div>  
                <div  class='modal-footer'style='border-top:0px;'>
                    <input type="button" class="btn btn-danger col-3" id='clos_adacntmodal' data-dismiss="modal" value="Close">
                    <input type="button" class="btn btn-info col-4" name='crtacntbtn' id='submit'value='Create Account'>
                </div>
            </form>

            </div>
        </div>
    </div>
<!-- Modal edit user data -->
<script>
        
        $("document").ready(function(){
            $("#main_ct").on("change",function(){
                var prdctid='main_cat';
                var inptvl = $("#main_ct").val();
                var catName = $("#main_ct :selected").html();
                var ctid = $("#main_ct :selected").val();
                $.get('ajax/city_select_ajx.php?inptid=' + prdctid + '&inptvl=' + inptvl + '&catName=' + catName + '&ctid=' + ctid, function(data){
                    $("#sub_ct").html(data);//alert(inptvl);
                });
            });
           $("#first_name").on("blur",function(){
                var inpt_id = "first_name";
                var inpt_vl =  $("#first_name").val();
              $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
                //$("#usrnm_msg").css("display","block");
                $("#usrnm_msg").html(data);
               });
             });
           $("#last_name").on("blur",function(){
              var inpt_id = "last_name";
              var inpt_vl =  $("#last_name").val();
              $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
                //$("#fulnm_msg").css("display","block");
                $("#fulnm_msg").html(data);
               });
            });
    
           $("#pasword").on("blur",function(){
              $("#cnfrmpwrd").val("");
              $("#rpswrd_msg").html("");
              var inpt_id = "pasword";
              var inpt_vl =  $("#pasword").val();
              $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
                //$("#pswrd_msg").css("display","block");
                $("#pswrd_msg").html(data);
               });
            });
    
           $("#cnfrmpwrd").on("blur",function(){
              var inpt_id = "cnfrmpwrd";
              var inpt_vl =  $("#cnfrmpwrd").val();
              var pswrd_vl =  $("#pasword").val();
              $.get('ajax/createacount_ajx.php?pswrd=' + pswrd_vl + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
                //$("#rpswrd_msg").css("display","block");
                $("#rpswrd_msg").html(data);
              });
            });
    
           $("#phone_number").on("blur",function(){
              var inpt_id = "phone_number";
              var inpt_vl =  $("#phone_number").val();
              $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
                //$("#phon_msg").css("display","block");
                $("#phon_msg").html(data);
               });
            });
    
           $("#email").on("blur",function(){
              var inpt_id = "email";
              var inpt_vl =  $("#email").val();
              $.get('ajax/createacount_ajx.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
                //$("#emil_msg").css("display","block");
                $("#emil_msg").html(data);
               });
            });  
           $(".endvldtn").on("focus",function(){
                $("#hd_titl").css("display","block");
                $("#msg_faild").css("display","none");
                $("#msg_scces").css("display","none"); 
            });
           $("#submit").on("click",function(){
                var inpt_id  = "submit";
                var inpt_vl  =  'seler';
                var usrnm    = $('#first_name').val();
                var flnm     = $('#last_name').val();
                var pswrd    = $('#pasword').val();
                var rpswrd   = $('#cnfrmpwrd').val();
                var phn      = $('#phone_number').val();
                var eml      = $('#email').val();
                var brth     = $('#birth').val();
                var cmpny    = $('#companynm').val();
                var adrs     = $('#street_address').val();
                var gvrnts   = $('#main_ct').val();
                var cty      = $('#sub_ct').val();
                var usr_typ  = $('#user_type').val();
                $.get('ajax/createacount_ajx.php?usr_typ=' + usr_typ + '&gvrnts=' + gvrnts + '&cty=' + cty + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl + '&firstnmbx=' + usrnm + 
                 '&fullnmbx=' + flnm + '&emailbx=' + eml + '&pswrdbx=' + pswrd + '&repswrdbx=' + rpswrd + 
                 '&phonebx=' + phn + '&birthbx=' + brth + '&cmpnynmbx=' + cmpny + '&strtadrsbx=' + adrs, function(data){
                  if(data == "done"){
                    $(".endvldtn").val("");
                    $(".err_msg").html("");
                    $("#hd_titl").css("display","none");
                    $("#msg_faild").css("display","none");
                    $("#msg_scces").css("display","block");  
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
                       $("#hd_titl").css("display","block");
                       $("#msg_faild").css("display","none");
                       $("#msg_scces").css("display","none");                          
                       $('#clos_adacntmodal').click();
                      }, 2000);/**/             
                   }else{
                       $("#hd_titl").css("display","none");
                       $("#msg_faild").css("display","block");
                       $("#msg_scces").css("display","none");  
                   }
                });
            });
    
         });
        </script> 