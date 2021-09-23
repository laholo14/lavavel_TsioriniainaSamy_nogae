<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;

class ClientController extends Controller
{
    //

    public function create(Request $request)
    {
        $request->validate([
            "nom" => "required|alpha",
            "prenom" => "required|alpha",
             "mail" => "required|email",
             "adresse" => "required|alpha_num"
        ]);

        $client = Client::create([
         "NOM" => $request->nom,
         "PRENOM" => $request->prenom,
         "MAIL" => $request->mail,
         "ADRESSE" => $request->adresse
        ]);

        $commande = new Commande();
        $commande->QUANTITER = $request->qte;
        $commande->STATUS_PANNIER = False;
        $commande->PRODUIT_ID = $request->produit_id;
        $client->commandes()->save($commande);

        return redirect(route('list_produit'));
    }
}
