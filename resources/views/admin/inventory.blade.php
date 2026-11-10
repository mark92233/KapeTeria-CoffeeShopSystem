<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | BeanVista Coffee Co.</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }

        .step-active {
            background: #2B1D15;
            color: #F8F1E8;
        }

        .step-completed {
            background: #C99A62;
            color: #211812;
        }

        .form-input {
            width: 100%;
            border: 1px solid #E8DED2;
            background: #FFFCF8;
            border-radius: 10px;
            padding: 11px 13px;
            font-size: 13px;
            color: #2B1D15;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-input:focus {
            border-color: #C99A62;
            box-shadow: 0 0 0 3px rgba(201,154,98,.13);
        }

        .form-input::placeholder {
            color: #B5A797;
        }

        .field-label {
            display: block;
            margin-bottom: 7px;
            font-size: 12px;
            font-weight: 600;
            color: #49372A;
        }

        .primary-button {
            background: #2B1D15;
            color: #F8F1E8;
            transition: .2s;
        }

        .primary-button:hover {
            background: #493124;
        }

        .secondary-button {
            border: 1px solid #E5D8C8;
            color: #5D4938;
            background: white;
            transition: .2s;
        }

        .secondary-button:hover {
            background: #F8F1E8;
        }

        .modal-backdrop {
            background: rgba(26, 17, 12, .55);
            backdrop-filter: blur(4px);
        }

        .size-card {
            border: 1px solid #E8DED2;
            background: #FFFCF8;
            border-radius: 12px;
            padding: 16px;
        }

        .image-placeholder {
            background:
                radial-gradient(circle at 70% 20%, rgba(201,154,98,.18), transparent 35%),
                #F3E8DA;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-[#F8F1E8] text-[#2B1D15]">

    @php
        $pageTitle = 'Inventory';
    @endphp

    @include('includes.sidebar')

    <main id="dashboardMain" class="min-h-screen flex flex-col transition-all duration-300 lg:ml-64">

        @include('includes.header')

        <div class="flex-1 p-5 md:p-8">

            {{-- Page Heading --}}
            <div class="mb-7 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <div class="mb-2 flex items-center gap-2 text-xs text-[#927E6D]">
                        <span>Admin</span>
                        <span>/</span>
                        <span class="text-[#2B1D15]">Inventory</span>
                    </div>

                    <h1 class="font-serif text-3xl font-semibold text-[#2B1D15]">
                        Register New Product
                    </h1>

                    <p class="mt-2 text-sm text-[#927E6D]">
                        Add a new menu item, configure its pricing, and prepare it for your product catalog.
                    </p>
                </div>

                <button type="button"
                    class="secondary-button flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-xs font-semibold">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8">
                        <path d="M12 3v12m0 0 4-4m-4 4-4-4"/>
                        <path d="M5 17v3h14v-3"/>
                    </svg>
                    Import from CSV
                </button>
            </div>

            {{-- Progress Tracker --}}
            <div class="mb-7 rounded-2xl border border-[#EADFD2] bg-white p-5 md:p-6">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <h2 class="text-sm font-semibold">Product Registration</h2>
                        <p class="mt-1 text-xs text-[#927E6D]">Complete each step to register your product.</p>
                    </div>

                    <span id="stepCounter" class="text-xs font-semibold text-[#927E6D]">
                        STEP 01 / 03
                    </span>
                </div>

                <div class="grid grid-cols-3 gap-3">

                    <div class="step-item" data-step="1">
                        <div class="mb-3 flex items-center gap-3">
                            <div class="step-circle step-active flex h-9 w-9 items-center justify-center rounded-full text-xs font-bold">
                                01
                            </div>
                            <div class="hidden sm:block">
                                <p class="text-xs font-semibold">Basic Information</p>
                                <p class="text-[10px] text-[#927E6D]">Product details</p>
                            </div>
                        </div>
                        <div class="h-1 rounded-full bg-[#C99A62]"></div>
                    </div>

                    <div class="step-item" data-step="2">
                        <div class="mb-3 flex items-center gap-3">
                            <div class="step-circle flex h-9 w-9 items-center justify-center rounded-full bg-[#F3EDE5] text-xs font-bold text-[#927E6D]">
                                02
                            </div>
                            <div class="hidden sm:block">
                                <p class="text-xs font-semibold text-[#927E6D]">Pricing & Sizes</p>
                                <p class="text-[10px] text-[#B5A797]">Configure variants</p>
                            </div>
                        </div>
                        <div class="h-1 rounded-full bg-[#EEE7DE]"></div>
                    </div>

                    <div class="step-item" data-step="3">
                        <div class="mb-3 flex items-center gap-3">
                            <div class="step-circle flex h-9 w-9 items-center justify-center rounded-full bg-[#F3EDE5] text-xs font-bold text-[#927E6D]">
                                03
                            </div>
                            <div class="hidden sm:block">
                                <p class="text-xs font-semibold text-[#927E6D]">Review & Submit</p>
                                <p class="text-[10px] text-[#B5A797]">Final confirmation</p>
                            </div>
                        </div>
                        <div class="h-1 rounded-full bg-[#EEE7DE]"></div>
                    </div>

                </div>
            </div>

            {{-- Main Layout --}}
            <div class="grid grid-cols-1 items-start gap-6 xl:grid-cols-[minmax(0,1fr)_340px]">

                {{-- Form --}}
                <section class="min-w-0 rounded-2xl border border-[#EADFD2] bg-white">

                    <form id="productForm" class="p-5 md:p-7" novalidate>

                        {{-- STEP 1 --}}
                        <div class="form-step" data-form-step="1">

                            <div class="mb-6">
                                <h2 class="font-serif text-xl font-semibold">Basic Information</h2>
                                <p class="mt-1 text-xs text-[#927E6D]">
                                    Start by providing the essential details of your new product.
                                </p>
                            </div>

                            <div class="space-y-5">

                                {{-- Product Name --}}
                                <div>
                                    <label class="field-label" for="productName">
                                        Product Name <span class="text-[#B84A3A]">*</span>
                                    </label>

                                    <input type="text" id="productName" name="name"
                                        class="form-input"
                                        placeholder="e.g. Caramel Macchiato"
                                        maxlength="100" required>

                                    <p class="mt-2 text-[11px] text-[#927E6D]">
                                        Product names must be unique.
                                    </p>
                                </div>

                                {{-- Product Code --}}
                                <div>
                                    <label class="field-label">Product Code</label>

                                    <div class="flex gap-2">
                                        <input type="text" id="productCode"
                                            class="form-input bg-[#F8F5F0] font-mono tracking-widest"
                                            readonly>

                                        <button type="button" id="regenerateCode"
                                            class="secondary-button shrink-0 rounded-xl px-4 text-xs font-semibold">
                                            Regenerate
                                        </button>
                                    </div>

                                    <p class="mt-2 text-[11px] text-[#927E6D]">
                                        A unique product code will be generated automatically.
                                    </p>
                                </div>

                                {{-- Category --}}
                                <div class="relative">
                                    <label class="field-label">
                                        Category <span class="text-[#B84A3A]">*</span>
                                    </label>

                                    <div class="relative">
                                        <button type="button" id="categoryDropdownButton"
                                            class="form-input flex items-center justify-between text-left">
                                            <span id="selectedCategory" class="text-[#B5A797]">
                                                Select a category
                                            </span>
                                            <svg width="16" height="16" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="m6 9 6 6 6-6"/>
                                            </svg>
                                        </button>

                                        <div id="categoryDropdown"
                                            class="absolute left-0 right-0 top-full z-30 mt-2 hidden overflow-hidden rounded-xl border border-[#E8DED2] bg-white shadow-xl">

                                            <div class="border-b border-[#F0E9E0] p-3">
                                                <input type="text" id="categorySearch"
                                                    class="form-input"
                                                    placeholder="Search categories...">
                                            </div>

                                            <div id="categoryOptions" class="max-h-48 overflow-y-auto p-2">
                                            </div>

                                            <div class="border-t border-[#F0E9E0] p-2">
                                                <button type="button" id="openCategoryModal"
                                                    class="flex w-full items-center gap-2 rounded-lg px-3 py-2.5 text-xs font-semibold text-[#9A6A35] hover:bg-[#FBF5ED]">
                                                    <span class="text-lg">+</span>
                                                    Add new category
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" id="categoryId" name="category_id">
                                </div>

                                {{-- Description --}}
                                <div>
                                    <div class="mb-2 flex items-center justify-between">
                                        <label class="field-label mb-0" for="productDescription">
                                            Product Description <span class="text-[#B84A3A]">*</span>
                                        </label>

                                        <button type="button" id="generateDescription"
                                            class="flex items-center gap-1.5 rounded-lg bg-[#F7EFE4] px-3 py-2 text-[10px] font-semibold text-[#936C42] hover:bg-[#EFE0CB]">
                                            ✦ Generate with AI
                                        </button>
                                    </div>

                                    <textarea id="productDescription" name="description"
                                        class="form-input resize-none"
                                        rows="4" maxlength="250"
                                        placeholder="Describe your product, its flavor, ingredients, or what makes it special..."
                                        required></textarea>

                                    <div class="mt-2 flex justify-between">
                                        <p class="text-[10px] text-[#927E6D]">
                                            Write a short description for your menu.
                                        </p>
                                        <span id="descriptionCount" class="text-[10px] text-[#927E6D]">0 / 250</span>
                                    </div>
                                </div>

                                {{-- Image --}}
                                <div>
                                    <label class="field-label">
                                        Product Image <span class="text-[#B84A3A]">*</span>
                                    </label>

                                    <label for="productImage"
                                        class="group flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-[#E5D8C8] bg-[#FFFCF8] px-5 py-9 text-center transition hover:border-[#C99A62] hover:bg-[#FBF6EF]">

                                        <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-[#F3E8DA] text-[#9B754E]">
                                            <svg width="23" height="23" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="1.7">
                                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                                <path d="m21 15-5-5L5 21"/>
                                            </svg>
                                        </div>

                                        <p class="text-xs font-semibold">Click to upload product image</p>
                                        <p class="mt-2 text-[10px] text-[#927E6D]">
                                            PNG, JPG or WEBP. Maximum file size: 5MB.
                                        </p>

                                        <input type="file" id="productImage" name="image"
                                            accept="image/png,image/jpeg,image/webp"
                                            class="hidden" required>
                                    </label>

                                    <p id="imageFileName" class="mt-2 text-xs text-[#927E6D]">
                                        No image selected.
                                    </p>
                                </div>

                            </div>
                        </div>

                        {{-- STEP 2 --}}
                        <div class="form-step hidden" data-form-step="2">

                            <div class="mb-6">
                                <h2 class="font-serif text-xl font-semibold">Pricing & Sizes</h2>
                                <p class="mt-1 text-xs text-[#927E6D]">
                                    Configure how this product is priced and sold.
                                </p>
                            </div>

                            <div class="mb-6">
                                <label class="field-label">
                                    Does this product have multiple sizes?
                                </label>

                                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">

                                    <label class="cursor-pointer">
                                        <input type="radio" name="has_sizes" value="no"
                                            class="peer sr-only" checked>

                                        <div class="rounded-xl border border-[#E8DED2] p-4 transition peer-checked:border-[#C99A62] peer-checked:bg-[#FBF6EF]">
                                            <div class="mb-2 flex items-center justify-between">
                                                <span class="text-sm font-semibold">No sizes</span>
                                                <span class="text-[#C99A62]">●</span>
                                            </div>
                                            <p class="text-[11px] text-[#927E6D]">
                                                One fixed price for this product.
                                            </p>
                                        </div>
                                    </label>

                                    <label class="cursor-pointer">
                                        <input type="radio" name="has_sizes" value="yes"
                                            class="peer sr-only">

                                        <div class="rounded-xl border border-[#E8DED2] p-4 transition peer-checked:border-[#C99A62] peer-checked:bg-[#FBF6EF]">
                                            <div class="mb-2 flex items-center justify-between">
                                                <span class="text-sm font-semibold">Multiple sizes</span>
                                                <span class="text-[#C99A62]">＋</span>
                                            </div>
                                            <p class="text-[11px] text-[#927E6D]">
                                                Different sizes with individual prices.
                                            </p>
                                        </div>
                                    </label>

                                </div>
                            </div>

                            {{-- Single Price --}}
                            <div id="singlePriceSection">
                                <label class="field-label" for="productPrice">
                                    Product Price <span class="text-[#B84A3A]">*</span>
                                </label>

                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#927E6D]">₱</span>
                                    <input type="number" id="productPrice" name="price"
                                        class="form-input pl-9"
                                        min="0.01" step="0.01"
                                        placeholder="0.00">
                                </div>
                            </div>

                            {{-- Multiple Sizes --}}
                            <div id="multipleSizesSection" class="hidden">

                                <div class="mb-4 flex items-center justify-between">
                                    <div>
                                        <h3 class="text-sm font-semibold">Product Sizes</h3>
                                        <p class="mt-1 text-[11px] text-[#927E6D]">
                                            Add a size and its corresponding price.
                                        </p>
                                    </div>

                                    <button type="button" id="addSizeButton"
                                        class="rounded-lg bg-[#2B1D15] px-3 py-2.5 text-xs font-semibold text-white hover:bg-[#493124]">
                                        + Add Size
                                    </button>
                                </div>

                                <div id="sizeCards" class="space-y-3">
                                </div>

                                <div class="mt-4 rounded-xl bg-[#F8F1E8] p-4">
                                    <p class="text-xs font-semibold">Size configuration</p>
                                    <p class="mt-1 text-[11px] leading-relaxed text-[#927E6D]">
                                        Size names can be measurements such as 8 oz and 12 oz, or labels such as Small, Medium, and Large. Each size must have a unique name.
                                    </p>
                                </div>

                            </div>

                        </div>

                        {{-- STEP 3 --}}
                        <div class="form-step hidden" data-form-step="3">

                            <div class="mb-6">
                                <h2 class="font-serif text-xl font-semibold">Review & Submit</h2>
                                <p class="mt-1 text-xs text-[#927E6D]">
                                    Review your product information before registering it.
                                </p>
                            </div>

                            <div class="space-y-4">

                                <div class="rounded-xl border border-[#E8DED2] p-4">
                                    <h3 class="mb-3 text-xs font-bold uppercase tracking-wider text-[#927E6D]">
                                        Product Information
                                    </h3>

                                    <div class="space-y-3 text-xs">
                                        <div class="flex justify-between gap-4">
                                            <span class="text-[#927E6D]">Product Name</span>
                                            <span id="reviewName" class="text-right font-semibold">—</span>
                                        </div>
                                        <div class="flex justify-between gap-4">
                                            <span class="text-[#927E6D]">Product Code</span>
                                            <span id="reviewCode" class="font-mono font-semibold">—</span>
                                        </div>
                                        <div class="flex justify-between gap-4">
                                            <span class="text-[#927E6D]">Category</span>
                                            <span id="reviewCategory" class="font-semibold">—</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-xl border border-[#E8DED2] p-4">
                                    <h3 class="mb-3 text-xs font-bold uppercase tracking-wider text-[#927E6D]">
                                        Pricing Details
                                    </h3>
                                    <div id="reviewPricing" class="space-y-3 text-xs"></div>
                                </div>

                                <div class="rounded-xl border border-[#E8DED2] p-4">
                                    <h3 class="mb-3 text-xs font-bold uppercase tracking-wider text-[#927E6D]">
                                        Description
                                    </h3>
                                    <p id="reviewDescription" class="text-xs leading-relaxed text-[#927E6D]">—</p>
                                </div>

                                <div class="rounded-xl bg-[#F8F1E8] p-4">
                                    <div class="flex items-start gap-3">
                                        <span class="text-lg">ⓘ</span>
                                        <div>
                                            <p class="text-xs font-semibold">Availability management</p>
                                            <p class="mt-1 text-[11px] leading-relaxed text-[#927E6D]">
                                                Newly registered products will be available by default. Staff can manage product availability from the Products page.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        {{-- Form Actions --}}
                        <div class="mt-8 flex items-center justify-between border-t border-[#F0E9E0] pt-5">

                            <button type="button" id="previousStep"
                                class="secondary-button hidden rounded-xl px-5 py-3 text-xs font-semibold">
                                Back
                            </button>

                            <span id="stepHint" class="text-[10px] text-[#927E6D]">
                                Required fields are marked with an asterisk (*).
                            </span>

                            <button type="button" id="nextStep"
                                class="primary-button ml-auto flex items-center gap-2 rounded-xl px-6 py-3 text-xs font-semibold">
                                Continue
                                <span>→</span>
                            </button>

                            <button type="submit" id="submitProduct"
                                class="primary-button ml-auto hidden rounded-xl px-6 py-3 text-xs font-semibold">
                                Register Product
                            </button>

                        </div>

                    </form>
                </section>

                {{-- Live Preview Sidebar --}}
                <aside class="space-y-5 xl:sticky xl:top-24">

                    <div class="overflow-hidden rounded-2xl border border-[#EADFD2] bg-white">

                        <div class="border-b border-[#F0E9E0] px-5 py-4">
                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-semibold">Live Preview</h2>
                                <span class="rounded-full bg-[#F8F1E8] px-2.5 py-1 text-[9px] font-semibold uppercase tracking-wider text-[#927E6D]">
                                    Preview
                                </span>
                            </div>
                            <p class="mt-1 text-[11px] text-[#927E6D]">
                                See how your product will appear.
                            </p>
                        </div>

                        <div class="p-5">

                            <div id="previewImageContainer"
                                class="image-placeholder mb-4 flex aspect-[4/3] items-center justify-center overflow-hidden rounded-xl">
                                <div id="previewImageEmpty" class="text-center">
                                    <p class="text-[10px] text-[#927E6D]">Product image preview</p>
                                </div>
                                <img id="previewImage" class="hidden h-full w-full object-cover" alt="Product preview">
                            </div>

                            <div class="mb-2 flex items-start justify-between gap-3">
                                <div>
                                    <h3 id="previewName" class="font-serif text-lg font-semibold">
                                        Product Name
                                    </h3>
                                    <p id="previewCategory" class="mt-1 text-[10px] text-[#927E6D]">
                                        Product Category
                                    </p>
                                </div>
                                <span class="rounded-full bg-[#EAF2E9] px-2.5 py-1 text-[9px] font-semibold text-[#52734F]">
                                    Available
                                </span>
                            </div>

                            <p id="previewDescription" class="mb-4 text-xs leading-relaxed text-[#927E6D]">
                                Your product description will appear here.
                            </p>

                            <div class="border-t border-[#F0E9E0] pt-4">
                                <div class="mb-2 flex items-center justify-between">
                                    <span class="text-[10px] font-semibold uppercase tracking-wider text-[#927E6D]">
                                        Pricing
                                    </span>
                                    <span id="previewPrice" class="text-sm font-bold text-[#2B1D15]">
                                        ₱0.00
                                    </span>
                                </div>
                                <div id="previewSizes" class="space-y-2"></div>
                            </div>

                            <div class="mt-5 rounded-lg bg-[#F8F1E8] px-3 py-2.5">
                                <p class="text-[9px] uppercase tracking-wider text-[#927E6D]">Product Code</p>
                                <p id="previewCode" class="mt-1 font-mono text-xs font-semibold tracking-widest">
                                    ------
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="rounded-2xl border border-[#EADFD2] bg-white p-5">
                        <h3 class="mb-3 text-xs font-semibold">Registration Guidelines</h3>

                        <ul class="space-y-3 text-[11px] text-[#927E6D]">
                            <li class="flex gap-2">
                                <span class="text-[#C99A62]">✓</span>
                                Product names must be unique.
                            </li>
                            <li class="flex gap-2">
                                <span class="text-[#C99A62]">✓</span>
                                Every product must have a category.
                            </li>
                            <li class="flex gap-2">
                                <span class="text-[#C99A62]">✓</span>
                                A product image is required.
                            </li>
                            <li class="flex gap-2">
                                <span class="text-[#C99A62]">✓</span>
                                Each product size must have a unique name.
                            </li>
                        </ul>
                    </div>

                </aside>

            </div>
        </div>

        @include('includes.footer')

    </main>

    {{-- CATEGORY MODAL --}}
    <div id="categoryModal"
        class="modal-backdrop fixed inset-0 z-[100] hidden items-center justify-center p-4">

        <div class="w-full max-w-md rounded-2xl bg-white shadow-2xl">

            <div class="flex items-center justify-between border-b border-[#F0E9E0] px-6 py-5">
                <div>
                    <h2 id="categoryModalTitle" class="font-serif text-lg font-semibold">Add Category</h2>
                    <p class="mt-1 text-[11px] text-[#927E6D]">Organize your products into categories.</p>
                </div>

                <button type="button" id="closeCategoryModal"
                    class="rounded-lg p-2 text-[#927E6D] hover:bg-[#F8F1E8]">
                    ✕
                </button>
            </div>

            <form id="categoryForm" class="space-y-4 p-6">

                <input type="hidden" id="editingCategoryId">

                <div>
                    <label class="field-label" for="categoryName">
                        Category Name <span class="text-[#B84A3A]">*</span>
                    </label>
                    <input type="text" id="categoryName" class="form-input"
                        placeholder="e.g. Coffee" maxlength="60" required>
                </div>

                <div>
                    <label class="field-label" for="categoryDescription">
                        Description <span class="text-[#927E6D]">(Optional)</span>
                    </label>
                    <textarea id="categoryDescription" class="form-input resize-none"
                        rows="3" maxlength="200"
                        placeholder="A short description of this category..."></textarea>
                </div>

                <div class="flex items-center justify-between border-t border-[#F0E9E0] pt-5">
                    <button type="button" id="deleteCategory"
                        class="hidden text-xs font-semibold text-[#B84A3A] hover:underline">
                        Delete Category
                    </button>

                    <div class="ml-auto flex gap-2">
                        <button type="button" id="cancelCategoryModal"
                            class="secondary-button rounded-xl px-4 py-2.5 text-xs font-semibold">
                            Cancel
                        </button>
                        <button type="submit" id="saveCategory"
                            class="primary-button rounded-xl px-5 py-2.5 text-xs font-semibold">
                            Save Category
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    {{-- TOAST --}}
    <div id="toast"
        class="fixed bottom-5 right-5 z-[200] hidden max-w-sm rounded-xl bg-[#211812] px-5 py-4 text-white shadow-2xl">
        <div class="flex items-center gap-3">
            <span id="toastIcon" class="text-lg">✓</span>
            <div>
                <p id="toastTitle" class="text-xs font-semibold">Success</p>
                <p id="toastMessage" class="mt-1 text-[10px] text-[#C5B6A5]">Operation completed.</p>
            </div>
        </div>
    </div>

    <script>
     
document.addEventListener('DOMContentLoaded', () => {
    let categories = [];
    let selectedCategoryId = null;
    let currentStep = 1;
    let sizeCounter = 0;
    let imageURL = null;
    let toastTimer;

    const $ = id => document.getElementById(id);
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const routes = {
        categories: @json(route('admin.categories.index')),
        products: @json(route('admin.products.store')),
        categoryStore: @json(route('admin.categories.store'))
    };

    function categoryUrl(id) {
        return `${routes.categories}/${id}`;
    }

    async function apiRequest(url, options = {}) {
        const response = await fetch(url, {
            ...options,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                ...(options.headers || {})
            }
        });

        const data = await response.json().catch(() => ({}));

        if (!response.ok) {
            if (response.status === 422 && data.errors) {
                const firstError = Object.values(data.errors).flat()[0];
                throw new Error(firstError || 'Please check the submitted information.');
            }

            throw new Error(data.message || 'Something went wrong. Please try again.');
        }

        return data;
    }

    // --------------------------------------------------
    // TOAST
    // --------------------------------------------------

    function showToast(type, title, message) {
        $('toastIcon').textContent = type === 'success' ? '✓' : '!';
        $('toastTitle').textContent = title;
        $('toastMessage').textContent = message;

        $('toast').classList.remove('hidden');

        clearTimeout(toastTimer);

        toastTimer = setTimeout(() => {
            $('toast').classList.add('hidden');
        }, 3500);
    }

    // --------------------------------------------------
    // HTML ESCAPING
    // --------------------------------------------------

    function escapeHTML(value) {
        return String(value).replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[char]);
    }

    function escapeAttribute(value) {
        return escapeHTML(value);
    }

    // --------------------------------------------------
    // PRODUCT CODE
    // --------------------------------------------------

    // This is only a visual preview.
    // Laravel generates the actual unique product code.
    function generateCode() {
        return String(Math.floor(100000 + Math.random() * 900000));
    }

    function setProductCode() {
        $('productCode').value = generateCode();
        updatePreview();
    }

    $('regenerateCode').addEventListener('click', setProductCode);

    setProductCode();

    // --------------------------------------------------
    // CATEGORY API
    // --------------------------------------------------

    async function loadCategories() {
        try {
            const data = await apiRequest(routes.categories);

            categories = data;

            renderCategories();

            if (selectedCategoryId) {
                const category = categories.find(
                    item => Number(item.id) === Number(selectedCategoryId)
                );

                if (category) {
                    selectCategory(category.id);
                } else {
                    clearSelectedCategory();
                }
            }
        } catch (error) {
            showToast('error', 'Categories unavailable', error.message);
        }
    }

    function renderCategories(search = '') {
        const container = $('categoryOptions');

        const filtered = categories.filter(category =>
            category.name.toLowerCase().includes(search.toLowerCase())
        );

        if (!filtered.length) {
            container.innerHTML = `
                <p class="px-3 py-4 text-center text-xs text-[#927E6D]">
                    No categories found.
                </p>
            `;
            return;
        }

        container.innerHTML = filtered.map(category => `
            <div class="group flex items-center justify-between rounded-lg px-3 py-2 hover:bg-[#F8F1E8]">

                <button type="button"
                    class="flex-1 text-left text-xs font-medium"
                    data-select-category="${category.id}">
                    ${escapeHTML(category.name)}
                </button>

                <button type="button"
                    class="px-2 text-[10px] font-semibold text-[#9A6A35] opacity-0 group-hover:opacity-100"
                    data-edit-category="${category.id}">
                    Edit
                </button>

            </div>
        `).join('');
    }

    function selectCategory(id) {
        const category = categories.find(
            item => Number(item.id) === Number(id)
        );

        if (!category) return;

        selectedCategoryId = category.id;

        $('categoryId').value = category.id;
        $('selectedCategory').textContent = category.name;
        $('selectedCategory').classList.remove('text-[#B5A797]');

        $('categoryDropdown').classList.add('hidden');

        updatePreview();
    }

    function clearSelectedCategory() {
        selectedCategoryId = null;
        $('categoryId').value = '';
        $('selectedCategory').textContent = 'Select a category';
        $('selectedCategory').classList.add('text-[#B5A797]');

        updatePreview();
    }

    $('categoryDropdownButton').addEventListener('click', () => {
        $('categoryDropdown').classList.toggle('hidden');
        $('categorySearch').value = '';

        renderCategories();

        $('categorySearch').focus();
    });

    $('categorySearch').addEventListener('input', e => {
        renderCategories(e.target.value);
    });

    $('categoryOptions').addEventListener('click', e => {
        const selectButton = e.target.closest('[data-select-category]');
        const editButton = e.target.closest('[data-edit-category]');

        if (selectButton) {
            selectCategory(selectButton.dataset.selectCategory);
        }

        if (editButton) {
            openCategoryModal(Number(editButton.dataset.editCategory));
        }
    });

    document.addEventListener('click', e => {
        if (
            !e.target.closest('#categoryDropdown') &&
            !e.target.closest('#categoryDropdownButton')
        ) {
            $('categoryDropdown').classList.add('hidden');
        }
    });

    // --------------------------------------------------
    // CATEGORY MODAL
    // --------------------------------------------------

    function openCategoryModal(id = null) {
        const category = id
            ? categories.find(item => Number(item.id) === Number(id))
            : null;

        $('editingCategoryId').value = category?.id ?? '';
        $('categoryName').value = category?.name ?? '';
        $('categoryDescription').value = category?.description ?? '';

        $('categoryModalTitle').textContent = category
            ? 'Edit Category'
            : 'Add Category';

        $('saveCategory').textContent = category
            ? 'Update Category'
            : 'Save Category';

        $('deleteCategory').classList.toggle('hidden', !category);

        $('categoryModal').classList.remove('hidden');
        $('categoryModal').classList.add('flex');

        $('categoryName').focus();
    }

    function closeCategoryModal() {
        $('categoryModal').classList.add('hidden');
        $('categoryModal').classList.remove('flex');

        $('categoryForm').reset();
        $('editingCategoryId').value = '';
    }

    $('openCategoryModal').addEventListener('click', () => {
        $('categoryDropdown').classList.add('hidden');
        openCategoryModal();
    });

    $('closeCategoryModal').addEventListener('click', closeCategoryModal);
    $('cancelCategoryModal').addEventListener('click', closeCategoryModal);

    $('categoryForm').addEventListener('submit', async e => {
        e.preventDefault();

        const id = $('editingCategoryId').value;

        const payload = {
            name: $('categoryName').value.trim(),
            description: $('categoryDescription').value.trim()
        };

        if (!payload.name) {
            showToast('error', 'Missing information', 'Enter a category name.');
            return;
        }

        const saveButton = $('saveCategory');

        saveButton.disabled = true;
        saveButton.textContent = 'Saving...';

        try {
            const data = await apiRequest(
                id ? categoryUrl(id) : routes.categoryStore,
                {
                    method: id ? 'PUT' : 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                }
            );

            await loadCategories();

            if (id) {
                if (Number(selectedCategoryId) === Number(id)) {
                    selectCategory(id);
                }

                showToast('success', 'Category updated', data.message);
            } else {
                selectCategory(data.category.id);

                showToast('success', 'Category added', data.message);
            }

            renderCategories($('categorySearch').value);

            closeCategoryModal();

        } catch (error) {
            showToast('error', 'Category operation failed', error.message);
        } finally {
            saveButton.disabled = false;
            $('saveCategory').textContent = id
                ? 'Update Category'
                : 'Save Category';
        }
    });

    $('deleteCategory').addEventListener('click', async () => {
        const id = Number($('editingCategoryId').value);

        if (!id) return;

        if (!confirm('Delete this category? This action cannot be undone.')) {
            return;
        }

        const button = $('deleteCategory');
        button.disabled = true;

        try {
            const data = await apiRequest(categoryUrl(id), {
                method: 'DELETE'
            });

            if (Number(selectedCategoryId) === id) {
                clearSelectedCategory();
            }

            await loadCategories();

            closeCategoryModal();

            showToast('success', 'Category deleted', data.message);

        } catch (error) {
            showToast('error', 'Unable to delete category', error.message);
        } finally {
            button.disabled = false;
        }
    });

    // --------------------------------------------------
    // DESCRIPTION
    // --------------------------------------------------

    $('productDescription').addEventListener('input', e => {
        $('descriptionCount').textContent =
            `${e.target.value.length} / 250`;

        updatePreview();
    });

    $('generateDescription').addEventListener('click', () => {
        showToast(
            'success',
            'Coming soon',
            'AI description generation will be implemented later.'
        );
    });

    // --------------------------------------------------
    // IMAGE UPLOAD
    // --------------------------------------------------

    $('productImage').addEventListener('change', e => {
        const file = e.target.files[0];

        if (!file) return;

        const validTypes = [
            'image/png',
            'image/jpeg',
            'image/webp'
        ];

        if (!validTypes.includes(file.type)) {
            e.target.value = '';

            showToast(
                'error',
                'Invalid image',
                'Upload a PNG, JPG, or WEBP image.'
            );

            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            e.target.value = '';

            showToast(
                'error',
                'Image too large',
                'Maximum image size is 5MB.'
            );

            return;
        }

        if (imageURL) {
            URL.revokeObjectURL(imageURL);
        }

        imageURL = URL.createObjectURL(file);

        $('previewImage').src = imageURL;
        $('previewImage').classList.remove('hidden');
        $('previewImageEmpty').classList.add('hidden');

        $('imageFileName').textContent = file.name;
    });

    // --------------------------------------------------
    // SIZE MANAGEMENT
    // --------------------------------------------------

    function addSizeCard(name = '', price = '') {
        sizeCounter++;

        const card = document.createElement('div');

        card.className = 'size-card';
        card.dataset.sizeCard = '';

        card.innerHTML = `
            <div class="mb-4 flex items-center justify-between">
                <span class="text-xs font-semibold text-[#49372A]">
                    Size Option ${sizeCounter}
                </span>

                <button type="button"
                    class="remove-size text-[11px] font-semibold text-[#B84A3A] hover:underline">
                    Remove
                </button>
            </div>

            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <div>
                    <label class="field-label">Size Name *</label>

                    <input type="text"
                        class="form-input size-name"
                        placeholder="e.g. 12 oz or Medium"
                        maxlength="30"
                        value="${escapeAttribute(name)}"
                        required>
                </div>

                <div>
                    <label class="field-label">Price (₱) *</label>

                    <input type="number"
                        class="form-input size-price"
                        placeholder="0.00"
                        min="0.01"
                        step="0.01"
                        value="${escapeAttribute(price)}"
                        required>
                </div>
            </div>
        `;

        $('sizeCards').appendChild(card);

        updatePreview();
    }

    $('addSizeButton').addEventListener('click', () => {
        addSizeCard();
    });

    $('sizeCards').addEventListener('click', e => {
        if (e.target.closest('.remove-size')) {
            e.target.closest('[data-size-card]').remove();
            updatePreview();
        }
    });

    $('sizeCards').addEventListener('input', updatePreview);

    document.querySelectorAll('input[name="has_sizes"]').forEach(radio => {
        radio.addEventListener('change', () => {
            const hasSizes =
                document.querySelector('input[name="has_sizes"]:checked').value === 'yes';

            $('singlePriceSection').classList.toggle('hidden', hasSizes);
            $('multipleSizesSection').classList.toggle('hidden', !hasSizes);

            $('productPrice').required = !hasSizes;

            if (hasSizes && $('sizeCards').children.length === 0) {
                addSizeCard('Small');
                addSizeCard('Medium');
                addSizeCard('Large');
            }

            updatePreview();
        });
    });

    function getSizeData() {
        return [...document.querySelectorAll('[data-size-card]')].map(card => ({
            name: card.querySelector('.size-name').value.trim(),
            price: card.querySelector('.size-price').value
        }));
    }

    // --------------------------------------------------
    // LIVE PREVIEW
    // --------------------------------------------------

    function updatePreview() {
        const name = $('productName').value.trim();
        const description = $('productDescription').value.trim();
        const code = $('productCode').value;

        const category = categories.find(
            item => Number(item.id) === Number(selectedCategoryId)
        );

        const hasSizes =
            document.querySelector('input[name="has_sizes"]:checked').value === 'yes';

        $('previewName').textContent = name || 'Product Name';

        $('previewDescription').textContent =
            description || 'Your product description will appear here.';

        $('previewCategory').textContent =
            category?.name || 'Product Category';

        $('previewCode').textContent = code || '------';

        $('previewPrice').classList.toggle('hidden', hasSizes);

        $('previewSizes').innerHTML = '';

        if (hasSizes) {
            getSizeData().forEach(size => {
                const row = document.createElement('div');

                row.className =
                    'flex justify-between rounded-lg bg-[#F8F1E8] px-3 py-2 text-xs';

                const sizeName = document.createElement('span');
                sizeName.className = 'text-[#927E6D]';
                sizeName.textContent = size.name || 'Size name';

                const sizePrice = document.createElement('span');
                sizePrice.className = 'font-semibold';

                sizePrice.textContent = size.price
                    ? `₱${Number(size.price).toFixed(2)}`
                    : '₱0.00';

                row.append(sizeName, sizePrice);

                $('previewSizes').appendChild(row);
            });
        } else {
            const price = Number($('productPrice').value || 0);

            $('previewPrice').textContent = `₱${price.toFixed(2)}`;
        }
    }

    ['productName', 'productPrice'].forEach(id => {
        $(id).addEventListener('input', updatePreview);
    });

    // --------------------------------------------------
    // VALIDATION
    // --------------------------------------------------

    function validateStep(step) {
        if (step === 1) {
            const name = $('productName').value.trim();
            const description = $('productDescription').value.trim();
            const image = $('productImage').files[0];

            if (!name) {
                showToast('error', 'Product name required', 'Enter the product name first.');
                $('productName').focus();
                return false;
            }

            if (!selectedCategoryId) {
                showToast('error', 'Category required', 'Select a product category.');
                return false;
            }

            if (!description) {
                showToast('error', 'Description required', 'Enter a product description.');
                $('productDescription').focus();
                return false;
            }

            if (!image) {
                showToast('error', 'Product image required', 'Upload an image before continuing.');
                return false;
            }

            return true;
        }

        if (step === 2) {
            const hasSizes =
                document.querySelector('input[name="has_sizes"]:checked').value === 'yes';

            if (!hasSizes) {
                const price = Number($('productPrice').value);

                if (!Number.isFinite(price) || price <= 0) {
                    showToast('error', 'Invalid price', 'Enter a valid product price.');
                    $('productPrice').focus();
                    return false;
                }
            } else {
                const cards = [...document.querySelectorAll('[data-size-card]')];

                if (!cards.length) {
                    showToast('error', 'No sizes added', 'Add at least one size option.');
                    return false;
                }

                const names = [];

                for (const card of cards) {
                    const name = card.querySelector('.size-name').value.trim();
                    const price = Number(card.querySelector('.size-price').value);

                    if (!name || !Number.isFinite(price) || price <= 0) {
                        showToast(
                            'error',
                            'Incomplete size',
                            'Every size needs a name and valid price.'
                        );

                        return false;
                    }

                    if (names.includes(name.toLowerCase())) {
                        showToast(
                            'error',
                            'Duplicate size',
                            'Size names must be unique.'
                        );

                        return false;
                    }

                    names.push(name.toLowerCase());
                }
            }

            return true;
        }

        return true;
    }

    // --------------------------------------------------
    // STEP NAVIGATION
    // --------------------------------------------------

    function showStep(step) {
        currentStep = step;

        document.querySelectorAll('[data-form-step]').forEach(panel => {
            panel.classList.toggle(
                'hidden',
                Number(panel.dataset.formStep) !== step
            );
        });

        document.querySelectorAll('.step-item').forEach(item => {
            const number = Number(item.dataset.step);
            const circle = item.querySelector('.step-circle');
            const bar = item.querySelector('.h-1');

            circle.classList.remove(
                'step-active',
                'step-completed',
                'bg-[#F3EDE5]',
                'text-[#927E6D]'
            );

            if (number === step) {
                circle.classList.add('step-active');
            } else if (number < step) {
                circle.classList.add('step-completed');
            } else {
                circle.classList.add(
                    'bg-[#F3EDE5]',
                    'text-[#927E6D]'
                );
            }

            bar.classList.toggle('bg-[#C99A62]', number <= step);
            bar.classList.toggle('bg-[#EEE7DE]', number > step);
        });

        $('stepCounter').textContent = `STEP 0${step} / 03`;

        $('previousStep').classList.toggle('hidden', step === 1);
        $('nextStep').classList.toggle('hidden', step === 3);
        $('submitProduct').classList.toggle('hidden', step !== 3);

        $('stepHint').textContent = step === 3
            ? 'Please review your product details before submitting.'
            : 'Required fields are marked with an asterisk (*).';

        if (step === 3) {
            updateReview();
        }

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    $('nextStep').addEventListener('click', () => {
        if (!validateStep(currentStep)) return;

        showStep(Math.min(3, currentStep + 1));
    });

    $('previousStep').addEventListener('click', () => {
        showStep(Math.max(1, currentStep - 1));
    });

    // --------------------------------------------------
    // REVIEW
    // --------------------------------------------------

    function updateReview() {
        const category = categories.find(
            item => Number(item.id) === Number(selectedCategoryId)
        );

        $('reviewName').textContent = $('productName').value;
        $('reviewCode').textContent = $('productCode').value;
        $('reviewCategory').textContent = category?.name || '—';
        $('reviewDescription').textContent = $('productDescription').value;

        const hasSizes =
            document.querySelector('input[name="has_sizes"]:checked').value === 'yes';

        if (hasSizes) {
            $('reviewPricing').innerHTML = getSizeData().map(size => `
                <div class="flex justify-between gap-4">
                    <span class="text-[#927E6D]">${escapeHTML(size.name)}</span>
                    <span class="font-semibold">
                        ₱${Number(size.price).toFixed(2)}
                    </span>
                </div>
            `).join('');
        } else {
            $('reviewPricing').innerHTML = `
                <div class="flex justify-between">
                    <span class="text-[#927E6D]">Fixed Price</span>
                    <span class="font-semibold">
                        ₱${Number($('productPrice').value).toFixed(2)}
                    </span>
                </div>
            `;
        }
    }

    // --------------------------------------------------
    // PRODUCT SUBMISSION
    // --------------------------------------------------

    $('productForm').addEventListener('submit', async e => {
        e.preventDefault();

        if (!validateStep(1) || !validateStep(2)) {
            return;
        }

        const submitButton = $('submitProduct');

        const hasSizes =
            document.querySelector('input[name="has_sizes"]:checked').value === 'yes';

        const formData = new FormData();

        formData.append('name', $('productName').value.trim());
        formData.append('category_id', selectedCategoryId);
        formData.append('description', $('productDescription').value.trim());
        formData.append('image', $('productImage').files[0]);
        formData.append('has_sizes', hasSizes ? 'yes' : 'no');

        if (hasSizes) {
            getSizeData().forEach((size, index) => {
                formData.append(
                    `variants[${index}][size_name]`,
                    size.name
                );

                formData.append(
                    `variants[${index}][price]`,
                    size.price
                );
            });
        } else {
            formData.append('price', $('productPrice').value);
        }

        submitButton.disabled = true;
        submitButton.textContent = 'Registering...';

        try {
            const data = await apiRequest(routes.products, {
                method: 'POST',
                body: formData
            });

            showToast(
                'success',
                'Product registered',
                `${data.product.name} has been added successfully.`
            );

            // Clear temporary image preview.
            if (imageURL) {
                URL.revokeObjectURL(imageURL);
                imageURL = null;
            }

            // Reset form and wizard.
            $('productForm').reset();

            $('sizeCards').innerHTML = '';
            sizeCounter = 0;

            clearSelectedCategory();

            $('descriptionCount').textContent = '0 / 250';
            $('imageFileName').textContent = 'No image selected.';

            $('previewImage').src = '';
            $('previewImage').classList.add('hidden');
            $('previewImageEmpty').classList.remove('hidden');

            $('productPrice').required = true;

            $('singlePriceSection').classList.remove('hidden');
            $('multipleSizesSection').classList.add('hidden');

            setProductCode();

            updatePreview();
            showStep(1);

            // Refresh the page after the toast has appeared.
            setTimeout(() => {
                window.location.href = @json(route('admin.inventory'));
            }, 1600);

        } catch (error) {
            showToast(
                'error',
                'Product registration failed',
                error.message
            );
        } finally {
            submitButton.disabled = false;
            submitButton.textContent = 'Register Product';
        }
    });

    // --------------------------------------------------
    // INITIALIZE
    // --------------------------------------------------

    async function initialize() {
        await loadCategories();

        renderCategories();
        showStep(1);
        updatePreview();
    }

    initialize();
});

    </script>

</body>
</html>