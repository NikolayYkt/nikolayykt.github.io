function menue($esli) {
	if($esli == '1'){
	$bolt = 'current-menu-item';
	$bor = '';
}
if($esli == '2'){
	$bor = 'current-menu-item';
	$bolt = '';
}
	document.write('<div class="ast-builder-menu-mobile ast-builder-menu ast-builder-menu-mobile-focus-item ast-builder-layout-element site-header-focus-item" data-section="section-header-mobile-menu">');
	document.write('<div class="ast-main-header-bar-alignment"><div class="main-header-bar-navigation"><nav class="site-navigation ast-flex-grow-1 navigation-accessibility site-header-focus-item" id="ast-mobile-site-navigation" aria-label="Навигация по сайту" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope"><div class="main-navigation"><ul id="ast-hf-mobile-menu" class="main-header-menu ast-nav-menu ast-flex  submenu-with-border astra-menu-animation-fade  stack-on-mobile"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home '+$bolt+' page_item page-item-5461 current_page_item menu-item-5468"><a href="index.html" aria-current="page" class="menu-link">Главная</a></li>');
document.write('<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5669"><a href="#" class="menu-link">Мой класс</a></li>');
document.write('<li class="menu-item '+$bor+' menu-item-type-post_type menu-item-object-page menu-item-5673"><a href="videogallery.html" class="menu-link">Видеогалерея</a></li>');
document.write('<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5740"><a href="#" class="menu-link">Портфолио</a></li>');
document.write('<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-5675"><a href="#" class="menu-link">Гостевая книга</a><button class="ast-menu-toggle" aria-expanded="false"><span class="screen-reader-text">Переключатель меню</span><span class="ast-icon icon-arrow"></span></button>');
document.write('<ul class="sub-menu">');
	document.write('<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5672"><a href="#" class="menu-link">Мероприятия</a></li>');
	document.write('<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5671"><a href="#" class="menu-link">Наши будни</a></li>');
	document.write('<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5670"><a href="#" class="menu-link">Метод разработка </a></li>');
	document.write('<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5668"><a href="#" class="menu-link">Работа с родителями</a></li>');
document.write('</ul>');
document.write('</li>');
document.write('</ul></div></nav></div></div>		</div>');
document.write('</div></div></div>');}


function menua($esli) {
		if($esli == '1'){
	$bolt = 'current-menu-item';
	$bor = '';
}else{
	$bor = 'current-menu-item';
	$bolt = '';
}
			document.write('<div id="ast-desktop-header" data-toggle-type="dropdown">');
		document.write('<div class="ast-main-header-wrap main-header-bar-wrap ">');
		document.write('<div class="ast-primary-header-bar ast-primary-header main-header-bar site-header-focus-item" data-section="section-primary-header-builder">');
						document.write('<div class="site-primary-header-wrap ast-builder-grid-row-container site-header-focus-item ast-container" data-section="section-primary-header-builder">');
				document.write('<div class="ast-builder-grid-row ast-builder-grid-row-has-sides ast-grid-center-col-layout">');
											document.write('<div class="site-header-primary-section-left site-header-section ast-flex site-header-section-left">');
									document.write('<div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="title_tagline">');
											document.write('<div class="site-branding ast-site-identity" itemtype="https://schema.org/Organization" itemscope="itemscope"				>');
					document.write('<span class="site-logo-img"><a href="index.html" class="custom-logo-link transparent-custom-logo" rel="home" itemprop="url" aria-label="Готовцевой Нюргустааны Семеновны"><img width="70" height="70" src="wp-content/uploads/2021/02/logo-1-70x70.png" class="custom-logo" alt="" decoding="async" loading="lazy" srcset="wp-content/uploads/2021/02/logo-1-70x70.png 70w, wp-content/uploads/2021/02/logo-1-150x150.png 150w, wp-content/uploads/2021/02/logo-1.png 200w" sizes="(max-width: 70px) 100vw, 70px" /></a></span>				</div>');

					document.write('</div>');
												document.write('<div class="site-header-primary-section-left-center site-header-section ast-flex ast-grid-left-center-section">');
																		document.write('	</div>');
															document.write('</div>');
																		document.write('	<div class="site-header-primary-section-center site-header-section ast-flex ast-grid-section-center">');
										document.write('<div class="ast-builder-menu-1 ast-builder-menu ast-flex ast-builder-menu-1-focus-item ast-builder-layout-element site-header-focus-item" data-section="section-hb-menu-1">');
			document.write('<div class="ast-main-header-bar-alignment"><div class="main-header-bar-navigation"><nav class="site-navigation ast-flex-grow-1 navigation-accessibility site-header-focus-item" id="primary-site-navigation-desktop" aria-label="Навигация по сайту" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope"><div class="main-navigation ast-inline-flex"><ul id="ast-hf-menu-1" class="main-header-menu ast-menu-shadow ast-nav-menu ast-flex  submenu-with-border stack-on-mobile"><li id="menu-item-5468" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home '+$bolt+' page_item page-item-5461 current_page_item menu-item-5468"><a href="index.html" aria-current="page" class="menu-link">Главная</a></li>');
document.write('<li id="menu-item-5669" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5669"><a href="#" class="menu-link">Мой класс</a></li>');
document.write('<li id="menu-item-5673" class="menu-item menu-item-type-post_type '+$bor+' menu-item-object-page menu-item-5673"><a href="videogallery.html" class="menu-link">Видеогалерея</a></li>');
document.write('<li id="menu-item-5740" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5740"><a href="#" class="menu-link">Портфолио</a></li>');
document.write('<li id="menu-item-5675" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-5675"><a href="#" class="menu-link">Гостевая книга</a><button class="ast-menu-toggle" aria-expanded="false"><span class="screen-reader-text">Переключатель меню</span><span class="ast-icon icon-arrow"></span></button>');
document.write('<ul class="sub-menu">');
	document.write('<li id="menu-item-5672" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5672"><a href="#" class="menu-link">Мероприятия</a></li>');
	document.write('<li id="menu-item-5671" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5671"><a href="#" class="menu-link">Наши будни</a></li>');
	document.write('<li id="menu-item-5670" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5670"><a href="#" class="menu-link">Метод разработка </a></li>');
	document.write('<li id="menu-item-5668" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5668"><a href="#" class="menu-link">Работа с родителями</a></li>');
document.write('</ul>');
document.write('</li>');
	document.write('</ul></div></nav></div></div>		</div>');
									document.write('</div>');
																			document.write('<div class="site-header-primary-section-right site-header-section ast-flex ast-grid-right-section">');
																document.write('	<div class="site-header-primary-section-right-center site-header-section ast-flex ast-grid-right-center-section">');
																		document.write('	</div>');
											document.write('<div class="ast-builder-layout-element ast-flex site-header-focus-item ast-header-button-1" data-section="section-hb-button-1">');
			document.write('<div class="ast-builder-button-wrap ast-builder-button-size-"><a class="ast-custom-button-link" href="#" target="_self" ><div class=ast-custom-button></div></a><a class="menu-link" href="#" target="_self" ></a></div>		</div>');
								document.write('	</div>');
											document.write('	</div>');
					document.write('</div>');
								document.write('</div>');
			document.write('</div>');
		document.write('<div class="ast-desktop-header-content content-align-flex-start ">');
			document.write('</div>');
document.write('</div> <!-- Main Header Bar Wrap -->');
document.write('<div id="ast-mobile-header" class="ast-mobile-header-wrap " data-type="dropdown">');
		document.write('<div class="ast-main-header-wrap main-header-bar-wrap" >');
		document.write('<div class="ast-primary-header-bar ast-primary-header main-header-bar site-primary-header-wrap site-header-focus-item ast-builder-grid-row-layout-default ast-builder-grid-row-tablet-layout-default ast-builder-grid-row-mobile-layout-default" data-section="section-primary-header-builder">');
									document.write('<div class="ast-builder-grid-row ast-builder-grid-row-has-sides ast-builder-grid-row-no-center">');
													document.write('<div class="site-header-primary-section-left site-header-section ast-flex site-header-section-left">');
										document.write('<div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="title_tagline">');
											document.write('<div class="site-branding ast-site-identity" itemtype="https://schema.org/Organization" itemscope="itemscope"				>');
					document.write('<span class="site-logo-img"><a href="index.html" class="custom-logo-link transparent-custom-logo" rel="home" itemprop="url" aria-label="Готовцевой Нюргустааны Семеновны"><img width="70" height="70" src="wp-content/uploads/2021/02/logo-1-70x70.png" class="custom-logo" alt="" decoding="async" loading="lazy" srcset="wp-content/uploads/2021/02/logo-1-70x70.png 70w, wp-content/uploads/2021/02/logo-1-150x150.png 150w, wp-content/uploads/2021/02/logo-1.png 200w" sizes="(max-width: 70px) 100vw, 70px" /></a></span>				</div>');

					document.write('</div>');
									document.write('</div>');
																									document.write('<div class="site-header-primary-section-right site-header-section ast-flex ast-grid-right-section">');
										document.write('<div class="ast-builder-layout-element ast-flex site-header-focus-item" data-section="section-header-mobile-trigger">');
						document.write('<div class="ast-button-wrap">');
				document.write('<button type="button" class="menu-toggle main-header-menu-toggle ast-mobile-menu-trigger-minimal"   aria-expanded="false">');
					document.write('<span class="screen-reader-text">Main Menu</span>');
					document.write('<span class="mobile-menu-toggle-icon">');
						document.write('<span class="ahfb-svg-iconset ast-inline-flex svg-baseline"><svg class="ast-mobile-svg ast-menu-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 13h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 7h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1zM3 19h18c0.552 0 1-0.448 1-1s-0.448-1-1-1h-18c-0.552 0-1 0.448-1 1s0.448 1 1 1z"></path></svg></span><span class="ahfb-svg-iconset ast-inline-flex svg-baseline"><svg class="ast-mobile-svg ast-close-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5.293 6.707l5.293 5.293-5.293 5.293c-0.391 0.391-0.391 1.024 0 1.414s1.024 0.391 1.414 0l5.293-5.293 5.293 5.293c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414l-5.293-5.293 5.293-5.293c0.391-0.391 0.391-1.024 0-1.414s-1.024-0.391-1.414 0l-5.293 5.293-5.293-5.293c-0.391-0.391-1.024-0.391-1.414 0s-0.391 1.024 0 1.414z"></path></svg></span>					</span>');
									document.write('</button>');
			document.write('</div>');
					document.write('</div>');
									document.write('</div>');
											document.write('</div>');
						document.write('</div>');
	document.write('</div>');
		document.write('<div class="ast-mobile-header-content content-align-flex-start ">');
document.write('<script type="text/javascript">menue();</script>');
			document.write('</div>');
document.write('</div>');
}


