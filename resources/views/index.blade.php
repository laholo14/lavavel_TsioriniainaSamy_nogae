@extends('layouts.principal')

@section('navbar')
    @include('layouts.client_navbar')
@endsection

@section('lien_css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('contenu')
<br>
<br>
<br>
<hr>
    <main class="container-fluid mt-4">
        <section class="row mt-4">
            @if ($produit->count() > 0)
                @foreach ($produit as $item)
                    <div class="col-2 cards">
                        <img src="{{ Storage::url($item->IMAGE) }}" alt="" class="img-fluid">
                        <div class="cards_body">
                            <h4>{{ $item->TITRE }}</h4>
                            <small>Prix: {{ $item->PRIX }} AR</small>
                            <button><a href="{{ route('details', ['id' => $item->ID]) }}">Details</a></button>
                        </div>
                    </div>
                @endforeach
            @endif
            </section>
    </main>
@endsection

@section('lien_js')
    <script src="{{ asset('js/') }}"></script>
@endsection
