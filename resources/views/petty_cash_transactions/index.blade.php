@extends('welcome')

@section('title', 'Petty Cash Transactions')

@section('addNewData')
    <div class="action-btn">
        <a href="{{ route('petty-cash-transactions.create') }}" class="btn btn-sm btn-primary btn-add">
            <i class="la la-plus"></i> Add New @yield('title')</a>
    </div>
@endsection

@section('content')
    <div class="col-lg-12 mb-25">
        <div class="social-overview-wrap">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="table4 table5 p-25 bg-white">
                        <div class="table-responsive">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <table class="table mb-0">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <div class="userDatatable-title">Date</div>
                                        </th>
                                        <th>
                                            <div class="userDatatable-title">Transaction Name</div>
                                        </th>
                                        <th align="right" class="text-right">
                                            <div class="userDatatable-title">Amount</div>
                                        </th>
                                        <th>
                                            <div class="userDatatable-title">Type</div>
                                        </th>
                                        <th>
                                            <div class="userDatatable-title">Petty Cash Account</div>
                                        </th>
                                        <th>
                                            <div class="userDatatable-title">Note</div>
                                        </th>
                                        <th>
                                            <div class="userDatatable-title">Action</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $transaction->transaction_date ?? 'N/A' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>{{ $transaction->purchaseType->name ?? 'N/A' }}
                                                            </h6>
                                                        </a>
                                                        <p class="pt-1 d-block mb-0">
                                                            Untuk kebutuhan: <br>
                                                            <b>{{ $transaction->site->name ?? 'N/A' }}-{{ $transaction->site->area->name ?? 'N/A' }}</b></b>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="userDatatable-content">Rp.
                                                    {{ number_format($transaction->amount, 2, ',', '.') }}</div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    @if ($transaction->purchaseType->transaction_type === 'expenses')
                                                        <span
                                                            class="bg-opacity-danger color-danger rounded-pill userDatatable-content-status active">Expenses</span>
                                                    @else
                                                        <span
                                                            class="bg-opacity-success color-success rounded-pill userDatatable-content-status active">Income</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $transaction->pettyCashAccount->name ?? 'N/A' }}</div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $transaction->description ?? 'N/A' }}</div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{ route('petty-cash-transactions.edit', $transaction->id) }}"
                                                            class="edit">
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form
                                                            action="{{ route('petty-cash-transactions.destroy', $transaction->id) }}"
                                                            method="POST" class="remove">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                style="height: 40px;border-radius: 50%;color: #F59191 !important;"
                                                                type="submit" class="btn btn-link remove"
                                                                onclick="return confirm('Are you sure you want to delete this entry?')">
                                                                <span data-feather="trash-2"></span>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <div class="userDatatable-content">No data available in the database</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-between mt-30">
                <div class="pagination-info">
                    Showing {{ $transactions->firstItem() }} to {{ $transactions->lastItem() }} of
                    {{ $transactions->total() }} items
                </div>

                <nav class="atbd-page">
                    <ul class="atbd-pagination d-flex">
                        <li class="atbd-pagination__item">
                            @if ($transactions->onFirstPage())
                                <span class="disabled" aria-disabled="true" aria-label="Previous">
                                    <span aria-hidden="true">&laquo; Previous</span>
                                </span>
                            @else
                                <a href="{{ $transactions->previousPageUrl() }}" rel="prev" aria-label="Previous">
                                    &laquo; Previous
                                </a>
                            @endif
                        </li>

                        <li class="atbd-pagination__item">
                            @if ($transactions->hasMorePages())
                                <a href="{{ $transactions->nextPageUrl() }}" rel="next" aria-label="Next">
                                    Next &raquo;
                                </a>
                            @else
                                <span class="disabled" aria-disabled="true" aria-label="Next">
                                    <span aria-hidden="true">Next &raquo;</span>
                                </span>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End Pagination -->
        </div>
    </div>
@endsection
