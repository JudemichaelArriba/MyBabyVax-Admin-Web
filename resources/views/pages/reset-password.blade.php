@extends('layouts.auth')

@section('title', 'Reset Password')
@section('page-title', 'Reset Password')
@section('page-subtitle', "Set a new password for your account.")

@section('content')
<div class="flex flex-col items-center justify-center flex-1 gap-6">

    <div class="text-center">
        <div class="inline-flex items-center justify-center rounded-full bg-primary/10 p-4 mb-4">
            <span class="material-symbols-outlined text-primary text-3xl">lock_reset</span>
        </div>
        <h1 class="text-text-light dark:text-text-dark text-2xl font-bold tracking-tight">Reset Password</h1>
        <p class="text-text-light/60 dark:text-text-dark/70 mt-2 text-sm">
            Set a new password for your account.
        </p>
    </div>

    <div class="w-full max-w-sm bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-border-dark p-6 sm:p-8 shadow-sm">

       
        @if(session('status'))
            <div class="mb-4 text-green-500 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST" class="flex flex-col gap-5" id="reset-password-form">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

      
            <div class="flex flex-col gap-1.5">
                <label class="text-sm font-medium" for="password">New Password</label>
                <input type="password" name="password" placeholder="Enter new password" required
                       class="w-full rounded-lg border border-border-light bg-background-light py-2.5 px-4 text-sm placeholder:text-text-light/50 focus:border-primary focus:ring-0 focus:shadow-input-focus dark:border-border-dark dark:bg-background-dark dark:placeholder:text-text-dark/50">
            </div>

        
            <div class="flex flex-col gap-1.5">
                <label class="text-sm font-medium" for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm new password" required
                       class="w-full rounded-lg border border-border-light bg-background-light py-2.5 px-4 text-sm placeholder:text-text-light/50 focus:border-primary focus:ring-0 focus:shadow-input-focus dark:border-border-dark dark:bg-background-dark dark:placeholder:text-text-dark/50">
                {{-- Validation errors for both fields --}}
                @if($errors->has('password') || $errors->has('password_confirmation'))
                    <span class="text-red-500 text-xs mt-1">
                        {{ $errors->first('password') ?? $errors->first('password_confirmation') }}
                    </span>
                @endif
            </div>

        
            <button type="submit" id="reset-button"
                    class="flex h-10 w-full items-center justify-center rounded-lg bg-primary text-white text-sm font-semibold hover:bg-primary/90 transition-colors">
                <svg id="reset-spinner" class="hidden animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
                <span id="reset-button-text">Reset Password</span>
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-sm font-medium text-primary hover:underline inline-flex items-center gap-1">
                <span class="material-symbols-outlined" style="font-size: 16px;">arrow_back</span>
                Back to Login
            </a>
        </div>
    </div>
</div>


<script>
    const resetForm = document.getElementById('reset-password-form');
    const resetButton = document.getElementById('reset-button');
    const resetSpinner = document.getElementById('reset-spinner');
    const resetButtonText = document.getElementById('reset-button-text');

    resetForm.addEventListener('submit', function() {
        resetButton.disabled = true;
        resetSpinner.classList.remove('hidden');
        resetButtonText.classList.add('hidden');
    });
</script>
@endsection
