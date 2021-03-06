<div class="container">
    <br>
    <div class="toolbar clearfix">
        <div class="pull-left"><span class="toolbar_text"><span class="muted">Today:</span> <?php echo date('l jS \of F Y h:i:s A'); ?></span>
        </div>
    </div>
    <div class="row-fluid">

        <div class="span2">
            <div class="sidebar">
                <ul id="pageNav">
                    <li><a href="../student">Home</a></li>
                    <li><a href="../student/application">My Application</a></li>


                    <li><a href="../student/messages">Messages
                            <span class="pull-right badge badge-info"><?php echo $msgCount; ?> inbox</span></a></li>
                    <li><a href="../student/settings">Account Settings</a></li>
                    <li class="current"><a href="faq">Frequently Asked Questions</a></li>

                </ul>
            </div>
        </div>



        <div class="span10 ">
            <div class="w-box">
                <div class="w-box-header">FREQUENTLY ASKED QUESTIONS</div>
                <div class="w-box-content cnt_a">
                    <div class="accordion" id="faq_accordion">
                        <?php foreach ($faq as $f) { ?>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle"  data-toggle="collapse" href="#faq-<?php echo $f->id; ?>">
                                    <?php echo ucwords($f->question); ?>
                                </a>
                            </div>
                            <div id="faq-<?php echo $f->id; ?>" class="accordion-body collapse">
                                <div class="accordion-inner"><?php echo $f->answer; ?></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
     </div>

</div>
