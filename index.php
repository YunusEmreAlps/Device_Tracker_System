<?php
  header("Access-Control-Allow-Origin: *"); 
  include_once 'php/authenticate.php';              // Database connection
?>
<!DOCTYPE html>

<!-- Turkish -->
<html lang="tr">
  <head>
    <!-- Metadata is data (information) about data. -->
    <!-- Metadata is used by browsers (how to display content or reload page), search engines (keywords), and other web services. -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- It is shown in the browser's title bar or in the page's tab. -->
    <title>UZMAN GSM</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="device-mockups/device-mockups.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

    <!-- Custom styles for this template -->  
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body class="light" id="page-top">
    <div id="loader" class="loadcenter"></div> 

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">UZMAN GSM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <!-- About -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="#about">Hakkımızda</a>
            </li>
            <!-- About -->
            <!-- Our Services -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="#ourservices">Hizmetlerimiz</a>
            </li>
            <!-- Our Services -->
            <!-- Brands -->
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="#product">Ürünler</a>
            </li>
            <!-- Brands -->
            <!-- Device Tracker -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="php/login.php">Cihaz Takip Sistemi</a>
            </li>
            <!-- Device Tracker-->
            <!-- Contact -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size: small;" href="#contactus">İletişim</a>
            </li>
            <!-- Contact -->
            <!-- Language -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="font-size:small;" id="languageselector" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dil</a>
              <div class="dropdown-menu text-center" aria-labelledby="languageselector">
                <a class="dropdown-item" href="index.php">Türkçe</a>
                <a class="dropdown-item" href="indexen.php">English</a>
              </div>
            </li>
            <!-- Theme  -->
            <li class="nav-item dropdown theme-visible" >
              <div class="toggle-container mx-auto" id="themebtn">
                <input type="checkbox" id="switch" name="theme" onclick="ThemeSwitcher()"/>
                <label class="text-left" for="switch">Toggle</label>
              </div>
            </li>
            <!-- Theme -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navigation Bar -->
    
    <!-- Header -->
    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <!-- Business Message -->
          <div class="col-lg-8 my-auto">
            <div class="header-content mx-auto">
              <h1 class="text-center mb-5">AKILLI TELEFON TEKNİK SERVİSİ</h1>

              <div class="row mb-5" style="font-size: 24px;">
                <!-- Cost -->
                <div class="col-lg-4 col-md-6 mb-2 mt-2 text-center">
                  <h1><img src="https://img.icons8.com/nolan/64/calculator.png"/></h1>
                  <span>UYGUN FİYAT</span>
                </div>
                <!-- Cost -->
                <!-- Free -->
                <div class="col-lg-4 col-md-6 mb-2 mt-2 text-center">
                  <h1><img src="https://img.icons8.com/nolan/64/one-free.png"/></h1>
                  <span>ÜCRETSİZ ARIZA TESPİTİ</span>
                </div>
                <!-- Free -->
                <!-- Expert -->
                <div class="col-lg-4 col-md-6 mb-2 mt-2 text-center">
                  <h1><img src="https://img.icons8.com/nolan/64/development-skill.png"/></h1>
                  <span>UZMAN TEKNİK SERVİS EKİBİ</span>
                </div>
                <!-- Expert -->
                <!-- Quality  -->
                <div class="col-lg-4 col-md-6 mb-2 mt-2 text-center">
                  <h1><img src="https://img.icons8.com/nolan/64/good-quality.png"/></h1>
                  <span>KALİTELİ MALZEMELER</span>
                </div>
                <!-- Quality  -->
                <!-- Fast -->
                <div class="col-lg-4 col-md-6 mb-2 mt-2 text-center">
                  <h1><img src="https://img.icons8.com/nolan/64/fast-track--v1.png"/></h1>
                  <span>HIZLI ONARIM</span>
                </div>
                <!-- Fast -->
                <!-- Service -->
                <div class="col-lg-4 col-md-6 mb-2 mt-2 text-center">
                  <h1><img src="https://img.icons8.com/nolan/64/time-span.png"/></h1>
                  <span>7/24 HİZMET</span>
                </div>
                <!-- Service -->
                <!-- Button -->
                <div class="col-lg-12 mb-3 mt-5 text-center">
                  <a href="php/login.php" class="btn btn-outline btn-xl js-scroll-trigger">Cihaz Takip Sistemi</a>
                </div>
                <!-- Button -->
              </div>
            </div>
          </div>
          <!-- Business Message -->
          <!-- Phone Screen -->
          <div class="col-lg-4 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen"  style="background: radial-gradient(#fff, #aaa);" contenteditable="true">
                    <!-- Device  -->
                      <img class="d-block w-100" src="img/iphone_screen.png" alt="First slide">
                      
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <!-- PhoneScreen -->
        </div>
      </div>
    </header>  
    <!-- Header -->

    
    <!-- About -->
    <section class="download bg-primary download_design" id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-10 mx-auto">
            <!-- Header -->
            <div class="section-heading text-center mb-3">
              <h2>HAKKIMIZDA</h2>
            </div>
            <!-- Header -->  
            <p class="text-left">        
              Uzman GSM olarak bizler, geçmişten gelen iş tecrübelerimizden faydalanarak çıtamızı hızla yükseltip, gerek kamu gerek ticari uygulamalarda sıra dışı başarılara imza attık.
              Müşteri sorunlarına hızlı ve güvenilir çözümler bulmayı kendine misyon edinmiş olan Uzman GSM, sahip olduğu referanslar ve tecrübeler sayesinde müşterilerine daima uygun, güvenilir ve hızlı çözümler sunmayı başarmıştır.<br/><br/>
              Müşterilerimizin memnuniyeti bizim başarımızdır. Tüm hizmetlerimiz ve ürünlerimiz müşterilerimizin ihtiyaçlarına göre belirlenir.
              Uzun yıllardan gelen deneyimimiz ve işimize duyduğumuz coşkuyla müşterilerimize en iyi teknik danışmanlığı sağlar, standartların üzerine çıkarak müşterilerimizin beklentilerinin fazlasını sunarız.<br/><br/>
              Müşterileri ile saygı ve güvene dayalı ilişkiler içerisinde olmayı, kaliteli hizmet sunmayı, çağdaş yönetim teknikleriyle müşterilerinin daha karlı olabilmeleri için gerekli teknolojileri müşterilerine sunarak dünya çapında faaliyet gösteren saygın ve yüksek nitelikli bir firma olmayı hedeflemektedir.
            </p>          
          </div>
        </div>
      </div>
    </section>
    <!-- About -->
    
    <!-- Counter -->
    <section class="countercard">      
      <div class="container">
        <div class="row">
          <div class="col mx-auto">
            <div id="colorlib-counter" class="colorlib-counters" style="background-image: url(img/cover_bg.jpg);" data-stellar-background-ratio="0.5">
              <div class="overlay"></div>
              <div class="colorlib-narrow-content">
                <div class="row">
                </div>
                <div class="row">
                  <div class="col-md-3 text-center animate-box">
                    <span class="colorlib-counter counting" data-from="0" data-count="2010" data-speed="5000" data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Yılından Günümüze Hizmetindeyiz</span>
                  </div>
                  <div class="col-md-3 text-center animate-box">
                    <span class="colorlib-counter counting" data-from="0" data-count="18746" data-speed="5000" data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Toplam Tamirat</span>
                  </div>
                  <div class="col-md-3 text-center animate-box">
                    <span class="colorlib-counter counting" data-from="0" data-count="15742" data-speed="5000" data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Mutlu Müşteri</span>
                  </div>
                  <div class="col-md-3 text-center animate-box">
                    <span class="colorlib-counter counting" data-from="0" data-count="2" data-speed="5000" data-refresh-interval="50"></span>
                    <span class="colorlib-counter-label">Uzman Çalışan</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Counter -->
    
    <!-- Our Services -->
    <section class="features" id="ourservices">
      <div class="container">
        <!-- Header -->
        <div class="section-heading text-center">
          <h2 class="darkclr" id="featurestitle">HİZMETLERİMİZ</h2>
          <span class="text-muted">Bakım & Onarım</span>
          <hr>
        </div>
        <!-- Header -->

        <div class="row">
          <!-- Device Screen -->
          <div class="col-lg-4 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen" style="background-image: url(img/black_thread.png);">
                    <div id="carouselRepair" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators" style="margin-bottom: -75px;">
                        <li data-target="#carouselRepair" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselRepair" data-slide-to="1"></li>
                        <li data-target="#carouselRepair" data-slide-to="2"></li>
                        <li data-target="#carouselRepair" data-slide-to="3"></li>
                        <li data-target="#carouselRepair" data-slide-to="4"></li>
                        <li data-target="#carouselRepair" data-slide-to="5"></li>
                        <li data-target="#carouselRepair" data-slide-to="6"></li>
                        <li data-target="#carouselRepair" data-slide-to="7"></li>
                        <li data-target="#carouselRepair" data-slide-to="8"></li>
                        <li data-target="#carouselRepair" data-slide-to="9"></li>
                        <li data-target="#carouselRepair" data-slide-to="10"></li>
                        <li data-target="#carouselRepair" data-slide-to="11"></li>
                        <li data-target="#carouselRepair" data-slide-to="12"></li>
                        <li data-target="#carouselRepair" data-slide-to="13"></li>
                        <li data-target="#carouselRepair" data-slide-to="14"></li>
                      </ol>
                      <div class="carousel-inner">
                        <!-- Phone Case -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Arka Kapak</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/phone-case.png"/><br/>  
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Phone Case -->
                        <!-- Camera-->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Arka Kamera</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/camcorder-pro.png"/><br/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Camera-->
                        <!-- Battery -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Batarya</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/empty-battery.png"/><br/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Battery -->
                        <!-- Screen -->
                        <div class="carousel-item active">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Ekran</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/multiple-devices.png"/><br/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Screen -->
                        <!-- Home -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Home Tuşu</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/circled.png"/><br/> 
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Home -->
                        <!-- Speaker -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Hoparlör</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/speaker.png"/><br/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Speaker -->
                        <!-- Camera Screen -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Kamera Camı</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/camera.png"/><br/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Camera Screen -->
                        <!-- Case -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Kasa</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/two-smartphones.png"/><br/>   
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Case -->
                        <!-- Earphones -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Kulaklık Soketi</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/earbud-headphones.png"/><br/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Earphones -->
                        <!-- Microphone -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Mikrofon</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/microphone.png"/><br/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Microphone -->
                        <!-- Camera-->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Ön Kamera</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/camcorder-pro.png"/><br/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Camera-->
                        <!-- Water Problem -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Sıvı Teması</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/water.png"/><br/>  
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Water Problem -->
                        <!-- Lightning-->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Şarj Soketi</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/lightning-bolt.png"/><br/>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Lightning-->
                        <!-- Sofware Update -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Yazılım Güncelleme</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/software-installer.png"/><br/>  
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Software Update -->
                        <!-- Wifi -->
                        <div class="carousel-item">
                          <div class="d-block w-100">
                            <div class="repaircard ml-5" style="margin-top: 75px;">
                              <h3 class="repairtitle">Wifi</h3>
                              <div class="repairbar">
                                <div class="repairemptybar"></div>
                                <div class="repairfilledbar"></div>
                              </div>
                              <div class="circle">
                                <img src="https://img.icons8.com/nolan/96/wifi-logo.png"/><br/>  
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Wifi -->
                      </div>
                      <a class="carousel-control-prev" href="#carouselRepair" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselRepair" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Device Screen -->
          <!-- Tech Icon -->
          <div class="col-lg-8 my-auto">
            <div class="container-fluid">
              <div class="row">
                <!-- Computer -->
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-screen-desktop text-primary"></i>
                    <h3 class="darkclr">Bilgisayar</h3>
                    <p class="text-muted text-left">Dizüstü ve Masaüstü Bilgisayarların; kırık ekran tamirini, batarya, RAM, CPU, GPU ve hard disk değişimlerini yapıyoruz!</p>
                  </div>
                </div>
                <!-- Computer -->
                <!-- Tablet -->
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-screen-tablet text-primary"></i>
                    <h3 class="darkclr">Tablet</h3>
                    <p class="text-muted text-left">Samsung veya iPad Tabletlerin; kırılma, şarj modülü, batarya ve daha fazlasının tamiri için hizmetindeyiz.</p>
                  </div>
                </div>
                <!-- Tablet -->
              </div>
              <!-- Phone -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="feature-item">
                    <i class="icon-screen-smartphone text-primary"></i>
                    <h3 class="darkclr">Telefon</h3>
                    <p class="text-muted text-left">Tüm cihazların tamirini yapıyoruz! iPhone, Blackberry, Google, HTC, Samsung, Sony ve Motorola markalarının tamirini
                      <span class="more-text hide">kaliteli, hızlı ve uygun fiyat garantisi ile yapıyoruz.Ekran gibi tüm bileşenler için onarım hizmeti sunuyoruz.</span>
                      <a data-show="more" more-collapse="false" href="/" class="showmore">more</a>
                    </p>
                  </div>
                </div>
              </div>
              <!-- Phone -->
            </div>
          </div>
          <!-- Tech Icon -->
        </div>
      </div>
    </section>
    <!-- Our Services -->

    <!-- Brands -->
    <section class="features" style="margin-top: -100px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 my-auto">
            <div class="slider">
              <div class="slide-track">
                <!-- Apple -->
                <div class="slide">
                  <img src="img/brandphone/apple.png" height="128" alt="Apple" />
                </div>
                <!-- Apple -->
                <!-- Asus -->
                <div class="slide">
                  <img src="img/brandphone/asus.png" height="128" alt="Asus" />
                </div>
                <!-- Asus -->       
                <!-- Blackberry -->
                <div class="slide">
                  <img src="img/brandphone/blackberry.png" height="128" alt="Blackberry" />
                </div>
                <!-- Blackberry -->                 
                <!-- Dell -->
                <div class="slide">
                  <img src="img/brandphone/dell.png" height="128" alt="Dell" />
                </div>
                <!-- Dell -->        
                <!-- Fujitsu -->
                <div class="slide">
                  <img src="img/brandphone/fujitsu.png" height="128" alt="Fujitsu" />
                </div>
                <!-- Fujitsu -->
                <!-- Google -->
                <div class="slide">
                  <img src="img/brandphone/google.png" height="128" alt="Google" />
                </div>
                <!-- Google -->        
                <!-- HP-->
                <div class="slide">
                  <img src="img/brandphone/hp.png" height="128" alt="HP" />
                </div>
                <!-- HP -->
                <!-- HTC -->
                <div class="slide">
                  <img src="img/brandphone/htc.png" height="128" alt="HTC" />
                </div>
                <!-- HTC -->                          
                <!-- Huawei -->
                <div class="slide">
                  <img src="img/brandphone/huawei.png" height="128" alt="Huawei" />
                </div>
                <!-- Huawei --> 
                <!-- LG -->
                <div class="slide">
                  <img src="img/brandphone/lg.png" height="128" alt="LG" />
                </div>
                <!-- LG -->
                <!-- Meizu -->
                <div class="slide">
                  <img src="img/brandphone/meizu.png" height="128" alt="Meizu" />
                </div>
                <!-- Meizu --> 
                <!-- Xiaomi -->
                <div class="slide">
                  <img src="img/brandphone/mi.png" height="128" alt="Xiaomi" />
                </div>
                <!-- Xiaomi -->
                <!-- Microsoft -->
                <div class="slide">
                  <img src="img/brandphone/microsoft.png" height="128" alt="Microsoft" />
                </div>
                <!-- Microsoft -->
                <!-- Nokia -->
                <div class="slide">
                  <img src="img/brandphone/nokia.png" height="128" alt="Nokia" />
                </div>
                <!-- Nokia -->
                <!-- Oppo -->
                <div class="slide">
                  <img src="img/brandphone/oppo.png" height="128" alt="Oppo" />
                </div>
                <!-- Oppo -->
                <!-- Razer -->
                <div class="slide">
                  <img src="img/brandphone/razer.png" height="128" alt="Razer" />
                </div>
                <!-- Razer -->
                <!-- Samsung -->
                <div class="slide">
                  <img src="img/brandphone/samsung.png" height="128" alt="Samsung" />
                </div>
                <!-- Samsung -->
                <!-- Sony -->
                <div class="slide">
                  <img src="img/brandphone/sony.png" height="128" alt="Sony" />
                </div>
                <!-- Sony -->
                <!-- Toshiba -->
                <div class="slide">
                  <img src="img/brandphone/toshiba.png" height="128" alt="Toshiba" />
                </div>
                <!-- Toshiba -->
                <!-- ZTE -->
                <div class="slide">
                  <img src="img/brandphone/zte.png" height="128" alt="ZTE" />
                </div>
                <!-- ZTE -->                                  
              </div>
            </div>
          </div>
        </div>
      </div>      
    </section>
    <!-- Brands -->

    <!-- Product -->
    <section class="cta" id="product">
      <div class="cta-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12 my-auto">
                <div id="carouselProduct" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators" style="margin-bottom: -75px;">
                    <!-- <li data-target="#carouselProduct" data-slide-to="0" class="active"></li>-->
                    <?php 
                      $query = $conn->query("SELECT * FROM product", PDO::FETCH_ASSOC); 
                      $product_number = 0;
                      if ( $query->rowCount() )
                      {
                        foreach($query as $prow) 
                        {
                      ?>
                      <li data-target="#carouselProduct" class="<?php if($product_number == 0){echo "active";} ?>" data-slide-to="<?php echo $product_number; ?>"></li>
                    <?php
                          $product_number += 1; 
                        }
                      }  
                    ?>
                  </ol>
                  <div class="text-center carousel-inner">
                    <!-- List of Product -->
                    <?php 
                      $query = $conn->query("SELECT * FROM product", PDO::FETCH_ASSOC); 
                      $product_number = 0;
                      if ( $query->rowCount() )
                      {
                        foreach($query as $prow) 
                        {
                      ?>
                     
                    <!-- Products -->
                    <div class="carousel-item <?php if($product_number == 0){echo "active";} ?>">
                      <div class="shop-card" style="margin: auto;">
                        <div class="title"><?php echo $prow["product_name"]; ?></div>
                        <div class="desc"><?php echo $prow["product_category"]; ?></div>
                        <div class="content">
                          <div class="content-overlay"></div>
                          <?php echo '<img id="shopimg" src="data:image/jpeg;base64,'.base64_encode( $prow['product_image'] ).'""/>'; ?>
                          <div class="content-details fadeIn-bottom">
                            <h3 class="content-title">Özellikler</h3>
                            <p class="content-text"><?php echo $prow["product_information"]; ?></p>
                          </div>
                        </div>
                        <div class="price"><?php echo $prow["product_price"]; ?><i class="fa fa-try"></i></div>
                      </div>
                    </div>
                    <!-- Products -->

                    <?php
                          $product_number += 1; 
                        }
                      }  
                    ?>

                    <!-- Product Number is Zero --> 
                    <?php 
                      $query = $conn->query("SELECT * FROM product", PDO::FETCH_ASSOC); 
                      $product_number = 0;
                      if ( $query->rowCount() == 0 )
                      {
                    ?>
                    <div class="carousel-item active ?>">
                      <div class="shop-card" style="margin: auto;">
                        <div class="title">Yeni Ürünler</div>
                        <div class="desc">Çok Yakında Sizlerle...</div>
                        <div class="content mt-2">
                          <div class="wavy">
                            <span style="--i:1;">Y</span>
                            <span style="--i:2;">ü</span>
                            <span style="--i:3;">k</span>
                            <span style="--i:4;">l</span>
                            <span style="--i:5;">e</span>
                            <span style="--i:6;">n</span>
                            <span style="--i:7;">İ</span>
                            <span style="--i:8;">y</span>
                            <span style="--i:9;">o</span>
                            <span style="--i:10;">r</span>
                            <span style="--i:11;">.</span>
                            <span style="--i:12;">.</span>
                            <span style="--i:13;">.</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php 
                      }
                    ?>
                    <!-- Product Number is Zero -->    


                    <!-- List of Product -->
                  </div>
                  <!-- Prev -->
                  <a class="carousel-control-prev" href="#carouselProduct" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <!-- Prev -->
                  <!-- Prev -->
                  <a class="carousel-control-next" href="#carouselProduct" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                  <!-- Prev -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="overlay"></div>
    </section>
    <!-- Product -->


    <!-- Contact -->
    <section class="contact" id="contactus">
      <div class="container" style="margin-bottom: 25px;">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <!-- Header -->
            <div class="section-heading text-center mb-3">
              <h2>BİZİMLE İLETİŞİME GEÇİN</h2>
            </div>
            <!-- Header -->
            <!-- Icons -->
            <ul class="list-inline list-social">
              <!-- Facebook -->
              <li class="list-inline-item social-facebook icon-rotate">
                <a href="https://www.facebook.com/akSesuarStoreee/">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <!-- Facebook -->
              <!-- Instagram -->
              <li class="list-inline-item social-instagram icon-rotate">
                <a href="https://www.instagram.com/hasancansoy">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              <!-- Instagram -->
              <!-- Twitter -->
               <li class="list-inline-item social-twitter icon-rotate">
                <a href="https://twitter.com/AksesuarStore">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <!-- Twitter -->
              <!-- Phone -->
              <li class="list-inline-item social-phone icon-rotate">
                <a href="tel:+905070126866">
                  <i class="fas fa-phone"></i>
                </a>
              </li>
              <!-- Phone -->
              <!-- Mail -->
              <li class="list-inline-item social-mail icon-rotate">
                <a href="mailto:info@uzmangsm.com">
                  <i class="fa fa-envelope"></i>
                </a>
              </li>
              <!-- Mail -->
              <!-- Location -->
              <li class="list-inline-item social-location icon-rotate">
                <a data-toggle="collapse" href="#collapseLocation" role="button" aria-expanded="false" aria-controls="collapseLocation">
                  <i class="fa fa-map-marker"></i>
                </a>
              </li>
              <!-- Location -->
            </ul>
            <!-- Icons -->      
          </div>
        </div>
        <div class="row" style="margin-top: 25px; font-family:Arial, Helvetica, sans-serif;">
          <div class="col-md-8 mx-auto collapse" id="collapseLocation">
            <div class="card card-body mx-auto" style="background: transparent;">
              <span class="fa" style="color:#fff;">BOSNA HERSEK MAHALLESİ, OSMANLI CADDESİ, OVAL ÇARŞI 14/12 <br/>(BURGER KİNG YANI)</span>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top: 25px; font-family:Arial, Helvetica, sans-serif;">
          <div class="col mx-auto collapse" id="collapseLocation">
            <div class="card card-body mx-auto" style="background: transparent;">
              <div class="google-map-area" id="uzmanmap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d392.94812423260277!2d32.52581888385494!3d38.010139474632616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d08d79fae26d91%3A0x9d2747b3dac44e0b!2sBurger+King!5e0!3m2!1str!2str!4v1553870352586!5m2!1str!2str" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen=""></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact -->
    
    <!-- Footer -->
    <footer>
      <div class="container">
        <p>
          <a href="index.php" style="font-size:24px" id="homepg" class="fa">&#xf015;</a>
        </p>
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
          <a href="#page-top">UZMAN GSM</a>
        </div>
      </div>
    </footer>
    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>  

    <script>
  
      document.onreadystatechange = function() { 
            if (document.readyState !== "complete") { 
                document.querySelector( 
                  "body").style.visibility = "hidden"; 
                document.querySelector( 
                  "#loader").style.visibility = "visible"; 
            } else { 
                document.querySelector( 
                  "#loader").style.display = "none"; 
                document.querySelector( 
                  "body").style.visibility = "visible"; 
            } 
        }; 

    
      // Desktop Theme Switcher   
      function ThemeSwitcher(){  
        var c=document.getElementById('switch');
        // dark
        if(c.checked) {
          document.body.style.backgroundColor="#17141d";
          document.getElementById("uzmanmap").style.filter = "grayscale(100%) invert(92%) contrast(83%)";
          x = document.querySelectorAll(".darkclr");
          for (i = 0; i < x.length; i++) {
            x[i].style.color = "#818d96";
          }
        } 
        // light
        else {
          document.body.style.backgroundColor="#fff";
          document.getElementById("uzmanmap").style.filter = "grayscale(0%)";
          x = document.querySelectorAll(".darkclr");
          for (i = 0; i < x.length; i++) {
            x[i].style.color = "#212529";  
          }
        }
      } 
      // Desktop Theme Switcher
      // Counter
      $('.counting').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');

        $({ countNum: $this.text()}).animate({
          countNum: countTo
        },

        {
          duration: 3000,
          easing:'linear',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }
        });  
      });
      // Counter
      // Show More
      $('[data-show="more"]').on('click', function(event) {
        event.preventDefault();
            if ( $(this).attr('more-collapse') === 'false' ) {     
            $(this).attr('more-collapse', 'true'); 
            $(this).prev('.more-text').removeClass('hide');
            $(this).text('less');
            }  else {
                $(this).text('more');
                $(this).attr('more-collapse', 'false'); 
                $(this).prev('.more-text').addClass('hide');
            }  
        }); 
      // Show More
    </script>
  </body>  
</html>

