@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="rp-Container">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="rp-List">
                        <div class="rp-Message">
                            <div class="rp-Message_User">
                                @if($post->user_id === 'bot')
                                    <img class="rp-Message_UserIcon" src="{{  $post->avatar }}" alt="">
                                @elseif(isset($post->avatar))
                                    <img class="rp-Message_UserIcon" src="{{ $post->avatar }}" alt="">
                                @elseif((isset($post->default_avatar)))
                                    <img class="rp-Message_UserIcon" src="{{ $post->default_avatar }}" alt="">
                                @else
                                    <img class="rp-Message_UserIcon" src="{{ $default_avatar }}" alt="">
                                @endif
                                <span class="rp-Message_Name">{{ $post->screen_name }}</span>
                                <span class="rp-Message_Id">&#64;{{ $post->user_id }}</span>
                                @if($post->user_id === 'anonymous')
                                    <i class="fas fa-user-secret"></i>
                                @endif
                                <span class="rp-Message_Time">{{ str_replace('-', '/', $post->created_at) }}</span>
                            </div>
                            @if($post->markdown)
                                {!! $post->comment !!}
                            @elseif(isset($post->comment))
                                <p class="rp-User_Comment">{!! nl2br(htmlspecialchars($post->comment)) !!}</p>
                            @elseif(isset($post->image))
                                <img class="rp-Image" src="{{ $post->image }}" alt="">
                                <a class="rp-Image_Link" href="{{ $post->image }}" download="download.png">ダウンロード</a>
                            @elseif(isset($post->gif))
                                <img class="rp-Gif" src="{{ url('/gif/' . $post->gif . '.gif') }}" alt="">
                            @elseif(isset($post->draw))
                                <img class="rp-Draw" src="{{ $post->draw }}" alt="">
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="rp-NotComment">このルームはまだ誰もマサカリを投げていません。</div>
            @endif
            <div class="rp-pagination">{{ $posts->links() }}</div>
        </div>
        <div id="accordion" class="rp-Accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <div id="collapseOne" class="collapse in" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="rp-Nav_Area">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane active" id="normal" role="tabpanel">
                                        <div class="rp-Post_Wrapper">
                                            <div class="rp-Post_Container">
                                                <form enctype="multipart/form-data" action="{{ url('/api/comment/text') }}" method="POST" class="rp-Form">
                                                    {{ csrf_field() }}
                                                    <div id="app">
                                                        <keyboard></keyboard>
                                                    </div>
                                                    <input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="file" role="tabpanel">
                                        <div class="rp-Post_Wrapper">
                                            <div class="rp-Post_Container">
                                                <form enctype="multipart/form-data" action="{{ url('/api/comment/image') }}" method="POST" class="rp-Form_File">
                                                    {{ csrf_field() }}
                                                    <div id="app">
                                                        <photo></photo>
                                                    </div>
                                                    <input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="gif" role="tabpanel">
                                        <div class="rp-Post_Wrapper">
                                            <div class="rp-Post_Container">
                                                <form enctype="multipart/form-data" action="{{ url('/api/comment/gif') }}" method="POST" class="rp-Form_Gif">
                                                    {{ csrf_field() }}
                                                    <div class="rp-Gif_Wrapper">
                                                        @for($i = 0; $i < 20; $i++)
                                                            <label class="rp-Gif_Label" for="gif{{ $i }}">
                                                                @if ($i === 0)
                                                                    <input class="rp-Gif_RadioButton" type="radio" name="gif" value="{{ $i }}" required id="gif{{ $i }}" checked>
                                                                @else
                                                                    <input class="rp-Gif_RadioButton" type="radio" name="gif" value="{{ $i }}" required id="gif{{ $i }}">
                                                                @endif
                                                                <img src="{{ url('/gif/' . $i . '.gif') }}" alt="" class="rp-Gif_Select">
                                                            </label>
                                                        @endfor
                                                    </div>
                                                    <div class="rp-Form_Other d-flex">
                                                        <input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">
                                                        <button type="submit" class="st-Button rp-Button">マサカる</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="write" role="tabpanel">
                                        <div class="rp-Post_Wrapper">
                                            <div class="rp-Post_Container">
                                                <form enctype="multipart/form-data" action="{{ url('/api/comment/draw') }}" method="POST" class="rp-Form">
                                                    {{ csrf_field() }}
                                                    <div id="app">
                                                        <hand-write></hand-write>
                                                    </div>
                                                    <input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs rp-Nav_Tabs" id="myTab" role="tablist">
                        <li class="nav-item active rp-Nav_Tab">
                            <a class="nav-link rp-normal" data-toggle="tab" href="#normal" role="tab" aria-controls="normal" aria-expanded="true" ontouchstart="">
                                <span class="rp-Nav_Text">テキスト</span>
                                <i class="fas fa-keyboard"></i>
                            </a>
                        </li>
                        <li class="nav-item rp-Nav_Tab">
                            <a class="nav-link rp-file" data-toggle="tab" href="#file" role="tab" aria-controls="file" aria-expanded="false" ontouchstart="">
                                <span class="rp-Nav_Text">画像</span>
                                <i class="fas fa-images"></i>
                            </a>
                        </li>
                        <li class="nav-item rp-Nav_Tab">
                            <a class="nav-link rp-gif" data-toggle="tab" href="#gif" role="tab" aria-controls="gif" aria-expanded="false" ontouchstart="">
                                <span class="rp-Nav_Text">GIF</span>
                                <i class="fas fa-film"></i>
                            </a>
                        </li>
                        <li class="nav-item rp-Nav_Tab">
                            <a class="nav-link rp-write" data-toggle="tab" href="#write" role="tab" aria-controls="write" aria-expanded="false" ontouchstart="">
                                <span class="rp-Nav_Text">手書き</span>
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </li>
                        <div class="rp-NavText_Wrapper">
                            <button class="btn btn-link rp-NavText" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                                <i class="fas fa-window-maximize"></i>
                            </button>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
