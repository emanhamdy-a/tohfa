<?php include('includes/header.php');
 if(isset($_GET['bid'])) {$byrid=$_GET['bid'];}else{$byrid=0;}
 if(isset($_GET['oid'])) {$ordrid=$_GET['oid'];}else{$ordrid=0;};
 ?>
 <input id='byrid' name='byrid' value='<?php echo $byrid; ?>' type="hidden">
 <input id='ordrid'name='ordrid' value='<?php echo $ordrid; ?>' type="hidden">
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
                 <div class="col-lg-9 order-1 order-lg-2 pb-0" style='margin:auto;'>
                    <div class="product-show-option p-0 m-0 pb-4">
                        <div class='row col-12 p-0 m-0'>
                            <div class="col-12 p-0 m-0">
                                <div class="row p-0 m-0 col-lg-12 col-md-12">
                                    <div class="p-0 col-lg-6 col-md-6">
                                        <input value='0' name='pgntn_rspnd' id='pgntn_rspnd' typ='number'style='font-size:0px;border-style:none;position:absolute;width:5px;height:5px;'>
                                        <div class='row p-0 m-0 col-lg-8 col-md-8 '>
                                            <div class="p-2 mb-0" style='border:0px solid gray;color:#252525;text-transform: uppercase;font-weight:500;'> View <a style='font-weight:700;'class='p-2'>:</a> </div>                                      
                                            <select class="form-groub p-2 ml-0 col-lg-6 col-md-8" id='sortvew_rspnd'>
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
                                    <div class="text-right col-lg-6 col-md-6"><!---->
                                        <p id='echo_show_result' class=''></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class='product-list pb-0 pt-5' id=''style='border:0px red solid;'>
                        <?php
                        $db=connect_to_database();
                        //get user id
                        //$user_id=user_id();

                            $query="SELECT * FROM orders WHERE id = $ordrid"; 
                            $result=@mysqli_query($db,$query); 
                            $nu_rw=@mysqli_num_rows($result);
                        if(@mysqli_num_rows($result) > 0) {  
                            echo"<div id='accordion'style='border:solid 0px red;'";
                            
                            for($div=1 ; $div <= $nu_rw ;$div ++) {///
                                $row_data = mysqli_fetch_assoc($result);
                                $byer_id  = $row_data['user_id']; 
                                $order_id  = $row_data['id']; 
                                $detls     = $row_data['detls'];         
                                $order_img = $row_data['img']; 
                                $end_dat   = $row_data['end']; 
                                $order_pric= $row_data['pric']; 
                                $ordre_titl= $row_data['titl']; 
                                $cty       = $row_data['cty_id']; 
                                $gvrnts    = $row_data['gvrn_id']; /**/
                                if($div == 1){
                                    echo"
                                        <div class='card'>
                                            <div class='card-body border'  style='border:0px red solid;'>
                                                <div class='product-content p-0 m-0'>
                                                    <div class='row m-0 p-0'>
                                                        <div class='col-lg-5'>
                                                            <img src='$order_img' alt='' style='max-height:550px;'>
                                                        </div>
                                                        <div class='col-lg-7 p-0 m-0 mt-5 text-right'>
                                                            <h5>العنوان</h5>
                                                            <p style=''><span class='p-3 text-danger'>$ordre_titl</span></p>
                                                            <h5>التفاصيل</h5>
                                                            <p style='min-height:66px;'>$detls</p>
                                                            <h5>تاريخ التسليم </h5>
                                                            <p style=''>بعد<span class='p-3 text-danger'>$end_dat</span>يوم</p>
                                                            <h5>الثمن </h5>
                                                            <p style=''>£E :<span class='p-1 text-danger'> $order_pric </span></p>
                                                            <span  id='the_order'><button class='btn btn-info text-center pr-2'"; echo_add_rspnd_btn(); echo">اضف عرض +</button></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        ";
                                }}}?>
                    </div>
                    <div class='product-list pb-0 pt-5' id='echo_ajx_rspnds'style='border:0px red solid;'>
  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partner Logo Section Begin -->
        <div class="partner-logo p-3 m-0">
            <div class="container">
            
            </div>
        </div>
    <!-- Partner Logo Section End -->

  <?php include('includes/footer.php');?>
    <script>
        $("document").ready(function(){
            // $("#myacont").addClass('active');
                var orderid='show_rspnds';
                var ordr_id=$('#ordrid').val();
                var pgntn_rspnd = 0;
                var selectvw = 6;
              $.get('favorit_order/responding_ajx.php?oid=' + ordr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd, function(data){
                    $("#echo_ajx_rspnds").html(data);
                       var orderid='show_result';
                        var count = $("#echo_ajx_rspnds .count").children().length;////ليه قسمتها
                        $.get('favorit_order/responding_ajx.php?oid=' + ordr_id + '&inptid=' + orderid + '&pgntn_nu=' + pgntn_rspnd + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });        
               });
                /**//* gvrn_rspnds cty_rspnds rspnd_pric rspnd_adrs rspnd_titl rspnd_dscrbtn  rspnd_adrs  order_submit*/    
                         
            $("#sortvew_rspnd").on("change",function(){
                var orderid='show_rspnds';
                var sort_cty = $("#sort_cty").val();
                var selectvw =  $("#sortvew_rspnd").val();
                pgntn_rspnd= $("#pgntn_rspnd").val();
                $.get('favorit_order/responding_ajx.php?oid=' + ordr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd, function(data){
                     $("#echo_ajx_rspnds").html(data);
                        var orderid='show_result';
                        var count = $("#echo_ajx_rspnds .count").children().length;
                        $.get('favorit_order/responding_ajx.php?oid=' + ordr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                        if(selectvw > count && pgntn_rspnd > 0)//back to first page//
                         {
                            $("ul button").last().click();
                         }
                });
            });
            $("#echo_ajx_rspnds").on("click",".pagenation",function(){
                //$(this).addClass("active");
                var orderid='show_rspnds';
                var sort_cty = $("#sort_cty").val();
                var selectvw =  $("#sortvew_rspnd").val();
                var pgntn_rspnd =  $(this).val();
                $("#pgntn_rspnd").val(pgntn_rspnd);
                 $.get('favorit_order/responding_ajx.php?oid=' + ordr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd, function(data){
                    $("#echo_ajx_rspnds").html(data);
                        var orderid='show_result';
                        var count = $("#echo_ajx_rspnds .count").children().length;
                        $.get('favorit_order/responding_ajx.php?oid=' + ordr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                });/**/
            });            
            $("#ad_rspnds_cntnr").on("submit","#add_rspnd",function(event){
                event.preventDefault(); //prevent default action
                //alert('hi');
                var post_url = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var byrid = $("#byrid").val();
                var ordrid =  $("#ordrid").val();
                var form_data = new FormData(this); //Creates new FormData object
                form_data.append("byrid", byrid); 
                form_data.append("ordrid", ordrid);
                $.ajax({
                        url : post_url,
                        type: request_method,
                        data : form_data,
                        contentType: false,
                        cache: false,
                        processData:false
                       }).done(function(response){ ////
                           //alert(response);//rspnd_titl rspnd_scss
                        if(response == 'done'){
                           $('#rspnd_titl').css('display','none');
                           $('#rspnd_scss').css('display','block');
                           $("#add_rspnd .empty").val('');
                            setTimeout(function(){
                                $('#rspnd_titl').css('display','block');
                                $('#rspnd_scss').css('display','none');
                                $('#closrspnd').click();
                            }, 1500);
                            var inptid='show_rspnds';
                            var pgntn_rspnd = $("#pgntn_rspnd").val();
                            var selectvw =  $("#sortvew_rspnd").val();
                            $.get('favorit_order/responding_ajx.php?oid=' + ordr_id + '&inptid=' + inptid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd, function(data){
                                $("#echo_ajx_rspnds").html(data);
                                var orderid='show_result';
                                var count = $("#echo_ajx_rspnds .count").children().length;
                                $.get('favorit_order/responding_ajx.php?oid=' + ordr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd + '&show_result=' + count, function(data){
                                    $("#echo_show_result").html(data);
                                });
                            }); 
                        }
                    });
            });           
            $("#echo_ajx_rspnds").on("click",".slid",function(){
                var i_d = $(this).attr('id'); 
                i_d = i_d.split('_');
                i_d = i_d[1];
                i_d = '#collapse_' + i_d;
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

    <!-- Modal add new order ad_rspnds_cntnr-->
   <div class="modal fade" id="ad_rspnds_cntnr" tabindex="-1" role="dialog" aria-labelledby="ad_rspnds_cntnrLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"id=''>
             <form id='add_rspnd' action='favorit_order/responding_ajx.php'method='post' class='checkout-form col-12 m-0' enctype='multipart/form-data' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
                <div  class='modal-header mb-3'>
                    <h5  class='modal-title' id='rspnd_titl'>Add Your Responding ... </h5>
                    <h5  class='modal-title alert alert-success col-12' id='rspnd_scss' style='display:none;' >Done ... </h5>
                    <span  data-dismiss='modal' aria-hidden='true' style='cursor: pointer;font-weight:1000;' id='clos'>&times;</span>
                </div>
                <div  class='form-group pt-2'>
                    <label for=''>Atelier Or DressMaker Name</label>
                    <input value='' name='rspnd_nam' id='rspnd_nam' type='text'maxlength='50'minlength='4'  class='form-control empty' required>
                </div>
                <div  class='form-group pt-2'>
                    <label for=''>Phone Or Email Or Any Chanel</label>
                    <input value='' name='rspnd_num' id='rspnd_num' type='text'maxlength='50'minlength='4'  class='form-control empty' required>
                </div>
                <div  class='form-group'>
                    <label for='exampleFormControlTextarea1'>Details</label>
                    <textarea value='' name='rspnd_dscrbtn'maxlength='500'minlength='5'  class='form-control empty' id='rspnd_dscrbtn' rows='3' required></textarea>
                </div>
                <div  class='form-group'>
                    <label for=''>Price</label>
                    <input value='' name='rspnd_pric' id='rspnd_pric' type='number'maxlength='8'  class='form-control empty' required>
                </div>

                <div  class='modal-footer'>
                    <button type='button' id='closrspnd' class=' btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='submit' id='rspn_submit'  class='btn btn-primary'>Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ------------warning modal--------- -->
    <div class="modal fade" id="warning_modal" tabindex="-1" role="dialog" aria-labelledby="ad_rspnds_cntnrLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
             <form class='checkout-form col-12 m-0' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
                <div  class='modal-header mb-3'>
                    <h5  class='modal-title'>Warning !</h5>
                    <span  data-dismiss='modal' aria-hidden='true' style='cursor: pointer;font-weight:1000;' id='clos'>&times;</span>
                </div>
                 You Are Not A Dress Maker,<br> Log Out Then Create Account Or Log In As A Dress Maker ...
                <div  class='modal-footer mt-3'>
                    <button type='button' class=' btn btn-info' data-dismiss='modal'>Ok</button>
                </div>
                </form>
            </div>
        </div>
    </div>