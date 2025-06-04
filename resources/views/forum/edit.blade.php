{{-- edit.blade.php --}}
@extends('master')
@section('content')
    @include('forum.form', ['forum' => $forum])
@endsection

