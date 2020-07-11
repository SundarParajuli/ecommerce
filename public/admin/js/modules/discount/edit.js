 function slugify(string) {
            return string
                .toString()
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "-")
                .replace(/[^\w\-]+/g, "")
                .replace(/\-\-+/g, "-")
                .replace(/^-+/, "")
                .replace(/-+$/, "");
        }

        $(document).ready(function () {
            //Slugify End
            // $('#title').on('change', function () {
            //     let Title = $(this).val();
            //     Title = slugify(Title);
            //     $("#slug").val(Title);
            // });
            //Slugify Start

            $('#searchFormBtn').click(function () {

                let vendorId = $('#vendorId').val();
                let categoryId = $('#categoryId').val();
                let searchTitle = $('#searchTitle').val();

                let productContainer = $("#productsList");

                $(productContainer).html("");

                $.ajax({

                    type: 'GET',
                    url: "{!! route('discount.product.list') !!}",
                    data: {
                        'category_id': categoryId, 'company_id': vendorId, 'title': searchTitle
                    },
                    success: function (response) {
                        let attribute = productContainer;
                        $.each(response.data, function (i, v) {
                            attribute.append(
                                '<div class="form-group">' +
                                '<div class="row">' +
                                '<div class="col-md-9" id="' + v.id + '">' +
                                '<label class="col-lg-5 control-label"> ' + v.title + '</label>' +
                                '<input type="hidden" name="product_id[]" value="' + v.id + '">' + 
                                '<div class="col-md-2" >' +
                                '<input type="text" name="product_sort_order[]" class="form-control" placeholder="Sort Order"/>' +
                                '</div> ' +
                                '<div class="col-md-2 pull-left" >' +
                                '<i class="fa fa-trash-o fa-lg text-danger-800" onclick="removeDiscountProduct(' + v.id + ')"></i> ' +
                                '</div> ' +
                                '</div> ' +
                                '<div class="col-md-3">' +
                                '<input type="button" id="btn-' + v.id + '"  value="Add" class="btn btn-info" onclick="addDiscountProduct(' + v.id + ')">' +
                                '</div>' +
                                '</div>' +
                                '</div>');
                        });
                    }
                });
            });
        });

        function addDiscountProduct(id) {
            $("#" + id).clone().insertAfter("div.discountProductList:last");
            $("#btn-" + id).attr("disabled", "disabled");
            swal({
                title: "Success",
                text: "Discount product added",
                timer: 1000,
                showConfirmButton: false,
                type: 'success',
            });
        }

        function removeDiscountProduct(id) {
            swal({
                title: 'Are you sure?',
                text: "Product will be removed!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#057015',
                cancelButtonColor: '#a8151a',
                confirmButtonText: 'Yes, remove it!'

            }, function (isConfirm) {
                if (isConfirm) {
                    $("#" + id).remove();
                }
            });
        }

        $.each($('.btnRemoveDiscountProduct'), function (i, v) {

            $(v).on("click", function (e) {

                e.preventDefault();
                var Id = $(this).data('id');
                var Url = "{{ route('discount.product.remove') }}";

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
                        $.ajax({
                            type: "GET",
                            url: Url,
                            data: {id: Id},
                            success: function (dt) {
                                $('.rm-' + Id).remove();
                            },
                            error: function (err) {
                                swal('Error', "Oops something went wrong! " + err);
                            }
                        });// Ajax
                    }
                });

            });// Status
        });