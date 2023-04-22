

@extends('layout.layout')

@section('content')
<livewire:products-table :search="$search" :categoryName="''" :specialID="''"/>
@endsection