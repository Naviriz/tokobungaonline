<?php
//simpan transaksi ke database
session_start();
ob_start();
include"system/system.php";
include"system/currency.php";
$fullname = htmlspecialchars($_POST['fullname']);
$date = date("Y-m-d");
$address = htmlspecialchars($_POST['address']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

if(isset($_SESSION['cart'])){
  $transaksi = mysql_query("
      INSERT INTO transaksi
      VALUES ('','$date','$fullname','$address','$phone','$email','$message','Y')
  ");
  $no=1;
  $sql_s = "SELECT * FROM product WHERE id_product IN (";
  foreach($_SESSION['cart'] as $id => $value){
    $sql_s .=$id. ",";
  }
  $sql_s = substr($sql_s,0,-1).") ORDER BY id_product ASC";
  $query_s = mysql_query($sql_s);
  $total=0;
  if(!empty($query_s)){
    while($row_s = mysql_fetch_array($query_s)){
      $id_product = $row_s['id_product'];
      $price = $row_s['price'];
      $qty = $_SESSION['cart'][$row_s['id_product']]['quantity'];
      $detiltrans = mysql_query("INSERT INTO detil_transaksi VALUES(last_insert_id(),'$id_product','$qty','$price')");
    }
    echo "<script type='text/javascript'>alert('Your order has been saved!')</script>";
  	echo "<script>document.location.href='home';</script>";
  	unset($_SESSION['cart']);
  }


  //MESSAGE KE ADMIN WEBSITE
  $subjek="New Order from $_POST[fullname]";
  // Kirim email dalam format HTML
  $dari = "From: $_POST[email] \n";
  $dari .= "Content-type: text/html \r\n";
  $message = nl2br("$_POST[message]");
  $ke= "aba_kayon@yahoo.com";
  $pesan = "
    <strong>You got a new order from tokobungapapansurabaya.com, here is the detail :</strong> <br /><br />
    <strong>Mr/Mrs : </strong> $_POST[fullname]<br />
    <strong>Email : </strong>$_POST[email]<br />
    <strong>Phone : </strong>$_POST[phone]<br />
    <strong>Address : </strong> $_POST[address]<br />
    <strong>Additional message :</strong><br />$message";
  // SEND MAIL TO INBOX
  mail($ke,$subjek,$pesan,$dari);


}else{
  header("Location:home");
}

?>
