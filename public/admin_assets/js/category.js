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
            alert('Search category' + e.message);
        }
    });
}
// Tìm kiếm theo điều kiện search
function search() {
    var data = {};
    data.id   = $('#id').val();
    console.log(data);
    debugger;
    $.ajax({
        type: 'GET',
        url: '/admin/category/search',
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
