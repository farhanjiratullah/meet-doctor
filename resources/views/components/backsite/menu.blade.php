<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->routeIs('backsite.dashboard') ? 'active' : '' }}">
                <a href="{{ route('backsite.dashboard') }}">
                    <i
                        class="{{ request()->routeIs('backsite.dashboard') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}"></i><span
                        class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            <li class=" navigation-header"><span data-i18n="Application">Application</span><i class="la la-ellipsis-h"
                    data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
            </li>

            @can('management_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->routeIs('backsite.permissions.*') || request()->routeIs('backsite.roles.*') || request()->routeIs('backsite.type-users') || request()->routeIs('backsite.users.*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                            class="menu-title" data-i18n="Management Access">Management Access</span></a>
                    <ul class="menu-content">
                        @can('permission_access')
                            <li class="{{ request()->routeIs('backsite.permissions.*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.permissions.index') }}">
                                    <i></i><span>Permissions</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->routeIs('backsite.roles.*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.roles.index') }}">
                                    <i></i><span>Roles</span>
                                </a>
                            </li>
                        @endcan
                        @can('type_user_access')
                            <li class="{{ request()->routeIs('backsite.type-users') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.type-users') }}">
                                    <i></i><span>Type Users</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->routeIs('backsite.users.*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.users.index') }}">
                                    <i></i><span>Users</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('master_data_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->routeIs('backsite.specialists.*') || request()->routeIs('backsite.consultations.*') || request()->routeIs('backsite.config-payment') ? 'bx bx-customize bx-flashing' : 'bx bx-customize' }}"></i><span
                            class="menu-title" data-i18n="Master Data">Master Data</span></a>
                    <ul class="menu-content">

                        @can('specialist_access')
                            <li class="{{ request()->routeIs('backsite.specialists.*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.specialists.index') }}">
                                    <i></i><span>Specialists</span>
                                </a>
                            </li>
                        @endcan

                        @can('consultation_access')
                            <li class="{{ request()->routeIs('backsite.consultations.*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.consultations.index') }}">
                                    <i></i><span>Consultations</span>
                                </a>
                            </li>
                        @endcan

                        @can('config_payment_access')
                            <li class="{{ request()->routeIs('backsite.config_payment') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.config-payment.index') }}">
                                    <i></i><span>Config Payment</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('operational_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->routeIs('backsite.doctors.*') || request()->routeIs('backsite.hospital-patients.*') || request()->routeIs('backsite.appointments.*') || request()->routeIs('backsite.transactions.*') ? 'bx bx-hive bx-flashing' : 'bx bx-hive' }}"></i><span
                            class="menu-title" data-i18n="Operational">Operational</span></a>
                    <ul class="menu-content">

                        @can('doctor_access')
                            <li class="{{ request()->routeIs('backsite.doctors.*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.doctors.index') }}">
                                    <i></i><span>Doctors</span>
                                </a>
                            </li>
                        @endcan

                        @can('hospital_patient_access')
                            <li class="{{ request()->routeIs('backsite.hospital-patients.*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.hospital-patients.index') }}">
                                    <i></i><span>Hospital Patients</span>
                                </a>
                            </li>
                        @endcan


                        {{-- here you can add nurse --}}


                        @can('appointment_access')
                            <li class="{{ request()->routeIs('backsite.appointments.*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.appointments.index') }}">
                                    <i></i><span>Appointment</span>
                                </a>
                            </li>
                        @endcan

                        @can('transaction_access')
                            <li class="{{ request()->routeIs('backsite.transactions.*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.transactions.index') }}">
                                    <i></i><span>Transaction</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

        </ul>
    </div>
</div>

<!-- END: Main Menu-->
