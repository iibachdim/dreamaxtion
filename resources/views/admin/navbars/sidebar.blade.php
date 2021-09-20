<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('D') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Dreamaxtion') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('admin.profile') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Admin Profile') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#profile" aria-expanded="true">
                    <i class="tim-icons icon-book-bookmark" ></i>
                    <span class="nav-link-text" >{{ __('User Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="profile">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('admin.user-list') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Daftar User') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'guru') class="active " @endif>
                            <a href="{{ route('admin.guru-list') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Daftar Guru') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'siswa') class="active " @endif>
                            <a href="{{ route('admin.siswa-list') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Daftar Siswa') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'pengajuan-guru') class="active " @endif>
                            <a href="{{ route('admin.pengajuan-guru') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Daftar Pengajuan Guru') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'jadwal') class="active " @endif>
                <a href="{{ route('admin.jadwal-list') }}">
                    <i class="tim-icons icon-calendar-60"></i>
                    <p>{{ __('Jadwal') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
