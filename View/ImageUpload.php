<?php
  if ( isset( $_FILES["photo-img"] ) ) {
    $error  = false;
    $image  = $_FILES["photo-img"];
    $code   = (int)$image["error"];
    $valid  = array( IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF );
    $folder = dirname( __FILE__ )."/upload/"; // path to folder to where you want to move uploaded file
    $target = $folder.$image["name"];
    $dir = "/upload/" . $image["name"];

    if ( !file_exists( $folder ) ) {
      @mkdir( $folder, 0755, true ) ;
    }

    if ( $code !== UPLOAD_ERR_OK ) {
      switch( $code ) {
        case UPLOAD_ERR_INI_SIZE:
          $error  = 'Error '.$code.': The uploaded file exceeds the <a href="http://www.php.net/manual/en/ini.core.php#ini.upload-max-filesize" target="_blank" rel="nofollow"><span class="function-string">upload_max_filesize</span></a> directive in php.ini';
        break;
        case UPLOAD_ERR_FORM_SIZE:
          $error  = 'Error '.$code.': The uploaded file exceeds the <span class="const-string">MAX_FILE_SIZE</span> directive that was specified in the HTML form';
        break;
        case UPLOAD_ERR_PARTIAL:
          $error  = 'Error '.$code.': The uploaded file was only partially uploaded';
        break;
        case UPLOAD_ERR_NO_FILE:
          $error  = 'Error '.$code.': No file was uploaded';
        break;
        case UPLOAD_ERR_NO_TMP_DIR:
          $error  = 'Error '.$code.': Missing a temporary folder';
        break;
        case UPLOAD_ERR_CANT_WRITE:
          $error  = 'Error '.$code.': Failed to write file to disk';
        break;
        case UPLOAD_ERR_EXTENSION:
          $error  = 'Error '.$code.': A PHP extension stopped the file upload';
        break;
        default:
          $error  = 'Error '.$code.': Unknown upload error'; 
        break; 
      }
    }
    else {
      $iminfo = @getimagesize( $image["tmp_name"] );
      if ( $iminfo && is_array( $iminfo ) ) {
        if ( isset( $iminfo[2] ) && in_array( $iminfo[2], $valid ) && is_readable( $image["tmp_name"] ) ) {
          if ( !move_uploaded_file( $image["tmp_name"], $target ) ) {
            $error  = "Error while moving uploaded file";
          }
        }
        else {
          $error  = "Invalid format or image is not readable";
        }
      }
      else {
        $error  = "Only image files are allowed (jpg, gif, png)";
      }
    }
    if ( empty( $error ) ) {
      echo json_encode( array( "error" => 0, "message" => "Upload success!", "dir" => $dir ) );
    }
    else {
      echo json_encode( array( "error" => 1, "message" => $error, "dir" => "" ) );
    }
    exit();
  }
?>