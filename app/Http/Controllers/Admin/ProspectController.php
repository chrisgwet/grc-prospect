<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HistoriqueBuilder;
use App\Http\Controllers\Controller;
use App\Models\Domaine;
use App\Models\Historique;
use App\Models\Prospect;
use App\Models\TypeHistorique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class ProspectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $prospectInTrash = Prospect::onlyTrashed()->count();
        $addresse = $request->query('addresse');
        $nom = $request->query('nom');
        if (!empty($nom) && !empty($reference)) {
            $data = Prospect::sortable()
                ->where('nom', 'like', '%'.$nom.'%')
                ->where('addresse', 'like', '%'.$addresse.'%')
                ->orderBy('id','DESC')
                ->paginate(10);
        }
        if (!empty($nom) && empty($addresse)) {
            $data = Prospect::sortable()
                ->where('nom', 'like', '%'.$nom.'%')
                ->orderBy('id','DESC')
                ->paginate(10);
        }
        if (empty($nom) && !empty($addresse)) {
            $data = Prospect::sortable()
                ->where('addresse', 'like', '%'.$addresse.'%')
                ->orderBy('id','DESC')
                ->paginate(10);
        }
        else {
            $data = Prospect::sortable()
                ->orderBy('id','DESC')
                ->paginate(10);
        }

        return view('admin.prospects.index',compact('data','addresse','nom','prospectInTrash'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $domaines = Domaine::orderBy('nom','ASC')->pluck('nom','nom')->all();
        return view('admin.prospects.create', compact('domaines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'telephone' => 'required|min:8',
            'addresse' => 'required',
        ]);
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

        return redirect()->route('admin.prospects.index')->with('success','Prospect cree avec succes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $prospect = Prospect::find($id);
        return view('admin.prospects.edit',compact('prospect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
            'telephone' => 'required|min:8',
            'addresse' => 'required',
        ]);
        $input = $request->all();
        $prospect = Prospect::find($id);

        $prospect->update($input);
        return redirect()->route('admin.prospects.index')->with('success','Prospect modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Prospect::find($id)->delete();
        return redirect()->route('admin.prospects.index')->with('success','Prospect supprime avec succes');
    }

    public function getDeleteUsers(Request $request){
        $prospects = Prospect::onlyTrashed()->paginate(10);
        return view('admin.prospects.trash',compact('prospects'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function restoreDeleteUsers($id){
        $prospect = Prospect::where('id',$id)->withTrashed()->first();
        $prospect->restore();
        return redirect(route('admin.prospects.trash'))->with('success','Prospect restauree avec succes');
    }

    public function deletePermanentlyUser($id){
        $prospect = Prospect::where('id',$id)->withTrashed()->first();
        $prospect->forceDelete();
        return redirect(route('admin.prospects.trash'))->with('success','Prospect supprimee definitivement!');
    }
}
