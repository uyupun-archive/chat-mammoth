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
                        <div class="rp-Message_User">{{ $post->screen_name }}&#64;{{ $post->user_id }}</div>
                        <p>{{ $post->comment }}</p>
                    </div>
                </div>
            @endforeach
            <div class="rp-pagination">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="rp-Wrapper">
            <div class="rp-Container">
                <form enctype="multipart/form-data" action="{{ url('/api/comment/store') }}" method="POST" class="rp-Form">
                    {{ csrf_field() }}
                    <textarea name="comment" class="rp-TextArea"></textarea>
                    <div class="rp-Form_Other d-flex justify-content-end">
                        {{--<input type="file" name="image" class="rp-file mr-auto">--}}
                        {{--<input type="checkbox" name="anonymous" id="anonymous" class="rp-CheckBox align-self-center">--}}
                        {{--<lavel for="anonymous" class="rp-CheckBox_Text align-self-center">匿名投稿</lavel>--}}
                        <input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">
                        <button type="submit" class="st-Button rp-Button">投稿する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection