@extends('components.layouts.app')
@section('title', 'Dashboard Page')
@section('content')
    <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">
             <!-- BEGIN: Breadcrumb -->
                <div class="mb-5">
                  <ul class="m-0 p-0 list-none">
                    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                      <a href="index.html">
                        <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                        <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                      </a>
                    </li>
                    <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                      Chart
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                    </li>
                    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Appex-Chart</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->

                  <!-- BEGIN: Line Chart -->
                  <div class="card">
                    <header class=" card-header">
                      <h4 class="card-title">Line Chart
                      </h4>
                    </header>
                    <div class="card-body px-6 pb-6">
                      <canvas id="chart4" class="h-[350px]"></canvas>
                    </div>
                  </div>
                  <!-- END: Line Chart -->

                   <!-- BEGIN: Bar Chart -->
                  <div class="card">
                    <header class=" card-header">
                      <h4 class="card-title">Bar Chart
                      </h4>
                    </header>
                    <div class="card-body px-6 pb-6">
                      <canvas id="chart1" class="h-[350px]"></canvas>
                    </div>
                  </div>
                  <!-- END: Bar Chart -->

        </div>
    </div>
        @endsection
