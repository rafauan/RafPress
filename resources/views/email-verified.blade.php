<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Email Verified - {{ config('app.name', 'RafPress') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Styles -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            fontFamily: {
                                'sans': ['Instrument Sans', 'ui-sans-serif', 'system-ui'],
                            },
                            animation: {
                                'float': 'float 3s ease-in-out infinite',
                                'fadeIn': 'fadeIn 1s ease-in-out',
                                'slideUp': 'slideUp 0.8s ease-out',
                                'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                            },
                            keyframes: {
                                float: {
                                    '0%, 100%': { transform: 'translateY(0px)' },
                                    '50%': { transform: 'translateY(-10px)' },
                                },
                                fadeIn: {
                                    '0%': { opacity: '0' },
                                    '100%': { opacity: '1' },
                                },
                                slideUp: {
                                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                                    '100%': { transform: 'translateY(0px)', opacity: '1' },
                                },
                            }
                        }
                    }
                }
            </script>
        @endif
    </head>
    <body class="min-h-screen bg-gradient-to-br from-green-50 via-blue-50 to-indigo-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%236366f1" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>

        <!-- Main Container -->
        <div class="relative min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <!-- Success Icon -->
                <div class="text-center animate-slideUp">
                    <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-gradient-to-r from-green-400 to-blue-500 shadow-lg animate-float">
                        <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 sm:p-10 backdrop-blur-sm bg-opacity-95 dark:bg-opacity-95 animate-fadeIn">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
                                Email Verified!
                            </span>
                        </h1>
                        <div class="w-24 h-1 bg-gradient-to-r from-green-400 to-blue-500 rounded-full mx-auto"></div>
                    </div>

                    <!-- Success Message -->
                    <div class="text-center space-y-6">
                        <div class="space-y-4">
                            <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                                Thank you for verifying your email address!
                                <span class="font-semibold text-green-600 dark:text-green-400">Your account is now active.</span>
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6">
                            <a href="{{ url('/admin') }}"
                               class="flex-1 bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 text-center">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v10H8V5z"></path>
                                </svg>
                                Go to Admin Panel
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center animate-fadeIn">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Powered by
                        <span class="font-semibold bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent">
                            RafPress
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="fixed top-20 left-10 w-4 h-4 bg-green-400 rounded-full animate-pulse-slow opacity-60"></div>
        <div class="fixed top-40 right-20 w-3 h-3 bg-blue-400 rounded-full animate-pulse-slow opacity-60" style="animation-delay: 1s;"></div>
        <div class="fixed bottom-32 left-20 w-2 h-2 bg-indigo-400 rounded-full animate-pulse-slow opacity-60" style="animation-delay: 2s;"></div>
        <div class="fixed bottom-20 right-10 w-5 h-5 bg-purple-400 rounded-full animate-pulse-slow opacity-60" style="animation-delay: 0.5s;"></div>
    </body>
</html>
