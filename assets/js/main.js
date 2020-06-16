$(document).ready(function(){
    /* 
    *   Login Function
    *   //////////////
    */
    
    $('form#loginForm').on('submit', function(event){
        event.preventDefault();
        var loginBtn = $('form#loginForm').children('button[type="submit"]');
        loginBtn.html('<span class=""><i class="fa fa-spinner fa-pulse"></i> processing</span>')
        .attr('disabled', 'true');
        var settings = {
            url: "./api/v1/user/login",
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "Accept": "*/*",
                "cache-control": "no-cache"
            },
            data : {
                "email": String($('#email').val()),
                "password": String($('#password').val())
            }
        }
        $.ajax(settings).done(function (response) {
            loginBtn.removeAttr('disabled');
            loginBtn.html('<i class="fa fa-sign-in"></i> LOGIN');
            var responseData = JSON.parse(response);
            if(responseData.status == "Failure"){
                $('#loginFormAlertError').removeClass('d-none').html(responseData.message);
                $('#loginFormAlertSuccess').addClass('d-none');
                //alert(JSON.stringify(response));
                
            }else{
                $('#loginFormAlertError').addClass('d-none');
                $.ajax({
                    method: 'POST',
                    url:  './app/index',
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                        "Accept": "*/*",
                        "cache-control": "no-cache"
                    },
                    data: {
                        "json": JSON.stringify(responseData.response)
                    },
                }).done(function(data){
                    location.href = './app/'+data+'/index';
                    //console.log(data);
                })
            }       
        }).fail(function(jqXHR, textStatus){
            loginBtn.removeAttr('disabled');
            loginBtn.html('<i class="fa fa-sign-in"></i> LOGIN');
            $('#loginFormAlertError').removeClass('d-none').html('something went wrong!');
            $('#loginFormAlertSuccess').addClass('d-none');
        });
    })

});