/* global jQuery, _AMZCustomizerReset, ajaxurl, wp */

jQuery(function ($) {
    var $container = $('#customize-header-actions');


    var $button = $('<input type="submit" name="zoom-reset" id="zoom-reset" class="button-secondary button">')
        .attr('value', _AMZCustomizerReset.reset)
        .css({
            'float': 'right',
            'margin-left': '10px',
            'margin-top': '8px'
        });

    $button.on('click', function (event) {
        event.preventDefault();

        var data = {
            wp_customize: 'on',
            action: 'customizer_reset',
            nonce: _AMZCustomizerReset.nonce.reset
        };

        var r = confirm(_AMZCustomizerReset.confirm);

        if (!r) return;

        $button.attr('disabled', 'disabled');

        $.post(ajaxurl, data, function () {
            wp.customize.state('saved').set(true);
            location.reload();
        });
    });

    $container.prepend($button);
});
