/*=========================================================================================
    File Name: components-modal.js
==========================================================================================*/
(function(window, document, $) {
	'use strict';

     // onShow event
    $('#onshowbtn').on('click', function() {
        $('#onshow').on('show.bs.modal', function() {
            alert('onShow event fired.');
        });
    });

    // onShown event
    $('#onshownbtn').on('click', function() {
        $('#onshown').on('shown.bs.modal', function() {
            alert('onShown event fired.');
        });
    });

    // onHide event
    $('#onhidebtn').on('click', function() {
        $('#onhide').on('hide.bs.modal', function() {
            alert('onHide event fired.');
        });
    });

    // onHidden event
    $('#onhiddenbtn').on('click', function() {
        $('#onhidden').on('hidden.bs.modal', function() {
            alert('onHidden event fired.');
        });
    });
})(window, document, jQuery);