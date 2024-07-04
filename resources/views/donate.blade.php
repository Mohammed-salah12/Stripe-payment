<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
</head>
<body>
    <h1>Donate to Support Us</h1>

    @if (session('error_message'))
        <div>{{ session('error_message') }}</div>
    @endif
    
    @if (request()->query('success'))
        <div>Thank you for your donation!</div>
    @endif

    @if (request()->query('canceled'))
        <div>Payment was canceled. Please try again.</div>
    @endif

    <form action="{{ route('checkout.session') }}" method="POST">
        @csrf
        <label for="amount">Enter Amount to Donate ($):</label>
        <input type="number" id="amount" name="amount" min="1" step="any" required>
        <button type="submit">Donate</button>
    </form>
</body>
</html>
