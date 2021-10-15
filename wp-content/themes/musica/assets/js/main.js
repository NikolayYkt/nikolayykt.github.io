jQuery(".menu li").click(function() {
    e = jQuery(this).find('.sub-menu');
    if(!e.is(':visible')) {
    jQuery('.sub-menu').hide();
    e.show();
}
});
jQuery('.menu-item-has-children>a').attr("href", "#");
jQuery('.menu-item-has-children>a').attr("onclick","return false"); 

jQuery(document).mouseup(function (e) {
    var container = jQuery(".sub-menu");
    if (container.has(e.target).length === 0){
        container.hide();
    }
});

jQuery('h1').append(':');