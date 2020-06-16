<?php include_once("auth/index.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once("../include/meta-tags.php"); ?>
        <title>Sidebar Documentation &mdash; TheAdmin</title>
        <?php include_once("../include/links.php"); ?>
    </head>
    <body>
        <!-- Preloader -->
        <?php include_once("../include/preloader.php"); ?>
        <!-- Sidebar -->
        <aside class="sidebar sidebar-expand-lg sidebar-color-brown sidebar-icons-boxed sidebar-light">
            <?php include_once('../include/sidebar.php') ?>
        </aside>
        <!-- END Sidebar -->
        
        <!-- Topbar -->
        <header class="topbar">
            <?php include_once('../include/header.php') ?>
        </header>
        <!-- END Topbar -->


        <!-- Main container -->
        <main class="main-container">
            <div class="main-content">
                <!-- List Content Card Starts-->
                <div class="card rounded-lg shadow-1">
                    <div class="card-header">
                        <h5 class="card-title">
                            <span class="icon fa fa-calendar-check-o text-muted"></span>
                            <strong>Timetable</strong>
                        </h5>
                        <form class="lookup lookup-circle lookup-right lookup-sm">
                            <input type="text" name="s">
                        </form>
                    </div>
                    <div class="card-body bg-lighter bl-3 border-success p-0">
                        <div class="p-4 d-flex justify-content-between bb-1 border-light">
                            <div class="w-75">
                                <div class="fs-12 text-muted"><i class="ti-time mr-1"></i> Info</div>
                                <div class="fs-16">Add <span class="text-danger">Courses</span>, <span class="text-danger">Calender</span>, <span class="text-danger">Departments</span>, <span class="text-danger">Lecture Halls</span>, and <span class="text-danger">Periods</span> before running the <span class="text-primary">Timetable Algorithm</span>. </div>
                            </div>
                            <div>
                                <div class="w-100 text-right pt-3">
                                    <button class="btn btn-label btn-primary create-timetable"> <span>Run Algorithm </span><label><i class="fa fa-calendar-check-o"></i></label></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- data-provide="datatables" -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped timetable-table" data-table-url="timetable">
                            <thead>
                                <tr class="bg-lightest">
                                    <th class="bg-pale-brown text-center font-weight-bold w-120px"><i class="fa fa-dot-circle-o"></i></th>
                                    <th class="font-weight-bold">Monday</th>
                                    <th class="font-weight-bold">Tuesday</th>
                                    <th class="font-weight-bold">Wednesday</th>
                                    <th class="font-weight-bold">Thursday</th>
                                    <th class="font-weight-bold">Friday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-period-id="1">
                                    <th class="font-weight-bold">&CenterDot; 07<span class="d-none">:00:00</span> AM &CenterDot;</th>
                                    <td class="bg-pale-info" data-day-id="1"></td>
                                    <td class="bg-pale-info" data-day-id="2"></td>
                                    <td class="bg-pale-info" data-day-id="3"></td>
                                    <td class="bg-pale-info" data-day-id="4"></td>
                                    <td class="bg-pale-info" data-day-id="5"></td>
                                </tr>
                                <tr data-period-id="2">
                                    <th class="font-weight-bold">&CenterDot; 08<span class="d-none">:00:00</span> AM &CenterDot;</th>
                                    <td class="bg-pale-info" data-day-id="1"></td>
                                    <td class="bg-pale-info" data-day-id="2"></td>
                                    <td class="bg-pale-info" data-day-id="3"></td>
                                    <td class="bg-pale-info" data-day-id="4"></td>
                                    <td class="bg-pale-info" data-day-id="5"></td>
                                </tr>
                                <tr data-period-id="3">
                                    <th class="font-weight-bold">&CenterDot; 09<span class="d-none">:00:00</span> AM &CenterDot;</th>
                                    <td class="bg-pale-info" data-day-id="1"></td>
                                    <td class="bg-pale-info" data-day-id="2"></td>
                                    <td class="bg-pale-info" data-day-id="3"></td>
                                    <td class="bg-pale-info" data-day-id="4"></td>
                                    <td class="bg-pale-info" data-day-id="5"></td>
                                </tr>
                                <tr data-period-id="4">
                                    <th class="font-weight-bold">&CenterDot; 10<span class="d-none">:00:00</span> AM &CenterDot;</th>
                                    <td class="bg-pale-info" data-day-id="1"></td>
                                    <td class="bg-pale-info" data-day-id="2"></td>
                                    <td class="bg-pale-info" data-day-id="3"></td>
                                    <td class="bg-pale-info" data-day-id="4"></td>
                                    <td class="bg-pale-info" data-day-id="5"></td>
                                </tr>
                                <tr data-period-id="5">
                                    <th class="font-weight-bold">&CenterDot; 11<span class="d-none">:00:00</span> AM &CenterDot;</th>
                                    <td class="bg-pale-info" data-day-id="1"></td>
                                    <td class="bg-pale-info" data-day-id="2"></td>
                                    <td class="bg-pale-info" data-day-id="3"></td>
                                    <td class="bg-pale-info" data-day-id="4"></td>
                                    <td class="bg-pale-info" data-day-id="5"></td>
                                </tr>
                                <tr data-period-id="6">
                                    <th class="font-weight-bold">&CenterDot; 12<span class="d-none">:00:00</span> NOON &CenterDot;</th>
                                    <td class="bg-pale-info" data-day-id="1"></td>
                                    <td class="bg-pale-info" data-day-id="2"></td>
                                    <td class="bg-pale-info" data-day-id="3"></td>
                                    <td class="bg-pale-info" data-day-id="4"></td>
                                    <td class="bg-pale-info" data-day-id="5"></td>
                                </tr>
                                <tr data-period-id="7">
                                    <th class="font-weight-bold">&CenterDot; 01<span class="d-none">:00:00</span> PM &CenterDot;</th>
                                    <td class="bg-pale-info" data-day-id="1"></td>
                                    <td class="bg-pale-info" data-day-id="2"></td>
                                    <td class="bg-pale-info" data-day-id="3"></td>
                                    <td class="bg-pale-info" data-day-id="4"></td>
                                    <td class="bg-pale-info" data-day-id="5"></td>
                                </tr>
                                <tr data-period-id="8">
                                    <th class="font-weight-bold">&CenterDot; 02<span class="d-none">:00:00</span> PM &CenterDot;</th>
                                    <td class="bg-pale-info" data-day-id="1"></td>
                                    <td class="bg-pale-info" data-day-id="2"></td>
                                    <td class="bg-pale-info" data-day-id="3"></td>
                                    <td class="bg-pale-info" data-day-id="4"></td>
                                    <td class="bg-pale-info" data-day-id="5"></td>
                                </tr>
                                <tr data-period-id="9">
                                    <th class="font-weight-bold">&CenterDot; 03<span class="d-none">:00:00</span> PM &CenterDot;</th>
                                    <td class="bg-pale-info" data-day-id="1"></td>
                                    <td class="bg-pale-info" data-day-id="2"></td>
                                    <td class="bg-pale-info" data-day-id="3"></td>
                                    <td class="bg-pale-info" data-day-id="4"></td>
                                    <td class="bg-pale-info" data-day-id="5"></td>
                                </tr>
                                <tr data-period-id="10">
                                    <th class="font-weight-bold">&CenterDot; 04<span class="d-none">:00:00</span> PM &CenterDot;</th>
                                    <td class="bg-pale-info" data-day-id="1"></td>
                                    <td class="bg-pale-info" data-day-id="2"></td>
                                    <td class="bg-pale-info" data-day-id="3"></td>
                                    <td class="bg-pale-info" data-day-id="4"></td>
                                    <td class="bg-pale-info" data-day-id="5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- List Content Card Ends-->
            </div>
            <!--/.main-content -->
            <!-- Footer -->
            <footer class="site-footer">
                <?php include_once("../include/footer.php"); ?>
            </footer>
            <!-- END Footer -->
        </main>
        <!-- END Main container -->
        <div class="fab fab-fixed">
            <a class="btn btn-float btn-primary" href="#dock-new-user" title="" data-provide="tooltip" data-toggle="dock" data-original-title="New Timetable">
                <i class="ti-plus"></i>
            </a>
        </div>
        <!-- Dock - Add ... -->
        <div class="dock-list">
            <div id="dock-new-user" class="dock dock-sm">
                <header class="dock-header dock-header-inverse bg-brown">
                    <div class="dock-title">
                        <span><i class="fa fa-user"></i></span>
                        <span>New Time Table</span>
                    </div>

                    <div class="dock-actions">
                        <span title="" data-provide="tooltip" data-dock="close" data-original-title="Close"></span>
                        <span title="" data-provide="tooltip" data-dock="minimize" data-original-title="Minimize"></span>
                    </div>
                </header>
                <div class="dock-body dock-block">
                    <div class="alert alert-success d-none" id="formAlertSuccess">
                        <span class="">Data Successfully Added, page will refresh in 1 Second <i class="fa fa-check-circle"></i>
                        </span>
                    </div>
                    <div class="alert alert-danger d-none" id="formAlertError">
                        <span id="formErrorMessage">
                        </span> <i class="fa fa-exclamation-circle"></i>
                    </div>
                    <!--  regular-form -->
                    <form class="form-type-material" data-submit-url="timetable">
                        <div class="form-group">
                            <select class="form-control" name="period" id="period" required>
                                <option value="1">Pre-Period: 7:00 AM</option>
                                <option value="2">First-Period: 8:00 AM</option>
                            </select>
                            <label>Period</label>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="week_day" id="weekDay" required>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                            </select>
                            <label>Week Day</label>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="course" id="course" required>
                                <option value="1">Artificial Intelligence</option>
                                <option value="2">Computer History</option>
                            </select>
                            <label>Course</label>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="hall" id="hall" required>
                                <option value="1">New Engineering Hall II : 256</option>
                                <option value="2">Amphitheater History : 500</option>
                            </select>
                            <label>Hall</label>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="lecturer" id="lecturer" required>
                                <option value="1">Maven Michael</option>
                            </select>
                            <label>Lecturer</label>
                        </div>
                      
                        <div class="form-group text-right">
                            <button class="btn btn-flat btn-primary submit-data" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Dock - Compose an email -->
        </div>
        <!-- END Dock - Add ... -->
        <!-- Scripts -->
        <?php include_once("../include/scripts.php"); ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $.ajax({
                url: '../../api/v1/timetable/list',
                crossDomain: true,
                type: "GET"
                }).done(function(response){
                    if(isJSON(response)){
                        var responseData = JSON.parse(response);
                        if(responseData.status == "Success"){
                            var data = responseData.response;
                            $.each(data, function(i,item){
                                $("tr[data-period-id="+item.period[0].id+"] td[data-day-id="+item.week_day[0].id+"]")
                                    .append('<button type="button" class="py-0 my-0 fs-11 hover-dark text-nowrap single-timetable-item'
                                    +' text-truncate d-block w-140px btn btn-white b-0 btn-sm px-1" '
                                    +' data-placement="top" data-popover-content="#pop'+item.id+'" data-toggle="popover" data-trigger="focus">'
                                    +item.course[0].name+'<span class="fs-10 text-muted">('
                                    +item.course[0].course_code+')</span></button>'
                                    +'<div class="d-none" id="pop'+item.id+'"><div class="popover-heading"><div class="m-n2 px-1">'
                                    +item.course[0].name+'<span class="fs-10 text-muted">('+item.course[0].course_code
                                    +')</span></div></div><div class="popover-body"><div class="mt-n2 mx-n2 p-2 bt-2 border-danger">'
                                    +'<p class="my-0 pb-1 pt-0"><span class="fs-12 text-muted"> Lecturer<span class="divider-line mx-1"></span></span>'
                                    +(item.lecturer[0] ? item.lecturer[0].first_name+' '
                                    +item.lecturer[0].last_name : "No lecturer")+'</p>'
                                    +'<p class="my-0 pb-1 pt-0"><span class="fs-12 text-muted"> Hall<span class="divider-line mx-1"></span></span>'
                                    +item.hall[0].hall_name+' <span class="fs-12 text-muted"> ( '+item.hall[0].capacity+' )</span></p></div></div></div>');
                            });
                        }else{

                        }
                    }else{
                            
                    }
                    
                    app.toast('Hurray! Data loaded successfully.', {
                        duration: 7000
                    });
                }).fail(function(textStatus){
                    // console.log(response);
                    // tdCells.html('');
                    // _This.removeAttr('disabled').children('span').html('Run Algorithm');
                    app.toast('Sorry! There was a problem processing your request. '+textStatus, {
                        duration: 7000
                    });
                });
                $('body').popover({
                    selector: '[data-toggle="popover"]',
                    html : true, 
                    trigger:'hover',
                    content: function(){
                        var content = $(this).data('popover-content');
                        return $(content).children('.popover-body').html();
                    },
                    title: function(){
                        var title = $(this).data('popover-content');
                        return $(title).children('.popover-heading').html();
                    },
                })
                $('tr > td').on('click', 'button.single-timetable-item', function(){
                    
                })
            });
        </script>
    </body>
</html>
