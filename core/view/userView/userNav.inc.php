<?php
//menu code
$mainMenu= "
                        <!-- NAVIGATION START -->
                            <div class='pcoded-navigatio-lavel' data-i18n='nav.category.navigation' menu-title-theme='theme5'>HOME</div>
                            <ul class='pcoded-item pcoded-left-item'>
                            <li class='' id='dashboard'>
                                <a href='dashboard' data-i18n='nav.sample-page.main'>
                                    <span class='pcoded-micon'><i class='fa fa-home'></i></span>
                                    <span class='pcoded-mtext'>Dashboard</span>
                                    <span class='pcoded-mcaret'></span> 
                                </a>
                            </li>
                               
                            </ul>

                            <div class='pcoded-navigatio-lavel' data-i18n='nav.category.navigation' menu-title-theme='theme5'>Appointments</div>
                            <ul class='pcoded-item pcoded-left-item'>
                            <li class=''>
                                <a href='#' data-i18n='nav.sample-page.main'>
                                    <span class='pcoded-micon'><i class='fa fa-check-square'></i></span>
                                    <span class='pcoded-mtext'>Book Appointment</span>
                                    <span class='pcoded-mcaret'></span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='#' data-i18n='nav.sample-page.main'>
                                    <span class='pcoded-micon'><i class='fa fa-calendar-plus-o'></i></span>
                                    <span class='pcoded-mtext'>View Appointments</span>
                                    <span class='pcoded-mcaret'></span>
                                </a>
                            </li>
                               
                            </ul>

                            
                            <div class='pcoded-navigatio-lavel' data-i18n='nav.category.navigation' menu-title-theme='theme5'>Payments</div>
                            <ul class='pcoded-item pcoded-left-item'>
                            <li class=''>
                                <a href='#' data-i18n='nav.sample-page.main'>
                                    <span class='pcoded-micon'><i class='fa fa-money'></i></span>
                                    <span class='pcoded-mtext'>Payments History</span>
                                    <span class='pcoded-mcaret'></span>
                                </a>
                            </li>
                               
                            </ul>

                            <div class='pcoded-navigatio-lavel' data-i18n='nav.category.navigation' menu-title-theme='theme5' >SETTINGS</div>
                            <ul class='pcoded-item pcoded-left-item'>
                                <li class=''>
                                <a href='#' data-i18n='nav.sample-page.main'>
                                    <span class='pcoded-micon'><i class='fa fa-cogs'></i></span>
                                    <span class='pcoded-mtext'>Profile</span>
                                    <span class='pcoded-mcaret'></span>
                                </a>
                            </li>
                                
                            </ul> 
                            <!-- NAVIGATION ENDS -->

";

$dropDownMenu= "
<ul class='dropdown-menu dropdown-user'>
    <li><a href='javascript:void(0)' data-toggle='modal' data-target='#userProfile'><i class='fa fa-user fa-fw'></i>Profile</a>
    </li>
    <li><a href='settings'><i class='fa fa-gear fa-fw'></i>Settings</a>
    </li>
    <li class='divider'></li>
    <li><a href='../core/modal/Auth/logout'><i class='fa fa-sign-out fa-fw'></i>Logout</a>
    </li>
</ul>
";




?>