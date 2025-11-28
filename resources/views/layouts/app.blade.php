<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Dashboard') - Vaccination System Admin</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4A90E2",
                        "secondary": "#50E3C2",
                        "danger": "#D0021B",
                        "warning": "#F5A623",
                        "success": "#7ED321",
                        "background-light": "#F4F7FA",
                        "background-dark": "#101827",
                        "border-light": "#E0E6ED",
                        "border-dark": "#334155",
                        "text-light": "#4A4A4A",
                        "text-dark": "#E0E6ED",
                        "surface-light": "#FFFFFF",
                        "surface-dark": "#1E293B",
                    },
                    fontFamily: { "display": ["Manrope", "sans-serif"] },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-size: 24px;
        }
    </style>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark">
    <div class="flex h-screen w-full">

        {{-- Sidebar --}}
        @include('components.sidebar') {{-- Make sure sidebar has class h-full --}}

        {{-- Main content --}}
        <main class="flex-1 flex flex-col p-6 lg:p-8 overflow-y-auto">
            <header class="flex flex-wrap justify-between items-center gap-4 mb-6">
                <div class="flex flex-col gap-1">
                    <h1 class="text-text-light dark:text-text-dark text-3xl font-bold tracking-tight">
                        @yield('page-title', 'Dashboard')
                    </h1>
                    <p class="text-text-light/70 dark:text-text-dark/70 text-base font-normal leading-normal">
                        @yield('page-subtitle', "Welcome back!")
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark px-4">
                        <span class="material-symbols-outlined text-text-light/70 dark:text-text-dark/70" style="font-size: 20px;">calendar_today</span>
                        <p class="text-sm font-medium leading-normal">Today</p>
                        <span class="material-symbols-outlined text-text-light/70 dark:text-text-dark/70" style="font-size: 20px;">expand_more</span>
                    </button>
                </div>
            </header>

            {{-- Page content --}}
            @yield('content')
        </main>
    </div>
</body>
</html>
