$(document).ready(function () {
    $('body').on('click', '.js-cart-append', function () {
        var data = {};
        data.id = $(this).data('id');
        data.count = 1;

        var params = {};
        params.ajax = true;
        params.controller = 'Cart';
        params.cmd = 'appendGoods';
        params.data = data;

        $.post('/', params, function (data) {
            aResponse = $.parseJSON(data);

            $('.js-cart-count').html(aResponse['count']);
        });
    });
});