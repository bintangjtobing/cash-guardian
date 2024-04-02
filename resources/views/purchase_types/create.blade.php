@extends('welcome')

@section('title', 'New Purchase Type')

@section('content')
    <div class="col-lg-8">
        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-body pb-md-30">
                <form action="{{ route('purchase-types.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="card-header">
                            <h6>New Purchase Type</h6>
                        </div>
                        <div class="col-md-12 mb-25 mt-25">
                            <label for="name" class="color-dark fs-14 fw-500 align-center">Name</label>
                            <input type="text" name="name"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="name" required>
                        </div>
                        <div class="col-md-12 mb-25 mt-25">
                            <label for="transaction_type" class="color-dark fs-14 fw-500 align-center">Transaction
                                Type</label>
                            <select name="transaction_type" id="transaction_type"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" required>
                                <option value="">Select Transaction Type</option>
                                <option value="income">income</option>
                                <option value="expenses">expenses</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-25">
                            <div class="layout-button mt-25">
                                <button type="reset"
                                    class="btn btn-default btn-squared border-normal bg-normal px-20">Reset Data</button>
                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
