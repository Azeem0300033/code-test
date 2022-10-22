/*
* this ajax form use to show modal with form
* in the requestRote use to pass route name by function parameter
* bodyAjax use to render html in the modal body
* */
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

/*
*  this function use to store and update form
* ajaxSetup use to pass csrf token
* requestRoute use to pass route name by function parameter
* formId use to pass form id by function parameter
* I use serialize function to get all form data and pass to the controller
* */
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

/*
*  this function use to show success massage
* */

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

/*
*  this function use to reload datatable with out page reload
* */

function tableReloder(){
    $('#dataTable').DataTable().ajax.reload();
}

/*
*  this function use to show confirm message before delete
* if user confirm then delete the data and reload the datatable
* */

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

/*
*  this function use to get models by brand id and fetch in the select option
* */

function getModelItem(elem) {
    $.ajax({
        url: "/select-model-ajax",
        type: 'GET',
        data: {
            brand_id: elem,
        }, success: function (data) {
            $("#model_item_id option").remove();
            data.forEach(function(item) {
                $('#model_item_id').append(`
                    <option value="">Select Model</option>
                    <option value="${item.id}">${item.name}</option>
                `);
            });
        }
    });
}
