<?php

use libs\DB;
?>
<!-- Navbar -->
 <nav class="navbar navbar-expand-lg tt_navbar" style="height:58px;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars fa-1x tticon"></i>
    </button>


    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarText">

            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="<?php echo Url(); ?>">
                <img src="<?= Url('assets/images/logo.webp') ?>" height="45" alt="" loading="lazy" />
            </a>
            <!-- Left links --> <?php
            if (Visitor('id')) { ?>
            <form class="d-none d-md-flex ms-4" method='get' action='<?= Url('forum/search') ?>'>
                <input class="form-control border-0" type="search" placeholder="Search" id="keywords" type="text" name="keywords">
            </form> <?php
            } ?>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
        <!-- Right elements -->
        <div class="d-flex align-items-center">
        <!-- messages --> <?php
        if (Visitor('id')) { 
            $arr = DB::run(
                "SELECT messages.*, users.avatar, users.username, users.class, `groups`.Color
                FROM messages 
                LEFT JOIN users ON users.id=messages.sender 
                LEFT JOIN `groups` ON groups.group_id=users.class
                WHERE receiver=" . Visitor("id") . " and unread='yes' AND location IN ('in','both')"
            )->fetchAll();
            $unreadmail = count($arr); ?>

            <div class="dropdown m-2">
                <a href="#" data-bs-toggle="dropdown"><i class="fa fa-envelope me-lg-2"></i><?php
                if ($unreadmail !== 0) {
                    print("<span class='badge rounded-pill badge-notification bg-danger'>($unreadmail)</span></a>");
                } else {
                    print("<span class='badge rounded-pill badge-notification bg-danger'></span></a>");
                } ?>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="<?= Url('profile?id='. Visitor("id").'') ?>" class="dropdown-item">My Profile</a> <?php                    foreach ($arr as $message) {
                        $avatar = $message['avatar'] == '' ? Url('assets/images/misc/default_avatar.webp"')  : $message['avatar']; ?>
                            <a href="<?php echo Url("message?id=$message[id]&type=inbox") ?>" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="<?php echo $avatar; ?>" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0"> PM by <span style="color:<?php echo $message['Color'] ?>;"><?php echo $message['username'] ?></span></h6>
                                        <small><?php echo get_time_elapsed($message['added']); ?></small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider"> <?php
                    }
                    if ($unreadmail == 0) { ?>
                        <h6 class="fw-normal mb-0">No New messages</h6>
                        <hr class="dropdown-divider"> <?php
                    } ?>
                    <a href="<?php echo Url('mailbox?type=inbox') ?>" class="dropdown-item text-center">See all message</a>
                </div>
            </div>&nbsp;


            <!-- Notififcatation --> <?php
            $arr1 = DB::run(
                "SELECT *
                FROM notifications 
                WHERE `user_id` = ? AND `read` = ?",
                [Visitor("id"), 'no']
            )->fetchAll();
            $unreadnotif = count($arr1);  ?>
            <div class="dropdown m-2">
                <a href="#" data-bs-toggle="dropdown"><i class="fa fa-bell me-lg-2"></i><?php
                if ($unreadnotif !== 0) {
                    print("<span class='d-none d-lg-inline-flex'>Notification ($unreadnotif)</span></a>");
                } else {
                    print("<span class='badge rounded-pill badge-notification bg-danger'></span></a>");
                } ?>
                <div class="dropdown-menu dropdown-menu-end"> <?php
                foreach ($arr1 as $message) { ?>
                        <a href="<?php echo Url("notification/read?id=$message[id]") ?>" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0"><?php echo Cutname($message['title'], 15); ?></h6>
                                    <small><?php echo get_time_elapsed($message['added']); ?></small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider"> <?php
                    }
                    if ($unreadnotif == 0) { ?>
                            <h6 class="fw-normal mb-0">No New notifications</h6>
                            <hr class="dropdown-divider"> <?php
                    } ?>
                    <a href="<?php echo Url('notification') ?>" class="dropdown-item text-center">See all notifications</a>
                </div>
            </div>

            <!-- Avatar --> <?php
            $avatar = htmlspecialchars(Visitor("avatar"));
            if (!$avatar) {
                $avatar = Url("assets/images/misc/default_avatar.webp");
            } ?>
            <!-- Default dropstart button -->
            <div class="dropdown m-2">
                <a href="#" data-bs-toggle="dropdown"><img class="rounded-circle me-lg-2" src="<?php echo $avatar ?>" alt="" style="width: 40px; height: 40px;"></a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="<?php echo Url("profile?id=". Visitor("id") ."") ?>" class="dropdown-item">My Profile</a> <?php
                    if (Visitor('class') > _MODERATOR) { ?>
                        <a href="<?php echo Url('admincp') ?>" class="dropdown-item">Staff CP</a> <?php
                    }
                    if (Visitor('id')) { ?>
                        <a href="<?php echo Url('logout') ?>" class="dropdown-item">Logout</a> <?php
                    } ?>
                </div>
            </div> <?php
        } else { ?>
            <a href="<?php echo Url('user/login') ?>">Login</a> <?php
        } ?>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->