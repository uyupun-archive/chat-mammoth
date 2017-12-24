@extends('layouts.app')

@section('content')
<div class=""><!-- wrapper -->
    <div class=""><!-- container -->
        <h1>ルーム作成</h1><!-- タイトル -->
        <form method="POST" action="" class="">
            <div class="">
                <label for="name" class="">ルーム名</label>
                <input type="text" name="name" id="name" class="">
            </div>
            <div class="">
                <label for="description" class="">ルームの説明</label>
                <textarea name="description" id="description" class=""></textarea>
            </div>
            <div class="">
                <label for="tag" class="">タグの追加</label>
                <input type="text" name="tag" id="tag" class="">
                <button class="">追加</button>
            </div>
            <div class="">
                <div class="">公開設定</div>
                <input type="checkbox" name="disclosure" id="disclosure" class="" checked>
                <label for="disclosure" class="">公開</label>
                <input type="checkbox" name="disclosure" id="disclosure" class="">
                <label for="" class="">非公開</label>
            </div>
            <button type="submit" class="">ルームを作成</button>
        </form>
    </div>
</div>
@endsection