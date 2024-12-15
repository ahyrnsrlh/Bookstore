<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\TransactionRepository;
use App\Http\Requests\Transaction\UpdateStatusTransactionRequest;
use App\Http\Controllers\Controller;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TransactionController extends Controller
{

    protected $transactionRepo;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->transactionRepo = $transactionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('admin.transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $transaction = $this->transactionRepo->find($id);
        return view('admin.transaction.show', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusTransactionRequest $request, $id): RedirectResponse
    {
        $this->transactionRepo->update($id, $request->all());

        return redirect('/admin/transaction')->withSuccess('Transaction Updated');
    }
}
