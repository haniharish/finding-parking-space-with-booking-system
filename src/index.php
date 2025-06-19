<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParkFinder - Smart Parking Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="input.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
        }
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }
        .accent-bg {
            background-color: var(--accent);
        }
        .parking-card {
            transition: all 0.3s ease;
        }
        .parking-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .hero-pattern {
            background-image: radial-gradient(circle at 10% 20%, rgba(67, 97, 238, 0.1) 0%, rgba(67, 97, 238, 0) 50%);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>

<body>
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden -z-10 ">
        <div class="absolute top-0 left-0 w-64 h-64 rounded-full bg-purple-200 opacity-20 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full bg-blue-200 opacity-20 blur-3xl"></div>
    </div>

    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4 flex justify-between items-center relative shadow-lg">
    
    <!-- Left side: Logo + curve -->
    <div class="flex items-center relative z-10">
      <div class="absolute -left-20 -top-10 w-48 h-48 bg-blue-100 rounded-full opacity-50"></div>
      <h1 class="text-white font-extrabold text-4xl ml-2">ParkFinder</h1>
    </div>
    
    <!-- Right side: Navigation -->
    <div class="flex items-center space-x-8 text-white font-medium">
      <a href="index.php" class="hover:underline text-2xl font-bold">Home</a>
      <a href="login.php" class="hover:underline text-2xl font-bold">Login</a>
      <a href="about.php" class="hover:underline text-2xl font-bold">About</a>
      <a href="confirmation.php" class="bg-white text-blue-700 font-bold px-5 py-2 rounded-full hover:bg-blue-100 transition text-2xl">Book Now</a>
    </div>
    
  </nav>

    <!-- Main Section -->
    <section class="gradient-bg text-white pt-20 pb-32 hero-pattern">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-12 lg:mb-0 animate__animated animate__fadeInLeft">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight text-gray-500">Find Your Perfect Parking Spot in <span class="text-yellow-300">Seconds</span></h1>
                    <p class="text-xl md:text-2xl mb-8 opacity-90 text-gray-500">No more driving in circles. Reserve your spot before you even leave home.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="confirmation.php" class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-bold hover:bg-blue-100 transition duration-300 shadow-lg text-center mt-2 border-2 border-gray-500">Find Parking</a>
                        <a href="#scroll" class="bg-white border-2  text-blue-600 px-8 py-4 rounded-full text-lg font-bold  transition duration-300 hover:scale-110 text-center pt-5 border-gray-500 ">How It Works</a>
                    </div>
                </div>
                <div class="lg:w-1/2 animate__animated animate__fadeInRight">
                    <div class="relative floating">
                        <img src="mainparking.jpg" alt="Happy driver finding parking" class="rounded-2xl shadow-2xl w-full max-w-lg mx-auto">
                        <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-xl shadow-lg">
                            <div class="flex items-center">
                                <div class="bg-green-100 p-3 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Parking Found</p>
                                    <p class="font-bold text-gray-800">Downtown Mall</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-6">
            <p class="text-center text-black mb-8">Trusted by businesses across the country</p>
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">
                <img src="mallchain.png" alt="Mall Chain" class="h-12 opacity-90 hover:opacity-100 transition duration-300">
                <img src="airport.jpg" alt="Airport Co" class="h-12 opacity-90 hover:opacity-100 transition duration-300">
                <img src="city.jpg" alt="City Gov" class="h-12 opacity-90 hover:opacity-100 transition duration-300">
                <img src="park.jpg"Business Park" class="h-12 opacity-90 hover:opacity-100 transition duration-300">
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 bg-gray-50" id="scroll">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full font-semibold mb-4">How It Works</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Parking Made <span class="text-blue-600">Simple</span></h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Three easy steps to stress-free parking</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg parking-card text-center">
                    <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-blue-600 text-2xl font-bold">1</span>
                    </div>
                    <img src="searchparking.jpg" alt="Search parking" class="w-full h-48 object-cover rounded-xl mb-6">
                    <h3 class="text-xl font-bold mb-3">Search</h3>
                    <p class="text-gray-600">Enter your destination and see available parking spots in real-time.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg parking-card text-center">
                    <div class="bg-purple-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-purple-600 text-2xl font-bold">2</span>
                    </div>
                    <img src="bookparking.jpeg" alt="Book parking" class="w-full h-48 object-cover rounded-xl mb-6">
                    <h3 class="text-xl font-bold mb-3">Book</h3>
                    <p class="text-gray-600">Reserve your spot with secure payment in just a few taps.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg parking-card text-center">
                    <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-green-600 text-2xl font-bold">3</span>
                    </div>
                    <img src="parkimage.jpg" alt="Park your car" class="w-full h-48 object-cover rounded-xl mb-6">
                    <h3 class="text-xl font-bold mb-3">Park</h3>
                    <p class="text-gray-600">Arrive and park with guaranteed space waiting for you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-white text-blue-600 rounded-full font-semibold mb-4">Why Choose Us</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Smart Parking <span class="text-yellow-300">Solutions</span></h2>
                <p class="text-xl opacity-90 max-w-2xl mx-auto">Technology that makes your life easier</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white bg-opacity-10 p-8 rounded-2xl backdrop-blur-sm border border-white border-opacity-20">
                    <div class="bg-white bg-opacity-20 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Secure Payments</h3>
                    <p class="opacity-90">Encrypted transactions for your peace of mind.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-white bg-opacity-10 p-8 rounded-2xl backdrop-blur-sm border border-white border-opacity-20">
                    <div class="bg-white bg-opacity-20 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Real-Time Updates</h3>
                    <p class="opacity-90">Live parking availability with minute-by-minute updates.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-white bg-opacity-10 p-8 rounded-2xl backdrop-blur-sm border border-white border-opacity-20">
                    <div class="bg-white bg-opacity-20 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Smart Navigation</h3>
                    <p class="opacity-90">Turn-by-turn directions to your reserved spot.</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="bg-white bg-opacity-10 p-8 rounded-2xl backdrop-blur-sm border border-white border-opacity-20">
                    <div class="bg-white bg-opacity-20 w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Flexible Payments</h3>
                    <p class="opacity-90">Hourly, daily, or monthly options available.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full font-semibold mb-4">Testimonials</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">What Our <span class="text-blue-600">Users Say</span></h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Don't just take our word for it</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-6">
                        <div class="ml-4">
                            <h4 class="font-bold text-lg">Shalini kumari</h4>
                            <p class="text-blue-600">Regular User</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-6">"I save at least 15 minutes every morning using ParkEase. The guaranteed spot at my office building is a game-changer!"</p>
                    <div class="flex text-yellow-400">
                        
                        </svg>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-6">
                        <div class="ml-4">
                            <h4 class="font-bold text-lg">Dheeraj Sharma</h4>
                            <p class="text-blue-600">Business Traveler</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Airport parking used to be my biggest headache. Now I book before my flight and walk straight to my reserved spot."</p>
                   
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-6">
                        <div class="ml-4">
                            <h4 class="font-bold text-lg">Anushka Sharma</h4>
                            <p class="text-blue-600">Event Goer</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-6">"For concerts and games, ParkEase takes away the parking stress. I arrive relaxed knowing my spot is waiting."</p>
                    <div class="flex text-yellow-400">
