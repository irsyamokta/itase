@props(['page', 'component', 'data' => []])

<section x-data="{ page: '{{ $page }}', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
    <x-partials.preloader />
    <div class="flex h-screen overflow-hidden">
        <x-partials.sidebar />
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <x-partials.header />
            <main>
                <x-dynamic-component :component="$component" :data="$data" />
            </main>
        </div>
    </div>
</section>
