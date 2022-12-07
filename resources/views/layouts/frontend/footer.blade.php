<!-- Footer Section Start -->
@section('footer')
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

<style>
    body {
       font-family: sans-serif;
   }
   .float{
    position:fixed;
    width:45px;
    height:45px;
    bottom:20px;
    right:44px;
    background-color:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:30px;
    box-shadow: 2px 2px 3px #999;
    z-index:100;
}

.my-float{
    margin-top:6px;
}
</style>
<a href="https://api.whatsapp.com/send?phone=+919819912378&text=Hello" class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
    <!-- <i class="lni lni-whatsapp my-float"></i> -->
</a>

<footer class="footer-area pt-100 pb-70">

    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-sm-6">

                <div class="footer-widget">

                    <div class="footer-logo">

                        <a href="index.html">

                            <img src="{{ asset("assets/img/sunrise-vector-art-18.png") }}" alt="logo">

                        </a>

                    </div>



                    <p>Shri HR has become a promising name in the placement sphere of MAHARASHTRA. The company has been
                        able to gain a decent clientele Pan India in a short period of time. We offer high-class
                        placement services for HR consultancy and placement consultancy. To provide these placement
                        services, we have appointed a skilled group of highly experienced and qualified placement
                        industry operations. Our team includes HR consultants, placement consultants, placement experts,
                        and many more. The top-class placement services that we offer are rendered by our placement
                        experts, who are working in this domain for many years. Many clients have talked to us on
                        several times to avail the benefits of our top-class placement services. Connect with us now by
                    dialing our numbers to avail our services.</p>



                    <div class="footer-social d-none">

                        <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>

                        <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>

                        <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                        <a href="#" target="_blank"><i class='bx bxl-whatsapp'></i></a>

                    </div>

                </div>

            </div>









            <div class="col-lg-4 col-sm-6">

                <div class="footer-widget footer-info">

                    <h3>Information</h3>

                    <ul>

                        <li>

                            <span>

                                <i class='bx bxs-phone'></i>

                                Phone:

                            </span>

                            <a href="tel:882569756">

                                +91 98199 12378

                            </a>

                        </li>



                        <li>

                            <span>

                                <i class='bx bxs-envelope'></i>

                                Email:

                            </span>

                            <a href="mailto:Info@shriHR.info">

                                Info@shriHR.info

                            </a>

                        </li>



                        <li>

                            <span>

                                <i class='bx bx-location-plus'></i>

                                Address:

                            </span>

                            605, 6th flr, Shree Chamunda Dham.

                            Above Lijjat Papad, opp Abhyudaya Bank,

                            Kasturba Cross Road No 1 Borivali (E), Mumbai, Maharashtra 400066

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</footer>

<div class="copyright-text text-center">
<!-- 
    <p class="copyright">© 2022 Shri HR Crafted by <a href="https://clicknconnect.in/" target="_blank">Click n
    Connect.Inc.</a> -->
    <p class="copyright">© 2022 Shri HR </p>

</div>

<!-- Footer Section End -->



<!-- Back To Top Start -->

<div class="top-btn">

    <i class='bx bx-chevrons-up bx-fade-up'></i>

</div>

<!-- Back To Top End -->




<script src="assets/js/jquery.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Owl Carousel JS -->

<script src="assets/js/owl.carousel.min.js"></script>

<!-- Nice Select JS -->


<!-- Magnific Popup JS -->

<script src="assets/js/jquery.magnific-popup.min.js"></script>

<!-- Subscriber Form JS -->

<script src="assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Form Velidation JS -->

<script src="assets/js/form-validator.min.js"></script>

<!-- Contact Form -->

<script src="assets/js/contact-form-script.js"></script>

<!-- Meanmenu JS -->

<script src="assets/js/meanmenu.js"></script>

<!-- Custom JS -->

<script src="assets/js/custom.js"></script>

</body>

</html>
@endsection
