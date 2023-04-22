

@extends('layout.layout')

@section('content')
<livewire:products-table :search="$search"/>
@endsection