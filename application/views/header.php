<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DWJ Locações</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url(); ?>assets/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url(); ?>assets/admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url(); ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script>
        function createRequest() {
            try {
                request = new XMLHttpRequest();
            } catch (tryMS) {
                try {
                    request = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (otherMS) {
                    try {
                        request = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (failed) {
                        request = null;
                    }
                }
            }
            return request;
        }
        function ajax(elemento_id, func, par) {

            elemento = document.getElementById(elemento_id);
            //elemento.innerHTML = "<center><img src=\"engine/imgs/loader.gif\"></center>";
            request = createRequest();
            //alert(elemento_id + func + par);
            if (request == null) {
                alert("Unable to create request");
                return;
            }
            //alert("teste");
            var url= "<?= base_url(); ?>usuario/painel/ajax/" + escape(func) + "/" + escape(par) + "/";
            request.open("GET", url, true);
            request.onreadystatechange = function () {
                if (request.readyState == 4) {
                    if (request.status == 200) {
                        elemento.innerHTML = request.responseText;
                    }
                }
            };
            request.send(null);
        }
    </script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
$(document).ready(function(){
    $("a").click(function(){
        $("p").click();
    });
});
</script>-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

