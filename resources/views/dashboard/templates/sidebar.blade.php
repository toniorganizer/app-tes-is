<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            @if($title == 'Dashboard')
            <a class="nav-link " href="/">
            @else
            <a class="nav-link collapsed" href="/">
            @endif
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if(auth::user()->level == 1)
        <li class="nav-item">
            @if($title == 'Data User')
            <a class="nav-link " href="/user-data">
            @else
            <a class="nav-link collapsed" href="/user-data">
            @endif
                <i class="bi bi-folder-check"></i>
                <span>Data User</span>
            </a>
        </li>
        <li class="nav-item">
            @if($title == 'Data Pekerjaan')
            <a class="nav-link " href="/pekerjaan-data">
            @else
            <a class="nav-link collapsed" href="/pekerjaan-data">
            @endif
                <i class="bi bi-folder-check"></i>
                <span>Data Pekerjaan</span>
            </a>
        </li>
        @endif
        @if(auth::user()->level == 3)
        <li class="nav-item">
            <a class="nav-link " href="/user-data">
                <i class="bi bi-folder-check"></i>
                <span>Rekomendasi</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @endif
        <!-- 
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="bi bi-circle"></i><span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                </li>
            </ul>
        </li>End Forms Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/user-profile">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="/user-faq">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Login Page Nav -->

    </ul>

</aside><!-- End Sidebar-->