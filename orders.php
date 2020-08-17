<?php include('includes/header.php');
 $usertyp=user_type();
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
                 <div class="col-lg-9 order-1 order-lg-2 pb-0" style='margin:auto;'>
                    <div class="product-show-option">
                        <div class='row col-12'>
                            <div class="col-12 p-0 m-0">

                                <div class="select-option col-12 p-0 m-0"style='border:red 0px solid;'>
                                    <div class='row p-0 m-0 col-lg-4 col-md-4 pl-5 pr-5 '>
                                        <div class="p-2 mb-0 pl-0 col-12" style='text-align:right;border:0px solid gray;color:#252525;text-transform: uppercase;font-weight:500;'>  <a style='font-weight:700;'class='p-2'>:</a>View </div>                                      
                                        <select class="form-groub p-2 ml-0 col-12" id='sortvew'>
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
                                    <div class='row p-0 m-0 col-lg-4 col-md-4 pl-5 pr-5 '>
                                        <div class="p-2 mb-0 pl-0 col-12" style='text-align:right;border:0px solid gray;color:#252525;text-transform: uppercase;font-weight:500;'>  <a style='font-weight:700;'class='p-2'>:</a>المدينه </div>                                      
                                        <select class="form-groub p-2 ml-0 col-12" id='sort_cty'>
                                           <option  class='font' value='all'>All</option>
                                        </select>
                                    </div>
                                    <div class='row p-0 m-0 col-lg-4 col-md-4 pl-5 pr-5 '>
                                       <div class="p-2 mb-0 pl-0 col-12" style='text-align:right;border:0px solid gray;color:#252525;text-transform: uppercase;font-weight:500;'> <a style='font-weight:700;'class='p-2'>:</a>المحافظه</div>                                    
                                        <select class="form-groub p-2 mr-0 ml-0 col-12" id='sort_gvrn'>
                                            <option  class='font' value='all'>All</option>
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
                                </div>
                                <div class="row p-5">
                                    <div class="col-lg-12 col-md-12 text-right"><!---->
                                    <input value='0' name='pgntn_ordr' id='pgntn_ordr' typ='number'style='font-size:0px;border-style:none;position:absolute;width:5px;height:5px;'>
                                    <span id='ad_ordr_btn'><div id='adorder'class='p-2 mb-0 p-0 mr-3 col-2' style='border-radius:1px; border:0px solid gray;background-color:#e7ab3c;color:#ffffff;text-transform: uppercase;font-weight:550;cursor:pointer;float:left; text-align:center;' <?php echo_add_ordr_btn(); ?> >+ <a style='font-weight:300;'>أضف طلب</a></div></span>                                    
                                        <p id='echo_show_result'></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class='product-list pb-0 pt-4' id='echo_ajx_order'style='border:0px red solid;'>
  
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
                $("#orders_link").addClass('active');
                var orderid='show_order';
                var selectgvrn = "all";
                var sort_cty = "all";
                var pgntn_ordr = 0;
                var selectvw = 6;
               $.get('favorit_order/ad_order_ajx.php?selectcty=' + sort_cty + '&inptid=' + orderid + '&selectgvrn=' + selectgvrn + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_ordr, function(data){
                    $("#echo_ajx_order").html(data);
                       var orderid='show_result';
                        var count = $("#echo_ajx_order .count").children().length;////ليه قسمتها
                        $.get('favorit_order/ad_order_ajx.php?inptid=' + orderid + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });        
               });
            $("#sort_gvrn").on("change",function(){
                var prdctid='sort_gvrn';
                var inptvl = $("#sort_gvrn").val();
                var catName = $("#sort_gvrn :selected").html();
                var ctid = $("#sort_gvrn :selected").val();
                $.get('favorit_order/ad_order_ajx.php?inptid=' + prdctid + '&inptvl=' + inptvl + '&catName=' + catName + '&ctid=' + ctid, function(data){
                    $("#sort_cty").html(data);
                });
            });                
            $("#ad_order_contner").on("change","#governts",function(){
                var orderid='sort_govrn';
                var inptvl = $("#governts").val();
                var catName = $("#governts :selected").html();
                var ctid = $("#governts :selected").val();
                $.get('favorit_order/ad_order_ajx.php?inptid=' + orderid + '&inptvl=' + inptvl + '&catName=' + catName + '&ctid=' + ctid, function(data){
                    $("#cities").html(data);
                });
            });
            $("#sort_gvrn").on("change",function(){
                $("#pgntn_ordr").val(0);
                var orderid='show_order';
                var sort_cty = $("#sort_cty").val();
                var selectvw =  $("#sortvew").val();
                var selectgvrn =  $("#sort_gvrn").val();
                pgntn_ordr= $("#pgntn_ordr").val();
                $.get('favorit_order/ad_order_ajx.php?selectcty=' + sort_cty + '&inptid=' + orderid + '&selectgvrn=' + selectgvrn + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_ordr, function(data){
                    $("#echo_ajx_order").html(data);
                       var orderid='show_result';
                        var count = $("#echo_ajx_order .count").children().length;////ليه قسمتها
                        $.get('favorit_order/ad_order_ajx.php?inptid=' + orderid + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });        
               });        
            });
            $("#sort_cty").on("change",function(){
                $("#pgntn_ordr").val(0);
                var orderid='show_order';
                var sort_cty = $("#sort_cty").val();
                var selectvw =  $("#sortvew").val();
                var selectgvrn =  $("#sort_gvrn").val();
                pgntn_ordr= $("#pgntn_ordr").val();
                $.get('favorit_order/ad_order_ajx.php?selectcty=' + sort_cty + '&inptid=' + orderid + '&selectgvrn=' + selectgvrn + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_ordr, function(data){
                     $("#echo_ajx_order").html(data);
                        var orderid='show_result';
                        var count = $("#echo_ajx_order .count").children().length;
                        $.get('favorit_order/ad_order_ajx.php?inptid=' + orderid + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                });        
            });             
            $("#sortvew").on("change",function(){
                var orderid='show_order';
                var sort_cty = $("#sort_cty").val();
                var selectvw =  $("#sortvew").val();
                var selectgvrn =  $("#sort_gvrn").val();
                pgntn_ordr= $("#pgntn_ordr").val();
                $.get('favorit_order/ad_order_ajx.php?selectcty=' + sort_cty + '&inptid=' + orderid + '&selectgvrn=' + selectgvrn + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_ordr, function(data){
                     $("#echo_ajx_order").html(data);
                        var orderid='show_result';
                        var count = $("#echo_ajx_order .count").children().length;
                        $.get('favorit_order/ad_order_ajx.php?inptid=' + orderid + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                        if(selectvw > count && pgntn_ordr > 0)//back to first page//
                         {
                            $("ul button").last().click();
                         }
                });
            });
            $("#echo_ajx_order").on("click",".pagenation",function(){
                var orderid='show_order';
                var sort_cty = $("#sort_cty").val();
                var selectvw =  $("#sortvew").val();
                var selectgvrn =  $("#sort_gvrn").val();
                var pgntn_ordr =  $(this).val();
                $("#pgntn_ordr").val(pgntn_ordr);
                 $.get('favorit_order/ad_order_ajx.php?selectcty=' + sort_cty + '&inptid=' + orderid + '&selectgvrn=' + selectgvrn + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_ordr, function(data){
                    $("#echo_ajx_order").html(data);
                        var orderid='show_result';
                        var count = $("#echo_ajx_order .count").children().length;
                        $.get('favorit_order/ad_order_ajx.php?&inptid=' + orderid + '&show_result=' + count + '&pgntn_nu=' + pgntn_ordr, function(data){
                            $("#echo_show_result").html(data);
                        });
                });/**/
            });            
            $("#ad_order_contner").on("submit","#add_order",function(event){
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
                       }).done(function(response){ ////
                        if(response == 'done'){
                           $('#modal_titl').html('Done ...');
                           $('#modal_titl').addClass('alert alert-success col-12');
                           $('#modal_titl').css('color','green');
                           $("#add_order .empty").val('');
                            setTimeout(function(){
                                $('#close').click();
                                $("#modal_titl").html('Add New Order ...');
                                $('#modal_titl').removeClass('alert alert-success col-12');
                                $('#modal_titl').css('color','black');
                            }, 1500);
                            var inptid='show_order';
                            var pgntn_ordr = $("#pgntn_ordr").val();
                            var selectvw =  $("#sortvew").val();
                            var selectgvrn =  'all';
                            var selectcty =  'all';
                            $.get('favorit_order/ad_order_ajx.php?selectcty=' + sort_cty + '&inptid=' + inptid + '&selectgvrn=' + selectgvrn + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_ordr, function(data){
                                $("#echo_ajx_order").html(data);
                                var orderid='show_result';
                                var count = $("#echo_ajx_order .count").children().length;
                                $.get('favorit_order/ad_order_ajx.php?inptid=' + orderid + '&show_result=' + count, function(data){
                                    $("#echo_show_result").html(data);
                                });
                            }); 
                        }
                    });
            });           
            $("#echo_ajx_order").on("click",".slid",function(){
                var i_d = $(this).attr('id'); 
                i_d = i_d.split('_');
                i_d = i_d[1];
                i_d = '#cllps_' + i_d;
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

    <!-- Modal add new order ad_order_contner-->
   <div class="modal fade" id="ad_order_contner" tabindex="-1" role="dialog" aria-labelledby="ad_order_contnerLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"id='ad_product_cntnr'>
             <form id='add_order' action='favorit_order/ad_order_ajx.php'method='post' class='checkout-form col-12 m-0' enctype='multipart/form-data' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
                <div  class='modal-header mb-3'>
                    <h5  class='modal-title' id='modal_titl'>Add new Order ... </h5>
                    <span  data-dismiss='modal' aria-hidden='true' style='cursor: pointer;font-weight:1000;' id='clos'>&times;</span>
                </div>
                <div clas='col-12 m-0 p-0 'style='border:0px solid green;'>
                <div  class='form-group m-0 p-0'style='width:48%;display:inline-block;'>
                            <label for='main_ct'>governates</label>
                            <select value='' name='governts'   id='governts'  class='form-control'>";
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
                            <select value='' name='cities' id='cities'   class='form-control'>";
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
                <input value='' name='order_titl' id='order_titl' type='text'maxlength='125'minlength='4'  class='form-control empty' required>
                </div>
                <div  class='form-group'>
                    <label for='exampleFormControlTextarea1'>Details</label>
                    <textarea value='' name='order_dscrbtn'maxlength='500'minlength='5'  class='form-control empty' id='order_dscrbtn' rows='3' required></textarea>
                </div>
                <div  class='form-group'>
                    <label for=''>Price</label>
                    <input value='' name='pric' id='pric' type='number'maxlength='8'  class='form-control empty' required>
                </div>
                <div  class='form-group'>
                    <label for=''>Date In Day</label>
                    <input value='' name='order_dat' id='order_dat' maxlength='3' type='number' class='form-control empty'required>
                </div>
                <div  class='form-group' style='position:relative;'>
                    <label for=''>Image</label>
                    <!--<span class='col-9 m-0' style=''>ttttttttttt</span>-->
                        <input value='' name='ordr_img' id='ordr_img' type='file'maxlength='120'minlength='4'  class='form-control empty' style=''>
                </div>
                <div  class='modal-footer'>
                    <button type='button' id='close' class=' btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='submit' id='order_submit'  class='btn btn-primary'>Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  <!-- ------------warning modal--------- -->
    <div class="modal fade" id="warningmodal" tabindex="-1" role="dialog" aria-labelledby="ad_rspnds_cntnrLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
             <form class='checkout-form col-12 m-0' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
                <div  class='modal-header mb-3'>
                    <h5  class='modal-title'>Warning !</h5>
                    <span  data-dismiss='modal' aria-hidden='true' style='cursor: pointer;font-weight:1000;' id='clos'>&times;</span>
                </div>
                 You Are Not A Byer,<br> Log Out Then Create Account Or Log In As A Byer ...
                <div  class='modal-footer mt-3'>
                    <button type='button' class=' btn btn-info' data-dismiss='modal'>Ok</button>
                </div>
                </form>
            </div>
        </div>
    </div>