<x-guest-layout>
    <style>
        .field-label{display:block;font-size:12.5px;font-weight:600;color:#1D4A43;margin-bottom:6px;letter-spacing:.2px;}
        .field-input{
            width:100%;padding:11px 14px;font-size:14px;
            border:1px solid rgba(29,74,67,0.18);border-radius:3px;
            background:#fff;color:#1a1a1a;
            transition:border-color .25s;
        }
        .field-input:focus{outline:none;border-color:#CC9966;box-shadow:0 0 0 3px rgba(204,153,102,0.15);}
        .field-error{color:#b3452f;font-size:12.5px;margin-top:6px;}
        .auth-btn{
            width:100%;padding:12px;font-size:14px;font-weight:600;
            background:#1D4A43;color:#F6E6D8;border-radius:3px;
            border:none;cursor:pointer;transition:background .25s;
            margin-top:8px;
        }
        .auth-btn:hover{background:#123430;}
        .auth-check{display:flex;align-items:center;gap:8px;font-size:13px;color:#5a5a56;}
        .auth-link{font-size:13px;color:#8a6a3c;font-weight:500;}
        .auth-link:hover{text-decoration:underline;}
    </style>

    @if (session('status'))
        <div class="mb-4 text-sm font-medium" style="color:#4a7a4a;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="field-label">Email</label>
            <input id="email" class="field-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@email.com">
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="field-label">Password</label>
            <input id="password" class="field-input" type="password" name="password" required autocomplete="current-password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between mb-2">
            <label class="auth-check">
                <input type="checkbox" name="remember" style="accent-color:#CC9966;">
                Ingat saya
            </label>

            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">Lupa password?</a>
            @endif
        </div>

        <button type="submit" class="auth-btn">Masuk</button>
    </form>
</x-guest-layout>