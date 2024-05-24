<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.usuarios', ['user' => $users]);
    }
    public function importExcel(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'Usuarios importados con éxito.');
    }
}
