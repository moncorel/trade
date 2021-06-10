@extends('personal.layouts.main')

@section('content')
    <div class="user-page" style="min-height: 100vh;">
        @include('includes.navbar')
        <div class="container">
            <div class="row mx-0">
                <div class="col-12 col-md-4 col-lg-3 col-xl-2 pt-0 pb-2 wow fadeInDown" data-wow-delay="0.4s">
                    @include('personal.includes.leftSidebar')
                </div>

                <div class="col-12 col-md-8 col-lg-9 col-xl-10 wow fadeInDown" data-wow-delay="0.2s">
                    <div class="user-wallets">
                        <span class="h5">Support</span>
                        <div class="chat-sup" id="messages-block">
                            <div class="ml-4">
                                @if(!$messages)
                                    <h3 class="text-light">There are no messages, write one :)</h3>
                                @else
                                    @foreach($messages as $message)
                                        <div class="row mb-3">
                                            @if($message->sender_id === Auth::id())
                                                <div class="col-md-6"></div>
                                            @endif
                                            <div
                                                class="message
                                        @if($message->receiver_id === Auth::id())
                                                    message-received
@else
                                                    message-sent
@endif
                                                    col-md-6"
                                            >
                                                <div class="pb-2">
                                        <span class="text-black">
                                            <i class="fas fa-user"></i>
                                            {{ $message->sender->nickname }}
                                        </span>
                                                    <span class="text-black">
                                            <i class="fas fa-clock"></i>
                                            {{ $message->created_at->diffForHumans() }}
                                        </span>
                                                </div>
                                                <div class="message-text-block p-2">
                                                    <div class="message-text">{{ $message->message }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="d-block w-100">
                            <form action="{{ route('sendMessage') }}" method="POST">
                                @csrf
                                <div class="row mx-0 align-items-center">
                                    <div class="col-lg-10 col-md-9 col-sm-12">
                                        <div class="form-group mb-0">
                                            <input
                                                type="text"
                                                name="message"
                                                placeholder="Type message..."
                                                class="form-control @error('message') outline-danger @enderror"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-12 mt-2">
                                        <input type="submit" value="Send" class="actionBtn d-block w-100">
                                    </div>
                                </div>

                                @error('message')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-bg">
            @include('includes.footer')
        </div>
    </div>
@endsection

@section('body-scripts')
    <script>
        const messagesBlock = document.getElementById('messages-block');
        messagesBlock.scrollTo(0, messagesBlock.scrollHeight);
    </script>
@endsection

