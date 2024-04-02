@extends('welcome')
@section('title', 'Edit Petty Cash Transaction')
@section('content')
    <div class="col-lg-8">
        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-body pb-md-30">
                <form action="{{ route('petty-cash-transactions.update', $transaction->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="card-header">
                            <h6>Edit Petty Cash Transaction</h6>
                        </div>
                        <div class="col-md-12 mb-25 mt-25">
                            <label for="petty_cash_account_id" class="color-dark fs-14 fw-500 align-center">Petty Cash
                                Account</label>
                            <select name="petty_cash_account_id" id="petty_cash_account_id"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" required>
                                <option value="" disabled>Select Petty Cash Account</option>
                                @foreach ($pettyCashAccounts as $account)
                                    <option value="{{ $account->id }}"
                                        {{ $account->id == $transaction->petty_cash_account_id ? 'selected' : '' }}>
                                        {{ $account->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="description" class="color-dark fs-14 fw-500 align-center">Description</label>
                            <input type="text" name="description" value="{{ $transaction->description }}"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="description"
                                placeholder="Enter Description" required>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="amount" class="color-dark fs-14 fw-500 align-center">Amount</label>
                            <input type="text" name="amount" value="{{ $transaction->amount }}"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15 decimal-input" id="amount"
                                placeholder="Enter Amount" required>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="purchase_type_id" class="color-dark fs-14 fw-500 align-center">Purchase
                                Type</label>
                            <select name="purchase_type_id" id="purchase_type_id"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                <option value="" disabled>Select Purchase Type</option>
                                @foreach ($purchaseTypes as $purchaseType)
                                    <option value="{{ $purchaseType->id }}"
                                        {{ $purchaseType->id == $transaction->purchase_type_id ? 'selected' : '' }}>
                                        {{ $purchaseType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="site_id" class="color-dark fs-14 fw-500 align-center">Site</label>
                            <select name="site_id" id="site_id"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                <option value="" disabled>Select Site</option>
                                @foreach ($sites as $site)
                                    <option value="{{ $site->id }}"
                                        {{ $site->id == $transaction->site_id ? 'selected' : '' }}>
                                        {{ $site->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="transaction_date" class="color-dark fs-14 fw-500 align-center">Transaction
                                Date</label>
                            <input type="date" name="transaction_date" value="{{ $transaction->transaction_date }}"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="transaction_date"
                                required>
                        </div>
                        <div class="col-md-12 mb-25">
                            <div class="layout-button mt-25">
                                <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20"
                                    onclick="window.history.back();">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.decimal-input').on('input', function() {
                // Mendapatkan nilai input
                var value = $(this).val();

                // Menghapus semua karakter selain angka
                var floatValue = parseFloat(value.replace(/[^\d]/g, ''));

                // Memeriksa apakah nilai adalah angka
                if (!isNaN(floatValue)) {
                    // Memformat nilai dengan separator ribuan
                    var formattedValue = floatValue.toLocaleString('id-ID');

                    // Memperbarui nilai input
                    $(this).val(formattedValue);
                }
            });
        });
    </script>
@endsection
