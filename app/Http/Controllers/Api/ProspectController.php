<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Domaine;
use App\Models\Prospect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Prospect::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prospect = new Prospect();
        $input = $request->all();

        $domaine = Domaine::where('nom', $request->input('domaine'))->first();
        $prospect->domain_id = $domaine->id;
        $prospect->nom = $input['nom'];
        $prospect->telephone = $input['telephone'];
        $prospect->addresse = $input['addresse'];
        $prospect->latitude = $input['latitude'];
        $prospect->longitude = $input['longitude'];
        $prospect->save();
        return $prospect;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $prospect = Prospect::find($id);
        $domaine = Domaine::where('nom', $request->input('domaine'))->first();
        $prospect->domain_id = $domaine->id;
        $prospect->nom = $input['nom'];
        $prospect->telephone = $input['telephone'];
        $prospect->addresse = $input['addresse'];
        $prospect->latitude = $input['latitude'];
        $prospect->longitude = $input['longitude'];
        $prospect->update();
        return $prospect;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prospect::find($id)->delete();
    }
}
