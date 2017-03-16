<?php

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// UPLOAD PRODUCT
function UploadProduct($fupload_name){
  // UPLOAD DIRECTORY
  $vdir_upload = "../../../product/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  // SAVE TRUE SIZE
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
 
  if ($tipe_file=="image/jpeg" ){ $im_src = imagecreatefromjpeg($vfile_upload); }
  elseif ($tipe_file=="image/png" ){ $im_src = imagecreatefrompng($vfile_upload); }
  elseif ($tipe_file=="image/gif" ){ $im_src = imagecreatefromgif($vfile_upload); }
  elseif ($tipe_file=="image/wbmp" ){ $im_src = imagecreatefromwbmp($vfile_upload); }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //////////////////////
  // BUAT VERSI BIG_ // UNTUK ZOOM
  ////////////////////
  $dst_width = 750;
  $dst_height = ($dst_width/$src_width)*$src_height;
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  // SAVE BIG_
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){ imagejpeg($im,$vdir_upload . "big_" . $fupload_name); }
  elseif ($_FILES["fupload"]["type"]=="image/png" ){ imagepng($im,$vdir_upload . "big_" . $fupload_name); }
  elseif ($_FILES["fupload"]["type"]=="image/gif" ){ imagegif($im,$vdir_upload . "big_" . $fupload_name); }
  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){ imagewbmp($im,$vdir_upload . "big_" . $fupload_name); }
  

  //////////////////////
  // BUAT VERSI MED_ // UNTUK DI DETAIL PRODUCT
  ////////////////////
  $dst_width2 = 300;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
  // SAVE BIG_
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){ imagejpeg($im2,$vdir_upload . "med_" . $fupload_name); }
  elseif ($_FILES["fupload"]["type"]=="image/png" ){ imagepng($im2,$vdir_upload . "med_" . $fupload_name); }
  elseif ($_FILES["fupload"]["type"]=="image/gif" ){ imagegif($im2,$vdir_upload . "med_" . $fupload_name); }
  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){ imagewbmp($im2,$vdir_upload . "med_" . $fupload_name); }
  
  
  //////////////////////
  // BUAT VERSI SLD_ // UNTUK DI SLIDER COLLECTION
  ////////////////////
  $dst_width3 = 220;
  $dst_height3 = 340;
  $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
  imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);
  // SAVE BIG_
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){ imagejpeg($im3,$vdir_upload . "sld_" . $fupload_name); }
  elseif ($_FILES["fupload"]["type"]=="image/png" ){ imagepng($im3,$vdir_upload . "sld_" . $fupload_name); }
  elseif ($_FILES["fupload"]["type"]=="image/gif" ){ imagegif($im3,$vdir_upload . "sld_" . $fupload_name); }
  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){ imagewbmp($im3,$vdir_upload . "sld_" . $fupload_name); }


  //////////////////////
  // BUAT VERSI THU_ // UNTUK DI LIST PRODUCT
  ////////////////////
  $dst_width4 = 175;
  $dst_height4 = ($dst_width4/$src_width)*$src_height;
  $im4 = imagecreatetruecolor($dst_width4,$dst_height4);
  imagecopyresampled($im4, $im_src, 0, 0, 0, 0, $dst_width4, $dst_height4, $src_width, $src_height);
  // SAVE BIG_
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){ imagejpeg($im4,$vdir_upload . "thu_" . $fupload_name); }
  elseif ($_FILES["fupload"]["type"]=="image/png" ){ imagepng($im4,$vdir_upload . "thu_" . $fupload_name); }
  elseif ($_FILES["fupload"]["type"]=="image/gif" ){ imagegif($im4,$vdir_upload . "thu_" . $fupload_name); }
  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){ imagewbmp($im4,$vdir_upload . "thu_" . $fupload_name); }
  
  //////////////////////
  // BUAT VERSI THU_ // UNTUK DI LIST PRODUCT
  ////////////////////
  $dst_width5 = 60;
  $dst_height5 = ($dst_width5/$src_width)*$src_height;
  $im5 = imagecreatetruecolor($dst_width5,$dst_height5);
  imagecopyresampled($im5, $im_src, 0, 0, 0, 0, $dst_width5, $dst_height5, $src_width, $src_height);
  // SAVE BIG_
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){ imagejpeg($im5,$vdir_upload . "ths_" . $fupload_name); }
  elseif ($_FILES["fupload"]["type"]=="image/png" ){ imagepng($im5,$vdir_upload . "ths_" . $fupload_name); }
  elseif ($_FILES["fupload"]["type"]=="image/gif" ){ imagegif($im5,$vdir_upload . "ths_" . $fupload_name); }
  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){ imagewbmp($im5,$vdir_upload . "ths_" . $fupload_name); }
  

  // HAPUS GAMBAR DARI MEMORY KOMPUTER
  imagedestroy($im_src); imagedestroy($im); imagedestroy($im2); imagedestroy($im3); imagedestroy($im4); imagedestroy($im5);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// UPLOADING ARTICLE IMAGE
function UploadArticle($fupload_name){
  // UPLOAD DIRECTORY
  $vdir_upload = "../../../assets/images/article/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  // SAVE TRUE SIZE
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
 
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  // CHANGE THE SIZE
  $dst_width = 311;
  $dst_height = 179;
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  // SAVE IMAGE
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "thumb_" . $fupload_name);
      }


  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function UploadPost($fupload_name){
  // UPLOAD DIRECTORY
  $vdir_upload = "../../../assets/images/post/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  // SAVE TRUE SIZE
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
 
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  // CHANGE THE SIZE
  $dst_width = 311;
  $dst_height = 179;
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  // SAVE IMAGE
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "thumb_" . $fupload_name);
      }


  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}


// UPLOADING ARTICLE IMAGE
function UploadPress($fupload_name){
  // UPLOAD DIRECTORY
  $vdir_upload = "../../../images/press/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  // SAVE TRUE SIZE
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
 
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  // CHANGE THE SIZE
  $dst_height = 205;
  $dst_width = ($dst_height/$src_height)*$src_width;
  
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  // SAVE IMAGE
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "thumb_" . $fupload_name);
      }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}


// UPLOADING ARTICLE IMAGE
function UploadSlide($fupload_name){
  // UPLOAD DIRECTORY
  $vdir_upload = "../../../slider/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  // SAVE TRUE SIZE
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
 
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  // CHANGE THE SIZE
  $dst_width = 960;
  $dst_height = ($dst_width/$src_width)*$src_height;
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  // SAVE IMAGE
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "big_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "big_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "big_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "big_" . $fupload_name);
      }

  // CHANGE THE SIZE
  $dst_width2 = 750;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  // SAVE IMAGE
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im2,$vdir_upload . "medium_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im2,$vdir_upload . "medium_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im2,$vdir_upload . "medium_" . $fupload_name);
      }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}


// UPLOADING GALLERY
function UploadCollection($fupload_name){
  // UPLOAD DIRECTORY
  $vdir_upload = "../../../images/collection/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  // SAVE TRUE SIZE
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
 
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  // CHANGE THE SIZE
  $dst_width = 220;
  $dst_height = 340;
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  // SAVE IMAGE
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload . "thumb_" . $fupload_name);
      }
	

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

// UPLOADING GALLERY
function UploadCounsellor($fupload_name){
  // UPLOAD DIRECTORY
  $vdir_upload = "../../../images/counsellor/";
  $vdir_upload2 = "../../../images/counsellor/thumbnails/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  // SAVE TRUE SIZE
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
 
  if ($tipe_file=="image/jpeg" ){
      $im_src = imagecreatefromjpeg($vfile_upload);
      }elseif ($tipe_file=="image/png" ){
      $im_src = imagecreatefrompng($vfile_upload);
      }elseif ($tipe_file=="image/gif" ){
      $im_src = imagecreatefromgif($vfile_upload);
      }elseif ($tipe_file=="image/wbmp" ){
      $im_src = imagecreatefromwbmp($vfile_upload);
    }
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  // CHANGE THE SIZE
  $dst_width = 115;
  $dst_height = 152;
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  // SAVE IMAGE
  if ($_FILES["fupload"]["type"]=="image/jpeg" ){
      imagejpeg($im,$vdir_upload2 . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/png" ){
      imagepng($im,$vdir_upload2 . $fupload_name);
      }
	  elseif ($_FILES["fupload"]["type"]=="image/gif" ){
      imagegif($im,$vdir_upload2 . $fupload_name);
      }
	  elseif($_FILES["fupload"]["type"]=="image/wbmp" ){
      imagewbmp($im,$vdir_upload2 . $fupload_name);
      }
	

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}


function UploadFile($fupload_name){
  //direktori file
  $vdir_upload = "../../../upload/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $tipe_file   = $_FILES['fupload']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

?>
