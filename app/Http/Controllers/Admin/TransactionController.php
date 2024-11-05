<?php


namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public  function index(){
        $data['title'] = __('messages.common.transaction');
        $data['transactions'] = Transaction::with('plan', 'user')->orderBy('id', 'desc')->get();
        return view('admin.transaction.index', $data);
    }

    public function invoiceDownload($id)
    {
        $row = Transaction::with('plan','user')->find($id);
        // $pdf = PDF::loadView('user.invoice', $row);
        $invoice_dl = true;
        return Pdf::loadView('admin.transaction.invoice',(['invoice_dl' => true,'row' => $row]))->download($row->transaction_number.'.pdf');
    }
}
