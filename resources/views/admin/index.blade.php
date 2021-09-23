@extends('layouts.principal')

@section('navbar')
    @include('layouts.admin_navbar')
@endsection


@section('contenu')


    <div class="d-flex justify-content-between mt-4">
        <h4>Les Utilisateurs</h4>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ajouter">Ajouter nouvel Utilisateur</button>
    </div>

    <hr>
    <table border="0" class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th class="text-center" width="200px">Nom</th>
                <th class="text-center" width="200px">Prénom</th>
                <th class="text-center" width="200px">e-mail</th>


                <!-- <th class="text-center" width="">Action</th> -->
            </tr>
        </thead>
        <tbody>
            @if ($user->count() > 0)
                @foreach ($user as $item)
                    <tr>
                        <td class="text-center">{{ $item->NOM }}</td>
                        <td class="text-center">{{ $item->PRENOM }} </td>
                        <td class="text-center">{{ $item->MAIL }} </td>
                        <td class=""><a href=" {{ route('U_id', ['id' => $item->ID]) }}"
                            class="btn btn-outline-success">Modifier </a> <a href="{{ route('U_delete', ['id' => $item->ID]) }}"
                                class="btn btn-outline-danger">Supprimer</a></td>
                    </tr>
                @endforeach

            @endif
        </tbody>
    </table>
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
                            <form method="post" action="{{ route('U_create') }}">
                                @csrf
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
                                    <label for="mdp" class="titre">Mot de passe:</label><br>
                                    <input type="text" class="form-control" name="mdp" id="mdp" required/>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <input type="submit" id="sub_ajouter" class="btn btn-primary" value="Ajouter" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <h6 class="text text-center text-danger">{{ $item }}</h6>
            @endforeach

        @endif
    @endsection
