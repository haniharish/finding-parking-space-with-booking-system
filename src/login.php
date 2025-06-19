<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($id && password_verify($password, $hashed_password)) {
        $_SESSION["user_id"] = $id;
        header("Location: index.php");
    } else {
        $error = "Invalid login credentials.";
    }
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ParkFinder</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #10b981;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        .gradient-bg {
            background: linear-gradient(to right, var(--primary), var(--secondary));
        }
        
        .gradient-text {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .form-container {
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .form-container:hover {
            box-shadow: 0 15px 35px -10px rgba(0, 0, 0, 0.25);
        }
        
        .input-field {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }
        
        .input-field:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px -5px rgba(79, 70, 229, 0.5);
        }
        
        .feature-icon {
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%);
        }
        
        .floating-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            transition: all 0.2s ease;
            pointer-events: none;
            color: #9ca3af;
        }
        
        .input-wrapper:focus-within .floating-label,
        .input-wrapper.has-value .floating-label {
            top: 0;
            left: 0.75rem;
            transform: translateY(-50%) scale(0.85);
            background: white;
            padding: 0 0.25rem;
            color: var(--primary);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Left Column - Features -->
        <div class="bg-white rounded-2xl p-8 flex flex-col justify-center form-container hidden md:block">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold gradient-text inline-block">ParkFinder</h1>
                <p class="text-gray-600 mt-2">Find and book parking spots with ease</p>
            </div>
            
            <div class="space-y-6">
                <div class="flex items-start space-x-4">
                    <div class="feature-icon p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Quick Parking</h3>
                        <p class="text-gray-600">Find available spots near your destination in seconds.</p>
                    </div>
                </div>
                
                <div class="flex items-start space-x-4">
                    <div class="feature-icon p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Save Money</h3>
                        <p class="text-gray-600">Compare prices and find the best deals on parking.</p>
                    </div>
                </div>
                
                <div class="flex items-start space-x-4">
                    <div class="feature-icon p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Secure & Reliable</h3>
                        <p class="text-gray-600">Your parking reservations are always guaranteed.</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <img src="https://illustrations.popsy.co/amber/login.svg" alt="Parking illustration" class="w-full max-w-xs mx-auto">
            </div>
        </div>
        
        <!-- Right Column - Login Form -->
        <div class="bg-white rounded-2xl p-8 form-container">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
                <p class="text-gray-600 mt-2">Login to manage your parking reservations</p>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" id="loginForm" class="space-y-6">
                <div class="input-wrapper relative">
                    <label for="email" class="floating-label">Email Address</label>
                    <input id="email" name="email" type="email" required 
                           class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="">
                </div>
                
                <div class="input-wrapper relative">
                    <label for="password" class="floating-label">Password</label>
                    <input id="password" name="password" type="password" required 
                           class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="">
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Remember me
                        </label>
                    </div>
                    <div class="text-sm">
                        <a href="forgot-password.php" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Forgot password?
                        </a>
                    </div>
                </div>
                
                <button type="submit" id="submitBtn" 
                        class="btn-primary w-full py-3 px-4 rounded-lg text-white font-semibold shadow-md">
                    Sign In
                </button>
            </form>
            
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">
                            Or continue with
                        </span>
                    </div>
                </div>
                
                <div class="mt-6 grid grid-cols-2 gap-3">
                    <div>
                        <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.342-3.369-1.342-.454-1.155-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0110 4.844c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.933.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C17.14 18.163 20 14.418 20 10c0-5.523-4.477-10-10-10z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account? 
                    <a href="register.php" class="font-medium text-indigo-600 hover:text-indigo-500">Sign up</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const submitBtn = document.getElementById('submitBtn');
            
            // Initialize floating labels
            const inputWrappers = document.querySelectorAll('.input-wrapper');
            inputWrappers.forEach(wrapper => {
                const input = wrapper.querySelector('input');
                const label = wrapper.querySelector('.floating-label');
                
                // Check if input has value on page load
                if (input.value) {
                    wrapper.classList.add('has-value');
                }
                
                input.addEventListener('input', function() {
                    if (this.value) {
                        wrapper.classList.add('has-value');
                    } else {
                        wrapper.classList.remove('has-value');
                    }
                });
                
                // Add animation on focus
                input.addEventListener('focus', function() {
                    wrapper.classList.add('transform', 'scale-105');
                });
                
                input.addEventListener('blur', function() {
                    wrapper.classList.remove('transform', 'scale-105');
                });
            });
            
            // Form submission animation
            form.addEventListener('submit', function(e) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Signing in...
                `;
            });
            
            // Add a subtle pulse animation to the form container
            const formContainer = document.querySelector('.form-container');
            setTimeout(() => {
                formContainer.classList.add('animate-pulse');
                setTimeout(() => {
                    formContainer.classList.remove('animate-pulse');
                }, 1000);
            }, 500);
        });
    </script>
</body>
</html>