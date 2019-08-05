$(document).ready(function(c) {
    $('.close1').on('click', function(c) {
        var add_cart_url = 'cart/remove';
        var pid = $(this).data('id');
        var token = $('input[name="_token"]').val();
        var dataPost = { pid: pid, '_token': token };
        var t = $(this);
        $.ajax({
            url: add_cart_url,
            dataType: 'json',
            type: 'POST',
            data: dataPost,
            success: function(result) {
                t.closest('tr').fadeOut('slow', function(c) {
                    $(this).closest('tr').remove();
                });
            }
        });
    });
});

$('.value-minus').on('click', function() {
    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) - 1;
    if (newVal >= 1) divUpd.text(newVal);
    var add_cart_url = 'cart/update';
    var pid = $(this).data('id');
    var token = $('input[name="_token"]').val();
    var dataPost = { pid: pid, quantity: newVal,'_token': token };
    $.ajax({
        url: add_cart_url,
        dataType: 'json',
        type: 'POST',
        data: dataPost,
        success: function(result) {
            location.reload();
        }
    });
});

$('.value-plus').on('click', function() {
    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) + 1;
    divUpd.text(newVal);
    var add_cart_url = 'cart/update';
    var pid = $(this).data('id');
    var token = $('input[name="_token"]').val();
    var dataPost = { pid: pid, quantity: newVal,'_token': token };
    $.ajax({
        url: add_cart_url,
        dataType: 'json',
        type: 'POST',
        data: dataPost,
        success: function(result) {
            location.reload();
        }
    });
});

