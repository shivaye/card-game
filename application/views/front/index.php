<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Strane - Startup Agency Bootstrap 5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="<?=base_url()?>public/front/assets/images/favicon.ico" type="image/png">
    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?=base_url()?>public/front/assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/front/assets/css/vendor/icofont.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/front/assets/css/vendor/jquery-ui.min.css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?=base_url()?>public/front/assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/front/assets/css/plugins/swiper-bundle.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=base_url()?>public/front/assets/css/style.css">
  </head>
  <body>
    <main class="main-wrapper">
      <!-- .....:::::: Start Header Section :::::.... -->
      <header class="header-section sticky-header d-none d-lg-block section-fluid-200">
        <div class="header-wrapper">
          <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <!-- Start Header Logo -->
                <a href="index.html" class="header-logo">
                <img src="<?=base_url()?>public/front/assets/images/logo/logo.png" alt="">
                </a>
                <!-- End Header Logo -->
              </div>
              <div class="col-auto d-flex align-items-center">
                <!-- Start Header Menu -->
                <ul class="header-nav">
                  <li><a href="index.html">Home</a></li>
                  <li class="has-dropdown">
                    <a href="service-list.html">Service</a>
                    <ul class="submenu">
                      <li><a href="service-list.html">Services</a></li>
                      <li><a href="service-details.html">Service Details</a></li>
                    </ul>
                  </li>
                  <li class="has-dropdown">
                    <a href="portfolio-list.html">Project</a>
                    <ul class="submenu">
                      <li><a href="portfolio-list.html">Project</a></li>
                      <li><a href="portfolio-details.html">Project Details</a></li>
                    </ul>
                  </li>
                  <li class="has-dropdown">
                    <a href="index.html">Pages</a>
                    <ul class="submenu">
                      <li><a href="about.html">About Us</a></li>
                      <li><a href="faq.html">FAQ</a></li>
                      <li><a href="404-error.html">404 Page</a></li>
                    </ul>
                  </li>
                  <li class="has-dropdown">
                    <a href="blog-list-left-sidebar.html">Blogs</a>
                    <ul class="submenu">
                      <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                      <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                      <li><a href="blog-list-full-width.html">Blog List Full Width</a></li>
                      <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                      <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a></li>
                      <li><a href="blog-details-full-width.html">Blog Details Full Width</a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
                <!-- End Header Menu -->
              </div>
              <div class="col-auto">
                <div class="header-btn-link">
                  <a href="contact.html" class="btn btn-lg btn-default">Get Started</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- .....:::::: End Header Section :::::.... -->
      <!-- .....:::::: Start Mobile Header Section :::::.... -->
      <div class="mobile-header d-block d-lg-none">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto">
              <div class="mobile-logo">
                <a href="index.html"><img src="<?=base_url()?>public/front/assets/images/logo/logo.png" alt=""></a>
              </div>
            </div>
            <div class="col-auto">
              <div class="mobile-action-link text-end">
                <a data-bs-toggle="offcanvas" href="#toggleMenu" role="button"><i class="icofont-navigation-menu"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- .....:::::: Start MobileHeader Section :::::.... -->
      <!--  .....::::: Start Offcanvas Mobile Menu Section :::::.... -->
      <div class="offcanvas offcanvas-start" tabindex="-1" id="toggleMenu">
        <div class="offcanvas-header">
          <!-- Start Header Logo -->
          <a href="index.html" class="header-logo"><img src="<?=base_url()?>public/front/assets/images/logo/logo.png" alt=""></a>
          <!-- End Header Logo -->
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <!-- Start Offcanvas Mobile Menu Wrapper -->
          <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
              <!-- Start Mobile Menu Nav -->
              <div class="offcanvas-menu">
                <ul>
                  <li><a href="index.html"><span>Home</span></a></li>
                  <li>
                    <a href="#"><span>Services</span></a>
                    <ul class="mobile-sub-menu">
                      <li><a href="service-list.html">Service List</a></li>
                      <li><a href="service-details.html">Service Details</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#"><span>Portfolio</span></a>
                    <ul class="mobile-sub-menu">
                      <li><a href="portfolio-list.html">Portfolio</a></li>
                      <li><a href="portfolio-details.html">Portfolio Details</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#"><span>Pages</span></a>
                    <ul class="mobile-sub-menu">
                      <li><a href="about.html"><span>About Us</span></a></li>
                      <li><a href="faq.html">FAQ</a></li>
                      <li><a href="404-error.html">404 Page</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#"><span>Blogs</span></a>
                    <ul class="mobile-sub-menu">
                      <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                      <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                      <li><a href="blog-list-full-width.html">Blog List Full Width</a></li>
                      <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                      <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a></li>
                      <li><a href="blog-details-full-width.html">Blog Details Full Width</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="contact.html"><span>Contact</span></a>
                  </li>
                </ul>
              </div>
              <!-- End Mobile Menu Nav -->
            </div>
            <!-- End Mobile Menu -->
            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info text-center">
              <ul class="social-link">
                <li><a href="https://example.com/"><i class="icofont-facebook"></i></a>
                </li>
                <li><a href="https://example.com/"><i class="icofont-twitter"></i></a>
                </li>
                <li><a href="https://example.com/"><i class="icofont-skype"></i></a></li>
              </ul>
            </div>
            <!-- End Mobile contact Info -->
          </div>
          <!-- End Offcanvas Mobile Menu Wrapper -->
        </div>
      </div>
      <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
      <!-- Offcanvas Overlay -->
      <div class="offcanvas-overlay"></div>
      <!-- ...::: Start Hero Display Section :::... -->
      <div class="hero-display-section section-fluid-200">
        <div class="box-wrappr">
          <div class="hero-wrapper">
            <div class="hero-content">
              <span class="title-tag">In a few minutes</span>
              <h2 class="title">Start <span>& Manage</span> your best choice startup.</h2>
              <p>The business standard to since the printer took a gallery scrambled it to make
                specimen book.
              </p>
              <a href="service-list.html" class="btn btn-lg btn-default icon-right">All
              Service’s <i class="icofont-double-right"></i></a>
            </div>
            <div class="hero-image">
              <img class="img-fluid" src="<?=base_url()?>public/front/assets/images/hero/hero.png" alt="">
            </div>
          </div>
        </div>
      </div>
      <!-- ...::: End Hero Display Section :::... -->
      <!-- ...::: Start Count Display Section :::... -->
      <div class="count-display section-fluid-200 section-top-gap-150 section-inner-padding-100 section-inner-gray-gradient-bg-reverse">
        <div class="box-wrapper">
          <div class="count-wrapper pos-relative">
            <div class="container-fluid">
              <div class="row align-items-center justify-contents-between">
                <div class="col-xl-5 offset-xl-0 col-md-10 offset-md-1 col-sm-12">
                  <div class="content text-lg-start text-center">
                    <h3 class="title">We’r <span>10,000</span> project
                      complete & <span>100%</span> client
                      satisfaction.
                    </h3>
                  </div>
                </div>
                <div class="col">
                  <ul class="counter-items counter-items-style-1">
                    <!-- Start Counter Single Items  -->
                    <li class="counter-single-item">
                      <div class="count-box">
                        <img src="<?=base_url()?>public/front/assets/images/icons/count-shape-blue.png" alt="">
                        <p class="text"><span class="counter"  data-to="100" data-speed="1500">76</span>%</p>
                      </div>
                      <h6 class="title">Happy Client’s</h6>
                    </li>
                    <!-- End Counter Single Items  -->
                    <!-- Start Counter Single Items  -->
                    <li class="counter-single-item">
                      <div class="count-box">
                        <img src="<?=base_url()?>public/front/assets/images/icons/count-shape-orange.png" alt="">
                        <p class="text"><span class="counter">88</span>%</p>
                      </div>
                      <h6 class="title">Positive Rating</h6>
                    </li>
                    <!-- End Counter Single Items  -->
                    <!-- Start Counter Single Items  -->
                    <li class="counter-single-item">
                      <div class="count-box">
                        <img src="<?=base_url()?>public/front/assets/images/icons/count-shape-purple.png" alt="">
                        <p class="text"><span class="counter">92</span>%</p>
                      </div>
                      <h6 class="title">Projects Done</h6>
                    </li>
                    <!-- End Counter Single Items  -->
                  </ul>
                </div>
              </div>
            </div>
            <div class="dotline-animate">
              <span class="blue"></span>
              <span class="orange"></span>
              <span class="blue"></span>
            </div>
          </div>
        </div>
      </div>
      <!-- ...::: End Count Display Section :::... -->
      <!-- ...::: Start Promo Display Section :::... -->
      <div class="promo-display-section section-inner-padding-150 section-inner-bg-theme-color-gradeint-noise">
        <div class="box-wrapper">
          <div class="promo-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <!-- Start Promo Items -->
                  <div class="promo-items">
                    <!-- Start Promo Single Items -->
                    <div class="promo-single-items">
                      <div class="icon">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/lightbulb.png" alt="">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/lightbulb-gradient.png" alt="">
                        <div class="dot-icon-hover">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                      </div>
                      <div class="content">
                        <h4 class="title">Innovative Ideas</h4>
                        <p>There are many variations popular sheet containing available have version
                          software like available.
                        </p>
                      </div>
                    </div>
                    <!-- End Promo Single Items -->
                    <!-- Start Promo Single Items -->
                    <div class="promo-single-items">
                      <div class="icon">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/cyber-security.png" alt="">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/cyber-security-gradient.png" alt="">
                        <div class="dot-icon-hover">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                      </div>
                      <div class="content">
                        <h4 class="title">Secure & Private</h4>
                        <p>There are many variations popular sheet containing available have version
                          software like available.
                        </p>
                      </div>
                    </div>
                    <!-- End Promo Single Items -->
                    <!-- Start Promo Single Items -->
                    <div class="promo-single-items">
                      <div class="icon">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/skills.png" alt="">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/skills-gradient.png" alt="">
                        <div class="dot-icon-hover">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                      </div>
                      <div class="content">
                        <h4 class="title">Highly Skills</h4>
                        <p>There are many variations popular sheet containing available have version
                          software like available.
                        </p>
                      </div>
                    </div>
                    <!-- End Promo Single Items -->
                    <!-- Start Promo Single Items -->
                    <div class="promo-single-items">
                      <div class="icon">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/conversation.png" alt="">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/conversation-gradient.png" alt="">
                        <div class="dot-icon-hover">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                      </div>
                      <div class="content">
                        <h4 class="title">24/7 Support</h4>
                        <p>There are many variations popular sheet containing available have version
                          software like available.
                        </p>
                      </div>
                    </div>
                    <!-- End Promo Single Items -->
                    <!-- Start Promo Single Items -->
                    <div class="promo-single-items">
                      <div class="icon">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/budget.png" alt="">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/budget-gradient.png" alt="">
                        <div class="dot-icon-hover">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                      </div>
                      <div class="content">
                        <h4 class="title">Affordable Cost</h4>
                        <p>There are many variations popular sheet containing available have version
                          software like available.
                        </p>
                      </div>
                    </div>
                    <!-- End Promo Single Items -->
                    <!-- Start Promo Single Items -->
                    <div class="promo-single-items">
                      <div class="icon">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/puzzle.png" alt="">
                        <img src="<?=base_url()?>public/front/assets/images/icons/promo/puzzle-gradient.png" alt="">
                        <div class="dot-icon-hover">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                      </div>
                      <div class="content">
                        <h4 class="title">Right Solution</h4>
                        <p>There are many variations popular sheet containing available have version
                          software like available.
                        </p>
                      </div>
                    </div>
                    <!-- End Promo Single Items -->
                  </div>
                  <!-- End Promo Items -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ...::: End Promo Display Section :::... -->
      <!-- ...::: Start Service Display Section :::... -->
      <div class="service-dispaly-section section-inner-padding-150 service-dispaly-bg">
        <div class="box-wrapper">
          <div class="section-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-xl-6 offset-xl-3">
                  <div class="section-content section-content-gap-80 text-center">
                    <h6 class="section-tag tag-orange">Our Services</h6>
                    <h3 class="section-title">Provide awesome service for our customer</h3>
                    <span class="icon-seperator"><img
                      src="<?=base_url()?>public/front/assets/images/icons/section-seperator-shape.png" alt=""></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="service-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <!-- Start Service Slider -->
                  <div class="service-slider default-slider">
                    <!-- Slider main container -->
                    <div class="swiper-container">
                      <!-- Additional required wrapper -->
                      <div class="swiper-wrapper">
                        <!-- Slides -->
                        <!-- Start Service Single Items -->
                        <div class="service-single-item service-single-item-style-1 swiper-slide">
                          <div class="icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-1.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-1-hover.png" alt="">
                          </div>
                          <div class="content">
                            <h5 class="title"><a href="service-details.html">Web Development</a>
                            </h5>
                            <p>There are many variations of passages available have versions
                              suffered alteration.
                            </p>
                            <a class="text-btn" href="service-details.html">View Details
                            <span class="arrow-icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-blue.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                            </span></a>
                          </div>
                        </div>
                        <!-- End Service Single Items -->
                        <!-- Start Service Single Items -->
                        <div class="service-single-item service-single-item-style-1 swiper-slide">
                          <div class="icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-2.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-2-hover.png" alt="">
                          </div>
                          <div class="content">
                            <h5 class="title"><a href="service-details.html">Market Research</a>
                            </h5>
                            <p>There are many variations of passages available have versions
                              suffered alteration.
                            </p>
                            <a class="text-btn" href="service-details.html">View Details
                            <span class="arrow-icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-blue.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                            </span></a>
                          </div>
                        </div>
                        <!-- End Service Single Items -->
                        <!-- Start Service Single Items -->
                        <div class="service-single-item service-single-item-style-1 swiper-slide">
                          <div class="icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-1.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-1-hover.png" alt="">
                          </div>
                          <div class="content">
                            <h5 class="title"><a href="service-details.html">Creative
                              Solutions</a>
                            </h5>
                            <p>There are many variations of passages available have versions
                              suffered alteration.
                            </p>
                            <a class="text-btn" href="service-details.html">View Details
                            <span class="arrow-icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-blue.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                            </span></a>
                          </div>
                        </div>
                        <!-- End Service Single Items -->
                        <!-- Start Service Single Items -->
                        <div class="service-single-item service-single-item-style-1 swiper-slide">
                          <div class="icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-1.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-1-hover.png" alt="">
                          </div>
                          <div class="content">
                            <h5 class="title"><a href="service-details.html">Web Development</a>
                            </h5>
                            <p>There are many variations of passages available have versions
                              suffered alteration.
                            </p>
                            <a class="text-btn" href="service-details.html">View Details
                            <span class="arrow-icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-blue.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                            </span></a>
                          </div>
                        </div>
                        <!-- End Service Single Items -->
                        <!-- Start Service Single Items -->
                        <div class="service-single-item service-single-item-style-1 swiper-slide">
                          <div class="icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-2.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-2-hover.png" alt="">
                          </div>
                          <div class="content">
                            <h5 class="title"><a href="service-details.html">Market Research</a>
                            </h5>
                            <p>There are many variations of passages available have versions
                              suffered alteration.
                            </p>
                            <a class="text-btn" href="service-details.html">View Details
                            <span class="arrow-icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-blue.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                            </span></a>
                          </div>
                        </div>
                        <!-- End Service Single Items -->
                        <!-- Start Service Single Items -->
                        <div class="service-single-item service-single-item-style-1 swiper-slide">
                          <div class="icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-1.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/service/service-1-hover.png" alt="">
                          </div>
                          <div class="content">
                            <h5 class="title"><a href="service-details.html">Creative
                              Solutions</a>
                            </h5>
                            <p>There are many variations of passages available have versions
                              suffered alteration.
                            </p>
                            <a class="text-btn" href="service-details.html">View Details
                            <span class="arrow-icon">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-blue.png" alt="">
                            <img src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                            </span></a>
                          </div>
                        </div>
                        <!-- End Service Single Items -->
                      </div>
                    </div>
                    <!-- Navigation buttons -->
                    <div class="default-slider-buttons">
                      <div class="slider-button button-prev"><i class="icofont-long-arrow-left"></i></div>
                      <div class="slider-button button-next"><i class="icofont-long-arrow-right"></i></div>
                    </div>
                  </div>
                  <!-- End Service Slider -->
                  <div class="d-flex justify-content-center">
                    <a href="service-list.html" class="btn btn-lg btn-default-outline btn-section-bottom">Other’s Service</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ...::: End Service Display Section :::... -->
      <!-- ...::: Start Content Display Section :::... -->
      <div class="content-display-section section-top-gap-150">
        <div class="box-wrapper custom-box-wrapper pos-relative">
          <div class="content-inner-img content-inner-img-left">
            <img class="img-fluid" src="<?=base_url()?>public/front/assets/images/section-image/section-image-1.png" alt="">
          </div>
          <div class="section-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-12 pos-relative">
                  <div class="custom-section-content custom-section-content-right">
                    <div class="section-content section-content-gap-50">
                      <h6 class="section-tag tag-blue">Why Choose Us</h6>
                      <h3 class="section-title">Increase business profit with strane agency.</h3>
                    </div>
                    <p>There are many variations passages available
                      sheets but majority have versions have years suffereds
                      alteration some form humour.
                    </p>
                    <ul class="content-lists">
                      <li><i class="icofont-check"></i> Secure & private</li>
                      <li><i class="icofont-check"></i> Right Solution</li>
                      <li><i class="icofont-check"></i> Highly Skills</li>
                      <li><i class="icofont-check"></i> Client’s Support</li>
                    </ul>
                    <a href="contact.html" class="btn btn-lg btn-default icon-right">Get Started <i
                      class="icofont-double-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ...::: End Content Display Section :::... -->
      <!-- ...::: Start Content Display Section :::... -->
      <div class="content-display-section  section-top-gap-150 section-fluid-200">
        <div class="box-wrapper custom-box-wrapper pos-relative">
          <div class="content-inner-img content-inner-img-right">
            <img class="img-fluid" src="<?=base_url()?>public/front/assets/images/section-image/section-image-2.png" alt="">
          </div>
          <div class="section-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-12 pos-relative">
                  <div class="custom-section-content custom-section-content-left">
                    <div class="section-content section-content-gap-50 ">
                      <h6 class="section-tag tag-orange">Client’s Support</h6>
                      <h3 class="section-title">You can get 100% support from our help desk.</h3>
                    </div>
                    <p>There are many variations passages available
                      sheets but majority have versions have year suffered
                      alteration some form humour.
                    </p>
                    <p>There are many variations passages available
                      sheets but majority have versions have year suffered
                    </p>
                    <a href="contact.html" class="btn btn-lg btn-default icon-right">Get Started <i
                      class="icofont-double-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ...::: End Content Display Section :::... -->
      <!-- ...::: Start Project Display Section :::... -->
      <div class="project-display-section section-inner-padding-150 section-top-gap-150 project-dispaly-bg">
        <div class="box-wrapper">
          <div class="section-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-xl-6 offset-xl-3">
                  <div class="section-content section-content-gap-80 text-center">
                    <h6 class="section-tag tag-orange">Complete Work</h6>
                    <h3 class="section-title">Complete work for client latest work here</h3>
                    <span class="icon-seperator"><img
                      src="<?=base_url()?>public/front/assets/images/icons/section-seperator-shape.png" alt=""></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="project-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="project-item">
                    <div class="row mb-n25">
                      <!-- Start Project Single Item -->
                      <div class="col-xl-6 col-md-6 mb-25">
                        <a href="portfolio-details.html" class="project-single-item">
                          <div class="image img-responsive"><img src="<?=base_url()?>public/front/assets/images/projects/project-wide-1.jpg" alt=""></div>
                          <div class="content">
                            <div class="inner">
                              <div class="text">
                                <h4 class="title">Brand Identity</h4>
                                <span class="catagory">Brand, Product</span>
                              </div>
                              <div class="icon"><img class="img-fluid" src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <!-- End Project Single Item -->
                      <!-- Start Project Single Item -->
                      <div class="col-xl-6 col-md-6 mb-25">
                        <a href="portfolio-details.html" class="project-single-item">
                          <div class="image img-responsive"><img src="<?=base_url()?>public/front/assets/images/projects/project-wide-2.jpg" alt=""></div>
                          <div class="content">
                            <div class="inner">
                              <div class="text">
                                <h4 class="title">Brand Identity</h4>
                                <span class="catagory">Brand, Product</span>
                              </div>
                              <div class="icon"><img class="img-fluid" src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <!-- End Project Single Item -->
                      <!-- Start Project Single Item -->
                      <div class="col-xl-4 col-md-6 mb-25">
                        <a href="portfolio-details.html" class="project-single-item">
                          <div class="image img-responsive"><img src="<?=base_url()?>public/front/assets/images/projects/project-square-1.jpg" alt=""></div>
                          <div class="content">
                            <div class="inner">
                              <div class="text">
                                <h4 class="title">Brand Identity</h4>
                                <span class="catagory">Brand, Product</span>
                              </div>
                              <div class="icon"><img class="img-fluid" src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <!-- End Project Single Item -->
                      <!-- Start Project Single Item -->
                      <div class="col-xl-4 col-md-6 mb-25">
                        <a href="portfolio-details.html" class="project-single-item">
                          <div class="image img-responsive"><img src="<?=base_url()?>public/front/assets/images/projects/project-square-2.jpg" alt=""></div>
                          <div class="content">
                            <div class="inner">
                              <div class="text">
                                <h4 class="title">Brand Identity</h4>
                                <span class="catagory">Brand, Product</span>
                              </div>
                              <div class="icon"><img class="img-fluid" src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <!-- End Project Single Item -->
                      <!-- Start Project Single Item -->
                      <div class="col-xl-4 col-md-6 mb-25">
                        <a href="portfolio-details.html" class="project-single-item">
                          <div class="image img-responsive"><img src="<?=base_url()?>public/front/assets/images/projects/project-square-3.jpg" alt=""></div>
                          <div class="content">
                            <div class="inner">
                              <div class="text">
                                <h4 class="title">Brand Identity</h4>
                                <span class="catagory">Brand, Product</span>
                              </div>
                              <div class="icon"><img class="img-fluid" src="<?=base_url()?>public/front/assets/images/icons/right-arrow-white.png" alt="">
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <!-- End Project Single Item -->
                    </div>
                    <div class="d-flex justify-content-center">
                      <a href="portfolio-list.html" class="btn btn-lg btn-default btn-section-bottom">Other’s
                      Project</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ...::: End Project Display Section :::... -->
      <!-- ...::: Start Company Logo Display Section :::... -->
      <div class="company-logo-display-section section-fluid-135 company-logo-border">
        <div class="box-wrapper">
          <div class="company-logo-wrapper">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <!-- Start Company Logo Slider -->
                  <div class="company-logo-slider">
                    <!-- Slider main container -->
                    <div class="swiper-container">
                      <!-- Additional required wrapper -->
                      <div class="swiper-wrapper">
                        <!-- Slides -->
                        <!-- Start Company Logo Single Item -->
                        <div class="company-logo-single-item swiper-slide">
                          <a href="#" class="image"><img src="<?=base_url()?>public/front/assets/images/company-logo/company-logo-1.png" alt=""></a>
                        </div>
                        <!-- End Company Logo Single Item -->
                        <!-- Start Company Logo Single Item -->
                        <div class="company-logo-single-item swiper-slide">
                          <a href="#" class="image"><img src="<?=base_url()?>public/front/assets/images/company-logo/company-logo-2.png" alt=""></a>
                        </div>
                        <!-- End Company Logo Single Item -->
                        <!-- Start Company Logo Single Item -->
                        <div class="company-logo-single-item swiper-slide">
                          <a href="#" class="image"><img src="<?=base_url()?>public/front/assets/images/company-logo/company-logo-3.png" alt=""></a>
                        </div>
                        <!-- End Company Logo Single Item -->
                        <!-- Start Company Logo Single Item -->
                        <div class="company-logo-single-item swiper-slide">
                          <a href="#" class="image"><img src="<?=base_url()?>public/front/assets/images/company-logo/company-logo-4.png" alt=""></a>
                        </div>
                        <!-- End Company Logo Single Item -->
                        <!-- Start Company Logo Single Item -->
                        <div class="company-logo-single-item swiper-slide">
                          <a href="#" class="image"><img src="<?=base_url()?>public/front/assets/images/company-logo/company-logo-5.png" alt=""></a>
                        </div>
                        <!-- End Company Logo Single Item -->
                      </div>
                    </div>
                  </div>
                  <!-- End Company Logo Slider -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ...::: End Company Logo Display Section :::... -->
      <!-- ...::: Start Testimonial Display Section :::... -->
      <div class="testimonial-display-section section-top-gap-150">
        <div class="box-wrapper">
          <div class="section-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-xl-8 offset-xl-2">
                  <div class="section-content section-content-gap-80 text-center">
                    <h6 class="section-tag tag-blue">Client Feedback</h6>
                    <h3 class="section-title">This is some of strane honorable
                      customer feedback.
                    </h3>
                    <span class="icon-seperator"><img
                      src="<?=base_url()?>public/front/assets/images/icons/section-seperator-shape.png" alt=""></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonial-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <!-- Start Testimonial Slider - Content -->
                  <div class="testimonial-content-slider">
                    <div class="swiper-container">
                      <div class="swiper-wrapper">
                        <!-- Start Testimonial Single Content Item-->
                        <div class="testimonial-single-content-item swiper-slide">
                          <p>There are many variations of passages of available
                            majority have suffered alteration in some form by injected humour
                            and randomised words which don't look evening believable
                            are going to use passage.
                          </p>
                          <ul class="review-star">
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="blank"><i class="icofont-star"></i></li>
                          </ul>
                        </div>
                        <!-- End Testimonial Single Content Item -->
                        <!-- Start Testimonial Single Content Item-->
                        <div class="testimonial-single-content-item swiper-slide">
                          <p>There are many variations of passages of available
                            majority have suffered alteration in some form by injected humour
                            and randomised words which don't look evening believable
                            are going to use passage.
                          </p>
                          <ul class="review-star">
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="blank"><i class="icofont-star"></i></li>
                          </ul>
                        </div>
                        <!-- End Testimonial Single Content Item -->
                        <!-- Start Testimonial Single Content Item-->
                        <div class="testimonial-single-content-item swiper-slide">
                          <p>There are many variations of passages of available
                            majority have suffered alteration in some form by injected humour
                            and randomised words which don't look evening believable
                            are going to use passage.
                          </p>
                          <ul class="review-star">
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="fill"><i class="icofont-star"></i></li>
                            <li class="blank"><i class="icofont-star"></i></li>
                          </ul>
                        </div>
                        <!-- End Testimonial Single Content Item -->
                      </div>
                    </div>
                  </div>
                  <!-- End Testimonial Slider - Content -->
                  <!-- Start Testimonial Slider - Thumbnail -->
                  <div class="testimonial-thumb-slider">
                    <div class="swiper-container">
                      <div class="swiper-wrapper">
                        <!-- Start Testimonial Single Thumb Item -->
                        <div class="testimonilal-single-thumb-item swiper-slide">
                          <div class="image">
                            <img src="<?=base_url()?>public/front/assets/images/user/testimonial-user-1.jpg" alt="">
                          </div>
                          <div class="content">
                            <h4 class="name">Melvina Bolton</h4>
                            <p><span class="profession">Founder</span><span
                              class="company-name">Pixelz Studio</span></p>
                          </div>
                        </div>
                        <!-- End Testimonial Single Thumb Item-->
                        <!-- Start Testimonial Single Thumb Item -->
                        <div class="testimonilal-single-thumb-item swiper-slide">
                          <div class="image">
                            <img src="<?=base_url()?>public/front/assets/images/user/testimonial-user-2.jpg" alt="">
                          </div>
                          <div class="content">
                            <h4 class="name">Melvina Bolton</h4>
                            <p><span class="profession">Founder</span><span
                              class="company-name">Pixelz Studio</span></p>
                          </div>
                        </div>
                        <!-- End Testimonial Single Thumb Item-->
                        <!-- Start Testimonial Single Thumb Item -->
                        <div class="testimonilal-single-thumb-item swiper-slide">
                          <div class="image">
                            <img src="<?=base_url()?>public/front/assets/images/user/testimonial-user-3.jpg" alt="">
                          </div>
                          <div class="content">
                            <h4 class="name">Melvina Bolton</h4>
                            <p><span class="profession">Founder</span><span
                              class="company-name">Pixelz Studio</span></p>
                          </div>
                        </div>
                        <!-- End Testimonial Single Thumb Item-->
                      </div>
                    </div>
                  </div>
                  <!-- ENd Testimonial Slider - Thumbnail -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ...::: End Testimonial Display Section :::... -->
      </div>
      <!-- ...::: End Testimonial Display Section :::... -->
      <!-- ...::: Start Blog Feed Section :::... -->
      <div class="blog-feed-display-section section-inner-padding-150 section-top-gap-150 blog-feed-dispaly-bg">
        <div class="box-wrapper">
          <div class="section-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-xl-7">
                  <div class="section-content section-content-gap-80">
                    <h6 class="section-tag tag-blue">Latest News</h6>
                    <h3 class="section-title">Check popular startup related
                      article from news feed.
                    </h3>
                    <span class="icon-seperator"><img
                      src="<?=base_url()?>public/front/assets/images/icons/section-seperator-shape.png" alt=""></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="blgo-feed-slider">
            <div class="container">
              <div class="row">
                <div class="col-12 pos-relative">
                  <!-- Start Blog Feed Slider -->
                  <div class="blog-feed-slider blog-feed-slider-style-1 default-slider">
                    <!-- Slider main container -->
                    <div class="swiper-container">
                      <!-- Additional required wrapper -->
                      <div class="swiper-wrapper">
                        <!-- Slides -->
                        <!-- Start Blog List Single Item -->
                        <div class="blog-list-single-item swiper-slide">
                          <a href="blog-details-full-width.html" class="image"><img src="<?=base_url()?>public/front/assets/images/blog/blog-list/blog-list-single-item-img-1.jpg" alt=""></a>
                          <div class="content">
                            <span class="author">By<a href="#">Walter Houston</a></span>
                            <h5 class="title"><a href="blog-details-full-width.html">With WooLentor's drag-and drop
                              interface for creating...</a>
                            </h5>
                            <div class="post-info">
                              <span>03 April, 2021</span>
                              <span>10 min read</span>
                            </div>
                          </div>
                        </div>
                        <!-- End Blog List Single Item -->
                        <!-- Start Blog List Single Item -->
                        <div class="blog-list-single-item swiper-slide">
                          <a href="blog-details-full-width.html" class="image"><img src="<?=base_url()?>public/front/assets/images/blog/blog-list/blog-list-single-item-img-2.jpg" alt=""></a>
                          <div class="content">
                            <span class="author">By<a href="#">Walter Houston</a></span>
                            <h5 class="title"><a href="blog-details-full-width.html">Make your store stand out from
                              the others by converting.</a>
                            </h5>
                            <div class="post-info">
                              <span>03 April, 2021</span>
                              <span>10 min read</span>
                            </div>
                          </div>
                        </div>
                        <!-- End Blog List Single Item -->
                        <!-- Start Blog List Single Item -->
                        <div class="blog-list-single-item swiper-slide">
                          <a href="blog-details-full-width.html" class="image"><img src="<?=base_url()?>public/front/assets/images/blog/blog-list/blog-list-single-item-img-3.jpg" alt=""></a>
                          <div class="content">
                            <span class="author">By<a href="#">Walter Houston</a></span>
                            <h5 class="title"><a href="blog-details-full-width.html">All of these amazing features come at an affordable price.</a></h5>
                            <div class="post-info">
                              <span>03 April, 2021</span>
                              <span>10 min read</span>
                            </div>
                          </div>
                        </div>
                        <!-- End Blog List Single Item -->
                      </div>
                    </div>
                    <!-- Navigation buttons -->
                    <div class="default-slider-buttons">
                      <div class="slider-button button-prev"><i class="icofont-long-arrow-left"></i></div>
                      <div class="slider-button button-next"><i class="icofont-long-arrow-right"></i></div>
                    </div>
                  </div>
                  <!-- End Blog Feed Slider -->
                  <!-- Start Subscribe Banner -->
                  <div class="subscribe-banner subscribe-banner-overflow section-top-gap-150 section-fluid-100">
                    <div class="row justify-content-between align-items-center">
                      <div class="col-lg-8 col-xl-8">
                        <div class="content">
                          <h6 class="big-text">Stay connect with us, get daily & weekly update.</h6>
                        </div>
                      </div>
                      <div class="col-auto">
                        <a href="contact.html" class="btn btn-lg btn-default icon-right">Subscribe Now <i class="icofont-double-right"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- End Subscribe Banner -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ...::: End Blog Feed Section :::... -->
      <!-- ...::: Start Footer Section :::... -->
      <footer class="footer-section section-top-gap-0">
        <div class="box-wrapper">
          <!-- Start Footer Top -->
          <div class="footer-top footer-top-style-1">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="footer-top-box">
                    <div class="footer-top-left">
                      <!-- Start Footer Single Widget - About -->
                      <div class="footer-single-widget footer-about">
                        <a href="index.html" class="footer-logo">
                        <img src="<?=base_url()?>public/front/assets/images/logo/logo-dark.png" alt="">
                        </a>
                        <p>There are many variation popular sheet
                          containing available have version software
                          like available.
                        </p>
                        <address>Your address goes here.</address>
                      </div>
                      <!-- End Footer Single Widget - About-->
                    </div>
                    <div class="footer-top-right">
                      <!-- Start Footer Single Widget - Footer Menu -->
                      <div class="footer-single-widget footer-menu">
                        <h5 class="footer-title">Company</h5>
                        <ul class="footer-nav">
                          <li><a href="about.html">About Us</a></li>
                          <li><a href="contact.html">Contact Us</a></li>
                          <li><a href="#">Print Ads</a></li>
                          <li><a href="faq.html">FAQ’s</a></li>
                          <li><a href="#">Careers</a></li>
                        </ul>
                      </div>
                      <!-- End Footer Single Widget - Footer Menu-->
                      <!-- Start Footer Single Widget - Footer Menu -->
                      <div class="footer-single-widget footer-menu">
                        <h5 class="footer-title">Quick Links</h5>
                        <ul class="footer-nav">
                          <li><a href="#">Privacy Policy</a></li>
                          <li><a href="#">Discussion</a></li>
                          <li><a href="#">Terms & Conditions</a></li>
                          <li><a href="#"> Customer Support</a></li>
                          <li><a href="#">Course FAQ’s</a></li>
                        </ul>
                      </div>
                      <!-- End Footer Single Widget - Footer Menu-->
                      <!-- Start Footer Single Widget - Footer Menu -->
                      <div class="footer-single-widget footer-menu">
                        <h5 class="footer-title">Product</h5>
                        <ul class="footer-nav">
                          <li><a href="#">Presentation</a></li>
                          <li><a href="#">E-Books</a></li>
                          <li><a href="#">Management Tool</a></li>
                          <li><a href="#">Dashboard</a></li>
                          <li><a href="#">Event Organizer</a></li>
                        </ul>
                      </div>
                      <!-- End Footer Single Widget - Footer Menu-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Footer Top -->
          <!-- Start Footer Bottom -->
          <div class="footer-bottom">
            <div class="container">
              <div class="row justify-content-center justify-content-md-between align-items-center">
                <div class="col-auto">
                  <p class="copytight-text">&copy; 2021 Strane. Made with <i class="icofont-heart"></i> by <a href="https://hasthemes.com/" target="_blank" rel="noopener noreferrer">HasThemes</a></p>
                </div>
                <div class="col-auto">
                  <ul class="footer-bottom-link">
                    <li> <a href="#">Terms of Service </a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Sitemap</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- End Footer Bottom -->
        </div>
      </footer>
      <!-- ...::: End Footer Section :::... -->
      <!-- material-scrolltop button -->
      <button class="material-scrolltop" type="button"></button>
    </main>
    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor -->
    <script src="<?=base_url()?>public/front/assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="<?=base_url()?>public/front/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="<?=base_url()?>public/front/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="<?=base_url()?>public/front/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>public/front/assets/js/vendor/jquery-ui.min.js"></script>
    <!--Plugins JS-->
    <script src="<?=base_url()?>public/front/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="<?=base_url()?>public/front/assets/js/plugins/jquery.waypoints.js"></script>
    <script src="<?=base_url()?>public/front/assets/js/plugins/counter.js"></script>
    <script src="<?=base_url()?>public/front/assets/js/plugins/images-loaded.min.js"></script>
    <script src="<?=base_url()?>public/front/assets/js/plugins/isotope.pkgd.min.js"></script>
    <script src="<?=base_url()?>public/front/assets/js/plugins/ajax-mail.js"></script>
    <script src="<?=base_url()?>public/front/assets/js/plugins/material-scrolltop.js"></script>
    <!--Main JS (Common Activation Codes)-->
    <script src="<?=base_url()?>public/front/assets/js/main.js"></script>
  </body>
  </html>