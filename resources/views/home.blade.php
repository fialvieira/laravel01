@extends('layouts.main_layout')
@section('content')
    <p class="display-6 text-secondary text-center py-5">
        @if (isset($myName))
            Hello, {{ $myName }}! Welcome to the view page.
        @else
            Hello, Guest! Welcome to the view page.
        @endif
    </p>
@endsection
