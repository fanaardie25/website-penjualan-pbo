@extends('components.layouts.app')

@section('title', $book->name . ' - Detail')

@section('content')
    <div class="max-w-full mx-auto py-12 px-6">
        <!-- BEGIN: Breadcrumb -->
        <div class="mb-5">
            <ul class="m-0 p-0 list-none">
                <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                    <a href="index.html">
                        <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                        <iconify-icon icon="heroicons-outline:chevron-right"
                            class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                    </a>
                </li>
                <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                    Table
                    <iconify-icon icon="heroicons-outline:chevron-right"
                        class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                </li>
                <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                    Basic-Table</li>
            </ul>
        </div>
        <!-- END: BreadCrumb -->
        <div class="grid grid-cols-1 md:grid-cols-2 bg-white rounded-2xl shadow-lg overflow-hidden space-x-5 space-y-5">
            {{-- Cover Image --}}
            <div class="flex items-center justify-center bg-gray-100 p-6 md:p-8">
                @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}"
                        class="object-cover w-full max-w-sm h-64 rounded-xl shadow-md">
                @else
                    <div class="text-gray-400 text-lg">No Image Available</div>
                @endif
            </div>

            {{-- Book Info --}}
            <div class="p-8 md:p-10 flex flex-col space-y-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-1">{{ $book->name }}</h1>
                    <p class="text-sm text-gray-500">by <span class="font-medium">{{ $book->writer ?? '-' }}</span></p>
                </div>

                {{-- Price & Discount --}}
                <div>
                    @if ($book->discount)
                        <span class="line-through text-gray-400 text-lg mr-2">
                            Rp {{ number_format($book->price, 0, ',', '.') }}
                        </span>
                        <span class="bg-green-100 text-green-600 px-2 py-1 rounded-md text-sm font-semibold">
                            -{{ $book->discount }}%
                        </span>
                    @endif
                    <div class="text-3xl font-bold text-primary-600 mt-3">
                        Rp {{ number_format($book->after_discount, 0, ',', '.') }}
                    </div>
                </div>

                {{-- Description --}}
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $book->description ?: 'No description available.' }}
                    </p>
                </div>

                {{-- Additional Details --}}
                <div class="grid grid-cols-2 gap-y-2 text-gray-700 text-sm">
                    <div><span class="font-medium">Publisher:</span> {{ $book->publisher ?? '-' }}</div>
                    <div><span class="font-medium">Pages:</span> {{ $book->number_page ?? '-' }}</div>
                    <div><span class="font-medium">Stock:</span> {{ $book->stock ?? 0 }}</div>
                    <div><span class="font-medium">Slug:</span> {{ $book->slug }}</div>
                </div>

                {{-- Action Buttons --}}
                <div class="pt-6 flex space-x-4">
                    <a href="{{ route('books.edit', $book->id) }}"
                        class="px-5 py-2 rounded-lg bg-primary-500 hover:bg-primary-600 text-white font-medium shadow transition">
                        Edit
                    </a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure to delete this book?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-5 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white font-medium shadow transition">
                            Delete
                        </button>
                    </form>
                    <a href="{{ route('books.index') }}"
                        class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium shadow transition">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
