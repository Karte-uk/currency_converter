<?php include 'fetch_currency.php';?>
<?php
session_start();
$converted_amount = $_SESSION['converted_amount'] ?? null;
$amount = $_SESSION['amount'] ?? null;
$from_currency = $_SESSION['from_currency'] ?? null;
$to_currency = $_SESSION['to_currency'] ?? null;

unset($_SESSION['converted_amount'], $_SESSION['amount'], $_SESSION['from_currency'], $_SESSION['to_currency']);
?>

<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Curreny Converter</title>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
          <section class="section">
                    <div class="container">
                              <h1 class="title">Currency Converter</h1>
                              <form action="fetch_currency.php" method="post">
                                        <div class="field">
                                                  <label class="label">
                                                            Amount
                                                  </label>
                                                  <div class="control">
                                                            <input class="input" type="number" name="amount" required>
                                                  </div>
                                        </div>

                                        <div class="field">
                                                  <label class="label">
                                                            From
                                                  </label>
                                                  <div class="control">
                                                            <select name="original_currency">
                                                                      <div class="select">
                                                                                <option value="USD">USD</option>
                                                                                <option value="EUR">EUR</option>
                                                                                <option value="GBP">GBP</option>
                                                                      </div>
                                                            </select>
                                                  </div>
                                        </div>
                                        <div class="field">
                                                  <label class="label">
                                                            To
                                                  </label>
                                                  <div class="control">
                                                            <select name="exchange_currency">
                                                                      <div class="select">
                                                                                <option value="USD">USD</option>
                                                                                <option value="EUR">EUR</option>
                                                                                <option value="GBP">GBP</option>
                                                                      </div>
                                                            </select>
                                                  </div>
                                        </div>
                                        <div class="control">
                                                  <button class="button is-primary" type="submit">Convert</button>
                                        </div>
                              </form>
                    </div>
          </section>
          <?php if (isset($converted_amount)): ?>
                    <div class="notification is-success">
                              <?= number_format($amount, 2) ?> <?= $from_currency ?> = 
                              <?= number_format($converted_amount, 2) ?> <?= $to_currency ?>
                    </div>
          <?php elseif (isset($error)): ?>
                    <div class="notification is-danger"><?= $error ?></div>
          <?php endif; ?>
</body>
</html>