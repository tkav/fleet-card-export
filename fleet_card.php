<?php

//  Export Fleet Card Transactions to CSV
//  By Tom Kavanagh https://github.com/tkav/fleet-card-export

Class FleetCard {

  function getTransactions($downloadPath="transactions.csv",$Username, $Password, $AccountNo) {

    $url = 'https://fco.fleetcard.com.au/Membership/User/LogOn';
    $csv = 'https://fco.fleetcard.com.au/Account/Transaction/Export/'.$AccountNo;

    $ckfile = tempnam ("/tmp", "CURLCOOKIE");
    $post = array(
        'UserName' => $Username,
        'Password' => $Password
        );

    $post_data = http_build_query($post);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "session.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "session.txt");
    curl_exec($ch);

    $ch = curl_init($csv);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "session.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "session.txt");
    $curlData = curl_exec($ch);

    $file = fopen($downloadPath, "w");
    fputs($file, $curlData);
    fclose($file);

    curl_close($ch);

    return $curlData;

  }

}

?>
