<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | BeanVista</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#F8F1E8]">
    @include('includes.sidebar')
    
    <main id="dashboardMain" class="min-h-screen transition-all duration-300 lg:ml-64">
         @include('includes.header')

        {{-- Temporary mobile menu button --}}
        <button
            type="button"
            data-sidebar-toggle
            class="m-4 rounded-lg bg-[#211812] p-3 text-white lg:hidden"
            aria-label="Open sidebar">

            <svg xmlns="http://www.w3.org/2000/svg"
                 width="22" height="22" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round">
                <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>


@php
    $pageTitle = 'Admin Dashboard';
@endphp

<div class="flex-1 space-y-7 p-4 sm:p-6 lg:p-8">

    {{-- PAGE INTRODUCTION --}}
    <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-end">
        <div>
            <p class="mb-2 text-xs font-semibold uppercase tracking-[0.2em] text-[#A17A51]">
                Business Overview
            </p>

            <h2 class="font-serif text-3xl font-semibold text-[#211812]">
                Good day, {{ auth()->user()->name ?? 'Admin' }}.
            </h2>

            <p class="mt-2 text-sm text-[#927E6D]">
                Here's what's happening with your coffee shop today.
            </p>
        </div>

        <div class="flex items-center gap-2 self-start rounded-xl border border-[#E9DED1] bg-white px-3 py-2 text-xs text-[#796653] sm:self-auto">
            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
            Temporary Dashboard Data
        </div>
    </div>


    {{-- KPI CARDS --}}
    <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

        {{-- TOTAL SALES --}}
        <button
            type="button"
            data-kpi="sales"
            aria-pressed="true"
            class="kpi-card group rounded-2xl border border-[#C99A62] bg-[#2B1D15] p-5 text-left shadow-lg shadow-[#211812]/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
        >
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-[#D6C2AE]">Total Sales</p>
                    <h3 class="mt-3 text-2xl font-bold tracking-tight text-white sm:text-3xl">
                        ₱24,850.00
                    </h3>
                </div>

                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#C99A62]/15 text-[#E5BC8B]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                    </svg>
                </span>
            </div>

            <div class="mt-5 flex items-center justify-between">
                <span class="text-xs font-medium text-emerald-300">↑ 12.8% vs yesterday</span>
                <span class="text-xs text-[#C99A62]">View analytics ↗</span>
            </div>
        </button>


        {{-- TOTAL ORDERS --}}
        <button
            type="button"
            data-kpi="orders"
            aria-pressed="false"
            class="kpi-card group rounded-2xl border border-[#E9DED1] bg-white p-5 text-left transition-all duration-300 hover:-translate-y-1 hover:border-[#C99A62] hover:shadow-lg"
        >
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-[#927E6D]">Total Orders</p>
                    <h3 class="mt-3 text-2xl font-bold tracking-tight text-[#2B1D15] sm:text-3xl">
                        86
                    </h3>
                </div>

                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#F8F1E8] text-[#A17A51]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/>
                        <path d="M3 6h18M16 10a4 4 0 0 1-8 0"/>
                    </svg>
                </span>
            </div>

            <div class="mt-5 flex items-center justify-between">
                <span class="text-xs font-medium text-emerald-700">↑ 8.2% vs yesterday</span>
                <span class="text-xs text-[#A17A51]">View analytics ↗</span>
            </div>
        </button>


        {{-- INVENTORY VALUE --}}
        <button
            type="button"
            data-kpi="inventory"
            aria-pressed="false"
            class="kpi-card group rounded-2xl border border-[#E9DED1] bg-white p-5 text-left transition-all duration-300 hover:-translate-y-1 hover:border-[#C99A62] hover:shadow-lg"
        >
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-[#927E6D]">Inventory Value</p>
                    <h3 class="mt-3 text-2xl font-bold tracking-tight text-[#2B1D15] sm:text-3xl">
                        ₱184,500
                    </h3>
                </div>

                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#F8F1E8] text-[#A17A51]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m12 2 9 5-9 5-9-5 9-5Z"/>
                        <path d="m3 12 9 5 9-5M3 17l9 5 9-5"/>
                    </svg>
                </span>
            </div>

            <div class="mt-5 flex items-center justify-between">
                <span class="text-xs font-medium text-[#A17A51]">124 active products</span>
                <span class="text-xs text-[#A17A51]">View analytics ↗</span>
            </div>
        </button>


        {{-- LOW STOCK --}}
        <button
            type="button"
            data-kpi="lowstock"
            aria-pressed="false"
            class="kpi-card group rounded-2xl border border-[#E9DED1] bg-white p-5 text-left transition-all duration-300 hover:-translate-y-1 hover:border-[#C99A62] hover:shadow-lg"
        >
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-[#927E6D]">Low Stock Items</p>
                    <h3 class="mt-3 text-2xl font-bold tracking-tight text-[#B84A3A] sm:text-3xl">
                        8
                    </h3>
                </div>

                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#FFF1ED] text-[#B84A3A]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m12 3 10 18H2L12 3Z"/>
                        <path d="M12 9v4M12 17h.01"/>
                    </svg>
                </span>
            </div>

            <div class="mt-5 flex items-center justify-between">
                <span class="text-xs font-medium text-[#B84A3A]">Requires attention</span>
                <span class="text-xs text-[#A17A51]">View analytics ↗</span>
            </div>
        </button>

    </section>


    {{-- ANALYTICS CHART --}}
    <section class="overflow-hidden rounded-2xl border border-[#E9DED1] bg-white shadow-sm">

        <div class="flex flex-col justify-between gap-4 border-b border-[#F0E8DF] px-5 py-5 sm:flex-row sm:items-center sm:px-6">

            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.15em] text-[#A17A51]">
                    Analytics Overview
                </p>

                <h3 id="chartTitle" class="mt-1 font-serif text-xl font-semibold text-[#2B1D15]">
                    Sales Performance
                </h3>

                <p id="chartDescription" class="mt-1 text-sm text-[#927E6D]">
                    Daily revenue generated by the coffee shop.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-[#C99A62]"></span>
                <span id="chartPeriod" class="text-xs font-medium text-[#927E6D]">
                    Today
                </span>
            </div>

        </div>

        <div class="p-5 sm:p-6">

            <div id="chartWrapper"
     class="relative h-[280px] w-full translate-y-0 opacity-100 transition-all duration-300 sm:h-[340px]">
                <canvas id="adminAnalyticsChart"></canvas>
            </div>

            <div id="chartInsight" class="mt-5 flex items-start gap-3 rounded-xl bg-[#F8F1E8] p-4">
                <span class="mt-0.5 text-[#A17A51]">✦</span>
                <p class="text-sm leading-relaxed text-[#6F5542]">
                    Sales are performing well today. Revenue is up compared to yesterday.
                </p>
            </div>

        </div>

    </section>


    {{-- QUICK BUSINESS SUMMARY --}}
    <section class="grid grid-cols-1 gap-4 lg:grid-cols-2">

        <div class="rounded-2xl border border-[#E9DED1] bg-white p-5 sm:p-6">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-[#2B1D15]">Popular Products</h3>
                <span class="text-xs text-[#A17A51]">Today's sales</span>
            </div>

            <div class="mt-5 space-y-4">

                @foreach ([
                    ['name' => 'Caramel Macchiato', 'sold' => 32, 'percent' => 85],
                    ['name' => 'Spanish Latte', 'sold' => 27, 'percent' => 70],
                    ['name' => 'Americano', 'sold' => 19, 'percent' => 50],
                    ['name' => 'Matcha Latte', 'sold' => 14, 'percent' => 37],
                ] as $product)

                    <div>
                        <div class="mb-2 flex items-center justify-between gap-3 text-sm">
                            <span class="font-medium text-[#49372B]">
                                {{ $product['name'] }}
                            </span>
                            <span class="text-[#927E6D]">
                                {{ $product['sold'] }} sold
                            </span>
                        </div>

                        <div class="h-2 overflow-hidden rounded-full bg-[#F1E9DF]">
                            <div
                                class="h-full rounded-full bg-[#A17A51] transition-all duration-700"
                                style="width: {{ $product['percent'] }}%"
                            ></div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>


        <div class="rounded-2xl border border-[#E9DED1] bg-white p-5 sm:p-6">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-[#2B1D15]">Inventory Alerts</h3>
                <span class="rounded-full bg-[#FFF1ED] px-3 py-1 text-xs font-medium text-[#B84A3A]">
                    8 items
                </span>
            </div>

            <div class="mt-5 space-y-4">

                @foreach ([
                    ['name' => 'Arabica Coffee Beans', 'stock' => 3, 'unit' => 'kg'],
                    ['name' => 'Whole Milk', 'stock' => 4, 'unit' => 'liters'],
                    ['name' => 'Caramel Syrup', 'stock' => 5, 'unit' => 'bottles'],
                    ['name' => 'Paper Cups (12oz)', 'stock' => 8, 'unit' => 'packs'],
                ] as $item)

                    <div class="flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-medium text-[#49372B]">
                                {{ $item['name'] }}
                            </p>
                            <p class="mt-1 text-xs text-[#927E6D]">
                                Remaining stock
                            </p>
                        </div>

                        <span class="shrink-0 rounded-lg bg-[#FFF1ED] px-3 py-1.5 text-xs font-semibold text-[#B84A3A]">
                            {{ $item['stock'] }} {{ $item['unit'] }}
                        </span>
                    </div>

                @endforeach

            </div>
        </div>

    </section>

</div>

         @include('includes.footer')
    </main>

</body>
</html>