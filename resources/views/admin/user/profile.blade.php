@extends('layouts.app')

@section('content')
{{-- card trovata sul sito di bootstrap --}}
<div class="container">
  <h1>pagina profilo utente</h1>
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      @if (!empty($user->userDetail))
        <a href="#" data-toggle="modal" data-target="#uploadImageForm">
          <img class="card-img-top" src="{{ asset('storage/'. $user->userDetail->profile_picture)}}" alt="immagine profilo di {{ $user->name}}">
        </a>
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

<!-- Modal -->
<div class="modal fade" id="uploadImageForm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleziona foto profilo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- copiato form --}}
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

      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>


@endsection
