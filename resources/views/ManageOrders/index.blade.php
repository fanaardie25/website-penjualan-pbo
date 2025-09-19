@extends('components.layouts.app')

@section('title', 'Monitoring Order Page')

@section('content')
    <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">

            {{-- Breadcrumb --}}
            <div class="mb-5">
                <ul class="m-0 p-0 list-none">
                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter">
                        <a href="{{ route('dashboard') }}">
                            <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                            <iconify-icon icon="heroicons-outline:chevron-right"
                                class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                        </a>
                    </li>
                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                        Manage Orders
                    </li>
                </ul>
            </div>

            <div class=" space-y-5">
                <div class="card">
                    <header class=" card-header noborder">
                        <h4 class="card-title">List Orders
                        </h4>
                    </header>
                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto -mx-6 dashcode-data-table">
                            <span class=" col-span-8  hidden"></span>
                            <span class="  col-span-4 hidden"></span>
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <table
                                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                        <thead class="bg-slate-200 dark:bg-slate-700">
                                            <tr>
                                                <th class="table-th">ID</th>
                                                <th class="table-th">Customer</th>
                                                <th class="table-th">Book</th>
                                                <th class="table-th">Writer</th>
                                                <th class="table-th">Publisher</th>
                                                <th class="table-th">Price (after disc)</th>
                                                <th class="table-th">Status</th>
                                                <th class="table-th">Order Date</th>
                                            </tr>
                                        </thead>

                                        <tbody
                                            class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                            @forelse ($userBooks as $user)
                                                @foreach ($user->books as $book)
                                                    <tr>
                                                        <td class="table-td">
                                                            {{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                                        <td class="table-td">{{ $user->name }}</td>
                                                        <td class="table-td ">
                                                            {{ $book->name }}
                                                        </td>
                                                        <td class="table-td">{{ $book->writer ?? '-' }}</td>
                                                        <td class="table-td">{{ $book->publisher ?? '-' }}</td>
                                                        <td class="table-td">Rp
                                                            {{ number_format($book->after_discount * $book->pivot->quantity, 0, ',', '.') }}</td>
                                                        <td class="table-td">
                                                            <form
                                                                action="{{ route('orders.update-status', [$user->id, $book->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <select name="status" onchange="this.form.submit()"
                                                                    class="px-2 py-1 rounded-md text-sm font-medium border-gray-300 dark:border-slate-600">
                                                                    <option value="pending"
                                                                        {{ $book->pivot->status == 'pending' ? 'selected' : '' }}>
                                                                        Pending
                                                                    </option>
                                                                    <option value="completed"
                                                                        {{ $book->pivot->status == 'completed' ? 'selected' : '' }}>
                                                                        Completed
                                                                    </option>
                                                                    <option value="canceled"
                                                                        {{ $book->pivot->status == 'canceled' ? 'selected' : '' }}>
                                                                        Canceled
                                                                    </option>
                                                                </select>
                                                            </form>
                                                        </td>


                                                        <td class="table-td">
                                                            {{ $book->pivot->created_at->format('d M Y H:i') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="table-td text-center text-gray-500">
                                                        No orders found.
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
            </div>

        </div>
    </div>
@endsection
