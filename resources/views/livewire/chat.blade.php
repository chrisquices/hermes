<div class="wrapper">

    <div class="chat-mobile-header">
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <a href="{{ route('dashboard.index') }}" class="header-logo">
                            <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo">
                        </a>
                    </div>
                    <div class="iq-search-bar-header device-search">
                        <form action="#" class="searchbox">
                            <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                            <input type="text" class="text search-input bg-light" placeholder="Search here...">
                        </form>
                    </div>
                    <div class="d-flex align-items-center" wire:ignore>
                        <ul class="navbar-nav ml-auto navbar-list align-items-center">
                            <li class="nav-item nav-icon dropdown caption-content">
                                <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ auth()->user()->photo_url }}" class="img-fluid rounded" alt="user">
                                </a>
                                <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="card shadow-none m-0">
                                        <div class="card-body p-0 text-center">
                                            <div class="media-body profile-detail text-center">
                                                <img src="{{ auth()->user()->photo_url }}" alt="profile-img"
                                                     class="rounded profile-img img-fluid avatar-70">
                                            </div>
                                            <div class="p-3">
                                                <h6 class="mb-1">{{ auth()->user()->name }}</h6>
                                                <h6 class="mb-1">{{ auth()->user()->email }}</h6>
                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                    <a href="{{ route('profile.index') }}" class="btn btn-primary border mr-2">Profile</a>
                                                    <a href="javascript:void(0);" class="btn btn-primary border"
                                                       onclick="$('#form-sign-out').submit();">Sign Out</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="small-saidbar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="{{ route('dashboard.index') }}">
                <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="logo">
            </a>
            <div class="iq-menu-bt-sidebar">
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu open">
                        <div class="main-circle"><i class="ri-close-line"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="">
                    <a href="{{ route('dashboard.index') }}" class="">
                        <i class="las la-home iq-arrow-left"></i><span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('chat.index') }}" class="collapsed">
                        <i class="las la-check-square iq-arrow-left"></i><span class="menu-text">Chat</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('profile.index') }}" class="collapsed">
                        <i class="las la-user-check iq-arrow-left"></i><span class="menu-text">My Profile</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="chat-data-left animate__animated p-0">
            <div class="chat-search px-3">
                <div class="d-flex align-items-center pt-3">
                    <div class="chat-profile mr-3">
                        <img src="{{ $user->photo_url }}" class="img-fluid avatar-50 rounded" alt="profile" data-target="#profile-modal"
                             data-toggle="modal">
                        <div class="chat-status">
                            <div class="dropdown border-none">
                                <a href="#" id="dropdownMenuButton011" data-toggle="dropdown">
                                    <i class="fa fa-circle text-success"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="media-support">
                        <h6>{{ $user->name }}</h6>
                        <p class="mb-0 font-size-14">{{ $user->email }}</p>
                    </div>
                    <button type="submit" class="close-btn-res">
                        <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                </div>
                <div class="iq-search-bar mt-4 mb-4">
                    <form action="#" class="searchbox">
                        <a class="search-link" href="#"><i class="fa fa-search"></i></a>
                        <input type="text" class="text search-input" placeholder="Search..." wire:model="search_term">
                    </form>
                </div>
                <ul class="nav nav-pills mb-4 nav-fill  bg-white" role="tablist" wire:ignore>
                    <li class="nav-item mb-0">
                        <a class="nav-link @if($active_pane == 'recent-chats') show active @endif" id="pills-msg-tab" data-toggle="pill"
                           href="#pills-msg" role="tab" aria-controls="pills-msg"
                           aria-selected="true" wire:click="updateActivePane('recent-chats')">
                            <div class="svg-icon">
                                <i class="las la-sms font-size-20"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item mb-0">
                        <a class="nav-link @if($active_pane == 'my-contacts') show active @endif" id="pills-contact-tab" data-toggle="pill"
                           href="#pills-contact" role="tab"
                           aria-controls="pills-contact" aria-selected="false" wire:click="updateActivePane('my-contacts')">
                            <div class="svg-icon">
                                <i class="lab la-elementor font-size-20"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="chat-sidebar-channel">
                <div class="tab-content">
                    <div class="tab-pane fade @if($active_pane == 'recent-chats') show active @endif" id="pills-msg" role="tabpanel"
                         aria-labelledby="pills-msg-tab">
                        <div class="d-flex align-items-center mb-3 justify-content-between px-3">
                            <div class="">
                                <p class="mb-0">Recent Chats</p>
                            </div>
                        </div>
                        <div class="recent-chat mt-3">
                            <ul class="chat-list scroller list-unstyled m-0 px-2">
                                @foreach($recent_chats as $recent_chat)
                                    <li class="chat-list-title" data-toggle-extra="tab"
                                        data-target-extra="#user-content-{{ $recent_chat->second_user_id }}"
                                        wire:click="getChat({{ $recent_chat->first_user_id }}, {{ $recent_chat->second_user_id }})">
                                        <div class="media  justify-content-between chat-user-box rounded align-items-center">
                                            <div>
                                                <div class="chat-profile mr-3">
                                                    <img src="{{ ($recent_chat->first_user_id == $user->id) ? $recent_chat->secondUser->photo_url : $recent_chat->firstUser->photo_url }}"
                                                         alt="chat-user"
                                                         class="avatar-50 ">
                                                    <span class="chat-status chat-status-">
                                                           <i class="fa fa-circle text-success"></i>
                                                       </span>
                                                </div>
                                            </div>
                                            <div class="media-body chat-text">
                                                <div class="d-flex align-items-center chat-right">
                                                    <h6>
                                                        {{ ($recent_chat->first_user_id == $user->id) ? $recent_chat->secondUser->name : $recent_chat->firstUser->name }}
                                                        <br>
                                                        <small>{{ $recent_chat->last_message }}</small>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade @if($active_pane == 'my-contacts') show active @endif" id="pills-contact" role="tabpanel"
                         aria-labelledby="pills-contact-tab">
                        <div class="d-flex align-items-center mb-3 justify-content-between px-3">
                            <div class="">
                                <p class="mb-0">My Contacts</p>
                            </div>
                        </div>
                        <div class="recent-chat mt-3">
                            <ul class="chat-list scroller list-unstyled m-0 px-2">
                                @foreach($contacts as $contact)
                                    {{--                            <li class="px-2 mb-0">A</li>--}}
                                    <li class="chat-list-title" data-toggle-extra="tab" data-target-extra="#user-content-{{ $contact->id }}"
                                        wire:click="getChat({{ auth()->user()->id }}, {{ $contact->id }})">
                                        <div class="media  justify-content-between chat-user-box rounded align-items-center">
                                            <div>
                                                <div class="chat-profile mr-3">
                                                    <img src="{{ $contact->photo_url }}" alt="chat-user" class="avatar-50 ">
                                                    <span class="chat-status chat-status-">
                                                       <i class="fa fa-circle text-success"></i>
                                                   </span>
                                                </div>
                                            </div>
                                            <div class="media-body chat-text">
                                                <div class="d-flex align-items-center chat-right">
                                                    <h6>{{ $contact->name }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-page-chat" wire:poll.500ms>
        <div class="container-fluid p-0">
            <div class=" chat-page bg-light">
                <div class="chat-data-block">
                    <div class="row m-0">
                        <div class="col-lg-12 chat-data p-0 chat-data-right">
                            @if($selected_chat)
                                <div class="chat-content animate__animated animate__fadeIn active" data-toggle-extra="tab-content"
                                     id="user-content-{{ $selected_chat->second_user_id }}">
                                    <div class="chat-head d-flex justify-content-between align-items-center bg-white px-3 px-md-4 py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="sidebar-toggle">
                                                <i class="ri-arrow-left-s-line"></i>
                                            </div>
                                            <div class="media  justify-content-between chat-user-box align-items-center">
                                                <div>
                                                    <div class="chat-profile mr-2 mr-md-3">
                                                        <img src="{{ $selected_chat->secondUser->photo_url }}" alt="chat-user"
                                                             class="avatar-50 rounded">
                                                    </div>
                                                </div>
                                                <div class="media-body chat-text">
                                                    <div class="d-flex align-items-center chat-right">
                                                        <h5 class="chat-name">{{ $selected_chat->secondUser->name }}</h5>
                                                    </div>
                                                    <p class="mb-0 text-primary">Online</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-content scroller px-3 px-md-4">
                                        <div class="chat-tab-box" id="chat-tab-box">
                                            @foreach($selected_chat_messages as $message)
                                                @if($message->sent_by != $user->id)
                                                    <div class="media my-3 justify-content-between current-user">
                                                        <div>
                                                            <div class="chat-profile">
                                                                <img src="{{ $message->sentByUser->photo_url }}" alt="chat-user"
                                                                     class="avatar-40 ">
                                                            </div>
                                                        </div>
                                                        <div class="media-body chat-text">
                                                            <div class="d-flex align-items-center chat-right">
                                                                <div class="chating d-flex align-items-center bg-light">
                                                                    <p class="mr-2 mb-0">{{ $message->message }}</p>
                                                                    <p class="mb-0"><small>{{ $message->sent_at_formatted }}</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="media my-3 justify-content-between other-user">
                                                        <div>
                                                            <div class="chat-profile">
                                                                <img src="{{ $message->sentByUser->photo_url }}" alt="chat-user"
                                                                     class="avatar-40 ">
                                                            </div>
                                                        </div>
                                                        <div class="media-body chat-text">
                                                            <div class="d-flex align-items-center chat-right">
                                                                <div class="chating d-flex align-items-center bg-primary-light">
                                                                    <p class="mr-2 mb-0">{{ $message->message }}</p>
                                                                    <p class="mb-0"><small>{{ $message->sent_at_formatted }}</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-footer bg-white px-3 px-md-4 ">
                                    <form class="d-flex align-items-center border-top pt-3" id="chat-message" action="javascript:void(0);"
                                          onsubmit="submitMessage(); return false;">
                                        {{--                                        <div class="chat-attagement d-flex">--}}
                                        {{--                                            <i class="lar la-smile bg-light font-size-20 iq-card-icon-small"></i>--}}
                                        {{--                                        </div>--}}
                                        <input type="text" name="message" autocomplete="off"
                                               class="form-control mr-3 bg-light border-none" placeholder="Write your message"
                                               wire:model="message" id="imessage">
                                        <div class="d-flex align-items-center">
                                            <button class="bg-primary btn p-0 btn-sm font-size-20 iq-card-icon-small"
                                                    type="button" wire:click="storeMessage" id="btn-send-message">
                                                <i class="lab la-telegram-plane"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="chat-content animate__animated animate__fadeIn active" data-toggle-extra="tab-content"
                                     id="default">
                                    <div class="vh-100 px-3 px-md-4 d-flex align-items-center justify-content-center">
                                        <div class="chat-tab-box default-box d-flex align-items-center">
                                            <div class="text-center mx-auto d-block pb-5">
                                                <img src="{{ asset('assets/images/placeholder.png') }}" class="img-fluid w-60"
                                                     alt="new-chat" style="width: 300px !important;">
                                                <h4 class="mt-4 mb-5">Start a conversation with your friends</h4>
                                                <button type="button" class="btn btn-primary default-chat-btn">
                                                    Contact List
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('logout') }}" method="POST" hidden id="form-sign-out">
    @csrf
</form>

@section('scripts')
    <script>

        window.addEventListener('scrollConversationToBottom', (e) => {
            let objDiv = document.getElementById("chat-tab-box");

            objDiv.scrollTop = objDiv.scrollHeight;

        });

        function submitMessage() {
            $('#btn-send-message').click();

            $('#imessage').focus();

            return false;
        }
    </script>
@endsection
