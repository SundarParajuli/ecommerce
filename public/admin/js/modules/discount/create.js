jQuery(function ($) {

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
                        'category_id': categoryId,
                        'company_id': vendorId,
                        'title': searchTitle
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
                                '<i class="fa fa-trash-o fa-lg text-danger-800" onclick="removeDiscount(' + v.id + ')"></i> ' +
                                '</div> ' +
                                '</div> ' +
                                '<div class="col-md-3">' +
                                '<input type="button" id="btn-' + v.id + '"  value="Add" class="btn btn-info" onclick="addDiscount(' + v.id + ')">' +
                                '</div>' +
                                '</div>' +
                                '</div>');
                        });
                    }
                });
            });

            // $('#title').on('change', function () {
            //     let Title = $(this).val();
            //     Title = slugify(Title);
            //     $("#slug").val(Title);
            // })

        });

        function addDiscount(id) {
            $("#" + id).clone().insertAfter("div.discountList:last");
            $("#btn-" + id).attr("disabled", "disabled");
            swal({
                title: "Success",
                text: "Discount product added",
                timer: 1000,
                showConfirmButton: false,
                type: 'success',
            });
        }

        function removeDiscount(id) {
            swal({
                title: 'Are you sure?',
                text: " will be removed!",
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

        function getDiscountSlug(discount_group_id){ 
            $.ajax({

                type: 'GET',
                url: "{!! route('discount.get.slug') !!}",
                data: {
                    'discount_group_id': discount_group_id 
                },
                success: function (response) {
                    var container= $(".slug-alert-message"); 
                    var slugContainer= $("input[name='slug']");
                     
                    if(response.exists==true){
                        container.html("<span>Sorry, this slug is not available.</span>");
                        slugContainer.val("");
                    }
                    else{
                        container.html("<span style='color:green;'>Ok, this slug is available.</span>");
                        slugContainer.val(response.suggestion);
                    }
                    select_slug_suggestion($(this));
                }
            });
        }
            
        
        $(".discount_group_id").on("change", function(){ 
            var discount_group_id= $(this).val();
            getDiscountSlug(discount_group_id);
        });
        function select_slug_suggestion(){
            $('.slug_suggestion').click(function(){
                var slug= $(this).text();
                $("input[name='slug']").val(slug);
            })
        }