<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProblemController extends Controller
{
    // INDEX: Menampilkan data problem dan chart
    public function index(Request $request)
    {
        // Pagination, search, sorting, dan ordering
        $perPage = $request->get('perPage', 10);
        $search = $request->get('search', '');
        $sort = $request->get('sort', 'problem.id');
        $order = $request->get('order', 'asc');

        // Mengambil data problem dan melakukan join dengan tabel cabang2
        $problems = DB::table('problem')
            ->join('cabang2', 'problem.id_cabang', '=', 'cabang2.kode')
            ->select('problem.*', 'cabang2.nama')
            ->when($search, function ($query) use ($search) {
                $query->where('problem.kategori', 'like', "%$search%")
                      ->orWhere('problem.pic', 'like', "%$search%");
            })
            ->orderBy($sort, $order)
            ->paginate($perPage);

        // Jika request menggunakan AJAX, kirim hasil dalam format HTML
        if ($request->ajax()) {
            return view('problem.partials.table', compact('problems'))->render();
        }

        // Data untuk chart
        $categories = ['External', 'Internal'];
        $monthLabels = [];
        $externalCounts = [];
        $internalCounts = [];
        $currentMonth = now();

        for ($i = 0; $i < 12; $i++) {
            $monthLabels[] = $currentMonth->format('M Y');
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
            $currentMonth->addMonth();
        }

        return view('problem.index', compact(
            'problems', 'perPage', 'search', 'monthLabels', 'externalCounts', 'internalCounts'
        ));
    }

    public function create()
    {
        $cabang = DB::table('cabang2')->get(); // Mengambil data cabang dari tabel cabang2
        return view('problem.create', compact('cabang'));
    }

    // STORE: Menyimpan data problem ke database
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