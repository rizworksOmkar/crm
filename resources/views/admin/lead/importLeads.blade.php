@extends('layouts.admin-front')
@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu
         group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md 
         group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm 
         pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 
         group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 
         group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl 
         group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto 
         group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] 
         group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-3 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h2 class="upld_head">Upload Lead File</h2>
                            <form action="{{ route('lead.preview') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    {{-- <input type="file" name="lead_file" accept=".csv,.xlsx" class="form-control-file"> --}}
                                    <input type="file" name="lead_file" accept=".csv,.xlsx" class="form-control-file cursor-pointer form-file border-slate-200 dark:border-zink-500
                                     focus:outline-none focus:border-custom-500" placeholder="Enter your name">
                                </div>
                                <button type="submit"
                                    class="btn btn-primary text-white btn bg-custom-500 border-custom-500 hover:text-white 
                                                    hover:bg-custom-600 hover:border-custom-600 focus:text-white 
                                                    focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100
                                                     active:text-white active:bg-custom-600 active:border-custom-600 active:ring
                                                      active:ring-custom-100 dark:ring-custom-400/20">Preview
                                    Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
