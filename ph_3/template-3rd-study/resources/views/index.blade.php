@extends('layouts.helloapp')


@section('menubar')
    @parent
    インデックスページ
@endsection    

@section('title','Index')

@section('contents')
    <p>ここが本文のコンテンツです</p>
    <p>自由に何かお書きください</p>

    @component('components.message')

        @slot('msg_title')
        Caution!!
        @endslot

        @slot('msg_content')
        ここはメッセージの内容です
        @endslot



    @endcomponent

@endsection
