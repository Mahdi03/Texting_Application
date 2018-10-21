<?php
    $inputFrom = $_POST['inputFrom'];
    $mailHeaders = "From: noreply@" . $inputFrom . "\r\n Reply-To: " . $inputFrom;
    $inputServiceProvider = $_POST['inputMobileServiceProvider'];
    $inputMobileNumber = $_POST['inputMobileNumber'];
    $inputSubject = $_POST['inputSubject'];
    $inputMessage = htmlentities($_POST['inputMessage']);
    
    if ($inputServiceProvider === "Verizon") {
        $serviceProvider = "@vtext.com";
    } elseif ($inputServiceProvider === "ATT") {
        $serviceProvider = "@txt.att.net";
    } elseif ($inputServiceProvider === "TMobile") {
        $serviceProvider = "@tmomail.net";
    } elseif ($inputServiceProvider === "Sprint") {
        $serviceProvider = "@messaging.sprintpcs.com";
    } else {
        echo "<script>alert('I\'m sorry but a Service Provider wasn't found, please try again!')</script>";
    }
    $searchArray = array(" ", "-", "(", ")", "+1");
    $inputMobileNumber = str_ireplace($searchArray, "", $inputMobileNumber);
    $recipientEmail = $inputMobileNumber . $serviceProvider;
    $inputMessage = wordwrap($inputMessage, 70, "\r\n");
    mail($recipientEmail, $inputSubject, $inputMessage, $mailHeaders);
    echo "<script>alert('Your message has been sent, it will be received shortly...');</script>";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Send A Text Via PHP</title>
    <style>
        body {
            margin: 0;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <iframe src="texting.html"></iframe>
</body>
</html>