<?php

require_once 'config.php';

?><!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="charge.php" method="POST">
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="<?php echo STRIPE_API_PK; ?>"
            data-amount="1000"
            data-description="My Example Charge"
            data-locale="auto">
        </script>
    </form>
</body>
</html>