 <!-- Required Jquery -->
 <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="bower_components/tether/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- sweet alert js -->
    <script type="text/javascript" src="bower_components/sweetalert/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="assets/js/modal.js"></script>
    <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
    <script type="text/javascript" src="assets/js/modalEffects.js"></script>
    <script type="text/javascript" src="assets/js/classie.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="bower_components/jquery-i18next/jquery-i18next.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script type="text/javascript" src="assets/js/jquery.blockUI.js"></script>
    <script src="bower_components/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="assets/pages/multi-step-sign-up/js/main.js"></script>
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


            //check username
            $("#username").focusout(function(){

                var username = $(this).val().trim();

                if(username != ''){

                    $.ajax({
                        url: 'core/controller/getController?f=checkUsernameAvailability',
                        type: 'post',
                        data: {username:username},
                        success: function(response){
                            if(response!=='false'){
                                // Show response
                                $("#uname_response").html(response);
                                $("#submit").attr("disabled", true);
                            }else if(response == 'false'){
                                $("#uname_response").html("");
                                $("#submit").attr("disabled", false);
                            }
                        }
                    });
                }else{
                        $("#uname_response").html("");
                }

            });

            //check password
            $("#password").focusout(function(){

                var password = $(this).val().trim();

                if(password != ''){

                    $.ajax({
                        url: 'core/controller/getController?f=checkPassword',
                        type: 'post',
                        data: {password:password},
                        success: function(response){
                            if(response!=='false'){
                                // Show response
                                $("#pwd_response").html(response);
                                $("#submit").attr("disabled", true);
                            }else if(response == 'false'){
                                $("#pwd_response").html("");
                                $("#submit").attr("disabled", false);
                            }
                        }
                    });
                }else{
                        $("#pwd_response").html("");
                }

            });
        });
        
 
        $(document).ajaxStart(function() { 
    $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
    } }); 
});      
$(document).ajaxComplete(function(){
    $.unblockUI()
});  
    </script>
