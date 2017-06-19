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
                    <li><a href="../staff/dashboard">Dashboard</a></li>
                    <li><a href="../staff/applications">Applications
                            <span class="pull-right badge badge-info">{{ countNew }} new</span>
                        </a></li>
                    <li><a href="#">Statistics</a></li>
                    <li><a href="#">Messages
                            <span class="pull-right badge badge-info">3 unread</span></a></li>
                    <li><a href="#">Profile</a></li>

                </ul>
            </div>
        </div>




        <div class="span10">
            <div class="w-box w-box-green">
                <div class="w-box-header">VIEW APPLICATIONS</div>
                <div class="w-box-content">

                            <table class="dataTable table table-striped" id="dt_basic">

                            {% for a in apps %}
                                {% if loop.first %}
                                    <thead>
                                <tr>
                                    <th class="sorting_desc_disabled sorting_asc_disabled">Controls</th>
                                    <th>Status</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Middle name</th>
                                    <th>Course</th>
                                    <th>Semester</th>
                                    <th>Degree</th>
                                    <th>Country</th>
                                </tr>
                                </thead>
                                {% endif %}
                                <tbody>
                    <tr>
                        <td>
                            <div class="btn-group">
                                <a href="javascript:details('{{ a.id }}');" class="btn btn-mini" title="View"><i class="icon-eye-open"></i></a>
                                <a href="javascript:update('{{ a.id }}');" class="btn btn-mini" title="Update Status"><i class="icon-check"></i></a>
                            </div>
                        </td>
                        <td><span class="{{ a.getStatus().class }}">{{ a.getStatus().name }}</span></td>
                        <td>{{ a.getApplicant().firstname }}</td>
                        <td>{{ a.getApplicant().lastname }}</td>
                        <td>{{ a.getApplicant().middlename }}</td>
                        <td>{{ a.getDepartment().name }}</td>
                        <td>{{ a.semester }}</td>
                        <td>{{ a.degree }}</td>
                        <td>{{ a.getApplicant().residenceCountry }}</td>
                    </tr>
                    {% endfor %}

                                </tbody>
                                </table>


                </div>

            </div>

        </div>



    </div>
    <div class="row-fluid">
        <div class=" w-box w-box-green">
            <div class="w-box-header">APPLICATION DETAILS</div>

            <div class="w-box-content"><br>
                <div class="tabbable tabbable-bordered">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#personal">Personal Details</a></li>
                        <li class=""><a data-toggle="tab" href="#academic">Academic Records</a></li>
                        <li><a data-toggle="tab" href="#english">English Records</a></li>
                        <li><a data-toggle="tab" href="#documents">Uploaded Documents</a></li>

                    </ul>
                    <div class="tab-content">
                        <div id="academic" class="tab-pane" >
                            <p class="heading_a">Academic Records</p>
                            <p id="a1" class="sepH_a"></p>
                            <p id="a2" class="sepH_a"></p>
                            <p id="a3" class="sepH_a"></p>
                            <p id="a4" class="sepH_a"></p>
                        </div>
                        <div id="english" class="tab-pane" >
                            <p class="heading_a">English Records</p>
                            <div id="x">

                            </div>

                    </div>
                       <div class="tab-pane" id="documents">
                           <p class="heading_a">Uploaded Documents</p>
                           <div id="y" class="span7"></div>
                       </div>

                        <div class="tab-pane active" id="personal">
                            <p class="heading_a">Personal Details</p>
                            <div class="" id="z">
                                <div class="span4">
                                    <p id="p1" class="sepH_a"></p>
                                    <p id="p2" class="sepH_a"></p>
                                    <p id="p3" class="sepH_a"></p>
                                    <p id="p4" class="sepH_a"></p>
                                </div>
                                <div class="span4">
                                    <p id="p5" class="sepH_a"></p>
                                    <p id="p6" class="sepH_a"></p>
                                    <p id="p7" class="sepH_a"></p>
                                    <p id="p8" class="sepH_a"></p>
                                </div>
                                <div class="span4">
                                    <p id="p9" class="sepH_a"></p>
                                    <p id="p10" class="sepH_a"></p>
                                    <p id="p11" class="sepH_a"></p>
                                    <p id="p12" class="sepH_a"></p>
                                </div>

                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:800px;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <img id="img-in-modal" src="#" width="100%" height="100%"/>
            <div id="pdf-in-modal">
                <object width="800" height="800" type="application/pdf" data="" id="pdf_content">
                    <p>Can not open this file.</p>
                </object>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>

<script type="application/javascript" language="JavaScript">



            function details(t)
            {
                $.ajax({
                    type: 'POST',
                    data: {data:t},
                    url: '../staff/details',
                    success: function(data)
                    {
                        var jsonData = JSON.parse(data);
                        _("a1").innerHTML = "<span class='muted'>Name of School</span>: "+ jsonData.school;
                        _("a2").innerHTML = "<span class='muted'>Degree Obtained</span>: "+ jsonData.degree;
                        _("a3").innerHTML = "<span class='muted'>Year of Completion</span>: "+ jsonData.year;
                        _("a4").innerHTML = "<span class='muted'>Field of Study</span>: "+ jsonData.field;

                    }

                });

                $.ajax ({
                    type:'POST',
                    data:{data:t},
                    url: '../staff/english',
                    success: function(data)
                    {
                        var jsonEng = JSON.parse(data);
                        $("#x").empty();
                        for (var i=0; i<jsonEng.length; i++)
                        {
                            var counter = jsonEng[i];

                            var p = document.createElement('p');
                            p.className = "";
                            p.innerHTML ="<span class='muted'></span>"+counter.name.toUpperCase() + "";
                            _("x").appendChild(p);

                            var p1 = document.createElement('p');
                            p1.className = 'sepH_a';
                            p1.innerHTML = "<span class='muted'>   Score</span>: "+counter.score+"<span class='muted'><br>   Date</span>: "+moment(counter.date).format("MMMM Do, YYYY")+"<hr>";
                            _("x").appendChild(p1);
                        }
                    }
                });

                $.ajax ({
                   type:'POST',
                   data:{data:t},
                   url: '../staff/files',
                   success: function(data)
                   {
                       $("#y").empty();
                        createTable(data);

                   }
                });

                $.ajax ({
                    type:'POST',
                    data:{data:t},
                    url: '../staff/personal',
                    success: function(data)
                    {
                        var jsonP = JSON.parse(data);
                        var d = moment(jsonP.dob).format("MMMM Do, YYYY");
                        _("p1").innerHTML = "<span class='muted'>Email</span>: "+ jsonP.email;
                        _("p2").innerHTML = "<span class='muted'>Address</span>: "+ jsonP.contactAddress;
                        _("p3").innerHTML = "<span class='muted'>Telephone</span>: "+ jsonP.telephone;
                        _("p4").innerHTML = "<span class='muted'>Mobile</span>: "+ jsonP.mobile;
                        _("p5").innerHTML = "<span class='muted'>Date of Birth</span>: "+ d;
                        _("p6").innerHTML = "<span class='muted'>Gender</span>: "+ jsonP.gender;
                        _("p7").innerHTML = "<span class='muted'>Marital Status</span>: "+ jsonP.maritalStatus;
                        _("p8").innerHTML = "<span class='muted'>Nationality</span>: "+ jsonP.nationality;
                        _("p9").innerHTML = "<span class='muted'>Passport Number</span>: "+ jsonP.passportNumber;
                        _("p10").innerHTML = "<span class='muted'>Place of Issue</span>: "+ jsonP.passprtPlace;
                        _("p11").innerHTML = "<span class='muted'>Date of Issue</span>: "+ moment(jsonP.passportDate).format("MMMM Do, YYYY");
                        _("p12").innerHTML = "<span class='muted'>Date of Expiry</span>: "+ moment(jsonP.passportExpiry).format("MMMM Do, YYYY");

                    }


                })
            }


            function _(x)
            {
                return document.getElementById(x);
            }

            function createTable(d)
            {
                var jsonFiles = JSON.parse(d);
                var table = document.createElement('table');
                table.className = "table";
                var tr = document.createElement('tr');
                var th1 = document.createElement('th');
                var th2 = document.createElement('th');
                var th3 = document.createElement('th');
                var th4 = document.createElement('th');
                var header1 = document.createTextNode('Filename');
                var header2 = document.createTextNode('Type');
                var header3 = document.createTextNode('Size');
                var header4 = document.createTextNode('Link');

                th1.appendChild(header1);
                th2.appendChild(header2);
                th3.appendChild(header3);
                th4.appendChild(header4);
                tr.appendChild(th1);
                tr.appendChild(th2);
                tr.appendChild(th3);
                tr.appendChild(th4);

                table.appendChild(tr);
                for (var i = 0; i < jsonFiles.length; i++){
                    var tr = document.createElement('tr');

                    var td1 = document.createElement('td');
                    var td2 = document.createElement('td');
                    var td3 = document.createElement('td');
                    var td4 = document.createElement('td');

                    var text1 = document.createTextNode(jsonFiles[i].filename);
                    var text2 = document.createTextNode(jsonFiles[i].extension);
                    var text3 = document.createTextNode(jsonFiles[i].size);
                    var a = document.createElement('a');
                    //a.data-img-url = "../"+jsonFiles[i].link;
                    a.href = "javascript:viewImage('"+jsonFiles[i].link+"', '"+jsonFiles[i].extension +"')";
                    a.className = "img-modal";
                    a.innerHTML = "View";


                    td1.appendChild(text1);
                    td2.appendChild(text2);
                    td3.appendChild(text3);
                    td4.appendChild(a);
                    tr.appendChild(td1);
                    tr.appendChild(td2);
                    tr.appendChild(td3);
                    tr.appendChild(td4);

                    table.appendChild(tr);
                }
                _('y').appendChild(table);

            }

            function update(x){
                bootbox.dialog({
                            title: "Update Admission Status",
                            message: '<div class="row">  ' +
                                    '<div class="span12"> ' +
                                    '<form class="form-horizontal" id="updateForm"> ' +
                                    '<div class="formSep control-group">'+
                                    '<label for="status" class="control-label">Admission Status</label>'+
                                    '<div class="controls"><select name="status" id="status" class="span3">'+
                                    '<option value="2">Checked</option>'+
                                    '<option value="3">Pending or Incomplete Application</option>'+
                                    '<option value="4">Provisional Admission Letter has been sent</option>'+
                                    '</select></div></div>'+
                                    '<div class="formSep control-group">'+
                                    '<label for="notes" class="control-label">Additional Message</label>'+
                                    '<div class="controls"><textarea type="text" name="notes" id="notes" class="span3" rows="3"></textarea>'+
                                    '</div></div>'+

                                    '</form> </div>  </div>',
                            buttons: {
                                success: {
                                    label: "Save",
                                    className: "btn-success",
                                    callback: function () {
                                        var id = x;
                                        var status = $("#status").val();
                                        var notes = $("#notes").val();
                                        $.ajax({
                                            type: 'POST',
                                            url: '../staff/updateStatus',
                                            data: {id: id, status:status, notes: notes },
                                            success: function (data) {
                                                alert(data);
                                                location.reload();
                                            }
                                        });
                                    }
                                }
                            }
                        }
                );
            }

            function viewImage(x, y){
                var link = "../" + x;
                if(y == 'application/pdf')
                {
                    $( "#img-in-modal" ).hide();
                    $( "#pdf-in-modal" ).show();
                    $("#pdf_content").attr("data", link);
                    $('#myModal').modal('show');
                }
                else {
                    $( "#pdf-in-modal" ).hide();
                    $( "#img-in-modal" ).show();
                    $("#img-in-modal").attr("src", link);
                    $('#myModal').modal('show');
                }
            }

</script>
    </div>
<div class="footer_space"></div>