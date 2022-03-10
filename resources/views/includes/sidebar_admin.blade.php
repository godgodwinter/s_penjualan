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
    <li class="menu-item {{$pages=='label'?'active': ''}}">
        <a
            href="{{route('admin.label')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-tags"></i>
            <div data-i18n="Support">Label</div>
        </a>
        </li>
        <li class="menu-item {{$pages=='label'?'active': ''}}">
            <a
                href="{{route('admin.label')}}"
                class="menu-link"
            >
            <i class="menu-icon fa-solid fa-address-book"></i>
                <div data-i18n="Support">Pelanggan</div>
            </a>
            </li>

        <li class="menu-item {{$pages=='label'?'active': ''}}">
            <a
                href="{{route('admin.label')}}"
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


    <li class="menu-item {{$pages=='portofolio'?'active': ''}}">
        <a
            href="{{route('admin.portofolio')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-clipboard-check"></i>
            <div data-i18n="Support">Konfirmasi Pembayaran</div>
        </a>
        </li>

    <li class="menu-item {{$pages=='portofolio'?'active': ''}}">
        <a
            href="{{route('admin.portofolio')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-file-invoice"></i>
            <div data-i18n="Support">Invoice</div>
        </a>
        </li>

<!-- Transaksi -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi</span></li>
<li class="menu-item {{$pages=='kategori'?'active': ''}}">
    <a
        href="{{route('dev.crud')}}"
        class="menu-link"
    >
    <i class="menu-icon fa-solid fa-table-cells"></i>
        <div data-i18n="Support">Kategori</div>
    </a>
    </li>

<!-- Layouts -->
<li class="menu-item">
<a href="javascript:void(0);" class="menu-link menu-toggle">
    {{-- <i class="menu-icon tf-icons bx bx-steam"></i> --}}
    <i class="menu-icon tf-icons fa-solid fa-book-journal-whills"></i>
    <div data-i18n="Layouts">Layouts</div>
</a>

<ul class="menu-sub">
    <li class="menu-item">
    <a href="layouts-without-menu.html" class="menu-link">
        <div data-i18n="Without menu">Profile</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="layouts-without-navbar.html" class="menu-link">
        <div data-i18n="Without navbar">Form Create</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="layouts-container.html" class="menu-link">
        <div data-i18n="Container">Form Edit</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="layouts-fluid.html" class="menu-link">
        <div data-i18n="Fluid">Settings</div>
    </a>
    </li>
    <li class="menu-item">
    <a href="layouts-blank.html" class="menu-link">
        <div data-i18n="Blank">Login</div>
    </a>
    </li>
</ul>
</li>

<!-- Forms & Tables -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
<!-- Tables -->
<li class="menu-item">
<a href="tables-basic.html" class="menu-link">
    <i class="menu-icon tf-icons fa-solid fa-table"></i>
    <div data-i18n="Tables">Tables</div>
</a>
</li>
<!-- Misc -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
<li class="menu-item">
<a
    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
    target="_blank"
    class="menu-link"
>
<i class="menu-icon tf-icons fa-solid fa-phone"></i>
    <div data-i18n="Support">Support</div>
</a>
</li>
<li class="menu-item">
<a
    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
    target="_blank"
    class="menu-link"
>
<i class="menu-icon tf-icons fa-solid fa-passport"></i>
    <div data-i18n="Documentation">Documentation</div>
</a>
</li>
