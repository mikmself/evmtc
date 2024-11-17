<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultimate Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #836FFF, #211951, #F0F3FF);
            background-size: 300% 300%;
            animation: gradientShift 15s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .login-card {
            background: rgba(240, 243, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: transform 0.5s;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-card:hover {
            transform: rotateY(10deg) rotateX(5deg);
        }
        .glow-button {
            background: linear-gradient(90deg, #836FFF, #211951);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 15px rgba(131, 111, 255, 0.6);
            position: relative;
            overflow: hidden;
        }

        .glow-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(131, 111, 255, 0.8);
        }
        .input-field {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            transition: box-shadow 0.3s, border-color 0.3s;
        }

        .input-field:focus {
            border-color: #836FFF;
            box-shadow: 0 0 10px rgba(131, 111, 255, 0.3);
            outline: none;
        }
        @media (max-width: 768px) {
            .login-card {
                transform: none;
                width: 90%;
                padding: 30px;
            }
        }
    </style>
</head>
<body>
<div class="login-card">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-4">Welcome!</h1>
    <p class="text-gray-600 mb-6">Please log in to continue</p>
    <form action="/login" method="POST">
        <input type="email" name="email" placeholder="Email" class="input-field" required>
        <input type="password" name="password" placeholder="Password" class="input-field" required>
        <button type="submit" class="glow-button w-full">Login</button>
    </form>
    <p class="text-gray-500 mt-4">Don't have an account? <a href="#" class="text-blue-500 font-bold hover:underline">Sign up</a></p>
</div>
</body>
</html>
