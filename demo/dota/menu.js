function menu($esli) {
	if($esli == '1'){
	$bolt = 'current-menu-item current_page_item active';
	$bor = '';
	$bol = '';
	$boc = '';
	$boss = '';
	$bass = '';
}
if($esli == '2'){
	$bor = 'current-menu-item current_page_item active';
	$bolt = '';
	$bol = '';
	$boc = '';
	$boss = '';
	$bass = '';
}
if($esli == '3'){
	$bor = '';
	$bolt = '';
	$bass = '';
	$bol = 'current-menu-item current_page_item active';
	$boc = '';
	$boss = '';
}
if($esli == '4'){
	$bor = '';
	$bolt = '';
	$bol = '';
	$bass = '';
	$boc = 'current-menu-item current_page_item active';
	$boss = '';
}
if($esli == '5'){
	$bor = '';
	$bolt = '';
	$bol = '';
	$boc = '';
	$bass = '';
	$boss = 'current-menu-item current_page_item active';
}
if($esli == '6'){
	$bor = '';
	$bolt = '';
	$bol = '';
	$boc = '';
	$boss = '';
	$bass = 'current-menu-item current_page_item active';
}
	 document.write(' <div class="container">');
            document.write('<nav class="navbar navbar-expand-xl p-0">');
                document.write('<div class="navbar-brand">');
                                           document.write(' <a class="site-title" href="index.html">Dota 6.83d</a>');
                    
             document.write('   </div>');
             document.write('   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">');
               document.write('     <span class="navbar-toggler-icon"></span>');
            document.write('    </button>');

             document.write('   <div id="main-nav" class="collapse navbar-collapse justify-content-end"><ul id="menu-%d0%bc%d0%b5%d0%bd%d1%8e-%d0%ba%d0%be%d0%bc%d1%8c%d1%8e%d1%82%d0%b5%d1%80" class="navbar-nav"><li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom '+$bolt+' menu-item-home menu-item-28 nav-item"><a title="Главная" href="index.html" class="nav-link" aria-current="page">Главная</a></li>');
document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-197" class="'+$bor+' menu-item menu-item-type-taxonomy menu-item-object-category menu-item-197 nav-item"><a title="Scourge" href="scourge.html" class="nav-link">Scourge</a></li>');
document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-212" class="'+$bol+' menu-item menu-item-type-taxonomy menu-item-object-category menu-item-212 nav-item"><a title="Sentinel" href="sentinel.html" class="nav-link">Sentinel</a></li>');
document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-359" class="'+$boc+' menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-359 nav-item"><a title="Hero Sentinel" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-359">Hero Sentinel</a>');
document.write('<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-359" role="menu">');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-319" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-319 nav-item"><a title="Tavern 1" href="tavern1.html" class="dropdown-item">Tavern 1</a></li>');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-363" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-363 nav-item"><a title="Tavern 2" href="tavern2.html" class="dropdown-item">Tavern 2</a></li>');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-390" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-390 nav-item"><a title="Tavern 3" href="tavern3.html" class="dropdown-item">Tavern 3</a></li>');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-428" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-428 nav-item"><a title="Tavern 4" href="tavern4.html" class="dropdown-item">Tavern 4</a></li>');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-447" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-447 nav-item"><a title="Tavern 5" href="tavern5.html" class="dropdown-item">Tavern 5</a></li>');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-487" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-487 nav-item"><a title="Tavern 6" href="tavern6.html" class="dropdown-item">Tavern 6</a></li>');
document.write('</ul>');
document.write('</li>');
document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-519" class="'+$boss+' menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-519 nav-item"><a title="Hero Scourge" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-519">Hero Scourge</a>');
document.write('<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-519" role="menu">');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-520" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-520 nav-item"><a title="Tavern I" href="tavernI.html" class="dropdown-item">Tavern I</a></li>');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-559" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-559 nav-item"><a title="Tavern II" href="tavernII.html" class="dropdown-item">Tavern II</a></li>');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-572" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-572 nav-item"><a title="Tavern III" href="tavernIII.html" class="dropdown-item">Tavern III</a></li>');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-610" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-610 nav-item"><a title="Tavern IV" href="tavernIV.html" class="dropdown-item">Tavern IV</a></li>');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-626" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-626 nav-item"><a title="Tavern V" href="tavernV.html" class="dropdown-item">Tavern V</a></li>');
	document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-663" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-663 nav-item"><a title="Tavern VI" href="tavernVI.html" class="dropdown-item">Tavern VI</a></li>');
document.write('</ul>');
document.write('</li>');
document.write('<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-513" class="'+$bass+' menu-item menu-item-type-taxonomy menu-item-object-category menu-item-513 nav-item"><a title="Ability" href="ability.html" class="nav-link">Ability</a></li>');
document.write('</ul></div>');
            document.write('</nav>');
document.write('</div>');}