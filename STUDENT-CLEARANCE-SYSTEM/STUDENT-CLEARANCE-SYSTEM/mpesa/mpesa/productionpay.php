<?php
if (isset($_POST['submit'])) {
    date_default_timezone_set('Africa/Nairobi');

    // Access token
    $consumerKey = 'YOUR_PRODUCTION_CONSUMER_KEY'; // Fill with your app Consumer Key
    $consumerSecret = 'YOUR_PRODUCTION_CONSUMER_SECRET'; // Fill with your app Secret

    // Define the variables
    // Provide the following details, this part is found on your production credentials on the developer account
    $BusinessShortCode = 'YOUR_PAYBILL_OR_TILL_NUMBER';
    $Passkey = 'YOUR_PRODUCTION_PASSKEY';

    /*
    This is your info, for
    $PartyA should be the ACTUAL client's phone number or your phone number, format 2547********
    $AccountRefference, it may be an invoice number, account number, etc. on production systems, but for test just put anything
    $TransactionDesc can be anything, probably a better description of the transaction
    $Amount this is the total invoiced amount. Any amount here will be 
    actually deducted from a client's side/your test phone number once the PIN has been entered to authorize the transaction. 
    For developer/test accounts, this money will be reversed automatically by midnight.
    */

    $PartyA = $_POST['phone']; // This is your phone number
    $AccountReference = 'Online Clearance System'; // Sender's name
    $TransactionDesc = 'Test Payment';
    $Amount = $_POST['amount'];

    // Get the timestamp, format YYYYmmddhms -> 20181004151020
    $Timestamp = date('YmdHis');

    // Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
    $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

    // Header for access token
    $headers = ['Content-Type:application/json; charset=utf8'];

    // M-PESA endpoint URLs
    $access_token_url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $initiate_url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

    // Callback URL
    $CallBackURL = 'https://your-domain.com/callback_url.php';

    $curl = curl_init($access_token_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $result = json_decode($result);
    $access_token = $result->access_token;
    curl_close($curl);

    // Header for stk push
    $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

    // Initiating the transaction
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $initiate_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); // Setting custom header

    $curl_post_data = array(
        // Fill in the request parameters with valid values
        'BusinessShortCode' => $BusinessShortCode,
        'Password' => $Password,
        'Timestamp' => $Timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $Amount,
        'PartyA' => $PartyA,
        'PartyB' => $BusinessShortCode,
        'PhoneNumber' => $PartyA,
        'CallBackURL' => $CallBackURL,
        'AccountReference' => $AccountReference,
        'TransactionDesc' => $TransactionDesc
    );

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    print_r($curl_response);

    // Process the response and save data to the local database upon successful payment
    $response = json_decode($curl_response, true);
    if (isset($response['ResponseCode']) && $response['ResponseCode'] === '0') {
        // Payment was successful, save the data to the local database

        // Connect to your MySQL database
        $host = 'localhost';
        $db = 'your_database_name';
        $user = 'your_username';
        $password = 'your_password';

        $conn = new mysqli($host, $user, $password, $db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement to insert data into the database
        $sql = "INSERT INTO payments (phone, amount, timestamp, name) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siss", $PartyA, $Amount, $Timestamp, $AccountReference);

        // Execute the prepared statement
        $stmt->execute();

        // Check if the data was inserted successfully
        if ($stmt->affected_rows > 0) {
            echo "Payment data saved successfully.";
        } else {
            echo "Failed to save payment data.";
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Payment was not successful.";
    }
}
?>
