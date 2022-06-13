<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Periode;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Tatus;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Helpers\Universe;
use App\Models\Petugas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Trait_;
use Yajra\DataTables\Contracts\DataTable;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('admins/pembayaran/index', [
            'title' => 'Pembayaran',
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $siswa = Siswa::with(['kelas', 'jurusan'])
            ->where('id', $id)
            ->first();
        $tagihan = Tagihan::all();

        return view('admins/pembayaran/form', [
            'title' => 'Create Pembayaran',
            'siswa' => $siswa,
            'tagihan' => $tagihan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        DB::beginTransaction();

        $siswa = Siswa::with(['kelas', 'jurusan'])
            ->where('id', $id)
            ->first();

        $petugas = Petugas::where('user_id', Auth::user()->id)->first();

        // buat transaksi
        $transaksi = Transaksi::make([
            'petugas_id' => $petugas->id,
            'siswa_id' => $siswa->id,
            'periode' => $request->periode,
            'nis' => $request->nis,
            'jumlah' => $request->jumlah,
            'tanggal_bayar' => Carbon::now('Asia/Jakarta')
        ]);

        if ($transaksi->save()) {

            $histori = Histori::orderBy('created_at', 'desc')->first();

            $histori = Histori::create([
                'transaksi_id' => $transaksi->id,
                'petugas_id' => $petugas->id,
                'siswa_id' => $siswa->id,
                'periode' => $request->periode,
                'nis' => $request->nis,
                'jumlah' => $request->jumlah,
                'tanggal_bayar' => Carbon::now('Asia/Jakarta')
            ]);

            if ($histori) {
                DB::commit();
                return redirect()->route('admins/histori/index', [
                    'type' => 'success',
                    'msg' => 'transaksi berhasil'
                ]);
            } else {
                DB::rollBack();
                return redirect()->route('admins/pembayaran/index', [
                    'type' => 'danger',
                    'msg' => 'transaksi gagal'
                ]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tagihan(Siswa $siswa)
    {
        $tagihan = $this->getTagihan($siswa);
        return response()->json($tagihan);
    }

    protected function getTagihan()
    {
        $tagihan_wajib = Tagihan::where('wajib_semua', '1')->get()->toArray();
        $tagihan = array_merge($tagihan_wajib);

        return $tagihan;
    }
}
