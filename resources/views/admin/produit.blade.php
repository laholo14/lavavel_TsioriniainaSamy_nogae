@extends('layouts.principal')

@section('navbar')
    @include('layouts.admin_navbar')
@endsection


@section('contenu')


    <div class="d-flex justify-content-between mt-4">
        <h4>Les Produits</h4>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ajouter">Ajouter nouveau Produit</button>
    </div>

    <hr>
    <table border="0" class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th class="text-center" width="200px"></th>
                <th class="text-center" width="200px">Titre</th>
                <th class="text-center" width="200px">Prix</th>
                <th class="text-center" width="200px">Stock</th>
                <th class="text-center" width="200px">Description</th>
                <th class="text-center" width="200px"></th>


                <!-- <th class="text-center" width="">Action</th> -->
            </tr>
        </thead>
        <tbody>
            @if ($produit->count() > 0)
                @foreach ($produit as $item)
                    <tr>
                        <td class="text-center"><img width="40%" src="{{ Storage::url($item->IMAGE) }}" alt=""></td>
                        <td class="text-center">{{ $item->TITRE }}</td>
                        <td class="text-center">{{ $item->PRIX }} Ar </td>
                        <td class="text-center">{{ $item->QTE }} </td>
                        <td class="text-center">{{ $item->DESCRIPTION }} </td>
                        <td class="d-flex justify-content-center"><a href="{{ route('P_id', ['id' => $item->ID]) }}"
                            class="btn btn-outline-success"> Modifier </a>  <a href="{{ route('P_delete', ['id' => $item->ID]) }}"
                                class="btn btn-outline-danger ml-2"> Supprimer</a></td>
                    </tr>
                @endforeach

            @endif
            <div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center ">
                            <h5 class="modal-title" id="">Formulaire à remplir</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('P_create') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="titre" class="titre">Titre:</label><br>
                                    <input type="text" class="form-control" name="titre" id="titre" required />
                                </div>
                                <div class="form-group">
                                    <label for="prix" class="titre">Prix:</label><br>
                                    <input type="number" class="form-control" name="prix" id="prix" required />
                                </div>
                                <div class="form-group">
                                    <label for="description" class="titre">Déscription:</label><br>
                                    <textarea name="description"  class="form-control"id="description" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="qte" class="titre">Stock:</label><br>
                                    <input type="number" class="form-control" name="qte" id="qte" required/>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="titre">Image:</label><br>
                                    <input type="file" class="form-control" name="image" id="image" accept="image/*" required/>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <input type="submit" id="sub_ajouter" class="btn btn-primary" value="Ajouter" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </tbody>


        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <h6 class="text text-center text-danger">{{ $item }}</h6>
            @endforeach

        @endif
    @endsection
