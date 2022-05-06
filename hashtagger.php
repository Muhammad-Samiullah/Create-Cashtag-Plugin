<?php

/*
Plugin Name: Easy $CashTags
Description: Converts $CashTags in posts to clickable links and directs them to search page. Simply activate and use $cashtags in your post.
*/


add_action( 'wp_head', function () { ?>
<script>

(function($) {

    /**
     *  Simple hashtag jquery plugin
     */

    $.fn.hashtagger = function(options) {

        var settings = $.extend({
            // These are the defaults.
            elements: "div, p, li, ul, a, strong",
            hashClass: "hashtag"
        }, options);

        var document = $(this);

        $(settings.elements).each(function () {
          var text = $(this).text();
          $(this).html($(this).html().replace(/(\$[a-zA-Z_]+)/g, "<span class='"  + settings.hashClass + "'>$1</span>"));
        })

        $('.' + settings.hashClass).each(function() {
          $(this).html(generateHash($(this).html()));
        });

        function generateHash(tag) {
          var domain = "https://stockvoyager.com/";
          var link = domain  + "?s=" + tag;
          return '<a href="' + link + '" >' + tag + '</a>';
        }

    };

}(jQuery));
jQuery(document).ready(function($) {
        $('document').hashtagger();
    });
</script>
<?php } );

?>