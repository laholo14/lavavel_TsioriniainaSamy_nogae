
<header class="container-fluid">
    <nav class="row">
        <div class="col-2 logo">
            <span>I-Varotra</span>
        </div>

        <div class="col-6 recherche">
            <form method="" action="">
                <input type="text" name="" placeholder="recherche">
                <input type="submit" name="" value="Recherche">
            </form>
        </div>

        <div class="col-4 d-flex justify-content-center">
            <div class="dropdown panier">
                <button class="btn_panier dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Panier
                </button>
                <div class="dropdown-menu panier_liste" aria-labelledby="dropdownMenuButton">
                    @if ($panier->count() > 0)
                         @foreach ($panier as $item)
                         <div class="row mb-2">
                            <div class="col-9">
                                <span>{{ $item->TITRE }} |</span>
                                <span>{{ $item->NOM }} |</span>
                                <span>{{ $item->QUANTITER }} |</span>
                                <span class="ml-1">{{ $item->PRIX }}Ar</span>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('Acheter',['id_c' => $item->id, 'id_p' => $item->produit_id , 'qte' => $item->QUANTITER]) }}" class="btn btn-outline-primary mr-3">Acheter</a>
                            </div>
                        </div>
                        <hr>
                         @endforeach
                  @else
                  <h5 class="text-danger text-center">Pas de contenu</h5>
                    @endif


                </div>
            </div>
        </div>
    </nav>
</header>

