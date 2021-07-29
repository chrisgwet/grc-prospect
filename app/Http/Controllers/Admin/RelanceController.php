<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HistoriqueBuilder;
use App\Http\Controllers\Controller;
use App\Models\Domaine;
use App\Models\Historique;
use App\Models\Prospect;
use App\Models\Relance;
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

class RelanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $dateRelance = $request->query('dateRelance');
        if (!empty($dateRelance)) {
            $data = Relance::sortable()
                ->where('dateRelance', '=', $dateRelance)
                ->orderBy('id','DESC')
                ->paginate(10);
        }
        else {
            $data = Relance::sortable()
                ->orderBy('id','DESC')
                ->paginate(10);
        }

        return view('admin.relances.index',compact('data','dateRelance'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $prospects = Prospect::orderBy('nom','ASC')->pluck('nom','nom')->all();
        return view('admin.relances.create', compact('prospects'));
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
            'dateRelance' => 'required|date'
        ]);
        $relance = new Relance();
        $input = $request->all();

        $prospect = Prospect::where('nom', $request->input('prospect'))->first();
        $relance->prospect_id = $prospect->id;
        $relance->user_id = Auth::user()->id;
        $relance->dateRelance = $input['dateRelance'];
        $relance->effectuee = $request->boolean('effectuee');
        $relance->save();

        return redirect()->route('admin.relances.index')->with('success','Prospect cree avec succes');
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
        return redirect()->route('admin.relances.index')->with('success','Relance modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Relance::find($id)->delete();
        return redirect()->route('admin.relances.index')->with('success','Relance supprimee avec succes');
    }
}
