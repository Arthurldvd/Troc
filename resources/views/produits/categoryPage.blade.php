
@extends('layout.layout')

@section('content')
<livewire:products-table :search="''" :categoryName="$categoryName" :specialID="''"/>
@endsection