@extends('template')
@section('content')
<form action="{{route($evenement->id ? 'updateEvenement': 'saveEvenement')}}" method="POST">
    @csrf()
    @method($evenement->id ?'put' :'post')
    <input type="text" name='id' class="form-control" value="{{$evenement->id}}" hidden >
    <label>Libelle</label>
    <input type="text" name='libelle' class="form-control  @error('libelle') is-invalid @enderror" value="{{$evenement->libelle ? $evenement->libelle : old('libelle')}}" >
    @error('libelle')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <label>Prix</label>
    <input type="number" name='prix' class="form-control"  @error('prix') is-invalid @enderror" value="{{$evenement->prix ? $evenement->prix : old('prix')}}">
    @error('prix')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <label>Date</label>
    <input type="date" name='dateEvenement' class="form-control" value="{{$evenement->date}}" >
    <label>Lieu</label>
    <input type="text" name='lieu' class="form-control"  value="{{$evenement->lieu}}">
    <label>Description </label>
    <textarea name='description' class="form-control" >{{$evenement->description}}</textarea>
    <button class="btn btn-success" type="submit">{{$evenement->id ? 'Modifier': 'Ajouter'}}</button>
</form>
@endsection
