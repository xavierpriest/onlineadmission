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
                    <li class="current"><a href="application">My Application</a></li>


                    <li><a href="../student/messages">Messages
                            <span class="pull-right badge badge-info"><?php echo $msgCount; ?> inbox</span></a></li>
                    <li><a href="../student/settings">Account Settings</a></li>
                    <li><a href="../student/faq">Frequently Asked Questions</a></li>
                </ul>
            </div>
        </div>
        <?php if ($applied == 0) { ?>
        <div class="span6">
            <div class="hero-unit">
                <h2>No application submitted</h2>
                <p>You currently have not submitted an application. Please click the button
                 below to apply</p>
                <a href="apply" class="btn btn-beoro-3 btn-large">Apply Now</a>
            </div>
        </div>
        </div></div>
        <?php } else { ?>

            <div class="w-box span10">
                <div class="w-box-header">APPLICATION STATUS
                <div class="pull-right">
                    <a class="btn btn-mini" href="edit/?id=<?php echo $app->id; ?>"><i class=" icon icon-edit"></i> Edit Application</a>
                </div>
                </div>
                <div class="w-box-content cnt_a">
                    <p  class="sepH_a"><span class='muted'>Admission Status</span>: <span class="<?php echo $app->getStatus()->class; ?>"><?php echo $app->getStatus()->description; ?></span></p>
                    <p  class="sepH_a"><span class='muted'>Notes</span>: <?php echo $app->notes; ?></p>
                </div>
            </div>

            <div class="w-box span10">
                <div class="w-box-header">APPLICATION SUMMARY
                    <span class="<?php echo $app->getStatus()->class; ?>"><?php echo $app->getStatus()->name; ?></span>
                </div>
                <div class="w-box-content cnt_a">
            <div class="row-fluid">
                <h3 class="heading_a">Personal Details</h3>
            <div class="span3">
                <p id="p1" class="sepH_a"><span class='muted'>First Name</span>: <?php echo $app->getApplicant()->firstname; ?></p>
                <p id="p2" class="sepH_a"><span class='muted'>Middle Name</span>: <?php echo $app->getApplicant()->middlename; ?></p>
                <p id="p3" class="sepH_a"><span class='muted'>Last Name</span>: <?php echo $app->getApplicant()->lastname; ?></p>
                <p id="p4" class="sepH_a"><span class='muted'>Date of Birth</span>: <?php echo date('jS M Y', strtotime($app->Applicant->dob)); ?></p>
            </div>
            <div class="span3 offset1">
                <p id="p5" class="sepH_a"><span class='muted'>Address</span>: <?php echo $app->getApplicant()->contactAddress; ?></p>
                <p id="p6" class="sepH_a"><span class='muted'>Telephone</span>: <?php echo $app->getApplicant()->telephone; ?></p>
                <p id="p7" class="sepH_a"><span class='muted'>Gender</span>: <?php echo $app->getApplicant()->gender; ?></p>
                <p id="p8" class="sepH_a"><span class='muted'>Marital Status</span>: <?php echo $app->getApplicant()->maritalStatus; ?></p>
            </div>
            <div class="span3 offset1">
                <p  class="sepH_a"><span class='muted'>Passport Number</span>: <?php echo $app->getApplicant()->passportNumber; ?></p>
                <p  class="sepH_a"><span class='muted'>Place of Issue</span>: <?php echo $app->getApplicant()->passprtPlace; ?></p>
                <p  class="sepH_a"><span class='muted'>Date of Issue</span>: <?php echo date('jS M Y', strtotime($app->Applicant->passportDate)); ?></p>
                <p  class="sepH_a"><span class='muted'>Date of Expiry</span>: <?php echo date('jS M Y', strtotime($app->Applicant->passportExpiry)); ?></p>
            </div>
            </div>
            <div class="row-fluid">
                <h3 class="heading_a">Course Details</h3>
            <div class="span4">
                <p  class="sepH_a"><span class='muted'>Course Applied</span>: <?php echo $app->getDepartment()->name; ?></p>
                <p  class="sepH_a"><span class='muted'>Faculty</span>: <?php echo $app->faculty; ?></p>
                <p  class="sepH_a"><span class='muted'>Semester</span>: <?php echo $app->semester; ?></p>
                <p  class="sepH_a"><span class='muted'>Degree</span>: <?php echo $app->degree; ?></p>
            </div>
        </div>
            </div>
            </div>

        </div>

    </div>
<?php } ?>
