@extends('layouts.principal')

@section('navbar')
    @include('layouts.client_navbar')
@endsection

@section('lien_css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('contenu')
    <main class="container-fluid mt-5">
        <section class="row">
            <div class="col-4">
                <img src="{{ Storage::url($produit->IMAGE) }}" alt="" class="img-fluid">
            </div>

            <div class="col-8 details pl-5 mt-5">
                <h4>Description: </h4>
                <p class="ml-4">{{ $produit->DESCRIPTION }}</p>
                <div class="d-flex">
                    <h5>Stock: </h5>
                    <h5 class="ml-2"> {{ $produit->QTE }}</h5>
                </div>
                <br>
                <div class="d-flex">
                    <h4>Prix unitaire: </h4>
                    <h4 class="ml-2">{{ $produit->PRIX }} Ar</h4>
                </div>
                <br>
               <button class="btn btn-outline-success" data-toggle="modal" data-target="#client">AJouter au panier</button>
            </div>
        </section>
    </main>

    <div class="modal fade" id="client" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center ">
                    <h5 class="modal-title" id="">Formulaire à remplir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('C_create') }}">
                        @csrf
                        <input type="hidden" name="produit_id" value="{{ $produit->ID }}">
                        <div class="form-group">
                            <label for="nom" class="titre">Nom:</label><br>
                            <input type="text" class="form-control" name="nom" id="nom" required />
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="titre">Prénom:</label><br>
                            <input type="text" class="form-control" name="prenom" id="prenom" required />
                        </div>
                        <div class="form-group">
                            <label for="mail" class="titre">Adresse e-mail:</label><br>
                            <input type="email" class="form-control" name="mail" id="mail" required />
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="titre">Votre Adresse :</label><br>
                            <input type="text" class="form-control" name="adresse" id="adresse" required/>
                        </div>
                        <div class="form-group">
                            <label for="qte" class="titre">Quantité :</label><br>
                            <input type="number" class="form-control" name="qte" id="qte" required/>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" id="sub_ajouter" class="btn btn-outline-success" value="Ajouter" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
