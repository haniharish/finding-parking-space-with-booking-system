<?php
require 'db.php';

// Define parking locations (could also come from database)
$parkingLocations = [
    'Downtown Garage',
    'Mall Parking',
    'Airport Lot',
    'Train Station Parking',
    'City Center Parking'
];

// Define vehicle types
$vehicleTypes = [
    'Car',
    'SUV',
    'Motorcycle',
    'Truck',
    'Van'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $location = $conn->real_escape_string($_POST['location']);
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);
    $duration = intval($_POST['duration']);
    $vehicle_type = $conn->real_escape_string($_POST['vehicle_type']);
    $vehicle_number = $conn->real_escape_string($_POST['vehicle_number']);
    $booking_ref = 'PARK-' . strtoupper(substr(md5(uniqid()), 0, 8));

    $sql = "INSERT INTO bookingss (name, email, phone, location, date, time, duration, vehicle_type, vehicle_number, booking_ref)
            VALUES ('$name', '$email', '$phone', '$location', '$date', '$time', $duration, '$vehicle_type', '$vehicle_number', '$booking_ref')";

    if ($conn->query($sql) === TRUE) {
        $booking_id = $conn->insert_id;
        $success = true;
    } else {
        $error = $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Booking | ParkFinder</title>
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
        
        .booking-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(245, 247, 250, 0.9) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f00;
            border-radius: 50%;
            animation: fall 5s linear infinite;
        }
        
        @keyframes fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body class="min-h-screen py-12 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold gradient-text inline-block">ParkFinder</h1>
            <p class="text-gray-600 mt-2">Book your parking spot in just a few clicks</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column - Booking Form -->
            <div class="bg-white rounded-2xl p-8 form-container">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Book Your Parking</h2>
                
                <?php if (isset($error)): ?>
                    <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($success)): ?>
                    <div id="successMessage" class="booking-card rounded-2xl p-8 mb-8 relative overflow-hidden">
                        <div class="text-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-xl font-bold text-gray-800 mt-4">Booking Confirmed!</h3>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div><span class="text-gray-500">Location:</span> <span class="font-medium"><?php echo htmlspecialchars($location); ?></span></div>
                                <div><span class="text-gray-500">Name:</span> <span class="font-medium"><?php echo htmlspecialchars($name); ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div><span class="text-gray-500">Date:</span> <span class="font-medium"><?php echo htmlspecialchars($date); ?></span></div>
                                <div><span class="text-gray-500">Time:</span> <span class="font-medium"><?php echo htmlspecialchars($time); ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div><span class="text-gray-500">Duration:</span> <span class="font-medium"><?php echo htmlspecialchars($duration); ?> hours</span></div>
                                <div><span class="text-gray-500">Vehicle:</span> <span class="font-medium"><?php echo htmlspecialchars($vehicle_type); ?> (<?php echo htmlspecialchars($vehicle_number); ?>)</span></div>
                            </div>
                            <div class="pt-4 mt-4 border-t">
                                <div class="mb-2"><span class="text-gray-500">Booking Reference:</span> <span class="font-bold text-indigo-600"><?php echo $booking_ref; ?></span></div>
                                <div><span class="text-gray-500">Booking ID:</span> <span class="font-bold text-blue-600"><?php echo $booking_id; ?></span></div>
                            </div>
                        </div>
                        
                        <p class="text-gray-600 mt-6 text-center">A confirmation will be sent to: <span class="font-semibold"><?php echo htmlspecialchars($email); ?></span> or <span class="font-semibold"><?php echo htmlspecialchars($phone); ?></span></p>
                    </div>
                    
                    <script>
                        // Generate confetti effect
                        document.addEventListener('DOMContentLoaded', function() {
                            const colors = ['#4f46e5', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6'];
                            const successMessage = document.getElementById('successMessage');
                            
                            for (let i = 0; i < 50; i++) {
                                const confetti = document.createElement('div');
                                confetti.className = 'confetti';
                                confetti.style.left = Math.random() * 100 + '%';
                                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                                confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
                                confetti.style.animationDelay = Math.random() + 's';
                                confetti.style.width = (Math.random() * 8 + 4) + 'px';
                                confetti.style.height = confetti.style.width;
                                successMessage.appendChild(confetti);
                            }
                        });
                    </script>
                <?php else: ?>
                    <form method="POST" id="bookingForm" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="input-wrapper relative">
                                <label for="name" class="floating-label">Full Name</label>
                                <input id="name" name="name" type="text" required 
                                       class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                       placeholder="">
                            </div>
                            
                            <div class="input-wrapper relative">
                                <label for="email" class="floating-label">Email Address</label>
                                <input id="email" name="email" type="email" required 
                                       class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                       placeholder="">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="input-wrapper relative">
                                <label for="phone" class="floating-label">Phone Number</label>
                                <input id="phone" name="phone" type="tel" required 
                                       class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                       placeholder="">
                            </div>
                            
                            <div class="input-wrapper relative">
                                <label for="location" class="floating-label">Parking Location</label>
                                <select id="location" name="location" required 
                                        class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 appearance-none">
                                    <option value=""></option>
                                    <?php foreach ($parkingLocations as $loc): ?>
                                        <option value="<?php echo htmlspecialchars($loc); ?>"><?php echo htmlspecialchars($loc); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="input-wrapper relative">
                                <label for="date" class="floating-label">Date</label>
                                <input id="date" name="date" type="date" required 
                                       class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                       placeholder="" min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            
                            <div class="input-wrapper relative">
                                <label for="time" class="floating-label">Time</label>
                                <input id="time" name="time" type="time" required 
                                       class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                       placeholder="">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="input-wrapper relative">
                                <label for="duration" class="floating-label">Duration (hours)</label>
                                <input id="duration" name="duration" type="number" min="1" max="24" required 
                                       class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                       placeholder="" value="2">
                            </div>
                            
                            <div class="input-wrapper relative">
                                <label for="vehicle_type" class="floating-label">Vehicle Type</label>
                                <select id="vehicle_type" name="vehicle_type" required 
                                        class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 appearance-none">
                                    <option value=""></option>
                                    <?php foreach ($vehicleTypes as $type): ?>
                                        <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-wrapper relative">
                            <label for="vehicle_number" class="floating-label">Vehicle License Plate</label>
                            <input id="vehicle_number" name="vehicle_number" type="text" required 
                                   class="input-field w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 uppercase"
                                   placeholder="" style="text-transform: uppercase">
                        </div>
                        
                        <button type="submit" id="submitBtn" 
                                class="btn-primary w-full py-3 px-4 rounded-lg text-white font-semibold shadow-md">
                            Book Parking Spot
                        </button>
                    </form>
                <?php endif; ?>
            </div>
            
            <!-- Right Column - Parking Information -->
            <div class="bg-white rounded-2xl p-8 form-container">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Available Parking Locations</h2>
                    <p class="text-gray-600 mt-2">Find the perfect spot for your vehicle</p>
                </div>
                
                <div class="space-y-6">
                    <?php foreach ($parkingLocations as $index => $loc): ?>
                        <div class="flex items-start space-x-4 p-4 hover:bg-gray-50 rounded-lg transition">
                            <div class="feature-icon p-3 rounded-full flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg"><?php echo htmlspecialchars($loc); ?></h3>
                                <p class="text-gray-600 mt-1">
                                    <?php 
                                    $features = [
                                        '24/7 security monitoring',
                                        'EV charging available',
                                        'Covered parking',
                                        'Near city center',
                                        'Valet service'
                                    ];
                                    echo $features[$index % count($features)];
                                    ?>
                                </p>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Open 24 hours
                                </div>
                                <div class="mt-1 flex items-center text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    $<?php echo (($index % 3) + 2); ?> per hour
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="mt-8 p-6 bg-indigo-50 rounded-lg">
                    <h3 class="font-semibold text-lg text-indigo-800 mb-2">Parking Tips</h3>
                    <ul class="space-y-2 text-sm text-indigo-700">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Book in advance for better rates and guaranteed spots</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Check vehicle height restrictions for indoor parking</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Have your booking reference ready when you arrive</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize floating labels
            const inputWrappers = document.querySelectorAll('.input-wrapper');
            inputWrappers.forEach(wrapper => {
                const input = wrapper.querySelector('input, select');
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
            const bookingForm = document.getElementById('bookingForm');
            if (bookingForm) {
                bookingForm.addEventListener('submit', function(e) {
                    const submitBtn = document.getElementById('submitBtn');
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing Booking...
                    `;
                });
            }
            
            // Set minimum time based on current time if date is today
            const dateInput = document.getElementById('date');
            const timeInput = document.getElementById('time');
            
            if (dateInput && timeInput) {
                dateInput.addEventListener('change', function() {
                    const today = new Date().toISOString().split('T')[0];
                    const now = new Date();
                    const currentHour = now.getHours().toString().padStart(2, '0');
                    const currentMinute = now.getMinutes().toString().padStart(2, '0');
                    
                    if (this.value === today) {
                        timeInput.min = `${currentHour}:${currentMinute}`;
                    } else {
                        timeInput.removeAttribute('min');
                    }
                });
            }
            
            // Auto-format vehicle license plate to uppercase
            const vehicleNumberInput = document.getElementById('vehicle_number');
            if (vehicleNumberInput) {
                vehicleNumberInput.addEventListener('input', function() {
                    this.value = this.value.toUpperCase();
                });
            }
        });
    </script>
</body>
</html>