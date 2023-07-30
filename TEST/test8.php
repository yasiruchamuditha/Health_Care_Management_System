<!DOCTYPE html>
<html>
<head>
  <title>My Account</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Welcome to Your Account</h1>
    <div id="account-info">
      <?php
        // Simulate fetching account details from a database
        // Replace this with your actual database connection and query

        // Sample account details
        $account = array(
          'accountNumber' => '123456789',
          'accountHolder' => 'John Doe',
          'balance' => '5000.00',
          'accountType' => 'Savings',
        );
      ?>

      <p><strong>Account Number:</strong> <?php echo $account['accountNumber']; ?></p>
      <p><strong>Account Holder:</strong> <?php echo $account['accountHolder']; ?></p>
      <p><strong>Balance:</strong> <?php echo $account['balance']; ?></p>
      <p><strong>Account Type:</strong> <?php echo $account['accountType']; ?></p>
    </div>
  </div>

  <script>
    window.addEventListener("DOMContentLoaded", () => {
      // You can remove the fetchAccountDetails() function since the account details are now fetched in PHP.
      displayAccountDetails(<?php echo json_encode($account); ?>);
    });

    // Remove the fetchAccountDetails() and displayAccountDetails() functions from the JavaScript code since they are no longer needed.

  </script>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
    }

    h1 {
      text-align: center;
    }

    #account-info {
      margin-top: 20px;
    }
  </style>
</body>
</html>
