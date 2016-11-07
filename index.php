<?php
	session_start();
	
    if(isset($_GET["section"])){
        $section = $_GET["section"];              
    }else{
        $section = "";}
	require_once "./pages/mysql.php";
	$_db = new DB();
    
    
    /*$serverName =  "DESKTOP-MARCEL-\SQLEXPRESS";     //DESKTOP-MARCEL-\SQLEXPRESS 
    $connectionInfo = array("Database"=>"Wachbesetzung","UID"=>"User_Wachbesetzung","PWD"=>"User4711");
    //$connectionInfo = array("Database"=>"Wachbesetzung");
        
	        $_db = sqlsrv_connect($serverName,$connectionInfo);
                if($_db){
                    Echo'Server Verbunden!';
                }else{
                    Echo'Server Verbindung fehlgeschlagen!';
                    die(print_r( sqlsrv_errors(),true));
                } ; */       
?>


<!DOCTYPE html>
<head>
<?php include ("./pages/meta.php");?>
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
            <?php include("./pages/header.php");?>
        </header>

        <nav>
            <?php include("./pages/nav.php");?>
        </nav>
        
        <div id="main">  
            <?php include("./pages/sites.php"); ?>
        </div>       
    </div>

        <footer>       
           <?php include ("./pages/footer.php")?>
        </footer>
</body>
</html>