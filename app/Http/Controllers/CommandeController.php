<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;

class CommandeController extends Controller
{
    //

    public function create_panier(Request $request)
    {
        $request->validate([
            "produit_id" => "required|numeric",
            "client_id" => "required|numeric",
            "status" => "required|boolean",
            "qte" => "required|numeric"
        ]);

        Commande::create([
            "PRODUIT_ID" => $request->produit_id,
            "CLIENT_ID" => $request->client_id,
            "STATUS" => $request->status,
            "QUANTITER" => $request->qte
        ]);

        return redirect(route('list_produit'));
    }

    public function acheter_panier($id_c,$id_p,$qte)
    {

        Commande::where('ID',$id_c)->update([
            "STATUS_PANNIER" => True
        ]);

        $produit = Produit::findOrfail($id_p);
        $reste = ($produit->QTE - $qte);

        Produit::where('ID',$id_p)->update([
            "QTE" => $reste
        ]);
        return redirect(route('list_produit'));
    }

    public function read()
    {
       $commande = Commande::join('clients','clients.id','=','commandes.client_id')
                             ->join('produits','produits.id','=','commandes.produit_id')
                             ->where('status_pannier',True )
                             ->get();

        return view('admin.commande',compact('commande'));
    }


}
