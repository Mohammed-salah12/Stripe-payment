<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <h1>Donate via Stripe</h1>

    <form action="{{ route('donate.process') }}" method="POST">
        @csrf
        <label for="amount">Enter Amount to Donate ($):</label>
        <input type="number" id="amount" name="amount" min="1" step="any" required>
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_KEY') }}"
            data-amount=""
            data-name="Donation"
            data-description="Donate to support us"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto">
        </script>
    </form>
</body>
</html>
