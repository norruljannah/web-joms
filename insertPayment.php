<!-- insertBooking.php -->
<!-- To insert data of insert.php into database. -->
<?php

include("dbase.php");

//Dapatkan Tarikh Dan Masa Masuk
extract( $_POST );
$date = date("d-m-Y", time());
$time = date("H:i:s", time());
$query = "INSERT INTO payment VALUES('','$amount','$paymentDate','$driverID','$CustomerID','$taxibookingID','$rentalbookingID')";

if (mysqli_query($conn, $query)) {
      
  $message="Payment Done";
    echo "<script type = 'text/javascript'>
     alert('$message'); 
     window.location.href=('bookingMenu.php');
     </script>"; 
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}




?>
