// --------------------------- general functions -------------
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

function displayValidation(errors) {
    $.each(errors, function (key, error) {
        var input,
            parentDiv,
            validation = `<span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>` + error[0] + `</strong>
                                    </span>`;

        if (key === 'type') {
            input = $("select[name='" + key + "']");
            input = input.parent('div');
            parentDiv = input.parent('.form-group');
        } else if (key === 'role_ids') {
            input = $("select[id='" + key + "']");
            input = input.parent('div');
            parentDiv = input.parent('.form-group');
        } else if (key === 'permission_ids') {
            input = $("input[name='" + key + "']");
            var container = input.parent('div').parent('div').parent('.row').parent('form');
            parentDiv = container.find('#permissions-validation');

        } else {
            input = $("input[name='" + key + "']");
            parentDiv = input.parent('.form-group');
        }

        parentDiv.addClass('has-danger');
        input.addClass('is-invalid');
        parentDiv.append(validation);
    })
}

function removeValidation() {
    $('div input[name]').each(function () {
        var inputName = $(this).attr('name'),
            input = $("input[name='" + inputName + "']"),
            parentDiv = input.parent('.form-group');

        // remove old validation before submit
        parentDiv.removeClass('focused');
        parentDiv.removeClass('has-danger');
        input.removeClass('is-invalid');
        parentDiv.find('.invalid-feedback').remove();
    });

    $('div select[name]').each(function () {
        var inputName = $(this).attr('name'),
            input = $("select[name='" + inputName + "']").parent('div'),
            parentDiv = input.parent('.form-group');
        // remove old validation before submit
        parentDiv.removeClass('focused');
        parentDiv.removeClass('has-danger');
        input.removeClass('is-invalid');
        parentDiv.find('.invalid-feedback').remove();
    });
}

function swalSuccess(data) {
    Swal.fire({
        title: 'Good !',
        text: data.message,
        icon: 'success',
        timer: '6000',
        buttons: false,
    })
}

function swalError(data) {
    if (data) {
        data = data.message;
    }
    data = data || 'Something went wrong';
    Swal.fire({
        title: 'Sorry',
        text: data,
        icon: 'error',
        timer: '8000',
        buttons: false,
    })
}

//---------------------------- delete item ---------------------

$(document).on('click', '.delete-item', function (event) {
    event.preventDefault();
    var item = $(this),
        route = item.attr('route'),
        renderURL = item.attr('renderURL'),
        renderType = item.attr('renderType') || 'hard_reload',
        token = $('meta[name="csrf-token"]').attr('content'),
        dataTable = $(".dataTable");
    if (route) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'Once deleted, you will not be able to recover this data !',
            icon: 'warning',
            buttons: ['Cancel', 'Continue & Delete !'],
            showCancelButton: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete.dismiss != 'cancel') {
                    $.ajax({
                        url: route,
                        type: 'POST',
                        data: {
                            '_method': 'DELETE',
                            '_token': token,
                        },
                        success: function (data) {
                            if (data.status) {
                                swalSuccess(data);
                                if (renderType === 'datatable') {
                                    dataTable.dataTable().fnDestroy();
                                    $('#results').html(data.data);
                                    $('.dataTable').dataTable({
                                        aaSorting: [[0, 'asc']]
                                    });
                                } else if (renderType === 'htmltable') {
                                    // console.log(data.data)
                                    $('#results').html(data.data);
                                } else if (renderType === 'hard_reload') {
                                    setTimeout(function () {
                                        location.reload(true);
                                    }, 2000);
                                } else {
                                    $('#results').html(data.data);
                                }
                            } else {
                                swalError(data)
                            }
                        },
                        error: function () {
                            swalError();
                        }
                    })
                } else {
                    Swal.fire({
                        title: 'Good !',
                        text: 'Your data is safe!',
                        icon: 'info',
                        timer: '6000',
                        buttons: false,
                    });
                }
            });
    }
});

//---------------------------- Change Status item ---------------------

$(document).on('submit', '#changeStatus', function (event) {
    let form = this;

    event.preventDefault();

    Swal.fire({
        title: "Are you sure?",
        text: "You will Change The Status Of This!",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        showCancelButton: true,
        dangerMode: true,
    }).then(function (isConfirm) {
        console.log(isConfirm)
        if (isConfirm.dismiss != 'cancel') {
            Swal.fire({
                title: 'Done!',
                text: 'Status Change Successfully!',
                icon: 'success'
            }).then(function () {
                form.submit();
            });
        } else {
            Swal.fire("Cancelled", "Your Status Not Changed :)", "error");
        }
    })
});

$(document).ready(function () {
    //event.preventDefault();

    var id=$('#country_id').val();
    var token = $("input[name='_token']").val();
    $.ajax({

        url: "/system/country/"+ id +"/states",
        method: 'GET',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        data: {id:id, _token:token},

        success: function(data) {
            console.log(data);

            $("select[name='state_id']").html('');

            $.each(data, function( index, value ){
                $("#state_select").append('<option value="' + index + '">' + value  + '</option>');
            });

        }
    });
});


$(document).on('change', '#country_id', function (event) {
    event.preventDefault();

    var id=$(this).val();
    var token = $("input[name='_token']").val();
    $.ajax({

          url: "/system/country/"+ id +"/states",
          method: 'GET',
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
          data: {id:id, _token:token},

          success: function(data) {
            console.log(data);

            $("select[name='state_id']").html('');

            $.each(data, function( index, value ){
        $("#state_select").append('<option value="' + index + '">' + value  + '</option>');
        });

          }
    });
  });


$(document).ready(function () {
    //event.preventDefault();

    var id=$('#billing_country_id').val();
    var token = $("input[name='_token']").val();
    $.ajax({

        url: "/system/country/"+ id +"/states",
        method: 'GET',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        data: {id:id, _token:token},

        success: function(data) {
            console.log(data);

            $("select[name='billing_state_id']").html('');

            $.each(data, function( index, value ){
                $("#billing_state_select").append('<option value="' + index + '">' + value  + '</option>');
            });

        }
    });
});

$(document).on('change', '#billing_country_id', function (event) {
    event.preventDefault();

    var id=$(this).val();
    var token = $("input[name='_token']").val();
    $.ajax({

        url: "/system/country/"+ id +"/states",
        method: 'GET',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        data: {id:id, _token:token},

        success: function(data) {
            console.log(data);

            $("select[name='billing_state_id']").html('');

            $.each(data, function( index, value ){
                $("#billing_state_select").append('<option value="' + index + '">' + value  + '</option>');
            });

        }
    });
});

$(document).ready(function () {
    //event.preventDefault();

    var id=$('#shipping_country_id').val();
    var token = $("input[name='_token']").val();
    $.ajax({

        url: "/system/country/"+ id +"/states",
        method: 'GET',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        data: {id:id, _token:token},

        success: function(data) {
            console.log(data);

            $("select[name='shipping_state_id']").html('');

            $.each(data, function( index, value ){
                $("#shipping_state_select").append('<option value="' + index + '">' + value  + '</option>');
            });

        }
    });
});

$(document).on('change', '#shipping_country_id', function (event) {
    event.preventDefault();

    var id=$(this).val();
    var token = $("input[name='_token']").val();
    $.ajax({

        url: "/system/country/"+ id +"/states",
        method: 'GET',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        data: {id:id, _token:token},

        success: function(data) {
            console.log(data);

            $("select[name='shipping_state_id']").html('');

            $.each(data, function( index, value ){
                $("#shipping_state_select").append('<option value="' + index + '">' + value  + '</option>');
            });

        }
    });
});

