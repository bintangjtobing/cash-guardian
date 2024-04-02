@extends('welcome')

@section('title', 'New Petty Cash Report')

@section('content')
    <div class="col-lg-8">
        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-body pb-md-30">
                <form action="{{ route('petty-cash-reports.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="card-header">
                            <h6>New Petty Cash Report</h6>
                        </div>
                        <div class="col-md-12 mb-25 mt-25">
                            <label for="user_id" class="color-dark fs-14 fw-500 align-center">User</label>
                            <select name="user_id" id="user_id"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" required>
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="report_date" class="color-dark fs-14 fw-500 align-center">Report Date</label>
                            <input type="date" name="report_date"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="report_date" required>
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
