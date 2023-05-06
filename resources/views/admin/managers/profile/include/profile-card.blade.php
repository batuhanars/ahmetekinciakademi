<div class="col-md-3">
    <div class="card card-custom card-stretch">
        <div class="card-body pt-4">
            <div class="d-flex align-items-center">
                <div class="symbol symbol-60px symbol-xxl-100px me-5">
                    <div class="symbol me-3">
                        @if ($user->image)
                            <img src="{{ $user->image }}" alt="" style="width: 100px; height: 100px;">
                        @else
                            <span
                                class="symbol-label fs-1 text-uppercase">{{ Str::limit($user->fullname, 1, '') }}</span>
                        @endif
                    </div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div><a href="javascript:;" class="fw-bold fs-5 text-dark text-hover-primary">{{ $user->fullname }}</a>
                </div>
            </div>
            <div class="py-9">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold me-2">E-Posta:</span>
                    <a href="javascript:;" class="text-muted text-hover-primary">{{ $user->email }}</a>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold me-2">Telefon:</span>
                    <span class="text-muted">{{ $user->phone }}</span>
                </div>
            </div>
            {{-- <div class="menu menu-dark menu-hover-primary menu-hover-bg menu-active-primary menu-active-bg menu-column">
                <div class="menu-item mb-2">
                    <a href="{{ route('panel.instructor.profile', $user) }}"
                        class="menu-link py-4 {{ Request::routeIs('panel.profile') ? 'active' : '' }}"
                        style="cursor: pointer;">
                        <span class="menu-icon me-2">
                            <span class="svg-icon">
                                <i class="fas fs-6 fa-user"></i>
                            </span>
                        </span>
                        <span class="menu-title fs-6">Profil
                            Bilgileri
                        </span>
                    </a>
                </div>
                <div class="menu-item mb-2">
                    <a href="{{ route('panel.instructor.profile.courses', $user) }}"
                        class="menu-link py-4 {{ Request::routeIs('panel.profile.courses') ? 'active' : '' }}"
                        style="cursor: pointer;">
                        <span class="menu-icon me-2">
                            <span class="svg-icon">
                                <i class="fas fs-6 fa-graduation-cap"></i>
                            </span>
                        </span>
                        <span class="menu-title fs-6">Kurslar
                        </span>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
