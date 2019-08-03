$('.value-plus').on('click', function(){
    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
    divUpd.text(newVal);
    var add_cart_url = 'cart/update';
    var pid = $(this).data('id');
    var token = $('input[name="_token"]').val();
    var dataPost = { pid: pid, quantity: newVal,'_token' : token};
    var t = $(this);
    // post đến controller
    $.ajax({
        url: add_cart_url,
        dataType:'json',
        type:'POST',
        data: dataPost,
        success: function(result){
            location.reload();
        }
    });
});
