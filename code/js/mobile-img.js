// reponsive image

jQuery(document).ready( function ($) {
         $('img').each( function () {
                    $(this).removeAttr( 'width' );
                    $(this).removeAttr( 'height' );
         });
 });