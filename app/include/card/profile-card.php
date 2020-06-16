<!-- Profile card starts -->
<div class="card p-30 pt-50 text-center">
    <div>
        <a class="avatar avatar-xxl status-success mb-3" href="profile.php">
        <img src="../../assets/img/avatar/1.jpg" alt="...">
        </a>
    </div>
    <h5 class="mb-0 pb-0"><a href="../page/profile.html"><?=$userName;?></a></h5>
    <p class="mt-0 pt-0"><small class="fs-13"><?=ucwords($userType);?></small></p>
    <?php if($userType == 'staff'){ ?>
    <p class="text-light fs-12 mb-30">Welcome <span class="text-brown"><?=ucwords($userName);?></span>. As a staff this dashboard allows you to monitor and manage the Tabuler system.</p>
    <?php }else if($userType == 'lecturer'){ ?>
    
    <?php }else{ ?>

    <?php } ?>
    <div class="gap-items fs-16">
        <a class="text-facebook" href="#">
            <span class="fs-12"><i class="ti-email"></i></span> 
            <span class="font-weight-400 text-muted"><?=$email;?></span>
        </a>
    </div>
</div>
<!-- Profile card ends -->