@extends('welcome')

@section('title', 'New Petty Cash Account')

@section('content')
    <div class="col-lg-8">
        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-body pb-md-30">
                <form action="{{ route('petty-cash-accounts.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="card-header">
                            <h6>New Petty Cash Account</h6>
                        </div>
                        <div class="col-md-12 mb-25 mt-25">
                            <label for="name" class="color-dark fs-14 fw-500 align-center">Account Name</label>
                            <input type="text" name="name"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="name"
                                placeholder="Enter Account Name" required>
                        </div>
                        <div class="col-md-6 mb-25">
                            <label for="group_id" class="color-dark fs-14 fw-500 align-center">Account Group</label>
                            <select name="group_id" id="group_id"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                <option value="" selected>Select Group</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
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
