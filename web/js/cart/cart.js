$(document).ready(function () {
    $('body').on('click', '.js-cart-clear', function () {
        var params = {};
        params.ajax = true;
        params.controller = 'Cart';
        params.cmd = 'reset';

        $.post('/', params, function (data) {
            aResponse = $.parseJSON(data);

            if (aResponse['complete']) {
                location.reload();
            }
        });
    });
});