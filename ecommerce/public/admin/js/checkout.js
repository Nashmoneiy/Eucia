
$(document).ready(function (){
    $('.paystack_btn').click(function (e) {
        e.preventDefault();
        //alert('hello')
        var name = $('.name').val();
        var phone = $('.phone').val();
        var email = $('.email').val();
        var address =  $('.address').val();
        var state = $('.state').val();
        var city = $('.city').val();
        var district = $('.district').val();

        if(!name){
            name_error = "name is required";
            $('#name_error').html('');
            $('#name_error').html(name_error)
        }
        else{
            name_error = "";
            $('#name_error').html('');

        }

        if(!phone){
            phone_error = "phone is required";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error)
        }
        else{
            phone_error = "";
            $('#phone_error').html('');

        }

        if(!email){
            email_error = "email is required";
            $('#email_error').html('');
            $('#email_error').html(email_error)
        }
        else{
            email_error = "";
            $('#email_error').html('');

        }

        if(!address){
            address_error = "address is required";
            $('#address_error').html('');
            $('#address_error').html(address_error)
        }
        else{
            address_error = "";
            $('#address_error').html('');

        }

        if(!state){
            state_error = "state is required";
            $('#state_error').html('');
            $('#state_error').html(state_error)
        }
        else{
            state_error = "";
            $('#state_error').html('');

        }

        if(!city){
            city_error = "city is required";
            $('#city_error').html('');
            $('#city_error').html(city_error)
        }
        else{
            city_error = "";
            $('#city_error').html('');

        }

        if(!district){
            district_error = "district is required";
            $('#district_error').html('');
            $('#district_error').html(district_error)
        }
        else{
            district_error = "";
            $('#district_error').html('');

        }

        if (name_error != '' || phone_error != '' || email_error != '' || address_error != '' || state_error != '' || city_error != '' || district_error != '') 
            {
                return false;
            
        }else{
            var data = {
                'name'  : name,
                'phone'  : phone,
                'email'  : email,
                'address'  : address,
                'state'  : state,
                'city'  : city,
                'district'  : district,
            } 
           
          
            $.ajax({
                method : "GET",
                url : "/shop/ecommerce/public/place-order",
                data: data,
                success: function (response) {
                    //alert(response.total_price);
                   // alert('yes');
                  const popup = new PaystackPop()
                   popup.resumeTransaction(response.access_code);
                  //console.log(response);
                   
                     
                }
            })
        }
        
        
        
    });
});