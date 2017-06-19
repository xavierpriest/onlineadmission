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
                    <li><a href="../application">Back</a></li>
                    <li class="current"><a href="#personal">Edit Application</a></li>


                    <li><a href="../message">Messages
                            <span class="pull-right badge badge-info">3 unread</span></a></li>
                    <li><a href="../settings">Account Settings</a></li>
                    <li><a href="../faq">Frequently Asked Questions</a></li>
                </ul>
            </div>
        </div>
        <div class="span10">
            <div class="w-box">
                <div class="w-box-header">EDIT APPLICATION #{{ id }}
                <div class="pull-right">
                    <button onclick="$('#editForm').submit();" class="btn btn-mini"><i class="icon icon-refresh"></i> Save Changes</button>
                    <a href="../application" class="btn btn-mini"><i class="icon icon-remove"></i> Cancel</a>
                </div>
                </div>

                <div class="w-box-content">
                    <form class="" id="editForm" method="POST" action="../update">
                    <div class="tabbable tabbable-bordered">
                        <ul class="nav nav-tabs">
                            <br>
                            <li class="active"><a data-toggle="tab" href="#personal">Personal Details</a></li>
                            <li class=""><a data-toggle="tab" href="#academic">Academic Records</a></li>
                            <li><a data-toggle="tab" href="#english">English Records</a></li>
                            <li><a data-toggle="tab" href="#documents">Upload Documents  <i class="splashy-error"></i></a></li>

                        </ul>


                        <div class="tab-content">
                            <div id="personal" class="tab-pane active">
                                <p class="heading_a">Personal Details</p>
                                    <div class="span5">

                                        <div class="formSep control-group">
                                            <label for="firstname" class="control-label req">First Name:</label>
                                            <div class="controls">
                                                <input type="text" name="firstname" id="firstname" value="{{ app.getApplicant().firstname }}" class="span10 req">
                                                <span class="help-block inline">Must be at least 3 characters</span>
                                            </div>
                                        </div>


                                        <div class="formSep control-group">
                                            <label for="lastname" class="control-label req">Last Name:</label>
                                            <div class="controls">
                                                <input type="text" name="lastname" value="{{ app.getApplicant().lastname }}" id="lastname" class="span10 req">
                                                <span class="help-block inline">Must be at least 3 characters</span>
                                            </div>
                                        </div>

                                    <div class="formSep control-group">
                                        <label for="middlename" class="control-label req">Middle Name:</label>
                                        <div class="controls">
                                            <input type="text" name="middlename" value="{{ app.getApplicant().middlename }}" id="middlename" class="span10 req">

                                        </div>
                                    </div>

                                        <div class="formSep control-group">
                                            <label for="v_dob" class="control-label req">Date of Birth:</label>
                                            <div class="controls">
                                                <input type="text" name="dob" value="{{ app.getApplicant().dob }}" id="dob" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" class="span10">
                                                <span class="help-block">Cannot be blank</span>
                                            </div>
                                        </div>

                                        <div class="formSep control-group">
                                            <label for="v_pob" class="control-label">Place of Birth:</label>
                                            <div class="controls">
                                                <input type="text" name="pob" id="pob" value="{{ app.getApplicant().pob }}" class="span10">
                                                <span class="help-block">Required</span>
                                            </div>
                                        </div>

                                        <div class="formSep control-group">
                                            <label for="v_nationality" class="control-label req">Nationality</label>
                                            <div class="controls">
                                                <input type="text" value="{{ app.getApplicant().nationality }}" name="nationality" id="nationality" class="span10">
                                                <span class="help-block">Cannot be blank</span>
                                            </div>
                                        </div>

                                        <div class="formSep control-group">
                                            <label for="v_father" class="control-label req">Father's Name:</label>
                                            <div class="controls">
                                                <input type="text" name="father" id="father" value="{{ app.getApplicant().father }}" class="span10">
                                                <span class="help-block">At least 5 characters</span>
                                            </div>
                                        </div>

                                        <div class="formSep control-group">
                                            <label for="v_mother" class="control-label req">Mother's Name:</label>
                                            <div class="controls">
                                                <input type="text" name="mother" id="mother" value="{{ app.getApplicant().mother }}" class="span10">
                                                <span class="help-block">At least 5 characters</span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="span5">

                                        <div class="formSep control-group">
                                            <label for="v_address" class="control-label req">Address:</label>
                                            <div class="controls">
                                                <textarea type="text" name="address" id="address" class="span10" rows="3">
                                                    {{ app.getApplicant().contactAddress }}
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="formSep control-group">
                                            <label for="v_country" class="control-label req">Country:</label>
                                            <div class="controls">
                                                <select name="country" id="country" class="span10">

                                                    <option value="uk">United Kingdom</option>
                                                    <option value="fr">France</option>
                                                    <option value="de">Germany</option>
                                                    <option value="zb">Zimbabwe</option>
                                                    <option value="es">Spain</option>
                                                    <option value="lb">Lebanon</option>
                                                    <option value="iq">Iraq</option>
                                                    <option value="tr">Turkey</option>
                                                    <option value="us">United States</option>
                                                    <option value="ng">Nigeria</option>
                                                    <option value="drc">Democratic Republic of Congo</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="formSep control-group">
                                            <label for="v_tel" class="control-label">Telephone:</label>
                                            <div class="controls">
                                                <input type="tel" name="tel" value="{{ app.getApplicant().telephone }}" id="tel" class="span10">
                                            </div>
                                        </div>

                                        <div class="formSep control-group">
                                            <label for="v_mobile" class="control-label">Mobile:</label>
                                            <div class="controls">
                                                <input type="tel" name="mobile" value="{{ app.getApplicant().mobile }}" id="mobile" class="span10">
                                            </div>
                                        </div>



                                        <div class="formSep control-group">
                                            <label for="v_passport" class="control-label req">Passport Number:</label>
                                            <div class="controls">
                                                <input type="text" value="{{ app.getApplicant().passportNumber }}" name="passport" id="passport" class="span10">
                                                <span class="help-block">Cannot be blank</span>
                                            </div>
                                        </div>

                                        <div class="formSep control-group">
                                            <label for="v_place" class="control-label req">Place of Issue:</label>
                                            <div class="controls">
                                                <input type="text" value="{{ app.getApplicant().passprtPlace }}" name="place" id="place" class="span10">
                                                <span class="help-block">Cannot be blank</span>
                                            </div>
                                        </div>

                                        <div class="formSep control-group">
                                            <label for="issue" class="control-label req">Date of Issue:</label>
                                            <div class="controls">
                                                <input type="text" value="{{ app.getApplicant().passportDate }}" name="issue" data-date-format="yyyy-mm-dd" id="issue" placeholder="yyyy-mm-dd" class="span10">
                                                <span class="help-block">Cannot be blank</span>
                                            </div>
                                        </div>

                                        <div class="formSep control-group">
                                            <label for="v_expiry" class="control-label req">Expiry Date:</label>
                                            <div class="controls">
                                                <input type="text" value="{{ app.getApplicant().passportExpiry }}" name="expiry" id="expiry" placeholder="yyyy-mm-dd"
                                                       class="span10 date" data-date-format="yyyy-mm-dd">
                                                <span class="help-block">Cannot be blank</span>
                                            </div>
                                        </div>



                                    </div>




                            </div>

                            <div id="academic" class="tab-pane">
                                <p class="heading_a">Academic Records</p>
                                <p>Add details of most recently attended institution</p>
                                <div class="formSep control-group row-fluid">
                                    <div class="span6">
                                        <label for="school" class="control-label ">Name</label>
                                        <div class="controls">
                                            <input type="text" value="{{ app.getAcademic().school }}" name="school" id="school" class="span10">
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <label for="field" class="control-label ">Field of Study</label>
                                        <div class="controls">
                                            <input type="text" value="{{ app.getAcademic().field }}" name="field" id="field" class="span10">
                                        </div>
                                    </div>

                                </div>
                                <div class="formSep control-group row-fluid">


                                    <div class="span6">
                                        <label for="degree" class="control-label">Grade Average</label>
                                        <div class="controls">
                                            <input type="text" value="{{ app.getAcademic().degree }}" name="degree" id="degree" class="span10">
                                        </div>
                                    </div>

                                    <div class="span6">
                                        <label for="year" class="control-label">Year of Graduation</label>
                                        <div class="controls">
                                            <input type="text" value="{{ app.getAcademic().year }}" name="year" id="year" class="span10">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="english" class="tab-pane">
                                <p class="heading_a">English Records</p>
                                <p>Add records of English examinations you have taken. If you dont have any
                                you will be required to take an English Proficiency Test</p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Score</th>
                                            <th>Date Taken</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    {% for e in app.getEnglish() %}
                                        <tr>
                                            <td>{{ e.name | upper }}</td>
                                            <td>{{ e.score }}</td>
                                            <td>{{ e.date }}</td>
                                            <td><a href="javascript:removeEnglish('{{ e.id }}')" class="btn btn-mini"><i class="splashy-document_letter_remove"></i> Delete</a></td>
                                        </tr>
                                    {% endfor %}
                                </table>
                                <a class="btn" href="javascript:$('#myModal').modal('show');"><i class="icon icon-plus-sign"></i> Add English Record</a>
                            </div>

                            <div id="documents" class="tab-pane">
                                <p class="heading_a">Uploaded Documents </p>
                                <p>Upload documents for academic, English and personal details. File types allowed are:
                                .pdf, .jpg, .png, .gif</p>
                                {% if app.getFile().count() > 0 %}
                                <table id="files" class="table">
                                    <thead>
                                        <tr>
                                            <th>Filename</th>
                                            <th>Added On</th>
                                            <th>Size</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    {% for f in app.getFile() %}
                                        <!---Hidden Div for showing files--->
                                        <div style="display: none;">
                                            <a id="{{ f.id }}" href="/OnlineAdmission/{{ f.link }}" data-ob="lightbox"></a>
                                        </div>
                                        <!---end of hidden stuff--->
                                        <tr id="{{ f.id }}">
                                            <td>{{ f.filename }}</td>
                                            <td>{{ f.dateUploaded }}</td>
                                            <td>{{ f.size }} bytes</td>
                                            <td><a href="#documents" onclick="_('{{ f.id }}')" class="btn btn-mini"><i class="splashy-zoom_in"></i> View</a>
                                                 <a class="btn btn-mini" href="javascript:fileRemove('{{ f.id }}', '{{ app.id }}');"><i class="splashy-document_letter_remove"></i> Delete</a></td>
                                        </tr>
                                    {% endfor %}


                                </table>
                                {% else %}
                                    <h5>You have no files uploaded</h5>
                                {% endif %}
                                <br>
                                <div>
                                    <p class="heading_a">Add Files</p>
                                    <input id="upload" type="file" name="upload">
                                    <div id="some_file_queue"></div>
                                    <p><a class="btn btn-small" href="javascript:$('#upload').uploadify('upload','*')">Upload Files</a></p>

                                </div>
                            </div>


                            </div>
                        </div>
                </form>
                </div>

                        </div>
                    </div>

                </div>

            </div>



<div class="footer_space"></div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Add English Record</h4>
                <p>Please go to upload window and upload documents for each English exam entered</p>
            </div>
            <div class="modal-body">
               <div>
                   <div class="formSep control-group">
                       <label for="exam" class="control-label">Select one:</label>
                       <div class="controls">
                           <select id="exam" name="exam" class="span4">
                               <option value="ielts">IELTS</option>
                               <option value="toefl">TOEFL</option>
                               <option value="igcse">IGCSE</option>
                           </select>
                       </div>
                   </div>

                   <div class="formSep control-group">
                       <label for="date" class="control-label">Date Taken:</label>
                       <div class="controls">
                           <input type="text" name="e_date" id="e_date" class="span4"
                                  data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                       </div>
                   </div>

                   <div class="formSep control-group">
                       <label for="score" class="control-label">Score:</label>
                       <div class="controls">
                           <input type="number" class="span4" id="score" name="score">
                       </div>
                   </div>


               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="addEnglish()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" language="JavaScript">

    $(function(){
        var hash = window.location.hash;
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');

        $('.nav-tabs a').click(function (e) {
            $(this).tab('show');

            window.location.hash = this.hash;

        });
    });


    $('#upload').uploadify({
        'auto': false,
        'queueID':  'some_file_queue',
        'buttonClass': 'btn btn-mini',
        'buttonText': '<p>Select files</p>',
        'swf'      : '/OnlineAdmission/uploadify/uploadify.swf',
        'uploader' : '/OnlineAdmission/student/upload',
        'fileTypeExts': '*.gif; *.jpg; *.png; *.pdf',
        'onQueueComplete' : function(file, data, response)
        {
            window.location.reload(true);

        }
    });


    function fileRemove(e, i)
    {
       bootbox.confirm("This will delete the file. Are you sure ?", function(result){
           if(result==true)
           {
               $.ajax({
                   type: 'POST',
                   data: {data:e},
                   url: '../deleteFile',
                   success: function(data){
                       bootbox.alert("The file has been deleted!");
                       window.location.reload(true);

                   }

               });


           }

       });


    }

    $(document).ready(function() {
        if (location.hash !== '') $('a[href="' + location.hash + '"]').tab('show');
        return $('a[data-toggle="tab"]').on('shown', function(e) {
            return location.hash = $(e.target).attr('href').substr(1);
        });
    });

    function addEnglish()
    {
        var exam = $("#exam").val()
        var score = $("#score").val();
        var e_date = $("#e_date").val();

        $.ajax({
           type: 'POST',
           data: {exam: exam, score: score, d: e_date},
           url: '../addEnglish',
           success: function(data){
               window.location.reload(true);
           }
        });


    }

    function removeEnglish(e)
    {
        bootbox.confirm("This will delete the record. Are you sure ?", function(result){
            if(result==true)
            {
                $.ajax({
                    type: 'POST',
                    data: {data:e},
                    url: '../removeEnglish',
                    success: function(data){
                        window.location.reload(true);
                    }
                });
            }
        });
    }

    $('#e_date').datepicker();
    $('#expiry').datepicker();
    $('#issue').datepicker();
    $('#dob').datepicker();

    function _(x)
    {

        $("#"+x+"").trigger('click');

    }



</script>