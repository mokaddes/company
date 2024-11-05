<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $title = __('messages.common.transactions');
        $user_id = Auth::user()->id;
        $transactions = Transaction::with('plan', 'user')->where('user_id', $user_id)->orderBy('id', 'desc')->get();
        // dd($transactions);
        return view('user.transaction', compact('title', 'transactions'));
    }

    public function invoiceView($id)
    {
        $title = __('messages.common.invoice');
        $row = Transaction::with('plan','user')->find($id);
        return view('user.invoice_view', compact('row', 'title'));
    }

    public function invoiceDownload($id)
    {
        $row = Transaction::with('plan','user')->find($id);
        // $pdf = PDF::loadView('user.invoice', $row);
        $invoice_dl = true;
        // return view('user.invoice',(['invoice_dl' => true,'row' => $row]));
        return Pdf::loadView('user.invoice',(['invoice_dl' => true,'row' => $row]))
        ->download($row->transaction_number.'.pdf');
        // return view('user.invoice', compact('row'));
    }
}
