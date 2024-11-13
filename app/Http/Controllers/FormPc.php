<?php
namespace App\Http\Controllers;

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
        // Delete the record from the database
        DB::table('form_install')->where('id', $id)->delete();

        return redirect()->route('table')->with('success', 'Form deleted successfully!');
    }

    public function check($id)
    {
        // Update status to 'Sudah' when "Check" is clicked (set cek to 1)
        DB::table('form_install')->where('id', $id)->update(['cek' => 1]);

        return redirect()->route('table')->with('success', 'Status updated to Sudah!');
    }

    public function print($id)
    {
        // You can generate the PDF or print view here
        $data = DB::table('form_install')->where('id', $id)->first();
        // Implement your print logic or PDF generation here

        return view('print_page', compact('data')); // Return a view for the print page
    }

}
