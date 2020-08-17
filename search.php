<?php include('includes/header.php');
 if(isset($_GET['pag']) && $_GET['pag'] == 'nowrd'){echo "<input type='hidden' id='hdn' value='nowrd'>";}
 //if(isset($_GET['pag']) && $_GET['pag'] == 'nowrd'){$nowrd == $_GET['pag'];}
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
                 <div class="col-lg-9 order-1 order-lg-2 pb-0" id='big_container' style='margin:auto;'>
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 mb-4">
                                <div class="select-option"style='border:red 0px solid;'>                                  
                                    <div class="p-2 mb-0 pb-0 pl-1 pr-1" style='border:1px solid gray;background-color:#252525;color:#ffffff;text-transform: uppercase;font-weight:500;'>View  <a style='font-weight:700;'>:</a> </div>                                      
                                     <select class="form-groub p-2 ml-1 col-3" id='search_sortvw'>
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
                            <input value='0' name='pgntn_nu' id='search_pgntn_nu' typ='number'style='font-size:0px;border-style:none;position:absolute;width:5px;height:5px;'>
                                <p id='echo_search_result'></p>
                            </div>
                        </div>
                    </div>
                    <div class='product-list pb-0 pt-4' id='echo_search_prdct'style='border:0px red solid;'>
                       
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
    <div class="modal fade" id="search_exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="search_exampleModalLabel">Warning !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are You Sure You Want Remove This Product ... ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id='search_modal_ok' >Yeas</button>
            </div>
            </div>
        </div>
    </div>
<!-- Modal -->

    <?php include('includes/footer.php');?>
    <script>
        $("document").ready(function(){
                var frst     = $('#hdn').val();
                if(frst == 'nowrd'){
                    $('#search_link').addClass('active');
                    $('#big_container').html("<div class='alert alert-success'>Write Word Or Choies Filter To Start Your Search ...</div>");
                }else{
                    $('#search_link').addClass('active');
                    var inptid   = 'echo_search_result';
                    var selectdt = $('#search_sordt').val();
                    var selectct = $('#search_sortct').val();
                    var sub_cat  = $('#search_sub_sortct').val();
                    var mn_pric  = $('#search_mnpric').val();
                    var mx_pric  = $('#search_mxpric').val();
                    var search_wrd = $('#search').val();
                    $("#search_pgntn_nu").val(0);
                    $.get('ajax/search_ajx.php?frst=' + frst + '&search_wrd=' + search_wrd + '&mx_pric=' + mx_pric 
                    + '&mn_pric=' + mn_pric + '&sub_cat=' + sub_cat + '&selectdt=' + selectdt 
                    + '&inptid=' + inptid + '&selectct=' + selectct + '&pgntn_nu=0', function(data){
                            $("#echo_search_prdct").html(data);
                                var inptid='search_show_result';
                                var count = $("#echo_search_prdct .count").children().length;//alert(count);
                                $.get('ajax/search_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=6' + '&pgntn_nu=0' + '&show_result=' + count, function(data){
                                    $("#echo_search_result").html(data);
                                });
                    });
                }    
        });
    </script>