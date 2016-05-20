/**
 * This is a controller for model-switching navbar.
 * We have three different models of sunglasses.
 * When user clicks one of navbar model icons, 
 * This script shows the clicked model, and hides all other models.
 */ 
$(document).ready(function() {
    var selectedModel = 'Ken Block Helm';
    var sunglasses = $('.sunglasses-item'); 
    initButtonListeners();
    //hideSpinner();
    showModel(selectedModel);

    function showModel(model) {
        sunglasses.each(function(index, sunglassesItem) {
            var $sunglassesItem = $(sunglassesItem);
            if ($sunglassesItem.attr('data-model') === model) {
                $sunglassesItem.show();
            } else {
                $sunglassesItem.hide();
            }
        });
    }

    function initButtonListeners() {
        var modelSwitchingButtons = $('.model-switching-button');
        modelSwitchingButtons.on('click', function() {
            //showSpinner();
            var model = $(this).attr('data-model');
            showModel(model);
            //hideSpinner();

            // trigerring scroll event on window,
            // makes jquery.lazyload load images
            // that are in viewport.
            $(window).scroll();
        });
    }

    //function showSpinner() {
    //    $('.sunglasses-block').hide();
    //    $('.loading-model-spinner').show();
    //}
    //
    //function hideSpinner() {
    //    $('.sunglasses-block').show();
    //    $('.loading-model-spinner').hide();
    //}
});
