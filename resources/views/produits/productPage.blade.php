@extends('footer.footer')
@extends('layout.layout')

@section('content')
<livewire:product-data :idProduct="$idProduct"/>
@endsection