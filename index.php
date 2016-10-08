<?php
	session_start();
	
    if(isset($_GET["section"])){
        $section = $_GET["section"];
    }else{
        $section = "";}
	
	require_once 'pages/mysql.php';
	$db = new DB();
?>


<html>
<head>
<?php include ("pages/meta.php");?>
<script type="text/javascript"></script>

<!--[if gte IE 9]>
        <style type="text/css">
        .gradient {
        filter: none;
        }
        </style>
            <![endif]-->
</head>

<body>

    <div id="wrapper">
	<header>
            <?php include("pages/header.php");?>
        </header>

        <nav>
            <?php include("pages/nav.php")?>
        </nav>
        
            <div id="main">  
                <?php include("pages/sites.php"); ?> 
            </div>       
    </div>

        <footer>       
           <?php include ("pages/footer.php")?>
        </footer>
</body>
</html>