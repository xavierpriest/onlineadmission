<div class="container">
    <br>
    <div class="toolbar clearfix">
        <div class="pull-left"><span class="toolbar_text"><span class="muted">Today:</span> <?php echo date('l jS \of F Y h:i:s A'); ?></span>
        </div>
        <div class=" pull-right">


        </div></div>

    <div class="row-fluid">

        <div class="span2">
            <div class="sidebar">
                <ul id="pageNav">
                    <li><a href="../student">Home</a></li>
                    <li><a href="../student/application">My Application</a></li>


                    <li><a href="../student/messages">Messages
                            <span class="pull-right badge badge-info"><?php echo $msgCount; ?> inbox</span></a></li>
                    <li class="current"><a href="../student/settings">Account Settings</a></li>
                    <li><a href="../student/faq">Frequently Asked Questions</a></li>

                </ul>
            </div>
        </div>



        <div class="span10 ">
            <div class="w-box">
                <div class="w-box-header">
                    MANAGE ACCOUNT SETTINGS
                </div>
                <div class="w-box-content cnt_a">
                    <div class="row-fluid">
                    <div class="span5">
                    <p class="heading_a">Change password</p>
                        <p>Change your account password</p>
                    <div class="formSep control-group">
                        <label for="old_password" class="control-label">Enter Current Password:</label>
                        <div class="controls">
                            <input type="password" name="old_password" id="old_password" class="span11">
                        </div>
                    </div>

                    <div class="formSep control-group">
                        <label for="new_password" class="control-label">Enter New Password:</label>
                        <div class="controls">
                            <input type="password" name="new_password" id="new_password" class="span11">
                        </div>
                    </div>

                    <div class="formSep control-group">
                        <label for="confirm" class="control-label">Confirm Password:</label>
                        <div class="controls">
                            <input type="password" name="confirm" id="confirm" class="span11">
                        </div>
                    </div>

                    <a onclick="changePassword()" class="btn btn-small"><i class="icon icon-file"></i> Save Changes</a>
                </div>
                    <div class="span6">
                        <p class="heading_a">Change account email</p>
                        <p>Change the email address. This will modify the email for logging in and
                        for communication</p>
                        <div class="formSep control-group">
                            <label for="email" class="control-label">New Email:</label>
                            <div class="controls">
                                <input type="email" name="email" id="email" class="span11">
                            </div>
                            <a onclick="changeEmail()" class="btn btn-small"><i class="icon icon-hdd"></i> Save Changes</a>
                        </div>
                        <br>

                        <p class="heading_a">Application Settings</p>
                        <p>This will cancel your current admission application. You can still submit new applications
                        if the time period of admission is not elapsed.</p>
                        <?php if ($applied == 1) { ?>
                        <a onclick="cancelApplication('<?php echo $appID; ?>')" class="btn btn-small"><i class="icon icon-remove-circle"></i> Cancel Application</a>
                        <?php } else { ?>
                            <a class="btn btn-small disabled"><i class="icon icon-remove-circle"></i> Cancel Application</a>
                        <?php } ?>
                    </div>
            </div>
                    <hr>
                    <p class="heading_a">Delete Account</p>
                    <p>This will completely delete your application, and account details. Please be careful before you
                    proceed. This can not be undone.</p>
                    <a class="btn btn-small btn-danger"><i class="icon icon-trash icon-white"></i> Delete Account</a>
            </div>
        </div>
        </div   >
    </div>

</div>
<div class="footer_space"></div>

<script language="JavaScript" type="text/javascript">
    function cancelApplication(e)
    {
        var action = "cancel";
        bootbox.confirm("<h3><i class='icon icon-warning-sign'></i> Warning</h3><br><p>This will cancel your application from our system.You " +
                "can reapply again.<p>", function(result){
            if(result==true){
            $.ajax({
                    type: 'POST',
                    url : 'updateSettings',
                    data: {action: action, appID: e},
                    success: function(data){
                        bootbox.alert("<h3><i class='icon icon-info-sign'></i> Info</h3><br><p>Your application has been cancelled. You will need to" +
                                "reapply to gain admission to Girne American University.</p>", function(){
                            window.location="../student";
                        });

                    }
            });
            }
        });

    }

    function changeEmail()
    {
        var action = "email";
        var email = $("#email").val();
        if (email == '')
            alert("Email can not be empty");
        else{
                bootbox.confirm("<h3><i class='icon icon-warning-sign'></i> Warning</h3><br><p>This will change your email address for login and communication. You " +
                        "need to login again.<p>", function(result){
                    if(result==true){
                        $.ajax({
                            type: 'POST',
                            url : 'updateSettings',
                            data: {action: action, email: email},
                            success: function(data){
                                bootbox.alert("<h3><i class='icon icon-info-sign'></i> Info</h3><br><p>"+data+"</p>", function(){
                                    window.location.reload(true);
                                });

                            }
                        });
                    }
                });
        }

    }

    function changePassword()
    {
        var old_password = $("#old_password").val();
        var new_password = $("#new_password").val();
        var confirm = $("#confirm").val();

        if(old_password == '' || new_password=='' || confirm=='')
        {
            bootbox.alert("<h3><i class='icon icon-info-sign'></i> Info</h3><br><p>No fields should be empty. Please kindly fill" +
                    "in all the fields.</p>")
        }
        else {
            if(new_password != confirm)
            {
                bootbox.alert("<h3><i class='icon icon-info-sign'></i> Info</h3><br><p>New password and the confirm password must be the same. Please kindly fill " +
                        "in details correctly.</p>")
            }
            else {
                
            }
        }

    }
</script>