@extends('welcome')
@section('title', 'Edit Purchase Type')
@section('content')
    <div class="col-lg-8">
        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-body pb-md-30">
                <form action="{{ route('purchase-types.update', $purchaseType->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="card-header">
                            <h6>Edit Purchase Type</h6>
                        </div>
                        <div class="col-md-12 mb-25 mt-25">
                            <label for="name" class="color-dark fs-14 fw-500 align-center">Name</label>
                            <input type="text" name="name" value="{{ $purchaseType->name }}"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="name"
                                placeholder="Enter Name" required>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="transaction_type" class="color-dark fs-14 fw-500 align-center">Transaction
                                Type</label>
                            <input type="text" name="transaction_type" value="{{ $purchaseType->transaction_type }}"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="transaction_type"
                                placeholder="Enter Transaction Type" required>
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
