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

                            <div class='pcoded-navigatio-lavel' data-i18n='nav.category.navigation' menu-title-theme='theme5'>Doctors</div>
                            <ul class='pcoded-item pcoded-left-item'>
                            <li class=''>
                                <a href='manageProducts' data-i18n='nav.sample-page.main'>
                                    <span class='pcoded-micon'><i class='fa fa-check-square'></i></span>
                                    <span class='pcoded-mtext'>Add Doctor</span>
                                    <span class='pcoded-mcaret'></span>
                                </a>
                            </li>
                            <li class=''>
                                <a href='deviceProblems' data-i18n='nav.sample-page.main'>
                                    <span class='pcoded-micon'><i class='fa fa-warning'></i></span>
                                    <span class='pcoded-mtext'>Assign Rooms</span>
                                    <span class='pcoded-mcaret'></span>
                                </a>
                            </li>
                               
                            </ul>

                            
                            <div class='pcoded-navigatio-lavel' data-i18n='nav.category.navigation' menu-title-theme='theme5'>Departments</div>
                            <ul class='pcoded-item pcoded-left-item'>
                            <li class=''>
                                <a href='manageAppointments' data-i18n='nav.sample-page.main'>
                                    <span class='pcoded-micon'><i class='fa fa-calendar-plus-o'></i></span>
                                    <span class='pcoded-mtext'>Add Departments</span>
                                    <span class='pcoded-mcaret'></span>
                                </a>
                            </li>
                               
                            </ul>

                            <div class='pcoded-navigatio-lavel' data-i18n='nav.category.navigation' menu-title-theme='theme5' >SETTINGS</div>
                            <ul class='pcoded-item pcoded-left-item'>
                                <li class='pcoded-hasmenu'>
                                    <a href='javascript:void(0)'>
                                        <span class='pcoded-micon'><i class='fa fa-shield'></i></i></span>
                                        <span class='pcoded-mtext' data-i18n='nav.dash.main'>Security</span>
                                        <span class='pcoded-mcaret'></span>
                                    </a>
                                    <ul class='pcoded-submenu'>
                                        <li class=''>
                                            <a href='userAccounts'>
                                                <span class='pcoded-micon'><i class='ti-angle-right'></i></span>
                                                <span class='pcoded-mtext' data-i18n='nav.dash.default'>User Accounts</span>
                                                <span class='pcoded-mcaret'></span>
                                            </a>
                                        </li>
                                        <li class=' '>
                                            <a href='#'>
                                                <span class='pcoded-micon'><i class='ti-angle-right'></i></span>
                                                <span class='pcoded-mtext' data-i18n='nav.dash.ecommerce'>Blacklisted Users</span>
                                                <span class='pcoded-badge label label-info '>NEW</span>
                                                <span class='pcoded-mcaret'></span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li class=''>
                                <a href='storeSettings' data-i18n='nav.sample-page.main'>
                                    <span class='pcoded-micon'><i class='fa fa-cogs'></i></span>
                                    <span class='pcoded-mtext'>Store Settings</span>
                                    <span class='pcoded-mcaret'></span>
                                </a>
                            </li>
                                
                            </ul>
                            <div class='pcoded-navigatio-lavel' data-i18n='nav.category.ui-element' menu-title-theme='theme5' >HELP</div>
                            <ul class='pcoded-item pcoded-left-item'>
                            <li id='about'>
                            <a href='about' data-i18n='nav.sample-page.main' id='about'>
                                <span class='pcoded-micon'><i class='fa fa-info-circle'></i></span>
                                <span class='pcoded-mtext'>About</span>
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