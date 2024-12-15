<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Repositories\CartRepository;
use App\Repositories\TransactionRepository;
use App\Services\Transaction\TransactionService;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TransactionRequest $request, CartRepository $cartRepo): View
    {
        $query = $request->carts;
        $carts = $cartRepo->getById($query);

        return view('transaction.create', compact('carts', 'query'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request, TransactionService $transactionService): RedirectResponse
    {
        $transactionService->create($request->carts);

        return redirect('transaction')->withSucces('Transaction Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionRepository $transactionRepo, $id): View
    {
        $transaction = $transactionRepo->find($id);

        if (request()->user()->cannot('view', $transaction)) {
            abort(403);
        }

        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment(TransactionRepository $transactionRepo, $id): View
    {
        $transaction = $transactionRepo->find($id);

        if (request()->user()->cannot('update', $transaction)) {
            abort(403);
        }

        return view('transaction.payment', compact('transaction'));
    }
}
