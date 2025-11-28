<header class="flex flex-wrap justify-between items-center gap-4 mb-6">
    <div class="flex flex-col gap-1">
        <h1 class="text-text-light dark:text-text-dark text-3xl font-bold tracking-tight">@yield('page-title', 'Dashboard')</h1>
        <p class="text-text-light/70 dark:text-text-dark/70 text-base font-normal leading-normal">@yield('page-subtitle', 'Welcome back!')</p>
    </div>
    <div class="flex items-center gap-3">
        <button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark px-4">
            <span class="material-symbols-outlined text-text-light/70 dark:text-text-dark/70" style="font-size: 20px;">calendar_today</span>
            <p class="text-sm font-medium leading-normal">Today</p>
            <span class="material-symbols-outlined text-text-light/70 dark:text-text-dark/70" style="font-size: 20px;">expand_more</span>
        </button>
    </div>
</header>
