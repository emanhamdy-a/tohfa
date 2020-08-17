<?php include('includes/header.php');
 if(check_login() && user_type() =='byer' || user_type() =='admin' )
 {}else{header("location:index.php");}
 ?>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container-fluid">
            <div class="row col-12 p-0 pl-3 m-0 mt-5" style=''>
                <div class='col-2 p-0 m-0'>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad pb-3">
        <div class="container">
            <div class="row">

                    <div class='product-tab col-lg-9 ' style='margin:auto;border:0px solid red;'>
                        <div class='tab-item'>
                            <ul class='nav' role='tablist'>
                                <li class='col-6 p-0'>
                                    <a class='col-12 p-3 text-right pr-5'style='font-size:20px;' data-toggle='tab' href='#tab-2' role='tab'>الطلبات</a>
                                </li>
                                <li class='col-6 p-0'>
                                    <a class='active col-12 p-3 text-right pr-5'style='font-size:20px;' data-toggle='tab' href='#tab-1' role='tab'>المفضلات</a>
                                </li>
                            </ul>
                        </div>
                        <div class='tab-item-content'>
                            <div class='tab-content'>
                                <div class='tab-pane fade' id='tab-2' role='tabpanel'>
                                    <div class='specification-table'>
                                        <table  id='ordr_table'>
                                                <div class="product-show-option p-0 m-0 pb-4">
                                                    <div class='row col-12 p-0 m-0'>
                                                        <div class="col-12 p-0 m-0">
                                                            <div class="row p-0 m-0 col-lg-12 col-md-12">
                                                                <div class="p-0 col-lg-6 col-md-6 mt-3">
                                                                    <input value='0' name='ordr_pgntn_num' id='ordr_pgntn_num' typ='number'style='font-size:0px;border-style:none;position:absolute;width:5px;height:5px;'>
                                                                    <div class='row p-0 m-0 col-lg-8 col-md-8 '>
                                                                        <div class="p-2 mb-0" style='border:0px solid gray;color:#252525;text-transform: uppercase;font-weight:500;'> View <a style='font-weight:700;'class='p-2'>:</a> </div>                                      
                                                                        <select class="form-groub p-2 ml-0 col-lg-6 col-md-8" id='sortvew_order'>
                                                                            <option value=3>3</option>
                                                                            <option value=6 selected> 6</option>
                                                                            <option value=9> 9</option>
                                                                            <option value=12>12</option>
                                                                            <option value=15>15</option>
                                                                            <option value=18>18</option>
                                                                            <option value=21>21</option>
                                                                            <option value=24>24</option>
                                                                            <option value=30>30</option>
                                                                            <option value=36>36</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="text-right col-lg-6 col-md-6 mt-3"><!---->
                                                                   <span id='ad_ordr_btn'><div id='adorder1'class='p-2 mb-0 p-0 mr-3 col-2' style='border-radius:1px; border:0px solid gray;background-color:#e7ab3c;color:#ffffff;text-transform: uppercase;font-weight:550;cursor:pointer;float:left; text-align:center;' data-toggle='modal' data-target='#ad_order_cntnr' >+ <a style='font-weight:300;'></a></div></span>                                    
                                                                    <p id='order_show_result' class=''></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class='product-list pb-0 pt-5' id='echo_ajx_usr_ordr'style='border:0px red solid;'>
                            
                                                </div> 
                                        </table>
                                    </div>
                                </div>                            
                                <div class='tab-pane fade-in active' id='tab-1' role='tabpanel'>
                                    <div class='specification-table'>
                                        <table id='fvrt_table'>
                                            <div class="col-12 " style=''>
                                                <div class="product-show-option">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-md-7 mb-4">
                                                            <div class="select-option"style='border:red 0px solid;'>
                                                            
                                                            <div class='p-2 mb-0 pb-0 pl-1 pr-1' style='border:1px solid gray;background-color:#252525;color:#ffffff;text-transform: uppercase;font-weight:500;'>Category <a style='font-weight:700;'>:</a> </div>                                    
                                                                <select class="form-groub p-2 mr-4 ml-1 col-3" id='fvrt_sortct'>
                                                                <option  class='font' value='all'>All</option>
                                                                <?php
                                                                    $db = connect_to_database();    
                                                                    $result = @mysqli_query($db, 'SELECT id,catnm from category3 WHERE parnt_id = 0 order by id asc ');
                                                                    while($row = mysqli_fetch_array($result))
                                                                        {
                                                                            $catId = $row['id'];
                                                                            $catName = $row['catnm'];
                                                                            ECHO "<option  class='font' value='$catId'>$catName</option>";        
                                                                        }
                                                                ?>
                                                                </select>

                                                                <div class="p-2 mb-0 pb-0 pl-1 pr-1" style='border:1px solid gray;background-color:#252525;color:#ffffff;text-transform: uppercase;font-weight:500;'>View  <a style='font-weight:700;'>:</a> </div>                                      
                                                                <select class="form-groub p-2 ml-1 col-3" id='fvrt_sortvw'>
                                                                    <option value=3>3</option>
                                                                    <option value=6 selected> 6</option>
                                                                    <option value=9> 9</option>
                                                                    <option value=12>12</option>
                                                                    <option value=15>15</option>
                                                                    <option value=18>18</option>
                                                                    <option value=21>21</option>
                                                                    <option value=24>24</option>
                                                                    <option value=30>30</option>
                                                                    <option value=36>36</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 col-md-5 text-right"><!---->
                                                        <input value='0' name='pgntn_nu' id='fvrt_pgntn_nu' typ='number'style='font-size:0px;border-style:none;position:absolute;width:5px;height:5px;'>
                                                            <p id='fvrt_order_show_result'></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='product-list pb-0 pt-4' id='fvrt_echo_ajx_prdct'style='border:0px red solid;'>
                                                
                                                </div>
                                            </div>                                        
                                        </table>
                                    </div>     
                                </div>
                            </div>
                        </div>
                    </div>



            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
    <!-- Partner Logo Section Begin -->
        <div class="partner-logo p-3 m-0">
            <div class="container">
            
            </div>
        </div>
    <!-- Partner Logo Section End -->
<!-- Modal -->
    <div class="modal fade" id="fvrt_exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fvrt_exampleModalLabel">Warning !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are You Sure You Want Remove This Order ... ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id='fvrt_modal_ok' >Yeas</button>
            </div>
            </div>
        </div>
    </div>
<!-- Modal -->

    <?php include('includes/footer.php');?>
    <script>
        $("document").ready(function(){
              $("#favort").addClass('active');
               var inptid='show_favorts';
                var selectct = "all";
                var pgntn_nu = 0;
                var selectvw = 6;
               $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                  $("#fvrt_echo_ajx_prdct").html(data);
                       var inptid='fvrt_show_result';
                        var count = $("#fvrt_echo_ajx_prdct .count").children().length;
                        $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#fvrt_order_show_result").html(data);
                        });        
               });
    ////////////////////////fvrt//////////////////////////
            $("#fvrt_sortct").on("change",function(){
                $("#fvrt_pgntn_nu").val(0);
                var inptid='show_favorts';
                var selectvw =  $("#fvrt_sortvw").val();
                var selectct =  $("#fvrt_sortct").val();
                pgntn_nu= $("#fvrt_pgntn_nu").val();
                $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                     $("#fvrt_echo_ajx_prdct").html(data);
                        var inptid='fvrt_show_result';
                        var count = $("#fvrt_echo_ajx_prdct .count").children().length;
                        $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#fvrt_order_show_result").html(data);
                        });
                });        
            });            
            $("#fvrt_sortvw").on("change",function(){
                var inptid='show_favorts';
                var selectvw =  $("#fvrt_sortvw").val();
                var selectct =  $("#fvrt_sortct").val();
                pgntn_nu= $("#fvrt_pgntn_nu").val();
                $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                     $("#fvrt_echo_ajx_prdct").html(data);
                        var inptid='fvrt_show_result';
                        var count = $("#fvrt_echo_ajx_prdct .count").children().length;
                        $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#fvrt_order_show_result").html(data);
                        });
                        if(selectvw > count && pgntn_nu > 0)//back to first page//
                         {
                            $("ul button").last().click();
                         }
                });
            });
            $("#fvrt_echo_ajx_prdct").on("click",".pagenation",function(){
                //$(this).addClass("active");
                var inptid='show_favorts';
                var selectvw =  $("#fvrt_sortvw").val();
                var selectct =  $("#fvrt_sortct").val();
                var pgntn_nu =  $(this).val();
                $("#fvrt_pgntn_nu").val(pgntn_nu);
                 $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                    $("#fvrt_echo_ajx_prdct").html(data);
                        var inptid='fvrt_show_result';
                        var count = $("#fvrt_echo_ajx_prdct .count").children().length;
                        $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#fvrt_order_show_result").html(data);
                        });
                });
            });
            $('#fvrt_echo_ajx_prdct').on('click','.ad_fvrt',function(){
               var prdctid=$(this).attr('id');
                $.get('favorit_order/adfavorit_ajx.php?pid=' + prdctid, function(data){
                       prdctid="#fvrt" + prdctid;
                        $(prdctid).html(data);
                        var inptid='show_favorts';
                        var selectvw =  $("#fvrt_sortvw").val();
                        var selectct =  $("#fvrt_sortct").val();
                        pgntn_nu= $("#fvrt_pgntn_nu").val();
                        $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                            $("#fvrt_echo_ajx_prdct").html(data);
                            var inptid='fvrt_show_result';
                            var count = $("#fvrt_echo_ajx_prdct .count").children().length;
                             if(selectvw > count && pgntn_nu > 0)//back to first page//
                              {
                                $("ul button").last().click();
                              }
                            $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                                $("#fvrt_order_show_result").html(data);
                            });
                        });
                        $.get('favorit_order/favorites_ajx.php?inptid=fvrt_icon', function(data){
                            $("#fvrt_nm").html(data);
                        });
                });
            });/**/ 
    ///////////////////////order/////////////////////////  deletordr
               var orderid='show_order';
                var pgntn_nu = 0;
                var selectvw = 6;
               $.get('favorit_order/favorites_ajx.php?inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                    $("#echo_ajx_usr_ordr").html(data);
                       var orderid='show_result';
                        var count = $("#echo_ajx_usr_ordr .count").children().length;////ليه قسمتها
                        $.get('favorit_order/favorites_ajx.php?inptid=' + orderid + '&show_result=' + count, function(data){
                            $("#order_show_result").html(data);
                        });        
               });
            $("#sortvew_order").on("change",function(){
                var orderid='show_order';//alert('pppppppppppp');
                var selectvw =  $("#sortvew_order").val();
                pgntn_nu= $("#ordr_pgntn_num").val();
                $.get('favorit_order/favorites_ajx.php?inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                     $("#echo_ajx_usr_ordr").html(data);
                        var orderid='show_result';
                        var count = $("#echo_ajx_usr_ordr .count").children().length;
                        $.get('favorit_order/favorites_ajx.php?inptid=' + orderid + '&show_result=' + count + '&pgntn_nu=' + pgntn_nu, function(data){
                            $("#order_show_result").html(data);
                        });
                            if(selectvw > count && pgntn_nu > 0){//back to first page//
                               // var t ="#btn_" + pgntn_nu ;
                              $("ul button").last().click();
                              //// var t=   $("ul button").last().attr('id');alert(t);
                              ////  $('#' + t).click();
                            }
                });
            });
            $("#echo_ajx_usr_ordr").on("click",".pagenation",function(){
                var pgntn_nu =  $(this).val();
                $("#ordr_pgntn_num").val(pgntn_nu);
                var inptid='show_order';
                var selectvw =  $("#sortvew_order").val();
                $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                    $("#echo_ajx_usr_ordr").html(data);
                       var orderid='show_result';
                        var count = $("#echo_ajx_usr_ordr .count").children().length;////ليه قسمتها
                        $.get('favorit_order/favorites_ajx.php?inptid=' + orderid + '&show_result=' + count + '&pgntn_nu=' + pgntn_nu, function(data){
                            $("#order_show_result").html(data);
                        });       
               });
            });
            $("#ad_order_cntnr").on("change","#2governts",function(){
                var orderid='sort_govrn';
                var inptvl = $("#2governts").val();
                var catName = $("#2governts :selected").html();
                var ctid = $("#2governts :selected").val();
                $.get('favorit_order/favorites_ajx.php?inptid=' + orderid + '&inptvl=' + inptvl + '&catName=' + catName + '&ctid=' + ctid, function(data){
                    $("#2cities").html(data);
                });
            });
            $("#ad_order_cntnr").on("submit","#2add_order",function(event){
                event.preventDefault(); //prevent default action 
                var post_url = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data = new FormData(this); //Creates new FormData object
                $.ajax({
                        url : post_url,
                        type: request_method,
                        data : form_data,
                        contentType: false,
                        cache: false,
                        processData:false
                       }).done(function(response){ //alert(response);
                        if(response == 'done'){
                           $('#2modal_titl').html('Done ...');
                           $('#2modal_titl').addClass('alert alert-success col-12');
                           $('#2modal_titl').css('color','green');
                            $("#2add_order .empty").val('');
                            setTimeout(function(){
                                $('#2close').click();
                                $("#2modal_titl").html('Add New Order ...');
                                $('#2modal_titl').removeClass('alert alert-success col-12');
                                $('#2modal_titl').css('color','black');
                               
                            }, 1500);
                            var orderid='show_order';
                            var selectvw =  $("#sortvew_order").val();
                            $("#ordr_pgntn_num").val(0);
                            pgntn_nu= $("#ordr_pgntn_num").val();
                            $.get('favorit_order/favorites_ajx.php?inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                                $("#echo_ajx_usr_ordr").html(data);
                                    var orderid='show_result';
                                    var count = $("#echo_ajx_usr_ordr .count").children().length;
                                    $.get('favorit_order/favorites_ajx.php?inptid=' + orderid + '&show_result=' + count + '&pgntn_nu=' + pgntn_nu, function(data){
                                        $("#order_show_result").html(data);
                                    });
                            }); 
                        }
                    });
            });/**/
            $('#echo_ajx_usr_ordr').on('click','.delt_order',function(){
                var ordrid = $(this).prev().val();
                $('#order_id').val(ordrid);
            });
            $('#accept_dlt').on('click',function(){
                var inptid = 'deletordr';
                var ordrid = $('#order_id').val();
                $.get('favorit_order/favorites_ajx.php?pid=' + ordrid + '&inptid=' + inptid , function(data){
                    var inptid='show_order';//alert(data);
                    var selectvw =  $("#sortvew_order").val();
                    pgntn_nu= $("#ordr_pgntn_num").val();
                    $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                        $("#echo_ajx_usr_ordr").html(data);
                            var inptid='show_result';
                            var count = $("#echo_ajx_usr_ordr .count").children().length;
                            $.get('favorit_order/favorites_ajx.php?inptid=' + inptid + '&show_result=' + count + '&pgntn_nu=' + pgntn_nu, function(data){
                                $("#order_show_result").html(data);
                            });
                            if(selectvw > count && pgntn_nu > 0){//back to first page//
                               // var t ="#btn_" + pgntn_nu ;
                              $("ul button").last().click();
                              //// var t=   $("ul button").last().attr('id');alert(t);
                              ////  $('#' + t).click();
                            }
                    });/*   */
                });
            });
            $("#echo_ajx_usr_ordr").on("click",".slid",function(){
                var i_d = $(this).attr('id'); 
                i_d = i_d.split('_');
                i_d = i_d[1];
                i_d = '#collps_' + i_d;
                var dsply = $(i_d).css('display');//alert(dsply);
                $('.collapse').slideUp();
                if(dsply == 'none'){
                  $(i_d).slideDown();
                }else{
                    $(i_d).slideUp();
                }
            });      
        });
    </script>

        <!-- Modal add new order ad_order_cntnr-->
    <div class="modal fade" id="ad_order_cntnr" tabindex="-1" role="dialog" aria-labelledby="ad_order_cntnrLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"id=''>
             <form id='2add_order' action='favorit_order/favorites_ajx.php'method='post' class='checkout-form col-12 m-0' enctype='multipart/form-data' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
                <div  class='modal-header mb-3'>
                    <h5  class='modal-title' id='2modal_titl'>Add new Order ... </h5>
                    <span  data-dismiss='modal' aria-hidden='true' style='cursor: pointer;font-weight:1000;' id='2clos'>&times;</span>
                </div>
                <div clas='col-12 m-0 p-0 'style='border:0px solid green;'>
                <div  class='form-group m-0 p-0'style='width:48%;display:inline-block;'>
                            <label for='main_ct'>governates</label>
                            <select value='' name='2governts'   id='2governts'  class='form-control'>";
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
                        <div id='2echo_sub_ct' class='form-group m-0  p-0'style='width:48%;display:inline-block;float:right;'>
                            <label for=''>city</label>
                            <select value='' name='2cities' id='2cities'   class='form-control'>";
                               <?php
                                    $db = connect_to_database();    
                                    $result = @mysqli_query($db, "SELECT id ,cty_nm from ctys WHERE parnt_id = 1 order by id asc ");
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
                <div  class='form-group pt-4'>
                <label for=''>Order Title</label>
                <input value='' name='2order_titl' id='2order_titl' type='text'maxlength='125'minlength='4'  class='form-control empty' required>
                </div>
                <div  class='form-group'>
                    <label for=''>Details</label>
                    <textarea value='' name='2order_dscrbtn'maxlength='500'minlength='5'  class='form-control empty' id='2order_dscrbtn' rows='3' required></textarea>
                </div>
                <div  class='form-group'>
                    <label for=''>Price</label>
                    <input value='' name='2pric' id='2pric' type='number'maxlength='8'  class='form-control empty' required>
                </div>
                <div  class='form-group'>
                    <label for=''>Date In Day</label>
                    <input value='' name='2order_dat' id='2order_dat' maxlength='3' type='number' class='form-control empty'required>
                </div>
                <div  class='form-group' style='position:relative;'>
                    <label for=''>Image</label>
                    <!--<span class='col-9 m-0' style=''>ttttttttttt</span>-->
                        <input value='' name='2ordr_img' id='2ordr_img' type='file'maxlength='120'minlength='4'  class='form-control empty' style=''>
                </div>
                <div  class='modal-footer'>
                    <button type='button' id='2close' class=' btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='submit' id='2order_submit'  class='btn btn-primary'>Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  <!-- ------------warning modal--------- -->
    <div class="modal fade" id="delete_order" tabindex="-1" role="dialog" aria-labelledby="ad_rspnds_cntnrLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
             <form class='checkout-form col-12 m-0' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
                <div  class='modal-header mb-3'>
                    <h5  class='modal-title'>Warning !</h5>
                    <span  data-dismiss='modal' aria-hidden='true' style='cursor: pointer;font-weight:1000;' id='clos'>&times;</span>
                </div>
                <div class="modal-body">
                  Are You Sure You Want Delete This Order ... ?
                 </div>
                <div  class='modal-footer mt-3'>
                    <button type='button' class=' btn btn-secondary' data-dismiss='modal' id="">Cancel</button>
                    <input type="hidden" id='order_id'>                
                    <button type='button' class=' btn btn-danger' data-dismiss='modal' id="accept_dlt">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>