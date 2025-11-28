@extends('layouts.app')

@section('title', 'Appointments')
@section('page-title', 'Appointments')
@section('page-subtitle', 'Manage vaccination appointments.')

@section('content')
<div class="flex flex-col flex-1 gap-4 h-full">

    {{-- Filters and Calendar --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="lg:col-span-1 flex flex-col gap-4">

            {{-- Calendar --}}
            <div class="bg-surface-light dark:bg-surface-dark rounded-lg border border-border-light dark:border-border-dark p-4">
                <h2 class="text-sm font-bold mb-2">Calendar</h2>
                <div class="grid grid-cols-7 text-center text-sm font-medium gap-1">
                    @foreach(['Su','Mo','Tu','We','Th','Fr','Sa'] as $day)
                        <div class="text-text-light/60 dark:text-text-dark/60 py-1.5">{{ $day }}</div>
                    @endforeach
                    {{-- Empty calendar for now --}}
                    @for($i = 1; $i <= 30; $i++)
                        <div class="py-1.5 h-8 w-8 flex items-center justify-center text-sm"></div>
                    @endfor
                </div>
            </div>

            {{-- Filters --}}
            <div class="bg-surface-light dark:bg-surface-dark rounded-lg border border-border-light dark:border-border-dark p-4">
                <h2 class="text-sm font-bold mb-2">Filters</h2>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-text-light/80 dark:text-text-dark/80" for="patient-search">Patient</label>
                        <div class="relative mt-1">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-text-light/50 dark:text-text-dark/50 text-base">search</span>
                            <input type="text" id="patient-search" placeholder="Name or ID"
                                   class="w-full h-9 pl-9 pr-3 text-sm bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark rounded-lg focus:ring-primary focus:border-primary">
                        </div>
                    </div>
                    <button class="w-full h-9 text-sm font-bold text-white bg-primary rounded-lg hover:bg-primary/90">Apply</button>
                </div>
            </div>
        </div>

        {{-- Appointments Table --}}
        <div class="lg:col-span-2 flex flex-col bg-surface-light dark:bg-surface-dark rounded-lg border border-border-light dark:border-border-dark">
            <div class="p-4 border-b border-border-light dark:border-border-dark">
                <h2 class="text-sm font-bold">Appointments</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm table-fixed border-collapse border border-border-light dark:border-border-dark">
                    <colgroup>
                        <col class="w-1/4">
                        <col class="w-1/4">
                        <col class="w-1/4">
                        <col class="w-1/4">
                    </colgroup>
                    <thead>
                        <tr class="bg-background-light dark:bg-background-dark text-text-light/60 dark:text-text-dark/60">
                            <th class="px-4 py-2 font-semibold uppercase tracking-wider text-center">Time</th>
                            <th class="px-4 py-2 font-semibold uppercase tracking-wider text-center">Baby</th>
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
        </div>
    </div>
</div>
@endsection
