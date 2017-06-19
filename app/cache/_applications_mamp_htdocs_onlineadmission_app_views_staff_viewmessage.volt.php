
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
                    <li class="current"><a  id="write"><i class="icon icon-folder-open"></i> View Message</a></li>
                    <li><a href="../messages"><i class="icon icon-envelope"></i> Back to Inbox</a></li>

                </ul>
            </div>
        </div>

        <div class="span10">

            <h2 class="heading_a"><?php echo ucwords($m->subject); ?></h2>
            <p><span class="muted">FROM:</span> <?php echo $m->sender; ?></p>
            <p><span class="muted">DATE: </span> <?php echo date('jS M Y', strtotime($m->dateSent));?></p>
            <hr>
            <div class="span12">
                <p><?php echo $m->message; ?></p>
            </div>
            <br><br>

            <div class="span12">
                <h2 class="heading_a">Reply</h2>
                <form id="reply" action="../replyMessage" method="post">
                    <input type="hidden" name="hd_subject" id="hd_subject" value="<?php echo $m->subject; ?>">
                    <input type="hidden" id="hd_receiver" name="hd_receiver" value="<?php echo $m->receiver; ?>">
                    <textarea rows="5" name="message" id="message" class="span12" placeholder="Enter your reply">

                    </textarea>

                    <button type="submit" class="btn btn-beoro-5 btn-small "><i class="icon icon-white icon-envelope"></i> Send Reply</button>
                </form>
            </div>



        </div>

    </div>

</div>