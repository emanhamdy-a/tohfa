<?php
if(isset($_GET['selectct']))  {$order=$_GET['selectct'];}else{$order='all';}
if(isset($_GET['selectdt'])){$selectdt=$_GET['selectdt'];}else{$selectdt='desc';}
if(isset($_GET['sub_cat']))  {$sub_cat=$_GET['sub_cat'];}else{$sub_cat='all';}
if(isset($_GET['mn_pric']) && $_GET['mn_pric'] !='')  {$mn_pric=$_GET['mn_pric'];}else{$mn_pric='';}
if(isset($_GET['mx_pric']) && $_GET['mx_pric'] !='')  {$mx_pric=$_GET['mx_pric'];}else{$mx_pric='';}
if(isset($_GET['search_wrd'])){$search_wrd=$_GET['search_wrd'];}else{$search_wrd='';}
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,600,700" rel="stylesheet" />
    <link href="css/search.css" rel="stylesheet" />
  </head>
  <body>
    <div class="s009 p-0 m-0" id='maindiv' >
      <form id='form' class="p-0 m-0 "style="">
        <div class="inner-form p-0 m-0"style="">
          <div class="basic-search p-0 m-0"style="">
            <div class="input-field">
              <input id="search" type="text" placeholder="Type Keywords" value='<?php echo $search_wrd;?>' />
              <div class="icon-wrap">
                <svg class="svg-inline--fa fa-search fa-w-16" fill="#ccc" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                </svg>
              </div>
            </div>
          </div>

          <div class="advance-search"style='display:none;' id='search_form'>
            <div class="row">
              <div class="input-field">
                <div class="input-select">
                 <select class="form-groub p-2 mr-4 ml-1 col-9" id='search_sortct'>
                    <option  class='font' value='all'>All</option>
                     <?php
                       $db = connect_to_database();    
                       $result = @mysqli_query($db, "SELECT id,catnm from category3 WHERE parnt_id = 0 order by id asc ");
                       while($row = mysqli_fetch_array($result))
                           {
                               $catId = $row['id'];
                               $catName = $row['catnm'];
                               ECHO "<option  class='font' value='$catId'"; if($order == $catId){echo"selected";} echo">$catName</option>";        
                           }
                     ?>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select class="form-groub p-2 mr-4 ml-1 col-9" id='search_sub_sortct'>
                    <option  class='font' value='all'>All</option>
                     <?php
                       $db = connect_to_database();    
                       $result = @mysqli_query($db, "SELECT id,catnm from category3 WHERE parnt_id = $order order by id asc ");
                       while($row = mysqli_fetch_array($result))
                           {
                               $catId = $row['id'];
                               $catName = $row['catnm'];
                               ECHO "<option  class='font' value='$catId'"; if($sub_cat == $catId){echo"selected";} echo">$catName</option>";        
                           }
                     ?>
                  </select>
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                  <select class="form-groub p-2 mr-4 ml-1 col-9" id='search_sordt'>
                   <option  class='font' value='desc'<?php if($selectdt == 'desc'){echo "selected";} ?>>Newest</option>
                   <option  class='font' value='asc'<?php  if($selectdt == 'asc'){echo "selected";} ?>>Oldest</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="input-field">
                <div class="input-select">
                   <input style='height:40px;' value='<?php echo"$mx_pric";?>'  type='number' class="form-groub p-0 pl-2 ml-1 col-9 border" id='search_mxpric'placeholder='max price ...'maxlenth='9999'>
                </div>
              </div>

              <div class="input-field">
                <div class="input-select">
                  <input style='height:40px;' value='<?php echo"$mn_pric";?>' type='number' class="form-groub p-0 pl-2 ml-1 col-9 border" id='search_mnpric'placeholder='min price ...'>
                </div>
              </div>     

              <div class="input-field">
                <div class="input-select">
                 <input style='height:0px;'>
                </div>
              </div>
            </div>

            <div class="row third">
              <div class="input-field">
                <div class="result-count" id="close_search" style='font-weight:800;cursor:pointer;'>CLOSE</div>
                  
                <div class="group-btn">
                  <button class="btn-delete" type='button' id="reset" >RESET</button>
                  <button class="btn-search" type='button' id="search_btn">SEARCH</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      
    </div>
    <div class='' id='div_mrgn'></div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/extention/choices.js"></script>

      
      <script>
        $("document").ready(function(){
           $("#search").on("focus", function(){
             $("#search_form").slideDown("slow");
             $('#hdn').val('');
           });
           $("#close_search").on("click", function(){
             $("#search_form").slideUp("slow");
           }); 
           $("#reset").on("click", function(){
             $('#search_sordt').val('desc');
             $('#search_sortct').val('all');
             $('#search_sortct').change();
             $('#search_mnpric').val('');
             $('#search_mxpric').val('');
             $('#search').val('');
           });
           $("#search_btn").on("click", function(){
              var dsply = $("#search_sortvw").css('display');
              if(dsply == 'block'){
                $("#search_form").slideUp("slow");
                var inptid   = 'echo_search_result';
                var selectdt = $('#search_sordt').val();
                var selectct = $('#search_sortct').val();
                var sub_cat  = $('#search_sub_sortct').val();
                var mn_pric  = $('#search_mnpric').val();
                var mx_pric  = $('#search_mxpric').val();
                var search_wrd = $('#search').val();
                $("#search_pgntn_nu").val(0);
                $.get('ajax/search_ajx.php?search_wrd=' + search_wrd + '&mx_pric=' + mx_pric 
                  + '&mn_pric=' + mn_pric + '&sub_cat=' + sub_cat + '&selectdt=' + selectdt 
                  + '&inptid=' + inptid + '&selectct=' + selectct + '&pgntn_nu=0', function(data){
                        $("#echo_search_prdct").html(data);
                            var inptid='search_show_result';
                            var count = $("#echo_search_prdct .count").children().length;
                            $.get('ajax/search_ajx.php?inptid=' + inptid + '&selectct=' + selectct  + '&pgntn_nu=0' + '&show_result=' + count, function(data){
                                $("#echo_search_result").html(data);
                            });
                });
              }else{
                var inptid   = 'echo_search_result';
                var selectdt = $('#search_sordt').val();
                var selectct = $('#search_sortct').val();
                var sub_cat  = $('#search_sub_sortct').val();
                var mn_pric  = $('#search_mnpric').val();
                var mx_pric  = $('#search_mxpric').val();
                var search_wrd = $('#search').val();
                $("#search_pgntn_nu").val(0);
                  window.location.href='search.php?search_wrd=' + search_wrd + '&mx_pric=' + mx_pric 
                  + '&mn_pric=' + mn_pric + '&sub_cat=' + sub_cat + '&selectdt=' + selectdt 
                  + '&inptid=' + inptid + '&selectct=' + selectct + '&pgntn_nu=0' ;
              }
           });

          $("#echo_search_prdct").on("click",".pagenation",function(){
            var inptid='echo_search_result';
            var selectvw = $("#search_sortvw").val();
            var selectdt = $('#search_sordt').val();
            var selectct = $('#search_sortct').val();
            var sub_cat  = $('#search_sub_sortct').val();
            var mn_pric  = $('#search_mnpric').val();
            var mx_pric  = $('#search_mxpric').val();
            var search_wrd = $('#search').val();
            var pgntn_nu =  $(this).val();
            $("#search_pgntn_nu").val(pgntn_nu);
             $.get('ajax/search_ajx.php?search_wrd=' + search_wrd + '&mx_pric=' + mx_pric 
              + '&mn_pric=' + mn_pric + '&sub_cat=' + sub_cat + '&selectdt=' + selectdt + '&selectvw=' + selectvw 
              + '&inptid=' + inptid + '&selectct=' + selectct + '&pgntn_nu=' + pgntn_nu, function(data){
                   $("#echo_search_prdct").html(data);
                    var inptid='search_show_result';
                    var count = $("#echo_search_prdct .count").children().length;
                    $.get('ajax/search_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                        $("#echo_search_result").html(data);//alert(data);
                    });
             });
          }); 
          $("#search_sortvw").on("change",function(){
            var inptid   = 'echo_search_result';
            var selectvw = $("#search_sortvw").val();
            var selectdt = $('#search_sordt').val();
            var selectct = $('#search_sortct').val();
            var sub_cat  = $('#search_sub_sortct').val();
            var mn_pric  = $('#search_mnpric').val();
            var mx_pric  = $('#search_mxpric').val();
            var pgntn_nu = $("#search_pgntn_nu").val();
            var search_wrd = $('#search').val();
             $.get('ajax/search_ajx.php?search_wrd=' + search_wrd + '&mx_pric=' + mx_pric 
              + '&mn_pric=' + mn_pric + '&sub_cat=' + sub_cat + '&selectdt=' + selectdt + '&selectvw=' + selectvw 
              + '&inptid=' + inptid + '&selectct=' + selectct + '&pgntn_nu=' + pgntn_nu, function(data){
                   $("#echo_search_prdct").html(data);
                    var inptid='search_show_result';
                    var count = $("#echo_search_prdct .count").children().length;
                    $.get('ajax/search_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                        $("#echo_search_result").html(data);
                    });
                       if(selectvw > count && pgntn_nu > 0)//back to first page//
                         {
                            $("ul button").last().click();
                         }
             });
          }); 
          $('#echo_search_prdct').on('click','.ad_fvrt',function(){
             var prdctid=$(this).attr('id');
             $.get('favorit_order/adfavorit_ajx.php?pid=' + prdctid, function(data){
               prdctid="#search" + prdctid;
               $(prdctid).html(data);
                  $.get('favorit_order/favorites_ajx.php?inptid=fvrt_icon', function(data){
                      $("#fvrt_nm").html(data);
                  });
                var inptid   = 'echo_search_result';
                var selectvw = $("#search_sortvw").val();
                var selectdt = $('#search_sordt').val();
                var selectct = $('#search_sortct').val();
                var sub_cat  = $('#search_sub_sortct').val();
                var mn_pric  = $('#search_mnpric').val();
                var mx_pric  = $('#search_mxpric').val();
                var pgntn_nu = $("#search_pgntn_nu").val();
                var search_wrd = $('#search').val();
                $.get('ajax/search_ajx.php?search_wrd=' + search_wrd + '&mx_pric=' + mx_pric 
                  + '&mn_pric=' + mn_pric + '&sub_cat=' + sub_cat + '&selectdt=' + selectdt + '&selectvw=' + selectvw 
                  + '&inptid=' + inptid + '&selectct=' + selectct + '&pgntn_nu=' + pgntn_nu, function(data){
                      $("#echo_search_prdct").html(data);
                });
            });
          });
          $("#search_sortct").on("change",function(){
                var inptid='main_cat';
                var inptvl=$("#search_sortct").val();
                $.get('ajax/search_ajx.php?inptid=' + inptid  + '&inptvl=' + inptvl, function(data){
                    var c = $("#search_sub_sortct").html();//alert(data);
                    $("#search_sub_sortct").html(data);//alert(data);
                });
            }); 

        });
      </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
