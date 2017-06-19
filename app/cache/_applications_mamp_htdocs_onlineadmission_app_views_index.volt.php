<?php $url = new Phalcon\Mvc\Url();
                    $url->setBaseUri('/OnlineAdmission/'); ?>

<!DOCTYPE html>
<html>
	<head>



		<?php echo $this->tag->gettitle(); ?>
        <?php echo $this->assets->outputCss('style'); ?>
        <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
       <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

        <script src="<?=$url->getBaseUri(); ?>uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?=$url->getBaseUri(); ?>orangebox/js/orangebox.min.js"></script>
        <script type="text/javascript" src="<?=$url->getBaseUri(); ?>ext/js/bootstrap-datepicker.min.js"></script>


        <link rel="stylesheet" href="<?=$url->getBaseUri(); ?>orangebox/css/orangebox.css" type="text/css" />
        <link rel="stylesheet" href="<?=$url->getBaseUri(); ?>splashy/splashy.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?=$url->getBaseUri(); ?>uploadify/uploadify.css">
        <link rel="stylesheet" type="text/css" href="<?=$url->getBaseUri(); ?>img/icsw2_16.css">
        <link rel="stylesheet" type="text/css" href="<?=$url->getBaseUri(); ?>ext/css/datepicker.css">
        <link rel="stylesheet" type="text/css" href="../ext/css/smart_wizard.css">
        <link rel="stylesheet" type="text/css" href="../datatables/css/datatables_beoro.css">
        <link rel="stylesheet" type="text/css" href="<?=$url->getBaseUri(); ?>datatables/extras/TableTools/media/css/TableTools.css">

        <style>
            .datepicker{z-index:1151 !important;}
        </style>


        <?php echo $this->assets->outputJs('js'); ?>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Abel">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300">
        <script src="<?=$url->getBaseUri(); ?>ext/js/jquery.validate.js"></script>
        <script type="text/javascript">
            (function(a){a.fn.vAlign=function(){return this.each(function(){var b=a(this).height(),c=a(this).outerHeight(),b=(b+(c-b))/2;a(this).css("margin-top","-"+b+"px");a(this).css("top","50%");a(this).css("position","absolute")})}})(jQuery);(function(a){a.fn.hAlign=function(){return this.each(function(){var b=a(this).width(),c=a(this).outerWidth(),b=(b+(c-b))/2;a(this).css("margin-left","-"+b+"px");a(this).css("left","50%");a(this).css("position","absolute")})}})(jQuery);
            $(document).ready(function() {
                if($('#login-wrapper').length) {
                    $("#login-wrapper").vAlign().hAlign()
                };
                if($('#login-validate').length) {
                    $('#login-validate').validate({
                        onkeyup: false,
                        errorClass: 'error',
                        rules: {
                            email: { required: true, email: true },
                            password: { required: true }
                        }
                    })
                }
                if($('#forgot-validate').length) {
                    $('#forgot-validate').validate({
                        onkeyup: false,
                        errorClass: 'error',
                        rules: {
                            forgot_email: { required: true, email: true }
                        }
                    })
                }
                $('#pass_login').click(function() {
                    $('.panel:visible').slideUp('200',function() {
                        $('.panel').not($(this)).slideDown('200');
                    });
                    $(this).children('span').toggle();
                });
            });
        </script>
        <style type="text/css">
            #some_file_queue {
                background-color: #FFF;
                border-radius: 3px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.25);
                height: 103px;
                margin-bottom: 10px;
                overflow: auto;
                padding: 5px 10px;
                width: 300px;
            }
        </style>

        <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?=$url->getBaseUri(); ?>elfinder/css/elfinder.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?=$url->getBaseUri(); ?>elfinder/css/theme.css">

        <!-- elFinder JS (REQUIRED) -->
        <script type="text/javascript" src="<?=$url->getBaseUri(); ?>elfinder/js/elfinder.min.js"></script>



    </head>
	<body class="bg_d">
    <div class="main-wrapper">

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">

                <div class="container">
                    <div class="pull-right ">
                        <?php if ($userID == '') { ?>
                        <form action="account/login" >
                            <button class="btn btn-small btn-success"><i class="icon-user icon-white"></i> Log In</button>
                        </form>
                        <?php } else { ?>
                        <form action="../account/logout" >
                        <button class="btn btn-small btn-warning"><i class="icon-user icon-white"></i> Log Out</button>
                        </form>
                         <?php } ?>

                    </div>

                    <div id="fade-menu" class="pull-left">
                        <ul class="clearfix" id="mobile-nav">
                            <li>
                                <a href="http://www.gau.edu.tr/en">GAU Website</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">FAQ</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <header>



            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="main-logo"><a href="#"><img src="/OnlineAdmission/img/logo.png" alt="GAU Logo"></a></div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">

        <?php echo $this->flash->output(); ?>
		<?php echo $this->getContent(); ?>
            </div>
        </div>
        <!-- footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="span5">
                        <div>&copy; Girne American University <?php echo date("Y"); ?></div>
                    </div>
                    <div class="span7">
                        <ul class="unstyled">
                            <li><a href="#">Privacy Policy</a></li>
                            <li>&middot;</li>
                            <li><a href="#">Terms</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </footer>
    <script src="<?=$url->getBaseUri(); ?>js/bootbox.min.js"></script>

    <!---Datatables Javascipit Includes--->
    <script src="<?=$url->getBaseUri(); ?>datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- datatables column reorder -->
    <script src="<?=$url->getBaseUri(); ?>datatables/extras/ColReorder/media/js/ColReorder.min.js"></script>
    <!-- datatables column toggle visibility -->
    <script src="<?=$url->getBaseUri(); ?>datatables/extras/ColVis/media/js/ColVis.min.js"></script>
    <!-- datatable table tools -->
    <script src="<?=$url->getBaseUri(); ?>datatables/extras/TableTools/media/js/TableTools.min.js"></script>
    <script src="<?=$url->getBaseUri(); ?>datatables/extras/TableTools/media/js/ZeroClipboard.js"></script>
    <!-- datatables bootstrap integration -->
    <script src="<?=$url->getBaseUri(); ?>datatables/js/jquery.dataTables.bootstrap.js"></script>

    <script src="<?=$url->getBaseUri(); ?>datatables/js/beoro_datatables.js"></script>


    </body>

</html>