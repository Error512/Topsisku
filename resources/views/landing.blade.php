<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Topsisku</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
        <link rel="stylesheet" href="{{ asset('js/scripts.js') }}">
        
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" style="margin-left: -30%" href="#page-top">Topsisku</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#features">Superiority</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#step">Step</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#readme">important</a></li>
                    </ul>
                    
                   
                    <a class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" href="{{ url('/logins') }}">Login</a>
                    <ul></ul>
                    <a class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" href="{{ url('/register') }}">Register</a>
                </div>
            </div>
        </nav>
        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 class="display-1 lh-1 mb-3">Topsisku</h1>
                            <p class="lead fw-normal text-muted mb-5">Practical and simple Topsis Decision Support System Calculator.</p>
   
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Masthead device mockup feature-->
                        <div class="masthead-device-mockup">
                            
                                <img src="img/logocircle.png" >
                                <div class="device-wrapper">
                                <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                                    
                                        
 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Quote/testimonial aside-->
        <aside class="text-center bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <div class="h2 fs-1 text-white mb-4">"Solutions for many decision-making problems and complex calculations, are resolved quickly and practically in Topsisku"</div>
                        <img src="assets/img/tnw-logo.svg" alt="..." style="height: 3rem" />
                    </div>
                </div>
            </div>
        </aside>
        <!-- App features section-->
        <section id="features">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-8 order-lg-1 mb-8 mb-lg-0">
                        <div class="container-fluid px-5">
                            <div class="row gx-5">
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-emoji-smile icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Simple</h3>
                                        <p class="text-muted mb-0">Easy to use, just upload Csv File.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-gear-fill  icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Adjust-able</h3>
                                        <p class="text-muted mb-0">Adjust your Cost/Benefit, Weight each criteria and choose what criteria you want to use.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-stopwatch icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Quick</h3>
                                        <p class="text-muted mb-0">The process and result is very quick!.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">General Purpose</h3>
                                        <p class="text-muted mb-0">You can use Topsisku for find whatever decision.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-0">
                        <!-- Features section device mockup-->
                        <div class="features-device-mockup">
                            
                                
                            <img src="img/Ranking2.png" >
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic features section-->
        <section class="bg-light">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between" id="step">
                    <div>
                        <h2 class="display-4 lh-1 mb-4" style="text-align: center">Easy way to use</h2>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-0">Topsisku is designed to make it easier for users to get ranking results to help them make decisions. Here are simple steps to use Topsisku.</p>
                    </div>
                </div>
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between" style="margin-top:7%">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <h5 style="text-align: center">1. Make project</h5>
                            <p style="text-align: center">Make project whatever name and description you want</p>
                            <img src="img/step/project.png" class="d-block w-100" width="1000" height="500" alt="...">
                          </div>
                          <div class="carousel-item">
                            <h4 style="text-align: center">2. Your own project</h4>
                            <p style="text-align: center">This is your own project, you must upload csv first before configure</p>
                            <img src="img/step/db_blank.png" class="d-block w-100" width="1000" height="500" alt="...">
                          </div>
                          <div class="carousel-item">
                            <h4 style="text-align: center">3. Your Database</h4>
                            <p style="text-align: center">You can see top 10 in your dataset</p>
                            <img src="img/step/db_filled.png" class="d-block w-100" width="1000" height="500" alt="...">
                          </div>
                          <div class="carousel-item">
                            <h4 style="text-align: center">4. Configure</h4>
                            <p style="text-align: center">Configure the cost/benefit, weight dan choose what criteria you want to use</p>
                            <img src="img/step/cosben.png" class="d-block w-100" width="1000" height="500" alt="...">
                          </div>
                          <div class="carousel-item">
                            <h4 style="text-align: center">5. See the result</h4>
                            <p style="text-align: center">You can view the results at any time and please reconfigure if you want to perform calculations again</p>
                            <img src="img/step/ranking.png" class="d-block w-100" width="1000" height="500" alt="...">
                          </div>
                          <div class="carousel-item">
                            <h4 style="text-align: center">Dataset Csv Example</h4>
                            <p style="text-align: center">Use this Csv Example</p>
                            <img src="img/step/example.png" class="d-block w-100" width="1000" height="500" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
                
                
                
            </div>
        </section>
        <!-- App badge section-->
        <section class="bg-gradient-primary-to-secondary" id="readme">
            <div class="container px-5">
                <h1 class="text-center text-white font-alt mb-4">Few Things Before Using Topsisku</h1>
                <h4 class="text-center text-white mb-3">There few thing must read before using Topsisku, for good experience</h4>
                <div class="container px-5" style="margin-top: 5%">
                    <h3 class="text-white ">
                        1. Make dataset from Excel.
                    </h3>
                    <h5 class="text-white ">
                        not from other tools in internet. Otherwise, the last alternative have possibility no not showed/calculated.
                    </h5>
                    <br/>

                    <h3 class="text-white ">
                        2. One project one fixed criteria
                    <h5 class="text-white ">
                        Each project have fixed Criteria, update button added in feature just for update the alternative not criteria. If you want update criteria, please make a new project.
                    </h5>
                    <br/>
                    <h3 class="text-white ">
                        3. Use Following template Csv
                    <h5 class="text-white ">
                        Use following Csv Template at easyway to use carrousel.
                    </h5>
                </div>
            </div>
        </section>


        <!-- Call to action section-->
        <section class="cta">
            <div class="cta-content">
                <div class="container px-5">
                    <h2 class="text-white display-1 lh-1 mb-4">
                        Stop calculating manualy.
                        <br />
                        Start using Topsisku.
                    </h2>
                    <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="/register" >Register Now!</a>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Topsisku. All Rights Reserved.</div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>
        <!-- Feedback Modal-->
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
