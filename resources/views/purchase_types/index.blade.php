@extends('welcome')

@section('title', 'Purchase Types')

@section('addNewData')
    <div class="action-btn">
        <a href="{{ route('purchase-types.create') }}" class="btn btn-sm btn-primary btn-add">
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
                            <table class="table mb-0">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <div class="userDatatable-title">Name</div>
                                        </th>
                                        <th>
                                            <div class="userDatatable-title">Transaction Type</div>
                                        </th>

                                        <th>
                                            <div class="userDatatable-title">Action</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($purchaseTypes as $type)
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">{{ $type->name }}</div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">{{ $type->transaction_type }}</div>
                                            </td>
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    <li>
                                                        <a href="{{ route('purchase-types.edit', $type->id) }}"
                                                            class="edit">
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('purchase-types.destroy', $type->id) }}"
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
                    Showing {{ $purchaseTypes->firstItem() }} to {{ $purchaseTypes->lastItem() }} of
                    {{ $purchaseTypes->total() }} items
                </div>

                <nav class="atbd-page">
                    <ul class="atbd-pagination d-flex">
                        <li class="atbd-pagination__item">
                            @if ($purchaseTypes->onFirstPage())
                                <span class="disabled" aria-disabled="true" aria-label="Previous">
                                    <span aria-hidden="true">&laquo; Previous</span>
                                </span>
                            @else
                                <a href="{{ $purchaseTypes->previousPageUrl() }}" rel="prev" aria-label="Previous">
                                    &laquo; Previous
                                </a>
                            @endif
                        </li>

                        <li class="atbd-pagination__item">
                            @if ($purchaseTypes->hasMorePages())
                                <a href="{{ $purchaseTypes->nextPageUrl() }}" rel="next" aria-label="Next">
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
