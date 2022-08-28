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
                        <form id="contactUs" name="contactUs" class="md-float-material" method="POST" action="#" data-url="contactUs">
                            <!-- <div class="text-center">
                                <img src="assets/images/opd-logo-white-transparent.png" height="150px" width="180px">
                            </div> -->
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Contact Us</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                     <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" autocomplete="off" required>
                                    <span class="messages"></span>
                                </div>
                                <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" name="contactNumber" id="username" class="form-control" placeholder="Contact #" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="email" id="username" class="form-control" placeholder="Email" required>
                                                </div>
                                </div>
                                
                                <div class="input-group">
                                     <input type="text" name="messageTitle" id="messageTitle" class="form-control" placeholder="Message Title" autocomplete="off" required>
                                </div>
                                <div class="input-group">
                                    <textarea class="form-control" name="messageBody"  placeholder="Message Body" rows="4" cols="50" required></textarea>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="contactUs" id="contactUs" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Send</button>
                                    </div>
                                    <div class="col-md-12">
                                            <p class="text-inverse m-t-25 text-center">Return to <a href="systemSignIn"> Sign In </a></p>
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
            
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <?php require_once(dirname(__FILE__) . "/footer.inc.php"); ?>

    <script>
        $(document).ready(function(){
            $("#contactUs").on('submit', function(e){
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

                        if(messageStatus == 'true'){
                            Swal.fire({
                            
                            icon: 'success',
                            title: messageTitle,
                            text: messageBody,
                            //timer: 3000 // 3 seconds
                          });
                          $("#contactUs")[0].reset();
                        }else if(data[0] == 'false'){
                            Swal.fire({
                            
                            icon: 'error',
                            title: messageTitle,
                            text: messageBody,
                            //timer: 3000 // 3 seconds
                          });
                          $("#contactUs")[0].reset();
                        }
                        
                    },
                }); 

            });
            
        });
    </script>

</body>
</html>
