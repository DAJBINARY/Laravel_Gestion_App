@extends('template')
@section('content')

@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
<a class="btn btn-primary"  href="{{route('reservation.create')}}">Add</a>
<table class="table table-bordered">
    <tr>
        <td>Libelle</td>
        <td>Prix</td>
        <td>Lieu</td>
        <td>Description</td>
        <td>Date</td>
    </tr>

</table>
@endsection
