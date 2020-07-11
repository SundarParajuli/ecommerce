//get all the products and display its details as option
//it is used in order's create page
function product_select(){
    $('.product_select').select2({
          placeholder: 'Select an item',
          minimumInputLength: 3 ,
          ajax: {
            url: root_url+'get-product-list-ajax',
            dataType: 'json',
            delay: 250,
             
            processResults: function (data) {

              return {
                results:  $.map(data, function (item) {
                      return {
                          text: "code: "+item.sku+" | name: "+item.name,
                          id: item.id
                      }

                  })
              };
            
            },
            cache: true

          }
         
        });
  }
function user_select(){
  //search the details of user and display them as option
  $('.user_search').select2({
    placeholder: 'Select user',
    minimumInputLength: 3 ,
    ajax: {
      url: root_url+'get-user-list-ajax',
      dataType: 'json',
      delay: 250,
       
      processResults: function (data) {

        return {
          results:  $.map(data, function (item) {
                return {
                    text: item.name+" | "+item.email+" | "+item.phone_number,
                    id: item.id
                }

            })
        };
      
      },
      cache: true
    }


  });

}

function onUserSelectAjax($user_id){
  var  ajax_url = root_url+"get-user-details";
    var formData = new FormData();
    formData.append('id',$user_id);

    var result =  $.ajax(  { 
    type: "POST",
    url: ajax_url, 
    data        : formData, // our data object
    dataType: 'json',
    contentType: false,
    processData: false,
    // what type of data do we expect back from the serve
    // encode          : true,

    success: function (data) { 
        $('.user_name').val("");
        $('.user_email').val("");
        $('.user_phone').val(""); 
        $('.user_s_phone').val(""); 
        $('.user_gender').val("");
        $('.user_dob').val("");
        if((data.name) != null){
          $('.user_name').val(data.name);
        }  
        if((data.email) != null){
          $('.user_email').val(data.email);
        }
        if((data.phone) != null){
          $('.user_phone').val(data.phone);
        }
        if((data.s_phone) != null){
          $('.user_s_phone').val(data.s_phone);
        }
         if((data.gender) != null){
          $('.user_gender').val(data.gender);
        }
        if((data.dob) != null){ 
          $('.user_dob').val(data.dob);
        }
          
        },

          error: function (data) {
              
              console.log('Error:', data);
          }
          
 }); 
}

//when the  details of the searched user is clicked 
  //display its details
$('.user_select').on('select2:select', function () { 

  var id= $(this).select2("val");
 
  //send ajax 
  onUserSelectAjax(id);


 });