<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use Illuminate\Http\Request;


class CandidatosController extends Controller
{
    public function index()
    {
        $candidatos = Candidates::paginate(10);
        return view('admin.candidatos', ['candidato' => $candidatos]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'party' => 'required',
            'charge' => 'required',
            'biography' => 'required',
            'photo' => 'required|image',
        ]);

        $photoPath = $request->file('photo')->store('photos', 'public');

        Candidates::insert([
            'name' => $request->input('name'),
            'party' => $request->input('party'),
            'charge' => $request->input('charge'),
            'biography' => $request->input('biography'),
            'photo' => $photoPath,
        ]);
        return redirect()->route('candidatos')->with('success', 'Candidato creado exitosamente');
    }

    public function edit()
    {
        return redirect('candidatos');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'party' => 'required',
            'charge' => 'required',
            'biography' => 'required',
            'photo' => 'required|image',
        ]);

        $photoPath = $request->file('photo')->store('photos', 'public');

        Candidates::where('id', $id)->update([
            'name' => $request->input('name'),
            'party' => $request->input('party'),
            'charge' => $request->input('charge'),
            'biography' => $request->input('biography'),
            'photo' => $photoPath,
        ]);

        return redirect()->route('candidatos')->with('success', 'Candidato actualizado exitosamente');
    }

    public function delete($id)
    {
        Candidates::where('id', $id)->delete();

        return redirect()->route('candidatos')->with('success', 'Candidato eliminado exitosamente');
    }
}
