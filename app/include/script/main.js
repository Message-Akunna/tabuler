// test if string is json formatted
isJSON = (str) => {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
$(document).ready(function(){
    /*
    *   choose courses on page load
    */ 
    var getDepartmentSelectOption = document.getElementsByClassName("change-department");
    if (getDepartmentSelectOption.length > 0) {
        var departmentSelected = $(".change-department option:selected").val();
        var courseSelection = $('select.change-course');
        $.ajax('../../api/v1/course/list?column=department&keyword='+departmentSelected)
        .done(function(response){
            var responseData = JSON.parse(response);
            if(responseData.response.length > 0){
                var coursesOption = '';
                responseData.response.forEach(element => {
                    coursesOption += '<option value="'+element.id+'">'+element.name+'</option>';
                });
                courseSelection.html(coursesOption);
            }else{
                courseSelection.html('<option value=null>No Course</option>');
            }
        });
    }

    /*
    *   choose courses based on department selected
    */ 
    $('select.change-department').on('change', function(e){
        var departmentSelected = $(".change-department option:selected").val();
        var courseSelection = $('select.change-course');
        $.ajax('../../api/v1/course/list?column=department&keyword='+departmentSelected)
        .done(function(response){
            var responseData = JSON.parse(response);
            if(responseData.response.length > 0){
                var coursesOption = '';
                responseData.response.forEach(element => {
                    coursesOption += '<option value="'+element.id+'">'+element.name+'</option>';
                });
                courseSelection.html(coursesOption);
            }else{
                courseSelection.html('<option value=null>No Course</option>');
            }
        })
    });

    /*
    *   add to db tables
    */
    //Process registration form (adding new users to the system)
    $('form#addUserForm').on('submit', function(event){
        event.preventDefault();
        var _This = $(this);
        $('#formAlertSuccess').addClass('d-none');
        $('#formAlertError').addClass('d-none');
        // var submitBtn = $('form#addUserForm').children('button[type="submit"]');
        var submitBtn = $('button.submit-user-data');        
        submitBtn.html('<span class="text-light"><i class="fa fa-spinner fa-pulse"></i> processing</span>')
            .attr('disabled', 'true');
        var formData = $('#userDataBlock').find('select, textarea, input').serializeArray().map(function(x){this[x.name] = x.value; return this;}.bind({}))[0];
        var settings = {
            url: '../../api/v1/user/add',
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "Accept": "*/*",
                "cache-control": "no-cache"
            },
            data : formData
        };
        $.ajax(settings).done(function(response){
            submitBtn.html('Add User').removeAttr('disabled');
            var jsonResponse = JSON.parse(response);
            // if user is successfully added, add user type to 
            // corresponding table
            if(jsonResponse.status == "Success"){
                var userEmail = formData.email;
                $.ajax('../../api/v1/user/list?column=email&keyword='+userEmail)
                .done(function(userData){
                    responseData = JSON.parse(userData);
                    var regNo = responseData["response"][0]["id"];
                    var userType = formData.user_type;
                    var userTypeFormData = $('#'+userType+'UserType').find('select, textarea, input').serializeArray().map(function(x){this[x.name] = x.value; return this;}.bind({}))[0];
                    userTypeFormData = {...userTypeFormData, "reg_no": regNo};
                    $.ajax({
                        url: '../../api/v1/'+userType+'/add',
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                            "Accept": "*/*",
                            "cache-control": "no-cache"
                        },
                        data : userTypeFormData
                    }).done(function(response){
                        var jsonUserTypeResponse = JSON.parse(response);
                        if(jsonUserTypeResponse.status == "Success"){
                            $('#formAlertSuccess').removeClass('d-none');
                            $('#formAlertError').addClass('d-none');
                            setTimeout(location.reload(true), 2000);
                        }else{
                            $('#formAlertSuccess').addClass('d-none');
                            $('#formAlertError').removeClass('d-none');
                            $('#formErrorMessage').html(jsonUserTypeResponse.message);
                        }
                    }).fail(function(jqXHR, textStatus){
                        $('#formAlertSuccess').addClass('d-none');
                        $('#formAlertError').removeClass('d-none');
                        $('#formErrorMessage').html('There was a problem processing your request');
                    });
                });
            }else{
                $('#formAlertSuccess').addClass('d-none');
                $('#formAlertError').removeClass('d-none');
                $('#formErrorMessage').html(jsonResponse.message);
                // console.log(jsonResponse);
            }
        }).fail(function(jqXHR, textStatus){
            submitBtn.html('Add User').removeAttr('disabled');
            $('#loginFormAlertError').removeClass('d-none').html('something went wrong!');
            $('#loginFormAlertSuccess').addClass('d-none');
            //console.log(jqXHR,textStatus);
        });
        
    });
    //add data to other tables
    $('form.regular-form').on('submit', function(event){
        event.preventDefault();
        var _This = $(this);
        var apiEndPoint = _This.data('submit-url');
        $('#formAlertSuccess').addClass('d-none');
        $('#formAlertError').addClass('d-none');
        // // // //
        var submitBtn = $('button.submit-data');        
        submitBtn.html('<span class="text-light"><i class="fa fa-spinner fa-pulse"></i> processing</span>')
            .attr('disabled', 'true');
        var formData = _This.find('select, textarea, input').serializeArray().map(function(x){this[x.name] = x.value; return this;}.bind({}))[0];
        var settings = {
            url: '../../api/v1/'+apiEndPoint+'/add',
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "Accept": "*/*",
                "cache-control": "no-cache"
            },
            data : formData
        };
        $.ajax(settings).done(function(response){
            submitBtn.html('Create').removeAttr('disabled');
            var jsonResponse = JSON.parse(response);
            if(jsonResponse.status == "Success"){
                $('#formAlertSuccess').removeClass('d-none');
                $('#formAlertError').addClass('d-none');
                setTimeout(location.reload(true), 2000);
            }else{
                $('#formAlertSuccess').addClass('d-none');
                $('#formAlertError').removeClass('d-none');
                $('#formErrorMessage').html(jsonResponse.message);
            }
        }).fail(function(jqXHR, textStatus){
            submitBtn.html('Create').removeAttr('disabled');
            $('#formAlertSuccess').addClass('d-none');
            $('#formAlertError').removeClass('d-none');
            $('#formErrorMessage').html('There was a problem processing your data');
        });
    });

    /* 
    *
    * Delete data
    * 
    */
    // Delete User
    $("div.media").on("click", "a.nav-link[data-delete-id]",  function(){
        var _This = $(this);
        //var apiEndPoint = 'user';
        var dataId = _This.data('delete-id');
        var dataUrl = '../../api/v1/user/delete?id='+dataId;
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            width: '350px',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-primary btn-sm',
            cancelButtonClass: 'btn btn-secondary btn-sm',
            buttonsStyling: false
        }).then( result => {
            if (result.value) {
                var settings = {
                    url: dataUrl,
                    crossDomain: true,
                    type: "GET"
                };
                $.ajax(settings).done(function(response){
                    if(isJSON(response)){
                        var responseData = JSON.parse(response);
                        if(responseData.status == "Success"){
                            swal(
                                'Deleted!',
                                'Item has been deleted.',
                                'success'
                            )
                            setTimeout(location.reload(true), 3000);
                        }else{
                            swal(
                                'Cancelled',
                                'responseData.message',
                                'error'
                            );
                        }
                    }else{
                        swal(
                            'Cancelled',
                            'There was a problem processing your request',
                            'error'
                        );
                    }
                })     
            }else{
                swal(
                    'Cancelled',
                    'Cancelled, item is safe :)',
                    'error'
                );
            }
        });
    });
    // Delete table data
    $("table tbody").on("click", "tr td nav a[data-delete-id]",  function(){
        var _This = $(this);
        var apiEndPoint = _This.closest('table').data('table-url');
        var dataId = _This.data('delete-id');
        var dataUrl = '../../api/v1/'+apiEndPoint+'/delete?id='+dataId;
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            width: '350px',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-primary btn-sm',
            cancelButtonClass: 'btn btn-secondary btn-sm',
            buttonsStyling: false
        }).then( result => {
            if (result.value) {
                var settings = {
                    url: dataUrl,
                    crossDomain: true,
                    type: "GET"
                };
                $.ajax(settings).done(function(response){
                    if(isJSON(response)){
                        var responseData = JSON.parse(response);
                        if(responseData.status == "Success"){
                            swal(
                                'Deleted!',
                                'Item has been deleted.',
                                'success'
                            )
                            setTimeout(location.reload(true), 3000);
                        }else{
                            swal(
                                'Cancelled',
                                responseData.message,
                                'error'
                            );}
                    }else{
                        swal(
                            'Cancelled',
                            'There was a problem processing your request',
                            'error'
                        );
                    }
                })     
            }else{
                swal(
                    'Cancelled',
                    'Cancelled, item is safe :)',
                    'error'
                );
            }
        });
    });
    
    /*  
    * 
    *   Create Timetable Algorithm
    * 
    */
    createTimeTable = (e) => {
        
    }
    // get Calender as Array value
    getCalenderArray = () =>{
        return new Promise( (resolve, reject) => { 
            /* settings = {
                url: "../../api/v1/calender/list",
                async: false,
                crossDomain: true,
                type: "GET"
            }; */
            $.ajax("../../api/v1/calender/list").done(function(response){
                if(isJSON(response)){
                    var jsonResponse = JSON.parse(response);
                    if(jsonResponse.status == "Success"){
                        calenderArray = [];
                        for(var i = 0; i < jsonResponse.response.length; i++){
                            calenderArray.push(jsonResponse.response[i].id);
                        }
                        resolve(calenderArray);
                    }else{
                        resolve(false);
                    }
                }else{
                    resolve(false);
                }
            }).fail(function(jqXHR, textStatus){
                resolve(false);
            });
        })
    }
    // period as array value
    getPeriodArray = () =>{
        return new Promise( (resolve, reject) => { 
            /* settings = {
                url: "../../api/v1/period/list",
                async: false,
                crossDomain: true,
                type: "GET"
            }; */
            $.ajax("../../api/v1/period/list").done(function(response){
                if(isJSON(response)){
                    var jsonResponse = JSON.parse(response);
                    if(jsonResponse.status == "Success"){
                        periodArray = [];
                        for(var i = 0; i < jsonResponse.response.length; i++){
                            periodArray.push(jsonResponse.response[i].id);
                        }
                        resolve(periodArray);
                    }else{
                        resolve(false);
                    }
                }else{
                    resolve(false);
                }
            }).fail(function(jqXHR, textStatus){
                resolve(false);
            });
        })
    }
    // lecture halls as array value
    getLectureHallsArray = () =>{
        return new Promise( (resolve, reject) => { 
            /* settings = {
                url: "../../api/v1/period/list",
                async: false,
                crossDomain: true,
                type: "GET"
            }; */
            $.ajax("../../api/v1/lecture_halls/list").done(function(response){
                if(isJSON(response)){
                    var jsonResponse = JSON.parse(response);
                    if(jsonResponse.status == "Success"){
                        lectureHallsArray = [];
                        for(var i = 0; i < jsonResponse.response.length; i++){
                            lectureHallsArray.push(jsonResponse.response[i].id);
                        }
                        resolve(lectureHallsArray);
                    }else{
                        resolve(false);
                    }
                }else{
                    resolve(false);
                }
            }).fail(function(jqXHR, textStatus){
                resolve(false);
            });
        })
    }
    // lecture halls as array value
    getCourseArray = () =>{
        return new Promise( (resolve, reject) => { 
            /* settings = {
                url: "../../api/v1/period/list",
                async: false,
                crossDomain: true,
                type: "GET"
            }; */
            $.ajax("../../api/v1/course/list").done(function(response){
                if(isJSON(response)){
                    var jsonResponse = JSON.parse(response);
                    if(jsonResponse.status == "Success"){
                        courseArray = [];
                        for(var i = 0; i < jsonResponse.response.length; i++){
                            courseArray.push(jsonResponse.response[i].id);
                        }
                        resolve(courseArray);
                    }else{
                        resolve(false);
                    }
                }else{
                    resolve(false);
                }
            }).fail(function(jqXHR, textStatus){
                resolve(false);
            });
        })
    }

    // Shuffle Array function Fisher-Yates (aka Knuth) Shuffle
    shuffle = (array) => {
        var currentIndex = array.length, temporaryValue, randomIndex;
      
        // While there remain elements to shuffle...
        while (0 !== currentIndex) {
      
          // Pick a remaining element...
          randomIndex = Math.floor(Math.random() * currentIndex);
          currentIndex -= 1;
      
          // And swap it with the current element.
          temporaryValue = array[currentIndex];
          array[currentIndex] = array[randomIndex];
          array[randomIndex] = temporaryValue;
        }
      
        return array;
    }
      
    // random index for the hall
    let cs = (x,y) => x+(y-x+1)*crypto.getRandomValues(new Uint32Array(1))[0]/2**32|0;

    // 
    arrayToObject = (arrayData) => {
        // var arrayDataNames = ["calender", "period", "course", "lecture_hall"];
        var calenderObject = {
            "week_day" : arrayData[0], 
            "period" : arrayData[1], 
            "course" : arrayData[2], 
            "lecture_halls" : arrayData[3]
        };
        return calenderObject;
    }
    // ALgorithm event
    $('button.create-timetable').on('click', function(e){
        // createTimeTable('create-timetable');
        var _This = $(this);
        var tdCells = $('table.timetable-table').find('td');
        var calenderArray = [];
        var periodArray = [];
        var periodDayArray = [];
        var lectureHallsArray = [];
        var courseArray = [];
        var lectureHallsCourseArray = [];
        var lectureHallsCoursePeriodDayArray = [];
        var timetable = [];

        _This.attr('disabled', 'true').children('span').html('<span class="text-light"><i class="fa fa-spinner fa-pulse"></i> processing</span>');
        tdCells.html('<div class="align-center"><div class="spinner-dots spinner-secondary"><span class="dot1"></span><span class="dot2"></span><span class="dot3"></span></div></div>');
        // Get calender id's array list from DB
        getCalenderArray().then( res => {
            calenderArray = res;
            if(calenderArray != false){
                // Get Period id's as array list
                getPeriodArray().then( res2 => {
                    periodArray = res2;
                    if(periodArray != false){
                        for(var i = 0; i < calenderArray.length; i++){
                            for(var j = 0; j < periodArray.length; j++){
                                periodDayArray.push([calenderArray[i],periodArray[j]])
                            }
                        }
                        getLectureHallsArray().then( res3 => {
                            lectureHallsArray = res3;
                            if(lectureHallsArray != false){
                                getCourseArray().then( res4 => {
                                    courseArray = res4;
                                    if(courseArray != false){
                                        var lectureHallsArrayIndex = 0;
                                        for(var i = 0; i < courseArray.length; i++){
                                            lectureHallsCourseArray.push([courseArray[i], 
                                                lectureHallsArray[lectureHallsArrayIndex]]);
                                                if(lectureHallsArrayIndex > lectureHallsArray.length -1 ){
                                                    lectureHallsArrayIndex = 0;
                                                }else{
                                                    lectureHallsArrayIndex = lectureHallsArrayIndex + 1;
                                                }
                                        };
                                        //  // // // // // // // //
                                        shuffle(periodDayArray);
                                        var periodDayArrayIndex = 0;
                                        for(var k = 0; k < lectureHallsCourseArray.length; k++){
                                            lectureHallsCoursePeriodDayArray.push(periodDayArray[periodDayArrayIndex].concat(lectureHallsCourseArray[k]));
                                            if(periodDayArrayIndex > periodDayArray.length -1 ){
                                                periodDayArrayIndex = 0;
                                            }else{
                                                periodDayArrayIndex = periodDayArrayIndex + 1;
                                            }
                                        }
                                        // lectureHallsCoursePeriodDayArray is a complete array of day(calender), period, course and LectureHall in that order
                                        for (let i in lectureHallsCoursePeriodDayArray) {
                                            timetable.push(arrayToObject(lectureHallsCoursePeriodDayArray[i]));
                                        }
                                        var settings = {
                                            url: '../../api/v1/timetable/add_bulk',
                                            method: "POST",
                                            headers: {
                                                "Content-Type": "application/x-www-form-urlencoded",
                                                "Accept": "*/*",
                                                "cache-control": "no-cache"
                                            },
                                            data : {"data" : JSON.stringify(timetable)}
                                        };
                                        $.ajax('../../api/v1/timetable/delete_table').done(function(deleteResponse){
                                            _This.removeAttr('disabled').children('span').html('Run Algorithm');
                                            app.toast('So far, So good on the right track.', {
                                                duration: 7000
                                            });                                            
                                            if(isJSON(deleteResponse)){
                                                var responseData = JSON.parse(deleteResponse);
                                                if(responseData.status == "Success"){
                                                    $.ajax(settings).done(function(response){                                           
                                                        if(isJSON(response)){
                                                            var responseData = JSON.parse(response);
                                                            if(responseData.status == "Success"){
                                                                app.toast('Hurray !!! Algorithm executed successfully.', {
                                                                    duration: 4000
                                                                });
                                                                setTimeout(location.reload(true), 3000);
                                                            }else{
                                                                tdCells.html('');
                                                                _This.removeAttr('disabled').children('span').html('Run Algorithm');
                                                                app.toast('Sorry!'+responseData.message, {
                                                                    duration: 7000
                                                                });
                                                            }
                                                        }else{
                                                            tdCells.html('');
                                                            _This.removeAttr('disabled').children('span').html('Run Algorithm');
                                                            app.toast('Sorry! There was a problem processing your request.', {
                                                                duration: 7000
                                                            });
                                                        }
                                                    }).fail(function(jqXHR, textStatus){
                                                        tdCells.html('');
                                                        _This.removeAttr('disabled').children('span').html('Run Algorithm');
                                                        app.toast('Sorry! There was a problem processing your request. '+textStatus, {
                                                            duration: 7000
                                                        });
                                                    });
                                                }else{
                                                    tdCells.html('');
                                                    _This.removeAttr('disabled').children('span').html('Run Algorithm');
                                                    app.toast('Sorry!'+responseData.message, {
                                                        duration: 7000
                                                    });
                                                }
                                            }else{
                                                tdCells.html('');
                                                _This.removeAttr('disabled').children('span').html('Run Algorithm');
                                                app.toast('Sorry! There was a problem processing your request.', {
                                                    duration: 7000
                                                });
                                            }
                                        }).fail(function(jqXHR, textStatus){
                                            tdCells.html('');
                                            _This.removeAttr('disabled').children('span').html('Run Algorithm');
                                            app.toast('Sorry! There was a problem processing your request. '+textStatus, {
                                                duration: 7000
                                            });
                                        });
                                        // console.log(JSON.stringify(timetable));
                                    }else{
                                        tdCells.html('');
                                        _This.removeAttr('disabled').children('span').html('Run Algorithm');
                                        app.toast('Sorry! There was a problem processing your request.', {
                                            duration: 7000
                                        });
                                    }
                                })
                            }else{
                                tdCells.html('');
                                _This.removeAttr('disabled').children('span').html('Run Algorithm');
                                app.toast('Sorry! There was a problem processing your request.', {
                                    duration: 7000
                                });
                            }
                        });
                        
                    }else{
                        tdCells.html('');
                        _This.removeAttr('disabled').children('span').html('Run Algorithm');
                        app.toast('Sorry! There was a problem processing your request.', {
                            duration: 7000
                        });
                    }
                });
            }else{
                tdCells.html('');
                _This.removeAttr('disabled').children('span').html('Run Algorithm');
                app.toast('Sorry! There was a problem processing your request.', {
                    duration: 7000
                });
            }
        });
        // console.log(lectureHallsCoursePeriodDayArray);
        // tdCells.html('');
        // _This.removeAttr('disabled').children('span').html('Run Algorithm');
        // app.toast('So far, So good on the right track.', {
        //     duration: 7000
        // });
    });
});