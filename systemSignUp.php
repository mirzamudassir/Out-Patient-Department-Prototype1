<?php 
//get the file that includes the basic information about the application like application name, verison, header info, footer info,
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/includes/global_info.inc.php');
require_once(dirname(__FILE__) . "/header.inc.php");

?>
<body class="multi-step-sign-up">
    <form id="msform" name="signUp" method="POST" action="#" data-url="signUp">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Personal Details</li>
            <li>Medical Details</li>
            <li>Profile Details</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <img class="logo" src="assets/images/opd-logo-green-transparent.png" alt="logo.png">
            <h2 class="fs-title">Sign up</h2>
            <h3 class="fs-subtitle">Let’s Sign up for new you</h3>
            <div class="input-group">
                <input type="text" class="form-control" name="fullName" placeholder="Full Name" autocomplete="off" required>
            </div>
            <div class="input-group">
                <select class="form-control" name="gender" required>
                    <option value="NULL">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="input-group">
                <input type="number" class="form-control" name="age" min="0" max="150" placeholder="Age" autocomplete="off" required />
            </div>
            <div class="input-group">
                <textarea class="form-control" name="address"  placeholder="Residentail Address"  autocomplete="off" required></textarea>
            </div>
            <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
            <p class="m-t-20">Already have an account? <a href="systemSignIn">Sign in</a></p>
        </fieldset>
        <fieldset>
        <img class="logo" src="assets/images/opd-logo-green-transparent.png" alt="logo.png">
            <h2 class="fs-title">Contact Details</h2>
            <h3 class="fs-subtitle">Little bit about your contact information.</h3>
            <div class="input-group">
                <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required />
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="contactNumber" placeholder="Contact #" autocomplete="off" required />
            </div>
            <div class="input-group">
                <textarea class="form-control" name="prevMedicalHistory"  placeholder="Any previous Medical History?" autocomplete="off" required></textarea>
            </div>
            <button type="button" name="previous" class="btn btn-inverse btn-outline-inverse previous" value="Previous">Previous</button>
            <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
            <p class="m-t-20">Already have an account? <a href="systemSignIn">Sign in</a></p>
        </fieldset>
        <fieldset>
        <img class="logo" src="assets/images/opd-logo-green-transparent.png" alt="logo.png">
            <h2 class="fs-title">Profile Details</h2>
            <h3 class="fs-subtitle">And something about your profile!</h3>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" required>
            </div>
            <span class="uname_response" id="uname_response"></span>
            <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password (At least 8 characters.)" required />
            </div>
            <span class="uname_response" id="pwd_response"></span>
            <div class="input-group">
                <select class="form-control" name="securityQuestion" required>
                    <option value="NULL">Select Security Question</option>
                    <option value="Who is your favorite teacher?">Who is your favorite teacher?</option>
                    <option value="What is your favorite movie name?">What is your favorite movie name?</option>
                    <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                    <option value="What was your first car?">What was your first car?</option>
                </select>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="securityAnswer" placeholder="Security Answer" autocomplete="off" required>
            </div>
            <button type="button" name="previous" class="btn btn-inverse btn-outline-inverse previous" value="Previous">Previous</button>
            <button type="submit" name="signUp" id="signUp" class="btn btn-primary">Submit</button>
            <p class="m-t-20">Already have an account? <a href="systemSignIn">Sign in</a></p>
        </fieldset>
    </form>
        <?php require_once(dirname(__FILE__) . "/footer.inc.php"); ?>
    <script>
        $(document).ready(function(){
            
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
                                $("#signUp").attr("disabled", true);
                            }else if(response == 'false'){
                                $("#uname_response").html("");
                                $("#signUp").attr("disabled", false);
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
                                $("#signUp").attr("disabled", true);
                            }else if(response == 'false'){
                                $("#pwd_response").html("");
                                $("#signUp").attr("disabled", false);
                            }
                        }
                    });
                }else{
                        $("#pwd_response").html("");
                }

            });

            $("#msform").on('submit', function(e){
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
                          $("#msform")[0].reset();
                        }else if(messageStatus == 'false'){
                            Swal.fire({
                            
                            icon: 'error',
                            title: messageTitle,
                            text: messageBody,
                            //timer: 3000 // 3 seconds
                          });
                          $("#msform")[0].reset();
                        }
                        
                    },
                }); 

            });
        });

        
    </script>
</body>
</html>