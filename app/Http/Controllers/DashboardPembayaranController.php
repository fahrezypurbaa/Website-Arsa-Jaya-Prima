<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class DashboardPembayaranController extends Controller
{

    public function index()
    {
        $pembayarans = Pembayaran::select('pembayarans.id as pembayaran_id','users.username','trainings.name as program_pelatihan','pembayarans.status','pembayarans.bukti_pembayaran')->join('pelatihans','pelatihans.id','=','pembayarans.pelatihan_id')->join('users','users.id','=','pelatihans.user_id')->join('trainings','trainings.id','=','pelatihans.training_id')->get();
        return view('dashboard.pembayaran.index', [
            'title' => 'Pembayaran pelatihan'
        ], compact('pembayarans'));
    }

    public function show(string $id)
    {
        $pembayaran = Pembayaran::where('id','=', $id)->first();
        return view('dashboard.pembayaran.show', [
            'title' => 'Pembayaran pelatihan'
        ], compact('pembayaran'));
    }

    public function edit($id){
        $pembayaran = Pembayaran::select('pembayarans.id as pembayaran_id','users.username','trainings.name as program_pelatihan','pembayarans.status','pembayarans.bukti_pembayaran')->join('pelatihans','pelatihans.id','=','pembayarans.pelatihan_id')->join('users','users.id','=','pelatihans.user_id')->join('trainings','trainings.id','=','pelatihans.training_id')->where('pembayarans.id','=',$id)->first();
        $status = ['Belum Lunas','Lunas'];
        return view('dashboard.pembayaran.edit',[
            'title' => 'Edit Pembayaran',
            'status' => $status
        ], compact('pembayaran'));
    }

    public function update(Request $request, Pembayaran $pembayaran){
        $rules = [
            'status' => 'required'
        ];
        $validatedData = $request->validate($rules);
         if($request->status == 'Lunas'){
            Pelatihan::join('pembayarans', 'pembayarans.pelatihan_id','=','pelatihans.id')
            ->where('pembayarans.pelatihan_id', $pembayaran->pelatihan_id)
            ->update(['pelatihans.role'=>'Peserta']);
        }     
        Pembayaran::where('id', $pembayaran->id)->update($validatedData);
        return redirect('/dashboard/pembayaran');

    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect('/dashboard/pembayaran');
    }
}
