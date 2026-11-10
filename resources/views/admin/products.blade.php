
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Products | BeanVista Coffee Co.</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }

        .product-card {
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 40px rgba(43, 29, 21, .09);
            border-color: #D9C4AA;
        }

        .filter-button {
            border: 1px solid #E8DED2;
            color: #927E6D;
            background: white;
            transition: .2s;
        }

        .filter-button:hover {
            border-color: #C99A62;
            color: #2B1D15;
        }

        .filter-button.active {
            background: #2B1D15;
            color: #F8F1E8;
            border-color: #2B1D15;
        }

        .availability-switch {
            width: 39px;
            height: 22px;
            border-radius: 999px;
            background: #D8CEC3;
            position: relative;
            transition: background .2s ease;
            flex-shrink: 0;
        }

        .availability-switch::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: white;
            transition: transform .2s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,.15);
        }

        .availability-switch.is-active {
            background: #66845F;
        }

        .availability-switch.is-active::after {
            transform: translateX(17px);
        }

        .availability-switch:disabled {
            opacity: .5;
            cursor: wait;
        }

        .product-image {
            background:
                radial-gradient(circle at 75% 20%, rgba(201,154,98,.20), transparent 35%),
                #F3E8DA;
        }

        .list-row {
            transition: background .2s ease;
        }

        .list-row:hover {
            background: #FFFCF8;
        }

        .toast-enter {
            animation: toastIn .25s ease forwards;
        }

        @keyframes toastIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .soft-scroll::-webkit-scrollbar {
            height: 5px;
            width: 5px;
        }

        .soft-scroll::-webkit-scrollbar-thumb {
            background: #D9C7B3;
            border-radius: 99px;
        }
    </style>
</head>

<body class="bg-[#F8F1E8] text-[#2B1D15]">

    @php
        $pageTitle = 'Products';
    @endphp

    @include('includes.sidebar')

    <main id="dashboardMain" class="min-h-screen flex flex-col transition-all duration-300 lg:ml-64">

        @include('includes.header')

        <div class="flex-1 p-5 md:p-8">

            {{-- PAGE INTRO --}}
            <section class="mb-8">
                <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">

                    <div>

                        <h1 class="font-serif text-3xl font-semibold tracking-tight text-[#2B1D15] md:text-4xl">
                            The Product <span class="italic text-[#B48A5B]">Collection.</span>
                        </h1>

                        <p class="mt-2 max-w-xl text-sm leading-relaxed text-[#927E6D]">
                            Every cup, every detail. Manage your menu and decide what your customers can order today.
                        </p>
                    </div>

                    <a href="{{ route('admin.inventory') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#2B1D15] px-5 py-3 text-xs font-semibold text-[#F8F1E8] shadow-sm transition hover:bg-[#493124]">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14"/>
                        </svg>
                        Register New Product
                    </a>

                </div>
            </section>

            {{-- SUMMARY --}}
            <section class="mb-7 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

                <div class="relative overflow-hidden rounded-2xl bg-[#2B1D15] p-5 text-[#F8F1E8]">
                    <div class="absolute -right-5 -top-7 h-28 w-28 rounded-full border border-white/10"></div>
                    <div class="absolute -right-1 -top-3 h-20 w-20 rounded-full border border-white/10"></div>

                    <div class="relative flex items-start justify-between">
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[.16em] text-[#C7B5A2]">
                                Total Products
                            </p>
                            <p class="mt-3 font-serif text-3xl font-semibold">
                                {{ number_format($totalProducts) }}
                            </p>
                            <p class="mt-2 text-[10px] text-[#BBAA98]">
                                Registered menu items
                            </p>
                        </div>

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10">
                            <svg width="19" height="19" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.7">
                                <path d="M4 7h16M4 12h16M4 17h10"/>
                                <rect x="2.5" y="3" width="19" height="18" rx="3"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-[#EADFD2] bg-white p-5">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[.14em] text-[#927E6D]">
                                Available
                            </p>
                            <p id="availableCount" class="mt-3 font-serif text-3xl font-semibold text-[#55734F]">
                                {{ number_format($availableProducts) }}
                            </p>
                            <p class="mt-2 text-[10px] text-[#927E6D]">
                                Ready for ordering
                            </p>
                        </div>

                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EAF2E9] text-[#55734F]">
                            <svg width="19" height="19" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="m5 12 4 4L19 6"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="rounded-2xl border border-[#EADFD2] bg-white p-5">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[.14em] text-[#927E6D]">
                                Unavailable
                            </p>
                            <p id="unavailableCount" class="mt-3 font-serif text-3xl font-semibold text-[#B36B52]">
                                {{ number_format($unavailableProducts) }}
                            </p>
                            <p class="mt-2 text-[10px] text-[#927E6D]">
                                Hidden from ordering
                            </p>
                        </div>

                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F8EDE8] text-[#B36B52]">
                            <svg width="19" height="19" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.7">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="m9 9 6 6m0-6-6 6"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="rounded-2xl border border-[#EADFD2] bg-white p-5">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[.14em] text-[#927E6D]">
                                Categories
                            </p>
                            <p class="mt-3 font-serif text-3xl font-semibold">
                                {{ $categories->count() }}
                            </p>
                            <p class="mt-2 text-[10px] text-[#927E6D]">
                                Product classifications
                            </p>
                        </div>

                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F8F1E8] text-[#A47C50]">
                            <svg width="19" height="19" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.7">
                                <path d="M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z"/>
                            </svg>
                        </span>
                    </div>
                </div>

            </section>

            {{-- CATALOG PANEL --}}
            <section class="overflow-hidden rounded-2xl border border-[#EADFD2] bg-white">

                {{-- Toolbar --}}
                <div class="border-b border-[#F0E9E0] p-5 md:p-6">

                    <div class="mb-5 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h2 class="font-serif text-xl font-semibold">Menu Catalog</h2>
                            <p class="mt-1 text-[11px] text-[#927E6D]">
                                Browse, filter, and manage your registered products.
                            </p>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="text-[10px] text-[#927E6D]">
                                Showing <strong id="visibleCount">{{ $products->count() }}</strong> items
                            </span>

                            <div class="flex rounded-lg border border-[#E8DED2] bg-[#FFFCF8] p-1">
                                <button type="button" id="gridViewButton"
                                    class="rounded-md bg-[#2B1D15] p-2 text-white"
                                    aria-label="Grid view">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.8">
                                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                                    </svg>
                                </button>

                                <button type="button" id="listViewButton"
                                    class="rounded-md p-2 text-[#927E6D] hover:bg-[#F3EDE5]"
                                    aria-label="List view">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.8">
                                        <path d="M8 6h13M8 12h13M8 18h13"/>
                                        <path d="M3 6h.01M3 12h.01M3 18h.01"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Search + filters --}}
                    <div class="flex flex-col gap-3 lg:flex-row">

                        <div class="relative flex-1">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-[#A99784]"
                                width="17" height="17" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.8">
                                <circle cx="11" cy="11" r="7"/>
                                <path d="m16 16 4 4"/>
                            </svg>

                            <input type="search" id="productSearch"
                                class="w-full rounded-xl border border-[#E8DED2] bg-[#FFFCF8] py-3 pl-11 pr-4 text-xs outline-none transition placeholder:text-[#B5A797] focus:border-[#C99A62] focus:ring-2 focus:ring-[#C99A62]/10"
                                placeholder="Search product name or product code...">
                        </div>

                        <select id="categoryFilter"
                            class="rounded-xl border border-[#E8DED2] bg-[#FFFCF8] px-4 py-3 text-xs text-[#5D4938] outline-none focus:border-[#C99A62]">
                            <option value="all">All Categories</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <select id="statusFilter"
                            class="rounded-xl border border-[#E8DED2] bg-[#FFFCF8] px-4 py-3 text-xs text-[#5D4938] outline-none focus:border-[#C99A62]">
                            <option value="all">All Availability</option>
                            <option value="available">Available</option>
                            <option value="unavailable">Unavailable</option>
                        </select>

                    </div>

                    {{-- Category chips --}}
                    <div class="soft-scroll mt-5 flex gap-2 overflow-x-auto pb-1">
                        <button type="button" class="filter-button active shrink-0 rounded-full px-4 py-2 text-[10px] font-semibold"
                            data-category-chip="all">
                            All Products
                        </button>

                        @foreach ($categories as $category)
                            <button type="button"
                                class="filter-button shrink-0 rounded-full px-4 py-2 text-[10px] font-semibold"
                                data-category-chip="{{ $category->id }}">
                                {{ $category->name }}
                            </button>
                        @endforeach
                    </div>

                </div>

                {{-- Product Grid --}}
                <div id="productGrid"
                    class="grid grid-cols-1 gap-5 bg-[#FFFCF8] p-5 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 md:p-6">

                    @forelse ($products as $product)

                        <article
                            class="product-card overflow-hidden rounded-2xl border border-[#EADFD2] bg-white"
                            data-product-card
                            data-name="{{ strtolower($product->name) }}"
                            data-code="{{ strtolower($product->product_code) }}"
                            data-category="{{ $product->category_id }}"
                            data-status="{{ $product->status }}"
                            data-product-id="{{ $product->id }}">

                            {{-- Image --}}
                            <div class="product-image group relative aspect-[4/3] overflow-hidden">

                                @if ($product->image)
                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy">
                                @else
                                    <div class="flex h-full items-center justify-center text-5xl">
                                        ☕
                                    </div>
                                @endif

                                <div class="absolute left-3 top-3">
                                    <span class="rounded-full border border-white/60 bg-white/90 px-3 py-1.5 text-[9px] font-bold uppercase tracking-wider text-[#5D4938] backdrop-blur">
                                        {{ $product->category->name ?? 'Uncategorized' }}
                                    </span>
                                </div>

                                <div class="absolute right-3 top-3">
                                    <span class="status-badge rounded-full px-3 py-1.5 text-[9px] font-bold uppercase tracking-wider
                                        {{ $product->status === 'available'
                                            ? 'bg-[#EAF2E9] text-[#55734F]'
                                            : 'bg-[#F8EDE8] text-[#B36B52]' }}">
                                        {{ $product->status }}
                                    </span>
                                </div>

                                <div class="absolute bottom-3 left-3">
                                    <span class="rounded-md bg-[#211812]/80 px-2.5 py-1.5 font-mono text-[9px] tracking-widest text-white backdrop-blur">
                                        #{{ $product->product_code }}
                                    </span>
                                </div>

                            </div>

                            {{-- Product details --}}
                            <div class="p-4">

                                <div class="mb-3 min-h-[62px]">
                                    <h3 class="font-serif text-lg font-semibold leading-tight text-[#2B1D15]">
                                        {{ $product->name }}
                                    </h3>

                                    <p class="mt-2 line-clamp-2 text-[10px] leading-relaxed text-[#927E6D]">
                                        {{ $product->description }}
                                    </p>
                                </div>

                                {{-- Price --}}
                                <div class="mb-4 border-y border-[#F0E9E0] py-3">

                                    @if ($product->has_sizes && $product->variants->count())
                                        <div class="flex items-center justify-between">
                                            <span class="text-[9px] font-bold uppercase tracking-wider text-[#927E6D]">
                                                Starting at
                                            </span>

                                            <span class="font-serif text-lg font-semibold text-[#2B1D15]">
                                                ₱{{ number_format($product->variants->min('price'), 2) }}
                                            </span>
                                        </div>

                                        <div class="mt-2 flex flex-wrap gap-1.5">
                                            @foreach ($product->variants as $variant)
                                                <span class="rounded-md bg-[#F8F1E8] px-2 py-1 text-[9px] text-[#7D6754]">
                                                    {{ $variant->size_name }}
                                                    · ₱{{ number_format($variant->price, 2) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="flex items-center justify-between">
                                            <span class="text-[9px] font-bold uppercase tracking-wider text-[#927E6D]">
                                                Fixed Price
                                            </span>

                                            <span class="font-serif text-lg font-semibold text-[#2B1D15]">
                                                ₱{{ number_format($product->price ?? 0, 2) }}
                                            </span>
                                        </div>
                                    @endif

                                </div>

                                {{-- Availability control --}}
                                <div class="flex items-center justify-between gap-3">

                                    <div>
                                        <p class="text-[10px] font-semibold text-[#49372A]">
                                            Availability
                                        </p>

                                        <p class="availability-text mt-1 text-[9px] text-[#927E6D]">
                                            {{ $product->status === 'available'
                                                ? 'Customers can order this item'
                                                : 'This item is hidden from ordering' }}
                                        </p>
                                    </div>

                                    <button type="button"
                                        class="availability-switch {{ $product->status === 'available' ? 'is-active' : '' }}"
                                        data-availability-toggle
                                        data-url="{{ route('admin.products.availability', $product->id) }}"
                                        data-status="{{ $product->status }}"
                                        aria-label="Toggle product availability"
                                        aria-pressed="{{ $product->status === 'available' ? 'true' : 'false' }}"
                                        title="Change availability">
                                    </button>

                                </div>

                            </div>
                        </article>

                    @empty
                        <div class="col-span-full py-16 text-center">
                            <div class="mb-4 text-4xl">☕</div>
                            <h3 class="font-serif text-xl font-semibold">Your catalog is waiting.</h3>
                            <p class="mt-2 text-xs text-[#927E6D]">
                                Register your first product to start building your menu.
                            </p>
                            <a href="{{ route('admin.inventory') }}"
                                class="mt-5 inline-flex rounded-xl bg-[#2B1D15] px-5 py-3 text-xs font-semibold text-white hover:bg-[#493124]">
                                Register your first product
                            </a>
                        </div>
                    @endforelse

                </div>

                {{-- List View --}}
                <div id="productList" class="hidden overflow-x-auto">

                    <table class="w-full min-w-[850px] text-left">
                        <thead class="bg-[#F8F1E8]">
                            <tr class="text-[9px] font-bold uppercase tracking-wider text-[#927E6D]">
                                <th class="px-6 py-4">Product</th>
                                <th class="px-4 py-4">Code</th>
                                <th class="px-4 py-4">Category</th>
                                <th class="px-4 py-4">Price</th>
                                <th class="px-4 py-4">Availability</th>
                                <th class="px-6 py-4 text-right">Status</th>
                            </tr>
                        </thead>

                        <tbody id="productListBody" class="divide-y divide-[#F0E9E0]">

                            @foreach ($products as $product)
                                <tr class="list-row"
                                    data-product-row
                                    data-name="{{ strtolower($product->name) }}"
                                    data-code="{{ strtolower($product->product_code) }}"
                                    data-category="{{ $product->category_id }}"
                                    data-status="{{ $product->status }}"
                                    data-product-id="{{ $product->id }}">

                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="h-12 w-12 shrink-0 overflow-hidden rounded-xl bg-[#F3E8DA]">
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}"
                                                        alt="{{ $product->name }}"
                                                        class="h-full w-full object-cover"
                                                        loading="lazy">
                                                @else
                                                    <div class="flex h-full items-center justify-center">☕</div>
                                                @endif
                                            </div>

                                            <div>
                                                <p class="text-xs font-semibold text-[#2B1D15]">
                                                    {{ $product->name }}
                                                </p>
                                                <p class="mt-1 max-w-[220px] truncate text-[10px] text-[#927E6D]">
                                                    {{ $product->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 font-mono text-[10px] text-[#927E6D]">
                                        #{{ $product->product_code }}
                                    </td>

                                    <td class="px-4 py-4 text-xs text-[#5D4938]">
                                        {{ $product->category->name ?? 'Uncategorized' }}
                                    </td>

                                    <td class="px-4 py-4 text-xs font-semibold">
                                        @if ($product->has_sizes && $product->variants->count())
                                            From ₱{{ number_format($product->variants->min('price'), 2) }}
                                        @else
                                            ₱{{ number_format($product->price ?? 0, 2) }}
                                        @endif
                                    </td>

                                    <td class="px-4 py-4">
                                        <button type="button"
                                            class="availability-switch {{ $product->status === 'available' ? 'is-active' : '' }}"
                                            data-availability-toggle
                                            data-url="{{ route('admin.products.availability', $product->id) }}"
                                            data-status="{{ $product->status }}"
                                            aria-label="Toggle product availability"
                                            aria-pressed="{{ $product->status === 'available' ? 'true' : 'false' }}">
                                        </button>
                                    </td>

                                    <td class="px-6 py-4 text-right">
                                        <span class="status-badge rounded-full px-3 py-1.5 text-[9px] font-bold uppercase tracking-wider
                                            {{ $product->status === 'available'
                                                ? 'bg-[#EAF2E9] text-[#55734F]'
                                                : 'bg-[#F8EDE8] text-[#B36B52]' }}">
                                            {{ $product->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div id="listEmptyState" class="hidden py-16 text-center">
                        <p class="font-serif text-lg font-semibold">No matching products.</p>
                        <p class="mt-2 text-xs text-[#927E6D]">Try changing your search or filters.</p>
                    </div>

                </div>

                {{-- Empty filter state --}}
                <div id="gridEmptyState" class="hidden bg-[#FFFCF8] px-5 py-16 text-center">
                    <div class="mb-3 text-3xl">⌕</div>
                    <h3 class="font-serif text-lg font-semibold">Nothing in this corner.</h3>
                    <p class="mt-2 text-xs text-[#927E6D]">
                        No products match your current search or filters.
                    </p>
                    <button type="button" id="clearFilters"
                        class="mt-4 text-xs font-semibold text-[#A47C50] hover:underline">
                        Clear all filters
                    </button>
                </div>

                {{-- Footer note --}}
                <div class="flex flex-col gap-2 border-t border-[#F0E9E0] bg-white px-5 py-4 sm:flex-row sm:items-center sm:justify-between md:px-6">
                    <p class="text-[10px] text-[#927E6D]">
                        Availability changes are saved immediately.
                    </p>

                    <p class="text-[10px] text-[#B5A797]">
                        BeanVista Coffee Co. · Product Management
                    </p>
                </div>

            </section>

        </div>

        @include('includes.footer')

    </main>

    {{-- TOAST --}}
    <div id="toast"
        class="fixed bottom-5 right-5 z-[200] hidden max-w-sm rounded-xl bg-[#211812] px-5 py-4 text-white shadow-2xl">
        <div class="flex items-center gap-3">
            <span id="toastIcon" class="text-lg">✓</span>

            <div>
                <p id="toastTitle" class="text-xs font-semibold">Success</p>
                <p id="toastMessage" class="mt-1 text-[10px] text-[#C5B6A5]">
                    Operation completed.
                </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const $ = id => document.getElementById(id);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            let toastTimer;
            let currentView = 'grid';

            // --------------------------------------------------
            // TOAST
            // --------------------------------------------------

            function showToast(type, title, message) {
                $('toastIcon').textContent = type === 'success' ? '✓' : '!';
                $('toastTitle').textContent = title;
                $('toastMessage').textContent = message;

                $('toast').classList.remove('hidden');
                $('toast').classList.add('toast-enter');

                clearTimeout(toastTimer);

                toastTimer = setTimeout(() => {
                    $('toast').classList.add('hidden');
                    $('toast').classList.remove('toast-enter');
                }, 3500);
            }

            // --------------------------------------------------
            // FILTERS
            // --------------------------------------------------

            function getFilters() {
                return {
                    search: $('productSearch').value.trim().toLowerCase(),
                    category: $('categoryFilter').value,
                    status: $('statusFilter').value
                };
            }

            function matchesFilters(element, filters) {
                const name = element.dataset.name || '';
                const code = element.dataset.code || '';
                const category = element.dataset.category || '';
                const status = element.dataset.status || '';

                const matchesSearch =
                    name.includes(filters.search) ||
                    code.includes(filters.search);

                const matchesCategory =
                    filters.category === 'all' ||
                    category === filters.category;

                const matchesStatus =
                    filters.status === 'all' ||
                    status === filters.status;

                return matchesSearch && matchesCategory && matchesStatus;
            }

            function applyFilters() {
                const filters = getFilters();

                const cards = [...document.querySelectorAll('[data-product-card]')];
                const rows = [...document.querySelectorAll('[data-product-row]')];

                let visible = 0;

                cards.forEach(card => {
                    const matches = matchesFilters(card, filters);

                    card.classList.toggle('hidden', !matches);

                    if (matches) visible++;
                });

                rows.forEach(row => {
                    row.classList.toggle('hidden', !matchesFilters(row, filters));
                });

                $('visibleCount').textContent = visible;

                $('gridEmptyState').classList.toggle(
                    'hidden',
                    visible !== 0 || currentView !== 'grid'
                );

                $('listEmptyState').classList.toggle(
                    'hidden',
                    visible !== 0 || currentView !== 'list'
                );
            }

            $('productSearch').addEventListener('input', applyFilters);
            $('categoryFilter').addEventListener('change', () => {
                updateCategoryChips();
                applyFilters();
            });

            $('statusFilter').addEventListener('change', applyFilters);

            function updateCategoryChips() {
                const selected = $('categoryFilter').value;

                document.querySelectorAll('[data-category-chip]').forEach(button => {
                    const active = button.dataset.categoryChip === selected;

                    button.classList.toggle('active', active);
                });
            }

            document.querySelectorAll('[data-category-chip]').forEach(button => {
                button.addEventListener('click', () => {
                    $('categoryFilter').value = button.dataset.categoryChip;

                    updateCategoryChips();
                    applyFilters();
                });
            });

            $('clearFilters').addEventListener('click', () => {
                $('productSearch').value = '';
                $('categoryFilter').value = 'all';
                $('statusFilter').value = 'all';

                updateCategoryChips();
                applyFilters();
            });

            // --------------------------------------------------
            // GRID / LIST VIEW
            // --------------------------------------------------

            function setView(view) {
                currentView = view;

                const grid = view === 'grid';

                $('productGrid').classList.toggle('hidden', !grid);
                $('productList').classList.toggle('hidden', grid);

                $('gridViewButton').classList.toggle(
                    'bg-[#2B1D15]',
                    grid
                );

                $('gridViewButton').classList.toggle(
                    'text-white',
                    grid
                );

                $('gridViewButton').classList.toggle(
                    'text-[#927E6D]',
                    !grid
                );

                $('listViewButton').classList.toggle(
                    'bg-[#2B1D15]',
                    !grid
                );

                $('listViewButton').classList.toggle(
                    'text-white',
                    !grid
                );

                $('listViewButton').classList.toggle(
                    'text-[#927E6D]',
                    grid
                );

                applyFilters();
            }

            $('gridViewButton').addEventListener('click', () => setView('grid'));
            $('listViewButton').addEventListener('click', () => setView('list'));

            // --------------------------------------------------
            // AVAILABILITY
            // --------------------------------------------------

            function updateProductStatus(productId, status) {
                const matchingElements = document.querySelectorAll(
                    `[data-product-id="${productId}"]`
                );

                matchingElements.forEach(element => {
                    element.dataset.status = status;

                    const badge = element.querySelector('.status-badge');

                    if (badge) {
                        badge.textContent = status;

                        badge.classList.remove(
                            'bg-[#EAF2E9]',
                            'text-[#55734F]',
                            'bg-[#F8EDE8]',
                            'text-[#B36B52]'
                        );

                        if (status === 'available') {
                            badge.classList.add(
                                'bg-[#EAF2E9]',
                                'text-[#55734F]'
                            );
                        } else {
                            badge.classList.add(
                                'bg-[#F8EDE8]',
                                'text-[#B36B52]'
                            );
                        }
                    }

                    const description = element.querySelector('.availability-text');

                    if (description) {
                        description.textContent = status === 'available'
                            ? 'Customers can order this item'
                            : 'This item is hidden from ordering';
                    }

                    const toggle = element.querySelector('[data-availability-toggle]');

                    if (toggle) {
                        toggle.dataset.status = status;

                        toggle.classList.toggle(
                            'is-active',
                            status === 'available'
                        );

                        toggle.setAttribute(
                            'aria-pressed',
                            status === 'available' ? 'true' : 'false'
                        );
                    }
                });

                // Update dashboard summary counts.
                const available = document.querySelectorAll(
                    '[data-product-card][data-status="available"]'
                ).length;

                const unavailable = document.querySelectorAll(
                    '[data-product-card][data-status="unavailable"]'
                ).length;

                $('availableCount').textContent = available;
                $('unavailableCount').textContent = unavailable;

                applyFilters();
            }

            document.addEventListener('click', async e => {
                const toggle = e.target.closest('[data-availability-toggle]');

                if (!toggle || toggle.disabled) return;

                const oldStatus = toggle.dataset.status;

                const newStatus = oldStatus === 'available'
                    ? 'unavailable'
                    : 'available';

                const productId = toggle.closest('[data-product-id]').dataset.productId;

                toggle.disabled = true;

                try {
                    const response = await fetch(toggle.dataset.url, {
                        method: 'PATCH',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            status: newStatus
                        })
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        throw new Error(
                            data.message || 'Unable to update product availability.'
                        );
                    }

                    updateProductStatus(productId, data.status);

                    showToast(
                        'success',
                        'Availability updated',
                        data.status === 'available'
                            ? 'This product is now available for ordering.'
                            : 'This product is now unavailable for ordering.'
                    );

                } catch (error) {
                    showToast(
                        'error',
                        'Update failed',
                        error.message
                    );
                } finally {
                    toggle.disabled = false;
                }
            });

            // --------------------------------------------------
            // INITIALIZE
            // --------------------------------------------------

            applyFilters();
            updateCategoryChips();

        });
    </script>

</body>
</html>
