@extends('layouts.auth')

@section('title', 'Login')
@section('page-title', 'Admin Login')
@section('page-subtitle', "Welcome back! Please enter your credentials.")

@section('content')
<div class="flex flex-col items-center justify-center flex-1 gap-6">
    <div class="text-center">
        <div class="inline-flex items-center justify-center rounded-full bg-primary/10 p-4 mb-4">
            <span class="material-symbols-outlined text-primary text-3xl">syringe</span>
        </div>
        <h1 class="text-text-light dark:text-text-dark text-2xl font-bold tracking-tight">Admin Portal Access</h1>
        <p class="text-text-light/60 dark:text-text-dark/70 mt-2 text-sm">
            Welcome back! Please enter your credentials.
        </p>
    </div>

    <div class="w-full max-w-sm bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-border-dark p-6 sm:p-8 shadow-sm">

        {{-- Display validation errors --}}
        @if($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="flex flex-col gap-5">
            @csrf

            {{-- Email --}}
            <div class="flex flex-col gap-1.5">
                <label class="text-sm font-medium" for="email">Email</label>
                <div class="relative">
                    <span class="material-symbols-outlined pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-text-light/40 dark:text-text-dark/50 text-base">
                        mail
                    </span>
                    <input type="email" name="email" id="email" placeholder="you@example.com" required
                           value="{{ old('email') }}"
                           class="w-full rounded-lg border border-border-light bg-background-light py-2.5 pl-10 pr-4 text-sm placeholder:text-text-light/50 focus:border-primary focus:ring-0 focus:shadow-input-focus dark:border-border-dark dark:bg-background-dark dark:placeholder:text-text-dark/50">
                </div>
            </div>

            {{-- Password --}}
            <div class="flex flex-col gap-1.5">
                <div class="flex justify-between items-center">
                    <label class="text-sm font-medium" for="password">Password</label>
                    <a href="#" class="text-primary text-sm font-medium hover:underline">Forgot?</a>
                </div>
                <div class="relative">
                    <span class="material-symbols-outlined pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-text-light/40 dark:text-text-dark/50 text-base">
                        lock
                    </span>
                    <input type="password" name="password" id="password" placeholder="••••••••" required
                           class="w-full rounded-lg border border-border-light bg-background-light py-2.5 pl-10 pr-4 text-sm placeholder:text-text-light/50 focus:border-primary focus:ring-0 focus:shadow-input-focus dark:border-border-dark dark:bg-background-dark dark:placeholder:text-text-dark/50">
                </div>
            </div>

            {{-- Submit button --}}
            <button type="submit" class="flex h-10 w-full items-center justify-center rounded-lg bg-primary text-white text-sm font-semibold hover:bg-primary/90 transition-colors focus:outline-none focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 dark:focus:ring-offset-surface-dark">
                Login
            </button>
        </form>
    </div>

    <p class="text-xs text-text-light/60 dark:text-text-dark/60 text-center">
        © 2024 National Vaccination Program
    </p>
</div>
@endsection
