@extends('welcome')
@section('title', 'Edit User')
@section('content')
    <div class="col-lg-8">
        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-body pb-md-30">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="card-header">
                            <h6>Edit User</h6>
                        </div>
                        <div class="col-md-12 mb-25 mt-25">
                            <label for="name" class="color-dark fs-14 fw-500 align-center">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="name"
                                placeholder="Enter Name" required>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="username" class="color-dark fs-14 fw-500 align-center">Username</label>
                            <input type="text" name="username" value="{{ $user->username }}"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="username"
                                placeholder="Enter Username" required>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="email" class="color-dark fs-14 fw-500 align-center">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="email"
                                placeholder="Enter Email" required>
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="password" class="color-dark fs-14 fw-500 align-center">Password</label>
                            <input type="password" name="password"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" id="password"
                                placeholder="Enter Password">
                        </div>
                        <div class="col-md-12 mb-25">
                            <label for="group_id" class="color-dark fs-14 fw-500 align-center">User Group</label>
                            <select name="group_id" id="group_id"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" required>
                                <option value="" disabled>Select User Group</option>
                                @foreach ($userGroups as $userGroup)
                                    <option value="{{ $userGroup->id }}"
                                        {{ $userGroup->id == $user->group_id ? 'selected' : '' }}>
                                        {{ $userGroup->name }}</option>
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
