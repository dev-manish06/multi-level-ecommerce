<style>
/* Flex Container for Split Layout */
.flex-container {
    display: flex;
    flex-direction: row;

    width: 100%;
}

/* Image Section (Left Half) */
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
    background: rgba(0, 0, 0, 0.5); /* Dark overlay */
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

/* Form Section (Right Half) */
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

.forgot-link,
.create-account-link {
    display: inline-block;
    margin-top: 15px;
    font-size: 14px;
    color: #00bcd4;
    text-decoration: none;
    transition: color 0.3s;
}

.forgot-link:hover,
.create-account-link:hover {
    color: #2196f3;
}

/* Responsive Design */
@media (max-width: 768px) {
    .flex-container {
        flex-direction: column;
        padding: 20px;
    }
    .image-section {
        height: 50vh; /* Reduce image section height on small screens */
    }
    .form-section {
        padding: 20px 10px;
    }
}

</style>
<x-guest-layout>
    <div class="flex-container">
        <!-- Image Section (Half) -->
        <div class="image-section">
            <div class="image-overlay">
                <div>
                    <img src="{{ asset('download.jpg') }}" alt="Logo" class="centered-image">
                    <h1>Spice Up Your Life! 🌶️</h1>
                </div>
            </div>
        </div>

        <!-- Form Section (Half) -->
        <div class="form-section">
            <div class="form-card">
                <div class="img-container">
                    <img src="{{ asset('download.jpg') }}" alt="Logo">
                </div>
                <h2>Join Spice World 🌶️</h2>
                <p>Sign up to explore exotic premium spices!</p>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ms-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>


