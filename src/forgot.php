<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | ParkEase</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        .forgot-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <!-- Forgot Password Form -->
    <div class="forgot-container rounded-xl shadow-2xl p-8 max-w-md w-full mx-4 animate__animated animate__fadeIn">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <div class="bg-white p-3 rounded-full shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                </svg>
            </div>
        </div>

        <!-- Title -->
        <h1 class="text-3xl font-bold text-center text-white mb-2">Forgot Password?</h1>
        <p class="text-center text-blue-100 mb-8">Enter your email to reset your password</p>

        <!-- Reset Form -->
        <form action="reset_password.php" method="POST" class="space-y-6">
            <!-- Email -->
            <div>
                <label for="email" class="block text-white mb-2">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    placeholder="your@email.com" 
                    class="w-full px-4 py-3 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 transition duration-300"
                >
            </div>

            <!-- Reset Button -->
            <button 
                type="submit" 
                class="w-full bg-white text-blue-600 py-3 px-4 rounded-lg font-bold hover:bg-blue-50 transition duration-300 shadow-lg"
            >
                Reset Password
            </button>
        </form>

        <!-- Back to Login -->
        <p class="text-center text-blue-100 mt-8">
            Remember your password? 
            <a href="login.php" class="text-white font-semibold hover:underline transition duration-300">Sign in</a>
        </p>
    </div>
</body>
</html>