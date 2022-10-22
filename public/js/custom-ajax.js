function ajaxForm(requestRoute,title){
    $.ajax({
        url: requestRoute,
        type: 'GET',
        success: function(data){
            $('#modalTitle').text(title);
            $("#bodyAjax").html(data);
            $("#ajaxModal").modal('show');
        },error: function(data){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        },
    });
}

function storeAjax(requestRoute,formId){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: requestRoute,
        type: 'POST',
        data: $("#"+formId).serialize(),
        success: function(data){
            $("#ajaxModal").modal('hide');
            toster();
            tableReloder();
        },error: function(data){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.responseJSON.message ?? 'Something went wrong!',
            })
        },
    });
}

function toster(){
    toastr.success("Your action complete successfully.", "Success", {
        timeOut: 5000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-top-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    });
}

function tableReloder(){
    $('#dataTable').DataTable().ajax.reload();
}

function globelDeleteFunction(routeName)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: routeName,
                type: 'DELETE',
                success: function(data){
                    toster();
                    tableReloder();
                },error: function(data){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.responseJSON.message ?? 'Something went wrong!',
                    })
                },
            });

        }
    })
}

function getModelItem(elem) {
    $.ajax({
        url: "/select-model-ajax",
        type: 'GET',
        data: {
            brand_id: elem,
        }, success: function (data) {
            $("#model_item_id option").remove();
            data.forEach(function(item) {
                $('#model_item_id').append($('<option>', {
                    value: item.id,
                    text : item.name
                }));
            });
        }
    });
}
