@extends('layouts.admin')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet">
@endsection

@section('content')

    <h1>Upload</h1>

    <form action="{{ route('media.store') }}" method="post" class="dropzone">
        @csrf
    </form>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection