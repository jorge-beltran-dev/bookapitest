jQuery( document ).ready(function() {
        jQuery('a.js-ajax-load').click( function(e) {
            e.preventDefault();
            jQuery.ajax({
                url: jQuery(this).attr('href'),
                type: "GET",

                success: function (data) {
                    jQuery('#books').html(data);
                }
            });
        });
});
