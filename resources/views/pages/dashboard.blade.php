@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Admin Dashboard')
@section('page-subtitle', 'Welcome back, ' . $user->name . '!')


@section('content')
<div class="flex flex-col flex-1 space-y-4 h-full">

  
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @php
            $cards = [
                ['title' => 'Total Vaccinations', 'icon' => 'vaccines', 'value' => '', 'extra' => '', 'color' => 'text-green-600'],
                ['title' => 'Upcoming Appointments', 'icon' => 'event_available', 'value' => '', 'extra' => '', 'color' => 'text-text-light/70'],
                ['title' => 'Registered Parents', 'icon' => 'person_add', 'value' => '', 'extra' => '', 'color' => 'text-green-600'],
                ['title' => 'Registered Babies', 'icon' => 'medication', 'value' => '', 'extra' => '', 'color' => 'text-danger'],
            ];
        @endphp

        @foreach($cards as $card)
        <div class="flex flex-col p-4 bg-surface-light dark:bg-surface-dark rounded-lg border border-border-light dark:border-border-dark">
            <div class="flex items-center justify-between">
                <h3 class="text-sm font-medium text-text-light/80 dark:text-text-dark/80">{{ $card['title'] }}</h3>
                <span class="material-symbols-outlined text-primary text-lg">{{ $card['icon'] }}</span>
            </div>
            <p class="text-2xl font-bold mt-1">{{ $card['value'] ?: '-' }}</p>
            <p class="mt-1 text-xs {{ $card['color'] }}">{{ $card['extra'] ?: '-' }}</p>
        </div>
        @endforeach
    </div>

   
    <div class="flex flex-col bg-surface-light dark:bg-surface-dark rounded-lg border border-border-light dark:border-border-dark flex-1">
        <div class="p-4 border-b border-border-light dark:border-border-dark">
            <h2 class="text-base font-bold">Upcoming Appointments (Today)</h2>
        </div>
        <div class="flex-1 overflow-x-auto">
            <table class="w-full text-left text-sm table-fixed border-collapse">
                <colgroup>
                    <col class="w-1/4">
                    <col class="w-1/4">
                    <col class="w-1/4">
                    <col class="w-1/4">
                </colgroup>
                <thead>
                    <tr class="bg-background-light dark:bg-background-dark text-text-light/60 dark:text-text-dark/60">
                        <th class="px-4 py-2 font-semibold uppercase tracking-wider text-center">Time</th>
                        <th class="px-4 py-2 font-semibold uppercase tracking-wider text-center">Baby Name</th>
                        <th class="px-4 py-2 font-semibold uppercase tracking-wider text-center">Vaccine</th>
                        <th class="px-4 py-2 font-semibold uppercase tracking-wider text-center">Dose</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-light dark:divide-border-dark">
                    {{-- Placeholder row --}}
                    <tr class="hover:bg-background-light dark:hover:bg-background-dark">
                        <td class="px-4 py-3 text-center text-text-light/80 dark:text-text-dark/80">-</td>
                        <td class="px-4 py-3 text-center text-text-light/80 dark:text-text-dark/80">-</td>
                        <td class="px-4 py-3 text-center text-text-light/80 dark:text-text-dark/80">-</td>
                        <td class="px-4 py-3 text-center text-text-light/80 dark:text-text-dark/80">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-2 border-t border-border-light dark:border-border-dark text-center">
            <a class="text-primary text-xs font-bold hover:underline" href="#">View All Appointments</a>
        </div>
    </div>
</div>
@endsection
