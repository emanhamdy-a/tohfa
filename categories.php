<?php include('includes/header.php'); ?>
    <?php
     if(isset($_GET['ct_id'])){$ct_id = $_GET['ct_id'];}else{$ct_id = 'all';}
     if(isset($_GET['sub_ct_id'])){$sub_ct_id = $_GET['sub_ct_id'];}else{$sub_ct_id = 'all';}
     if(isset($_GET['prnt_id'])){$parnt_id = $_GET['prnt_id'];}else{$parnt_id = '0';}
    ?>
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad pb-3 p-0 pt-5"style='border:red 0px solid;'>
        <div class="container">
            <div class="row"style='border:0px red solid;'>
                <div style='border:blue 0px solid;' class="p-5 col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget mt-2">
                        <h4 class="fw-title">View</h4>
                        <select class="p-2 mb-0 mt-2 col-8 form-groub"id='sortvw_cat'>
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
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <select class="p-2 mt-1 col-8 form-groub" id='sortct_cat'>
                             <option  class='font' value='all'>All</option>
                           <?php
                              if($ct_id != 'all'){
                                    $db = connect_to_database();    
                                    $result = @mysqli_query($db, "SELECT id,catnm from category3 WHERE parnt_id = 0 order by id asc ");
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $catId = $row['id'];
                                        $catName = $row['catnm'];
                                        ECHO "<option  class='font' value='$catId'";if($catId == $ct_id){echo"selected";} echo">$catName</option>";        
                                    }
                              }else{
                                    $db = connect_to_database();    
                                    $result = @mysqli_query($db, "SELECT id,catnm from category3 WHERE parnt_id = 0 order by id asc ");
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $catId = $row['id'];
                                        $catName = $row['catnm'];
                                        ECHO "<option  class='font' value='$catId'";if($catId == $parnt_id){echo"selected";} echo">$catName</option>";        
                                    }
                              }
                            ?>
                        </select>
                    </div>
                    <div class="filter-widget" style='position:relative;left:-15px;'>
                        <h4 class="fw-title mb-2 ml-3">Sub Categories</h4>
                        <input type="text" class='p-0 m-0' id='sub_cat'value='<?php echo $sub_ct_id; ?>'style='width:0px;height:0px;font-size:0px;border:none;'>
                        <div class="fw-size-choose"style=''id='echo_sub_cat'>

                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap"style='border:0px red solid;position:relative;'>
                            <div class="range-slider mb-4 pb-3">
                                <div class="price-input mb-3">
                                  £E :<input type="text" id="minamount" style=''class='ipnt_pric pl-1'>
                                </div>
                                <div class="price-input">
                                  £E :<input type="text" id="maxamount" style=''class='ipnt_pric pl-1'>
                                </div>                                
                            </div>
                            <div style='' class="mt-4 pstn_abslt_pric price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="0" data-max="9999">
                                <div  class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0"  class="span_pric ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="span_pric ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <a id='pric_fltr' style='position:absolute;right:0px;top:15px;width:38px;height:30px;line-height:18px;border-radius:25px;cursor:pointer;'class="filter-btn pl-2">Go</a>
                        </div>
                   </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2 pb-0 pt-4" style=''>
                    <div class="product-show-option"style=''>
                        <div class="row"style=''>
                            <div class="col-lg-7 col-md-7 mb-4"style=''>

                            </div>
                            <div class="col-lg-5 col-md-5 text-right"style='border:0px green solid;'><!---->
                               <input value='0' name='pgntn_nu_cat' id='pgntn_nu_cat' typ='number'style='width:0px;height:0px;font-size:0px;border-style:none;'>
                               <input value='<?php echo $sub_ct_id; ?>' name='sub_cat_id' id='sub_cat_id' typ='number'style='width:0px;height:0px;font-size:0px;border-style:none;'>
                                <p id='echo_result_cat'></p>
                            </div>
                        </div>
                    </div>
                    <div class='product-list pb-0' id='echo_cat_ajx'style='border:0px red solid;'>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <div class="partner-logo p-3 m-0">
            <div class="container">
            
            </div>
        </div>
    <!-- Partner Logo Section End -->
<!-- Modal -->

    <?php include('includes/footer.php');?>
    <script>
        $("document").ready(function(){
               //window.location.href='ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid  + '&selectct=' + selectct + '&catName=' + catName + '&ctid=' + ctid,
                $("#cats").addClass('active');
                var prdctid='show_cat';
                var selectct = $('#sortct_cat').val();
                var selectvw = 6;
                var sub_cat_id = $('#sub_cat').val();
                pgntn_nu= 0;
                var max_pric = $("#maxamount").val();
                var min_pric = $("#minamount").val();
                $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                     $("#echo_cat_ajx").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_cat_ajx .count").children().length;
                        $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_result_cat").html(data);
                        });
                });
                var prdctid='main_cat';
                var selectct = $("#sortct_cat").val();
                var catName = $("#sortct_cat :selected").html();
                var ctid = $("#sortct_cat :selected").val();
                $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid  + '&selectct=' + selectct + '&catName=' + catName + '&ctid=' + ctid, function(data){
                    $("#echo_sub_cat").html(data);
                });
                 
            $("#sortct_cat").on("change",function(){
                var prdctid='main_cat';
                var selectct = $("#sortct_cat").val();
                var catName = $("#sortct_cat :selected").html();
                var ctid = $("#sortct_cat :selected").val();
                $.get('ajax/categories_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&catName=' + catName + '&ctid=' + ctid, function(data){
                    $("#echo_sub_cat").html(data);
                });
            });
            $("#sortct_cat").on("change",function(){
                $("#pgntn_nu_cat").val(0);
                var prdctid='show_cat';
                var selectvw =  $("#sortvw_cat").val();
                var selectct =  $("#sortct_cat").val();
                pgntn_nu_cat= $("#pgntn_nu_cat").val();
                var max_pric = $("#maxamount").val();
                var min_pric = $("#minamount").val();
                $.get('ajax/categories_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_cat + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                     $("#echo_cat_ajx").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_cat_ajx .count").children().length;
                        $.get('ajax/categories_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_result_cat").html(data);
                        });
                });        
            });
            $("#sub_cat").on("change",function(){
                $("#pgntn_nu_cat").val(0);
                var prdctid='show_cat';
                var selectvw =  $("#sortvw_cat").val();
                var selectct =  $("#sortct_cat").val();
                var sub_cat_id = $('#sub_cat').val();
                pgntn_nu_cat= $("#pgntn_nu_cat").val();
                var max_pric = $("#maxamount").val();
                var min_pric = $("#minamount").val();
                $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_cat + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                     $("#echo_cat_ajx").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_cat_ajx .count").children().length;
                        $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_result_cat").html(data);
                        });
                });        
            });                     
            $("#sortvw_cat").on("change",function(){
                var prdctid='show_cat';
                var selectvw =  $("#sortvw_cat").val();
                var selectct =  $("#sortct_cat").val();
                var sub_cat_id = $('#sub_cat').val();
                pgntn_nu_cat= $("#pgntn_nu_cat").val();
                var max_pric = $("#maxamount").val();
                var min_pric = $("#minamount").val();
                $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_cat + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                     $("#echo_cat_ajx").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_cat_ajx .count").children().length;
                        $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_result_cat").html(data);
                        });
                        if(selectvw > count && pgntn_nu_cat > 0)//back to first page//
                         {
                            $("ul button").last().click();
                         }
                });
            });
            $("#echo_cat_ajx").on("click",".pagenation",function(){
                var prdctid='show_cat';
                var selectvw =  $("#sortvw_cat").val();
                var selectct =  $("#sortct_cat").val();
                var sub_cat_id = $('#sub_cat').val();
                var pgntn_nu_cat =  $(this).val();
                $("#pgntn_nu_cat").val(pgntn_nu_cat);
                var max_pric = $("#maxamount").val();
                var min_pric = $("#minamount").val();
                 $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_cat + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                    $("#echo_cat_ajx").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_cat_ajx .count").children().length;
                        $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_cat + '&show_result=' + count, function(data){
                            $("#echo_result_cat").html(data);
                        });
                });
            });
            $('#echo_sub_cat').on('click','.labl_sub_cat',function(){
               $(".labl_sub_cat").removeClass('active');
               $(this).addClass('active');
            });     
            //$('.span_pric').on('mouseup',function(){});
            $('#pric_fltr').on('click',function(){
                $("#pgntn_nu_cat").val(0);
                var prdctid='show_cat';
                var selectvw =  $("#sortvw_cat").val();
                var selectct =  $("#sortct_cat").val();
                pgntn_nu_cat= $("#pgntn_nu_cat").val();
                var max_pric = $("#maxamount").val();
                var min_pric = $("#minamount").val();
                var sub_cat_id =$('#sub_prdct').val();
                $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_cat + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                     $("#echo_cat_ajx").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_cat_ajx .count").children().length;
                        $.get('ajax/categories_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_result_cat").html(data);
                      });
                }); 
            });                   
            $('#echo_sub_cat').on('click','.sub_ct_vl',function(){
               var sub_ct = $(this).val();
               $('#sub_cat').val(sub_ct);
               $("#pgntn_nu_cat").val(0);
                var prdctid='show_cat';
                var selectvw =  $("#sortvw_cat").val();
                var selectct =  $("#sortct_cat").val();
                var sub_cat_id = $('#sub_cat').val();
                pgntn_nu_cat= $("#pgntn_nu_cat").val();
                var max_pric = $("#maxamount").val();
                var min_pric = $("#minamount").val();
                $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu_cat + '&mx_pric=' + max_pric + '&mn_pric=' + min_pric , function(data){
                     $("#echo_cat_ajx").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_cat_ajx .count").children().length;
                        $.get('ajax/categories_ajx.php?sub_cat_id=' + sub_cat_id + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_result_cat").html(data);
                        });
                });
            });                   
            $('#echo_cat_ajx').on('click','.ad_fvrt',function(){
               var prdctid=$(this).attr('id');
                $.get('favorit_order/adfavorit_ajx.php?pid=' + prdctid, function(data){
                   prdctid="#echo" + prdctid;
                   $(prdctid).html(data);
                   $.get('favorit_order/favorites_ajx.php?inptid=fvrt_icon', function(data){
                      $("#fvrt_nm").html(data);
                   });
                });
            });                    
        });
    </script>