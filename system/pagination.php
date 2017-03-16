<?php

//PAGING FOR ALL ARTICLE 
class PagingArticle{
	
	// CHECK PAGE AND POSITION
	function cariPosisi($batas){
		if(empty($_GET['pg'])){	$posisi=0; $_GET['pg']=1; }
		else{ $posisi = ($_GET['pg']-1) * $batas; }
		return $posisi;
	}

	// COUNT PAGE NUMBER TOTAL
	function jumlahHalaman($jmldata, $batas){ $jmlhalaman = ceil($jmldata/$batas); return $jmlhalaman; }

	// PAGE 1,2,3 LINK
	function navHalaman($halaman_aktif, $jmlhalaman){
		$base = "http://localhost/project/hagiosministry.org";
		$link_halaman = "";

		// LINK TO PREVIOUS PAGE
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<li><a href='$base/article/$prev'>Sebelumnya</a></li>";
		}
		else{ $link_halaman .= "<li><a>Sebelumnya</a></li>"; }

	// PAGE NUMBER
	$angka = ($halaman_aktif > 200 ? " ... " : " "); 
	for ($i=$halaman_aktif-999; $i<$halaman_aktif; $i++){
	  if ($i < 1)
		continue;
		  $angka .= "<li><a href='$base/article/$i'>$i</a></li>"; }
		  $angka .= "<li><a class='active'>$halaman_aktif</a></li>";
		  
		for($i=$halaman_aktif+1; $i<($halaman_aktif+9); $i++){
			if($i > $jmlhalaman)
		 		break;
		  			$angka .= "<li><a href='$base/article/$i'>$i</a></li>";}
		  $angka .= ($halaman_aktif+999<$jmlhalaman ? "<li><a href='$base/article/$jmlhalaman'>$jmlhalaman</a></li>" : " ");
	
	$link_halaman .= "$angka";

	// NEXT LINK
	if($halaman_aktif < $jmlhalaman){ $next = $halaman_aktif+1;
		$link_halaman .= " <li class='next'><a href='$base/article/$next'>Selanjutnya</a></li>";
	}
	else{
		$link_halaman .= "<li class='next'><a>Selanjutnya</a></li>";
	}
	return $link_halaman;
	}
}



//PAGING FOR CATEGORY
class PagingCategory{
	
	// CHECK PAGE AND POSITION
	function cariPosisi($batas){
		if(empty($_GET['pg'])){	$posisi=0; $_GET['pg']=1; }
		else{ $posisi = ($_GET['pg']-1) * $batas; }
		return $posisi;
	}

	// COUNT PAGE NUMBER TOTAL
	function jumlahHalaman($jmldata, $batas){ $jmlhalaman = ceil($jmldata/$batas); return $jmlhalaman; }

	// PAGE 1,2,3 LINK
	function navHalaman($halaman_aktif, $jmlhalaman){
		$base = "http://localhost/project/hagiosministry.org";
		$link_halaman = "";

		// LINK TO PREVIOUS PAGE
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<li><a href='$base/category/$_GET[cat]/$prev'>Sebelumnya</a></li>";
		}
		else{ $link_halaman .= "<li><a>Sebelumnya</a></li>"; }

	// PAGE NUMBER
	$angka = ($halaman_aktif > 200 ? " ... " : " "); 
	for ($i=$halaman_aktif-999; $i<$halaman_aktif; $i++){
	  if ($i < 1)
		continue;
		  $angka .= "<li><a href='$base/category/$_GET[cat]/$i'>$i</a></li>"; }
		  $angka .= "<li><a class='active'>$halaman_aktif</a></li>";
		  
		for($i=$halaman_aktif+1; $i<($halaman_aktif+9); $i++){
			if($i > $jmlhalaman)
		 		break;
		  			$angka .= "<li><a href='$base/category/$_GET[cat]/$i'>$i</a></li>";}
		  $angka .= ($halaman_aktif+999<$jmlhalaman ? "<li><a href='$base/article/$jmlhalaman'>$jmlhalaman</a></li>" : " ");
	
	$link_halaman .= "$angka";

	// NEXT LINK
	if($halaman_aktif < $jmlhalaman){ $next = $halaman_aktif+1;
		$link_halaman .= " <li class='next'><a href='$base/category/$_GET[cat]/$next'>Selanjutnya</a></li>";
	}
	else{
		$link_halaman .= "<li class='next'><a>Selanjutnya</a></li>";
	}
	return $link_halaman;
	}
}

?>