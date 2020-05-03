<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingreso_vehiculo;
use App\Ticket;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ticket = DB::table('vehiculos as v')
                ->join('ingreso_vehiculos as i', 'i.vehiculo_id', '=', 'v.id')
                ->join('tipo_vehiculos as tv', 'tv.id', '=', 'i.id')
                ->join('tarifas as t', 'tv.id', '=', 't.tipo_vehiculo_id')
                ->SELECT('i.id', 'v.placa', 'tv.nombre', 'i.fecha_ingreso', 't.valor')
                ->where('v.placa', 'LIKE', '%' . $query . '%')
                ->where('t.estado', 1)
                ->where('i.estado', 1)
                ->paginate(10);
            return view('ticket.index', ["ticket" => $ticket, "searchText" => $query]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generarTicket($ticket, $id, $valor)
    {
        $mytime = Carbon::now('America/Carbon');
        $tarifa = Ingreso_vehiculo::findOrFail($id);
        $horas = $tarifa->fecha_ingreso->diffHours();
        $total = $horas * $valor;

        $ticket = new Ticket;
        $ticket->fecha_salida = $mytime->toDateString();
        $ticket->total = $total;
        $ticket->ingreso_vehiculo_id = $id;
        $ticket->save();

        $tarifa->estado = '0';
        $tarifa->update();
    }

    public function create()
    {
        $ticket = DB::table('ticket')
            ->select('ingreso_vehiculos.id')
            ->get();
        return view('ticket.create')->with('ingreso_vehiculos', $ticket);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new Ticket;
        $ticket->vehiculo_id = $request->get('fecha_salida');
        $ticket->fecha_ingreso = $request->get('total');
        $ticket->estado = $request->get('ingreso_vehiculo_id');
        $ticket->save();
        return Redirect::to('Ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = ticket::find($id);
        return view('Ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = ticket::find($id);
        return view('Ticket.edit', compact('ticket'));
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
        $this->validate($request, ['fecha_salida' => 'required', 'total' => 'required', 'ingreso_vehiculo_id' => 'required']);
        ticket::find($id)->update($request->all());
        return redirect()->route('Ticket.index')->with('success', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::find($id)->delete();
        return redirect()->route('Ticket.index')->with('success', 'Registro Eliminado');
    }
}
