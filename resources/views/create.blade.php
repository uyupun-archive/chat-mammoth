@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="st-Container">
            <h2 class="st-Title">チャットルーム作成</h2>
            <div id="app">
                <create></create>
            </div>
            @if(session('response'))
                <span>{{ session('response') }}</span>
            @endif
        </div>
    </div>
@endsection