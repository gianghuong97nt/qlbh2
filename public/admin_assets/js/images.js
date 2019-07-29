function changeProfile() {
    $('#file').click();
}

$('#file').change(function () {
    if ($(this).val() != '') {
        upload(this);
    }
});

function upload(img) {
    var form_data = new FormData();
    form_data.append('file', img.files[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        url: '/admin/uploads',
        data: form_data,
        type: 'POST',
        contentType: false,
        processData: false,

        success: function (data) {
            console.log(data);
            if (data.fail) {
                $('#preview_image').attr('src', 'uploads/default.png');
                alert(data.errors['file']);
            }
            else {
                $('#file_name').val(data);
                $('#preview_image').attr('src', asset('uploads/' + data));
            }
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
            $('#preview_image').attr('src', 'uploads/default.png');
        }
    });
}
function removeFile() {
    if ($('#file_name').val() != '')
        $('#loading').css('display', 'block');
    var data = {};
    data.filename = $('#file_name').val();
    $.ajax({
        type : 'POST',
        url : 'admin/deleteImage',
        data : data,
        success: function (data) {
            $('#preview_image').attr('src', 'uploads/default.png');
            $('#file_name').val('');
            $('#loading').css('display', 'none');
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}
