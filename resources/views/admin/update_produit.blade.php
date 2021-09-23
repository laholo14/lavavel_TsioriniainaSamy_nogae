@extends('layouts.principal')

@section('navbar')
    @include('layouts.admin_navbar')
@endsection

@section('contenu')

    <div class="d-flex justify-content-center mt-4">
        <h4>Modifier {{ $produit->TITRE }}</h4>

    </div>

    <hr>
        <form method="post" action="{{ route('P_update') }}"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $produit->ID }}">
            <div class="form-group">
                <label for="titre" class="titre">Titre:</label><br>
                <input type="text" class="form-control" name="titre" id="titre" value="{{ $produit->TITRE }}" required />
            </div>
            <div class="form-group">
                <label for="prix" class="titre">Prix:</label><br>
                <input type="number" class="form-control" name="prix" id="prix" value="{{ $produit->PRIX }}" required />
            </div>
            <div class="form-group">
                <label for="description" class="titre">Déscription:</label><br>
                <textarea name="description"  class="form-control"id="description" cols="30" rows="5">{{ $produit->DESCRIPTION }}</textarea>
            </div>
            <div class="form-group">
                <label for="qte" class="titre">Stock:</label><br>
                <input type="number" class="form-control" name="qte" id="qte" value="{{ $produit->QTE }}" required/>
            </div>
            <div class="form-group">
                <label for="image" class="titre"><img width="10%" src="{{ Storage::url($produit->IMAGE) }}" alt=""></label><br>
                <input type="file" class="form-control" name="image" id="image" accept="image/*" value="{{ Storage::url($produit->IMAGE) }}"/>
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
