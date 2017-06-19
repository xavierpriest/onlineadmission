
    <style>
        form#messages{}
        form#messages > #write_form, #draft_form, #sent_form, #trash_form {display: none;}

    </style>


    <script type="text/javascript" language="JavaScript">

        function sending()
        {
            var receiver = document.getElementById('receiver').value;
            var subject = document.getElementById('subject').value;
            var message = document.getElementById('message').value;
            var status = "sent";
            var dataString = '&receiver1=' + receiver + '&subject1=' + subject + '&message1=' + message;
            if(receiver == '' || subject == '' || message == '')
            {
                alert("All three fields must be filled before you send a message!!");
                return false;
            }else{
                //ajax code to submit the form
                $.ajax({
                    type: "POST",
                    url: "../staff/send",
                    data: {receiver1:receiver, subject1:subject, status1:status, message1:message},
                    cache: false,
                    success: function(data){
                        alert("Message successfully sent");
                        window.location.href = "../staff/messages"
                    }
                });


            }

            return true;
        }

        function saveDraft()
        {
            var receiver = document.getElementById('receiver').value;
            var subject = document.getElementById('subject').value;
            var message = document.getElementById('message').value;
            var status = "draft";
            var dataString = '&receiver1=' + receiver + '&subject1=' + subject + '&message1=' + message;
            if(receiver == '' || subject == '' || message == '')
            {
                alert("All three fields must be filled before you send a message!!");
                return false;
            }else{
                //ajax code to submit the form
                $.ajax({
                    type: "POST",
                    url: "../staff/send",
                    data: {receiver1:receiver, subject1:subject, message1:message, status1:status},
                    cache: false,
                    success: function(data){
                        alert("Message successfully saved");
                        window.location.href = "../staff/messages"
                    }
                });


            }

            return true;
        }

    </script>


    <script type="text/javascript" language="JavaScript">

        function _(x){
            return document.getElementById(x);
        }

        function doWrite(){
            _('inbox_form').style.display = "none";
            _('draft_form').style.display = "none";
            _('sent_form').style.display = "none";
            _('trash_form').style.display = "none";
            _('write_form').style.display = "block";
        }

        function doDraft(){
            _('inbox_form').style.display = "none";
            _('write_form').style.display = "none";
            _('sent_form').style.display = "none";
            _('trash_form').style.display = "none";
            _('draft_form').style.display = "block";
        }

        function doSent(){
            _('inbox_form').style.display = "none";
            _('draft_form').style.display = "none";
            _('write_form').style.display = "none";
            _('trash_form').style.display = "none";
            _('sent_form').style.display = "block";
        }
        function doTrash(){
            _('inbox_form').style.display = "none";
            _('draft_form').style.display = "none";
            _('sent_form').style.display = "none";
            _('write_form').style.display = "none";
            _('trash_form').style.display = "block";
        }
    </script>


<div class="container">
    <br>
    <div class="toolbar clearfix">
        <div class="pull-left"><span class="toolbar_text"><span class="muted">Today:</span> <?php echo date('l jS \of F Y h:i:s A'); ?></span>

        </div>

    </div>
    <div id="flash">{{ flash.output() }}</div>

    <div class="row-fluid">

        <div class="span2">
            <div class="sidebar">
                <div class="w-box">
                    <div class="w-box-header">Main Menu</div>
                    <div class="w-box-content">
                <ul id="pageNav">
                   <li><a href="../staff"><i class="icon icon-home"></i> Home</a></li>
                </ul>
                </div>
                    </div>


            <div class="w-box">
                <div class="w-box-header">Message Menu</div>
                <div class="w-box-content">
                <ul id="pageNav">
                    <li><a onclick="doWrite();"  id="write" data-toggle="modal"><i class="icon icon-edit"></i> Compose</a></li>
                    <li><a href="../staff/messages" id="inbox"><i class="icon icon-envelope"></i> Inbox
                            <span class="badge badge-info pull-right">
                    <?php
                    $msgs = Message::find("status = 'sent' AND receiver = '$my_email'");
                    if(count($msgs)==0)
                    {
                        echo 0;
                    }else{echo count($msgs);}
                    ?>
                       new</span></a></li>
                    <li><a onclick="doDraft();" id="draft"><i class="icon icon-inbox"></i> Draft
                            <span class="badge badge-warning pull-right">
                                  <?php
                    $msgs = Message::find("status = 'draft' AND sender = '$my_email'");
                    if(count($msgs)==0)
                    {
                        echo 0;
                    }else{echo count($msgs);}
                    ?>
                      unsent</span></a></li>
                    <li><a onclick="doSent();" id="sent"><i class="icon icon-share"></i> Sent
                            <span class="badge badge-success pull-right">
                                  <?php
                    $msgs = Message::find("status = 'sent' AND sender = '$my_email'");
                    if(count($msgs)==0)
                    {
                          echo 0;
                    }else{echo count($msgs);}
                    ?>
                     sent</span></a></li>
                    <li><a onclick="doTrash();"  id="trash"><i class="icon icon-trash"></i> Trash
                            <span class="badge badge-important pull-right">
                                  <?php
                    $msgs = Message::find("status = 'trash' AND sender = '$my_email'");
                    if(count($msgs)==0)
                    {
                        echo 0;
                    }else{echo count($msgs);}
                    ?>
                     deleted</span></a></li>
                </ul>
            </div>
                </div>
        </div>
            </div>

     <form id="messages">


         <div id="write_form" class="modal" area-hidden="true">
             <div class="modal-header">
                <h3>Send a message to a registered applicant or agent</h3>
             </div>

              <div class="modal-body">
                <form id="send_message" name="sending_message">
                    <input id="receiver" class="span10" type="email" placeholder="To : ">
                    <input id="subject" class="span10" type="text" placeholder="Subject : ">
                    <textarea id="message" class="span6"></textarea><br>
                    <input type="submit" value="Send" class="btn btn-success" onclick="sending(); return false;">
                    <button type="reset" class="btn btn-danger">Clear</button>
                    <button onclick="saveDraft()" type="button" class="btn"><i class="icon icon-briefcase"></i> Save as Draft</button>
                </form>
              </div>
             <div class="modal-footer">
                 <button class="btn btn-danger" data-dismiss="modal" arial-hidden="true">Close</button>
             </div>

         </div>

         <div class="span10" id="inbox_form">
             <h3>Inbox</h3>
             <div class="span12" >
                 <table class="table table-striped">
                     <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Preview</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php
                 foreach(Message::find(array("status = 'sent' AND receiver = '$my_email'","order"=>"dateSent DESC"))as $inbox){
                     $short_string = (strlen($inbox->message) > 70) ? substr($inbox->message,0,70).'...' : $inbox->message;
                     echo "<tr>
                     <td class='span1'><input type='checkbox'></td>
                     <td class='span2'>$inbox->sender</td>
                     <td class='span2'>$inbox->subject</td>
                     <td class='span4'>$short_string</td>
                     <td class='span2'>";?><?php echo date('jS M', strtotime($inbox->dateSent));?> <?php echo"</td>
                     <td class='span2'><a class='btn btn-mini' href='viewMessage/$inbox->id&$inbox->dateSent'><i class='icon icon-folder-open'></i> Read</a>
                      <a class='btn btn-mini' onclick='deleteMessage($inbox->id)'><i class='icon icon-trash'></i> Delete</a></td>
                     </tr>";
                     }
                     ?>
                     </tbody>
                 </table>
             </div>
         </div>

         <div id="draft_form" class="span10">
             <h3>Draft</h3>
             <div class="span12" >
                 <table class="table table-striped">
                     <thead>
                     <tr>
                         <th><input type="checkbox"></th>
                         <th>From</th>
                         <th>Subject</th>
                         <th>Preview</th>
                         <th>Date</th>
                         <th>Actions</th>
                     </tr>
                     </thead>
                     <tbody>
             <?php
           foreach(Message::find(array("status = 'draft' AND sender = '$my_email'","order"=>"dateSent DESC"))as $inbox){
             $short_string = (strlen($inbox->message) > 70) ? substr($inbox->message,0,70).'...' : $inbox->message;



             echo "<tr>
                 <td class='span1'><input type='checkbox'></td>
                 <td class='span2'>$inbox->sender</td>
                 <td class='span2'>$inbox->subject</td>
                 <td class='span4'>$short_string</td>
                 <td class='span2'>";?><?php echo date('jS M', strtotime($inbox->dateSent));?> <?php echo"</td>
                 <td class='span2'><a class='btn btn-mini' href='viewMessage/$inbox->id&$inbox->dateSent'><i class='icon icon-folder-open'></i> Read</a>
                     <a class='btn btn-mini' onclick='deleteMessage($inbox->id)'><i class='icon icon-trash'></i> Delete</a></td>
             </tr>";

             }
             ?>
                     </tbody>
                     </table>
                 </div>
         </div>

         <div id="sent_form" class="span10">
                <h3>Sent Items</h3>
                 <div class="span12">
                 <table class="table table-striped table-bordered table-condensed">
                     <thead>
                     <tr>
                         <th><input type="checkbox"></th>
                         <th>Receiver</th>
                         <th>Subject</th>
                         <th>Preview</th>
                         <th>Date</th>
                         <th>Actions</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php
                 foreach(Message::find(array("status = 'sent' AND sender = '$my_email'","order"=>"dateSent DESC"))as $inbox){
                     $short_string = (strlen($inbox->message) > 70) ? substr($inbox->message,0,70).'...' : $inbox->message;
                     echo "<tr>
                         <td class='span1'><input type='checkbox'></td>
                         <td class='span2'>$inbox->receiver</td>
                         <td class='span2'>$inbox->subject</td>
                         <td class='span4'>$short_string</td>
                         <td class='span2'>";?><?php echo date('jS M', strtotime($inbox->dateSent));?> <?php echo"</td>
                         <td class='span2'><a class='btn btn-mini' href='viewMessage/$inbox->id&$inbox->dateSent'><i class='icon icon-folder-open'></i> Read</a>
                             <a class='btn btn-mini' onclick='deleteMessage($inbox->id)'><i class='icon icon-trash'></i> Delete</a></td>
                     </tr>";
                     }
                     ?>
                 </table>
             </div>

             </div>

         <div id="trash_form" class="span10">
            <h3>Trash</h3>
             <div class="span12">
                 <?php
                  $msgs = Message::find("status = 'trash' AND sender = '$my_email'");
                    if(count($msgs)==0)
                    {
                        echo "<h3 class='heading_a' >Your trash is empty</h3>";
                 }else
                 { ?>
                 <a onclick="emptyTrash()" class="btn btn-danger btn-small"><i class="icon icon-white icon-trash"></i> Empty Trash</a>
                 <br><br>
                 <table class="table table-striped table-bordered table-condensed">
                     <thead>
                     <tr>
                         <th><input type="checkbox"></th>
                         <th>Receiver</th>
                         <th>Subject</th>
                         <th>Preview</th>
                         <th>Date</th>

                     </tr>
                     </thead>
                     <tbody>

                  <?php
                        foreach($msgs as $inbox)
                        {
                            $short_string = (strlen($inbox->message) > 70) ? substr($inbox->message,0,70).'...' : $inbox->message;
                            echo "<tr>
                             <td class='span1'><input type='checkbox'></td>
                             <td class='span2'>$inbox->receiver</td>
                             <td class='span2'>$inbox->subject</td>
                             <td class='span4'>$short_string</td>
                             <td class='span2'>";?><?php echo date('jS M', strtotime($inbox->dateSent));?> <?php echo"</td>
                             </tr>";

                         }

                    }
                    ?>
                     </tbody>
                     </table>
                 </div>
         </div>
     </form>

    </div>

</div>

<script language="JavaScript" type="text/javascript">
    function deleteMessage(e)
    {
        bootbox.confirm("This will send the message to Trash folder. Are you sure?", function(result)
        {
            if(result==true)
            {
                $.ajax({
                   type: 'POST',
                   url:  'deleteMessage',
                   data: {data:e},
                   success: function(data){

                       alert(data);
                       window.location.reload(true);
                   }

        });
       }
        });
    }

    function emptyTrash()
    {
        bootbox.confirm("This will delete all Trash items from the database. This cannot be undone. Are you sure?", function(result)
        {
            if(result==true)
            {
                $.ajax({
                    type: 'POST',
                    url:  'emptyTrash',

                    success: function(data){

                        alert(data);
                        window.location.reload(true);
                    }

                });
            }
        });
    }
</script>


