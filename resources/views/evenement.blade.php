@extends('template')
@section('content')

@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
<a class="btn btn-primary"  href="{{route('createEvenement')}}">Add</a>
<table class="table table-bordered">
    <tr>
        <td>Libelle</td>
        <td>Prix</td>
        <td>Lieu</td>
        <td>Description</td>
        <td>Date</td>
    </tr>
    @foreach($evenements as $e)
        <tr>
            <td>{{$e->libelle}}</td>
            <td>{{$e->prix}}</td>
            <td>{{$e->lieu}}</td>
            <td>{{$e->description}}</td>
            <td>{{$e->date}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('editEvenement',['id'=>$e->id])}}">Modifier</a>
                <form action="{{route('deleteEvenement',['id'=>$e->id])}}" method="post">
                    @csrf()
                    @method('delete')
                    <button class="btn btn-danger" type="submit" >Supprimer</button>
                </form>

            </td>

        </tr>
    @endforeach
    @if(sizeof($evenements) == 0)
        <p>La liste est vide</p>
    @endif


</table>
    {{$evenements->links()}}
@endsection
