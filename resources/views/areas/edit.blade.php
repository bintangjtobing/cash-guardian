@extends('welcome')
@section('title', 'Edit Area')
@section('content')
    <div class="col-lg-8">
        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-body pb-md-30">
                <form action="{{ route('areas.update', $area->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="card-header">
                            <h6>Edit Area</h6>
                        </div>
                        <div class="col-md-12 mb-25 mt-25">
                            <label for="name" class="color-dark fs-14 fw-500 align-center">Area Name</label>
                            <input type="text" name="name" value="{{ $area->name }}"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="name"
                                placeholder="Enter Area Name" required>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="city_id" class="color-dark fs-14 fw-500 align-center">City</label>
                            <select name="city_id" id="city_id"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" required>
                                <option value="" disabled>Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $city->id == $area->city_id ? 'selected' : '' }}>
                                        {{ $city->name }}</option>
                                @endforeach
                            </select>
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
