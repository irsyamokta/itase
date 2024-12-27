<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-dark duration-300 ease-linear lg:static lg:translate-x-0 overflow-hidden"
    @click.outside="sidebarToggle = false">
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
        <a href="{{ route('dashboard') }}">
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
                    <!-- Menu Item Dashboard -->
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-secondary"
                            href="{{ route('homepage') }}" :class="page.includes('dashboard') ? 'bg-secondary' : ''">
                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.10322 0.956299H2.53135C1.5751 0.956299 0.787598 1.7438 0.787598 2.70005V6.27192C0.787598 7.22817 1.5751 8.01567 2.53135 8.01567H6.10322C7.05947 8.01567 7.84697 7.22817 7.84697 6.27192V2.72817C7.8751 1.7438 7.0876 0.956299 6.10322 0.956299ZM6.60947 6.30005C6.60947 6.5813 6.38447 6.8063 6.10322 6.8063H2.53135C2.2501 6.8063 2.0251 6.5813 2.0251 6.30005V2.72817C2.0251 2.44692 2.2501 2.22192 2.53135 2.22192H6.10322C6.38447 2.22192 6.60947 2.44692 6.60947 2.72817V6.30005Z"
                                    fill="" />
                                <path
                                    d="M15.4689 0.956299H11.8971C10.9408 0.956299 10.1533 1.7438 10.1533 2.70005V6.27192C10.1533 7.22817 10.9408 8.01567 11.8971 8.01567H15.4689C16.4252 8.01567 17.2127 7.22817 17.2127 6.27192V2.72817C17.2127 1.7438 16.4252 0.956299 15.4689 0.956299ZM15.9752 6.30005C15.9752 6.5813 15.7502 6.8063 15.4689 6.8063H11.8971C11.6158 6.8063 11.3908 6.5813 11.3908 6.30005V2.72817C11.3908 2.44692 11.6158 2.22192 11.8971 2.22192H15.4689C15.7502 2.22192 15.9752 2.44692 15.9752 2.72817V6.30005Z"
                                    fill="" />
                                <path
                                    d="M6.10322 9.92822H2.53135C1.5751 9.92822 0.787598 10.7157 0.787598 11.672V15.2438C0.787598 16.2001 1.5751 16.9876 2.53135 16.9876H6.10322C7.05947 16.9876 7.84697 16.2001 7.84697 15.2438V11.7001C7.8751 10.7157 7.0876 9.92822 6.10322 9.92822ZM6.60947 15.272C6.60947 15.5532 6.38447 15.7782 6.10322 15.7782H2.53135C2.2501 15.7782 2.0251 15.5532 2.0251 15.272V11.7001C2.0251 11.4188 2.2501 11.1938 2.53135 11.1938H6.10322C6.38447 11.1938 6.60947 11.4188 6.60947 11.7001V15.272Z"
                                    fill="" />
                                <path
                                    d="M15.4689 9.92822H11.8971C10.9408 9.92822 10.1533 10.7157 10.1533 11.672V15.2438C10.1533 16.2001 10.9408 16.9876 11.8971 16.9876H15.4689C16.4252 16.9876 17.2127 16.2001 17.2127 15.2438V11.7001C17.2127 10.7157 16.4252 9.92822 15.4689 9.92822ZM15.9752 15.272C15.9752 15.5532 15.7502 15.7782 15.4689 15.7782H11.8971C11.6158 15.7782 11.3908 15.5532 11.3908 15.272V11.7001C11.3908 11.4188 11.6158 11.1938 11.8971 11.1938H15.4689C15.7502 11.1938 15.9752 11.4188 15.9752 11.7001V15.272Z"
                                    fill="" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <!-- Menu Item Dashboard -->
                    <!-- Menu Item Product -->
                    <li>
                        <a href="{{ route('event') }}"
                            class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-secondary"
                            @click="selected = (selected === 'Event' ? '':'Event')"
                            :class="page.includes('event') ? 'bg-secondary' : ''">
                            <svg fill="#ffffff" width="18" height="18" viewBox="0 0 122.88 122.88" id="Layer_1"
                                data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>event-calendar</title>
                                    <path
                                        d="M81.6,4.73C81.6,2.12,84.18,0,87.37,0s5.77,2.12,5.77,4.73V25.45c0,2.61-2.58,4.73-5.77,4.73s-5.77-2.12-5.77-4.73V4.73Zm-19,56.57,6,13.91,15.07,1.35a1.2,1.2,0,0,1,1.1,1.31,1.18,1.18,0,0,1-.41.81h0l-11.41,10,3.37,14.75a1.2,1.2,0,0,1-.91,1.45,1.27,1.27,0,0,1-.94-.17l-13-7.74-13,7.78a1.22,1.22,0,0,1-1.66-.42,1.2,1.2,0,0,1-.14-.9h0L50,88.64l-11.4-10A1.22,1.22,0,0,1,38.48,77a1.26,1.26,0,0,1,.86-.4l15-1.34,6-13.93a1.21,1.21,0,0,1,1.59-.64,1.17,1.17,0,0,1,.65.64ZM29.61,4.73C29.61,2.12,32.19,0,35.38,0s5.77,2.12,5.77,4.73V25.45c0,2.61-2.58,4.73-5.77,4.73s-5.77-2.12-5.77-4.73V4.73ZM6.4,45.32H116.47V21.47a3,3,0,0,0-.86-2.07,2.92,2.92,0,0,0-2.07-.86H103a3.2,3.2,0,1,1,0-6.4h10.55a9.36,9.36,0,0,1,9.33,9.33v92.08a9.36,9.36,0,0,1-9.33,9.33H9.33A9.36,9.36,0,0,1,0,113.54V21.47a9.36,9.36,0,0,1,9.33-9.33H20.6a3.2,3.2,0,1,1,0,6.4H9.33a3,3,0,0,0-2.07.86,2.92,2.92,0,0,0-.86,2.07V45.32Zm110.07,6.41H6.4v61.81a3,3,0,0,0,.86,2.07,2.92,2.92,0,0,0,2.07.86H113.54a3,3,0,0,0,2.07-.86,2.92,2.92,0,0,0,.86-2.07V51.73Zm-66-33.19a3.2,3.2,0,0,1,0-6.4H71.91a3.2,3.2,0,1,1,0,6.4Z">
                                    </path>
                                </g>
                            </svg>
                            Daftar Lomba
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('team') }}" class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-secondary"
                            @click="selected = (selected === 'Team' ? '':'Team')"
                            :class="page.includes('team') ? 'bg-secondary' : ''">
                            <svg width="18" height="18" xmlns:dc="http://purl.org/dc/elements/1.1/"
                                xmlns:cc="http://creativecommons.org/ns#"
                                xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg"
                                xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 400 400.00001"
                                id="svg2" version="1.1" inkscape:version="0.91 r13725" sodipodi:docname="team.svg"
                                fill="#ffffff" stroke="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <defs id="defs4"></defs>
                                    <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666"
                                        borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2"
                                        inkscape:zoom="1.1341102" inkscape:cx="253.29936" inkscape:cy="39.888271"
                                        inkscape:document-units="px" inkscape:current-layer="layer2" showgrid="false"
                                        units="px" showguides="true" inkscape:guide-bbox="true"
                                        inkscape:window-width="1863" inkscape:window-height="1056"
                                        inkscape:window-x="1977" inkscape:window-y="24" inkscape:window-maximized="1">
                                    </sodipodi:namedview>
                                    <metadata id="metadata7">
                                        <rdf:rdf>
                                            <cc:work rdf:about="">
                                                <dc:format>image/svg+xml</dc:format>
                                                <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage">
                                                </dc:type>
                                                <dc:title></dc:title>
                                            </cc:work>
                                        </rdf:rdf>
                                    </metadata>
                                    <g inkscape:groupmode="layer" id="layer2" inkscape:label="Capa 2">
                                        <g transform="matrix(15.338502,0,0,15.338502,-10216.591,-9424.9414)"
                                            style="display:inline;fill:#ffffff" id="g7483">
                                            <path sodipodi:nodetypes="cscccccccsccssccsscccccccscs"
                                                inkscape:connector-curvature="0" id="path7377"
                                                d="m 683.35352,627.41602 c -2.41792,-3e-5 -4.64949,0.66338 -6.30664,1.99218 -1.65716,1.3288 -2.69926,3.34729 -2.69922,5.82618 l 0,0.002 0,0.002 c 2.4e-4,0.0369 0.004,2.22266 0.004,2.22266 l -0.004,2.97265 17.7755,0 0.0149,-2.97265 c 0,0 0.003,-1.07407 0.004,-1.48633 10e-4,-0.41226 0.005,-0.75492 0.004,-0.72461 l 0,-0.008 0,-0.008 c 0,-2.7272 -1.25565,-4.76115 -2.97656,-6.01954 -1.72091,-1.25838 -3.87127,-1.79881 -5.81445,-1.79882 z m 0,1.5 c 1.65762,10e-6 3.52904,0.48699 4.92773,1.50976 1.39869,1.02277 2.36328,2.52427 2.36328,4.8086 -0.002,0.10825 -0.003,0.33036 -0.004,0.73437 -10e-4,0.4126 -0.002,0.95111 -0.004,1.48828 -0.002,0.53434 -0.005,1.0662 -0.008,1.47656 l -14.77149,0 c -0.002,-0.41034 -0.005,-0.94292 -0.006,-1.47656 -0.003,-1.07151 -0.003,-2.1053 -0.004,-2.22265 -4e-5,-2.07282 0.80564,-3.58893 2.13672,-4.65626 1.33107,-1.06732 3.22715,-1.66213 5.36914,-1.6621 z"
                                                style="color:#ffffff;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#ffffff;letter-spacing:normal;word-spacing:normal;text-transform:none;direction:ltr;block-progression:tb;writing-mode:lr-tb;baseline-shift:baseline;text-anchor:start;white-space:normal;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#ffffff;solid-opacity:1;fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.50000012;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;marker:none;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate">
                                            </path>
                                            <path sodipodi:nodetypes="ssssssssss" inkscape:connector-curvature="0"
                                                id="ellipse7379"
                                                d="m 683.35352,614.59375 c -3.15838,0 -5.73438,2.57163 -5.73438,5.72656 0,3.15493 2.576,5.72852 5.73438,5.72852 3.15837,0 5.73632,-2.57359 5.73632,-5.72852 0,-3.15493 -2.57795,-5.72656 -5.73632,-5.72656 z m 0,1.5 c 2.34915,0 4.23632,1.88374 4.23632,4.22656 0,2.34283 -1.88717,4.22852 -4.23632,4.22852 -2.34916,0 -4.23438,-1.88569 -4.23438,-4.22852 0,-2.34282 1.88522,-4.22656 4.23438,-4.22656 z"
                                                style="color:#ffffff;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#ffffff;letter-spacing:normal;word-spacing:normal;text-transform:none;direction:ltr;block-progression:tb;writing-mode:lr-tb;baseline-shift:baseline;text-anchor:start;white-space:normal;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#ffffff;solid-opacity:1;fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.50000012;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;marker:none;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate">
                                            </path>
                                            <path sodipodi:nodetypes="csccccccccccccscccccccc"
                                                inkscape:connector-curvature="0" id="path7381"
                                                d="m 673.94727,628.01172 c -2.25371,-7e-5 -4.22271,0.62591 -5.63477,1.88867 -1.41206,1.26276 -2.21318,3.14646 -2.21289,5.42969 l 0,0.002 0,0.002 c 2e-4,0.0398 0.004,2.17383 0.004,2.17383 l 0.0151,2.92578 6.13949,0 0.83195,0 0,-1.5 -0.83195,0 -4.65039,0 c -0.002,-0.39977 -0.003,-0.91109 -0.004,-1.42773 -0.002,-1.05307 -0.003,-2.08047 -0.004,-2.17969 7.1e-4,-1.94179 0.63463,-3.34239 1.71289,-4.30664 1.07829,-0.96428 2.65593,-1.50709 4.63086,-1.50781 0.22317,0.002 0.88465,0.0668 0.88465,0.0668 0,0 0.76341,-0.91136 1.10949,-1.35201 l -0.74023,-0.11523 c -0.41195,-0.0641 -0.829,-0.0972 -1.2461,-0.0996 l -0.002,0 -0.002,0 z"
                                                style="color:#ffffff;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#ffffff;letter-spacing:normal;word-spacing:normal;text-transform:none;direction:ltr;block-progression:tb;writing-mode:lr-tb;baseline-shift:baseline;text-anchor:start;white-space:normal;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#ffffff;solid-opacity:1;fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.50000012;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;marker:none;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate">
                                            </path>
                                            <path sodipodi:nodetypes="cccccccsccccccccc"
                                                inkscape:connector-curvature="0" id="path7383"
                                                d="m 673.87221,616.52862 c -2.84899,-0.02 -5.19347,2.28542 -5.21258,5.13086 -0.0194,2.84543 2.29365,5.18236 5.14265,5.20094 1.23249,0.007 2.42149,-0.42628 3.35789,-1.21168 0.11378,-0.0953 0.22272,-0.1953 0.32821,-0.30051 l 0.3809,-0.38274 -0.9092,-1.20877 -0.40214,0.41692 c -0.0737,0.0764 -0.2804,0.25865 -0.36072,0.32598 -0.66495,0.55773 -1.51097,0.86609 -2.38674,0.86083 -2.03996,-0.0133 -3.66475,-1.65797 -3.65089,-3.69082 0.0137,-2.03286 1.66056,-3.65537 3.70051,-3.64106 0.62194,0.004 1.2341,0.16514 1.77616,0.46907 l 0.65378,0.36772 c 0,0 0.46896,-1.22541 0.53496,-1.41477 l -0.45526,-0.26051 c -0.76307,-0.42787 -1.62247,-0.65518 -2.49753,-0.66146 z"
                                                style="color:#ffffff;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#ffffff;letter-spacing:normal;word-spacing:normal;text-transform:none;direction:ltr;block-progression:tb;writing-mode:lr-tb;baseline-shift:baseline;text-anchor:start;white-space:normal;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#ffffff;solid-opacity:1;fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1.50000024;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;marker:none;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            Registrasi Tim
                        </a>
                    </li>
                    <li>
                        <a class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-secondary"
                            href="" @click="selected = (selected === 'Order' ? '':'Order')"
                            :class="page.includes('Order') ? 'bg-secondary' : ''">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                stroke="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M6.72827 19.7C7.54827 18.82 8.79828 18.89 9.51828 19.85L10.5283 21.2C11.3383 22.27 12.6483 22.27 13.4583 21.2L14.4683 19.85C15.1883 18.89 16.4383 18.82 17.2583 19.7C19.0383 21.6 20.4883 20.97 20.4883 18.31V7.04C20.4883 3.01 19.5483 2 15.7683 2H8.20828C4.42828 2 3.48828 3.01 3.48828 7.04V18.3C3.49828 20.97 4.95827 21.59 6.72827 19.7Z"
                                        stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M9.25 10H14.75" stroke="#ffffff" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            Transaksi
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
