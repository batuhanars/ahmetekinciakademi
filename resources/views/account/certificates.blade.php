@extends('account.layout.main')
@section('title', 'Sertifikalarım')
@section('content')
    <div class="dashboard__content bg-light-4" id="certificate_app">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">Sertifikalarım</h1>
                <div class="mt-10 text-dark-1">Sertifika bilgilerinizi buradan takip edebilirsiniz.</div>

            </div>
        </div>



        <div class="row y-gap-30 text-dark-1">
            <div class="col-12">
                <div class="rounded-16 bg-white shadow-4 -dark-bg-dark-1 h-100">

                    <div class="py-30 px-30">

                        <div class="mt-40">
                            <div class="px-30 py-20 bg-light-7 rounded-8">
                                <div class="row x-gap-10">
                                    <div class="col-lg-4">
                                        <div class="text-purple-1">Sertifika</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="text-purple-1">Tarih</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="text-purple-1"></div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($certificates as $certificate)
                                <div class="px-30 border-bottom-light">
                                    <div class="row x-gap-10 items-center py-25">
                                        <div class="col-lg-4">
                                            <div class="d-flex items-center">
                                                <img src="{{ $certificate->image }}" alt="{{ $certificate->title }}"
                                                    class="mr-3" style="width: 40px; height: 40px;">
                                                {{ $certificate->title }}
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="text-14 lh-12">{{ $certificate->created_at->format('Y-m-d') }}</div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ $certificate->image }}" download type="button"
                                                    class="button -light-1 text-white ms-3 px-2 py-2 text-white">
                                                    <i class="fas fa-file-download"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row justify-center pt-30">
                            <div class="col-auto">
                                {{ $certificates->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>

@endsection
