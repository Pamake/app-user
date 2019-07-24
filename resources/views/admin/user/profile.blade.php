@extends('layouts.app')

@section('content')
{{-- card trovata sul sito di bootstrap --}}
<div class="container">
  <h1>pagina profilo utente</h1>
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      @if (!empty($user->userDetail))
        <img class="card-img-top" src="{{ asset('storage/'. $user->userDetail->profile_picture)}}" alt="immagine profilo di {{ $user->name}}">
      @else
        <p>Imposta foto profilo</p>
        <form action="{{ route('admin.profile_picture')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="profile_img">Immagine profile:</label>
            <input class="form-control-file" type="file" name="profile_img">
          </div>
          <div class="form-group">
            <input class="form-control" type="submit" value="salva">
          </div>
        </form>
      @endif
      <p class="card-text">
        <ul>
          <li>Nome utente: {{ Auth::user()->name }}</li>
          <li>Email: {{ Auth::user()->name }}</li>
        </ul>
      </p>
    </div>
  </div>
</div>
@endsection
