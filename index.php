<?php 
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
	<title>LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.0.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-custom-color-1 u-header u-header" id="sec-c525"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 500;">
            <a class="u-button-style u-custom-active-color u-custom-border u-custom-border-color u-custom-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-2 u-unstyled u-nav-1">
              <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" href="Home.php" style="padding: 18px 24px;">Home</a></li>
              <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" href="lobby.php" style="padding: 18px 24px;">Room</a></li>
              <li class="u-nav-item"><a class="u-active-palette-1-light-1 u-button-style u-hover-palette-1-light-1 u-nav-link u-text-active-black u-text-grey-90 u-text-hover-white" style="padding: 18px 24px;">Account</a>
          <div class="u-nav-popup">
            <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
              <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="index.php">Login</a>
            </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="signup.php">Register</a>
            </li></ul>
            </div>
            </li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.php">Home</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="lobby.php">Room</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="UserInfo.php">Account</a><div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Login</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="signup.php">Register</a>
                </li></ul>
                </div>
                </li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <img class="u-image u-image-contain u-image-default u-image-1" src="images/Logo_White.png" alt="" data-image-width="3200" data-image-height="2500">
      </div></header>
<body>
     
     <section class="u-clearfix u-section-1 u-border-0" id="sec-520a">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="custom-expanded data-layout-selected u-clearfix u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout" style="">
            <div class="u-layout-row" style="">
              <div class="u-container-style u-layout-cell u-right-cell u-size-60 u-size-xs-60 u-white u-layout-cell-1" src="">
                <div class="u-container-layout u-container-layout-1">
                <form action="login.php" method="post">
                  <h2 class="u-align-center u-text u-text-default u-text-1">LOGIN</h2>
                  <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                  <?php } ?>
                  <label class="u-align-center u-text u-text-default u-text-1">User Name</label>
                  <input class="u-align-center u-text u-text-default u-text-1" type="text" name="uname" placeholder="User Name"><br>
                  <label class="u-align-center u-text u-text-default u-text-1">Password</label>
                  <input class="u-align-center u-text u-text-default u-text-1" type="password" name="password" placeholder="Password"><br>
                  <button class="u-align-center u-text u-text-default u-text-1" type="submit">Login</button><br>
                  <a class="u-align-center u-text u-text-default u-text-1" href="signup.php" class="ca">Create an account</a>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
</html>