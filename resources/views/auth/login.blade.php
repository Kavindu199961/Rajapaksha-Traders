<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Supermarket Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
        .login-card {
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.88);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .input-field {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }
        .input-field:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <div class="login-card w-full max-w-md p-8">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logo.png') }}" alt="Supermarket Logo" class="h-16">
        </div>
        
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Admin Login</h1>

            @if(session('status'))
                <div class="mt-4 mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-envelope text-gray-500 mr-1"></i>Email Address
                </label>
                <input id="email" class="input-field w-full px-4 py-3 rounded-lg focus:outline-none" 
                       type="email" name="email" value="{{ old('email') }}" 
                       required autofocus autocomplete="username"
                       placeholder="your@email.com">
                @if($errors->get('email'))
                    <div class="mt-2 text-sm text-red-600">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-lock text-gray-500 mr-1"></i>Password
                </label>
                <input id="password" class="input-field w-full px-4 py-3 rounded-lg focus:outline-none"
                       type="password" name="password" required autocomplete="current-password"
                       placeholder="••••••••">
                @if($errors->get('password'))
                    <div class="mt-2 text-sm text-red-600">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                           name="remember">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-700 flex items-center">
                        <i class="fas fa-check-circle mr-1 text-blue-500"></i> Remember me
                    </label>
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 font-medium">
                <i class="fas fa-sign-in-alt mr-2"></i>Sign In to Dashboard
            </button>
        </form>

        <!-- <div class="mt-8 pt-6 border-t border-gray-200 text-center">
            <p class="text-sm text-gray-600">
                New to our system? 
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        Create an account
                    </a>
                @endif
            </p>
        </div> -->

        <div class="mt-8 pt-6 border-t border-gray-200 text-center">
            <p class="text-sm text-gray-600">
                Powered by <a href="https://ceylongit.online/" class="font-medium text-blue-600 hover:text-blue-500">CeylonGit</a> 
                <span class="block mt-1">+94 707645303</span>
            </p>
        </div>
    </div>
</body>
</html>
