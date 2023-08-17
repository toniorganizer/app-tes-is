<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            @if($title == 'Dashboard')
            <a class="nav-link " href="/home">
            @elseif($sub_title == 'Dashboard')
            <a class="nav-link " href="/home">
            @else
            <a class="nav-link collapsed" href="/home">
            @endif
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if(auth::user()->level == 1)

        <li class="nav-item">
            @if($title == 'Data')
                <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            @else
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
             @endif
              <i class="bi bi-menu-button-wide"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse @if($title == 'Data') show @endif" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/user-data" @if($sub_title == 'Data User') class="active" @endif>
                      <i class="bi bi-circle"></i><span>Data User</span>
                    </a>
                </li>
                <li>
                    <a href="/tenaga-kerja-data" @if($sub_title == 'Data Tenaga Kerja') class="active" @endif>
                      <i class="bi bi-circle"></i><span>Data Tenaga Kerja</span>
                    </a>
                </li>
                <li>
                    <a href="/pekerjaan-data" @if($sub_title == 'Data Pekerjaan') class="active" @endif>
                      <i class="bi bi-circle"></i><span>Data Pekerjaan</span>
                    </a>
                </li>
            </ul>
          </li><!-- End Components Nav -->
        @endif
        @if(auth::user()->level == 4)

        <li class="nav-item">
            @if($title == 'Data')
                <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            @else
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
             @endif
              <i class="bi bi-menu-button-wide"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse @if($title == 'Data') show @endif" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/lowongan-data" @if($sub_title == 'Data Lowongan') class="active" @endif>
                      <i class="bi bi-circle"></i><span>Data Lowongan</span>
                    </a>
                </li>
                <li>
                    <a href="/pelamar-data" @if($sub_title == 'Data Pelamar') class="active" @endif>
                      <i class="bi bi-circle"></i><span>Data Pelamar</span>
                    </a>
                </li>
            </ul>
          </li><!-- End Components Nav -->
          
        @endif
        @if(auth::user()->level == 3)
        <li class="nav-item">
            <a class="nav-link " href="/user-data">
                <i class="bi bi-folder-check"></i>
                <span>Rekomendasi</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @endif
        @if(auth::user()->level == 2)
        <li class="nav-item">
            @if($title == 'Data Lowongan')
            <a class="nav-link " href="/data-lowongan-pekerja">
            @elseif($sub_title == 'Data Lowongan')
            <a class="nav-link " href="/data-lowongan-pekerja">
            @else
            <a class="nav-link collapsed" href="/data-lowongan-pekerja">
            @endif
                <i class="bi bi-database"></i>
                <span>Data Lowongan</span>
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
            <a class="nav-link collapsed" href="
                @if(Auth::user()->level == 4)
                    {{route('sumber.show', Auth::user()->email) }}
                @elseif(Auth::user()->level == 3)
                    {{route('pemerintah.show', Auth::user()->email) }}
                @elseif(Auth::user()->level == 2)
                    /profil-tenaga-kerja/{{Auth::user()->email}}
                @elseif(Auth::user()->level == 1)
                    /profil-admin/{{Auth::user()->email}}
                @endif
            ">
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