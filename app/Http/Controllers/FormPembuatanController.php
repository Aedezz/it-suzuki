<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FormPembuatanController extends Controller
{
    // Menampilkan semua data formUser menggunakan Query Builder
    
    public function index()
    {
        // Mengurutkan data berdasarkan kolom 'tanggal' secara descending (terbaru ke terlama)
        $formUser = DB::table('form_user')
            ->orderBy('tanggal', 'desc') // Pastikan kolom 'tanggal' ada di tabel Anda
            ->paginate(9000);

            foreach ($formUser as $d) {
                $d->formatted_tanggal = Carbon::parse($d->tanggal)->format('d-m-Y');
            }
    
        $ceklist = DB::table('form_user')
            ->orderBy('tanggal', 'desc') // Sama untuk data ceklist
            ->paginate(9000);
    
        $ceklistData = DB::table('form_user')
            ->orderBy('tanggal', 'desc') // Sama untuk data ceklistData
            ->paginate(9000);

         
    
        return view('form-pembuatan.index', compact('formUser', 'ceklist', 'ceklistData'));
    }
    

    // Menghapus data form
    public function destroy($id)
    {
        // Menghapus data form berdasarkan id menggunakan Query Builder
        DB::table('form_user')->where('id', $id)->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('form-pembuatan.index')->with('success', 'Form User berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        // Menggunakan Query Builder untuk memperbarui kolom 'cek' menjadi 1 (selesai)
        DB::table('form_user')
            ->where('id', $id) // Pastikan 'id' adalah kolom utama pada tabel 'form_user'
            ->update(['cek' => 1]); // 1 menandakan status selesai
    
        // Mengirim pesan ke session untuk SweetAlert
        return redirect()->route('form-pembuatan.index')->with('success', 'Status berhasil diubah menjadi Selesai!');
    }

    public function print($id)
{
    // Retrieve the record to print
    $data = DB::table('form_user')->where('id', $id)->first();

    if ($data) {
        // Format tanggal before sending to the view
        $data->formatted_tanggal = Carbon::parse($data->tanggal)->format('d-m-Y');

        // Load the 'print_page' view and pass the data to it
        $pdf = Pdf::loadView('form-pembuatan.print_page', compact('data'));

        // Return the generated PDF file as a download or display in the browser
        return $pdf->stream('Form_Details.pdf'); // To display in browser
        // return $pdf->download('Form_Details.pdf'); // To force download  
    } else {
        return redirect()->route('form-pembuatan.index')->with('error', 'Record not found');
    }
}
}