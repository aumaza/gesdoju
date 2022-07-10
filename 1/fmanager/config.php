<?php   session_start();
        include "../../connection/connection.php";
        
        $varsession_user = $_SESSION['user'];
        $varsession_pass = $_SESSION['pass'];
        
        
	
	
	$sql = "select user, password from usuarios where user = '$varsession_user'";
	mysqli_select_db($conn,$dbase);
	$query = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($query)){
	      $user = $row['user'];
	      $hash = $row['password'];
	}
	
  

    
	if($varsession_user == null || $varsession_user == ''){
  echo '<!DOCTYPE html>
        <html lang="es">
        <head>
        <title>GESDO [ Gestión Documental ]</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="../../icons/apps/accessories-dictionary.png" />';
        skeleton();
        echo '</head><body>';
        echo '<br><div class="container">
                <div class="alert alert-danger" role="alert">';
        echo '<p align="center"><img src="../../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> Su sesión a caducado. Por favor, inicie sesión nuevamente</p>';
        echo '<a href="../../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><img src="../../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>';	
        echo "</div></div>";
        die();
        echo '</body></html>';
	}

function ft_settings_external_load($user,$pass) {
  $ft = array();
  $ft['settings'] = array();
  $ft['groups'] = array();
  $ft['users'] = array();
  $ft['plugins'] = array();

  # Settings - Change as appropriate. See online documentation for explanations. #
  define("USERNAME", ""); // Your default username.
  define("PASSWORD", ""); // Your default password.

  $ft["settings"]["DIR"]               = "."; // Your default directory. Do NOT include a trailing slash!
  $ft["settings"]["LANG"]              = "es"; // Language. Do not change unless you have downloaded language file.
  $ft["settings"]["MAXSIZE"]           = 2000000; // Maximum file upload size - in bytes.
  $ft["settings"]["PERMISSION"]        = 0644; // Permission for uploaded files.
  $ft["settings"]["DIRPERMISSION"]     = 0777; // Permission for newly created folders.
  $ft["settings"]["LOGIN"]             = TRUE; // Set to FALSE if you want to disable password protection.
  $ft["settings"]["UPLOAD"]            = TRUE; // Set to FALSE if you want to disable file uploads.
  $ft["settings"]["CREATE"]            = TRUE; // Set to FALSE if you want to disable file/folder/url creation.
  $ft["settings"]["FILEACTIONS"]       = TRUE; // Set to FALSE if you want to disable file actions (rename, move, delete, edit, duplicate).
  $ft["settings"]["HIDEFILEPATHS"]     = FALSE; // Set to TRUE to pass downloads through File Thingie.
  $ft["settings"]["DELETEFOLDERS"]     = FALSE; // Set to TRUE to allow deletion of non-empty folders.
  $ft["settings"]["SHOWDATES"]         = FALSE; // Set to a date format to display last modified date (e.g. 'Y-m-d'). See http://dk2.php.net/manual/en/function.date.php
  $ft["settings"]["FILEBLACKLIST"]     = "ft2.php ft.css config.php index.php config.sample.php LICENSE README.markdown .DS_store .gitignore"; // Specific files that will not be shown.
  $ft["settings"]["FOLDERBLACKLIST"]   = "plugins js css locales data"; // Specifies folders that will not be shown. No starting or trailing slashes!
  $ft["settings"]["FILETYPEBLACKLIST"] = "php phtml php3 php4 php5"; // File types that are not allowed for upload.
  $ft["settings"]["FILETYPEWHITELIST"] = "txt doc odt pdf xls docx xlsx sql csv zip rar"; // Add file types here to *only* allow those types to be uploaded.
  $ft["settings"]["ADVANCEDACTIONS"]   = FALSE; // Set to TRUE to enable advanced actions like chmod and symlinks.
  $ft["settings"]["LIMIT"]             = 0; // Restrict total dir file usage to this amount of bytes. Set to "0" for no limit.
  $ft["settings"]["REQUEST_URI"]       = FALSE; // Installation path. You only need to set this if $_SERVER['REQUEST_URI'] is not being set by your server.
  $ft["settings"]["HTTPS"] = FALSE; // Change to TRUE to enable HTTPS support.
  $ft["settings"]["REMEMBERME"]        = FALSE; // Set to TRUE to enable the "remember me" feature at login.
  $ft["settings"]["PLUGINDIR"]         = 'plugins'; // Set to the path to your plugin folder. Do NOT include a trailing slash!

  # Plugin settings #
  $ft["plugins"]["search"] = TRUE;
  $ft["plugins"]["edit"] = array(
   "settings" => array(
     "editlist" => "txt html htm css",
     "converttabs" => FALSE
   )
  );
  
  $ft["plugins"]["tinymce"] = array(
    "settings" => array(
      "path" => "tinymce/jscripts/tiny_mce/tiny_mce.js",
      "list" => "html htm"
    )
  );
  

  # Additional users - See guide at http://www.solitude.dk/filethingie/documentation/users #

  if($user == 'root'){
  
  $ft['users'][$user] = array(
    'password' => $password,
    'group' => 'administradores'
  );
  
  }else{
    
    $ft['users'][$user] = array(
    'password' => $varsession_pass,
    'group' => 'usuarios'
  );
  
  }
  

  # User groups for additional users -  - See guide at http://www.solitude.dk/filethingie/documentation/users #

  
  $ft['groups']['administradores'] = array(
    'DIR' => '../../',
  );
  
  $ft['groups']['usuarios'] = array(
    'DIR' => '../../uploads',
  );
  

  return $ft;
}
