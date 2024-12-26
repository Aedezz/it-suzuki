<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProblemController extends Controller
{
    public function index(Request $request)
{
    // Ambil parameter perPage dan search dari request
    $perPage = $request->get('perPage', 10);
    $search = $request->get('search', '');

    // Query dasar
    $query = DB::table('problem')
        ->join('cabang2', 'problem.id_cabang', '=', 'cabang2.kode')
        ->select('problem.*', 'cabang2.nama as nama_cabang')
        ->when($search, function ($query) use ($search) {
            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('problem.kategori', 'like', "%$search%")
                         ->orWhere('problem.pic', 'like', "%$search%")
                         ->orWhere('problem.informasi', 'like', "%$search%");
            });
        })
        ->orderBy('problem.id', 'desc'); // Urutkan data berdasarkan yang terbaru

    // Jika ada pencarian, tampilkan semua data tanpa pagination
    if ($search) {
        $problems = $query->get(); // Semua data tanpa pagination
    } else {
        $problems = $query->paginate($perPage); // Data dengan pagination
    }

    // Jika request AJAX, kirimkan partial view (hanya tabel yang diperbarui)
    if ($request->ajax()) {
        return response()->json([
            'html' => view('problem.table', compact('problems', 'search'))->render()
        ]);
    }

    // Kembalikan view utama
    return view('problem.index', compact('problems', 'perPage', 'search'));
}

    public function chart()
    {
        // Data untuk chart
$categories = ['External', 'Internal'];
$monthLabels = [];
$externalCounts = [];
$internalCounts = [];

// Mulai dari bulan ini
$currentMonth = now();

// Iterasi untuk 12 bulan (termasuk pergantian tahun)
for ($i = 0; $i < 12; $i++) {
    $monthLabels[] = $currentMonth->format('M Y'); // Format bulan dan tahun
    foreach ($categories as $category) {
        $count = DB::table('problem')
            ->where('kategori', $category)
            ->whereMonth('down', $currentMonth->month)
            ->whereYear('down', $currentMonth->year)
            ->count();

        if ($category == 'External') {
            $externalCounts[] = $count;
        } else {
            $internalCounts[] = $count;
        }
    }
    $currentMonth->addMonth(); // Tambahkan satu bulan
}


        return view('problem.chart', compact('monthLabels', 'externalCounts', 'internalCounts'));
    }

    public function create()
    {
        $cabang = DB::table('cabang2')->get();
        return view('problem.create', compact('cabang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:External,Internal',
            'down' => 'required|date|before_or_equal:up',
            'up' => 'required|date|after_or_equal:down',
            'pic' => 'required|max:50|string',
            'informasi' => 'required|max:200|string',
            'id_cabang' => 'required|exists:cabang2,kode',
        ]);

        DB::table('problem')->insert([
            'kategori' => $request->kategori,
            'down' => $request->down,
            'up' => $request->up,
            'pic' => $request->pic,
            'informasi' => $request->informasi,
            'id_cabang' => $request->id_cabang,
        ]);

        return redirect()->route('problem.index')->with('success', 'Problem berhasil ditambahkan!');
    }

}