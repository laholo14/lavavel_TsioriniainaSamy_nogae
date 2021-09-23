<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProduitComtroller extends Controller
{
    //
    public function index()
    {

        $produit = Produit::orderBy('TITRE')->get();

        return view('admin.produit', compact('produit'));
    }

    public function read()
    {

        $produit = Produit::orderBy('TITRE')->get();
        $panier = Commande::join('clients', 'clients.id', '=', 'commandes.client_id')
            ->join('produits', 'produits.id', '=', 'commandes.produit_id')
            ->where('status_pannier', False)
            ->get(['commandes.id','produit_id','client_id','QUANTITER','PRIX','NOM','TITRE']);

        return view('index', compact('produit', 'panier'));
    }

    public function readById($id)
    {
        $produit = Produit::findOrfail($id);
        return view('admin.update_produit', compact('produit'));
    }

    public function details($id)
    {
        $produit = Produit::findOrfail($id);
        $panier = Commande::join('clients', 'clients.id', '=', 'commandes.client_id')
            ->join('produits', 'produits.id', '=', 'commandes.produit_id')
            ->where('status_pannier', False)
            ->get(['commandes.id','produit_id','client_id','QUANTITER','PRIX','NOM','TITRE']);

        return view('details', compact('produit','panier'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'titre' => 'required',
            'prix' => 'required',
            'qte' => 'required',
            'description' => 'required',
            'image' => 'required|unique:produits',
        ]);

        $filename = time() . '.' . $request->image->extension();
        $pathImg = $request->image->storeAs('couverture', $filename, 'public');

        Produit::create([
            "TITRE" => $request->titre,
            "PRIX" => $request->prix,
            "QTE" => $request->qte,
            "DESCRIPTION" => $request->description,
            "IMAGE" => $pathImg

        ]);

        return redirect(route('produit_admin'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'prix' => 'required',
            'qte' => 'required',
            'description' => 'required',
            'image' => 'required|unique:produits',
        ]);

        $filename = time() . '.' . $request->image->extension();
        $pathImg = $request->image->storeAs('couverture', $filename, 'public');

        Produit::where('ID', $request->id)->update([
            "TITRE" => $request->titre,
            "PRIX" => $request->prix,
            "QTE" => $request->qte,
            "DESCRIPTION" => $request->description,
            "IMAGE" => $pathImg
        ]);

        return redirect(route('produit_admin'));
    }

    public function delete($id)
    {
        Produit::where('ID', $id)->delete();
        return redirect(route('produit_admin'));
    }
}
