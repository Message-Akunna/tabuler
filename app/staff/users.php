<?php 
    include_once("auth/index.php"); 
    include_once("../api-call.php");
    
    /*//////////////////
    *
    *  Get Users Stats
    *  @param return int
    *
    /////////////////// */
    function get_stats($table, $query){
        $stats = callAPI('GET', $table.'/list'.$query, false)['list_total'];
        return $stats;
    }
    /*
    *
    *  Get Users type color
    *  @param return string
    *
    */
    function get_user_type_icon($userTypeStr){
        if ($userTypeStr == "staff") {
            return '<span class="badge badge-dot badge-danger"></span>';
        }else if ($userTypeStr == "lecturer") {
            return '<span class="badge badge-dot badge-warning"></span>';
        }else{
            return '<span class="badge badge-dot badge-primary"></span>';
        }
    }

    // 
    $user = callAPI('GET','user/list', false);
    $userStatus = $user['status'];
    $userListTotal = $user['list_total'];
    $userData = $user['response'];
    // 
    if(isset($_GET['users'])){
        $user = callAPI('GET','user/list?column=user_type&keyword='.$_GET['users'], false);
        $userStatus = $user['status'];
        $userListTotal = $user['list_total'];
        $userData = $user['response'];
    }
?>
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
            <!-- Page aside -->
            <aside class="aside aside-expand-md">
                <!--  data-ps-id="15919345-3b48-225a-fde1-12a9856b3aa1" -->
                <div class="aside-body ps-container ps-theme-default">
                    <ul class="nav nav-lg nav-pills flex-column">
                        <li class="nav-item <?=(isset($_GET['users'])? '': 'active');?>">
                            <i class="fa fa-users text-dark"></i>
                            <a class="nav-link" href="users">All Users</a>
                            <span class="badge badge-pill badge-default bg-pale-dark"><?=(get_stats('user',''))?></span>
                        </li>
                        <li class="nav-item <?=($_GET['users'] == 'staff'? 'active': '');?>">
                            <i class="fa fa-users text-danger"></i>
                            <a class="nav-link" href="users?users=staff">All Staffs</a>
                            <span class="badge badge-pill badge-default bg-pale-danger"><?=(get_stats('user','?column=user_type&keyword=staff'))?></span>
                        </li>

                        <li class="nav-item <?=($_GET['users'] == 'lecturer'? 'active': '');?>">
                            <i class="fa fa-users text-warning"></i>
                            <a class="nav-link" href="users?users=lecturer">All Lecturers</a>
                            <span class="badge badge-pill badge-default bg-pale-warning"><?=(get_stats('user','?column=user_type&keyword=lecturer'))?></span>
                        </li>

                        <li class="nav-item <?=($_GET['users'] == 'student'? 'active': '');?>">
                            <i class="fa fa-users text-primary"></i>
                            <a class="nav-link" href="users?users=student">All Students</a>
                            <span class="badge badge-pill badge-default bg-pale-primary"><?=(get_stats('user','?column=user_type&keyword=student'))?></span>
                        </li>

                    </ul>
                    <hr>
                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 2px;">
                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                </div>
                <button class="aside-toggler"></button>
            </aside>
            <!-- END Page aside -->

            <div class="main-content">
                <!--  data-alt-provide="selectall" scrollable style="height: 400px"-->
                <div class="media-list media-list-divided media-list-hover " data-provide="selectall shuffle" >
                    <header class="flexbox align-items-center media-list-header bg-transparent b-0 py-16 pl-20">
                        <div class="flexbox align-items-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"></label>
                            </div>

                            <span class="divider-line mx-1"></span>

                            <div class="btn-group btn-group-sm" data-shuffle="filter" >
                                <button class="btn btn-light" data-shuffle="button" ><span class="badge badge-dot badge-dark"></span> All</button>
                                <button class="btn btn-light" data-shuffle="button" data-group="staffs" ><span class="badge badge-dot badge-danger"></span> Staffs</button>
                                <button class="btn btn-light" data-shuffle="button" data-group="lecturers" ><span class="badge badge-dot badge-warning"></span>  Lecturers</button>
                                <button class="btn btn-light" data-shuffle="button" data-group="students" ><span class="badge badge-dot badge-primary"></span>  Students</button>
                            </div>
                            <!-- <div class="dropdown">
                                <a class="btn btn-sm dropdown-toggle rounded-lg" data-toggle="dropdown" href="#" aria-expanded="false">Sort by</a>
                                <div class="dropdown-menu" data-shuffle="filter" x-placement="bottom-start" style="position: absolute; will-change: top, left; top: 30px; left: 0px;">
                                    <button class="dropdown-item w-150px" data-shuffle="button" href="#"><span class="badge badge-ring badge-dark mr-1"></span> All Users</button>
                                    <button class="dropdown-item w-150px" data-shuffle="button" data-group="staffs" href="#"><span class="badge badge-ring badge-danger mr-1"></span> Staffs</button>
                                    <button class="dropdown-item w-150px" data-shuffle="button" data-group="lecturers" href="#"><span class="badge badge-ring badge-warning mr-1"></span> Lecturers</button>
                                    <button class="dropdown-item w-150px" data-shuffle="button" data-group="students" href="#"><span class="badge badge-ring badge-info mr-1"></span> Students</button>
                                </div>
                            </div> -->
                        </div>

                        <div class="lookup lookup-circle lookup-right lookup-sm ">
                            <input type="text" data-provide="media-search">
                        </div>
                    </header>


                    <div class="media-list-body rounded-lg scrollable" data-shuffle="list">
                        <!-- Media list start -->
                        <?php
                            $sn=0;
                            foreach ($userData as $row) {
                            $sn++;
                        ?>
                        <!-- Media Item -->
                        <div class="media align-items-center hover-shadow-1 bg-white w-100 media-single" data-shuffle="item" data-groups="<?=($row['user_type'][0]['user_type'])?>s">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"></label>
                            </div>

                            <?=(get_user_type_icon($row['user_type'][0]['user_type']))?>
                            <a class="flexbox flex-grow gap-items text-truncate" data-edit-id="<?=$row['id']?>" href="#qv-user-details" data-toggle="quickview">
                                <img class="avatar" src="../../assets/img/avatar/1.jpg" alt="...">
                                <div class="media-body text-truncate">
                                    <h6><?=($row['first_name'].' '.$row['last_name'].' '.$row['other_names'])?></h6>
                                    <small>
                                        <span><?=($row['email'])?> </span>
                                        <span class="divider-dash"> (+234) <?=($row['phoneno'])?></span>
                                    </small>
                                </div>
                            </a>

                            <label class="toggler ml-20 fs-16">
                                <input type="checkbox">
                                <i class="fa fa-star"></i>
                            </label>

                            <div class="w-40px pt-1">
                                <span class="text-center fs-20">
                                    <a class="nav-link hover-danger" href="#" data-delete-id="<?=$row['id']?>" data-provide="tooltip" title="" data-original-title="Delete"><i class="ti-trash"></i></a>
                                </span>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <!--  Media list end -->
                    </div>
                    <footer class="flexbox align-items-center py-20">
                        <span class="flex-grow text-right text-lighter pr-2">1-10 of 1,853</span>
                        <nav>
                            <a class="btn btn-sm btn-square disabled" href="#"><i class="ti-angle-left"></i></a>
                            <a class="btn btn-sm btn-square" href="#"><i class="ti-angle-right"></i></a>
                        </nav>
                    </footer>

                </div>
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
            <a class="btn btn-float btn-primary" href="#dock-new-user" title="" data-provide="tooltip" data-toggle="dock" data-original-title="New User">
                <i class="ti-plus"></i>
            </a>
        </div>
        <!-- Quickview - User detail -->
        <div id="qv-user-details" class="quickview quickview-lg">
            <div class="quickview-body">

                <div class="card card-inverse bg-lightest">
                    <div class="flexbox px-20 pt-20">
                        <label class="toggler text-dark">
                            <input type="checkbox">
                            <i class="fa fa-star"></i>
                        </label>

                        <a class="text fs-20 lh-1" href="#"><i class="fa fa-trash"></i></a>
                    </div>

                    <div class="card-body text-center pb-50">
                        <a href="#">
                            <img class="avatar avatar-xxl avatar-bordered" src="../../assets/img/avatar/1.jpg">
                        </a>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text" href="#" id="userNameCard">Message Akunna</a></h4>
                        <span class="text-dark"><i class="fa fa-map-marker w-20px"></i><span class="" id="userAddressCard"> Maitama, Abuja Nigeria.</span></span>
                    </div>
                </div>

                <div class="quickview-block">
                    <form class="form-type-material update-user-form" id="updateUserForm">
                        <div class="form-group do-float">
                            <input type="text" class="form-control" name="user_first_name" id="userFirstName">
                            <label>First Name</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group do-float">
                                    <input type="text" class="form-control"  name="user_last_name" id="userLastName">
                                    <label>Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group do-float">
                                    <input type="text" class="form-control"  name="user_other_names" id="userOtherNames">
                                    <label>Other Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group do-float">
                            <input type="text" class="form-control" name="user_email" id="userEmail">
                            <label>Email Address</label>
                        </div>
                        <div class="form-group do-float">
                            <input type="text" class="form-control"  name="user_phoneno" id="userPhoneno">
                            <label>Phone Number</label>
                        </div>
                        <div class="form-group do-float">
                            <input type="text" class="form-control"  name="user_password" id="userPassword">
                            <label>Password</label>
                        </div>
                        <div class="form-group do-float">
                            <input type="text" class="form-control"  name="user_address" id="userAddress">
                            <label>Address</label>
                        </div>
                        <div class="form-group do-float">
                            <button class="btn btn-flat btn-primary" type="submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>

            <footer class="p-12 text-right">
                <button class="btn btn-flat btn-secondary" type="button" data-toggle="quickview">Cancel</button>
            </footer>
        </div>
        <!-- END Quickview - User detail -->
        <!-- Dock - Add user -->
        <div class="dock-list">
            <div id="dock-new-user" class="dock dock-sm">
                <header class="dock-header dock-header-inverse bg-brown">
                    <div class="dock-title">
                        <span><i class="fa fa-user"></i></span>
                        <span>New User</span>
                    </div>

                    <div class="dock-actions">
                        <span title="" data-provide="tooltip" data-dock="close" data-original-title="Close"></span>
                        <span title="" data-provide="tooltip" data-dock="minimize" data-original-title="Minimize"></span>
                    </div>
                </header>

                <div class="dock-body dock-block">
                    <div class="alert alert-success d-none" id="formAlertSuccess">
                        <span class="">Data Successfully Added, page will refresh in 1 Second <i class="fas fa-check-circle"></i>
                        </span>
                    </div>
                    <div class="alert alert-danger d-none" id="formAlertError">
                        <span id="formErrorMessage">
                        </span> <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <form class="form-type-material add-user-form" id="addUserForm">
                        <div class="user-data-block" id="userDataBlock">
                            <div class="form-group">
                                <input type="text" class="form-control" value="John" name="first_name" id="firstName" required>
                                <label>First Name</label>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <input type="text" class="form-control"  value="Doe" name="last_name" id="lastName" required>
                                        <label>Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  value="Unknown" name="other_names" id="otherName">
                                        <label>Other Names</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  value="08093343223" name="phoneno" id="phoneNo" required>
                                <label>Phone Number</label>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control"  value="john.doe@gmail.com" name="email" id="email" required>
                                <label>Email Address</label>
                            </div>

                            <div class="form-group">
                                <input type="text" value="1234" class="form-control" name="password" id="password" required>
                                <label>Password</label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="address"  value="No. 22 Maitama Str. Abuja Nigeria." id="address" required>
                                <label>Address</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <select class="form-control" name="gender" id="gender" required>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select>
                                        <label>Gender</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="user_type" id="userType" required>
                                            <option value="staff">Staff</option>
                                            <option value="lecturer">Lecturer</option>
                                            <option value="student">Student</option>
                                        </select>
                                        <label>User Type</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-type-block" id="userTypeBlock">
                            <!--  -->
                            <div class="staff" id="staffUserType" style="display: none">

                            </div>
                            <!--  -->
                            <div class="lecturer" id="lecturerUserType" style="display: none">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select class="form-control change-department" name="department" id="department" required>
                                                <?php include('../include/options/department.php')?>
                                            </select>
                                            <label>Department</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select class="form-control change-course" name="course" id="course" required>
                                                <option value=" ">Select a department</option>
                                                <!-- <?php include('../include/options/course.php')?> -->
                                            </select>
                                            <label>Course</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="student" id="studentUserType" style="display: none">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <select class="form-control" name="department" id="departmentStudent">
                                                <?php include('../include/options/department.php')?>
                                            </select>
                                            <label>Department</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select class="form-control" name="level" id="level">
                                                <option value="100">100</option>
                                                <option value="100">200</option>
                                                <option value="100">300</option>
                                                <option value="400">400</option>
                                                <option value="500">500</option>
                                            </select>
                                            <label>Level</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select class="form-control" name="session" id="session">
                                                <?php include('../include/options/sessions.php')?>
                                            </select>
                                            <label>Session</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-flat btn-primary submit-user-data" type="submit">Add User</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Dock - Compose an email -->
        </div>
        <!-- END Dock - Add user -->
        <!-- Scripts -->
        <?php include_once("../include/scripts.php"); ?>
        <script type="text/javascript">
            $(document).ready(function(e){
                $('select#userType').on('change', function(e){
                    var userType = $("#userType option:selected").val();
                    $('#'+userType+'UserType').fadeIn();
                    $('#userTypeBlock').children('div').not('#'+userType+'UserType').fadeOut();
                });
                // Edit user function
                $('a[data-edit-id]').on('click', function(e){
                    var _This = $(this);
                    var userId = _This.data('edit-id');
                    $.ajax('../../api/v1/user/list?id='+userId).done(function(response){
                        // console.log(response);
                        if(isJSON(response)){
                            var responseData = JSON.parse(response);
                            var data = responseData.response;
                            $.each(data[0], function(i,item){
                                $('input[name=user_'+i+']').val(item);
                                $('select[name=user_'+i+']').val(item);
                                $('select[name=user_'+i+']').change();
                           });
                            
                            $('#userNameCard').html(data[0].first_name+' '+data[0].last_name);
                            $('#userAddressCard').html(data[0].address);
                        }else{

                        }
                        // $('#qv-user-details').html(response);
                    }).fail(function(jqXHR, textStatus){
                        
                    })
                })
            });
        </script>
    </body>
</html>
