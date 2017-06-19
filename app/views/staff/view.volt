<div class="container">
    <br>
    <div class="toolbar clearfix">
        <div class="pull-left"><span class="toolbar_text"><span class="muted">Today:</span> <?php echo date('l jS \of F Y h:i:s A'); ?></span>
        </div>
        <div class="pull-right">
            <form method="post" id="filterForm" action="view">

            <span class="toolbar_text"><span class="muted">Current Semester:</span>
                <select class="span2">
                    <option>SPRING 2015</option>
                    <option>SUMMER 2015</option>
                    <option>FALL 2015</option>
            </select> </span>
            <span class="span1"></span>
            <span class="toolbar_text"><span class="muted">Faculties:</span>

                <select id="f" name="f" class="span3" onchange="filter();">
                    <option value="-1">Select faculty</option>
                    {% for f in faculties %}
                    <option value="{{ f.name }}">{{ f.description }}</option>
                    {% endfor %}
                </select> </form></span>
        </div>
       </div>
    <div class="row-fluid">

        <div class="span2">
            <div class="sidebar">
                <div class="w-box w-box-green">
                    <div class="w-box-header">MAIN MENU</div>
                    <div class="w-box-content">
                        <ul id="pageNav">
                            <li class="current"><a href="../staff/view">Admissions</a></li>
                            <li><a href="../staff/index">Dashboard</a></li>
                        </ul>
                    </div>
                </div>

                <div class="w-box w-box-green">
                    <div class="w-box-header">APPLICATION STATUS</div>
                    <div class="w-box-content">
                        <ul id="pageNav">
                            <li><a href="#">New
                                <span class="pull-right badge badge-info">{{ new }}</span></a></li>
                            <li><a href="#">Complete
                                    <span class="pull-right badge badge-info">{{ complete }}</span></a></li>
                            <li><a href="#">Pending
                                    <span class="pull-right badge badge-info">{{ pending }}</span></a></li>
                            <li><a href="#">Checked
                                    <span class="pull-right badge badge-info">{{ checked }}</span></a></li>
                            <li><a href="#">PAL
                                    <span class="pull-right badge badge-info">{{ pal }}</span></a></li>

                        </ul>
                    </div>
                </div>
                <div class="w-box w-box-green">
                    <div class="w-box-header">REPLY STATUS

                    </div>
                    <div class="w-box-content">
                        <ul id="pageNav">
                            <li><a href="#">Replied</a></li>
                            <li><a href="#">Not Replied</a></li>
                            <li><a href="#">Conditionally Accepted</a></li>
                            <li><a href="#">Accepted</a></li>
                            <li><a href="#">Not Accepted</a></li>
                        </ul>
                    </div>
                </div>



            </div>
        </div>

        <div class="span10">

            <div class="row-fluid">
                <div class="span6 offset4">
                   <?php if($page->current != 1) { ?>
                    <a class="btn btn-mini" href="?page=<?= $page->before; ?>"><i class="icon icon-chevron-left"></i>Previous</a>
                <?php } else { ?>
                    <a class="btn btn-mini disabled" onclick="return false;" href="?page=<?= $page->before; ?>"><i class="icon icon-chevron-left"></i>Previous</a>
                <?php
                    }
                    for($i=1; $i<=$page->total_pages; $i++)
                    {
                        if($i == $page->current){
                            echo "<a class='btn btn-mini disabled' onclick='return false;' href='?page=".$i."'> ".$i." </a>";
                            echo " ";
                        }
                        else {
                            echo "<a class='btn btn-mini' href='?page=".$i."'> ".$i." </a>";
                            echo " ";
                        }



                    }
                  if($page->current != $page->last){

                    if($page->current == $page->last - 1)
                    {
                        ?>
                        <a class="btn btn-mini" href="?page=<?= $page->last; ?>">Next<i class="icon icon-chevron-right"></i></a>

                    <?php } else { ?>
                         <a class="btn btn-mini" href="?page=<?= $page->next; ?>">Next<i class="icon icon-chevron-right"></i></a>
                <?php }}
                   else {
                ?>
                    <a class="btn btn-mini disabled" onclick="return false;" href="?page=<?= $page->last; ?>">Next<i class="icon icon-chevron-right"></i></a>
                <? } ?>
                </div>
            </div>
            <?php foreach ($page->items as $a) { ?>

                <div class="w-box">
                    <div class="w-box-header">
                        APPLICATION #{{ a.id }}
                        <div class="pull-right span4">
                            <div class="pull-right">
                            <div class="toggle-group">
                                <span class="dropdown-toggle" data-toggle="dropdown">Manage <span class="caret"></span></span>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Approve</a></li>
                                    <li><a href="#">Checked</a></li>
                                    <li><a href="#">Incomplete</a></li>
                                </ul>
                            </div>
                            </div>

                                <a href="#" onclick="_('{{ a.id }}')" id="view-{{ a.id }}"  class="btn btn-mini"><i class="icon-file"></i> View Documents</a>
                                <a href="#" class="btn btn-mini"><i class="icon-envelope"></i> Send PAL</a>
                        </div></div>
                    <div class="w-box-content cnt_a">
                <div class="row-fluid">
                    <div class="span12">
                        <h3 class="heading_a span12" style="font-size: 22px">{{ a.getApplicant().firstname }} {{ a.getApplicant().lastname }}</h3>
                       <div style="display: none;">
                           {% for f in a.getFile() %}
                              {% if loop.first %}
                                <a id="{{ a.id }}" href="../{{ f.link }}" data-ob="lightbox[{{ a.id }}]"></a>
                            {% else %}
                                <a href="../{{ f.link }}" data-ob="lightbox[{{ a.id }}]"></a>
                            {% endif %}
                           {% endfor %}
                       </div>
                        <p class="span2"><span class="muted">Status: </span><span class="{{ a.getStatus().class }}">{{ a.getStatus().name }}</span></p>
                        <p class="span3 sepH_a"><span class="muted">Submitted On: </span><?php echo date('jS M Y', strtotime($a->dateCreated)); ?></p>
                        <p class="span3 sepH_a"><span class="muted">Degree: </span>{{ a.degree }}</p>
                        <p class="span3 sepH_a"><span class="muted">Course: </span>{{ a.getDepartment().name }}</p>

                    </div>
                    <div class="row-fluid">
                        <div class="tabbable tabs-left tabbable-bordered">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#personal-{{ a.id }}">Personal Details</a></li>
                                <li class=""><a data-toggle="tab" href="#academic-{{ a.id }}">Academic Records</a></li>
                                <li><a data-toggle="tab" href="#english-{{ a.id }}">English Records</a></li>

                            </ul>
                            <div class="tab-content">
                                <div id="academic-{{ a.id }}" class="tab-pane" >
                                    <div class="span4">
                                        <p id="p1" class="sepH_a"><span class="muted">Name of School: </span>{{ a.getAcademic().school }}</p>
                                        <p id="p2" class="sepH_a"><span class="muted">Area of Study </span>{{ a.getAcademic().field }}</p>
                                        <p id="p3" class="sepH_a"><span class="muted">Graduation Year </span>{{ a.getAcademic().year }}</p>
                                        <p id="p4" class="sepH_a"><span class="muted">Degree Obtained </span>{{ a.getAcademic().degree }}</p>
                                    </div>


                                </div>
                                <div id="english-{{ a.id }}" class="tab-pane" >

                                    <div id="x"></div>

                                </div>

                                <!--- <p class="row-fluid heading_a"><span class="label label-info">{{ a.degree }}</span>  {{ a.getDepartment().name }}</p>
                    --->
                                <div class="tab-pane active" id="personal-{{ a.id }}">

                                    <div class="" id="z">
                                        <div class="span4">
                                            <p id="p1" class="sepH_a"><span class="muted">Passport Number: </span>{{ a.getApplicant().passportNumber }}</p>
                                            <p id="p2" class="sepH_a"><span class="muted">Country </span>{{ a.getApplicant().passprtPlace }}</p>
                                            <p id="p3" class="sepH_a"><span class="muted">Issue Date: </span><?php echo date('jS M Y', strtotime($a->Applicant->passportDate)); ?></p>
                                            <p id="p4" class="sepH_a"><span class="muted">Expiry Date: </span><?php echo date('jS M Y', strtotime($a->Applicant->passportExpiry)); ?></p>
                                        </div>
                                        <div class="span4">
                                            <p id="p5" class="sepH_a"><span class="muted">DOB: </span><?php echo date('jS M Y', strtotime($a->Applicant->dob)); ?></p>
                                            <p id="p6" class="sepH_a"><span class="muted">Gender: </span>{{ a.getApplicant().gender }}</p>
                                            <p id="p7" class="sepH_a"><span class="muted">Marital Status: </span>{{ a.getApplicant().maritalStatus }}</p>
                                            <p id="p8" class="sepH_a"><span class="muted">Place of Birth: </span>{{ a.getApplicant().pob }}</p>
                                        </div>
                                        <div class="span4">
                                            <p id="p9" class="sepH_a"><span class="muted">Father's name: </span>{{ a.getApplicant().father }}</p>
                                            <p id="p10" class="sepH_a"><span class="muted">Mother's name: </span>{{ a.getApplicant().mother }}</p>
                                            <p id="p11" class="sepH_a"><span class="muted">Telephone: </span>{{ a.getApplicant().telephone }}</p>
                                            <p id="p12" class="sepH_a"><span class="muted">Address: </span>{{ a.getApplicant().contactAddress }}</p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                    </div>


                </div>
                    </div>
               </div>


        </div>
            <?php } ?>
        </div>
    </div>
</div>


    <div id="fg" style="display: none">


    </div>

<script type="text/javascript" language="JavaScript">

    oB.settings.addThis = false;

    function formatDate(x){
        return moment(x).format("MMMM Do, YYYY");
    }

    function _(x)
    {
        //$("#view-"+x+"").click(function(){
            $("#"+x+"").trigger('click');
        //})
    }

    function filter()
    {

        document.getElementById("filterForm").submit();
    }
</script>