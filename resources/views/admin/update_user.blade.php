@extends('layouts.principal')

@section('navbar')
    @include('layouts.admin_navbar')
@endsection

@section('contenu')

    <div class="d-flex justify-content-center mt-4">
        <h4>Modifier {{ $user->NOM }}</h4>

    </div>

    <hr>
        <form method="post" action="{{ route('U_update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $user->ID }}">
            <div class="form-group">
                <label for="nom" class="titre">Nom:</label><br>
                <input type="text" class="form-control" name="nom"  value="{{ $user->NOM }}" id="nom" required />
            </div>
            <div class="form-group">
                <label for="prenom" class="titre">Prénom:</label><br>
                <input type="text" class="form-control" name="prenom"  value="{{ $user->PRENOM }}" id="prenom" required />
            </div>
            <div class="form-group">
                <label for="mail" class="titre">Adresse e-mail:</label><br>
                <input type="email" class="form-control" name="mail" id="mail"  value="{{ $user->MAIL }}" required />
            </div>
            <div class="form-group">
                <label for="mdp" class="titre">Mot de passe:</label><br>
                <input type="text" class="form-control" name="mdp" id="mdp" required/>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <input type="submit" id="sub_ajouter" class="btn btn-primary" value="Modifier" />
            </div>
        </form>

        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <h6 class="text text-center text-danger">{{ $item }}</h6>
            @endforeach

        @endif
@endsection
