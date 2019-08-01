$(document).ready(function () {
    $(document).on('click', '.load', function () {
        try {
            var category_id = $(this).data('category_id');
            loadProduct(category_id);
        } catch (e) {
            alert('load' + e.message);
        }
    });
});

function loadProduct(category_id) {
    $.ajax({
        type: 'GET',
        url: '/category/'+ category_id,
        dataType: 'html',
        loading: true,
        success: function (res) {
            $("#result").html(res);
        },
        error: function (res) {
            alert('load product ' + res.error);
        }
    });
}
