'use strict';
$(document).ready(function () {
    initEvents();
});

function initEvents() {
    $(document).on('click','#btn-search',function (e) {
        try {
            e.preventDefault();
            search();
        } catch (e) {
            alert('Search order' + e.message);
        }
    });
}
// Tìm kiếm theo điều kiện search
function search() {
    var data = {};
    data.customer_name = $('#customer_name').val();
    data.customer_phone = $('#customer_phone').val();
    data.customer_email = $('#customer_email').val();
    data.customer_address = $('#customer_address').val();
    console.log(data);
    debugger;
    $.ajax({
        type: 'GET',
        url: '/admin/order/search',
        data: data,
        success: function (res) {
            $('#table-result').empty();
            $('#table-result').append(res);
        },
        error: function (xhr) {
            alert(xhr.responseText);
        }
    });
}
