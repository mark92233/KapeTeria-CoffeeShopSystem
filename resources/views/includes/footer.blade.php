
<footer class="mt-auto border-t border-[#E9DED1] bg-[#F8F1E8]">

    <div class="flex flex-col items-center justify-between gap-3 px-4 py-5 sm:flex-row sm:px-6 lg:px-8">

        {{-- BRAND --}}
        <div class="flex items-center gap-2.5">

            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#3B281D] text-[#EAD0A8]">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="19" height="19"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.7"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M10 2v2"/>
                    <path d="M14 2v2"/>
                    <path d="M4 7h16l-1.5 12h-13L4 7Z"/>
                    <path d="M7 7c0-2 2-3 5-3s5 1 5 3"/>
                    <path d="M20 10h1a2 2 0 0 1 0 4h-2"/>
                </svg>
            </div>

            <div>
                <p class="text-sm font-semibold tracking-wide text-[#3B281D]">
                    BeanVista Coffee Co.
                </p>

                <p class="text-[11px] text-[#9B8877]">
                    Every cup tells a story.
                </p>
            </div>

        </div>


        {{-- COPYRIGHT --}}
        <div class="flex flex-col items-center gap-1 text-xs text-[#9B8877] sm:flex-row sm:gap-2">

            <span>
                © {{ date('Y') }} BeanVista Coffee Co.
            </span>

            <span class="hidden sm:inline">·</span>

            <span>
                Crafted with care
                <span class="text-[#B77B4B]">♥</span>
            </span>

        </div>

    </div>

</footer>
