<li class="menu-item {{$pages=='settings'?'active': ''}}">
    <a
        href="{{route('dev.settings')}}"
        class="menu-link"
    >
    <i class="menu-icon fas fa-cog"></i>
        <div data-i18n="Support">Pengaturan</div>
    </a>
    </li>

<!-- Mastering -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Mastering</span></li>
    {{-- <li class="menu-item {{$pages=='label'?'active': ''}}">
        <a
            href="{{route('admin.label')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-tags"></i>
            <div data-i18n="Support">Label</div>
        </a>
        </li> --}}
        <li class="menu-item {{$pages=='pelanggan'?'active': ''}}">
            <a
                href="{{route('admin.pelanggan')}}"
                class="menu-link"
            >
            <i class="menu-icon fa-solid fa-address-book"></i>
                <div data-i18n="Support">Pelanggan</div>
            </a>
            </li>

        <li class="menu-item {{$pages=='administrator'?'active': ''}}">
            <a
                href="{{route('admin.administrator')}}"
                class="menu-link"
            >
            <i class="menu-icon fa-solid fa-user-shield"></i>
                    <div data-i18n="Support">Administrator</div>
            </a>
            </li>
    <li class="menu-item {{$pages=='produk'?'active': ''}}">
        <a
            href="{{route('admin.produk')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-brands fa-product-hunt"></i>
            <div data-i18n="Support">Produk</div>
        </a>
        </li>

    {{-- <li class="menu-item {{$pages=='portofolio'?'active': ''}}">
        <a
            href="{{route('admin.portofolio')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-boxes-stacked"></i>
            <div data-i18n="Support">Stok</div>
        </a>
        </li> --}}


    <li class="menu-item {{$pages=='restok'?'active': ''}}">
        <a
            href="{{route('admin.restok')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-cubes"></i>
            <div data-i18n="Support">Re-Stok</div>
        </a>
        </li>


<!-- Transaksi -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi</span></li>
    <li class="menu-item {{$pages=='transaksi'?'active': ''}}">
        <a
            href="{{route('admin.transaksi')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-cart-shopping"></i>
            <div data-i18n="Support">Transaksi</div>
        </a>
        </li>


    {{-- <li class="menu-item {{$pages=='konfirmasi'?'active': ''}}">
        <a
            href="{{route('admin.konfirmasi')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-clipboard-check"></i>
            <div data-i18n="Support">Konfirmasi Pembayaran</div>
        </a>
        </li> --}}

<!-- Transaksi -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Menu Laporan</span></li>
    <li class="menu-item {{$pages=='laporanrestok'?'active': ''}}">
        <a
            href="#"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-file-invoice"></i>
            <div data-i18n="Support">Laporan Pengadaan / Restok Produk</div>
        </a>
        </li>


    <li class="menu-item {{$pages=='laporanpenjualan'?'active': ''}}">
        <a
            href="#"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-file-invoice"></i>
            <div data-i18n="Support">Laporan Penjualan</div>
        </a>
        </li>
