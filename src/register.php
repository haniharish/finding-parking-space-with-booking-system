<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        $_SESSION["user_id"] = $stmt->insert_id;
        header("Location: login.php");
    } else {
        $error = "Email already exists.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | ParkFinder</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="index.css">
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
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Left Column - Features -->
        <div class="bg-white rounded-2xl p-8 flex flex-col justify-center form-container hidden md:block">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold gradient-bg bg-clip-text text-transparent inline-block">ParkFinder</h1>
                <p class="text-gray-600 mt-2">Find and book parking spots with ease</p>
            </div>
            
            <div class="space-y-6">
                <div class="flex items-start space-x-4">
                    <div class="feature-icon p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Real-time Availability</h3>
                        <p class="text-gray-600">See available parking spots in real-time near your destination.</p>
                    </div>
                </div>
                
                <div class="flex items-start space-x-4">
                    <div class="feature-icon p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Secure Booking</h3>
                        <p class="text-gray-600">Your bookings and payments are always secure and protected.</p>
                    </div>
                </div>
                
                <div class="flex items-start space-x-4">
                    <div class="feature-icon p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Time-Saving</h3>
                        <p class="text-gray-600">No more driving around looking for parking. Reserve your spot in advance.</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <img src="https://illustrations.popsy.co/amber/digital-nomad.svg" alt="Parking illustration" class="w-full max-w-xs mx-auto">
            </div>
        </div>
        
        <!-- Right Column - Registration Form -->
        <div class="bg-white rounded-2xl p-8 form-container">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Create Your Account</h2>
                <p class="text-gray-600 mt-2">Join thousands of happy parkers</p>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" id="registerForm" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input id="name" name="name" type="text" required 
                           class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="John Doe">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input id="email" name="email" type="email" required 
                           class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="your@email.com">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" name="password" type="password" required 
                           class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="••••••••">
                    <p class="mt-1 text-xs text-gray-500">Minimum 8 characters</p>
                </div>
                
                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required 
                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms of Service</a> and <a href="#" class="text-indigo-600 hover:text-indigo-500">Privacy Policy</a>
                    </label>
                </div>
                
                <button type="submit" id="submitBtn" 
                        class="btn-primary w-full py-3 px-4 rounded-lg text-white font-semibold shadow-md">
                    Create Account
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account? 
                    <a href="login.php" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in</a>
                </p>
            </div>
            
            <div class="mt-8 border-t border-gray-200 pt-6">
                <p class="text-xs text-gray-500 text-center">
                    By continuing, you agree to our User Agreement and Privacy Policy.
                </p>
            </div>
        </div>
    </div>

    
</body>
</html>