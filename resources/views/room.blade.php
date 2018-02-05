@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="st-Container">
            <div class="rp-ChatRoom_Favorite ml-auto p-2 align-self-center">
                <span class="rp-Star">
                    <i class="fas fa-star"></i>
                </span>
            </div>
            @foreach($posts as $post)
                <div class="rp-List">
                    <div class="rp-Message">
                        <div class="rp-Message_User">
                            <span>{{ $post->screen_name }}&#64;{{ $post->user_id }}</span>
                            @if($post->user_id === 'Anonymous')
                                <i class="fas fa-user-secret"></i>
                            @endif
                            <span>{{ str_replace('-', '/', $post->created_at) }}</span>
                        </div>
                        <p>{{ $post->comment }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $posts->links() }}
        <div class="rp-Wrapper">
            <div class="rp-Container">
                <form enctype="multipart/form-data" action="{{ url('/api/comment/store') }}" method="POST" class="rp-Form">
                    {{ csrf_field() }}
                    <textarea name="comment" class="rp-TextArea"></textarea>
                    <div class="rp-Form_Other d-flex justify-content-end">
                        {{--<input type="file" name="image" class="rp-file mr-auto">--}}
                        <input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">
                        <button type="submit" class="st-Button rp-Button">投稿する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection