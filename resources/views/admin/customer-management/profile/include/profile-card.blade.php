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
                    <div class="text-muted">{{ $customer->corporate->company_name ?? '' }}</div>
                    <div class="mt-2">
                        <a href="javascript:;"
                            class="btn btn-sm btn-primary fw-bold me-2 py-2 px-3 px-xxl-5 my-1">{{ $customer->corporateOrIndividual() }}</a>
                    </div>
                </div>
            </div>
            <div class="py-9">
                @if ($customer->type == 'corporate')
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="fw-bold me-2">Şirket:</span>
                        <a href="javascript:;"
                            class="text-muted text-hover-primary">{{ $customer->corporate->company_name ?? '' }}</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="fw-bold me-2">Vergi Numarası:</span>
                        <a href="javascript:;"
                            class="text-muted text-hover-primary">{{ $customer->corporate->tax_number ?? '' }}</a>
                    </div>
                @else
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="fw-bold me-2">T.C. Kimlik Numarası</span>
                        <a href="javascript:;"
                            class="text-muted text-hover-primary">{{ $customer->individual->tc_no ?? '' }}</a>
                    </div>
                @endif
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold me-2">E-Posta:</span>
                    <a href="javascript:;" class="text-muted text-hover-primary">{{ $user->email }}</a>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="fw-bold me-2">Telefon:</span>
                    <span class="text-muted">{{ $user->phone }}</span>
                </div>
            </div>
            <div class="menu menu-dark menu-hover-primary menu-hover-bg menu-active-primary menu-active-bg menu-column">
                <div class="menu-item mb-2">
                    <a href="{{ route('panel.customers.profile.info', $user) }}"
                        class="menu-link py-4 {{ Request::routeIs('panel.customers.profile.info') ? 'active' : '' }}"
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
                    <a href="{{ route('panel.customers.invoice.info', $user) }}"
                        class="menu-link py-4 {{ Request::routeIs('panel.customers.invoice.info') ? 'active' : '' }}"
                        style="cursor: pointer;">
                        <span class="menu-icon me-2">
                            <span class="svg-icon">
                                <i class="fas fs-6 fa-file-invoice"></i>
                            </span>
                        </span>
                        <span class="menu-title fs-6">Fatura Bilgileri</span>
                    </a>
                </div>
                <div class="menu-item mb-2">
                    <a href="{{ route('panel.customers.invoices', $user) }}"
                        class="menu-link py-4 {{ Request::routeIs('panel.customers.invoices') ? 'active' : '' }}"
                        style="cursor: pointer;">
                        <span class="menu-icon me-2">
                            <span class="svg-icon">
                                <i class="fas fs-6 fa-receipt"></i>
                            </span>
                        </span>
                        <span class="menu-title fs-6">Faturalar</span>
                        <span
                            class="menu-badge badge badge-light-danger badge-rounded fw-bold">{{ $customer->invoices->where('status', 0)->count() }}</span>
                    </a>
                </div>
                <div class="menu-item mb-2">
                    <a href="{{ route('panel.customers.education.info', $user) }}"
                        class="menu-link py-4 {{ Request::routeIs('panel.customers.education.info') ? 'active' : '' }}"
                        style="cursor: pointer;">
                        <span class="menu-icon me-2">
                            <span class="svg-icon">
                                <i class="fas fs-6 fa-graduation-cap"></i>
                            </span>
                        </span>
                        <span class="menu-title fs-6">Kurs
                            Bilgileri
                        </span>
                    </a>
                </div>
                <div class="menu-item mb-2">
                    <a href="{{ route('panel.customers.certificates', $user) }}"
                        class="menu-link py-4 {{ Request::routeIs('panel.customers.certificates') ? 'active' : '' }}"
                        style="cursor: pointer;">
                        <span class="menu-icon me-2">
                            <span class="svg-icon">
                                <i class="fas fs-6 fa-award"></i>
                            </span>
                        </span>
                        <span class="menu-title fs-6">Sertifikalar
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
