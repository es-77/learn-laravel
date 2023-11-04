@extends('template_inhertenances.main')
@section('title')
    page 1
@endsection

@push('css')
    <style>
        body {
            background-color: red
        }
    </style>
@endpush

@verbatim
    {{hello world $variable}}
@endverbatim

@section('content')
    <p>page 1 blade file </p>
@endsection
