<?php include('includes/header.php');
 $usertyp=user_type();
 if((check_login() && $usertyp =='seler') OR(check_login() && $usertyp =='admin'))
 {}else{header("location:index.php");}
 ?>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section"><input type="hidden" id='id_user' value='<?php  if(isset($_GET['uid']) && $_GET['uid'] != ""){$id_user = $_GET['uid'];echo $id_user;}?>'>
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
                        <div class="row">
                            <div class="col-lg-7 col-md-7 mb-4">
                                <div class="select-option"style='border:red 0px solid;'>
                                   
                                   <div class='p-2 mb-0 pb-0 pl-1 pr-1' style='border:1px solid gray;background-color:#252525;color:#ffffff;text-transform: uppercase;font-weight:500;'>Category <a style='font-weight:700;'>:</a> </div>                                    
                                    <select class="form-groub p-2 mr-4 ml-1 col-3" id='sortct'>
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
                                     <select class="form-groub p-2 ml-1 col-3" id='sortvw'>
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
                            <input value='0' name='pgntn_nu' id='pgntn_nu' typ='number'style='font-size:0px;border-style:none;position:absolute;width:5px;height:5px;'>
                            <div id='adprdct'class='p-2 mb-0 pb-0 pl-1 pr-1 mr-3 col-2' style='border-radius:1px; border:0px solid gray;background-color:#e7ab3c;color:#ffffff;text-transform: uppercase;font-weight:550;cursor:pointer;float:left; text-align:center;'data-toggle='modal' data-target='#ad_prdct_cntnr'>+</div>                                    
                                <p id='echo_show_result'></p>
                            </div>
                        </div>
                    </div>
                    <div class='product-list pb-0 pt-4' id='echo_ajx_prdct'style='border:0px red solid;'>
                       
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
<!-- Modal add new user -->
   <div class="modal fade" id="ad_prdct_cntnr" tabindex="-1" role="dialog" aria-labelledby="ad_prdct_cntnrLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"id='ad_product_cntnr'>

            </div>
        </div>
    </div>

<!-- Modal -delet -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <input id='prdct_id' type="number" style='border-style:none;width:0px;font-size:0px;height:0px;'>
                </button>
            </div>
            <div class="modal-body">
                Are You Sure You Want Delete This Product ... ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"id='modal_cls' data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id='modal_ok' >Yeas</button>
            </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<!-- Modal images-->
    <div class='modal fade' id='add_photo' tabindex='-1' role='dialog' aria-labelledby='add_photoLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <form class='modal-content'  name='slider' id='slider' action='ajax/myaccount_ajx.php'method='post'enctype='multipart/form-data'>
            </form>
        </div>
    </div>
<!-- Modal -->
    <?php include('includes/footer.php');?>
    <script>
        $("document").ready(function(){
              $("#myacont").addClass('active');
                var id_user = $('#id_user').val();
                var prdctid='show_prdct';
                var selectct = "all";
                var pgntn_nu = 0;
                var selectvw = 6;
               $.get('ajax/myaccount_ajx.php?uid=' + id_user  + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                  $("#echo_ajx_prdct").html(data);
                       var prdctid='show_result';
                        var count = $("#echo_ajx_prdct .count").children().length;
                        $.get('ajax/myaccount_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });        
               });/**/ 
                  
            $("#adprdct").on("click",function(){
                $.get('ajax/echo_product_forms.php?pid=adprdct', function(data){
                 $("#ad_product_cntnr").html(data);
                });
            });
            $("#ad_prdct_cntnr").on("change","#main_cat",function(){
                var prdctid='main_cat';
                var inptvl = $("#main_cat").val();
                var catName = $("#main_cat :selected").html();
                var ctid = $("#main_cat :selected").val();
                $.get('ajax/myaccount_ajx.php?inptid=' + prdctid + '&inptvl=' + inptvl + '&catName=' + catName + '&ctid=' + ctid, function(data){
                    $("#sub_cat").html(data);
                });
            });
            $("#sortct").on("change",function(){
                $("#pgntn_nu").val(0);
                var prdctid='show_prdct';
                var id_user = $('#id_user').val();
                var selectvw =  $("#sortvw").val();
                var selectct =  $("#sortct").val();
                pgntn_nu= $("#pgntn_nu").val();
                $.get('ajax/myaccount_ajx.php?uid=' + id_user  + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                     $("#echo_ajx_prdct").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_ajx_prdct .count").children().length;
                        $.get('ajax/myaccount_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                });        
            });            
            $("#sortvw").on("change",function(){
                var prdctid='show_prdct';
                var id_user = $('#id_user').val();
                var selectvw =  $("#sortvw").val();
                var selectct =  $("#sortct").val();
                pgntn_nu= $("#pgntn_nu").val();
                $.get('ajax/myaccount_ajx.php?uid=' + id_user  + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                     $("#echo_ajx_prdct").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_ajx_prdct .count").children().length;
                        $.get('ajax/myaccount_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                        if(selectvw > count && pgntn_nu > 0)//back to first page//
                         {
                            $("ul button").last().click();
                         }
                });
            });
            $("#echo_ajx_prdct").on("click",".pagenation",function(){
                //$(this).addClass("active");
                var prdctid='show_prdct';
                var id_user = $('#id_user').val();
                var selectvw =  $("#sortvw").val();
                var selectct =  $("#sortct").val();
                var pgntn_nu =  $(this).val();
                $("#pgntn_nu").val(pgntn_nu);
                 $.get('ajax/myaccount_ajx.php?uid=' + id_user  + '&inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                    $("#echo_ajx_prdct").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_ajx_prdct .count").children().length;
                        $.get('ajax/myaccount_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                });/**/
            });            
            $("#ad_prdct_cntnr").on("submit","#form",function(event){
                event.preventDefault(); //prevent default action 
                var post_url = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data = new FormData(this); //Creates new FormData object
                var id_user = $('#id_user').val();
                form_data.append("usr_id", id_user);
                $.ajax({
                        url : post_url,
                        type: request_method,
                        data : form_data,
                        contentType: false,
                        cache: false,
                        processData:false
                       }).done(function(response){ ////
                          // alert(response);
                           $('#modal_titl').html('Done ...');
                           $('#modal_titl').addClass('alert alert-success col-12');
                           $('#modal_titl').css('color','green');
                            setTimeout(function(){
                                $('#close').click();
                            }, 1500);
                            var inptid='show_prdct';
                            var id_user = $('#id_user').val();
                            var pgntn_nu = $("#pgntn_nu").val();
                            var selectvw =  $("#sortvw").val();
                            var selectct =  $("#sortct").val();
                            $.get('ajax/myaccount_ajx.php?uid=' + id_user  + '&inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                                $("#echo_ajx_prdct").html(data);
                                var prdctid='show_result';
                                var count = $("#echo_ajx_prdct .count").children().length;
                                $.get('ajax/myaccount_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                                    $("#echo_show_result").html(data);
                                });
                            }); 
                        });
            });           
            $("#echo_ajx_prdct").on("click",".editlink",function(){
                var editdata= $(this).prev().html();
                var arr     = editdata.split("/-/=/+/");
                var user_id = arr[0];
                var prdct_id= arr[1];
               $.get('ajax/echo_product_forms.php?pid=' + prdct_id, function(data){
                 $("#ad_product_cntnr").html(data);
               });
            });
            $("#echo_ajx_prdct").on("click",".deletlink",function(){
                var deletlink= $(this).prev().html();
                var arr     = deletlink.split("/-/=/+/");
                var user_id = arr[0];
                var prdct_id= arr[1];
                $("#prdct_id").val(prdct_id);
            });
            $("#modal_ok").on("click",function(){
               $("#modal_cls").click();
               var inptid = "deletprdct";
               var prdct_id = $("#prdct_id").val();
               $.get('ajax/myaccount_ajx.php?inptid=' + inptid + '&pid=' + prdct_id, function(data){
                  var inptid='show_prdct';
                  var id_user = $('#id_user').val();
                  var pgntn_nu = $("#pgntn_nu").val();;
                  var selectvw =  $("#sortvw").val();
                  var selectct =  $("#sortct").val();
                  $.get('ajax/myaccount_ajx.php?uid=' + id_user + '&inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                      $("#echo_ajx_prdct").html(data);
                         var prdctid='show_result';
                         var count = $("#echo_ajx_prdct .count").children().length;
                       $.get('ajax/myaccount_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                           $("#echo_show_result").html(data);
                       });
                       if(selectvw > count && pgntn_nu > 0)//back to first page//
                          {
                               $("ul button").last().click();
                           } 
                   });                
               }); 
            });
            $("#echo_ajx_prdct").on("click",".view_imgs",function(){
                var inptid  = 'view_prdct_img';
                var editdata= $(this).prev().html();
                var arr     = editdata.split("/-/=/+/");
                var user_id = arr[0];
                var prdct_id= arr[1];
               $.get('ajax/myaccount_ajx.php?inptid=' + inptid + '&pid=' + prdct_id + '&user_id=' + user_id , function(data){
                 $("#slider").html(data);
                 $('#usr_id').val(user_id);
                 $('#prodct_id').val(prdct_id);
               });
            });
            $("#add_photo").on("click",'.deletimg',function(){
                var inptid  = 'delet_img';
                var editdata= $(this).prev().val();
                var arr     = editdata.split("/-/=/+/");
                var user_id = arr[0];
                var prdct_id= arr[1];
                var img_id  = arr[2];
               $.get('ajax/myaccount_ajx.php?img_id=' + img_id + '&inptid=' + inptid + '&pid=' + prdct_id  , function(data){
                if(data == 'done'){
                       var inptid  = 'view_prdct_img';
                       $.get('ajax/myaccount_ajx.php?inptid=' + inptid + '&pid=' + prdct_id + '&user_id=' + user_id , function(data){
                            $("#slider").html(data);
                            $('#usr_id').val(user_id);
                            $('#prodct_id').val(prdct_id);
                            $('#modal_title').css('display','none');
                            $('#alrt_scss').css('display','block');
                                setTimeout(function(){
                                $('#modal_title').css('display','block');
                                $('#alrt_scss').css('display','none');                                 
                            }, 1500);
                       });
                 }
               });/**/
            });
            $("#add_photo").on("submit","#slider",function(event){
                event.preventDefault(); //prevent default action 
                var post_url = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data = new FormData(this); //Creates new FormData object
                  //form_data.append("image", 'append to form_data');
                $.ajax({
                        url : post_url,
                        type: request_method,
                        data : form_data,
                        contentType: false,
                        cache: false,
                        processData:false
                       }).done(function(data){ //// 
                         if(data == 'done'){
                             var inptid  = 'view_prdct_img';
                             var user_id = $('#usr_id').val();
                             var prdct_id= $('#prodct_id').val();
                             $.get('ajax/myaccount_ajx.php?inptid=' + inptid + '&pid=' + prdct_id + '&user_id=' + user_id , function(data){
                                $("#slider").html(data);
                                $('#usr_id').val(user_id);
                                $('#prodct_id').val(prdct_id);
                                $('#modal_title').css('display','none');
                                $('#alrt_scss').css('display','block');
                                setTimeout(function(){
                                    $('#modal_title').css('display','block');
                                    $('#alrt_scss').css('display','none');                                 
                                }, 1500);
                            });
                         }
                       });/**/
            });      
            $("#add_photo").on("click",".cls",function(){
                $("#slider").html('');
            });                                        
        });
    </script>