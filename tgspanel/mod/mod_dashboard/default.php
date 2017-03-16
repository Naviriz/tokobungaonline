 <div class="widget widget-nopad">
	<div class="widget-header"> <i class="icon-list-alt"></i>
	  <h3>Beranda</h3>
	</div>
	<!-- /widget-header -->
	<div class="widget-content">
	  <div class="widget big-stats-container">
		<div class="widget-content">
		  <h1 style="padding:20px 20px 0 20px;">
          Welcome to Admin Panel!
      </h1>
      <?php
        $table = "transaksi";
        $fild = "COUNT(*) AS jumlah";
        $where = "status='Y'";
        foreach($dbase->select($table, $fild, $where) as $data){}
        if($data['jumlah']!=0){
      ?>
        <h2 style="padding:20px 20px 0 20px;">Anda memiliki <?php echo $data['jumlah'] ?> pesanan baru! Silahkan <a href="?mod=newtransaksi">Klik disini</a> untuk melihat detail</h2>
      <?php
        }
      ?>
		</div>
		<!-- /widget-content -->

	  </div>
	</div>
  </div>
  <!-- /widget -->
