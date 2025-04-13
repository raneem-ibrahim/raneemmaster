{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> 

 --}}





 <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل جديد</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/singup.css')}}">
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="logo">
        <img src="{{ asset('image/Brown_Retro_Book_Store_Logo-removebg-preview.png') }}" alt="Logo">
      </div>

      <!-- Name -->
      <div class="row">
        <div class="input-field">
          <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
          <label for="first_name">الاسم الأول</label>
          @error('first_name')
            <div class="input-error">{{ $message }}</div>
          @enderror
        </div>

        <div class="input-field">
          <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required>
          <label for="last_name">الاسم الأخير</label>
          @error('last_name')
            <div class="input-error">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <!-- Email Address -->
      <div class="input-field">
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        <label for="email">البريد الإلكتروني</label>
        @error('email')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <!-- Password -->
      <div class="row">
        <div class="input-field">
          <input id="password" type="password" name="password" required autocomplete="new-password">
          <label for="password">كلمة المرور</label>
          @error('password')
            <div class="input-error">{{ $message }}</div>
          @enderror
        </div>

        <div class="input-field">
          <input id="password_confirmation" type="password" name="password_confirmation" required>
          <label for="password_confirmation">تأكيد كلمة المرور</label>
        </div>
      </div>

      <!-- Additional Fields -->
      <div class="input-field">
        <input type="number" name="age" min="5" max="100" value="{{ old('age') }}" required>
        <label>العمر</label>
        @error('age')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="options-container">
        <div class="options-title">الجنس   والمادة الدراسية</div>
        <div class="options-group">
          <label for="male" class="option-label">
            <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
            ذكر
          </label>

          <label for="female" class="option-label">
            <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
            أنثى
          </label>

          <label for="hifz" class="option-label">
            <input type="checkbox" id="hifz" name="desired_study[]" value="hifz" {{ is_array(old('desired_study')) && in_array('hifz', old('desired_study')) ? 'checked' : '' }}>
            حفظ
          </label>

          <label for="ahkam" class="option-label">
            <input type="checkbox" id="ahkam" name="desired_study[]" value="ahkam" {{ is_array(old('desired_study')) && in_array('ahkam', old('desired_study')) ? 'checked' : '' }}>
            أحكام
          </label>
        </div>
        @error('gender')
          <div class="input-error">{{ $message }}</div>
        @enderror
        @error('desired_study')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit">إنشاء حساب</button>
      
      <div class="login-link">
        لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a>
      </div>
    </form>
  </div>
</body>
</html>