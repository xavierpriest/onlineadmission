
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
                    <li><a href="/OnlineAdmission/admin/index">Dashboard</a></li>

                    <li class="current"><a href="#">Manage Staff Accounts</a></li>
                    <li><a href="#">Manage Agent Accounts</a></li>
                    <li><a href="/OnlineAdmission/admin/files">File Management</a></li>
                    <li><a href="/OnlineAdmission/admin/messages">Messages
                            <span class="badge badge-info">3</span></a></li>
                    <li><a href="/OnlineAdmission/admin/settings">Settings</a></li>
                    <li><a href="/OnlineAdmission/admin/faq">FAQ Settings</a></li>

                </ul>
            </div>
        </div>

        <div class="span10">
            <a class="btn btn-medium" href="javascript:" onclick="create()"><i class="icon icon-user"></i> Create Staff Account</a>
            <br><br>
            <div class="w-box">
                <div class="w-box-header">MANAGE STAFF ACCOUNTS</div>
                <div class="w-box-content cnt_a">
                    <?php if ($staff->Count() == 0) { ?>
                        <h3>No staff accounts have been created</h3>
                    <?php } else { ?>
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Contact Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach ($staff as $s) { ?>
                        <tr>
                            <td><?php echo $s->firstname; ?></td>
                            <td><?php echo $s->lastname; ?></td>
                            <td><?php echo $s->middlename; ?></td>
                            <td><?php echo $s->getUser()->email; ?></td>
                            <td><?php echo $s->mobile; ?></td>
                            <td><?php echo $s->contactAddress; ?></td>
                            <td>
                                <?php if ($s->getUser()->active == 1) { ?>
                                <span class="badge badge-success">active</span>
                                <?php } else { ?>
                                <span class="badge badge-warning">inactive</span>
                                <?php } ?>
                            </td>
                            <td><a href="javascript:" onclick="edit('<?php echo $s->id; ?>', '<?php echo $s->getUser()->active; ?>')" class="btn btn-mini" ><i class="icon icon-edit"></i> Edit</a></td>
                        </tr>

                    <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createStaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="createStaff" method="post">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Create Staff Account</h4>
                <span class="help-block">Staff account will be created with the following credentials.</span>
            </div>
            <div class="modal-body">

                    <div class="formSep control-group">
                        <label for="firstname" class="control-label">First Name:</label>
                        <div class="controls">
                            <input type="text" name="firstname" id="firstname" class="span5">
                        </div>
                    </div>
                    <div class="formSep control-group">
                        <label for="middlename" class="control-label">Middle Name:</label>
                        <div class="controls">
                            <input type="text" name="middlename" id="middlename" class="span5">
                        </div>
                    </div>

                    <div class="formSep control-group">
                        <label for="lastname" class="control-label">Last Name:</label>
                        <div class="controls">
                            <input type="text" name="lastname" id="lastname" class="span5">
                        </div>
                    </div>
                    <div class="formSep control-group">
                        <label for="email" class="control-label">Email:</label>
                        <div class="controls">
                            <input type="email" name="email" id="email" class="span5">
                            <span class="help-block">Please use a valid email address. Confirmation
                            email will be sent to this address</span>
                        </div>
                    </div>

                <div class="formSep control-group">
                    <label for="password" class="control-label">Password:</label>
                    <div class="controls">
                        <input type="text" name="password" id="password" class="span5">
                            <span class="help-block">These can be changed by the staff from
                            their account profile.</span>
                    </div>
                </div>

                    <div class="formSep control-group">
                        <label for="mobile" class="control-label">Mobile:</label>
                        <div class="controls">
                            <input type="tel" name="mobile" id="mobile" class="span5">
                        </div>
                    </div>

                    <div class="formSep control-group">
                        <label for="contactAddress" class="control-label">Contact Address:</label>
                        <div class="controls">
                            <textarea class="span5" id="contactAddress" name="contactAddress">

                            </textarea>
                        </div>
                    </div>


                    <div class="formSep control-group">
                        <label for="nationality" class="control-label">Nationality:</label>
                        <div class="controls">
                            <input type="text" name="nationality" id="nationality" class="span5">
                        </div>
                    </div>

                    <div class="formSep control-group">
                        <label class="control-label req">Gender</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="gender" id="female" value="F" >
                                Female
                            </label>
                            <label class="radio">
                                <input type="radio" name="gender" id="male" value="M" >
                                Male
                            </label>
                        </div>
                    </div>

                        <div class="formSep control-group">
                            <label for="dob" class="control-label req">Date of Birth:</label>
                            <div class="controls">
                                <input type="text" name="dob" id="dob" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" class="span5">

                            </div>
                        </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create Account</button>
            </div>
        </div>
    </div>
    </form>
</div>

<div class="modal fade" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Staff Account</h4>
                <span class="help-block">Make changes to staff credentials. View account logs</span>
            </div>
            <div class="modal-body">
                <div class="tabbable tabbable-bordered">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#setting">Account Settings</a></li>
                        <li><a data-toggle="tab" href="#log">Account Log</a></li>

                    </ul>
                    <div class="tab-content">
                        <div id="setting" class="tab-pane active">
                            <p class="heading_a">Password Reset</p>
                            <span class="help-block">This will reset account password and email it to the staff.</span>
                            <a href="javascript:" onclick="reset()"  class="btn btn-small"><i class="icon icon-wrench"></i> Reset Password</a>
                                <br><br>
                            <p class="heading_a">Deactivate Account</p>
                            <span class="help-block">The staff will not be able to login until account is active.</span>
                            <a id="changeStatus" href="javascript:" onclick="changeStatus()" class="btn btn-small"></a>
                        </div>

                        <div class="tab-pane" id="log">
                            <p id="p1" class="sepH_a"></p>
                            <p id="p2" class="sepH_a"></p>
                            <p id="p3" class="sepH_a"></p>
                        </div>
                    </div>
                    <input type="hidden" id="hdx">
                    <input type="hidden" id="hdy">

                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>

        </div>
    </div>

</div>
<script language="JavaScript" type="text/javascript">
    function create(){
        $("#createStaff").modal('show');
    }

    function changeStatus()
    {
        var e = _("hdx").value;
        var d = _("hdy").value;
        $.ajax({
            type: 'POST',
            data: {id:e, status:d},
            url: 'changeStatus',
            success: function(data)
            {
                alert(data);
                location.reload(true);
            }
        });
    }

    function reset()
    {
        var e = _("hdx").value;
        $.ajax({
           type: 'POST',
           data: {id:e},
           url: 'resetPassword',
           success: function(data)
           {
                alert(data);
           }
        });

    }

    function edit(e, d){
        _("hdx").value = e;
        _("hdy").value = d;



        if(d == 1)
        {
            _("changeStatus").innerHTML = "<i class='icon icon-remove'></i> Deactivate";
        }

        if(d == 0)
        {
            _("changeStatus").innerHTML = "<i class='icon icon-plus-sign'></i> Activate";
        }

        $.ajax({
            type: 'POST',
            data: {id:e},
            url: 'getStaff',
            success: function(data){
                var d = JSON.parse(data);
                _("p1").innerHTML = "<span class='muted'>Last login</span>: "+ moment(d.lastLogin).format("MMMM Do YYYY, h:mm:ss a");
                _("p2").innerHTML = "<span class='muted'>Created On</span>: "+ moment(d.dateCreated).format("MMMM Do YYYY, h:mm:ss a");
                if(d.confirmed == "N")
                _("p3").innerHTML = "<span class='muted'>Status: <span class='badge badge-warning'>not confirmed</span></span>";
                else
                    _("p3").innerHTML = "<span class='muted'>Status: <span class='badge badge-info'>confirmed</span></span>";

                $("#editStaff").modal('show');


            }


        });

        //$("#editStaff").modal('show');

       // _;
    }

    $("#dob").datepicker();

    function _(x)
    {
        return document.getElementById(x);
    }
</script>