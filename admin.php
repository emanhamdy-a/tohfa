<?php include('includes/header.php');
      unset($_SESSION['sucsess']); 
 $usertyp=user_type();
 if(check_login() && $usertyp =='admin')
 {}else{header("location:/index.php");}
 ?>
 <head>
	<link rel="stylesheet" href="js/tbl/Material+Icons.css">
    <link rel="stylesheet" href="js/tbl/style.css" type="text/css">
 </head>
  <!-------------- edit categories data start ---------------->
    <div class="breacrumb-section">
        <div class="container"style='border:red 0px solid;'>
               <!-- add edit categories Begin -->
                <div class="col-12 p-0 m-0 userstable" id='ad_cat_contnr' style='display:none;margin:auto;border-style:none;'><br><br><br><br><br><br>
                    <!-- FORM START -->
                    <div class="table-wrapper m-0" style='border:red 0px solid;'>
                                <div class="table-title"style=''>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h2 style='color:white;'>Manage Categories</h2>
                                        </div>
                                        <div class="col-sm-8">						
                                            <a  data-toggle='modal' data-target='#addcategoryModal' id='add_cat' class="btn btn-success"><i class="material-icons">+</i> <span>Add Category</span></a>
                                            <a id='clos_editcat' class="btn btn-primary"><i class="material-icons"></i> <span>Edit Users</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-filter">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="show-entries">
                                                <span>Show</span>
                                                <select class="form-control" id='sortvw1'>
                                                        <option class='' value=10 selected> 10</option>
                                                        <option class='' value=15> 15</option>
                                                        <option class='' value=20>20</option>
                                                        <option class='' value=25>25</option>
                                                        <option class='' value=30>30</option>
                                                        <option class='' value=40>40</option>
                                                        <option class='' value=50>50</option>
                                                        <option class='' value=60>60</option>
                                                        <option class='' value=36>100</option>
                                                    </select>
                                                <span>entries</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="filter-group">
                                                <input value='0' name='pgntn_nu1' id='pgntn_nu1' typ='number'style='border:none;font-size:0px;width:0px;height:0px;'>
                                                <label>Category</label>
                                                <select class="form-control" id='sortct1'>
                                                    <option class='' value='all'>All</option>
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
                                            <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Parant Id</th>
                                            <th>Cat Img</th>						
                                            <th  style='text-align:center;width:155px;padding:0px;'>Action</th>
                                            <th style='width:0px;padding:0px;'></th>
                                        </tr>
                                    </thead>
                                    <tbody id='echo_ajx_ctgrs'>

                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <div class="hint-text p-2 mt-4"style='color:white;background:#303030;' id='echo_show_result1'></div>
                                </div>
                            </div>
                    <!-- FORM END -->
                </div>
               <!-- add prdct form Section end   -->
        </div>
    </div>

    <!-- Edit category modal -->
	<div id="editcategoryModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form  id='edit_catform' method='post' action='admin/admin_category_ajx.php'enctype='multipart/form-data'>
					<div class="modal-header">						
                    <h4 class="modal-title"id='edit_ct_titl'>Edit Category</h4>
                        <div id='editct_msg_scses' class='col-12 row mt-2 mr-0 ml-0  alert alert-success'style='display:none;'>Your Category Data have Updated ...</div>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Category Name</label>
							<input type="text" name='edit_ctnm'   id='edit_ctnm'  class="form-control" max-lenth='20' min-lenth='2' required>
							<input type="number" name='cat_id'   id='cat_id'  class="p-0 m-0" style='width:0px;height:0px;font-size:0px;border:none;'>
						</div>
						<div class="form-group">
							<label>Parant Categorty</label>
                            <select value=''   name='edit_ctmain' id='edit_ctmain'  class='form-control' required>
                              <option value='0'>  None</option>
                              <?php $db = connect_to_database();    
                                    $result = @mysqli_query($db, 'SELECT id,catnm from category3 WHERE parnt_id = 0 order by id asc ');
                                    while($row = mysqli_fetch_array($result))
                                        {
                                            $catId = $row['id'];
                                            $catName = $row['catnm'];
                                            ECHO "<option  class='font' value='$catId'>$catName</option>";        
                                        } ?>
                            </select>
                        </div>
						<div class="form-group">
							<label>Imag Category</label>
							<input type="file" name='edit_ctimg'  id='edit_ctimg' class="form-control p-1"  max-lenth='300'>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button"data-dismiss="modal"    class="btn btn-danger cloose" value="Close">
						<input type="submit" name=''   id='edit_ctsav'class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit category modal -->

	<!-- add category modal -->
	<div id="addcategoryModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id='ad_catform' method='post' action='admin/admin_category_ajx.php'enctype='multipart/form-data'>
					<div class="modal-header">						
						<h4 class="modal-title"id='ad_ct_titl'>Add Category</h4>
                        <div id='ct_msg_scses' class='col-12 row mt-2 mr-0 ml-0  alert alert-success'style='display:none;'>New Category have Added ...</div>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Category Name</label>
							<input type="text" name='add_ctnm'   id='add_ctnm'  class="form-control" max-lenth='20' min-lenth='2' required>
						</div>
						<div class="form-group">
							<label>Parant Categorty</label>
                            <select value=''   name='add_ctmain' id='add_ctmain'  class='form-control' required>
                              <option value='0'>  None</option>
                              <?php $db = connect_to_database();    
                                    $result = @mysqli_query($db, 'SELECT id,catnm from category3 WHERE parnt_id = 0 order by id asc ');
                                    while($row = mysqli_fetch_array($result))
                                        {
                                            $catId = $row['id'];
                                            $catName = $row['catnm'];
                                            ECHO "<option  class='font' value='$catId'>$catName</option>";        
                                        } ?>
                            </select>
                        </div>
						<div class="form-group">
							<label>Imag Category</label>
							<input type="file" name='add_ctimg'  id='add_ctimg' class="form-control p-1"  max-lenth='300' required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger cloose" data-dismiss="modal" value="Close">
						<input type="submit" name=''   id='add_ctsav'  class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div> 
	<!-- add category modal -->

	<!-- view category modal -->
	<div id="viewcategoryModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title pb-0">Cat Image</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body p-0 m-0">					
						<div class="form-group">
                         <img id='imgct' style='max-height:600px;max-width:1000px;' src="" alt="This Category Has No Image ..." class='col-12 p-0 m-0'>
						</div>					
					</div>
					<div class="modal-footer pt-0">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
					</div>
				</form>
			</div>
		</div>
	</div> 
	<!-- view category modal -->

	<!-- Delete category modal -->
	<div id="deletcategoryModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Category</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Category?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="button" id='deletct_ok' data-dismiss="modal" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete category modal -->
 <!---------------- edit categories data end ----------------->

    <!--edit users data -->
    <section class="product-shop spad pb-3">
        <div class="container">
            <div class="row">
                 <div class="col-lg-12 order-1 order-lg-2 pb-0" style='margin:auto;'>
                    <div class='product-list pb-0 userstable' id='userstable' style='border:0px red solid;'>
                            <div class="table-wrapper ">
                                <div class="table-title"style=''>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h2 style='color:white;'>Manage Usres</h2>
                                        </div>
                                        <div class="col-sm-8">						
                                            <a style='cursor:pointer;' data-toggle='modal' data-target='#exampleModaladd' id='aduser' class="btn btn-success"><i class="material-icons">+</i> <span>Add User</span></a>
                                            <a style='cursor:pointer;' id='edit_ctgry' class="btn btn-primary"><i class="material-icons"></i> <span>Edit Categories</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-filter">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="show-entries">
                                                <span>Show</span>
                                                <select class="form-control" id='sortvw'>
                                                        <option class='' value=5 >5</option>
                                                        <option class='' value=10 selected> 10</option>
                                                        <option class='' value=15> 15</option>
                                                        <option class='' value=20>20</option>
                                                        <option class='' value=25>25</option>
                                                        <option class='' value=30>30</option>
                                                        <option class='' value=40>40</option>
                                                        <option class='' value=50>50</option>
                                                        <option class='' value=60>60</option>
                                                        <option class='' value=36>100</option>
                                                    </select>
                                                <span>entries</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <button type="button" id='srch_button' class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <div class="filter-group">
                                                <label>Name</label>
                                                <input type="text" id="search_word" class="form-control">
                                            </div>
                                            <div class="filter-group">
                                                <input value='0' name='pgntn_nu' id='pgntn_nu' typ='number'style='position:absolute;top:35%;z-index:-6;width:5px;height:5px;'>
                                                <label>User Type</label>
                                                <select class="form-control" id='sortct'>
                                                    <option class='' value='all'       >All</option>
                                                    <option class='' value='admin'     >Admin</option>
                                                    <option class='' value='data entry'>Data entry</option>
                                                    <option class='' value='manager'   >Manager</option>
                                                    <option class='' value='seler'     >Seler</option>
                                                    <option class='' value='dress_maker'>Dress Maker</option>
                                                    <option class='' value='byer'      >Byer</option>
                                                </select>
                                            </div>
                                            <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User Name</th>
                                            <th>Full Name</th>
                                            <th>Email</th>						
                                            <th>Phone</th>						
                                            <th>User Type</th>						
                                            <th  style='text-align:center;width:155px;padding:0px;'>Action</th>
                                            <th style='width:0px;padding:0px;'></th>
                                        </tr>
                                    </thead>
                                    <tbody id='echo_ajx_users'>

                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <div class="hint-text p-2 mt-4"style='color:white;background:#303030;' id='echo_show_result'></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--edit users data-->

    <!--search users data -->
    <section class="product-shop spad pb-3">
        <div class="container">
            <div class="row">
                 <div class="col-lg-12 order-1 order-lg-2 pb-0" style='margin:auto;'>
                    <div class='product-list pb-0 userstable' id='usrstblsrch' style='border:0px red solid;display:none;'>
                            <div class="table-wrapper ">
                                <div class="table-title"style=''>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h2 style='color:white;'>Search For Usres</h2>
                                        </div>
                                        <div class="col-sm-8">						
                                            <a style='cursor:pointer;' id='closearch' class="btn btn-danger"><i class="material-icons">-</i> <span>Close Search</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-filter">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="show-entries">
                                                <span>Show</span>
                                                <select class="form-control" id='sortvw2'>
                                                        <option class='' value=5 >5</option>
                                                        <option class='' value=10 selected> 10</option>
                                                        <option class='' value=15> 15</option>
                                                        <option class='' value=20>20</option>
                                                        <option class='' value=25>25</option>
                                                        <option class='' value=30>30</option>
                                                        <option class='' value=40>40</option>
                                                        <option class='' value=50>50</option>
                                                        <option class='' value=60>60</option>
                                                        <option class='' value=36>100</option>
                                                    </select>
                                                <span>entries</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <button type="button" id='searchbtn' class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <div class="filter-group">
                                                <label>Name</label>
                                                <input type="text" id="searchword" class="form-control">
                                            </div>
                                            <div class="filter-group">
                                                <input value='0' name='' id='pgntnnu' typ='number'style='position:absolute;top:35%;z-index:-6;width:5px;height:5px;'>
                                                <label>User Type</label>
                                                <select class="form-control" id='sortct2'>
                                                    <option class='' value='all'       >All</option>
                                                    <option class='' value='admin'     >Admin</option>
                                                    <option class='' value='data entry'>Data entry</option>
                                                    <option class='' value='manager'   >Manager</option>
                                                    <option class='' value='seler'     >Seler</option>
                                                    <option class='' value='byer'      >Byer</option>
                                                </select>
                                            </div>
                                            <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User Name</th>
                                            <th>Full Name</th>
                                            <th>Email</th>						
                                            <th>Phone</th>						
                                            <th>User Type</th>						
                                            <th  style='text-align:center;width:155px;padding:0px;'>Action</th>
                                            <th style='width:0px;padding:0px;'></th>
                                        </tr>
                                    </thead>
                                    <tbody id='echo_search_users'style='border:0px red solid;'>

                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <div class="hint-text p-2 mt-4"style='color:white;background:#303030;' id='echo_search_result'></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--search users data-->   

    <!-- Partner Logo Section Begin -->
        <div class="partner-logo p-3 m-0">
            <div class="container">
            
            </div>
        </div>
    <!-- Partner Logo Section End -->

<!-- modal delet user -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are You Sure You Want Delete This User ... ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id='modal_ok' >Yeas</button>
            </div>
            </div>
        </div>
</div>
<!-- Modal view user data -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"id='modal_content'>

            </div>
        </div>
    </div>
<!-- Modal add new user -->
    <div class="modal fade" id="exampleModaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"id='add_user_cntnr'>
            <form action='\' id='form' class='form  checkout-form col-12'style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
                    <div  class='modal-header mb-3 pb-0'>
                    <div id='mesg_scses' class='col-12 row mt-2 mr-0 ml-0  alert alert-success'style='display:none;'>your User have Added ...</div>
                    <h4  class='modal-title' id='head_titl'style='font-weight:700px;float:right;'>Add new User ... </h4>
                    <span aria-hidden='true' style='cursor: pointer;font-weight:1000;float:left;' data-dismiss='modal' id='clos'>&times;</span>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='frst_nm'>First Name<span>*</span></label>
                        <span class='err_msg alert-danger' id='frstnm_mesg'> </span>
                        <input class='form-control mb-1 end_vldtn' type='text' value=''  name='tnmbx'id='frst_nm'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='lst_nm'>Last Name<span>*</span></label>
                        <span class='err_msg alert-danger' id='lstnm_mesg'> </span>
                        <input class='form-control mb-1 end_vldtn' type='text' value=''  name='nmbx'   id='lst_nm' >
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='eml'>Email Address<span>*</span></label>
                        <span class='err_msg alert-danger' id='eml_mesg'> </span>
                        <input class='form-control mb-1 end_vldtn' type='text' value=''  name='elbx'   id='eml'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='phon_nmbr'>Phone<span>*</span></label>
                        <span class='err_msg alert-danger' id='phon_mesg'> </span>
                        <input class='form-control mb-1 end_vldtn' type='text' value=''  name='phebx'   id='phon_nmbr'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='the_pswrd'>password<span>*</span></label>
                        <span class='err_msg alert-danger' id='the_pswrd_mesg'> </span>
                        <input class='form-control mb-1 end_vldtn' type='text' value=''  name='psdbx'   id='the_pswrd'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='confirm_pswrd'>Repassword<span>*</span></label>
                        <span class='err_msg alert-danger' id='retyp_pswrd_mesg'> </span>
                        <input class='form-control mb-1 end_vldtn' type='text' value=''  name='redbx'  id='confirm_pswrd'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='company_nam'>Company Name</label>
                        <span class='err_msg alert-danger' id='compaany_mesg'> </span>
                        <input class='form-control mb-1 end_vldtn' type='text' value=''  name='cnmbx'  id='company_nam'>
                    </div>
                    <div  class='form-group m-0 p-0'style=''>
                        <label class='col-4 pl-1'style='' for='strt_adrs'>Street Address<span>*</span></label>
                        <span class='err_msg alert-danger' id='dres_mesg'> </span>
                        <input class='form-control mb-1 end_vldtn street-first' type='text' name='stdrsbx' id='strt_adrs'>
                    </div>
                    <div  class='form-group m-0 p-0 mb-4'style=''>
                    <label for='exampleFormControlSelect1'>User Type</label>
                    <select value='' name='ur_typ'   id='usr_tybee'  class='form-control'>
                        <option class='font' value='data entry'>Data entry</option>
                        <option class='font' value='admin'     >Admin</option>
                        <option class='font' value='manager'   >Manager</option>
                        <option class='font' value='dress_maker'>Dress Maker</option>
                        <option class='font' value='seler'     >Seler</option>
                        <option class='font' value='byer'      >Byer</option>
                    </select>
                    </div>
                    <div  class='modal-footer'>
                        <button type='button' id='close' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                        <button type='button' name='crtbtn' id='sign_submit' style=''  class='btn btn-primary'>Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal edit user data -->
    <div class="modal fade" id="exampleModaedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content"id='edit_user_cntnr'>

            </div>
        </div>
    </div>
<!-- Modal -->
    <?php include('includes/footer.php');?>
    <script>
        $("document").ready(function(){
            $("#myacont").addClass('active');
               var prdctid='show_users';
                var selectct = "all";
                var pgntn_nu = 0;
                var selectvw = 10;
               $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                  $("#echo_ajx_users").html(data);
                       var prdctid='show_result';
                        var count = $("#echo_ajx_users .count").children().length /8;
                        $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                            var prdctid='show_result';
                            var count = $("#echo_ajx_users .count").children().length / 8;
                            $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                              $("#echo_show_result").html(data);
                             });
                        });        
               });/**/ 
////////////////////////////search users data////////////////////////////                  
            $("#closearch").on("click",function(){
                $("#userstable").slideDown("slow");
                   $("#usrstblsrch").slideUp("slow");
                $('html, body').animate({
                  scrollTop: $("#userstable").offset().top
                }, 1000)     
            });         
            $("#sortct2").on("change",function(){
                $("#pgntnnu").val(0);
                var prdctid='search_for_user';
                var selectvw =  $("#sortvw2").val();
                var selectct =  $("#sortct2").val();
                var srch_wrd =  $("#searchword").val();
                pgntnnu= $("#pgntnnu").val();
                $.get('admin/admin_users_ajx.php?inptid=' + prdctid  + '&srch_wrd=' + srch_wrd  + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntnnu, function(data){
                     $("#echo_search_users").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_search_users .count").children().length /8;
                        $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntnnu + '&show_result=' + count, function(data){
                            $("#echo_search_result").html(data);
                        });
                });        
            });            
            $("#sortvw2").on("change",function(){
                var prdctid='search_for_user';
                var selectvw =  $("#sortvw2").val();
                var selectct =  $("#sortct2").val();
                var srch_wrd =  $("#searchword").val();
                pgntnnu= $("#pgntnnu").val();
                $.get('admin/admin_users_ajx.php?inptid=' + prdctid  + '&srch_wrd=' + srch_wrd  + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntnnu, function(data){
                     $("#echo_search_users").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_search_users .count").children().length /8;
                        $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntnnu + '&show_result=' + count, function(data){
                            $("#echo_search_result").html(data);
                        });
                        if(selectvw > count && pgntnnu > 0)//back to first page//
                         {
                            $("#pagntn_area button").last().click();
                         }
                });
            });
            $("#echo_search_users").on("click",".pagenation",function(){
                var prdctid='search_for_user';
                var selectvw =  $("#sortvw2").val();
                var selectct =  $("#sortct2").val();
                var srch_wrd =  $("#searchword").val();
                var pgntnnu =  $(this).val();
                $("#pgntnnu").val(pgntnnu);
                 $.get('admin/admin_users_ajx.php?inptid=' + prdctid  + '&srch_wrd=' + srch_wrd  + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntnnu, function(data){
                    $("#echo_search_users").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_search_users .count").children().length / 8;
                        $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntnnu + '&show_result=' + count, function(data){
                            $("#echo_search_result").html(data);
                        });
                });/**/
                
            });
            $("#searchbtn").on("click",function(){
                //$(this).addClass("active");
                //alert('hi');
                var prdctid='search_for_user';
                var selectvw =  $("#sortvw2").val();
                var srch_wrd =  $("#searchword").val();
                $("#pgntnnu").val(0);
                var pgntnnu = 0;
                 $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&srch_wrd=' + srch_wrd + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntnnu, function(data){
                    $("#echo_search_users").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_search_users .count").children().length / 8;
                        $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntnnu + '&show_result=' + count, function(data){
                            $("#echo_search_result").html(data);
                        });
                });/**/
            });                      
            $("#echo_search_users").on("click",".edit_user",function(){
                var editdata= $(this).prev().html();
                $.get('admin/echo_add_or_edit_user_form.php?uid=' + editdata  , function(data){
                    $("#edit_user_cntnr").html(data);
                     var formtyp = $("#usrid").val(); 
                }); 
            });
            $("#echo_search_users").on("click",".deletlink",function(){
                var inptid = "deletuser";
                var deletlink= $(this).prev().html();
               // var arr     = deletlink.split("/-/=/+/");
               // var user_id = arr[0];
               // var prdct_id= arr[1];
              $("#modal_ok").on("click",function(){
                    $.get('admin/admin_users_ajx.php?inptid=' + inptid + '&uid=' + deletlink, function(data){
                            var inptid='search_for_user';
                            var pgntnnu =  $("#pgntnnu").val();
                            var selectvw =  $("#sortvw2").val();
                            var selectct =  $("#sortct2").val();
                            $.get('admin/admin_users_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntnnu, function(data){
                                $("#echo_search_users").html(data);
                                var prdctid='show_result';
                                var count = $("#echo_search_users .count").children().length /8;
                                $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntnnu + '&show_result=' + count, function(data){
                                  $("#echo_search_result").html(data);
                                });  
                            });                
                    }); 
               });
            });
            $("#echo_search_users").on("click",".viewlink",function(){
               // var arr     = deletlink.split("/-/=/+/");
               // var user_id = arr[0];
               // var prdct_id= arr[1];
                var viewlink= $(this).prev().html();
                $.get('admin/echo_add_or_edit_user_form.php?uid=' + viewlink + "&view=viewdata"  , function(data){
                    $("#modal_content").html(data);
                }); 
            });
            $("#echo_search_users").on("click",".edtusrdta_link",function(){
               var userid= $(this).prev().val();//alert(userid);
               var usertyp= $(this).next().val();//alert(usertyp);
               if(usertyp == 'seler'){//alert('ll');
                window.location.href='myaccount.php?uid=' + userid; 
               }else if(usertyp == 'dress_maker'){
                window.location.href='dress_maker.php?uid=' + userid;                 
               }
            });             
////////////////////////////show users data////////////////////////////                          
            $("#sortct").on("change",function(){
                $("#pgntn_nu").val(0);
                var prdctid='show_users';
                var selectvw =  $("#sortvw").val();
                var selectct =  $("#sortct").val();
                pgntn_nu= $("#pgntn_nu").val();
                $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                     $("#echo_ajx_users").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_ajx_users .count").children().length /8;
                        $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                });        
            });            
            $("#sortvw").on("change",function(){
                var prdctid='show_users';
                var selectvw =  $("#sortvw").val();
                var selectct =  $("#sortct").val();
                pgntn_nu= $("#pgntn_nu").val();
                $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                     $("#echo_ajx_users").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_ajx_users .count").children().length /8;
                        $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                        if(selectvw > count && pgntn_nu > 0)//back to first page//
                         {
                            $("#pagntn_area button").last().click();
                         }
                });
            });
            $("#echo_ajx_users").on("click",".pagenation",function(){
                //$(this).addClass("active");
                var prdctid='show_users';
                var selectvw =  $("#sortvw").val();
                var selectct =  $("#sortct").val();
                var pgntn_nu =  $(this).val();
                $("#pgntn_nu").val(pgntn_nu);
                 $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                    $("#echo_ajx_users").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_ajx_users .count").children().length / 8;
                        $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                });/**/
            });
            $("#srch_button").on("click",function(){//alert('lklklk');
                var usrtypfltr = $('#sortct').val();
                $('#sortct2').val(usrtypfltr);
                $("#usrstblsrch").slideDown("slow");
                   $("#userstable").slideUp("slow");
                $('html, body').animate({
                  scrollTop: $("#userstable").offset().top
                }, 1000)
                var prdctid='search_for_user';
                var selectvw =  $("#sortvw").val();
                var selectct =  $("#sortct").val();
                var srch_wrd =  $("#search_word").val();
                $("#search_word").val('');
                $("#searchword").val(srch_wrd);
                var pgntn_nu = 0;
                 $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&srch_wrd=' + srch_wrd + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                    $("#echo_search_users").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_search_users .count").children().length / 8;
                        $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_search_result").html(data);
                        });
                });/**//**/
            });                      
            $("#echo_ajx_users").on("click",".edit_user",function(){
                var editdata= $(this).prev().html();
                $.get('admin/echo_add_or_edit_user_form.php?uid=' + editdata  , function(data){
                    $("#edit_user_cntnr").html(data);
                     var formtyp = $("#usrid").val(); 
                }); 
            });
            $("#echo_ajx_users").on("click",".deletlink",function(){
                var inptid = "deletuser";
                var deletlink= $(this).prev().html();
               // var arr     = deletlink.split("/-/=/+/");
               // var user_id = arr[0];
               // var prdct_id= arr[1];
              $("#modal_ok").on("click",function(){
                    $.get('admin/admin_users_ajx.php?inptid=' + inptid + '&uid=' + deletlink, function(data){
                            var inptid='show_users';//alert(data);
                            var pgntn_nu =  $("#pgntn_nu").val();
                            var selectvw =  $("#sortvw").val();
                            var selectct =  $("#sortct").val();
                            $.get('admin/admin_users_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                                $("#echo_ajx_users").html(data);
                                var prdctid='show_result';
                                var count = $("#echo_ajx_users .count").children().length /8;
                                $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                                  $("#echo_show_result").html(data);
                                });  
                            });                
                    }); 
               });
            });
            $("#echo_ajx_users").on("click",".viewlink",function(){
               // var arr     = deletlink.split("/-/=/+/");
               // var user_id = arr[0];
               // var prdct_id= arr[1];
                var viewlink= $(this).prev().html();
                $.get('admin/echo_add_or_edit_user_form.php?uid=' + viewlink + "&view=viewdata"  , function(data){
                    $("#modal_content").html(data);
                }); 
            });
            $("#echo_ajx_users").on("click",".edtusrdta_link",function(){
               var userid= $(this).prev().val();//alert(userid);
               var usertyp= $(this).next().val();//alert(usertyp);
               if(usertyp == 'seler'){//alert('ll');
                window.location.href='myaccount.php?uid=' + userid; 
               }else if(usertyp == 'dress_maker'){
                window.location.href='dress_maker.php?uid=' + userid;                 
               }
            });            
///////////////////////////edit categories data////////////////////////////                  
            $("#edit_ctgry").on("click",function(){////
                var dsply =$("#ad_cat_contnr").css('display');
                if(dsply == 'none')
                {
                    $("#ad_cat_contnr").slideDown("slow");
                    $("#userstable").slideUp("slow");
                    /**/$('html, body').animate({
                    scrollTop: $("#userstable").offset().top
                     }, 1000)

                    var prdctid  = 'show_cats';
                    var selectvw = $("#sortvw1").val();
                    var selectct = $("#sortct1").val();
                    var pgntn_nu = $("#pgntn_nu1").val();
                    $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                        $("#echo_ajx_ctgrs").html(data);
                            var prdctid='show_result';
                            var count = $("#echo_ajx_ctgrs .count").children().length / 6;
                            $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                                $("#echo_show_result1").html(data);
                            });
                    });/* */ 
                     $('html, body').animate({
                      scrollTop: $("#ad_cat_contnr").offset().top
                     }, 1000); 
                }else{
                       $("#ad_cat_contnr").slideUp("slow");
                       $("#userstable").slideDown("slow");
                     }/**/
    
            });
            $("#clos_editcat").on("click",function(){
               $("#ad_cat_contnr").slideUp("slow");
               $("#userstable").slideDown("slow");
               /**/$('html, body').animate({
                   scrollTop: $("#ad_cat_contnr").offset().top
                     }, 1000)
            }); 
            $("#ad_catform").on("submit",function(){
                ///ad category
                event.preventDefault(); //prevent default action 
                var post_url = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data = new FormData(this); //Creates new FormData object
                //form_data.append("add_category", 'append to form_data');
                $.ajax({
                        url : post_url,
                        type: request_method,
                        data : form_data,
                        contentType: false,
                        cache: false,
                        processData:false
                       }).done(function(data){ //
                         //alert(data);
                         if(data == 'done'){
                            $("#ct_msg_scses").css("display","block");
                            $("#ad_ct_titl").css("display","none");                             
                                setTimeout(function(){
                                    $("#ct_msg_scses").css("display","none");
                                    $("#ad_ct_titl").css("display","block");
                                    $(".cloose").click();
                                    $('#add_ctmain').val(0);
                                    $('#add_ctnm').val('');
                                    $("#add_ctimg").val('');
                                }, 2000); 
                    
                                ////show category ad_ct_titl ct_msg_scses
                                var prdctid='show_cats';
                                var selectvw =  $("#sortvw1").val();
                                var selectct =  $("#sortct1").val();
                                var pgntn_nu =  $("#pgntn_nu1").val();
                                $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                                    $("#echo_ajx_ctgrs").html(data);
                                        var prdctid='show_result';
                                        var count = $("#echo_ajx_ctgrs .count").children().length / 6;
                                        $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                                            $("#echo_show_result1").html(data);
                                        });
                                });/**/
                         }
                }); 
            });
            $("#edit_catform").on("submit",function(){
                ///ad category
                event.preventDefault(); //prevent default action 
                var post_url = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data = new FormData(this); //Creates new FormData object
                //form_data.append("add_category", 'append to form_data');
                $.ajax({
                        url : post_url,
                        type: request_method,
                        data : form_data,
                        contentType: false,
                        cache: false,
                        processData:false
                       }).done(function(data){ //
                          //alert(data);
                         if(data == 'done'){
                            $("#editct_msg_scses").css("display","block");
                            $("#edit_ct_titl").css("display","none");                             
                            setTimeout(function(){
                                $("#editct_msg_scses").css("display","none");
                                $("#edit_ct_titl").css("display","block");
                                $(".cloose").click();
                            }, 2000); 
                                var prdctid='show_cats';
                                var selectvw =  $("#sortvw1").val();
                                var selectct =  $("#sortct1").val();
                                var pgntn_nu =  $("#pgntn_nu1").val();
                                $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                                    $("#echo_ajx_ctgrs").html(data);
                                        var prdctid='show_result';
                                        var count = $("#echo_ajx_ctgrs .count").children().length / 6;
                                        $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                                            $("#echo_show_result1").html(data);
                                        });
                                });/**/
                         }
                }); 
            });                     
            $("#sortct1").on("change",function(){
                $("#pgntn_nu1").val(0);
                var prdctid='show_cats';
                var selectvw =  $("#sortvw1").val();
                var selectct =  $("#sortct1").val();
                pgntn_nu= $("#pgntn_nu1").val();
                $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                     $("#echo_ajx_ctgrs").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_ajx_ctgrs .count").children().length / 6;
                        $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result1").html(data);
                        });
                });        
            });                       
            $("#sortvw1").on("change",function(){
                var prdctid='show_cats';
                var selectvw =  $("#sortvw1").val();
                var selectct =  $("#sortct1").val();
                pgntn_nu= $("#pgntn_nu1").val();
                $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                     $("#echo_ajx_ctgrs").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_ajx_ctgrs .count").children().length / 6;
                        $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result1").html(data);
                        });
                        if(selectvw > count && pgntn_nu > 0)//back to first page//
                         {
                            $("#pagntnarea button").last().click();
                         }
                });
            });
            $("#echo_ajx_ctgrs").on("click",".pagenation",function(){
                //$(this).addClass("active");
                var prdctid='show_cats';
                var selectvw =  $("#sortvw1").val();
                var selectct =  $("#sortct1").val();
                var pgntn_nu =  $(this).val();
                $("#pgntn_nu1").val(pgntn_nu);
                 $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                    $("#echo_ajx_ctgrs").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_ajx_ctgrs .count").children().length / 6;
                        $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result1").html(data);
                        });
                });/**/
            });                     
            $("#echo_ajx_ctgrs").on("click",".edit_cat",function(){
                var cat_data= $(this).prev().html();
                var arr     = cat_data.split("/-/=/+/");
                var cat_id  = arr[0];
                var parnt_id= arr[1];
                var catnm= arr[2];
                $('#edit_ctmain').val(parnt_id);
                $('#edit_ctnm').val(catnm);
                $('#cat_id').val(cat_id);
                $("#edit_ctimg").val('');

            });
            $("#echo_ajx_ctgrs").on("click",".deletlink",function(){
                var inptid = "delet_category";
                var deletlink= $(this).prev().html();
              $("#deletct_ok").on("click",function(){
                    $.get('admin/admin_category_ajx.php?inptid=' + inptid + '&cat_id=' + deletlink, function(data){
                            var inptid='show_cats';
                            var pgntn_nu =  $("#pgntn_nu1").val();
                            var selectvw =  $("#sortvw1").val();
                            var selectct =  $("#sortct1").val();
                            $.get('admin/admin_category_ajx.php?inptid=' + inptid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                                $("#echo_ajx_ctgrs").html(data);
                                var prdctid='show_result';
                                var count = $("#echo_ajx_ctgrs .count").children().length / 6;
                                $.get('admin/admin_category_ajx.php?inptid=' + prdctid + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                                  $("#echo_show_result1").html(data);
                                });  
                            });                
                    }); 
               });
            });
            $("#echo_ajx_ctgrs").on("click",".viewlink",function(){
                var viewlink= $(this).prev().html();
                $('#imgct').attr('src',viewlink); 
            });                     
///////////////////add user form//////////////////
       $("#add_user_cntnr").on("blur",'#frst_nm',function(){
            var inpt_id = "first_name";
            var inpt_vl =  $("#frst_nm").val();
          $.get('admin/ad_or_edit_user_ajax.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#frstnm_mesg").html(data);
           });
         });
       $("#add_user_cntnr").on("blur","#lst_nm",function(){
          var inpt_id = "last_name";
          var inpt_vl =  $("#lst_nm").val();
          $.get('admin/ad_or_edit_user_ajax.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            //$("#lstnm_msg").css("display","block");
            $("#lstnm_mesg").html(data);//alert(data);
           });
        });
       $("#add_user_cntnr").on("blur","#the_pswrd",function(){
          $("#confirm_pswrd").val("");
          $("#retyp_pswrd_mesg").html("");
          var inpt_id = "pasword";
          var inpt_vl =  $("#the_pswrd").val();
          $.get('admin/ad_or_edit_user_ajax.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            //$("#pswrd_msg").css("display","block");
            $("#the_pswrd_mesg").html(data);
           });
        });

       $("#add_user_cntnr").on("blur","#confirm_pswrd",function(){
          var inpt_id = "cnfrmpwrd";
          var inpt_vl =  $("#confirm_pswrd").val();
          var pswrd_vl =  $("#the_pswrd").val();
          $.get('admin/ad_or_edit_user_ajax.php?pswrd=' + pswrd_vl + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            //$("#rpswrd_msg").css("display","block");
            $("#retyp_pswrd_mesg").html(data);
          });
        });

       $("#add_user_cntnr").on("blur","#phon_nmbr",function(){
          var inpt_id = "phone_number";
          var inpt_vl =  $("#phon_nmbr").val();
          $.get('admin/ad_or_edit_user_ajax.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            //$("#phon_msg").css("display","block");
            $("#phon_mesg").html(data);
           });
        });

       $("#add_user_cntnr").on("blur","#eml",function(){
          var inpt_id = "email";
          var inpt_vl =  $("#eml").val();
          $.get('admin/ad_or_edit_user_ajax.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            //$("#eml_msg").css("display","block");
            $("#eml_mesg").html(data);
           });
        });
       $("#add_user_cntnr").on("click","#sign_submit",function(){
            var inpt_id  = "submit";
            var inpt_vl  =  'add_user';
            var usrnm    = $('#frst_nm').val();
            var flnm     = $('#lst_nm').val();
            var pswrd    = $('#the_pswrd').val();
            var rpswrd   = $('#confirm_pswrd').val();
            var phn      = $('#phon_nmbr').val();
            var eml      = $('#eml').val();
            var cmpny    = $('#company_nam').val(); 
            var adrs     = $('#strt_adrs').val();
            var usr_tybee= $('#usr_tybee').val();
            //var gvrn     = $('#gvrn').val();
            //var cty      = $('#cty').val();
            $.get('admin/ad_or_edit_user_ajax.php?inptid=' + inpt_id + '&inptvl=' + inpt_vl + '&firstnmbx=' + usrnm + 
             '&fullnmbx=' + flnm + '&emlbx=' + eml + '&pswrdbx=' + pswrd + '&repswrdbx=' + rpswrd + 
             '&phonebx=' + phn + '&cmpnynmbx=' + cmpny + '&strtadrsbx=' + adrs + '&user_tybe=' + usr_tybee, function(data){
                if(data == "done"){
                $(".end_vldtn").val("");
                $("#head_titl").css("display","none");
                $(".err_msg").html("");
                $("#mesg_scses").css("display","block");  
                 setTimeout(function(){
                     $("#mesg_scses").css("display","none");
                     $("#head_titl").css("display","block");
                     $(".cloose").click();
                  }, 2000);/**/ 
                    var prdctid='show_users';
                    var selectvw =  $("#sortvw").val();
                    var selectct =  $("#sortct").val();
                    pgntn_nu= $("#pgntn_nu").val();
                    $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                        $("#echo_ajx_users").html(data);
                            var prdctid='show_result';
                            var count = $("#echo_ajx_users .count").children().length /8;
                            $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                                $("#echo_show_result").html(data);
                            });
                    });

               }
            });
        });
///////////////////edit user form//////////////////
       $("#edit_user_cntnr").on("blur",'#first_name1',function(){
            var formtyp = $("#usrid").val();
            var inpt_id = "first_name";
            var inpt_vl =  $("#first_name1").val();
          $.get('admin/ad_or_edit_user_ajax.php?formtyp=' + formtyp + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#usrnm_msg1").html(data);
           });
         });
       $("#edit_user_cntnr").on("blur","#last_name1",function(){
            var formtyp = $("#usrid").val(); 
          var inpt_id = "last_name";
          var inpt_vl =  $("#last_name1").val();
          $.get('admin/ad_or_edit_user_ajax.php?formtyp=' + formtyp + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#fulnm_msg1").html(data);
           });
        });

       $("#edit_user_cntnr").on("blur","#pasword1",function(){
            var formtyp = $("#usrid").val(); 
          $("#cnfrmpwrd1").val("");
          $("#rpswrd_msg1").html("");
          var inpt_id = "pasword";
          var inpt_vl =  $("#pasword1").val();
          $.get('admin/ad_or_edit_user_ajax.php?formtyp=' + formtyp + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#pswrd_msg1").html(data);
           });
        });

       $("#edit_user_cntnr").on("blur","#cnfrmpwrd1",function(){
            var formtyp = $("#usrid").val(); 
          var inpt_id = "cnfrmpwrd";
          var inpt_vl =  $("#cnfrmpwrd1").val();
          var pswrd_vl =  $("#pasword1").val();
          $.get('admin/ad_or_edit_user_ajax.php?formtyp=' + formtyp + '&pswrd=' + pswrd_vl + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#rpswrd_msg1").html(data);
          });
        });

       $("#edit_user_cntnr").on("blur","#phone_number1",function(){
          var formtyp = $("#usrid").val(); 
          var inpt_id = "phone_number";
          var inpt_vl =  $("#phone_number1").val();
          $.get('admin/ad_or_edit_user_ajax.php?formtyp=' + formtyp + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#phon_msg1").html(data);
           });
        });

       $("#edit_user_cntnr").on("blur","#email1",function(){
            var formtyp = $("#usrid").val(); 
          var inpt_id = "email";
          var inpt_vl =  $("#email1").val();
          $.get('admin/ad_or_edit_user_ajax.php?formtyp=' + formtyp + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl, function(data){
            $("#emil_msg1").html(data);
           });
        });
       $("#edit_user_cntnr").on("click","#submit1",function(){
            var formtyp = $("#usrid").val(); 
            var inpt_id  = "submit";
            var inpt_vl  =  'add_user';
            var usrnm    = $('#first_name1').val();
            var flnm     = $('#last_name1').val();
            var pswrd    = $('#pasword1').val();
            var rpswrd   = $('#cnfrmpwrd1').val();
            var phn      = $('#phone_number1').val();
            var eml      = $('#email1').val();
            var cmpny    = $('#companynm1').val();
            var adrs     = $('#street_address1').val();
            var user_typ = $('#user_typ1').val();
            $.get('admin/ad_or_edit_user_ajax.php?formtyp=' + formtyp + '&inptid=' + inpt_id + '&inptvl=' + inpt_vl + '&firstnmbx=' + usrnm + 
             '&fullnmbx=' + flnm + '&emlbx=' + eml + '&pswrdbx=' + pswrd + '&repswrdbx=' + rpswrd + 
             '&phonebx=' + phn + '&cmpnynmbx=' + cmpny + '&strtadrsbx=' + adrs + '&user_type=' + user_typ, function(data){
                if(data == "done"){
                $("#hd_titl1").css("display","none");
                $(".err_msg").html("");
                $("#msg_scses1").css("display","block");
                setTimeout(function(){
                     $("#msg_scses1").css("display","none");
                     $("#hd_titl1").css("display","block");
                     $(".cloose").click();
                  }, 2000);/**/
                var prdctid='show_users';
                var selectvw =  $("#sortvw").val();
                var selectct =  $("#sortct").val();
                pgntn_nu= $("#pgntn_nu").val();
                $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu, function(data){
                     $("#echo_ajx_users").html(data);
                     $("#echo_search_users").html(data);
                        var prdctid='show_result';
                        var count = $("#echo_ajx_users .count").children().length /8;
                        $.get('admin/admin_users_ajx.php?inptid=' + prdctid + '&selectct=' + selectct + '&selectvw=' + selectvw + '&pgntn_nu=' + pgntn_nu + '&show_result=' + count, function(data){
                            $("#echo_show_result").html(data);
                        });
                });
               }

            });
        });
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>