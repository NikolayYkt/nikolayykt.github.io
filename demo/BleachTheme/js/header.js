function Header_Title(a,i){
  b = 'single.html';
  c = 'single-2.html'
  document.write('<meta charset="UTF-8">');
  document.write('<meta name="viewport" content="width=device-width, initial-scale=1">');
  document.write('<link rel="profile" href="https://gmpg.org/xfn/11">');
  document.write("<link rel='stylesheet' id='wp-block-library-css'  href='wp-includes/css/dist/block-library/style.min.css?ver=5.8.1' media='all' />");
  document.write("<link rel='stylesheet' id='bleach-carousel-css'  href='wp-content/themes/bleach/assets/plugins/OwlCarousel/css/owl.carousel.min.css?ver=1' media='all' />");
  document.write("<link rel='stylesheet' id='bleach-simplebar-css'  href='wp-content/themes/bleach/assets/plugins/simplebar/css/simplebar.css?ver=1' media='all' />");
  document.write("<link rel='stylesheet' id='bleach-scrollbar-css'  href='wp-content/themes/bleach/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css?ver=1' media='all' />");
  document.write("<link rel='stylesheet' id='bleach-metisMenu-css'  href='wp-content/themes/bleach/assets/plugins/metismenu/css/metisMenu.min.css?ver=1' media='all' />");
  document.write("<link rel='stylesheet' id='bleach-pace-css'  href='wp-content/themes/bleach/assets/css/pace.min.css?ver=1' media='all' />");
  document.write("<link rel='stylesheet' id='bleach-bootstrap-css'  href='wp-content/themes/bleach/assets/css/bootstrap.min.css?ver=1' media='all' />");
  document.write("<link rel='stylesheet' id='bleach-fonts.google-css'  href='https://fonts.googleapis.com/css2?family=Roboto%3Awght%40400%3B500&#038;display=swap&#038;ver=1' media='all' />");
  document.write("<link rel='stylesheet' id='bleach-app-css'  href='wp-content/themes/bleach/assets/css/app.css?ver=1' media='all' />");
  document.write("<link rel='stylesheet' id='bleach-icon-css'  href='wp-content/themes/bleach/assets/css/icons.css?ver=1' media='all' />");
  document.write("<link rel='stylesheet' id='bleach-style-css'  href='wp-content/themes/bleach/style.css?ver=1.0.0' media='all' />");
  document.write("<script src='wp-includes/js/jquery/jquery.min.js?ver=3.6.0' id='jquery-core-js'></script>");
  document.write("<script src='wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>");
  document.write("<meta name='robots' content='noindex, nofollow' />");
  document.write("<link rel='dns-prefetch' href='//fonts.googleapis.com' />");
  document.write("<link rel='dns-prefetch' href='//s.w.org' />");
  document.write('<link rel="alternate" type="application/rss+xml" title="Тема Блич &raquo; Лента" href="feed/" />');
  document.write('<link rel="alternate" type="application/rss+xml" title="Тема Блич &raquo; Лента комментариев" href="comments/feed/" />');
  document.write("<style>");
  document.write("img.wp-smiley,");
  document.write("img.emoji {");
  document.write("display: inline !important;");
  document.write("border: none !important;");
  document.write("box-shadow: none !important;");
  document.write("height: 1em !important;");
  document.write("width: 1em !important;");
  document.write("margin: 0 .07em !important;");
  document.write("vertical-align: -0.1em !important;");
  document.write("background: none !important;");
  document.write("padding: 0 !important;");
  document.write("}");
  document.write("</style>");
  document.write('<link rel="https://api.w.org/" href="wp-json/" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc.php?rsd" />');
  document.write('<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" /> ');
  document.write('<meta name="generator" content="WordPress 5.8.1" />  ');
  document.write('<title>'+a+' &#8212; '+i+'</title>');
}


function Header(){
     document.write('<b class="screen-overlay"></b>');
     document.write('<div class="wrapper">');
     document.write('<!--start top header wrapper-->');
     document.write('<div class="header-wrapper bg-dark-1">');
       document.write('<div class="header-content pb-3 pb-md-0">');
         document.write('<div class="container">');
           document.write('<div class="row align-items-center">');
             document.write('<div class="col col-md-auto">');
              document.write(' <div class="d-flex align-items-center">');
                document.write(' <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class="bx bx-menu"></i>');
                document.write(' </div>');
                document.write(' <div class="logo d-none d-lg-flex">');

                 document.write('  <a href="index.html">');
                                        document.write(' <img src="wp-content/uploads/2021/09/logo-bleach.png" class="logo-icon" alt="" />');
                  document.write(' </a>');
              document.write('   </div>');
           document.write('    </div>');
           document.write('  </div>');
           document.write('  <div class="col-12 col-md order-4 order-md-2 d-none d-sm-block d-sm-none d-md-block">');
              document.write(' <div class="input-group flex-nowrap px-xl-4">');
 document.write('<form role="search" method="get" id="searchform" action="" >');
  document.write(' <div class="item-forms">');
  document.write(' <input type="text"  class="form-control w-100" placeholder="Поиск по сайту" value="" name="s" id="s" />');
   document.write('</div>');
    document.write(' <div class="item-forms">');
  document.write(' <button class="input-group-text cursor-pointer" type="submit" id="searchsubmit" value="найти"><i class="bx bx-search"></i></button>');
 document.write('</form>');
 document.write('</div>');

              document.write(' </div>');
            document.write(' </div>');
            document.write('<div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">');
              document.write('<div class="fs-1 text-white"><i class="bx bx-headphone"></i>');
             document.write(' </div>');
             document.write(' <div class="ms-2">');
                document.write('<p class="mb-0 font-13">Тема Блич</p>');
              document.write('  <h5 class="mb-0">Еще один сайт на Wordpress</h5>');
              document.write('</div>');
          document.write('  </div>');
           document.write(' <div class="col col-md-auto order-2 order-md-4">');
             document.write(' <div class="top-cart-icons">');
               document.write(' <nav class="navbar navbar-expand">');
                document.write('  <ul class="navbar-nav ms-auto">');
                 document.write('   <li class="nav-item"><a href="wp-login.php?action=register" class="nav-link cart-link"><i class="bx bx-user"></i></a>');
                  document.write('  </li>');
                  document.write('  <li class="nav-item"><a href="javascript:;" class="nav-link cart-link"><i class="bx bx-heart"></i></a>');
                  document.write('  </li>');
                  document.write('</ul>');
              document.write('  </nav>');
            document.write('  </div>');
          document.write('  </div>');
         document.write(' </div>');
       document.write('   <!--end row-->');
       document.write(' </div>');
     document.write(' </div>');

      document.write(' <div class="primary-menu border-top">');
        document.write(' <div class="container">');



 document.write('<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">');
           document.write('  <div class="offcanvas-header">');
            document.write('   <button class="btn-close float-end"></button>');
            document.write('   <h5 class="py-2 text-white">Навигация</h5>');
           document.write('  </div>');

           document.write('  <ul id="menu-%d0%b3%d0%bb%d0%b0%d0%b2%d0%bd%d0%be%d0%b5-%d0%bc%d0%b5%d0%bd%d1%8e" class="navbar-nav me-auto mb-2 mb-md-0 "><li  id="menu-item-19" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item nav-item nav-item-19"><a href="index.html" class="nav-link active">Главная</a></li>');
 document.write('<li  id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-11"><a href="my-account/" class="nav-link ">Герои</a></li>');
 document.write('<li  id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-12"><a href="checkout/" class="nav-link ">Музыка</a></li>');
 document.write('<li  id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-13"><a href="cart/" class="nav-link ">О нас</a></li>');
 document.write('<li  id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-14"><a href="shop/" class="nav-link ">Контакты</a></li>');
 document.write('<li  id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown nav-item nav-item-15"><a href="sample-page/" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Выпадающее меню</a>');
 document.write('<ul class="dropdown-menu  depth_0">');
  document.write(' <li  id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-23"><a href="%d0%bf%d1%80%d0%b8%d0%bc%d0%b5%d1%80-%d1%81%d1%82%d1%80%d0%b0%d0%bd%d0%b8%d1%86%d1%8b/" class="dropdown-item ">Пример страницы</a></li>');
  document.write(' <li  id="menu-item-156" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-156"><a href="my-account/" class="dropdown-item ">Герои</a></li>');
  document.write(' <li  id="menu-item-157" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-157"><a href="checkout/" class="dropdown-item ">Музыка</a></li>');
   document.write('<li  id="menu-item-158" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-158"><a href="cart/" class="dropdown-item ">О нас</a></li>');
   document.write('<li  id="menu-item-159" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-159"><a href="shop/" class="dropdown-item ">Контакты</a></li>');
   document.write('<li  id="menu-item-160" class="menu-item menu-item-type-post_type menu-item-object-post nav-item nav-item-160"><a href="'+b+'" class="dropdown-item ">Привет мир!</a></li>');
   document.write('<li  id="menu-item-161" class="menu-item menu-item-type-post_type menu-item-object-post nav-item nav-item-161"><a href="'+c+'" class="dropdown-item ">Куросаки Ичиго</a></li>');
  document.write(' <li  id="menu-item-162" class="menu-item menu-item-type-taxonomy menu-item-object-category nav-item nav-item-162"><a href="category/%d0%b1%d0%b5%d0%b7-%d1%80%d1%83%d0%b1%d1%80%d0%b8%d0%ba%d0%b8/" class="dropdown-item ">Без рубрики</a></li>');
 document.write('</ul>');
 document.write('</li>');
 document.write('</ul>');
 document.write('</nav> ');       
        document.write(' </div>');
      document.write(' </div>');
    document.write(' </div>');
    document.write(' <!--end top header wrapper-->     ');

document.write('<div class="cart-list">');

document.write('</div>');
}