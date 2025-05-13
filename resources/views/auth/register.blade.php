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





 {{-- <!DOCTYPE html>
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
        <div class="options-title">الجندر </div>
        <div class="options-group">
          <label for="male" class="option-label">
            <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
            ذكر
          </label>

          <label for="female" class="option-label">
            <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
            أنثى
          </label>

    
        </div>
        @error('gender')
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
</html> --}}




{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل جديد</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/singup.css')}}">
  <style>
    /* أنماط التحقق من الصحة */
    .validation-icon {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      background-size: contain;
      background-repeat: no-repeat;
      opacity: 0;
      transition: opacity 0.3s;
    }
    .valid .validation-icon {
      opacity: 1;
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%2300C851"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>');
    }
    .invalid .validation-icon {
      opacity: 1;
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23ff4444"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>');
    }
    .password-hint {
      font-size: 12px;
      color: #666;
      text-align: right;
      margin-top: 5px;
    }
  </style>
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
      <div class="input-field email-field">
        <input id="email" type="email" name="email" 
               value="{{ old('email') }}"
               pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
               title="يجب أن يحتوي الإيميل على @ ونطاق صالح (مثال: user@example.com)"
               required
               oninput="validateEmail(this)">
        <label for="email">البريد الإلكتروني</label>
        <div class="validation-icon"></div>
        @error('email')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <!-- Password -->
      <div class="row">
        <div class="input-field password-field">
          <input id="password" type="password" name="password" 
                 pattern="^.{8,}$"
                 title="كلمة المرور يجب أن تكون 8 أحرف على الأقل"
                 required 
                 autocomplete="new-password"
                 oninput="validatePassword(this)">
          <label for="password">كلمة المرور</label>
          <div class="validation-icon"></div>
          <div class="password-hint">(8 أحرف على الأقل)</div>
          @error('password')
            <div class="input-error">{{ $message }}</div>
          @enderror
        </div>

        <div class="input-field">
          <input id="password_confirmation" type="password" name="password_confirmation" required>
          <label for="password_confirmation">تأكيد كلمة المرور</label>
        </div>
      </div>

      <!-- باقي الحقول ... -->
      <!-- Additional Fields -->
      <div class="input-field">
        <input type="number" name="age" min="5" max="100" value="{{ old('age') }}" required>
        <label>العمر</label>
        @error('age')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="options-container">
        <div class="options-title">الجندر </div>
        <div class="options-group">
          <label for="male" class="option-label">
            <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
            ذكر
          </label>

          <label for="female" class="option-label">
            <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
            أنثى
          </label>

    
        </div>
        @error('gender')
          <div class="input-error">{{ $message }}</div>
        @enderror
  
      </div>

      <button type="submit">إنشاء حساب</button>
      
      <div class="login-link">
        لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a>
      </div>
    </form>
  </div>

  <script>
    // تحقق من الإيميل
    function validateEmail(input) {
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      const field = input.closest('.email-field');
      const isValid = emailRegex.test(input.value);
      
      field.classList.remove('valid', 'invalid');
      if (input.value.length > 0) {
        field.classList.add(isValid ? 'valid' : 'invalid');
      }
    }

    // تحقق من كلمة المرور
    function validatePassword(input) {
      const passwordRegex = /^.{8,}$/;
      const field = input.closest('.password-field');
      const isValid = passwordRegex.test(input.value);
      
      field.classList.remove('valid', 'invalid');
      if (input.value.length > 0) {
        field.classList.add(isValid ? 'valid' : 'invalid');
      }
    }
  </script>
</body>
</html> --}}



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
  <style>
    /* إضافة أنماط التحقق من الصحة */
    .validation-icon {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      background-size: contain;
      background-repeat: no-repeat;
      opacity: 0;
      transition: opacity 0.3s;
    }
    
    .valid .validation-icon {
      opacity: 1;
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%2300C851"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>');
    }
    
    .invalid .validation-icon {
      opacity: 1;
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23ff4444"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>');
    }
    
    .password-strength {
      height: 4px;
      background: #eee;
      margin-top: 5px;
      border-radius: 2px;
      overflow: hidden;
    }
    
    .strength-bar {
      height: 100%;
      width: 0;
      transition: width 0.3s, background 0.3s;
    }
    
    .requirements {
      display: none;
      font-size: 12px;
      color: #fff;
      margin-top: 5px;
      text-align: right;
    }
    
    .input-field:focus-within .requirements {
      display: block;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="{{ route('register') }}" id="registerForm">
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
      <div class="input-field email-field">
        <input id="email" type="email" name="email" 
               value="{{ old('email') }}"
               pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
               title="الرجاء إدخال بريد إلكتروني صحيح (مثال: user@example.com)"
               required
               oninput="validateEmail(this)">
        <label for="email">البريد الإلكتروني</label>
        <div class="validation-icon"></div>
        @error('email')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <!-- Password -->
      <div class="row">
        <div class="input-field password-field">
          <input id="password" type="password" name="password" 
                 pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                 title="يجب أن تحتوي كلمة المرور على الأقل على 8 أحرف، حرف كبير، حرف صغير، رقم ورمز خاص"
                 required 
                 autocomplete="new-password"
                 oninput="checkPasswordStrength(this)">
          <label for="password">كلمة المرور</label>
          <div class="validation-icon"></div>
          <div class="password-strength">
            <div class="strength-bar"></div>
          </div>
          <div class="requirements">
            ✓ 8 أحرف على الأقل<br>
            ✓ حرف كبير وصغير<br>
            ✓ رقم واحد على الأقل<br>
            ✓ رمز خاص (@$!%*?&)
          </div>
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
        <div class="options-title">الجندر </div>
        <div class="options-group">
          <label for="male" class="option-label">
            <input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
            ذكر
          </label>

          <label for="female" class="option-label">
            <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
            أنثى
          </label>
        </div>
        @error('gender')
          <div class="input-error">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit">إنشاء حساب</button>
      
      <div class="login-link">
        لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a>
      </div>
    </form>
  </div>

  <script>
    // تحقق من صحة الإيميل
    function validateEmail(input) {
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      const field = input.closest('.email-field');
      const isValid = emailRegex.test(input.value);
      
      field.classList.remove('valid', 'invalid');
      
      if (input.value.length === 0) {
        return;
      }
      
      if (isValid) {
        field.classList.add('valid');
      } else {
        field.classList.add('invalid');
      }
    }
    
    // تحقق من قوة كلمة المرور
    function checkPasswordStrength(input) {
      const password = input.value;
      const field = input.closest('.password-field');
      const strengthBar = field.querySelector('.strength-bar');
      
      // التحقق من المتطلبات
      const hasLength = password.length >= 8;
      const hasLower = /[a-z]/.test(password);
      const hasUpper = /[A-Z]/.test(password);
      const hasNumber = /\d/.test(password);
      const hasSpecial = /[@$!%*?&]/.test(password);
      
      // حساب قوة كلمة المرور
      let strength = 0;
      if (hasLength) strength += 20;
      if (hasLower) strength += 20;
      if (hasUpper) strength += 20;
      if (hasNumber) strength += 20;
      if (hasSpecial) strength += 20;
      
      // تحديث شريط القوة
      strengthBar.style.width = strength + '%';
      
      // تغيير اللون حسب القوة
      if (strength < 40) {
        strengthBar.style.background = '#ff4444'; // ضعيف
      } else if (strength < 80) {
        strengthBar.style.background = '#ffbb33'; // متوسط
      } else {
        strengthBar.style.background = '#00C851'; // قوي
      }
      
      // التحقق من الصحة العامة
      const isValid = hasLength && hasLower && hasUpper && hasNumber && hasSpecial;
      field.classList.remove('valid', 'invalid');
      
      if (password.length === 0) {
        return;
      }
      
      if (isValid) {
        field.classList.add('valid');
      } else {
        field.classList.add('invalid');
      }
    }
    
    // تحقق من تطابق كلمتي المرور
    document.getElementById('password_confirmation').addEventListener('input', function() {
      const password = document.getElementById('password').value;
      const confirmPassword = this.value;
      const field = this.closest('.input-field');
      
      if (confirmPassword.length === 0) return;
      
      if (password === confirmPassword) {
        field.classList.add('valid');
        field.classList.remove('invalid');
      } else {
        field.classList.add('invalid');
        field.classList.remove('valid');
      }
    });
  </script>
</body>
</html>