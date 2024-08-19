@extends('layouts.admin-front')
@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md
 group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm
   pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)]
   group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0
    group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto
     group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3
     group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)] pt-20">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-16">Create Customer</h6>
                    <form id="add_customer_form">
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-4">
                            <div class="mb-4">
                                <label for="empFirstname"
                                    class="inline-block mb-2 text-base
                              font-medium">Name
                                    <span class="text-red-500">*</span></label>
                                <input type="text"
                                    class="form-input border-slate-200
                                           dark:border-zink-500 focus:outline-none
                                           focus:border-custom-500 disabled:bg-slate-100
                                           dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                            placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="name" name="name" placeholder="" >
                            </div>

                            <div class="mb-4">
                                <label for="email" class="inline-block mb-2 text-base font-medium">
                                    Email Id
                                    <span class="text-red-500">*</span></label>
                                <input type="email"
                                    class="form-input border-slate-200 dark:border-zink-500
                                     focus:outline-none focus:border-custom-500 disabled:bg-slate-100
                                      dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500
                                     dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100
                                     dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400
                                     dark:placeholder:text-zink-200"
                                    id="email" name="email" placeholder="">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 xl:grid-cols-3">
                            <div class="mb-4">
                                <label for="phone" class="inline-block mb-2 text-base font-medium">Customer
                                    Phone Number
                                    <span class="text-red-500">*</span></label>
                                <input type="text"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none
                                     focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600
                                     disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                      disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                      placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="phone" name="phone" placeholder="" required>
                            </div>
                            <div class="mb-4 mt_40">
                                <input type="checkbox" id="chkWhatsaappcheck" name="chkWhatsaappcheck" value="1">
                                <label for="description" class="inline-block mb-2 text-base font-medium">
                                    Check if same phone number is whatsapp number.
                                </label>
                            </div>
                            <div class="mb-4">
                                <label for="empWhatsAppno" class="inline-block mb-2 text-base font-medium">
                                    WhatsAPP Number
                                </label>
                                <input type="text"
                                    class="form-input border-slate-200 dark:border-zink-500
                                    focus:outline-none focus:border-custom-500 disabled:bg-slate-100
                                    dark:disabled:bg-zink-600 disabled:border-slate-300
                                    dark:disabled:border-zink-500 dark:disabled:text-zink-200
                                    disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700
                                    dark:focus:border-custom-800
                                     placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="whatsapp_ph" name="whatsapp_ph" placeholder="" required>
                            </div>
                            <div class="mb-4">
                                <label for="address"
                                    class="inline-block mb-2 text-base
                              font-medium">Address
                                    <span class="text-red-500">*</span></label>
                                <input type="text"
                                    class="form-input border-slate-200
                                           dark:border-zink-500 focus:outline-none
                                           focus:border-custom-500 disabled:bg-slate-100
                                           dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800
                                            placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    id="address" name="address" placeholder="" >
                            </div>
                        </div>



                        <div class="flex justify-end gap-2">
                            <button type="submit"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-800 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                         active:border-custom-600 active:ring active:ring-custom-100">Create</button>
                            <a href="/customer"
                                class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600
                         active:border-custom-600 active:ring active:ring-custom-100">Back
                                To Main Menu</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- @endsection --}}


@endsection
