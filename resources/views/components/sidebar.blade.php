<aside class="flex flex-col w-64 h-screen bg-surface-light dark:bg-surface-dark border-r border-border-light dark:border-border-dark">
    <div class="flex flex-col justify-between p-4 h-full">
        <!-- Top section: Profile & Navigation -->
        <div class="flex flex-col gap-4">
            @php
                $user = Auth::user();
                $profileImage = $user->profile 
                    ? 'data:image/png;base64,' . base64_encode($user->profile) 
                    : null;
            @endphp

            <!-- Profile -->
            <div class="flex items-center gap-3 p-2">
                <!-- Profile image or placeholder -->
                @if($profileImage)
                    <img src="{{ $profileImage }}" alt="Profile" class="rounded-full w-10 h-10 object-cover">
                @else
                    <div class="bg-gray-300 dark:bg-gray-600 rounded-full w-10 h-10 flex items-center justify-center">
                        <span class="text-white font-bold">{{ strtoupper(substr($user->name,0,1)) }}</span>
                    </div>
                @endif
                <div class="flex flex-col">
                    <h1 class="text-text-light dark:text-text-dark text-base font-bold leading-normal">{{ $user->name }}</h1>
                    <p class="text-primary text-sm font-normal leading-normal">System Administrator</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex flex-col gap-2 mt-4">
                @php
                    $menuItems = [
                        ['route'=>'dashboard','icon'=>'dashboard','label'=>'Dashboard'],
                        ['route'=>'appointments','icon'=>'calendar_month','label'=>'Appointments'],
                        ['route'=>'users','icon'=>'group','label'=>'User Management'],
                        ['route'=>'vaccines','icon'=>'syringe','label'=>'Vaccine Inventory'],
                        ['route'=>'reports','icon'=>'bar_chart','label'=>'Reports'],
                    ];
                @endphp

                @foreach($menuItems as $item)
                    @php
                        $isActive = Request::routeIs($item['route']);
                    @endphp
                    <a href="{{ route($item['route']) }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-lg 
                       {{ $isActive ? 'bg-primary/20 text-primary font-bold' : 'hover:bg-primary/10 text-text-light/80 dark:text-text-dark/80' }}">
                        <span class="material-symbols-outlined" style="{{ $isActive ? "font-variation-settings: 'FILL' 1;" : "" }}">
                            {{ $item['icon'] }}
                        </span>
                        <p class="text-sm {{ $isActive ? 'font-bold' : 'font-medium' }}">{{ $item['label'] }}</p>
                    </a>
                @endforeach
            </nav>
        </div>

        <!-- Bottom section: Settings & Logout -->
        <div class="flex flex-col gap-1">
            @php
                $bottomMenu = [
                    ['route'=>'settings','icon'=>'settings','label'=>'Settings'],
                    ['route'=>'logout','icon'=>'logout','label'=>'Log Out','link'=>'#', 'onclick' => "event.preventDefault(); document.getElementById('logout-form').submit();"],
                ];
            @endphp
            @foreach($bottomMenu as $item)
                @php
                    $isActive = isset($item['route']) ? Request::routeIs($item['route']) : false;
                @endphp
                <a href="{{ $item['link'] ?? route($item['route']) }}" 
                   @if(isset($item['onclick'])) onclick="{{ $item['onclick'] }}" @endif
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10">
                    <span class="material-symbols-outlined">{{ $item['icon'] }}</span>
                    <p class="text-sm font-medium leading-normal">{{ $item['label'] }}</p>
                </a>
            @endforeach

            {{-- Logout form --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</aside>
