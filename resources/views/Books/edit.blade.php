@extends('components.layouts.app')

@section('title', 'Edit Book Page')

@section('content')
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
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">

        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Book</h1>

        {{-- Alert Error --}}
        @if ($errors->any())
            <div
                class="py-[18px] px-6 font-normal font-Inter text-sm rounded-md bg-warning-500 bg-opacity-[14%] text-warning-500 mb-6">
                <div class="flex items-start space-x-3 rtl:space-x-reverse">
                    <div class="flex-1">
                        <strong class="block mb-1">Oops!</strong>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        {{-- UPDATE route & method --}}
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="input-area">
                <label for="name" class="form-label">Title</label>
                <div>
                    <input id="name" name="name" type="text" value="{{ old('name', $book->name) }}"
                        class="form-control pr-9" placeholder="Book Title">
                </div>
            </div>

            {{-- Slug --}}
            <div class="input-area">
                <label for="slug" class="form-label">Slug</label>
                <div>
                    <input id="slug" readonly name="slug" type="text" value="{{ old('slug', $book->slug) }}"
                        class="form-control pr-9" placeholder="Slug">
                </div>
            </div>

            {{-- Image --}}
            <div class="multiFilePreview">
                <label class="form-label">Image (leave blank to keep current)</label>
                <label>
                    <input type="file" class="w-full hidden" name="image" accept=".jpg,.jpeg,.png">
                    <span class="w-full h-[40px] file-control flex items-center custom-class">
                        <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                            <span id="placeholder" class="text-slate-400">Choose a file or drop it here...</span>
                        </span>
                        <span
                            class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                    </span>
                </label>
                @if ($book->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Current Image" class="h-24 rounded">
                    </div>
                @endif
            </div>

            {{-- Description --}}
            <div class="input-area">
                <label for="description" class="form-label">Description</label>
                <div>
                    <textarea id="description" name="description" rows="4" class="form-control pr-9" placeholder="Description">{{ old('description', $book->description) }}</textarea>
                </div>
            </div>

            {{-- Writer --}}
            <div class="input-area">
                <label for="writer" class="form-label">Writer</label>
                <div>
                    <input id="writer" name="writer" type="text" value="{{ old('writer', $book->writer) }}"
                        class="form-control pr-9" placeholder="Writer">
                </div>
            </div>

            {{-- Publisher --}}
            <div class="input-area">
                <label for="publisher" class="form-label">Publisher</label>
                <div>
                    <input id="publisher" name="publisher" type="text" value="{{ old('publisher', $book->publisher) }}"
                        class="form-control pr-9" placeholder="Publisher">
                </div>
            </div>

            {{-- Number Page --}}
            <div class="input-area">
                <label for="number_page" class="form-label">Number of Pages</label>
                <div>
                    <input id="number_page" name="number_page" type="number"
                        value="{{ old('number_page', $book->number_page) }}" class="form-control pr-9" placeholder="0">
                </div>
            </div>

            {{-- Price --}}
            <div class="input-area">
                <label for="price" class="form-label">Price</label>
                <div>
                    <input id="price" name="price" type="number" step="0.01"
                        value="{{ old('price', $book->price) }}" class="form-control pr-9" placeholder="0.00">
                </div>
            </div>

            {{-- Discount --}}
            <div class="input-area">
                <label for="discount" class="form-label">Discount (%)</label>
                <div>
                    <input id="discount" name="discount" type="number" step="0.01"
                        value="{{ old('discount', $book->discount) }}" class="form-control pr-9" placeholder="0">
                </div>
            </div>

            {{-- After Discount --}}
            <div class="input-area">
                <label for="after_discount" class="form-label">Price After Discount</label>
                <div>
                    <input id="after_discount" name="after_discount" type="number" step="0.01"
                        value="{{ old('after_discount', $book->after_discount) }}" class="form-control pr-9"
                        placeholder="0.00">
                </div>
            </div>

            {{-- Stock --}}
            <div class="input-area">
                <label for="stock" class="form-label">Stock</label>
                <div>
                    <input id="stock" name="stock" type="number" value="{{ old('stock', $book->stock) }}"
                        class="form-control pr-9" placeholder="0">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn inline-flex justify-center btn-primary rounded-md" id="btn-submit"
                    onclick="loading">Update</button>
                <button class="btn inline-flex justify-center btn-primary " id="btn-loading" style="display: none;"
                    disabled>
                    <iconify-icon class="text-xl spin-slow ltr:mr-2 rtl:ml-2 relative top-[1px]"
                        icon="line-md:loading-twotone-loop"></iconify-icon>
                    <span>Loading</span>
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('name').addEventListener('input', function() {
            const name = this.value;
            const slug = name.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            document.getElementById('slug').value = slug;
        });

        const $price = document.getElementById('price');
        const $discount = document.getElementById('discount');
        const $after_discount = document.getElementById('after_discount');

        function calculateAfterDiscount() {
            let price = parseFloat($price.value) || 0;
            let discount = parseFloat($discount.value) || 0;
            let after_discount = price - (price * discount / 100);
            $after_discount.value = after_discount;
        }
        $price.addEventListener('input', calculateAfterDiscount);
        $discount.addEventListener('input', calculateAfterDiscount);

        const $buttonSubmit = document.getElementById('btn-submit');
        const $buttonLoading = document.getElementById('btn-loading');

        function loading() {
            $buttonSubmit.style.display = 'none';
            $buttonLoading.style.display = 'inline-flex';
        }
    </script>
@endsection
