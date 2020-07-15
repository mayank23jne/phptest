<?php
$monthlyRent = 550;
//monthly payments
$TomPayments = array(104, 143, 432, 123, 412);
$SuePayments = array(46, 23, 52, 55, 798);
//1) how much has BobSystem paid after five months
$bobPayment =0; $boboverdue =0;
foreach ($TomPayments as $key => $value) {
	$a = $value;
	$b = $SuePayments[$key];
	$c = ($a+$b)/2;
	$bobPayment+=$c;
	$left = $monthlyRent-$c;
	$fine = ($left*2/100)+25;
	$d = $left+$fine;
	$boboverdue += $d;
}

echo '1. BobSystem paid after five months '.$bobPayment;
echo ' <br>2. after five months overdue amount '.$boboverdue;



//3) a new system ChrisSystem gives free loans, and is now going to pay exactly what is needed so the landlord gets paid what is due every month...  But it will keep any overpayments.
//For these five months, assuming ChrisSystem was able to help out, how much has Chris System paid and kept?
$paidbyChris =0; $keptbyChris = 0; 
foreach ($TomPayments as $key => $value) {
	
	$a = $value;
	$b = $SuePayments[$key];
	$sum = $a+$b;
	
	$diff = $monthlyRent-$sum;
	if($diff>0){
		$paidbyChris +=$diff;
	}else{
		$keptbyChris +=abs($diff);
	}
	

}

echo '<br>3. Paid by chris in five months '.$paidbyChris;
echo '<br>3. kept by chris in five months '.$keptbyChris;

ChrisSystem($TomPayments,$SuePayments,$monthlyRent);

function ChrisSystem($param1,$param2,$param3){
	$paidbyChris =0; $keptbyChris = 0;
	foreach ($param1 as $key => $value) {
	$a = $value;
	$b = $param2[$key];
	$sum = $a+$b;
	$diff = $param3-$sum;
	if($diff>0){
		$paidbyChris +=$diff;
	}else{
		$keptbyChris +=abs($diff);
	}		

	}
	echo '<br>5 by function Paid by chris in five months '.$paidbyChris;
	echo '<br>5. by function kept by chris in five months '.$keptbyChris;
}
?>
