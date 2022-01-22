<?php
// session_start();
$serverName = "DESKTOP-GHL7RON\SQLEXPRESS";
$connectionInfo = array("Database"=>"ANNOUNCEMENT");
$connect = sqlsrv_connect($serverName, $connectionInfo);
$errors = array();

include("server.php");

if( $connect ) {
    // echo "Connection established.<br />";
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Istudent</title>
    <link href="assets/img/logo.ico" rel="icon">
    <link rel="stylesheet" href="assets/css/index.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


</head>

<body>
    <img src="assets/img/topbar.png" style="width: 100%;">
    <input type="checkbox" id="checkbox">
    <header class="header">
        <label for="checkbox">
			<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
		</label>
        <i class="fa fa-user" aria-hidden="true"></i>
    </header>


    <div class="body">
        <!-- Side Bar -->
        <nav class="side-bar">
            <div class="user-p">
                <img src="assets/img/profile.jpg">
            </div>
            <ul>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Health Screening</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Student Housing Centre</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Finance</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Student Activities</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>eServices</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Courses and Semester Registration</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Examination</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Lecture/Tutorial Timetable</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Announcements</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Graduation</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>iCounseling</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Quick Links</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Sponsorship</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>ePanduan</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Student Hometown/Campus Return</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End  Side Bar -->

        <!--Main-->
        <div class="container-fluid p-0" style="margin-top: -24px;">
            <main class="tm-main">
                <!--Top moving announcement-->
                
                <div class="row tm-row">
                    <div class="col-12">
                        <div class="ticker" onclick="window.open('https://istudent.usim.edu.my/index.php?page=page_wrapper&menuID=660','mywindow');">
                            <div class="title">
                                <h5>Announcements</h5>
                            </div>
                            <div class="announcements">
                                <marquee class="content" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="12">
                                    <!-- <p>1. DIMINTA SEMUA</p>
                                    <p>2. TRY TRY TEST</p> -->
                                    <?php
                                    $query = "SELECT id,title FROM Content";
                                    $run = sqlsrv_query($connect, $query);
                                    
                                    if($run === false){
                                        die( print_r( sqlsrv_errors(), true) );
                                    }

                                    while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
                                        echo "<p>".$row['id'].". ".$row['title']."</p>";
                                    }
                                    ?>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ======= Middle Section ======= -->
                
                <div id="myprofile" class="row tm-row" style="margin-bottom:100px;">
                    <section  class="testimonials section-bg" style="padding: 100px 300px 100px 300px;">
                        <div class="container text-center position-relative">
                            <div class="row justify-content-end">
                                <div data-aos="fade-right">
                                    <div class="section-title" style="padding-bottom: 0px">
                                        <h2 class="mx-auto" style="width: 200px;">Latest Announcement</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                    <div class="testimonial-item" >

                                        <img src="assets/img/featured/an1.png" class="testimonial-img" alt="">
                                        <h2>NOTIS PENGISYTIHARAN AHLI MAJLIS PERWAKILAN PELAJAR 2021</h2>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                    <div class="testimonial-item" >

                                        <img src="assets/img/featured/an1.png" class="testimonial-img" alt="">
                                        <h2>NOTIS PENGISYTIHARAN AHLI MAJLIS PERWAKILAN PELAJAR 2021</h2>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </section>
                </div>
                
                <!-- middle Section -->
                <!--  Announcement Below  -->
                <!-- <div class="row tm-row"> -->
                    <footer id="footer">

                        <div class="testimonials section-bg" style="padding: 10px 0px 0px 50px;">
                            <div class="container-fluid" style="margin-left: -50px;">
                                <div class="row justify-content-end">
                                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                                        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                                            <!-- <h4>Featured Announcements</h4>
                                            <div class="swiper-pagination"></div>
                                            <div class="swiper-wrapper"> -->

                                            <?php
                                            $query = "SELECT * FROM Content";
                                            $parameters = array();
                                            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                                            $run = sqlsrv_query($connect, $query, $parameters, $options);
                                            $row_count = sqlsrv_num_rows( $run );
                                            
                                            if($run === false){
                                                die( print_r( sqlsrv_errors(), true) );
                                            }else if($row_count >3){
                                                echo "<h4>Featured Announcements</h4>";
                                            }

                                            echo "<div class=\"swiper-pagination\"></div>
                                            <div class=\"swiper-wrapper\">";
        
                                            while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
                                                if($row['id'] > 3){
                                                    echo "<div class=\"swiper-slide\">
                                                                <div class=\"testimonial-item\">
                                                                    <img src=\"".$row['image_link']."\" class=\"testimonial-img\">
                                                                    <h2>".$row['title']."</h2>
                                                                    <div class=\"text-center\">
                                                                        <a target = '_blank' href=\"".$row['ref_link']."\" class=\"read-btn\">Continue Reading...<i></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                }
                                            }
                                            ?>

                                                <!-- <div class="swiper-slide">
                                                    <div class="testimonial-item">
                                                        <img src="assets/img/img_link/an1.png" class="testimonial-img" style="width: ">
                                                        <h2>Bengkel Online Rekagrafik Photoshop sfsdfhgsdfsdf sdsdfsdfsdf</h2>
                                                        <div class="text-center">
                                                            <a href="article1.html" class="read-btn">Continue Reading...<i></i></a>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- End Featured item -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button">
                            <div class="text-center">
                                <a target = '_blank' href="form.php" class="read-btn">Submit Announcement<i></i></a>
                            </div>
                        </div>
                    </footer>
                    
                <!-- </div> -->
                <!--End Footer-->
            </main>
        </div>









        <!-- Vendor JS Files -->
        <script src="assets/vendor/purecounter/purecounter.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
</body>

</html>