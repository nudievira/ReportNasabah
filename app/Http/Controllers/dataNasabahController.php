<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;



class dataNasabahController extends Controller
{
    public function index()
    {
        $userNasabah = DB::table('data_nasabah')->get();
        return view('nasabah.index',compact('userNasabah'));
    }

    public function dataTables(Request $request)
    {
        $userNasabah = DB::table('data_nasabah')->orderBy('id', 'desc')->get();
        if($request->ajax()) {
            $table = DataTables::of($userNasabah)
            ->addIndexColumn()
            ->addColumn('Name', function($userNasabah){
                $nama = ($userNasabah->Name);
                return $nama;
            })
            ->addColumn('action', function($userNasabah){
                $btn = '';
                $btn = '<a type="button" data-target="#transaksiModal" data-toggle="modal" id="modalTransaksi" data-param="' . $userNasabah->id . '" class="btn btn-sm btn-outline-info">Transaksi</a>';
                $btn .= '&nbsp;';
                $btn .= '<a href="'. route('viewPoint-Nasabah', ['id' => $userNasabah->id ]).'" type="button"  class="btn btn-sm btn-outline-success">Lihat Point</a>';
                $btn .= '&nbsp;';
                $btn .= '<a href="'. route('reportNasabah-Nasabah', ['id' => $userNasabah->id ]).'" type="button"  class="btn btn-sm btn-outline-primary">Report</a>';
                return $btn;
            })
            ->rawColumns(['Name','action'])
            ->make(true);
            return $table;
        }
    }

    public function addNasabah(Request $request)
    {
        $newNasabah = DB::table('data_nasabah')->insert([
            'Name' => $request->nama
        ]);
        toast('User berhasil ditambah','success')->autoClose(5000);
        return redirect()->back();
    }

    public function addTransaksi(Request $request)
    {

        $nasabah = DB::table('transaksi_nasabah')->insert([
            'idDataNasabah' => $request->id,
            'TransactionDate' => date('Y-m-d H:i:s'),
            'Description' => $request->description,
            'DebitCreditStatus'=> $request->DebitCreditStatus,
            'Amount' => $request->Amount
        ]);
        $point = 0;
        $point1 = 0;
        $point2 = 0;
        $total = 0;
        if($request->description === 'Beli Pulsa'){
            if ($request->Amount >= 10000) {
                $point = 10000 / 1000 * 0;
            } else {
                $point = floor(($request->Amount / 1000) * 0); // floor digunakan untuk membulatkan nilai ke bawah
            }
            if ($request->Amount > 30000) {
                $point1 = 30000 / 1000 * 1; // floor digunakan untuk membulatkan nilai ke bawah
            } else if($request->Amount > 10000 && $request->Amount <= 30000){
                $point1 = floor(($request->Amount / 1000)) * 1; // floor digunakan untuk membulatkan nilai ke bawah
            }
            if ($request->Amount > 30000) {
                $point2 = floor(($request->Amount / 1000)) * 2; // floor digunakan untuk membulatkan nilai ke bawah
            }
           $total = $point + $point1 + $point2;
        }

        if($request->description === 'Bayar Listrik'){
            if ($request->Amount >= 50000) {
                $point = 50000 / 2000 * 0;
            } else {
                $point = floor(($request->Amount / 2000) * 0); // floor digunakan untuk membulatkan nilai ke bawah
            }
            if ($request->Amount >= 100000) {
                $point1 = 100000 / 2000 * 1; // floor digunakan untuk membulatkan nilai ke bawah
            } else if($request->Amount > 50000 && $request->Amount < 100000){
                $point1 = floor(($request->Amount / 2000)) * 1; // floor digunakan untuk membulatkan nilai ke bawah
            }
            if ($request->Amount > 100000) {
                $point2 = floor(($request->Amount / 2000)) * 2; // floor digunakan untuk membulatkan nilai ke bawah
            }
            $total = $point + $point1 + $point2;

        }

        if($request->description === 'Bayar Listrik' || $request->description === 'Beli Pulsa'){
            $nasabah = DB::table('poin_nasabah')->insert([
                'idDataNasabah' => $request->id,
                'totalPoint' => $total,
            ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function viewPoint(Request $request)
    {
        $nasabah = DB::table('data_nasabah')
        ->join('poin_nasabah', 'data_nasabah.id','=','poin_nasabah.idDataNasabah')
        ->where('data_nasabah.id', $request->id)
        ->first();
        $totalPoint = DB::table('data_nasabah')
        ->join('poin_nasabah', 'data_nasabah.id','=','poin_nasabah.idDataNasabah')
        ->select('idDataNasabah', DB::raw('SUM(totalPoint) as total'))
        ->where('data_nasabah.id', $request->id)
        ->groupBy('idDataNasabah')
        ->first();
     return view('nasabah.viewPoint', compact('nasabah', 'totalPoint'));
    }

    public function reportNasabah(Request $request)
    {
        $transaksiNasabah = DB::table('transaksi_nasabah')
        ->where('idDataNasabah', $request->id)
        ->get();
        return view('nasabah.report', compact('transaksiNasabah'));
    }
}
