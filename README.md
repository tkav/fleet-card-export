# fleet-card-export
Export Fleet Card https://fco.fleetcard.com.au/ Transactions to CSV

## Usage

As per example.php:

<b>Include class file</b>
```php
include('fleet_card.php');
```
## Export Transactions
<b>Enter your Fleet Card Credentials and Account Number</b>

```php
//Fleet Card Account
$Username = 'fleetcardusername';
$Password = 'fleetcardpassword';
$AccountNo = '00000';

//Get Transaction History
$csv = FleetCard::getTransactions('transactions.csv', $Username, $Password, $AccountNo);
```

<i>Ensure transactions.csv and session.txt is writable in the directory</i>
