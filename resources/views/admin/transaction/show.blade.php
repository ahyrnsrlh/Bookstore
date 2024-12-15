@extends('_layouts.admin')

@section('title', 'Detail Transaction')

@section('content')
	
	<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
          Bookstore
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info mb-4">
      <div class="col-sm-4 invoice-col">
        <b>To</b> : <br>
        <b>Name:</b> {{ $transaction->user->name }} <br>
        <b>Addrees</b> {{ $transaction->user->detail->address }} <br>
        <b>Phone:</b> {{ $transaction->user->detail->phone }} <br>
      </div>
      <div class="col-sm-4 invoice-col">
        <b>Invoice {{ $transaction->invoice }}</b><br>
        <b>Payment Status:</b> {!! $transaction->payment_badge_admin !!} <br>
        <b>Status:</b> {!! $transaction->status_badge_admin !!} <br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Book ISBN</th>
            <th>Book Title</th>
            <th>Price</th>
          </tr>
          </thead>
          <tbody>
            @php
              $total = 0;
            @endphp
            @foreach ($transaction->books as $book)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->title }}</td>
                <td>Rp {{ $book->price_converted }}</td>
              </tr>
              @php
                $total += $book->price;
              @endphp
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" align="right"><strong>Total</strong></td>
              <td>Rp {{ number_format($total) }}</td>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-12 d-flex justify-content-between">
        @if ($transaction->payment_status)
          @if ($transaction->status === 'unconfirmed')
            <form action="{{ route('admin.transaction.update', $transaction->id) }}" method="post">
              @csrf
              @method('PUT')
              <input type="hidden" name="status" value="confirmed">
              <button type="submit" class="btn mr-2 btn-primary"><i class="far fa-credit-card"></i>
                Confirm
              </button>
            </form>
          @elseif ($transaction->status !== 'success')
            <div>
              <form class="d-inline" action="{{ route('admin.transaction.update', $transaction->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="success">
                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                  Success
                </button>
              </form>
              <form class="d-inline" action="{{ route('admin.transaction.update', $transaction->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="failed">
                <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i>
                  Failed
                </button>
              </form>
            </div>
          @endif
        @endif
        <a href="{{ route('admin.transaction.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>

@endsection