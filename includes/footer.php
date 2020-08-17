 </div>
    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/logo3.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Servises</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <a id="scrollUp" class='p-2 pr-3 pl-3' style="cursor:pointer;position: fixed;right:30px;bottom:30px; z-index: 2147483647; display:none;background-color:#ffc107;color:white;">
     <i class="fa fa-angle-up" aria-hidden="true"></i>
    </a>
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    
</body>

</html>

<script>
   $("document").ready(function(){
        $.get('favorit_order/favorites_ajx.php?inptid=fvrt_icon', function(data){
            $("#fvrt_nm").html(data);
        });
        $('#scrollUp').on('click',function(){
            $('html, body').animate({
                    scrollTop: $("#header").offset().top
            }, 1000)
        });
        $('#scrollUp').on('mouseenter',function(){
            $(this).css("background-color", "black");
        });
        $('#scrollUp').on('mouseleave',function(){
            $(this).css("background-color", '#ffc107');
        });
        $(window).on('scroll',function(){
            var p = $(document).scrollTop();
            if(p > 100){
                $('#scrollUp').css('display','block');
            }else{
                $('#scrollUp').css('display','none');
            }
        });

    });
    
</script>