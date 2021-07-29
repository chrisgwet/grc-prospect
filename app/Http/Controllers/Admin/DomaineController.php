<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DomaineController extends Controller
{
    public function index(Request $request)
    {
        $domaines = Domaine::orderBy('id','DESC')->paginate(10);
        return view('admin.domaines.index',compact('domaines'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'slug' => 'required'
        ]);
        $domaine = new Domaine();
        $domaine->nom = $request->input('nom');
        $domaine->slug = strtolower(Str::slug($request->input('slug'),'-'));
        $domaine->save();

        return redirect()->route('admin.domaines.index')->with('success','Domaine cree avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $domaine = Domaine::find($id);
        $domaine->delete();
        return redirect(route('admin.domaines.index'))->with('success','Domaine supprimee avec success');
    }
}
