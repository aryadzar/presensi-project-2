<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-gradient-to-b from-blue-500 to-blue-600 duration-300 ease-linear dark:from-blue-800 dark:to-blue-950 lg:static lg:translate-x-0"
    @click.outside="sidebarToggle = false">

    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
        <a href="{{ route('operator.dashboard') }}">
            <img src="{{ asset('/assets/logo_absensi/image.png') }}" alt="Logo" />
        </a>
        <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
            <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                    fill="" />
            </svg>
        </button>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{ selected: '' }">
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-white">MENU</h3>

                <ul class="mb-6 flex flex-col gap-7">
                    <!-- Dashboard Menu Item -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-blue-400 cursor-pointer h-[45px] dark:hover:bg-meta-4 {{ Route::currentRouteName() == 'operator.dashboard' ? 'bg-white font-bold text-slate-950' : '' }}"
                            href="{{ route('operator.dashboard') }}">
                            <i class="fa-solid fa-house"></i>
                            Dashboard
                        </a>
                    </li>

                    <!-- Administrasi Dropdown -->
                    <li x-data="{ selected: '{{ in_array(Route::currentRouteName(), ['operator.validasisurat', 'operator.daftarkaryawan', 'operator.devicekaryawan']) ? 'Administrasi' : '' }}' }">
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-blue-400 cursor-pointer h-[45px] dark:hover:bg-meta-4 {{ in_array(Route::currentRouteName(), ['operator.validasisurat', 'operator.daftarkaryawan', 'operator.devicekaryawan']) ? 'bg-white font-bold text-slate-950' : '' }}"
                            href="#"
                            @click.prevent="selected = (selected === 'Administrasi' ? '' : 'Administrasi')">
                            <i class="fa-solid fa-user"></i>
                            Administrasi
                            <svg class="absolute right-4 top-1/2 -translate-y-1/2 fill-current"
                                :class="{ 'rotate-180': (selected === 'Administrasi') }" width="20" height="20"
                                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z"
                                    fill="" />
                            </svg>
                        </a>

                        <!-- Dropdown Menu -->
                        <div class="translate transform overflow-hidden"
                            :class="(selected === 'Administrasi') ? 'block' : 'hidden'">
                            <ul class="mb-5.5 mt-4 flex flex-col gap-5 pl-6">
                                <li>
                                    <a class="group relative flex items-center gap-2.5 rounded-md px-4 font-semibold text-white duration-300 ease-in-out hover:bg-blue-400 dark:hover:bg-meta-4 hover:text-white {{ Route::currentRouteName() === 'operator.daftarkaryawan' ? 'text-white' : '' }}"
                                        href="{{ route('operator.daftarkaryawan') }}">
                                        @if (Route::currentRouteName() === 'operator.daftarkaryawan')
                                            <i class="fa-solid fa-chevron-right"></i>
                                        @endif
                                        Kelola Karyawan Magang/PKL
                                    </a>
                                </li>
                                <li>
                                    <a class="group relative flex items-center gap-2.5 rounded-md px-4 text-white font-semibold duration-300 ease-in-out hover:bg-blue-400 dark:hover:bg-meta-4 hover:text-white {{ Route::currentRouteName() === 'operator.validasisurat' ? 'text-white' : '' }}"
                                        href="{{ route('operator.validasisurat') }}">
                                        @if (Route::currentRouteName() === 'operator.validasisurat')
                                            <i class="fa-solid fa-chevron-right"></i>
                                        @endif
                                        Validasi Surat Izin
                                    </a>
                                </li>
                                <li>
                                    <a class="group relative flex items-center gap-2.5 rounded-md px-4 text-white font-semibold duration-300 ease-in-out hover:bg-blue-400 dark:hover:bg-meta-4 hover:text-white {{ Route::currentRouteName() === 'operator.devicekaryawan' ? 'text-white' : '' }}"
                                        href="{{ route('operator.devicekaryawan') }}">
                                        @if (Route::currentRouteName() === 'operator.devicekaryawan')
                                            <i class="fa-solid fa-chevron-right"></i>
                                        @endif
                                        Perangkat Karyawan
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Riwayat Hadir Karyawan Menu Item -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-blue-400 cursor-pointer h-[45px] dark:hover:bg-meta-4 {{ Route::currentRouteName() == 'riwayatoperator' ? 'bg-white font-bold text-slate-950' : '' }}"
                            href="{{ route('riwayatoperator') }}">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            Riwayat Hadir Karyawan
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</aside>
