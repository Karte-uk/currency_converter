<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $amount = $_POST["amount"];
          $from_currency = $_POST["original_currency"];
          $to_currency = $_POST["exchange_currency"];

          $apiKey = "3b8723fdd46cd47e601bb11f2743f246";
          $url = "https://api.exchangeratesapi.io/latest?access_key=$apiKey";

          $response = file_get_contents($url);
          $data = json_decode($response, true);

          if (isset($data["rates"][$from_currency]) && isset($data["rates"][$to_currency])) {
                    $rate = $data["rates"][$to_currency] / $data["rates"][$from_currency];
                    $converted_amount = $amount * $rate;
                    
                    $_SESSION['converted_amount'] = $converted_amount;
                    $_SESSION['amount'] = $amount;
                    $_SESSION['from_currency'] = $from_currency;
                    $_SESSION['to_currency'] = $to_currency;
          } else {
                    $_SESSION['error'] = "Invalid currency selection!";
          }

          header("Location: currency_converter.php");
          exit();
}
