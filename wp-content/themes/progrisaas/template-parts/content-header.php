<!-- #site-header-open -->
<header id="site-header" class="site-header <?php progrisaas_header_class(); ?>">

    <!-- #header-desktop-open -->
    <?php progrisaas_header_builder(); ?>
    <!-- #header-desktop-close -->

    <!-- #header-mobile-open -->
    <?php progrisaas_mobile_builder(); ?>
    <!-- #header-mobile-close -->

</header>
<!-- #site-header-close -->
<!-- #side-panel-open -->
<?php if( progrisaas_get_option('sidepanel_layout') ) { ?>
    <div id="side-panel" class="side-panel <?php if( progrisaas_get_option('panel_left') ) echo 'on-left'; ?>">
        <a href="#" class="side-panel-close"><i class="ot-flaticon-close"></i></a>
        <div class="side-panel-block">
            <?php if ( did_action( 'elementor/loaded' ) ) progrisaas_sidepanel_builder(); ?>	
        </div>
    </div>
<?php } ?>
<!-- #side-panel-close -->