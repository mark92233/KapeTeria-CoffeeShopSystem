
@php
    $currentUser = auth()->user();
    $userName = $currentUser->name ?? 'User';
    $userRole = $currentUser->role ?? 'user';
    $initial = strtoupper(substr($userName, 0, 1));
@endphp

<header class="sticky top-0 z-30 border-b border-[#E9DED1] bg-[#F8F1E8]/95 backdrop-blur-md">

    <div class="flex h-[76px] items-center justify-between px-4 sm:px-6 lg:px-8">

        {{-- LEFT SECTION --}}
        <div class="flex min-w-0 items-center gap-4">

            {{-- Sidebar Toggle --}}
            <button
                type="button"
                data-sidebar-toggle
                aria-label="Toggle sidebar"
                aria-expanded="true"
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-[#49372B] transition hover:bg-[#EDE2D5]"
            >
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="22" height="22" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            {{-- Page Information --}}
            <div class="min-w-0">
                <div class="hidden items-center gap-2 text-xs text-[#9B8877] sm:flex">
                    <span>BeanVista</span>
                    <span>/</span>
                    <span class="capitalize">{{ $userRole }}</span>
                    <span>/</span>
                    <span class="font-medium text-[#6F5542]">
                        {{ $pageTitle ?? 'Dashboard' }}
                    </span>
                </div>

                <h1 class="truncate text-lg font-semibold text-[#2B1D15] sm:text-xl">
                    {{ $pageTitle ?? 'Dashboard' }}
                </h1>
            </div>

        </div>


        {{-- RIGHT SECTION --}}
        <div class="flex items-center gap-2 sm:gap-4">

            {{-- Notifications --}}
            <div class="relative">

                <button
                    type="button"
                    data-header-dropdown="notifications"
                    aria-label="Notifications"
                    aria-expanded="false"
                    class="relative flex h-10 w-10 items-center justify-center rounded-xl text-[#6F5542] transition hover:bg-[#EDE2D5]"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                        width="21" height="21" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor"
                        stroke-width="1.7" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                        <path d="M10 21h4"/>
                    </svg>

                    {{-- Notification Indicator --}}
                    <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-[#B84A3A] ring-2 ring-[#F8F1E8]"></span>
                </button>

                {{-- Notification Dropdown --}}
                <div
                    data-dropdown-panel="notifications"
                    class="absolute right-0 top-14 hidden w-[min(320px,calc(100vw-2rem))] overflow-hidden rounded-2xl border border-[#E9DED1] bg-white shadow-xl"
                >
                    <div class="flex items-center justify-between border-b border-[#F0E8DF] px-4 py-3">
                        <h3 class="font-semibold text-[#2B1D15]">Notifications</h3>
                        <span class="text-xs text-[#A18C79]">Recent activity</span>
                    </div>

                    <div class="px-4 py-8 text-center">
                        <div class="mx-auto mb-3 flex h-11 w-11 items-center justify-center rounded-full bg-[#F8F1E8] text-[#A17A51]">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="21" height="21" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor"
                                stroke-width="1.7" stroke-linecap="round">
                                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                                <path d="M10 21h4"/>
                            </svg>
                        </div>

                        <p class="text-sm font-medium text-[#49372B]">
                            You're all caught up!
                        </p>
                        <p class="mt-1 text-xs text-[#A18C79]">
                            New notifications will appear here.
                        </p>
                    </div>
                </div>

            </div>


            {{-- Profile Dropdown --}}
            <div class="relative">

                <button
                    type="button"
                    data-header-dropdown="profile"
                    aria-expanded="false"
                    class="flex items-center gap-2 rounded-xl p-1.5 transition hover:bg-[#EDE2D5] sm:gap-3 sm:px-2"
                >
                    {{-- Avatar --}}
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-[#3B281D] text-sm font-semibold text-[#EAD0A8]">
                        {{ $initial }}
                    </div>

                    {{-- User Details --}}
                    <div class="hidden text-left sm:block">
                        <p class="max-w-[130px] truncate text-sm font-semibold text-[#2B1D15]">
                            {{ $userName }}
                        </p>
                        <p class="text-xs capitalize text-[#9B8877]">
                            {{ $userRole }}
                        </p>
                    </div>

                    {{-- Chevron --}}
                    <svg class="hidden text-[#9B8877] sm:block"
                        xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </button>


                {{-- Profile Menu --}}
                <div
                    data-dropdown-panel="profile"
                    class="absolute right-0 top-14 hidden w-56 overflow-hidden rounded-2xl border border-[#E9DED1] bg-white shadow-xl"
                >

                    <div class="border-b border-[#F0E8DF] px-4 py-4">
                        <p class="truncate text-sm font-semibold text-[#2B1D15]">
                            {{ $userName }}
                        </p>
                        <p class="truncate text-xs text-[#9B8877]">
                            {{ $currentUser->email ?? '' }}
                        </p>
                    </div>

                    <div class="p-2">

                        <a href="#"
                            class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#6F5542] transition hover:bg-[#F8F1E8]">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="17" height="17" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor"
                                stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="8" r="4"/>
                                <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                            </svg>
                            My Profile
                        </a>

                        <a href="#"
                            class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-[#6F5542] transition hover:bg-[#F8F1E8]">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="17" height="17" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor"
                                stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.7 2.9-.2-.1a1.7 1.7 0 0 0-1.8.2l-.2.1h-3.4l-.1-.2a1.7 1.7 0 0 0-1.6-1l-.2.1-2.9-1.7.1-.2a1.7 1.7 0 0 0-.2-1.8l-.1-.2v-3.4l.2-.1a1.7 1.7 0 0 0 1-1.6l-.1-.2 1.7-2.9.2.1a1.7 1.7 0 0 0 1.8-.2l.2-.1h3.4l.1.2a1.7 1.7 0 0 0 1.6 1l.2-.1 2.9 1.7-.1.2a1.7 1.7 0 0 0 .2 1.8l.1.2v3.4z"/>
                            </svg>
                            Settings
                        </a>

                    </div>

                    <div class="border-t border-[#F0E8DF] p-2">

                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-[#B84A3A] transition hover:bg-[#FFF1ED]">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="17" height="17" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor"
                                    stroke-width="1.7" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <path d="M16 17l5-5-5-5"/>
                                    <path d="M21 12H9"/>
                                </svg>
                                Logout
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>
