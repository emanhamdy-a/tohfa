<?php include('includes/header.php');
 if(isset($_GET['pid']) && $_GET['pid'] !='')
 {$prdct_id=$_GET['pid']; echo"<input type='hidden' value='$prdct_id'id='prdct_id'>";}
  else{echo"<input type='hidden' value='0'id='prdct_id'>";}//'desc';
?>
    <!-- Breadcrumb Section Begin -->
    <div class='breacrumb-section'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12'>
                    <div class='breadcrumb-text product-more'>
                        <a href='index.php'><i class='fa fa-home'></i> Home</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class='product-shop spad page-details'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12'style=''>
                    <div class='row'>
                        <div class='col-lg-6'style='margin:auto;border:red 0px solid;'id='slidr_cntnr'>
                            <?php
                              $db=connect_to_database();
                              $sql="SELECT userid FROM prdct WHERE id = $prdct_id";
                              $data=@mysqli_query($db,$sql); 
                              $nu_row=@mysqli_num_rows($data);
                              if(@mysqli_num_rows($data) > 0){  
                                  for($div=1 ; $div <= $nu_row ;$div ++){
                                      $row_data = mysqli_fetch_assoc($data);
                                      $user_id   = $row_data['userid'];
                                    }
                               }

                            ?>
                        </div>
                    </div>
                    <input type='hidden' class='p-0 m-0' id='sub_prdct'value='all'style=''>
                    <input type='hidden' class='p-0 m-0' id='pgntn_nu_prdct'value='0'style=''>
                    <?php if(isset($user_id)){echo "<input value='$user_id' type='hidden' id='user_id'>";} ?>                    
                    <div class='product-tab col-lg-9 ' style='margin:auto;border:0px solid red;'>
                        <div class='tab-item'>
                            <ul class='nav' role='tablist'>
                                <li class='col-6 p-0'>
                                    <a class='col-12 p-3 text-right pr-5'style='font-size:20px;' data-toggle='tab' href='#tab-2' role='tab'>معلومات البائع</a>
                                </li>
                                <li class='col-6 p-0'>
                                    <a class='active col-12 p-3 text-right pr-5'style='font-size:20px;' data-toggle='tab' href='#tab-1' role='tab'>معلومات المنتج</a>
                                </li>
                            </ul>
                        </div>
                        <div class='tab-item-content'>
                            <div class='tab-content'>
                                <div class='tab-pane fade' id='tab-2' role='tabpanel'>
                                    <div class='specification-table'>
                                        <table  id='user_table'>

                                        </table>
                                    </div>
                                </div>                            
                                <div class='tab-pane fade-in active' id='tab-1' role='tabpanel'>
                                    <div class='specification-table'>
                                        <table id='prdct_table'>

                                        </table>
                                    </div>     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class='related-products spad'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12'>
                    <div class='section-title'>
                        <h2 class=''>Related Products</h2>
                            <div class="col-12 p-0 text-right"style='border:0px green solid;'><!---->
                                <p id='echo_result_usrprdct'></p>
                            </div>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-3 col-md-6 col-sm-8'>
                    <div class='filter-widget'>
                            <h4 class='fw-title'>View</h4>
                            <select class='p-2 mb-0 col-8 form-groub'id='sortvw_prdct'>
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
                    <div class='filter-widget'>
                            <h4 class='fw-title'>Categories</h4>
                            <select class='p-2 mt-1 col-8 form-groub' id='sortct_prdct'>
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
                    </div>
                    <div class='filter-widget' style='position:relative;left:-15px;'>
                            <h4 class='fw-title mb-2 ml-3'>Sub Categories</h4>
                            <div class='fw-size-choose'style=''id='echo_sub_prdct'>

                            </div>
                    </div>
                    <div class='filter-widget'>
                            <h4 class='fw-title'>Price</h4>
                            <div class='filter-range-wrap'style='border:0px red solid;position:relative;'>
                                <div class='range-slider mb-4 pb-3'>
                                    <div class='price-input mb-3'>
                                    £E :<input type='text' id='minamount'  style=''class='minamount_prdct ipnt_pric pl-1'>
                                    </div>
                                    <div class='price-input'>
                                    £E :<input type='text' id='maxamount'   style=''class='maxamount_prdct ipnt_pric pl-1'>
                                    </div>                                
                                </div>
                                <div style='' class='mt-4 pstn_abslt_pric price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content'
                                    data-min='0' data-max='9999'>
                                    <div  class='ui-slider-range ui-corner-all ui-widget-header'></div>
                                    <span tabindex='0'  class='span_pric ui-slider-handle ui-corner-all ui-state-default'></span>
                                    <span tabindex='0' class='span_pric ui-slider-handle ui-corner-all ui-state-default'></span>
                                </div>
                                <a id='pric_filter' style='position:absolute;right:0px;top:15px;width:38px;height:30px;line-height:18px;border-radius:25px;cursor:pointer;'class='filter-btn pl-2'>Go</a>
                            </div>
                    </div>
                </div>
                <div class='col-lg-9' id='user_prdct_cntnr'>
                        <div class='col-lg-4 col-sm-6'>
                            <div class='product-item'>
                                <div class='pi-pic'>
                                    <img src='img/products/women-1.jpg' alt=''>
                                    <div class='sale'>Sale</div>
                                    <div class='icon'>
                                        <i class='icon_heart_alt'></i>
                                    </div>
                                    <ul>
                                        <li class='w-icon active'><a href='#'><i class='icon_bag_alt'></i></a></li>
                                        <li class='quick-view'><a href='#'>+ Quick View</a></li>
                                        <li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>
                                    </ul>
                                </div>
                                <div class='pi-text'>
                                    <div class='catagory-name'>Coat</div>
                                    <a href='#'>
                                        <h5>Pure Pineapple</h5>
                                    </a>
                                    <div class='product-price'>
                                        $14.00
                                        <span>$35.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-lg-4 col-sm-6'>
                            <div class='product-item'>
                                <div class='pi-pic'>
                                    <img src='img/products/women-2.jpg' alt=''>
                                    <div class='icon'>
                                        <i class='icon_heart_alt'></i>
                                    </div>
                                    <ul>
                                        <li class='w-icon active'><a href='#'><i class='icon_bag_alt'></i></a></li>
                                        <li class='quick-view'><a href='#'>+ Quick View</a></li>
                                        <li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>
                                    </ul>
                                </div>
                                <div class='pi-text'>
                                    <div class='catagory-name'>Shoes</div>
                                    <a href='#'>
                                        <h5>Guangzhou sweater</h5>
                                    </a>
                                    <div class='product-price'>
                                        $13.00
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-lg-4 col-sm-6'>
                            <div class='product-item'>
                                <div class='pi-pic'>
                                    <img src='img/products/women-3.jpg' alt=''>
                                    <div class='icon'>
                                        <i class='icon_heart_alt'></i>
                                    </div>
                                    <ul>
                                        <li class='w-icon active'><a href='#'><i class='icon_bag_alt'></i></a></li>
                                        <li class='quick-view'><a href='#'>+ Quick View</a></li>
                                        <li class='w-icon'><a href='#'><i class='fa fa-random'></i></a></li>
                                    </ul>
                                </div>
                                <div class='pi-text'>
                                    <div class='catagory-name'>Towel</div>
                                    <a href='#'>
                                        <h5>Pure Pineapple</h5>
                                    </a>
                                    <div class='product-price'>
                                        $34.00
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->

    <!-- Partner Logo Section Begin -->

    <div class='partner-logo p-0'>
        <div class='container p-3 m-0'>
        </div>
    </div>
    <!-- Partner Logo Section End -->

<?php include('includes/footer.php'); ?>
<script>
    $('document').ready(function(){ 
        /////////////echo slider////////////////////////
              var inptid  = 'echo_slidr';
              var prdct_id= $('#prdct_id').val();
              $.get('ajax/product_ajax.php?inptid=' + inptid + '&prdct_id=' + prdct_id , function(data){
                     $('#slidr_cntnr').html(data);
                }); 
        /////////////echo slider end////////////////////
        /////////////echo user table////////////////////
              var inptid  = 'echo_user_table';
              var user_id= $('#user_id').val();
              $.get('ajax/product_ajax.php?user_id=' + user_id + '&inptid=' + inptid + '&user_id=' + user_id , function(data){
                    $('#user_table').html(data);
                });  
        /////////////echo user end table////////////////
        /////////////echo prdct table///////////////////
              var inptid  = 'echo_prdct_table';
              var prdct_id= $('#prdct_id').val();
              $.get('ajax/product_ajax.php?user_id=' + user_id + '&inptid=' + inptid + '&prdct_id=' + prdct_id , function(data){
                     $('#prdct_table').html(data);
               });
        /////////////echo prdct table end///////////////
        /////////////show user prdct////////////////////
                var inptid='show_prdct';
                var selectct = $('#sortct_prdct').val();
                var selectvw = 6;
                var sub_cat_id =$('#sub_prdct').val();
                pgntn_nu_prdct= 0;
                var max_pric = $('#maxamount').val();
                var min_pric = $('#minamount').val();
                var user_id = $('#user_id').val();
                var sub_cat_id =$('#sub_prdct').val();
                 $.get('ajax/product_ajax.php?user_id=' + user_id + '&sub_cat_id=' + sub_cat_id 
                 + '&inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu='
                 + pgntn_nu_prdct + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric, function(data){
                     $('#user_prdct_cntnr').html(data);
                       /**/ var inptid='show_result';
                        var count = $('#user_prdct_cntnr .count').children().length;
                        $.get('ajax/product_ajax.php?inptid=' + inptid + '&show_result=' + count + '&pgntn_nu=' + pgntn_nu_prdct, function(data){
                            $('#echo_result_usrprdct').html(data);
                        });
                }); 
        /////////////show user prdct end////////////////////
                var inptid='main_prdct';
                var selectct = $('#sortct_prdct').val();
                var catName = $('#sortct_prdct :selected').html();
                var ctid = $('#sortct_prdct :selected').val();
                $.get('ajax/product_ajax.php?user_id=' + user_id + '&inptid=' + inptid  + '&selectct=' + selectct + '&catName=' + catName + '&ctid=' + ctid, function(data){
                    $('#echo_sub_prdct').html(data);
                });
            $('#echo_sub_prdct').on('click','.labl_sub_prdct',function(){
               $('.labl_sub_prdct').removeClass('active');
               $(this).addClass('active');
            });                 
            $('#sortct_prdct').on('change',function(){
                var inptid='main_prdct';
                var selectct = $('#sortct_prdct').val();
                var catName = $('#sortct_prdct :selected').html();
                var ctid = $('#sortct_prdct :selected').val();
                $.get('ajax/product_ajax.php?inptid=' + inptid + '&selectct=' + selectct + '&catName=' + catName + '&ctid=' + ctid, function(data){
                    $('#echo_sub_prdct').html(data);
                });
            });
            $('#sortct_prdct').on('change',function(){
                $('#pgntn_nu_prdct').val(0);
                var inptid='show_prdct';
                var selectvw =  $('#sortvw_prdct').val();
                var selectct =  $('#sortct_prdct').val();
                pgntn_nu_prdct= $('#pgntn_nu_prdct').val();
                var max_pric = $('#maxamount').val();
                var min_pric = $('#minamount').val();
                var user_id = $('#user_id').val();
                var sub_cat_id =$('#sub_prdct').val();
                $.get('ajax/product_ajax.php?sub_cat_id=' + sub_cat_id + '&user_id=' + user_id + '&inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_prdct + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                     $('#user_prdct_cntnr').html(data);
                        var inptid='show_result';
                        var count = $('#user_prdct_cntnr .count').children().length;
                        $.get('ajax/product_ajax.php?inptid=' + inptid + '&show_result=' + count + '&pgntn_nu=' + pgntn_nu_prdct, function(data){
                            $('#echo_result_usrprdct').html(data);
                        });
                });        
            });                    
            $('#sortvw_prdct').on('change',function(){
                var inptid='show_prdct';
                var selectvw =  $('#sortvw_prdct').val();
                var selectct =  $('#sortct_prdct').val();
                pgntn_nu_prdct= $('#pgntn_nu_prdct').val();
                var max_pric = $('#maxamount').val();
                var min_pric = $('#minamount').val();
                var user_id = $('#user_id').val();
                var sub_cat_id =$('#sub_prdct').val();
                $.get('ajax/product_ajax.php?user_id=' + user_id + '&sub_cat_id=' + sub_cat_id + '&inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_prdct + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                     $('#user_prdct_cntnr').html(data);
                        var inptid='show_result';
                        var count = $('#user_prdct_cntnr .count').children().length;
                        $.get('ajax/product_ajax.php?inptid=' + inptid + '&show_result=' + count + '&pgntn_nu=' + pgntn_nu_prdct, function(data){
                            $('#echo_result_usrprdct').html(data);
                        });
                        if(selectvw > count && pgntn_nu_prdct > 0)//back to first page//
                         {
                            $('ul button').last().click();
                         }
                });
            });
            $('#user_prdct_cntnr').on('click','.pagenation',function(){
                var inptid='show_prdct';
                var selectvw =  $('#sortvw_prdct').val();
                var selectct =  $('#sortct_prdct').val();
                var pgntn_nu_prdct =  $(this).val();
                $('#pgntn_nu_prdct').val(pgntn_nu_prdct);
                var max_pric = $('#maxamount').val();
                var min_pric = $('#minamount').val();
                var user_id = $('#user_id').val();
                var sub_cat_id =$('#sub_prdct').val();
                 $.get('ajax/product_ajax.php?user_id=' + user_id + '&sub_cat_id=' + sub_cat_id + '&inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_prdct + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                    $('#user_prdct_cntnr').html(data);
                        var inptid='show_result';
                        var count = $('#user_prdct_cntnr .count').children().length;
                        $.get('ajax/product_ajax.php?inptid=' + inptid + '&show_result=' + count + '&pgntn_nu=' + pgntn_nu_prdct, function(data){
                            $('#echo_result_usrprdct').html(data);////ليه الزفت ده
                        });
                });
            });
            //$('.span_pric').on('mouseup',function(){});
            $('#pric_filter').on('click',function(){
                $('#pgntn_nu_prdct').val(0);
                var inptid='show_prdct';
                var selectvw =  $('#sortvw_prdct').val();
                var selectct =  $('#sortct_prdct').val();
                pgntn_nu_prdct= $('#pgntn_nu_prdct').val();
                var max_pric = $('#maxamount').val();
                var min_pric = $('#minamount').val();
                var user_id = $('#user_id').val();
                var sub_cat_id =$('#sub_prdct').val();
                $.get('ajax/product_ajax.php?user_id=' + user_id + '&inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_prdct + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                     $('#user_prdct_cntnr').html(data);
                        var inptid='show_result';
                        var count = $('#user_prdct_cntnr .count').children().length;
                        $.get('ajax/product_ajax.php?inptid=' + inptid + '&show_result=' + count + '&pgntn_nu=' + pgntn_nu_prdct, function(data){
                            $('#echo_result_usrprdct').html(data);
                        });
                }); 
            });                   
            $('#echo_sub_prdct').on('click','.sub_ct_vl',function(){
               var sub_ct = $(this).val();
               $('#sub_prdct').val(sub_ct);
               $('#pgntn_nu_prdct').val(0);
                var inptid='show_prdct';
                var selectvw =  $('#sortvw_prdct').val();
                var selectct =  $('#sortct_prdct').val();
                pgntn_nu_prdct= $('#pgntn_nu_prdct').val();
                var max_pric = $('#maxamount').val();
                var min_pric = $('#minamount').val();
                var user_id = $('#user_id').val();
                var sub_cat_id =$('#sub_prdct').val();
                $.get('ajax/product_ajax.php?user_id=' + user_id + '&sub_cat_id=' + sub_cat_id + '&inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_prdct + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                     $('#user_prdct_cntnr').html(data);
                        var inptid='show_result';
                        var count = $('#user_prdct_cntnr .count').children().length;
                        $.get('ajax/product_ajax.php?inptid=' + inptid + '&show_result=' + count + '&pgntn_nu=' + pgntn_nu_prdct, function(data){
                            $('#echo_result_usrprdct').html(data);
                        });
                });
            });                   
            $('#user_prdct_cntnr').on('click','.ad_fvrt',function(){
               var inptid=$(this).attr('id');
                $.get('favorit_order/adfavorit_ajx.php?pid=' + inptid, function(data){
                   inptid='#echo' + inptid;
                   $(inptid).html(data);
                   $.get('favorit_order/favorites_ajx.php?inptid=fvrt_icon', function(data){
                      $('#fvrt_nm').html(data);
                   });
                });
            });
            $('#user_prdct_cntnr').on('click','.prdct_dtalss',function(){
              var inptid  = 'echo_slidr';
              var prdct_id= $(this).prev().val();
              $.get('ajax/product_ajax.php?user_id=' + user_id + '&inptid=' + inptid + '&prdct_id=' + prdct_id , function(data){
                     $('#slidr_cntnr').html(data);
               });
              var inptid  = 'echo_prdct_table';
              var prdct_id= $(this).prev().val();
              $.get('ajax/product_ajax.php?user_id=' + user_id + '&inptid=' + inptid + '&prdct_id=' + prdct_id , function(data){
                     $('#prdct_table').html(data);
               }); 
                $('html, body').animate({
                        scrollTop: $("#slidr_cntnr").offset().top
                }, 1000)
            });              
    });
    </script>