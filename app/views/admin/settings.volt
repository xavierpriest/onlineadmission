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
                    <li ><a href="/OnlineAdmission/admin/index">Dashboard</a></li>

                    <li><a href="/OnlineAdmission/admin/staff">Manage Staff Accounts</a></li>
                    <li><a href="/OnlineAdmission/admin/agents">Manage Agent Accounts</a></li>
                    <li><a href="/OnlineAdmission/admin/files">File Management</a></li>

                    <li><a href="/OnlineAdmission/admin/messages">Messages
                            <span class="badge badge-info">3</span></a></li>
                    <li class="current"><a href="/OnlineAdmission/admin/settings">Settings</a></li>
                    <li><a href="/OnlineAdmission/admin/faq">FAQ Settings</a></li>

                </ul>
            </div>
        </div>

        <div class="span10">
            <div class="w-box">
                <div class="w-box-header">GENERAL SETTINGS</div>
                <div class="w-box-content cnt_a">
                    <h3 class="heading_a">Session Settings</h3>
                    <div class="row-fluid">

                    <div class="span6">

                    <p>Set active session for next admissions. You can deactivate past academic sessions</p>

                    <label class="checkbox"><input type="checkbox"> SUMMER 2014</label>
                    <label class="checkbox"><input type="checkbox"> FALL 2014</label>
                    <label class="checkbox"><input type="checkbox"> SPRING 2015</label>
                    <label class="checkbox"><input type="checkbox" checked="true"> SUMMER 2015</label>
                    <label class="checkbox"><input type="checkbox" checked="true"> FALL 2015</label>
                    <label class="checkbox"><input type="checkbox"> SPRING 2016</label>

                    <a class="btn btn-mini"><i class="icon icon-plus"></i> Add Semester</a>




                    </div>



                    <div class="span6">
                        <p>Set starting and ending date of the admission process.</p>

                        <div class="formSep control-group">
                            <label for="s_date" class="control-label req">Start Date:</label>
                            <div class="controls">
                                <input type="text" name="s_date" id="s_date" class="span10">
                                <span class="help-block">Click to select</span>
                            </div>
                        </div>

                        <div class="formSep control-group">
                            <label for="e_date" class="control-label req">End Date:</label>
                            <div class="controls">
                                <input type="text" name="e_date" id="e_date" class="span10">
                                <span class="help-block">Click to select</span>
                            </div>
                        </div>

                    </div>
                        <a class="btn btn-success btn-small"><i class="icon icon-white icon-check"></i> Save Changes</a>
                    </div>
                </div>
            </div>



        </div>

    </div>
</div>

<script type="text/javascript" lang="Javascript">
    $("#s_date").datepicker();
    $("#e_date").datepicker();
</script>