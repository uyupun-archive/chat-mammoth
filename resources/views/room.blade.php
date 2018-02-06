@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="rp-Container">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="rp-List">
                        <div class="rp-Message">
                            <div class="rp-Message_User">
                                <span class="rp-Message_Name">{{ $post->screen_name }}</span>
                                <span class="rp-Message_Id">&#64;{{ $post->user_id }}</span>
                                @if($post->user_id === 'Anonymous')
                                    <i class="fas fa-user-secret"></i>
                                @endif
                                <span class="rp-Message_Time">{{ str_replace('-', '/', $post->created_at) }}</span>
                            </div>
                            <p>{!! nl2br(htmlspecialchars($post->comment)) !!}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p>コメントしてね</p>
            @endif
            <div class="rp-pagination">{{ $posts->links() }}</div>
        </div>
        <div id="accordion" class="rp-Accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <div id="collapseOne" class="collapse in" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="rp-Post_Wrapper">
                                <div class="rp-Post_Container">
                                    <form enctype="multipart/form-data" action="{{ url('/api/comment/store') }}" method="POST" class="rp-Form">
                                        {{ csrf_field() }}
                                        <textarea name="comment" placeholder="Please write here." class="rp-TextArea" autofocus required minlength="1" maxlength="140"></textarea>
                                        <div class="rp-Form_Other d-flex">
                                            {{--<input type="file" name="image" class="rp-file mr-auto">--}}
                                            <input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">
                                            <button type="submit" class="st-Button rp-Button">投稿する</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="rp-Bar">
                        <button class="btn btn-link rp-BarText" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                            <i class="fas fa-window-maximize"></i>
                        </button>
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection