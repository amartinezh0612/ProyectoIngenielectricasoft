<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Roles;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RolesFormrequest;
use DB;

class RolesController extends Controller
{
    //definicion de funciones
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $roles=Roles::orderBy('id_rol','DESC')->paginate();
        return view('roles.list',compact('roles'));
    }
}
