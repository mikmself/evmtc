<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #836FFF, #211951, #F0F3FF);
            background-size: 300% 300%;
            animation: gradientShift 12s infinite alternate;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white;
            text-align: center;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        /* Thank You Message Styling */
        .thank-you-container {
            background: rgba(33, 25, 81, 0.8);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 80%;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .thank-you-header {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #F0F3FF;
        }

        .thank-you-message {
            font-size: 1.2rem;
            color: #D1C4E9;
            line-height: 1.6;
        }

        .countdown-message {
            margin-top: 20px;
            font-size: 1.2rem;
            color: #FFD700;
        }
    </style>
</head>
<body>

<div class="thank-you-container">
    <div class="thank-you-header">Thank You!</div>
    <div class="thank-you-message">Thank you for voting! Your vote has been successfully recorded. We appreciate your participation and support.</div>
    <div class="countdown-message" id="logout-message">
        Anda akan otomatis logout dalam <span id="countdown">5</span> detik.
    </div>
</div>

<form id="logout-form" action="/logout" method="POST" style="display: none;">
    @csrf
</form>

<script>
    function startLogoutCountdown() {
        var countdownElement = document.getElementById('countdown');
        var countdown = 5; // Hitungan mundur dimulai dari 5 detik
        var interval = setInterval(function() {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(interval);
                document.getElementById('logout-form').submit();
            }
        }, 1000);
    }
    window.onload = startLogoutCountdown;
</script>

</body>
</html>
