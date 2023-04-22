

@extends('layout.layout')

@section('content')
<livewire:products-table :search="''" :categoryName="''" :specialID="$specialID"/>
@endsection