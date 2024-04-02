@extends('welcome')
@section('title', 'Dashboard')
@section('content')
    <div class="col-xxl-6 col-12">
        <div class="row">
            <div class="col-md-6 mb-25">
                <div class="ratio-box card">
                    <div class="card-body">
                        <h6 class="ratio-title" style="margin-bottom:1rem;">Total Income</h6>
                        <div class="ratio-info d-flex justify-content-between align-items-center">
                            <h3 class="ratio-point" style="font-size:26px !important;">Rp.
                                {{ number_format($totalIncome, 2, ',', '.') }}</h1>
                        </div>
                    </div>
                </div>
                <!-- ends: .ratio-box -->
            </div>
            <div class="col-md-6 mb-25">
                <div class="ratio-box card">
                    <div class="card-body">
                        <h6 class="ratio-title" style="margin-bottom:1rem;">Total Expenses</h6>
                        <div class="ratio-info d-flex justify-content-between align-items-center">
                            <h3 class="ratio-point" style="font-size:26px !important;">Rp.
                                {{ number_format($totalExpenses, 2, ',', '.') }}
                                </h1>
                        </div>
                    </div>
                </div>
                <!-- ends: .ratio-box -->
            </div>
            <div class="col-md-6 mb-25">
                <div class="ratio-box card">
                    <div class="card-body">
                        <h6 class="ratio-title" style="margin-bottom:1rem;">Net Profit</h6>
                        <div class="ratio-info d-flex justify-content-between align-items-center">
                            <h3 class="ratio-point" style="font-size:26px !important;">Rp.
                                {{ number_format($profit, 2, ',', '.') }}</h1>
                        </div>
                    </div>
                </div>
                <!-- ends: .ratio-box -->
            </div>
            <div class="col-md-6 mb-25">
                <div class="ratio-box card">
                    <div class="card-body">
                        <h6 class="ratio-title" style="margin-bottom:1rem;">Current Ratio</h6>
                        <div class="ratio-info d-flex justify-content-between align-items-center">
                            <h1 class="ratio-point" style="font-size:26px !important;">
                                {{ number_format(($totalIncome - $totalExpenses) / $totalIncome, 2, ',', '.') }}</h1>
                            <span
                                class="ratio-percentage color-warning">{{ number_format(($profit / $totalIncome) * 100, 2, ',', '.') }}%</span>
                        </div>
                    </div>
                </div>
                <!-- ends: .ratio-box -->
            </div>
        </div>
    </div>
    <div class="col-xxl-6 col-12 mb-25">
        <div class="card border-0">
            <div class="card-header">
                <h6>
                    Transaction Lists
                </h6>
                <div class="card-extra">
                    <div class="dropdown dropleft">
                        <a href="#" role="button" id="cash" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="cash">
                            <a class="dropdown-item" href="{{ route('petty-cash-transactions.create') }}">Add
                                Transactions</a>
                            <a class="dropdown-item" href="{{ route('petty-cash-transactions.index') }}">View
                                Transactions</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table4 table5 px-25 pb-25 pt-10 bg-white">
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
                                        <div class="userDatatable-title">Account</div>
                                    </th>
                                    <th>
                                        <div class="userDatatable-title">Type</div>
                                    </th>
                                    <th align="right" class="text-right">
                                        <div class="userDatatable-title">Amount</div>
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
                                            <div class="userDatatable-content">
                                                {{ $transaction->pettyCashAccount->name ?? 'N/A' }}</div>
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
                                        <td class="text-right">
                                            <div class="userDatatable-content">Rp.
                                                {{ number_format($transaction->amount, 2, ',', '.') }}</div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
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

    </div>


@endsection
