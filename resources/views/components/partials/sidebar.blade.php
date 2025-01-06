<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-dark duration-300 ease-linear lg:static lg:translate-x-0 overflow-hidden"
    @click.outside="sidebarToggle = false">
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
        <a href="">
            <h1 class="text-4xl font-bold text-white">ITASE 6.0</h1>
        </a>
    </div>
    <!-- SIDEBAR HEADER -->
    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{ selected: ('Dashboard') }">
            <!-- Menu Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark1">MENU</h3>
                <ul class="mb-6 flex flex-col gap-1.5">
                    @if (Auth::user()->role == 'admin')
                        <x-list.admin.dashboard />
                        <x-list.admin.participant />
                        <x-list.admin.event />
                        <x-list.admin.submission />
                    @else
                        <x-list.client.homepage />
                        <x-list.client.event />
                        <x-list.client.register />
                        <x-list.client.transaction />
                    @endif
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
