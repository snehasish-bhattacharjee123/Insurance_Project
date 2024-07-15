@extends('layouts.admin') 
@section('content') 

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<livewire:admin.slider.index/>

@endsection