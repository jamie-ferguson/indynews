@extends('layouts.app')

@section('content')
<div class="container">


            <div class="card">
                <app-root></app-root>
                <script type="text/javascript" src="{{ asset('angular/dist/indynews-ng/runtime.js') }}"></script>
                <script type="text/javascript" src="{{ asset('angular/dist/indynews-ng/polyfills.js') }}"></script>
                <script type="text/javascript" src="{{ asset('angular/dist/indynews-ng/main.js') }}"></script>
            </div>


</div>
@endsection
