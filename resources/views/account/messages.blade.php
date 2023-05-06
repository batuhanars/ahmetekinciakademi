@extends('account.layout.main')
@section('title', 'Mesajlar')
@section('css')
    <style>
        textarea::placeholder {
            font-weight: 600;
        }
    </style>
@endsection
@section('content')
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">

                <h1 class="text-30 lh-12 fw-700">Mesajlar</h1>
                <div class="mt-10 text-dark-1">Eğitmenlere buradan mesaj gönderebilirsiniz.</div>

            </div>
        </div>


        <div class="row y-gap-30 text-dark-1">
            <div class="col-4">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="d-flex items-center py-20 px-30 border-bottom-light">
                        <h2 class="text-17 lh-1 fw-500">Sohbetler</h2>
                    </div>

                    <div class="px-30"
                        style="overflow-y:auto; height: 600px; scrollbar-color: #ecf0f1 white; scrollbar-width: thin; margin: 32px 10px 32px 0;">
                        <div class="row y-gap-30">
                            @foreach ($conversations as $conversation)
                                <a href="#" v-on:click="messages({{ $conversation }})" class="md:direction-column">
                                    <div class="d-flex ">
                                        <div class="mr-20" style="position: relative;">
                                            @if ($conversation->receiver->image)
                                                <img src="{{ $conversation->receiver->image }}"
                                                    alt="{{ $conversation->receiver->fullname }}"
                                                    style="width: 60px; border-radius:999px;">
                                            @else
                                                <span class="uppercase bg-black text-white text-center"
                                                    style="width: 60px; height: 60px; font-size: 30px; display:block; line-height: 60px; border-radius:999px;">
                                                    {{ Str::limit($conversation->receiver->fullname, 1, '') }}
                                                </span>
                                            @endif
                                            @if ($conversation->messages()->where('read', 0)->where('receiver_id', auth()->user()->id)->count())
                                                <span class="badge badge-circle badge-success"
                                                    style="position:absolute; top:0; right:0;">
                                                    {{ $conversation->messages()->where('read', 0)->where('receiver_id', auth()->user()->id)->count() }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="comments__body md:mt-15">
                                            <div class="comments__header">
                                                <h4 class="text-17 fw-500 lh-15">
                                                    {{ $conversation->receiver->fullname }}
                                                    <span class="text-13 text-dark-1 fw-400">
                                                        {{ $conversation->last_time_message }}
                                                    </span>
                                                </h4>
                                            </div>

                                            <h5 class="text-13 fw-500 text-dark-1">
                                                {{ $conversation->receiver->email }}
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4">
                    <div class="d-flex items-center py-20 px-30 border-bottom-light" v-if="chat">
                        <h2 class="text-17 lh-1 fw-500">@{{ conversation.receiver.fullname }}</h2>
                    </div>

                    <div class="px-30" v-if="chat && chat.length != 0"
                        style="overflow-y:auto; height:450px; scrollbar-color: #ecf0f1 white; scrollbar-width: thin; margin: 32px 10px 32px 0;">
                        <div class="row y-gap-30">
                            <div class="md:direction-column" v-for="message in chat" :key="message.id">
                                <div class="d-flex"
                                    :class="message.sender_id == {{ auth()->user()->id }} ? 'justify-content-end' : ''">
                                    <div class="comments__body md:mt-15" style="text-align: start;">
                                        <div class="comments__header d-flex items-center"
                                            :class="message.sender_id == {{ auth()->user()->id }} ?
                                                'flex-row-reverse' : ''">
                                            <div
                                                :class="message.sender_id == {{ auth()->user()->id }} ? 'ml-10' : 'mr-10'">
                                                <img v-if="message.sender.image" :src="message.sender.image"
                                                    alt="message.sender.fullname" style="width: 40px; border-radius:999px;">

                                                <span class="uppercase bg-black text-white text-center" v-else
                                                    style="width: 40px; font-size: 30px; display:block; line-height: 40px; text-transform:uppercase; border-radius:999px;">
                                                    @{{ message.sender.fullname.slice(0, 1) }}
                                                </span>
                                            </div>
                                            <h4 class="text-15 fw-600 lh-15 d-flex items-center"
                                                :class="message.sender_id == {{ auth()->user()->id }} ? 'flex-row-reverse' : ''">
                                                <span v-if="message.sender_id == {{ auth()->user()->id }}">Siz</span>
                                                <span v-else>@{{ message.sender.fullname }}</span>
                                                <span class="text-13 text-dark-1 fw-400 d-block"
                                                    :class="message.sender_id == {{ auth()->user()->id }} ? 'mr-2' : 'ml-2'">@{{ message.created_at }}</span>
                                            </h4>
                                        </div>
                                        <div class="comments__text mt-10 text-13 fw-500 p-3 position-relative d-flex flex-column"
                                            :class="message.sender_id == {{ auth()->user()->id }} ? 'bg-success-1' :
                                                'bg-info-1'"
                                            style="max-width: 400px">
                                            @{{ message.body }}

                                            <i class="fas"
                                                :class="{
                                                    'fa-check-double text-blue-1': message.read == 1,
                                                    'fa-check text-dark-1': message
                                                        .read == 0
                                                }"
                                                v-show="message.sender_id == {{ auth()->user()->id }}"
                                                style="font-size: 10px; text-align:end; position:absolute; right:5px; bottom:5px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-30 px-30" v-else>
                        <div class="md:direction-column">
                            Bu sohbette herhangi bir mesaj yok
                        </div>
                    </div>
                    <form @submit.prevent="createMessage(conversation)" method="post" v-if="chat">
                        @csrf
                        <div class="d-flex flex-column items-start py-20 px-30 border-top-light">
                            <textarea name="body" v-model="body" class="form-control-plaintext" rows="1" style="outline:none;"
                                placeholder="Bir Mesaj Yaz"></textarea>
                            <button class="bg-info-1 mt-3 button -sm">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
