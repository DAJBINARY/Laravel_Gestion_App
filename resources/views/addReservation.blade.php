@extends('template')
@section('content')
<form action="{{route($reservation->id ? 'reservation.update': 'reservation.store')}}" method="POST">
    @csrf()
    @method($reservation->id ?'put' :'post')

    <label>Prix</label>
    <input type="number" name='prix' class="form-control"  @error('prix') is-invalid @enderror" value="{{$reservation->prix ? $reservation->prix : old('prix')}}">
    @error('prix')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <label>Evénements</label>
    <select name="evenement_id" class="form-control"  >
        @foreach($evenements as $e)
            <option value="{{$e->id}}">{{$e->libelle}}</option>
        @endforeach
    </select>

    <button class="btn btn-success" type="submit">{{$reservation->id ? 'Modifier': 'Ajouter'}}</button>
</form>
@endsection
