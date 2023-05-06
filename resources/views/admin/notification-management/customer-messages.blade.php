@extends('admin.layout.main')
@section('title', 'Öğrenci Mesajları')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            @include('admin.breadcrumb', [
                'items' => [
                    [
                        'link' => route('panel.index'),
                        'title' => 'İstatistikler',
                    ],
                    [
                        'link' => '',
                        'title' => 'Bildirim Yönetimi',
                    ],
                    [
                        'link' => '',
                        'title' => 'Mesajlar',
                    ],
                ],
            ])
            <!--begin::LaSizt-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                    <!--begin::Contacts-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header pt-7" id="kt_chat_contacts_header">
                            <!--begin::Form-->
                            <form class="w-100 position-relative" autocomplete="off">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span
                                    class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid px-15" name="search"
                                    value="" placeholder="Search by username or email..." />
                                <!--end::Input-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-5" id="kt_chat_contacts_body">
                            <!--begin::List-->
                            <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header"
                                data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px">
                                @foreach ($conversations as $conversation)
                                    <!--begin::User-->
                                    <a href="#" class="d-flex flex-stack py-4"
                                        v-on:click="messages({{ $conversation }})">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-45px symbol-circle position-relative">
                                                @if ($conversation->sender->image)
                                                    <img alt="{{ $conversation->sender->fullname }}"
                                                        src="{{ $conversation->sender->image }}" />
                                                @else
                                                    <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">
                                                        {{ Str::limit($conversation->sender->fullname, 1, '') }}
                                                    </span>
                                                @endif
                                                @if ($conversation->messages()->where('read', 0)->where('receiver_id', auth()->user()->id)->count())
                                                    <span
                                                        class="position-absolute badge-sm top-90 start-100 translate-middle badge badge-circle badge-success">
                                                        {{ $conversation->messages()->where('read', 0)->where('receiver_id', auth()->user()->id)->count() }}
                                                    </span>
                                                @endif
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-5">
                                                <div class="fs-5 fw-bolder text-gray-900 mb-2">
                                                    {{ $conversation->sender->fullname }}</div>
                                                <div class="fw-bold text-muted">{{ $conversation->sender->email }}</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Lat seen-->
                                        <div class="d-flex flex-column align-items-end ms-2">
                                            <span class="text-muted fs-7 mb-1">1 day</span>
                                        </div>
                                        <!--end::Lat seen-->
                                    </a>
                                    <!--end::User-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed d-none"></div>
                                    <!--end::Separator-->
                                @endforeach
                            </div>
                            <!--end::List-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Contacts-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <!--begin::Messenger-->
                    <div class="card" id="kt_chat_messenger">
                        <!--begin::Card header-->
                        <div class="card-header" id="kt_chat_messenger_header" v-if="chat">
                            <!--begin::Title-->
                            <div class="card-title">
                                <!--begin::User-->
                                <div class="d-flex justify-content-center flex-column me-3">
                                    <a href="#"
                                        class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">
                                        @{{ conversation.sender.fullname }}
                                    </a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body" id="kt_chat_messenger_body">
                            <!--begin::Messages-->
                            <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages"
                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer"
                                data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px">
                                <!--begin::Message(in)-->
                                <div v-for="message in chat" class="d-flex mb-10"
                                    :class="message.sender_id ==
                                        {{ auth()->user()->id }} ? 'justify-content-end' : 'justify-content-start'">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column"
                                        :class="message.sender_id ==
                                            {{ auth()->user()->id }} ? 'align-items-end' : 'align-items-start'">
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center mb-2"
                                            :class="message.sender_id ==
                                                {{ auth()->user()->id }} ? 'flex-row-reverse' : ''">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" :src="message.sender.image"
                                                    v-if="message.sender.image" />
                                                <span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder"
                                                    style="text-transform: uppercase;">
                                                    @{{ message.sender.fullname.slice(0, 1) }}
                                                </span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="d-flex"
                                                :class="message.sender_id ==
                                                    {{ auth()->user()->id }} ? 'me-3 flex-row-reverse' : 'ms-3'">
                                                <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary"
                                                    :class="message.sender_id ==
                                                        {{ auth()->user()->id }} ? 'ms-3' : 'me-3'">
                                                    <span v-if="message.sender_id == {{ auth()->user()->id }}">Siz</span>
                                                    <span v-else>@{{ message.sender.fullname }}</span>
                                                </a>
                                                <span class="text-muted fs-7 mb-1">@{{ message.created_at }}</span>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Text-->
                                        <div class="p-5 rounded text-dark fw-bold mw-lg-400px text-start position-relative d-flex flex-column"
                                            :class="message.sender_id ==
                                                {{ auth()->user()->id }} ? 'bg-light-info' : 'bg-light-primary'"
                                            data-kt-element="message-text">
                                            @{{ message.body }}
                                            <i class="fas"
                                                :class="{
                                                    'fa-check-double text-primary': message.read == 1,
                                                    'fa-check': message
                                                        .read == 0
                                                }"
                                                v-show="message.sender_id == {{ auth()->user()->id }}"
                                                style="font-size: 10px; text-align:end; position:absolute; right:5px; bottom:5px;"></i>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Message(in)-->
                            </div>
                            <!--end::Messages-->
                        </div>
                        {{-- <div class="card-body" v-else>
                            Bu sohbette herhangi bir mesaj yok
                        </div> --}}
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer pt-4" id="kt_chat_messenger_footer" v-if="chat">
                            <form @submit.prevent="createMessage(conversation)" method="post">
                                @csrf
                                <!--begin::Input-->
                                <textarea name="body" v-model="body" class="form-control form-control-flush mb-3" rows="1"
                                    data-kt-element="input" placeholder="Type a message"></textarea>
                                <!--end::Input-->
                                <!--begin:Toolbar-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Send-->
                                    <button type="submit" class="btn btn-primary" type="button"
                                        data-kt-element="send">Gönder</button>
                                    <!--end::Send-->
                                </div>
                                <!--end::Toolbar-->
                            </form>
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Messenger-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::LaSizt-->
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('js')
    <script>
        Vue.createApp({
            data() {
                return {
                    conversations: JSON.parse(localStorage.getItem("conversations")),
                    conversation: JSON.parse(localStorage.getItem("conversation")),
                    chat: JSON.parse(localStorage.getItem("chat")),
                    body: null,
                }
            },
            methods: {
                messages(conversation) {
                    axios.get("/sistem/ogrenci-mesajlari/" + conversation.id).then(res => {
                        this.chat = res.data.messages
                        this.conversation = res.data.conversation
                        this.conversations = res.data.conversations
                        localStorage.setItem("conversation", JSON.stringify(res.data.conversation))
                        localStorage.setItem("conversations", JSON.stringify(res.data.conversations))
                        localStorage.setItem("chat", JSON.stringify(res.data.messages))
                    });
                },
                createMessage(conversation) {
                    axios.post("/sistem/ogrenci-mesajlari/" + conversation.id, {
                        body: this.body
                    }).then(res => {
                        this.messages(res.data.conversation)
                        this.body = null
                    });
                },
                deleteMessage(message) {
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: message.topic +
                            " mesajını silmek istiyor musunuz? Yapılan değişiklik geri alınamaz!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Evet Sil!',
                        cancelButtonText: 'İptal Et'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "GET",
                                url: "/sistem/mesajlar/" + message.id + "/sil",
                                success: function() {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Silindi",
                                        text: message.topic +
                                            " mesajı başarıyla silindi.",
                                        confirmButtonText: "Tamam"
                                    }).then(() => location.reload());
                                }
                            });
                        }
                    })
                }
            },
            mounted() {
                axios.get("/sistem/mesajlar/" + this.conversation.id).then(res => {
                    this.chat = res.data.messages
                    this.conversation = res.data.conversation
                    this.conversations = res.data.conversations
                    localStorage.setItem("conversation", JSON.stringify(res.data.conversation))
                    localStorage.setItem("conversations", JSON.stringify(res.data.conversations))
                    localStorage.setItem("chat", JSON.stringify(res.data.messages))
                });
            }
        }).mount("#app");
    </script>
@endsection
