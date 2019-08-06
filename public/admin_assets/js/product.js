'use strict';
$(document).ready(function () {
    initEvents();
});

function initEvents() {
    $(document).on('click','#btn-search',function (e) {
        try {
            e.preventDefault();
            searchProduct();
        } catch (e) {
            alert('searchProduct' + e.message);
        }
    });
}
// Tìm kiếm theo điều kiện search
function searchProduct() {
    try {
        var data = {};
        data.id         = $('#id').val();
        data.cat_id   = $('#cat_id').val();
        data.name       = $('#name').val();
        data.supplier   = $('#supplier').val();
        data.brand      = $('#brand').val();
        data.size       = $('#size').val();
        data.color      = $('#color').val();
        $.ajax({
            type: 'GET',
            url: '/admin/product/search',
            data: data,
            success: function (res) {
                $('#table-result').empty();
                $('#table-result').append(res);
            }
        });
    } catch (e) {
        alert('search' + e.message);
    }
}
