<?php

namespace App\Http\Controllers;

use Carbon\Traits\ToStringFormat;
use Illuminate\Http\Request;

use App\Models\Reserva;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    /* Mostra as reservas do banco na home */
    public function index() {

        // $reservas = Reserva::all();
        $reservas =  DB::table('reservas')
        ->where('data', '>=', date("Y-m-d"))
        ->orderBy("data")
        ->orderBy("inicio")
        ->get();
        $users = User::all();

        return view('welcome', ['reservas' => $reservas, 'users' => $users]);
    }

    public function create() {
      return view('reservas.create'); 
    }
    
    /* Cria a reserva no banco */
    public function store(Request $request) {
        
        $user = auth()->user();

        if($this->disponibilidadeMesa($request, $user)){ 
            return redirect('/reservas/create')
                   ->with('msg', 'Mesa indisponível para este horário');
        } else {
            $reserva = new Reserva;
            $reserva->data = $request->data;
            $reserva->inicio = $request->inicio;
            $reserva->fim = $request->fim;
            $reserva->mesa_id = $request->nMesa;
            $reserva->user_id = $user->id;

            $reserva->save();

            return redirect('/');
        }
    }

    /* 
     Retorna se a mesa esta indisponível ou
     o usuário ja tenha alguma mesa reservada no mesmo horário
    */
    private function disponibilidadeMesa($request, $user){
        $vago = DB::table('reservas')
        ->where(function($query) use ($request, $user) {
            $query->where('mesa_id', $request->mesa_id)
                  ->orWhere('user_id', $user->id); 
        })
        ->where('data', $request->data)
        ->where(function($query) use ($request) {
            $query->where('inicio', '<', $request->fim)
                  ->where('fim', '>', $request->inicio);
        })
        ->count();

        return $vago > 0;
    }

    /* Mostra as reservas do usuário */
    public function dashboard(){

        $user = auth()->user();

        $reservas = $user->reservas;

        $reservaAsParticipant = $user->reservaAsParticipant;

        return view('reservas.dashboard', 
            ['reservas' => $reservas, 'reservasasparticipant' => $reservaAsParticipant]);
    }

    /* Deleta uma reserva */
    public function destroy($id) {

        Reserva::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Reserva excluída com sucesso');
    }

}
