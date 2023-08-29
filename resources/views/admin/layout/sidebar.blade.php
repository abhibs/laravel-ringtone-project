    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin-dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Category</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('category-create') }}">
                            <i class="bi bi-circle"></i><span>Add Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category') }}">
                            <i class="bi bi-circle"></i><span>All Category</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Ringtone</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('ringtone-create') }}">
                            <i class="bi bi-circle"></i><span>Add Ringtone</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ringtone') }}">
                            <i class="bi bi-circle"></i><span>All Ringtone</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Forms Nav -->


        </ul>

    </aside><!-- End Sidebar-->
