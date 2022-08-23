<?php
//menu code
$mainMenu= "
                        <!-- NAVIGATION START -->
                            <div class='pcoded-navigatio-lavel' data-i18n='nav.category.navigation' menu-title-theme='theme5'>Navigation</div>
                            <ul class='pcoded-item pcoded-left-item'>
                            <li class='active'>
                                <a href='dashboard' data-i18n='nav.sample-page.main'>
                                    <span class='pcoded-micon'><i class='ti-home'></i></span>
                                    <span class='pcoded-mtext'>Dashboard</span>
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