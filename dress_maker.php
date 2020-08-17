<?php include('includes/header.php');
 ?>
 <input type="hidden" id='idusr' value='<?php  if(isset($_GET['uid']) && $_GET['uid'] != ""){$idusr = $_GET['uid'];echo $idusr;}else{echo"0";}?>'>
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
                                            <select class="form-groub p-2 ml-0 col-lg-6 col-md-8" id='sortvew_responds'>
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
                                        <p id='echo_num_result' class=''></p>
                                    </div>
                                </div>
                            </div>
                        </div>

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
    <!--  Partner Logo Section End  -->

  <?php include('includes/footer.php');?>
    <script>
        $("document").ready(function(){
             $("#myacont").addClass('active');
                var orderid='show_rspnds';
                var ordr_id= 6;//$('#ordrid').val();
                var pgntn_rspnd = 0;
                var selectvw = 6;
                var usr_id   = $('#idusr').val();
               $.get('favorit_order/drsmkr_ajx.php?uid=' + usr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd, function(data){
                    $("#echo_ajx_rspnds").html(data);
                       var orderid='show_result';
                        var count = $("#echo_ajx_rspnds .count").children().length;////ليه قسمتها
                        $.get('favorit_order/drsmkr_ajx.php?uid=' + usr_id + '&inptid=' + orderid + '&pgntn_nu=' + pgntn_rspnd + '&show_result=' + count, function(data){
                            $("#echo_num_result").html(data);
                        });        
               });
           
            $("#sortvew_responds").on("change",function(){
                var orderid='show_rspnds';
                var selectvw =  $("#sortvew_responds").val();
                var usr_id   = $('#idusr').val();
                pgntn_rspnd= $("#pgntn_rspnd").val();
                $.get('favorit_order/drsmkr_ajx.php?uid=' + usr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd, function(data){
                     $("#echo_ajx_rspnds").html(data);
                        var orderid='show_result';
                        var count = $("#echo_ajx_rspnds .count").children().length;
                        $.get('favorit_order/drsmkr_ajx.php?uid=' + usr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd + '&show_result=' + count, function(data){
                            $("#echo_num_result").html(data);
                        });
                        if(selectvw > count && pgntn_rspnd > 0)//back to first page//
                         {
                            $("ul button").last().click();
                         }
                });
            });
            $("#echo_ajx_rspnds").on("click",".pagenation",function(){
                var orderid='show_rspnds';
                var selectvw =  $("#sortvew_responds").val();
                var usr_id   = $('#idusr').val();
                var pgntn_rspnd =  $(this).val();
                $("#pgntn_rspnd").val(pgntn_rspnd);
                 $.get('favorit_order/drsmkr_ajx.php?uid=' + usr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd, function(data){
                    $("#echo_ajx_rspnds").html(data);
                        var orderid='show_result';
                        var count = $("#echo_ajx_rspnds .count").children().length;
                        $.get('favorit_order/drsmkr_ajx.php?oid=' + ordr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd + '&show_result=' + count, function(data){
                            $("#echo_num_result").html(data);
                        });
                });//
            });            
            $("#editd_respond_cntnr").on("submit","#edit_respond",function(event){
              event.preventDefault(); //prevent default action
                //alert('hi');
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
                       }).done(function(response){////
                           var arr = response.split('_');
                           result  = arr[0];
                           respons = arr[1];//alert(response);
                        if(result == 'done'){
                           $('#edit_titl').css('display','none');
                           $('#edit_scss').css('display','block');
                             setTimeout(function(){
                                $('#edit_titl').css('display','block');
                                $('#edit_scss').css('display','none');
                                $('#clos_edit').click();
                                $("#add_rspnd .empty").val('');
                            }, 1500);/**/ 
                            var orderid='show_rspnds';
                            var selectvw =  $("#sortvew_responds").val();
                            var usr_id   = $('#idusr').val();
                            pgntn_rspnd= $("#pgntn_rspnd").val();
                            $.get('favorit_order/drsmkr_ajx.php?edit=edit&edit_id=' + respons + '&uid=' + usr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd, function(data){
                                $("#echo_ajx_rspnds").html(data);
                                    var orderid='show_result';
                                    var count = $("#echo_ajx_rspnds .count").children().length;
                                    $.get('favorit_order/drsmkr_ajx.php?uid=' + usr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd + '&show_result=' + count, function(data){
                                        $("#echo_num_result").html(data);
                                    });
                            });
                       }
                    });
            
            });
            $("#echo_ajx_rspnds").on("click",".edit_rspnd",function(){
                var respond_id = $(this).next().val();
                var inptid    = 'edit_rspnd';
                $.get('favorit_order/drsmkr_ajx.php?inptvl=' + respond_id + '&inptid=' + inptid, function(data){
                     $("#editd_respond_cntnr").html(data);
                });
            });        
            $("#echo_ajx_rspnds").on("click",".slid",function(){
                var i_d = $(this).attr('id'); 
                i_d = i_d.split('_');
                i_d = i_d[1];
                i_d = '#collapse2_' + i_d;
                var dsply = $(i_d).css('display');//alert(dsply);
                $('.collapse').slideUp();
                if(dsply == 'none'){
                  $(i_d).slideDown();
                }else{
                    $(i_d).slideUp();
                }
            });
            $("#echo_ajx_rspnds").on("click",".show_ordr",function(){
                var i_d = $(this).attr('id');//#showordr_$div
                i_d = i_d.split('_');
                i_d = i_d[1];
                ordr  = '#ordr_' + i_d;
                rspnd = '#rspnd_' + i_d;
                $(ordr).slideDown();
                $(rspnd).slideUp();
            });
            $("#echo_ajx_rspnds").on("click",".show_rspnd",function(){
                var i_d = $(this).attr('id');//#showrspnd_$div
                i_d = i_d.split('_');
                i_d = i_d[1];
                ordr  = '#ordr_' + i_d;
                rspnd = '#rspnd_' + i_d;
                $(rspnd).slideDown();
                $(ordr).slideUp();
            });            
            $('#echo_ajx_rspnds').on('click','.delt_rspnd',function(){
                var ordrid = $(this).prev().val();
                $('#rspnd_id').val(ordrid);
            });
            $('#accept_delet').on('click',function(){
                var inptid = 'deletrspnd';
                var ordrid = $('#rspnd_id').val();
                $.get('favorit_order/drsmkr_ajx.php?rid=' + ordrid + '&inptid=' + inptid , function(data){
                    //alert(data);
                    var orderid='show_rspnds';
                    var selectvw =  $("#sortvew_responds").val();
                    var usr_id   = $('#idusr').val();
                    pgntn_rspnd= $("#pgntn_rspnd").val();
                    $.get('favorit_order/drsmkr_ajx.php?uid=' + usr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd, function(data){
                        $("#echo_ajx_rspnds").html(data);
                            var orderid='show_result';
                            var count = $("#echo_ajx_rspnds .count").children().length;
                            $.get('favorit_order/drsmkr_ajx.php?uid=' + usr_id + '&inptid=' + orderid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_rspnd + '&show_result=' + count, function(data){
                                $("#echo_num_result").html(data);
                            });
                            if(selectvw > count && pgntn_rspnd > 0)//back to first page//
                            {
                                $("ul button").last().click();
                            }
                    }); /*  */
                });
            });     
        });
    </script>

    <!-- Modal add new order edit_respond-->
    <div class='modal fade' id='edit_rspnds_cntnr' tabindex='-1' role='dialog' aria-labelledby='ad_rspnds_cntnrLabel' aria-hidden='true'>
        <div class="modal-dialog" role="document">
            <div class="modal-content"id='editd_respond_cntnr'>

            </div>
        </div>
    </div>
    <!-- ------------warning modal--------- -->
    <div class="modal fade" id="delete_rspnd" tabindex="-1" role="dialog" aria-labelledby="ad_rspnds_cntnrLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
             <form class='checkout-form col-12 m-0' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
                <div  class='modal-header mb-3'>
                    <h5  class='modal-title'>Warning !</h5>
                    <span  data-dismiss='modal' aria-hidden='true' style='cursor: pointer;font-weight:1000;' id='clos'>&times;</span>
                </div>
                <div class="modal-body">
                  Are You Sure You Want Delete This Responding ... ?
                 </div>
                <div  class='modal-footer mt-3'>
                    <button type='button' class=' btn btn-secondary' data-dismiss='modal' id="">Cancel</button>
                    <input type="hidden" id='rspnd_id'>                
                    <button type='button' class=' btn btn-danger' data-dismiss='modal' id="accept_delet">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>