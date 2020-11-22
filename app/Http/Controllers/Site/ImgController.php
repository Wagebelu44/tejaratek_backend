<?php
namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ImgController extends BaseController
{

  public function __construct()
    { 
      parent::__construct();

    }

  public function index($size='',$img='',$zc=1,$CHECK=0)
  {
    $url = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
   
    if (strpos($url, '/uploads') !== false) { 
      $img = strstr($url, '/uploads/');
    }else{
      $img='/uploads/'.$img;
    }
	 
	 

    $file_extension = pathinfo($img, PATHINFO_EXTENSION); // strtolower(substr(strrchr($filename,"."),1));
    $file_extension = strtolower($file_extension);

    switch( $file_extension ) {
      case "gif" : $ctype="image/gif"; break;
      case "png" : $ctype="image/png"; break;
      case "jpeg":
      case "jpg" : $ctype="image/jpeg"; break;
      default:
    }

    if(!empty($ctype)){
    $coordinates = explode('x', strtolower($size));
    

    header('Pragma: public');
    header('Cache-Control: max-age=86400');
    header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));
       
    header('Content-type: ' . $ctype);
    // echo \URL::to('/').'/'.'timthumb.php?src='.$img.'&h='.$coordinates[1].'&w='.$coordinates[0].'&zc='.$zc;
    // exit;
    echo file_get_contents(\URL::to('/').'/'.'timthumb.php?src='.\URL::to('/').$img.'&h='.$coordinates[1].'&w='.$coordinates[0].'&zc='.$zc);
      exit;
    }else{
      echo 'Not Found EXT';
    }
  }






}