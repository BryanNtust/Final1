<?php 
session_start();
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <title>Home</title>
      <link rel="stylesheet" href="nicepage.css" media="screen">
      <link rel="stylesheet" href="Home.css" media="screen">
      <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
      <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
      <meta name="generator" content="Nicepage 6.0.3, nicepage.com">
      <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
      <script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": ""
        }
      </script>
      <meta name="theme-color" content="#478ac9">
      <meta property="og:title" content="Home">
      <meta property="og:type" content="website">
      <meta data-intl-tel-input-cdn-path="intlTelInput/">
    </head>
    <body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="en">
      <header class="u-clearfix u-custom-color-1 u-header u-header" id="sec-c525">
        <div class="u-clearfix u-sheet u-sheet-1">
          <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 500;">
            <a class="u-button-style u-custom-active-color u-custom-border u-custom-border-color u-custom-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
              </svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <rect y="1" width="16" height="2"></rect>
                  <rect y="7" width="16" height="2"></rect>
                  <rect y="13" width="16" height="2"></rect>
                </g>
              </svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-2 u-unstyled u-nav-1">
              <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" href="Home.php" style="padding: 18px 24px;">Home</a></li>
              <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" href="lobby.php" style="padding: 18px 24px;">Room</a></li>
              <?php 
                if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
              ?>
                <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" style="padding: 18px 24px;" href="UserInfo.php">Account</a>
                  <div class="u-nav-popup">
                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                      <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="index.php">Logout</a></li>
                    </ul>
                  </div>
                </li>
              <?php }else{ ?>
                <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" style="padding: 18px 24px;">Account</a>
                  <div class="u-nav-popup">
                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                      <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="index.php">Login</a></li>
                      <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="signup.php">Register</a></li>
                    </ul>
                  </div>
                </li>
              <?php }?>
            </ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
              <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                <div class="u-inner-container-layout u-sidenav-overflow">
                  <div class="u-menu-close"></div>
                  <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Home</a></li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="lobby.php">Room</a></li>
                    <?php if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { ?>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="UserInfo.php">Account</a></li>
                      <div class="u-nav-popup">
                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                          <li class="u-nav-item"><a class="u-button-style u-nav-link">Logout</a></li>
                        </ul>
                      </div>
                    <?php }else{?>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link">Account</a>
                      <div class="u-nav-popup">
                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                          <li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Login</a></li>
                          <li class="u-nav-item"><a class="u-button-style u-nav-link" href="signup.php">Register</a></li>
                        </ul>
                      </div>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
              <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
          </nav>
          <img class="u-image u-image-contain u-image-default u-image-1" src="images/Logo_White.png" alt="" data-image-width="3200" data-image-height="2500">
        </div>
      </header>
     
      <section class="u-clearfix u-white u-section-1" id="sec-1373">
        <div class="u-clearfix u-sheet u-sheet-1">
          <p class="u-text u-text-1">Welcome, a streaming platform created by 3 Programmer</p>
          <div class="u-carousel u-gallery u-gallery-slider u-layout-carousel u-lightbox u-no-transition u-show-text-on-hover u-gallery-1" id="carousel-3de1" data-interval="5000" data-u-ride="carousel">
            <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">
              <li data-u-target="#carousel-3de1" data-u-slide-to="0" class="u-active u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
              <li data-u-target="#carousel-3de1" data-u-slide-to="1" class="u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
            </ol>
            <div class="u-carousel-inner u-gallery-inner" role="listbox">
              <div class="u-active u-border-5 u-border-grey-75 u-carousel-item u-effect-fade u-effect-hover-zoom u-gallery-item u-shape-rectangle u-carousel-item-1">
                <div class="u-back-slide" data-image-width="1772" data-image-height="1342">
                  <img class="u-back-image u-expanded" src="images/Gallery.png">
                </div>
                <div class="u-align-center u-over-slide u-shading u-valign-bottom u-over-slide-1">
                  <h3 class="u-gallery-heading">Our Logo</h3>
                  <p class="u-gallery-text">For more details</p>
                </div>
              </div>
              <div class="u-border-5 u-border-grey-75 u-carousel-item u-effect-fade u-effect-hover-zoom u-gallery-item u-shape-rectangle u-carousel-item-2">
                <div class="u-back-slide" data-image-width="945" data-image-height="472">
                  <img class="u-back-image u-expanded" src="images/Gallery22.jpg">
                </div>
                <div class="u-align-center u-over-slide u-shading u-valign-bottom u-over-slide-2">
                  <h3 class="u-gallery-heading">Our Motto</h3>
                  <p class="u-gallery-text">Stop Dreaming,Start Streaming</p>
                </div>
              </div>
            </div>
            <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-1" href="#carousel-3de1" role="button" data-u-slide="prev">
              <span aria-hidden="true">
                <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
  c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
  c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
              </span>
              <span class="sr-only">
                <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
  c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
  c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
              </span>
            </a>
            <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-2" href="#carousel-3de1" role="button" data-u-slide="next">
              <span aria-hidden="true">
                <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
  L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
  c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
              </span>
              <span class="sr-only">
                <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
  L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
  c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
              </span>
            </a>
          </div>
          <a href="lobby.php" class="u-border-none u-btn u-btn-round u-button-style u-custom-color-1 u-hover-palette-2-base u-radius u-btn-1"> START Streaming</a>
        </div>
      </section>
      
      
      
      <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-8810"><div class="u-clearfix u-sheet u-sheet-1">
          <p class="u-small-text u-text u-text-variant u-text-1"> Azure Student Corp.</p>
        </div></footer>
      <section class="u-backlink u-clearfix u-grey-80">
      </section>
    </body>
<script>
  
</script>
</html>