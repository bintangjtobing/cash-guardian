@extends('welcome')

@section('title', 'Petty Cash Accounts')

@section('addNewData')
    <div class="action-btn">
        <a href="{{ route('petty-cash-accounts.create') }}" class="btn btn-sm btn-primary btn-add">
            <i class="la la-plus"></i> Add New @yield('title')</a>
    </div>
@endsection

@section('content')
    @if (session('success'))
        {!! showSuccessToast(session('success')) !!}
        {{ Session::forget('success') }}
    @endif
    <div class="col-lg-12 mb-25">
        <div class="social-overview-wrap">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="table4 table5 p-25 bg-white">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <div class="userDatatable-title">Account Name</div>
                                        </th>
                                        <th>
                                            <div class="userDatatable-title">Group</div>
                                        </th>

                                        <th>
                                            <div class="userDatatable-title">Action</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($accounts as $account)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>{{ $account->name }}</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">{{ $account->group->name ?? 'N/A' }}
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{ route('petty-cash-accounts.edit', $account->id) }}"
                                                            class="edit">
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form
                                                            action="{{ route('petty-cash-accounts.destroy', $account->id) }}"
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
                                            <td colspan="3" class="text-center">
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
                    Showing {{ $accounts->firstItem() }} to {{ $accounts->lastItem() }} of
                    {{ $accounts->total() }} items
                </div>

                <nav class="atbd-page">
                    <ul class="atbd-pagination d-flex">
                        <li class="atbd-pagination__item">
                            @if ($accounts->onFirstPage())
                                <span class="disabled" aria-disabled="true" aria-label="Previous">
                                    <span aria-hidden="true">&laquo; Previous</span>
                                </span>
                            @else
                                <a href="{{ $accounts->previousPageUrl() }}" rel="prev" aria-label="Previous">
                                    &laquo; Previous
                                </a>
                            @endif
                        </li>

                        <li class="atbd-pagination__item">
                            @if ($accounts->hasMorePages())
                                <a href="{{ $accounts->nextPageUrl() }}" rel="next" aria-label="Next">
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
