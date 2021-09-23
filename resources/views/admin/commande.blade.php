@extends('layouts.principal')

@section('navbar')
    @include('layouts.admin_navbar')
@endsection


@section('contenu')

    <div class="d-flex justify-content-center mt-4">
        <h4>Les Commandes</h4>
    </div>
<hr>
    <table border="0" class="table table-border-danger table-striped">
        <thead>
            <tr>
                <th class="text-center" width="">Nom</th>
                <th class="text-center" width="">Prénom</th>
                <th class="text-center" width="">e-mail</th>
                <th class="text-center" width="">Produit</th>
                <th class="text-center" width="">Quantité</th>
                <!-- <th class="text-center" width="">Action</th> -->
            </tr>
        </thead>
        <tbody>
            @if ($commande->count() > 0)
                @foreach ($commande as $item)
                    <tr>
                        <td class="text-center">{{ $item->NOM }}</td>
                        <td class="text-center">{{ $item->PRENOM }} </td>
                        <td class="text-center">{{ $item->MAIL }} </td>
                        <td class="text-center">{{ $item->TITRE }} </td>
                        <td class="text-center">{{ $item->QUANTITER }} </td>

                    </tr>
                @endforeach
            @endif

        </tbody>


        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <h6 class="text text-center text-danger">{{ $item }}</h6>
            @endforeach

        @endif
    @endsection
