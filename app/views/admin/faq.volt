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

                    <li><a href="/OnlineAdmission/admin/staff">Manage Staff Accounts</a></li>
                    <li><a href="/OnlineAdmission/admin/agents">Manage Agent Accounts</a></li>
                    <li><a href="/OnlineAdmission/admin/files">File Management</a></li>

                    <li><a href="/OnlineAdmission/admin/messages">Messages
                            <span class="badge badge-info">3</span></a></li>
                    <li><a href="/OnlineAdmission/admin/settings">Settings</a></li>
                    <li class="current"><a href="/OnlineAdmission/admin/faq">FAQ Settings</a></li>

                </ul>
            </div>
            </div>
            <div class="span10 ">
                <a class="btn btn-small" onclick="show()"><i class="icon icon-plus-sign"></i> Add FAQ</a>
                <br>
                <br>
                <div class="w-box">
                    <div class="w-box-header">FREQUENTLY ASKED QUESTIONS</div>
                    <div class="w-box-content cnt_a">
                        <div class="accordion" id="faq_accordion">
                            {% for f in faq %}
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle"  data-toggle="collapse" href="#faq-{{ f.id }}">
                                            {{ f.question|capitalize }}
                                        </a>
                                    </div>
                                    <div id="faq-{{ f.id }}" class="accordion-body collapse">
                                        <div class="accordion-inner">{{ f.answer }}</div>
                                    </div>
                                </div>
                            {% endfor %}
                        </div>
                    </div>

                </div>
            </div>
        </div>


</div>

<div class="modal fade" id="addFaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" action="addFaq">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add FAQ</h4>
            <span class="help-block">Add frequently asked questions for staff and students.</span>
        </div>
        <div class="modal-body">
            <div class="formSep control-group">
                <label for="question" class="control-label req">Question:</label>
                <div class="controls">
                    <input type="text" name="question" id="question" class="span5">
                    <span class="help-block">Must be at least 3 characters</span>
                </div>
            </div>

            <div class="formSep control-group">
                <label for="answer" class="control-label req">Answer:</label>
                <div class="controls">
                    <textarea id="answer" name="answer" class="span5"></textarea>
                    <span class="help-block">Must be at least 3 characters</span>
                </div>
            </div>

            <div class="formSep control-group">
                <label for="desc" class="control-label req">Target Audience:</label>
                <div class="controls">
                    <select name="desc" id="desc" class="span5">
                        <option value="student">Student</option>
                        <option value="staff">Staff</option>
                        <option value="agent">Agents</option>
                    </select>
                    <span class="help-block">Select one</span>
                </div>
            </div>

        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
        </form>
    </div>

    </div>
</div>

<script lang="Javascript" type="text/javascript">
    function show()
    {
        $("#addFaq").modal('show');
    }
</script>