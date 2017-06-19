<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>UploadiFive Test</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="../../uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../uploadify/uploadify.css">
    <style type="text/css">
        #uploadify {
            background: #FF5500;
            border-radius: 5px;
        }

        #uploadify:hover {
            background: #B33C00;
        }

        #uploadify object {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 25px;
        }
    </style>
</head>

<body>



<script type="text/javascript">
    $("#uploadify_button").uploadify({
        'hideButton' : true,
        'wmode'      : 'transparent',
        'script'     : '/uploadify.php',
        'folder'     : '/uploads',
        'multi'      : true,
        'width'      : '140',
        'height'     : '25'
    });
</script>
</body>
</html>