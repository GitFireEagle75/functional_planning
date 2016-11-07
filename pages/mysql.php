<?php
class DB {
	private static $_db                                      ;        
        private static $database		= "Wachbesetzung";                
        private static $pwd 		        = "User4711";
        private static $uid 		        = "User_Wachbesetzung";
        private static $serverName              =  "DESKTOP-MARCEL-\SQLEXPRESS";
        
        //private static $connectionInfo = array("Database"=>"Wachbesetzung","UID"=>"User_Wachbesetzung","PWD"=>"User4711");
        //private static $connectionInfo = array("UID"=>$uid,"PWD"=>$pwd,"Database"=>$database);
        //private static $connectionInfo = array("Database"=>"Wachbesetzung");
        
	function __construct() {
            /*$database		= "Wachbesetzung";                
            $pwd 		        = "User4711";
            $uid 		        = "User_Wachbesetzung";
            $serverName                 =  "DESKTOP-MARCEL-\SQLEXPRESS";
              try {  
                      //$_conn = new PDO( "sqlsrv:server= DESKTOP-MARCEL-\SQLEXPRESS , Database = Wachbesetzung , UID = User_Wachbesetzung , PWD = User4711" );
                      $_conn = new PDO( "sqlsrv:server= $serverName , UID = $uid , PWD = $pwd, Database = $database  " );
                      $_conn ->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );   
                   }  

                   catch( PDOException $e ) {  
                      die( "Error connecting to SQL Server" );   
                   }  

                   echo "Connected to SQL Server\n"; 
                }*/
            
            $database		= "Wachbesetzung";                
            $pwd 		= "User4711";
            $uid 		= "User_Wachbesetzung";
            $serverName         =  "DESKTOP-MARCEL-\SQLEXPRESS";

            //$connectionInfo = array("Database"=>$database,"UID"=>"User_Wachbesetzung","PWD"=>"User4711");
            $connectionInfo = array("UID"=>$uid,"PWD"=>$pwd,"Database"=>$database);

            $_db = sqlsrv_connect($serverName,$connectionInfo); //self::$serverName,self::$connectionInfo,self::$_db_username,self::$_db_password
            if($_db){
                Echo'Server Verbunden!';
            }else{
                Echo'Server Verbindung fehlgeschlagen!';
                die(print_r( sqlsrv_errors(),true));
            } ;
              	
	}
        
        function Einteilung_laden($PlaDat , $DienstZeit , $Name ) {
             $PlaFun = substr($Name, 3); //$PlaFun 1330(711)
             $PlaDst = substr($Name, -3); //$PlaFun (1330)711
             
            if ($DienstZeit == 'Tagdienst'){
                if ($PlaDat === $Planungs_Datum){
                    if($Dienststelle_Tag === $PlaDst){
                        if ($PlaFun === $Funktion_Tag){
                           return $Planungs_Name;                     
                        }
                    }      
                }else{
                    Echo"unbesetzt";
                }
            }elseif($DienstZeit == 'Nachtdienst'){
                if ($PlaDat === $Planungs_Datum){
                    if($Dienststelle_Nacht === $PlaDst){
                        if ($PlaFun === $Funktion_Nacht){
                           return $Planungs_Name;                     
                        }
                    }      
                }else{
                    Echo"unbesetzt";
                }                 
            }
        }
	   
// schliesst alle Anweisungen neue Function davor einfuegen 
}
?>

