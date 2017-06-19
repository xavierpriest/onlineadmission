
<div class="container">


<div class="span12">
<form id="wizard-validation-form" class="form-horizontal" action="../student/submit" method="post">
<div class="clearfix">
    <br>
    <div class="offset8">

        <a href="index" class="btn btn-small"><i class="icon icon-backward"></i> Go back</a>
        <a name="incomplete" class="btn btn-primary btn-small" href="javascript:;" onclick="_('wizard-validation-form').action='../student/save'; _('wizard-validation-form').submit();">
            <i class="icon icon-flag icon-white"></i>
             Save & Continue Later</a>
        <input type="hidden" name="mess" value="test"/></div>
</div>
<div id="wizard-validation" class="swMain">

<ul>
    <li>
        <a href="#sw-val-step-1">
            <span class="stepNumber">1</span>
                        <span class="stepDesc">
                           General Information<small>Please fill in general information</small>
                        </span>
        </a>
    </li>
    <li>
        <a href="#sw-val-step-2">
            <span class="stepNumber">2</span>
                        <span class="stepDesc">
                           Contact Details<small>Fill your contact information</small>
                        </span>
        </a>
    </li>
    <li>
        <a href="#sw-val-step-3">
            <span class="stepNumber">3</span>
                <span class="stepDesc">
                   Course Details<small>Add information on intended course</small>
                </span>
        </a>
    </li>

    <li>
        <a href="#sw-val-step-4">
            <span class="stepNumber">4</span>
                <span class="stepDesc">
                   Academic Records<small>Add academic information</small>
                </span>
        </a>
    </li>

    <li>
        <a href="#sw-val-step-5">
            <span class="stepNumber">5</span>
                <span class="stepDesc">
                   Final Preview & Submit <small>Cross check every information and submit</small>
                </span>
        </a>
    </li>

</ul>

<div id="sw-val-step-1">
    <h2 class="StepTitle">Your Personal Details<small> </small></h2>
    <div class="formSep control-group">
        <label for="v_firstname" class="control-label req">First Name:</label>
        <div class="controls">
            <input type="text" name="v_firstname" id="v_firstname" class="span6 req">
            <span class="help-block">Must be at least 3 characters</span>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_lastname" class="control-label req">Last Name:</label>
        <div class="controls">
            <input type="text" name="v_lastname" id="v_lastname" class="span6">
            <span class="help-block">Must be at least 3 characters</span>
        </div>
    </div>


    <div class="formSep control-group">
        <label for="v_middlename" class="control-label">Middle Name:</label>
        <div class="controls">
            <input type="text" name="v_middlename" id="v_middlename" class="span6">
            <span class="help-block">Optional</span>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_dob" class="control-label req">Date of Birth:</label>
        <div class="controls">
            <input type="text" name="v_dob" id="v_dob" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" class="span6">
            <span class="help-block">Cannot be blank</span>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_pob" class="control-label">Place of Birth:</label>
        <div class="controls">
            <input type="text" name="v_pob" id="v_pob" class="span6">
            <span class="help-block">Required</span>
        </div>
    </div>

    <div class="formSep control-group">
        <label class="control-label req">Gender</label>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="v_gender" id="female" value="F" >
                Female
            </label>
            <label class="radio">
                <input type="radio" name="v_gender" id="male" value="M" >
                Male
            </label>
        </div>
    </div>

    <div class="formSep control-group">
        <label class="control-label req">Marital Status</label>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="v_status" id="single" value="S" >
                Single
            </label>
            <label class="radio">
                <input type="radio" name="v_status" id="married" value="M" >
                Married
            </label>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_residence" class="control-label req">Country of Residence</label>
        <div class="controls">
            <input type="text" name="v_residence" id="v_residence" class="span6">
            <span class="help-block">Cannot be blank</span>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_nationality" class="control-label req">Nationality</label>
        <div class="controls">
            <input type="text" name="v_nationality" id="v_nationality" class="span6">
            <span class="help-block">Cannot be blank</span>
        </div>
    </div>

    <h2 class="StepTitle">Parents' Details</h2>
    <div class="formSep control-group">
        <label for="v_father" class="control-label req">Father's Name:</label>
        <div class="controls">
            <input type="text" name="v_father" id="v_father" class="span6">
            <span class="help-block">At least 5 characters</span>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_mother" class="control-label req">Mother's Name:</label>
        <div class="controls">
            <input type="text" name="v_mother" id="v_mother" class="span6">
            <span class="help-block">At least 5 characters</span>
        </div>
    </div>

    <h2 class="StepTitle">Your Passport Information</h2>
    <div class="formSep control-group">
        <label for="v_passport" class="control-label req">Passport Number:</label>
        <div class="controls">
            <input type="text" name="v_passport" id="v_passport" class="span6">
            <span class="help-block">Cannot be blank</span>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_place" class="control-label req">Place of Issue:</label>
        <div class="controls">
            <input type="text" name="v_place" id="v_place" class="span6">
            <span class="help-block">Cannot be blank</span>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_issue" class="control-label req">Date of Issue:</label>
        <div class="controls">
            <input type="text" name="v_issue" data-date-format="yyyy-mm-dd" id="v_issue" placeholder="yyyy-mm-dd" class="span6">
            <span class="help-block">Cannot be blank</span>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_expiry" class="control-label req">Expiry Date:</label>
        <div class="controls">
            <input type="text" name="v_expiry" id="v_expiry" placeholder="yyyy-mm-dd"
                   class="span6 date" data-date-format="yyyy-mm-dd">
            <span class="help-block">Cannot be blank</span>
        </div>
    </div>


</div>
<div id="sw-val-step-2">
    <h2 class="StepTitle">Contact Information</h2>

    <div class="formSep control-group">
        <label for="v_address" class="control-label req">Address:</label>
        <div class="controls">
            <textarea type="text" name="v_address" id="v_address" class="span6" rows="3"></textarea>
        </div>
    </div>
    <div class="formSep control-group">
        <label for="v_country" class="control-label req">Country:</label>
        <div class="controls">
            <select name="v_country" id="v_country" class="span6">
                <option></option>
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
            <input type="tel" name="v_tel" id="v_tel" class="span6">
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_mobile" class="control-label">Mobile:</label>
        <div class="controls">
            <input type="tel" name="v_mobile" id="v_mobile" class="span6">
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_email" class="control-label req">Email:</label>
        <div class="controls">
            <input type="email" name="v_email" id="v_email" class="span6">
        </div>
    </div>

</div>
<div id="sw-val-step-3">
    <h2 class="StepTitle">Admission Information</h2>

    <div class="formSep control-group">
        <label class="control-label req">Select Degree of Study</label>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="degree" id="associate" value="Associate" >
                Associate (ASc)
            </label>
            <label class="radio">
                <input type="radio" name="degree" id="bachelor" value="Bachelor" >
                Bachelor (BSc, BArch, BA)
            </label>
            <label class="radio">
                <input type="radio" name="degree" id="masters" value="Masters" >
                Masters (MSc, MA, MArch, MBA)
            </label>
            <label class="radio">
                <input type="radio" name="degree" id="doctorate" value="Doctorate" >
                Doctorate (PhD)
            </label>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_faculty" class="control-label req">Faculty</label>
        <div class="controls">
            <select name="v_faculty" id="v_faculty" class="span6">
                <option></option>
                <option value="" selected="selected">Select a faculty</option>
                <option value="architecture">Faculty of Architecture, Design & Fine Arts</option>
                <option value="business">Faculty of Business & Economics</option>
                <option value="communications">Faculty of Communications</option>
                <option value="education">Faculty of Education</option>
                <option value="engineering">Faculty of Engineering</option>
                <option value="health">Faculty of Health Sciences</option>
                <option value="humanities">Faculty of Humanities</option>
                <option value="law">Faculty of Law</option>
                <option value="arts">Faculty of Performing Arts</option>
                <option value="marine">Marine School</option>
                <option value="sports">School of Sports</option>
                <option value="tourism">School of Tourism</option>
                <option value="sciences">Institute of Social & Applied Sciences</option>
                <option value="vocational">Vocational School</option>
            </select>
        </div>
    </div>

    <div class="formSep control-group">
        <label for="v_department" class="control-label req">Department</label>
        <div class="controls">
            <select name="v_department" id="v_department" class="span6">
                <option></option>
                <option value="" selected="selected">Select a department</option>
                <option value="cen">Computer Engineering</option>
                <option value="ien">Industrial Engineering</option>
                <option value="law">Law</option>
                <option value="ibm">International Business Management</option>
                <option value="ba">Business Administration</option>
                <option value="eco">Economics</option>
                <option value="cven">Civil Engineering</option>
                <option value="een">Electrical Engineering</option>
                <option value="dance">Dance</option>
                <option value="mis">Management Information Systems</option>

            </select>
        </div>
    </div>

    <div class="formSep control-group">
        <label class="control-label req">Select Entry Semester</label>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="semester" id="FALL2014" value="FALL2014" >
                FALL 2014
            </label>
            <label class="radio">
                <input type="radio" name="semester" id="SPRING2015" value="SPRING2015" >
                SPRING 2015
            </label>
            <label class="radio">
                <input type="radio" name="semester" id="SUMMER2015" value="SUMMER2015" >
                SUMMER 2015
            </label>
        </div>
    </div>
</div>
<div id="sw-val-step-4">
    <h2 class="StepTitle">High School/Institution/University</h2>

    <div class="formSep control-group row-fluid">
        <div class="span6">
            <label for="v_schoolname" class="control-label span3">Name</label>
            <div class="controls">
                <input type="text" name="v_schoolname" id="v_schoolname" class="span9">
            </div>
        </div>
        <div class="span6">
            <label for="v_field" class="control-label span3">Field of Study</label>
            <div class="controls">
                <input type="text" name="v_field" id="v_field" class="span9">
            </div>
        </div>

    </div>
    <div class="formSep control-group row-fluid">


        <div class="span6">
            <label for="v_grade" class="control-label">Grade Average</label>
            <div class="controls">
                <input type="text" name="v_grade" id="v_grade" class="span9">
            </div>
        </div>

        <div class="span6">
            <label for="v_year" class="control-label">Year of Graduation</label>
            <div class="controls">
                <input type="text" name="v_year" id="v_year" class="span9">
            </div>
        </div>
        </div>

        <h2 class="StepTitle">English Test Scores</h2>
        <div class="formSep control-group row-fluid">
            <div class="span2">
                <label for="v_toefl" class="checkbox">
                <input type="checkbox" id="toefl" value="Yes" name="toefl">
                    TOEFL</label>
            </div>
            <div class="span5">
                <label for="v_tscore" class="control-label">Score</label>
                <div class="controls">
                    <input type="number"  name="v_tscore" id="v_tscore" class="span11">
                </div>
            </div>
            <div class="span5">
                <label for="v_tdate" class="control-label">Date</label>
                <div class="controls">
                    <input type="text" name="v_tdate" id="v_tdate" class="span11"
                           data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                </div>
            </div>
        </div>

    <div class="formSep control-group row-fluid">
        <div class="span2">
            <label for="v_toefl" class="checkbox">
                <input type="checkbox" name="ielts" value="Yes" id="ielts">
                IELTS</label>
        </div>
        <div class="span5">
            <label for="v_tscore" class="control-label">Score</label>
            <div class="controls">
                <input type="number" name="v_ieltsscore" id="v_ieltsscore" class="span11">
            </div>
        </div>
        <div class="span5">
            <label for="v_tdate" class="control-label">Date</label>
            <div class="controls">
                <input type="text" name="v_ieltsdate" id="v_ieltsdate" class="span11"
                       data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
            </div>
        </div>
    </div>

    <div class="formSep control-group row-fluid">
        <div class="span2">
            <label for="v_toefl" class="checkbox">
                <input type="checkbox" name="igcse" value="Yes" id="igcse">
                IGCSE</label>
        </div>
        <div class="span5">
            <label for="v_igcsescore" class="control-label">Score</label>
            <div class="controls">
                <input type="number" name="v_igcsescore" id="v_igcsescore" class="span11">
            </div>
        </div>
        <div class="span5">
            <label for="v_igcsedate" class="control-label">Date</label>
            <div class="controls">
                <input type="text" name="v_igcsedate" id="v_igcsedate" class="span11"
                       data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
            </div>
        </div>
    </div>

    <div class="formSep control-group" >
        <h2 class="StepTitle">Upload Files</h2>
        <div class="span2">
         <p><input type="file" name="file_upload" id="file_upload" /></p>
        </div>
        <div class="span4">
            <small>Allowed files: .pdf, .jpeg, .png. File size is limited to 5MB</small>
            <div id="some_file_queue"></div>
            <p><a class="btn btn-small" href="javascript:$('#file_upload').uploadify('upload','*')">Upload Files</a></p>
        </div>

    </div>
    </div>



<div id="sw-val-step-5" style="height: 900px; overflow: auto;">
    <h2 class="StepTitle">Final Preview</h2>
    <div class="toolbar clearfix">
        <div class="pull-left">
            <div class="toolbar-icons clearfix">
                <a href="#" class="ptip_ne" title="Edit Application"><i class="icsw16-pencil icsw16-white"></i></a>
                <a href="#" class="ptip_ne" title="Print Application"><i class="icsw16-printer icsw16-white"></i></a>
            </div>
        </div>
        <div class="pull-right">
            <span class="toolbar_text"><span class="muted">Updated:</span> <?php echo date('l jS \of F Y h:i:s A'); ?></span>
        </div></div>



        <div class="row-fluid invoice_preview">
            <br>
            <h1><span>Application Form</span></h1>
            <div class="span5">
                <h3 class="StepTitle">General Information</h3>
                <p id="p1" class="sepH_a"></p>
                <p id="p2" class="sepH_a"></p>
                <p id="p3" class="sepH_a"></p>
                <p id="p4" class="sepH_a"></p>
                <p id="p5" class="sepH_a"></p>
                <p id="p6" class="sepH_a"></p>
                <p id="p7" class="sepH_a"></p>
                <p id="p8" class="sepH_a"></p>
                <p id="p9" class="sepH_a"></p>
                <p id="p10" class="sepH_a"></p>
                <p id="p11" class="sepH_a"></p>
    <br>
                <h3 class="StepTitle">Passport Information</h3>
                <p id="passno" class="sepH_a"></p>
                <p id="passpl" class="sepH_a"></p>
                <p id="issue" class="sepH_a"></p>
                <p id="expiry" class="sepH_a"></p>


            </div>

            <div class="span5 offset1">
                <h3 class="StepTitle">Contact Information</h3>

                <p id="address" class="sepH_a"></p>
                <p id="country" class="sepH_a"></p>
                <p id="tel" class="sepH_a"></p>
                <p id="mobile" class="sepH_a"></p>
                <p id="email" class="sepH_a"></p>
    <br>
                <h3 class="StepTitle">Course Information</h3>
                <p id="deg" class="sepH_a"></p>
                <p id="fac" class="sepH_a"></p>
                <p id="dep" class="sepH_a"></p>
                <p id="sem" class="sepH_a"></p>
    <br>
                <h3 class="StepTitle">High School/Institution/University Attended</h3>
                <p id="schoolname" class="sepH_a"></p>
                <p id="field" class="sepH_a"></p>
                <p id="grade" class="sepH_a"></p>
                <p id="year" class="sepH_a"></p>
    <br>

            </div>

            <div class="span11">

                <h3 class="StepTitle">Applicant's Declaration</h3>
                <p>I/we declare that all information provided in connection with this application form is complete
                and accurate; that I/we have read and understood all rules and regulations that are published in the
                official publications of the University. I/we agree that if there is any difference in meaning of the
                provisions of the English version and any translated version of this form or the Terms & Conditions to
                me/us, the English version is to prevail.</p>
            <div class="control-group">
                <input type="checkbox" name="ag" id="ag"> I/we agree
            </div>
            </div>


        </div>




</div>



</div>
<input type="hidden" id="files" name="files">
</form>
</div>


<?php echo $this->assets->outputJs('extraJs'); ?>

<script type="text/javascript">
    var files = [];
    <?php $timestamp = time();?>
    $(function() {
        $('#file_upload').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
            },

            'auto':     false,
            'buttonImage': false,
            'queueID':  'some_file_queue',
            'buttonClass': 'btn',
            'buttonText': 'Choose documents',
            'swf'      : '../uploadify/uploadify.swf',
            'uploader' : '/OnlineAdmission/student/upload',
            'onUploadSuccess' : function(file, data, response)
            {
                files.push(file.name);

            },
            'onQueueComplete': function ()
            {
                _('files').value = files.toString();
            }
        });
    });

</script>

<script type="text/javascript" language="JavaScript">

    $('#v_dob').datepicker();
    $('#v_issue').datepicker();
    $('#v_expiry').datepicker();
    $('#v_igcsedate').datepicker();
    $('#v_ieltsdate').datepicker();
    $('#v_tdate').datepicker();


    function _(x)
    {
        return document.getElementById(x);
    }

    function f()
    {
        var n = _("v_firstname").value;
        _("p1").innerHTML = "<span class='muted'>Name</span>: "+ n;

        var s = _("v_lastname").value;
        _("p2").innerHTML = "<span class='muted'>Surname</span>: "+ s;

        var m = _("v_middlename").value;
        _("p3").innerHTML = "<span class='muted'>Middle Name</span>: "+ m;

        var ft = _("v_father").value;
        _("p4").innerHTML = "<span class='muted'>Father's Name</span>: "+ ft;

        var mt = _("v_mother").value;
        _("p5").innerHTML = "<span class='muted'>Mother's Name</span>: "+ mt;

        var dob = _("v_dob").value;
        _("p6").innerHTML = "<span class='muted'>Date of Birth</span>: "+ dob;

        var pob = _("v_pob").value;
        _("p7").innerHTML = "<span class='muted'>Place of Birth</span>: "+ pob;

        var res = _("v_residence").value;
        _("p8").innerHTML = "<span class='muted'>Country of Residence</span>: "+ res;

        var nat = _("v_nationality").value;
        _("p9").innerHTML = "<span class='muted'>Nationality</span>: "+ nat;

        var gen = $('input[name="v_gender"]:checked').val();
        _("p10").innerHTML = "<span class='muted'>Gender</span>: "+ gen;

        var stat = $('input[name="v_status"]:checked').val();
        _("p11").innerHTML = "<span class='muted'>Status</span>: "+ stat;

        var passno = _("v_passport").value;
        _("passno").innerHTML = "<span class='muted'>Passport Number</span>: "+ passno;

        var passpl = _("v_place").value;
        _("passpl").innerHTML = "<span class='muted'>Place of Issue</span>: "+ passpl;

        var issue = _("v_issue").value;
        _("issue").innerHTML = "<span class='muted'>Date of Issue</span>: "+ issue;

        var expiry = _("v_expiry").value;
        _("expiry").innerHTML = "<span class='muted'>Date of Expiry</span>: "+ expiry;

        var addr = _("v_address").value;
        _("address").innerHTML = "<span class='muted'>Address</span>: "+ addr;

        var cntry = $('#v_country :selected').text();
        _("country").innerHTML = "<span class='muted'>Country</span>: "+ cntry;

        var tel = _("v_tel").value;
        _("tel").innerHTML = "<span class='muted'>Telephone</span>: "+ tel;

        var mo = _("v_mobile").value;
        _("mobile").innerHTML = "<span class='muted'>Mobile</span>: "+ mo;

        var em = _("v_email").value;
        _("email").innerHTML = "<span class='muted'>Email</span>: "+ em;

        var deg = $('input[name="degree"]:checked').val();
        _("deg").innerHTML = "<span class='muted'>Degree</span>: "+ deg;

        var fac = $('#v_faculty :selected').text();
        _("fac").innerHTML = "<span class='muted'>Faculty</span>: "+ fac;

        var dep = $('#v_department :selected').text();
        _("dep").innerHTML = "<span class='muted'>Department</span>: "+ dep;

        var sem = $('input[name="semester"]:checked').val();
        _("sem").innerHTML = "<span class='muted'>Semester</span>: "+ sem;

        var schname = _("v_schoolname").value;
        _("schoolname").innerHTML = "<span class='muted'>Name</span>: "+ schname;

        var fd = _("v_field").value;
        _("field").innerHTML = "<span class='muted'>Field of Study</span>: "+ fd;

        var gr = _("v_grade").value;
        _("grade").innerHTML = "<span class='muted'>Degree Obtained</span>: "+ gr;

        var yr = _("v_year").value;
        _("year").innerHTML = "<span class='muted'>Year of Graduation</span>: "+ yr;

    }

    function SaveIncomplete()
    {


    }




</script>
</div>
<div class="footer_space"></div>
