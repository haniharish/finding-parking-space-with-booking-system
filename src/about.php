<?php
require 'db.php'; // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | ParkFinder</title>
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
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.2);
        }
        
        .stat-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(245, 247, 250, 0.9) 100%);
            backdrop-filter: blur(10px);
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -38px;
            top: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(to right, var(--primary), var(--secondary));
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 29px;
            top: 0;
            height: 100%;
            width: 2px;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="index.php" class="text-xl font-bold gradient-text">ParkFinder</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-gray-700 hover:text-indigo-600 transition">Home</a>
                    <a href="confirmation.php" class="text-gray-700 hover:text-indigo-600 transition">Find Parking</a>
                    <a href="confirmation.php" class="text-gray-700 hover:text-indigo-600 transition">Book Now</a>
                    <a href="about.php" class="text-indigo-600 font-medium">About</a>
                    <a href="contact.php" class="text-gray-700 hover:text-indigo-600 transition">Contact</a>
                </div>
                <div class="md:hidden flex items-center">
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-indigo-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="index.php" class="block px-3 py-2 text-gray-700 hover:text-indigo-600">Home</a>
                <a href="search.php" class="block px-3 py-2 text-gray-700 hover:text-indigo-600">Find Parking</a>
                <a href="booking.php" class="block px-3 py-2 text-gray-700 hover:text-indigo-600">Book Now</a>
                <a href="about.php" class="block px-3 py-2 text-indigo-600 font-medium">About</a>
                <a href="contact.php" class="block px-3 py-2 text-gray-700 hover:text-indigo-600">Contact</a>
            </div>
        </div>
    </nav>

    <!-- main Section -->
    <section class="py-20 bg-gradient-to-r from-indigo-500 to-emerald-500 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">About ParkFinder</h1>
            <p class="text-xl max-w-3xl mx-auto">Revolutionizing the way you find and book parking spaces with our innovative platform.</p>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Story</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-indigo-500 to-emerald-500 mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">From Parking Frustration to Innovation</h3>
                    <p class="text-gray-600 mb-4">ParkFinder was born out of a simple frustration - the difficulty of finding convenient, affordable parking in urban areas. Our founders, tired of circling blocks and arriving late to appointments, envisioned a better way.</p>
                    <p class="text-gray-600">Since our launch in 2020, we've grown from a small startup to the leading parking solution platform, serving over 500,000 satisfied customers across the country.</p>
                </div>
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Parking garage" class="rounded-lg shadow-xl w-full h-auto">
                    <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-lg shadow-lg w-3/4">
                        <h4 class="font-bold text-gray-800">500,000+ Happy Customers</h4>
                        <p class="text-sm text-gray-600">And counting since 2020</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="stat-card p-8 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold gradient-text mb-2">15K+</div>
                    <h3 class="text-lg font-semibold text-gray-800">Parking Spaces</h3>
                    <p class="text-gray-600">Across major cities</p>
                </div>
                <div class="stat-card p-8 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold gradient-text mb-2">98%</div>
                    <h3 class="text-lg font-semibold text-gray-800">Customer Satisfaction</h3>
                    <p class="text-gray-600">Based on user reviews</p>
                </div>
                <div class="stat-card p-8 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold gradient-text mb-2">24/7</div>
                    <h3 class="text-lg font-semibold text-gray-800">Support</h3>
                    <p class="text-gray-600">Always here to help</p>
                </div>
            </div>
        </div>
    </section>

    

 

    <!-- CTA -->
    <section class="py-16 bg-gradient-to-r from-indigo-500 to-emerald-500 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Experience Stress-Free Parking?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Join thousands of happy customers who've found their perfect parking spot with ParkFinder.</p>
            <a href="confirmation.php" class="inline-block bg-white text-indigo-600 hover:bg-gray-100 font-bold py-3 px-8 rounded-lg shadow-lg transition duration-300">
                Book Your Parking Now
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold gradient-text mb-4">ParkFinder</h3>
                    <p class="text-gray-400">Making parking simple, convenient, and stress-free since 2020.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="search.php" class="text-gray-400 hover:text-white transition">Find Parking</a></li>
                        <li><a href="booking.php" class="text-gray-400 hover:text-white transition">Book Now</a></li>
                        <li><a href="about.php" class="text-gray-400 hover:text-white transition">About Us</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="faq.php" class="text-gray-400 hover:text-white transition">FAQs</a></li>
                        <li><a href="contact.php" class="text-gray-400 hover:text-white transition">Contact Us</a></li>
                        <li><a href="privacy.php" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="terms.php" class="text-gray-400 hover:text-white transition">Terms of Service</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; <?php echo date('Y'); ?> ParkFinder. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Animate team cards on scroll
        const teamCards = document.querySelectorAll('.team-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        teamCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });

        // Current year for footer
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</body>
</html>