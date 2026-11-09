
@php
    $role = auth()->user()->role ?? 'user';

    $navigation = [
        'admin' => [
            [
                'label' => 'Dashboard',
                'url' => '/admin/dashboard',
                'active' => 'admin/dashboard*',
                'icon' => 'dashboard',
            ],
            [
                'label' => 'Orders',
                'url' => '/admin/orders',
                'active' => 'admin/orders*',
                'icon' => 'orders',
            ],
            [
                'label' => 'Products',
                'url' => '/admin/products',
                'active' => 'admin/products*',
                'icon' => 'products',
            ],
            [
                'label' => 'Categories',
                'url' => '/admin/categories',
                'active' => 'admin/categories*',
                'icon' => 'categories',
            ],
            [
                'label' => 'Inventory',
                'url' => '/admin/inventory',
                'active' => 'admin/inventory*',
                'icon' => 'inventory',
            ],
            [
                'label' => 'Users',
                'url' => '/admin/users',
                'active' => 'admin/users*',
                'icon' => 'users',
            ],
            [
                'label' => 'Reports',
                'url' => '/admin/reports',
                'active' => 'admin/reports*',
                'icon' => 'reports',
            ],
            [
                'label' => 'Settings',
                'url' => '/admin/settings',
                'active' => 'admin/settings*',
                'icon' => 'settings',
            ],
        ],

        'staff' => [
            [
                'label' => 'Dashboard',
                'url' => '/staff/dashboard',
                'active' => 'staff/dashboard*',
                'icon' => 'dashboard',
            ],
            [
                'label' => 'Orders',
                'url' => '/staff/orders',
                'active' => 'staff/orders*',
                'icon' => 'orders',
            ],
            [
                'label' => 'Products',
                'url' => '/staff/products',
                'active' => 'staff/products*',
                'icon' => 'products',
            ],
            [
                'label' => 'Inventory',
                'url' => '/staff/inventory',
                'active' => 'staff/inventory*',
                'icon' => 'inventory',
            ],
            [
                'label' => 'My Profile',
                'url' => '/staff/profile',
                'active' => 'staff/profile*',
                'icon' => 'users',
            ],
        ],

        'user' => [
            [
                'label' => 'Dashboard',
                'url' => '/menu',
                'active' => 'menu',
                'icon' => 'dashboard',
            ],
            [
                'label' => 'Browse Menu',
                'url' => '/menu',
                'active' => 'menu*',
                'icon' => 'products',
            ],
            [
                'label' => 'My Orders',
                'url' => '/customer/orders',
                'active' => 'customer/orders*',
                'icon' => 'orders',
            ],
            [
                'label' => 'My Profile',
                'url' => '/customer/profile',
                'active' => 'customer/profile*',
                'icon' => 'users',
            ],
        ],
    ];

    $menuItems = $navigation[$role] ?? $navigation['user'];
@endphp

{{-- Mobile backdrop --}}
<div
    id="sidebarBackdrop"
    class="fixed inset-0 z-40 hidden bg-black/50 backdrop-blur-sm lg:hidden"
    data-sidebar-close>
</div>

{{-- Sidebar --}}
<aside
    id="appSidebar"
    class="fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full flex-col
           border-r border-white/10 bg-[#211812] text-[#F8F1E8]
           transition-all duration-300 ease-in-out
           lg:translate-x-0"
>

    {{-- Brand --}}
    <div class="flex h-20 items-center justify-between border-b border-white/10 px-5">

        <a href="{{ $role === 'admin' ? '/admin/dashboard' : ($role === 'staff' ? '/staff/dashboard' : '/menu') }}"
           class="flex min-w-0 items-center gap-3">

            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#C99A62] text-[#211812]">
                <svg xmlns="http://www.w3.org/2000/svg"
                     width="23" height="23" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path d="M10 2v2"/>
                    <path d="M14 2v2"/>
                    <path d="M4 8h16l-1.2 11H5.2L4 8Z"/>
                    <path d="M20 11h1a2 2 0 0 1 0 4h-2"/>
                    <path d="M8 12c0 1 1 1 1 2"/>
                    <path d="M12 12c0 1 1 1 1 2"/>
                </svg>
            </div>

            <div class="sidebar-label min-w-0">
                <h1 class="truncate font-serif text-lg font-semibold tracking-wide">
                    BeanVista
                </h1>
                <p class="text-[10px] uppercase tracking-[0.2em] text-[#C99A62]">
                    Coffee Co.
                </p>
            </div>

        </a>

        {{-- Mobile close --}}
        <button
            type="button"
            class="rounded-lg p-2 text-[#C5B6A5] hover:bg-white/10 lg:hidden"
            data-sidebar-close
            aria-label="Close sidebar">

            <svg xmlns="http://www.w3.org/2000/svg"
                 width="20" height="20" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round">
                <path d="m18 6-12 12M6 6l12 12"/>
            </svg>
        </button>

        {{-- Desktop collapse --}}
        <button
            type="button"
            class="hidden rounded-lg p-2 text-[#C5B6A5] transition hover:bg-white/10 hover:text-white lg:block"
            data-sidebar-toggle
            aria-label="Collapse sidebar"
            aria-expanded="true">

            <svg xmlns="http://www.w3.org/2000/svg"
                 width="19" height="19" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor"
                 stroke-width="1.8" stroke-linecap="round"
                 stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="16" rx="2"/>
                <path d="M9 4v16"/>
                <path d="m14 9-2 3 2 3"/>
            </svg>
        </button>

    </div>

    {{-- Navigation --}}
    <nav class="flex-1 space-y-2 overflow-y-auto px-3 py-6">

        <p class="sidebar-label mb-4 px-3 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#907C6B]">
            Main Menu
        </p>

        @foreach ($menuItems as $item)

            @php
                $isActive = request()->is($item['active']);
            @endphp

            <a
                href="{{ url($item['url']) }}"
                title="{{ $item['label'] }}"
                class="group flex items-center gap-3 rounded-xl px-3 py-3
                       transition-all duration-200
                       {{ $isActive
                            ? 'bg-[#C99A62] text-[#211812] shadow-lg shadow-black/10'
                            : 'text-[#C5B6A5] hover:bg-white/10 hover:text-white' }}"
            >

                {{-- Icons --}}
                <span class="flex h-5 w-5 shrink-0 items-center justify-center">

                    @switch($item['icon'])

                        @case('dashboard')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="8" height="8" rx="1"/>
                                <rect x="13" y="3" width="8" height="5" rx="1"/>
                                <rect x="13" y="10" width="8" height="11" rx="1"/>
                                <rect x="3" y="13" width="8" height="8" rx="1"/>
                            </svg>
                            @break

                        @case('orders')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 2h12v20H6z"/>
                                <path d="M9 7h6M9 11h6M9 15h4"/>
                            </svg>
                            @break

                        @case('products')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m12 2 9 5-9 5-9-5 9-5Z"/>
                                <path d="m3 12 9 5 9-5"/>
                                <path d="m3 17 9 5 9-5"/>
                            </svg>
                            @break

                        @case('categories')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="7" height="7" rx="1"/>
                                <rect x="14" y="3" width="7" height="7" rx="1"/>
                                <rect x="14" y="14" width="7" height="7" rx="1"/>
                                <rect x="3" y="14" width="7" height="7" rx="1"/>
                            </svg>
                            @break

                        @case('inventory')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 7h18v14H3z"/>
                                <path d="M3 7 5 3h14l2 4"/>
                                <path d="M9 12h6"/>
                            </svg>
                            @break

                        @case('users')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="10" cy="7" r="4"/>
                                <path d="M20 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                            @break

                        @case('reports')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3v18h18"/>
                                <path d="m19 9-5 5-4-4-5 5"/>
                            </svg>
                            @break

                        @case('settings')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="m19.4 15 .1.1 1.4 1.1-1.4 2.4-1.7-.6a8 8 0 0 1-1.7 1l-.3 1.8h-2.8l-.3-1.8a8 8 0 0 1-1.7-1l-1.7.6-1.4-2.4 1.4-1.1a8 8 0 0 1 0-2l-1.4-1.1 1.4-2.4 1.7.6a8 8 0 0 1 1.7-1l.3-1.8h2.8l.3 1.8a8 8 0 0 1 1.7 1l1.7-.6 1.4 2.4-1.4 1.1a8 8 0 0 1 0 2Z"/>
                            </svg>
                            @break

                    @endswitch

                </span>

                <span class="sidebar-label flex-1 text-sm font-medium">
                    {{ $item['label'] }}
                </span>

                @if($isActive)
                    <span class="sidebar-label h-1.5 w-1.5 rounded-full bg-current"></span>
                @endif

            </a>

        @endforeach

    </nav>

    {{-- Sidebar bottom --}}
    <div class="border-t border-white/10 p-4">

        <div class="sidebar-label rounded-xl bg-white/5 p-3">
            <p class="text-xs font-medium text-[#F8F1E8]">
                BeanVista Coffee Co.
            </p>
            <p class="mt-1 text-[10px] text-[#907C6B]">
                {{ ucfirst($role) }} Workspace
            </p>
        </div>

    </div>

</aside>
