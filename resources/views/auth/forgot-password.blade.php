<x-guest-layout>
    <style>
        /* Same CSS */
        .flex-container {
            display: flex;
            flex-direction: row;
            width: 100%;
        }
        .image-section {
            flex: 1;
            background: url('{{ asset('download.jpg') }}') no-repeat center center;
            background-size: cover;
            position: relative;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .centered-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 4px solid #00bcd4;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        .image-overlay h1 {
            font-size: 32px;
            font-weight: bold;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
            margin-top: 10px;
        }
        .form-section {
            flex: 1;
            background: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .form-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .form-card .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .form-card img {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #00bcd4;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }
        .form-card img:hover {
            transform: scale(1.05);
        }
        .form-card h2 {
            font-size: 30px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        .form-card p {
            font-size: 15px;
            color: #777;
            margin-bottom: 30px;
        }
        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 12px;
            font-size: 16px;
            margin-bottom: 20px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-input:focus {
            border-color: #00bcd4;
            box-shadow: 0 0 8px rgba(0, 188, 212, 0.4);
            outline: none;
        }
        .gradient-btn {
            width: 100%;
            background: linear-gradient(to right, #00bcd4, #2196f3);
            border: none;
            padding: 14px;
            border-radius: 30px;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.4s;
        }
        .gradient-btn:hover {
            background: linear-gradient(to right, #2196f3, #00bcd4);
        }
        @media (max-width: 768px) {
            .flex-container {
                flex-direction: column;
                padding: 20px;
            }
            .image-section {
                height: 50vh;
            }
            .form-section {
                padding: 20px 10px;
            }
        }
    </style>

    <div class="flex-container">
        <!-- Left Side Image -->
        <div class="image-section">
            <div class="image-overlay">
                <img src="{{ asset('download.jpg') }}" alt="Logo" class="centered-image">
                <h1>Forgot Password? 🔒</h1>
            </div>
        </div>

        <!-- Right Side Form -->
        <div class="form-section">
            <div class="form-card">
                <div class="img-container">
                    <img src="{{ asset('download.jpg') }}" alt="Logo">
                </div>
                <h2>Reset Your Password</h2>
                <p>Enter your email to get a password reset link!</p>

                <!-- Status Message -->
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                <x-validation-errors class="mb-4" />

                <!-- Reset Password Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="gradient-btn">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('login') }}" class="forgot-link">Back to Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
