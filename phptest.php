<?php
$monthlyRent = 275;
//monthly payments
$TomPayments = array(104, 143, 432, 123, 412);
$SuePayments = array(46, 23, 52, 55, 798);
//1) how much has BobSystem paid after five months
$bobPayment =0; 
foreach ($TomPayments as $key => $value) {
	$a = $value;
	$b = $SuePayments[$key];
	$c = ($a+$b)/2;
	$d = $a+$b;
	$bobPayment+=$c;
	
	
}

echo '1. BobSystem paid after five months '.$bobPayment;
echo '<br>----------Question 2--------------';
//2) each month they under pay they have to Bob and Sue pay a penalty of 25 + 2% of the amount overdue 
//after five months how much do Tom and Sue owe in rent assuming they each are suppose to pay the same amount


//Logic :-  get the remaining amt of each month and get 2% of remaining amt and add 25 , then sum of remain amt plus fine of each month. and calcuate this for five months.
$tomoverdue =0;
foreach ($TomPayments as $key => $value) {
	
	
	
	
	$left = $monthlyRent-$value;

	if($left>0){
	$fine = ($left*2/100)+25;
	$e = $left+$fine;
	
	$tomoverdue += $e;
	}
}
echo ' <br>overdue amt by tom in five months '.$tomoverdue;
$sueoverdue =0;
foreach ($SuePayments as $key => $value) {
	
	
	
	
	$left = $monthlyRent-$value;

	if($left>0){
	$fine = ($left*2/100)+25;
	$e = $left+$fine;
	
	$sueoverdue += $e;
	}
}
echo ' <br>overdue amt by sue in five months '.$sueoverdue;


//3) a new system ChrisSystem gives free loans, and is now going to pay exactly what is needed so the landlord gets paid what is due every month...  But it will keep any overpayments.
//For these five months, assuming ChrisSystem was able to help out, how much has Chris System paid and kept?
$paidbyChristoTom =0; $keptbyChristoTom = 0; 

// Logic :-substract tom and sue payments from monthly rent and the remain amt is greater than 0 means it is paid by chris payments of each months and it is less than 0 means it is kept by chris system. and show the sum of five months of paid and kept.
foreach ($TomPayments as $key => $value) {
	
	
	
	$diff = $monthlyRent-$value;
	if($diff>0){
		$paidbyChristoTom +=$diff;
	}else{
		$keptbyChristoTom +=abs($diff);
	}
	

}
echo '<br>---------------question 3----------------';
echo '<br> Paid by chris system to Tom in five months '.$paidbyChristoTom;
echo '<br> kept by chris system to Tom in five months '.$keptbyChristoTom;
$paidbyChristoSue =0; $keptbyChristoSue = 0; 
foreach ($SuePayments as $key => $value) {
	
	
	
	$diff = $monthlyRent-$value;
	if($diff>0){
		$paidbyChristoSue +=$diff;
	}else{
		$keptbyChristoSue +=abs($diff);
	}
	

}

echo '<br> Paid by chris system to Sue in five months '.$paidbyChristoSue;
echo '<br> kept by chris system to Sue in five months '.$keptbyChristoSue;
echo '<br>-------question 5----------';
ChrisSystem($TomPayments,$monthlyRent,'Tom');
ChrisSystem($SuePayments,$monthlyRent,'Sue');
function ChrisSystem($param1,$param3,$name){
	$paidbyChris =0; $keptbyChris = 0;
	foreach ($param1 as $key => $value) {
	
	$diff = $param3-$value;
	if($diff>0){
		$paidbyChris +=$diff;
	}else{
		$keptbyChris +=abs($diff);
	}		

	}
	echo '<br> chris system paid to '.$name.' is  '.$paidbyChris;
	echo '<br> chris sytem kept from '.$name.' is '.$keptbyChris;
}
?>
