// Danger
$(".control-danger").uniform({
    radioClass: 'choice',
    wrapperClass: 'border-danger-600 text-danger-800'
});

//check all
$('#checkAll').checkAll();


$.each($(".btnStatus"), function (i, v) {

    $(v).on("click", function (e) {

        e.preventDefault();

        var Status = $(this).data('status');
        var Id = $(this).data('id');
        var Url = $(this).data('url');
        console.log(Url);
        swal({

            title: 'Are you sure?',
            text: "Change Status",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'

        }, function (isConfirm) {

            if (isConfirm) {
                $.ajax({

                    type: "GET",
                    url: Url,
                    data: {status: Status, id: Id},
                    success: function (dt) {

                        if (dt) {
                            $(v).html(dt.tgle);
                        }

                    },
                    error: function (err) {

                        swal('Error', "Oops something went wrong! " + err);

                    }

                });// Ajax

            }
        });
    });// Status
});

$.each($(".btnApproval"), function (i, v) {

    $(v).on("click", function (e) {

        e.preventDefault();

        var Status = $(this).data('status');
        var Id = $(this).data('id');
        var Url = $(this).data('url');

        swal({

            title: 'Are you sure?',
            text: "Update approval",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'

        }, function (isConfirm) {

            if (isConfirm) {
                $.ajax({

                    type: "GET",
                    url: Url,
                    data: {status: Status, id: Id},
                    success: function (dt) {

                        if (dt) {
                            $(v).html(dt.tgle);
                        }

                    },
                    error: function (err) {

                        swal('Error', "Oops something went wrong! " + err);

                    }

                });// Ajax

            }
        });

    });// Status
});

$.each($(".btnOrderRemove"), function (i, v) {

    $(v).on("click", function (e) {

        e.preventDefault();

        var Status = $(this).data('status');
        var Id = $(this).data('id');
        var Url = $(this).data('url');

        swal({

            title: 'Are you sure?',
            text: "Remove product from order",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'

        }, function (isConfirm) {

            if (isConfirm) {
                $.ajax({

                    type: "GET",
                    url: Url,
                    data: {status: Status, id: Id},
                    success: function (dt) {

                        if (dt) {
                            $(v).html(dt.tgle);
                            $(this).parent("tr:first").remove();
                            window.location.href=window.location.href
                        }

                    },
                    error: function (err) {

                        swal('Error', "Oops something went wrong! " + err);

                    }

                });// Ajax

            }
        });

    });// Status
});

// Date range picker
// ------------------------------

// Basic initialization
$('.daterange-basic').daterangepicker({
    locale: {
        format: 'YYYY/MM/DD'
    }
});

$('.daterange-single').daterangepicker({
    // autoUpdateInput: false,
    locale: {
        format: 'YYYY-MM-DD'
    },
    separator: "|",
    singleDatePicker: true
});


function confirmAndSubmit(Url) {

    swal({

        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'

    }, function (isConfirm) {

        if (isConfirm) {
            window.location = Url;
        } else {
            // console.log("Cancelled");
        }
    });

}

function confirmAndSubmitForm() {

    swal({

        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete !'

    }, function (isConfirm) {

        if (isConfirm) {

            $("#formDelete").submit();

        }
    });
}

/*
 |----------------------------------------------------------------------
 | Confirm to remove image from file browser
 |----------------------------------------------------------------------
 |
 */

function confirmFirst(field_id) {

    swal({

        title: "Are you sure?",
        text: "You will not be able to recover this imaginary data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

    }, function (isConfirm) {

        if (isConfirm) {

            if (field_id) {
                clearImg(field_id);
            }
            swal({
                title: "Successfully deleted",
                animation: "slide-from-top",
                type: "success",
                timer: 1200,
                showConfirmButton: false
            });

        } else {

            swal({
                animation: "slide-from-top",
                title: "Data deletion cancelled",
                type: 'warning',
                timer: 1200,
                showConfirmButton: false

            });
        }
    });
}

/*
 |----------------------------------------------------------------------
 | Filemanager popup box
 |----------------------------------------------------------------------
 |
 */

$('.standAloneFacnyBox').fancybox({
    'width': 900,
    'height': 600,
    'type': 'iframe',
    'autoScale': true,
    'padding': 0,
    'openEffect': 'elastic',//fade
    'closeEffect': 'elastic',
    'openSpeed': 'fast',
    'closeSpeed': 'fast'//slow
});

function responsive_filemanager_callback(field_id) {

    var image = $('#' + field_id).val();
    $('#' + field_id).attr('src', image);
    $('#h' + field_id).val(image);
}

function clearImg(field_id) {

    var noImg = '/admin/images/no_img.png';
    $('#' + field_id).attr('src', noImg);
    $('#h' + field_id).val('');
}

/*
 |----------------------------------------------------------------------
 | Product Brochure
 |----------------------------------------------------------------------
 |
 */

$('.standAloneFacnyBoxBrochure').fancybox({
    'width': 900,
    'height': 600,
    'type': 'iframe',
    'autoScale': true,
    'padding': 0,
    'openEffect': 'elastic',//fade
    'closeEffect': 'elastic',
    'openSpeed': 'fast',
    'closeSpeed': 'fast'//slow
});

// Warning
$(".control-warning").uniform({
    radioClass: 'choice',
    wrapperClass: 'border-warning-600 text-warning-800'
});

$('.select2').select2();

//Bootstrap FileStyle
// $(":file").filestyle({
//     text: "Choose Files",
//     btnClass: "btn-default",
//     buttonBefore: true,
//     placeholder: "No file"
// });

$('.datepicker').datepicker({
    format: "yyyy-mm-dd"
});

tinymce.init({
    selector: '.editor',
    height: 200,
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code help wordcount'
    ],
    toolbar: 'undo redo | bold | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ]
});

$.each($(".btnCategory"), function (i, v) {
    $(v).on("click", function (e) {
        e.preventDefault();
        let elem = $(this).next('.btnSubCategory');
        elem.toggle('slow');
    });
});

tinymce.init({
    selector: '#editor',
    height: 250,
    theme: 'modern',
    plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    image_advtab: true,
});

// function readURL(input, id) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             $('#' + id)
//                 .attr('src', e.target.result);
//         };
//         reader.readAsDataURL(input.files[0]);
//     }
// }
// 