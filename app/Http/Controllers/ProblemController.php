<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProblemController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 10); 
        $search = $request->get('search', '');

        // Query data problem untuk tabel
        $problems = DB::table('problem')
            ->join('cabang2', 'problem.id_cabang', '=', 'cabang2.kode')
            ->select('problem.*', 'cabang2.nama')
            ->when($search, function ($query) use ($search) {
                return $query->where('problem.kategori', 'like', "%{$search}%")
                             ->orWhere('problem.pic', 'like', "%{$search}%");
            })
            ->paginate($perPage);

        // Data untuk chart
        $categories = ['External', 'Internal'];
        $monthLabels = [];
        $externalCounts = [];
        $internalCounts = [];

        $currentMonth = Carbon::now(); // Mulai dari bulan sekarang
for ($i = 0; $i < 12; $i++) {
    $monthLabels[] = $currentMonth->format('M Y'); // Format bulan tahun
    foreach ($categories as $category) {
        $count = DB::table('problem')
                    ->where('kategori', $category)
                    ->whereMonth('down', $currentMonth->month)
                    ->whereYear('down', $currentMonth->year)
                    ->count();

                if ($category === 'External') {
                    $externalCounts[] = $count;
                } else {
                    $internalCounts[] = $count;
                }
            }
            $currentMonth->addMonth();
        }

        return view('problem.index', compact(
            'problems', 'externalCounts', 'internalCounts', 'monthLabels', 'search', 'perPage'
        ));
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
            'down' => 'required|date|before_or_equal:up|',
            'up' => 'required|date|after_or_equal:down|',
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
