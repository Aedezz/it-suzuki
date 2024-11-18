<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormPc extends Controller
{
    public function form()
    {
        // Fetch records to display in the table view with the status
        $viewForm = DB::table('form_install')->get(); 
        return view('form-instalasi.form_pc', compact('viewForm'));
    }

    public function destroy($id)
    {
        // Retrieve the record to get the 'nik' value
        $record = DB::table('form_install')->where('id', $id)->first();

        // Delete the record from the database
        DB::table('form_install')->where('id', $id)->delete();

        // Redirect with a success message including the 'nik'
        return redirect()->route('table')->with('success', "Form dengan NIK = {$record->nik},  berhasil dihapus!");
    }

    public function check($id)
    {
        // Retrieve the record to get the 'nik' value
        $record = DB::table('form_install')->where('id', $id)->first();

        // Update status to 'Sudah' (set cek to 1)
        DB::table('form_install')->where('id', $id)->update(['cek' => 1]);

        // Redirect with a success message including the 'nik'
        return redirect()->route('table')->with('success', "Status untuk NIK = {$record->nik}, berhasil diubah!");
    }

    public function print($id)
    {
        // Retrieve the record to print
        $data = DB::table('form_install')->where('id', $id)->first();

        // Load the 'print_page' view and pass the data to it
        $pdf = Pdf::loadView('form-instalasi.print_page', compact('data'));

        // Return the generated PDF file as a download or display in the browser
        return $pdf->stream('Form_Details.pdf'); // To display in browser
        // return $pdf->download('Form_Details.pdf'); // To force download  
    }
}
