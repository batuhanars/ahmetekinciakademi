@extends('instructor.layout.main')
@section('title', 'Toplu SMS Gönder')
@section('css')
@endsection
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            @include('admin.breadcrumb', [
                'items' => [
                    [
                        'link' => route('instructor.index'),
                        'title' => 'İstatistikler',
                    ],
                    [
                        'link' => '',
                        'title' => 'SMS Yönetimi',
                    ],
                    [
                        'link' => '',
                        'title' => 'Toplu SMS Gönder',
                    ],
                ],
            ])
            <div class="card">
                <div class="card-header d-flex flex-column pt-4">
                    <h3 class="card-title">
                        Toplu SMS Gönder
                    </h3>
                    <p class="text-muted">
                        Buradan toplu SMS gönderebilirsiniz.
                    </p>
                </div>
                <form action="{{ route('instructor.multi-sms.send') }}" method="post">
                    @csrf
                    <div class="card-body">
                        {{-- <div class="form-group mb-5">
                             <label for="phones" class="form-label">Gsm No</label>
                             <span class="text-danger d-block">{{ $errors->first('phones') }}</span>
                             <input type="text" name="phones" id="phones" class="form-control" placeholder="Gsm No">
                         </div> --}}
                        <div class="form-group mb-5" v-if="!sendAllUsers">
                            <label for="phones" class="form-label">Kullanıcılar</label>
                            <select name="phones[]" id="phones" class="form-select" data-placeholder="Kullanıcı Seç"
                                multiple>
                                @foreach ($users as $user)
                                    <option data-kt-rich-content-subcontent="{{ $user->phone }}"
                                        data-kt-rich-content-icon="{{ $user->image }}" value="{{ $user->phone }}">
                                        {{ $user->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <input v-else type="text" name="phones"
                             value="@foreach ($users as $user) {{ $user->phone }} @endforeach"> --}}
                        <div class="form-group mb-5">
                            <label for="message" class="form-label">Mesaj</label>
                            <span class="text-danger d-block">{{ $errors->first('message') }}</span>
                            <textarea name="message" id="message" class="form-control" data-kt-autosize="true" placeholder="Mesaj"></textarea>
                        </div>
                        {{-- <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="phones" type="checkbox" v-model="sendAllUsers"
                                checked="checked" />
                            <span class="form-check-label fw-semibold text-muted">
                                Herkese Gönder
                            </span>
                        </label> --}}
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </div>
                </form>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('js')
    <script>
        //  let phones = document.querySelector("#phones");
        //  phones.addEventListener("keydown", (event) => {
        //      var tempNumber = event.target.value.trim();
        //      event.target.value = tempNumber;
        //      if (event.keyCode == 32) {
        //          if (event.target.value != "") {
        //              var tempNumber = event.target.value.replace(/$/g, ",").replace(/,[,\s]*,/g, ',');
        //              event.target.value = tempNumber;
        //          }
        //      }
        //  })

        Vue.createApp({
            data() {
                return {
                    sendAllUsers: false
                }
            }
        }).mount("#app")


        // Format options
        const optionFormat = (item) => {
            if (!item.id) {
                return item.text;
            }

            var span = document.createElement('span');
            var template = '';

            template += '<div class="d-flex align-items-center">';
            if (item.element.getAttribute('data-kt-rich-content-icon')) {
                template += '<img src="' + item.element.getAttribute('data-kt-rich-content-icon') +
                    '" class="rounded-circle h-40px me-3" alt="' + item.text + '"/>';
            } else {
                template += '<span class="pe-4 fs-2">' + item.text.slice(0, 1).toUpperCase() + '</span>';
            }
            template += '<div class="d-flex flex-column">'
            template += '<span class="fs-6 fw-bold lh-1">' + item.text + '</span>';
            template += '<span class="text-muted fs-7">' + item.element.getAttribute(
                'data-kt-rich-content-subcontent') + '</span>';
            template += '</div>';
            template += '</div>';

            span.innerHTML = template;

            return $(span);
        }

        // Init Select2 --- more info: https://select2.org/
        $('#phones').select2({
            placeholder: "",
            minimumResultsForSearch: Infinity,
            templateSelection: optionFormat,
            templateResult: optionFormat
        });
    </script>
@endsection
