<?php include("includes/header.php"); ?>

   <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
        <?php
         $dir="img/main_slider";
         if(is_dir($dir)){
             if($dh = opendir($dir)){
                 while (($file = readdir($dh)) !== false){
                     if(  $file != '.' && $file != '..'){
                         $name = explode('!',$file);
                         $cat = $name[0];
                         $name = $name[1];
                         $name = str_replace("_"," ",$name);
                 echo"
                      <div class='single-hero-items set-bg' data-setbg='img/main_slider/$file'>
                        <div class='container'class='ml-5'>
                        <a href='categories.php?ct_id=$cat&prnt_id=0'class='ml-5'>    
                           <div class='row'>
                                <div class='col-lg-5 pt-4'>
                                    <p class='pt-4 pl-5'style='font-family:andalus;color:#2b2b2b;font-weight:500;font-size:35px;'>$name</p>
                                </div>
                            </div>
                        </a>     
                        </div>
                       </div>
                       ";}
                    
                }
                closedir($dh);
            }
        }
        echo"</div>";
        ?>
        <!-- <div class='single-hero-items set-bg' data-setbg='img/hero-1.jpg'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-5'>
                            <h2 style='font-weight: 700;'>Black friday</h2><br>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </section>
    <!-- Hero Section End -->
    
    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>ملابس تفصيل</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/banner-1.jpg" alt="">
                        <a href="orders.php">
                            <div class="inner-text">
                            </div> 
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/banner-2.jpg" alt="">
                        <a href="orders.php">
                            <div class="inner-text">
                            </div> 
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/banner-3.jpg" alt="">
                        <a href="orders.php">
                            <div class="inner-text">
                            </div> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <?php
        $db = connect_to_database();    
        $result = @mysqli_query($db, 'SELECT * from category3 WHERE parnt_id = 0 order by id asc ');
        $i= @mysqli_num_rows($result);
        for($x = 0 ; $x < $i ; $x ++)
            {   $row = mysqli_fetch_assoc($result);
                $catid = $row['id'];
                $catname = $row['catnm'];
                $imgct = $row['imgct'];
                $parnt_id=0;
                
          if($x % 2 == 0){//////if 1
            echo"<section class='women-banner spad'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-lg-3'>
                               <a style='cursor:pointer;'href='categories.php?ct_id=$catid&prnt_id=$parnt_id'>
                               <div class='product-large set-bg' data-setbg='$imgct'>
                                    <h2 class='font'>$catname</h2>
                               </div>
                               </a>
                            </div>
                            <div class='col-lg-8 offset-lg-1'style='padding-top:133px;'>
                                <div class='product-slider owl-carousel'>";
                                $rslt = @mysqli_query($db, "SELECT * from category3 WHERE parnt_id = $catid order by id asc ");
                                $ii= @mysqli_num_rows($rslt);
                                for($xx = 0 ; $xx < $ii ; $xx ++)
                                    {   $roww = mysqli_fetch_assoc($rslt);
                                        $ctid = $roww['id'];
                                        $ctnm = $roww['catnm'];
                                        $imagct = $roww['imgct'];
                                        $prnt_id=$roww['parnt_id'];
                                     echo"<a style='cursor:pointer;'href='categories.php?sub_ct_id=$ctid&prnt_id=$prnt_id'>
                                            <div class='product-item'>
                                                <div class='pi-pic'>
                                                    <img src='$imagct' alt=''style='height:330px;'>
                                                </div>
                                                <div class='pi-text'>
                                                    <h5>$ctnm</h5>
                                                </div>
                                            </div>
                                           </a>";
                                    }
                                echo" 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>";
          }else{  //else for if 1
           echo"<section class='man-banner spad'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-lg-8'style='padding-top:133px;'>
                                <div class='product-slider owl-carousel'>";
                                $rslt = @mysqli_query($db, "SELECT * from category3 WHERE parnt_id = $catid order by id asc ");
                                $ii= @mysqli_num_rows($rslt);
                                for($xx = 0 ; $xx < $ii ; $xx ++)
                                    {   $roww = mysqli_fetch_assoc($rslt);
                                        $ctid = $roww['id'];
                                        $ctnm = $roww['catnm'];
                                        $imagct = $roww['imgct'];
                                        $prnt_id=$roww['parnt_id'];
                                       echo"
                                        <a style='cursor:pointer;'href='categories.php?sub_ct_id=$ctid&prnt_id=$prnt_id'>
                                            <div class='product-item'>
                                                <div class='pi-pic'>
                                                    <img src='$imagct' alt=''style='height:330px;'>
                                                </div>
                                                <div class='pi-text'>
                                                    <h5>$ctnm</h5>
                                                </div>
                                            </div>
                                        </a>";
                                    }
                                echo"
                                </div>
                            </div>
                            <div class='col-lg-3 offset-lg-1'>
                                <a style='cursor:pointer;'href='categories.php?ct_id=$catid&prnt_id=$parnt_id'>
                                    <div class='product-large set-bg m-large' data-setbg='$imgct'>
                                        <h2>$catname</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>";
          }//////////////end if 1///////////////////
        }//////////////// end for ////////////////
    ?>
    <!-- Women Banner Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo p-3 m-0">
        <div class="container">
        </div>
    </div>
    <!-- Partner Logo Section End -->
    </div>
    <!-- Footer Section Begin -->

<?php include("includes/footer.php"); ?>
<script>

$("document").ready(function(){
    $("#hom").addClass('active');
});

</script>

