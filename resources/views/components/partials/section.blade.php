@props(['page', 'component', 'data' => [], 'route'])

<section x-data="{ page: '{{ $page }}', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
    <x-partials.preloader />
    <div class="flex h-screen overflow-hidden">
        <x-partials.sidebar />
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <x-partials.header :route="$route" />
            <main>
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-5">
                    <x-dynamic-component :component="$component" :data="$data" />
                </div>
            </main>
        </div>
    </div>
</section>
