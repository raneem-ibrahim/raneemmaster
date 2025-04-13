{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
  <div class="wrapper">
    <!-- Session Status -->
    <x-auth-session-status class="auth-session-status" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="logo">
        <img src="{{ asset('image/Brown_Retro_Book_Store_Logo-removebg-preview.png') }}" alt="Logo">
      </div>

      <!-- Email Address -->
      <div class="input-field">
        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
        <label for="email">البريد الإلكتروني</label>
        <x-input-error :messages="$errors->get('email')" class="input-error" />
      </div>

      <!-- Password -->
      <div class="input-field">
        <input id="password" type="password" name="password" required autocomplete="current-password">
        <label for="password">كلمة المرور</label>
        <x-input-error :messages="$errors->get('password')" class="input-error" />
      </div>

      <!-- Remember Me -->
      <div class="forget">
        <label for="remember_me">
          <input id="remember_me" type="checkbox" name="remember">
          <p>تذكرني</p>
        </label>
        
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">
            هل نسيت كلمة المرور؟
          </a>
        @endif
      </div>

      <button type="submit">تسجيل الدخول</button>
    </form>
  </div>
</body>
</html>
