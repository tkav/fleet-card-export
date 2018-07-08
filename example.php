<?php

//  Export Fleet Card Transactions to CSV
//  By Tom Kavanagh https://github.com/tkav/fleet-card-export

include('fleet_card.php');

//Fleet Card Account
$Username = 'fleetcardusername';
$Password = 'fleetcardpassword';
$AccountNo = '00000';

//Get Transaction History
$csv = FleetCard::getTransactions('transactions.csv', $Username, $Password, $AccountNo);

echo $csv;

?>
