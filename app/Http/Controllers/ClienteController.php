<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::select("SELECT * FROM clientes");
        return view('cliente.index')->with("datos",$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       try {
            $activo = $request->has('txtActivo') ? 1 : 0;
            $sql=DB::insert("INSERT INTO clientes(nombre,ruc,telefono,direccion,activo)VALUES(?,?,?,?,?)",[
                $request->txtNombre,
                $request->txtRuc,
                $request->txtTelefono,
                $request->txtDireccion,
                $activo
            ]);
       } catch (\Throwable $th) {
        $sql = 0;
       }
        if ($sql == true) {
            return back()->with("Correcto","Usuario registrado correctamente");
        } else{
            return back()->with("Incorrecto","Error al Registrar");
            //. $th->getMessage()
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
     //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
                $sql=DB::update("UPDATE clientes SET nombre=?, ruc=?, telefono=?, direccion=?, activo=? WHERE id=?", [
                    $request->txtNombre,
                    $request->txtRuc,
                    $request->txtTelefono,
                    $request->txtDireccion,
                    intval($request->txtActivo),
                    $request->txtid,
                ]);
                if ($sql == 0) {
                    $sql = 1;
                } 
            } catch (\Throwable $th) {
                $sql = 0;
            }
                if ($sql == true) {
                    return back()->with("Correcto","Usuario Modificado correctamente");
                } else {
                    return back()->with("Incorrecto","Error al Modificar" . $th->getMessage());
                }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $sql=DB::delete("DELETE FROM clientes WHERE id=$id");
           } catch (\Throwable $th) {
            $sql = 0;
           }
            if ($sql == true) {
                return back()->with("Correcto","Usuario Eliminado correctamente");
            } else{
                return back()->with("Incorrecto","Error al Eliminar");
            }
    }
}
