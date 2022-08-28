<?php 
//get the file that includes the basic information about the application like application name, verison, header info, footer info,
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/includes/global_info.inc.php');
require_once(dirname(__FILE__) . "/header.inc.php");

?>
<body class="fix-menu">
<!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body">
                        <form class="md-float-material" id="signIn" name="signIn" method="POST" action="#" data-url="signIn">
                            <div class="text-center">
                                <img src="assets/images/opd-logo-white-transparent.png" height="150px" width="180px">
                            </div>
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Sign In</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                     <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off">
                                    <span class="messages"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    <span class="messages"></span>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        
                                    </div>
                                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                        <a href="systemResetPassword" class="text-right f-w-600 text-inverse"> Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="signIn" id="signIn" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
                                    </div>
                                    <div class="col-md-12">
                                            <p class="text-inverse m-t-25 text-center">Don't have an account? <a href="systemSignUp"> Sign Up </a> here for free!<br>
                                            Need any help? <a href="systemContactUs">Contact Us</a></p>
                                    </div>
                                </div>
                                <hr/>

                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <p class="text-inverse m-t-25 text-center footer-credits"><b><?php echo $footer; ?></b></p>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <?php require_once(dirname(__FILE__) . "/footer.inc.php"); ?>
    <script>
        $(document).ready(function(){
            $("#signIn").on('submit', function(e){
                e.preventDefault();

                let formData= $(this).serialize();
                let formType= $(this).attr('method');
                let url= $(this).attr('data-url');

                $.ajax({
                    url: 'core/controller/postController?m=' + url,
                    type: formType,
                    data: formData,
                    success: function(res){
                        let data= JSON.parse(res);
                        let messageStatus= data[0];
                        let messageTitle= data[1];
                        let messageBody= data[2];

                        if(messageStatus == 'false'){
                            Swal.fire({
                            
                            icon: 'error',
                            title: messageTitle,
                            text: messageBody,
                            //timer: 3000 // 3 seconds
                          });
                          $("#signIn")[0].reset();
                        }else if(messageStatus == 'true'){
                            $(location).prop('href', messageStatus)
                        }
                        
                    },
                }); 

            });
        });
    </script>
</body>
</html>
