<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoRequest;
use App\Mail\ContactoMail;
use App\Pagina;
use App\Sbif;
use Illuminate\Http\Request;
use App\Http\Controllers\PropiedadesController as PropiedadesController;
use Illuminate\Support\Facades\Mail;
use Session;


class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['destacados'] = PropiedadesController::propiedadesDestacadas();
        $data['paginas'] = Pagina::all();
        $data['sbif'] = Sbif::first();

        return view('paginas.contacto', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactoRequest $request)
    {

        dd($request->all());

        try{
            Mail::to($request->email)->send(new ContactoMail($request->mensaje));
        }
        catch (\Exception $e){
            return redirect()->route('contacto.index');
        }

        return redirect()->route('contacto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
