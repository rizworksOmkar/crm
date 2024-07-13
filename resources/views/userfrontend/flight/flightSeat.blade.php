@extends('layouts.front')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <section id="common_banner">
        <div class="container">
            {{-- <div id="htlDtls_search">
        <a href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div> --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Flights Seating</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            {{-- <li><span><i class="fas fa-circle"></i></span> Hotel</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="plane">
            <div class="cabin">
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-a1">
                            <input id="seat-a1" type="checkbox" class="seat-check" name="seat-assignment" value=""
                                data-seat="A1" />
    
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-a2"><input id="seat-a2" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="A2" disabled="disabled" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-a3"><input id="seat-a3" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="A3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">A</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-a4"><input id="seat-a4" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="A4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-a5"><input id="seat-a5" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="A5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-a6"><input id="seat-a6" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="A6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-b1"><input id="seat-b1" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="B1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-b2"><input id="seat-b2" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="B2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-b3"><input id="seat-b3" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="B3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">B</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-b4"><input id="seat-b4" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="B4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-b5"><input id="seat-b5" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="B5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-b6"><input id="seat-b6" type="checkbox" class="seat-check"
                                name="seat-assignment" value="" data-seat="B6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-c1"><input id="seat-c1" type="checkbox" class="seat-check"
                                name="seat-cssignment" value="" data-seat="C1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-c2"><input id="seat-c2" type="checkbox" class="seat-check"
                                name="seat-cssignment" value="" data-seat="C2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-c3"><input id="seat-c3" type="checkbox" class="seat-check"
                                name="seat-cssignment" value="" data-seat="C3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">C</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-c4"><input id="seat-c4" type="checkbox" class="seat-check"
                                name="seat-cssignment" value="" data-seat="C4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-c5"><input id="seat-c5" type="checkbox" class="seat-check"
                                name="seat-cssignment" value="" data-seat="C5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-c6"><input id="seat-c6" type="checkbox" class="seat-check"
                                name="seat-cssignment" value="" data-seat="C6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-d1"><input id="seat-d1" type="checkbox" class="seat-check"
                                name="seat-dssignment" value="" data-seat="D1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-d2"><input id="seat-d2" type="checkbox" class="seat-check"
                                name="seat-dssignment" value="" data-seat="D2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-d3"><input id="seat-d3" type="checkbox" class="seat-check"
                                name="seat-dssignment" value="" data-seat="D3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">D</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-d4"><input id="seat-d4" type="checkbox" class="seat-check"
                                name="seat-dssignment" value="" data-seat="D4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-d5"><input id="seat-d5" type="checkbox" class="seat-check"
                                name="seat-dssignment" value="" data-seat="D5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-d6"><input id="seat-d6" type="checkbox" class="seat-check"
                                name="c" value="" data-seat="D6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-e1"><input id="seat-e1" type="checkbox" class="seat-check"
                                name="seat-essignment" value="" data-seat="E1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-e2"><input id="seat-e2" type="checkbox" class="seat-check"
                                name="seat-essignment" value="" data-seat="E2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-e3"><input id="seat-e3" type="checkbox" class="seat-check"
                                name="seat-essignment" value="" data-seat="E3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">E</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-e4"><input id="seat-e4" type="checkbox" class="seat-check"
                                name="seat-essignment" value="" data-seat="E4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-e5"><input id="seat-e5" type="checkbox" class="seat-check"
                                name="seat-essignment" value="" data-seat="E5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-e6"><input id="seat-e6" type="checkbox" class="seat-check"
                                name="seat-essignment" value="" data-seat="E6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-f1"><input id="seat-f1" type="checkbox" class="seat-check"
                                name="seat-fssignment" value="" data-seat="F1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-f2"><input id="seat-f2" type="checkbox" class="seat-check"
                                name="seat-fssignment" value="" data-seat="F2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-f3"><input id="seat-f3" type="checkbox" class="seat-check"
                                name="seat-fssignment" value="" data-seat="F3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">F</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-f4"><input id="seat-f4" type="checkbox" class="seat-check"
                                name="seat-fssignment" value="" data-seat="F4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-f5"><input id="seat-f5" type="checkbox" class="seat-check"
                                name="seat-fssignment" value="" data-seat="F5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-f6"><input id="seat-f6" type="checkbox" class="seat-check"
                                name="seat-fssignment" value="" data-seat="F6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-g1"><input id="seat-g1" type="checkbox" class="seat-check"
                                name="seat-gssignment" value="" data-seat="G1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-g2"><input id="seat-g2" type="checkbox" class="seat-check"
                                name="seat-gssignment" value="" data-seat="G2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-g3"><input id="seat-g3" type="checkbox" class="seat-check"
                                name="seat-gssignment" value="" data-seat="G3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">G</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-g4"><input id="seat-g4" type="checkbox" class="seat-check"
                                name="seat-gssignment" value="" data-seat="G4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-g5"><input id="seat-g5" type="checkbox" class="seat-check"
                                name="seat-gssignment" value="" data-seat="G5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-g6"><input id="seat-g6" type="checkbox" class="seat-check"
                                name="seat-gssignment" value="" data-seat="G6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-h1"><input id="seat-h1" type="checkbox" class="seat-check"
                                name="seat-hssignment" value="" data-seat="H1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-h2"><input id="seat-h2" type="checkbox" class="seat-check"
                                name="seat-hssignment" value="" data-seat="H2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-h3"><input id="seat-h3" type="checkbox" class="seat-check"
                                name="seat-hssignment" value="" data-seat="H3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">H</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-h4"><input id="seat-h4" type="checkbox" class="seat-check"
                                name="seat-hssignment" value="" data-seat="H4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-h5"><input id="seat-h5" type="checkbox" class="seat-check"
                                name="seat-hssignment" value="" data-seat="H5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-h6"><input id="seat-h6" type="checkbox" class="seat-check"
                                name="seat-hssignment" value="" data-seat="H6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-i1"><input id="seat-i1" type="checkbox" class="seat-check"
                                name="seat-issignment" value="" data-seat="I1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-i2"><input id="seat-i2" type="checkbox" class="seat-check"
                                name="seat-issignment" value="" data-seat="I2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-i3"><input id="seat-i3" type="checkbox" class="seat-check"
                                name="seat-issignment" value="" data-seat="I3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">I</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-i4"><input id="seat-i4" type="checkbox" class="seat-check"
                                name="seat-issignment" value="" data-seat="I4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-i5"><input id="seat-i5" type="checkbox" class="seat-check"
                                name="seat-issignment" value="" data-seat="I5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-i6"><input id="seat-i6" type="checkbox" class="seat-check"
                                name="seat-issignment" value="" data-seat="I6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-j1"><input id="seat-j1" type="checkbox" class="seat-check"
                                name="seat-jssignment" value="" data-seat="J1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-j2"><input id="seat-j2" type="checkbox" class="seat-check"
                                name="seat-jssignment" value="" data-seat="J2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-j3"><input id="seat-j3" type="checkbox" class="seat-check"
                                name="seat-jssignment" value="" data-seat="J3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">J</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-j4"><input id="seat-j4" type="checkbox" class="seat-check"
                                name="seat-jssignment" value="" data-seat="J4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-j5"><input id="seat-j5" type="checkbox" class="seat-check"
                                name="seat-jssignment" value="" data-seat="J5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-j6"><input id="seat-j6" type="checkbox" class="seat-check"
                                name="seat-jssignment" value="" data-seat="J6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-k1"><input id="seat-k1" type="checkbox" class="seat-check"
                                name="seat-kssignment" value="" data-seat="K1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-k2"><input id="seat-k2" type="checkbox" class="seat-check"
                                name="seat-kssignment" value="" data-seat="K2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-k3"><input id="seat-k3" type="checkbox" class="seat-check"
                                name="seat-kssignment" value="" data-seat="K3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">K</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-k4"><input id="seat-k4" type="checkbox" class="seat-check"
                                name="seat-kssignment" value="" data-seat="K4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-k5"><input id="seat-k5" type="checkbox" class="seat-check"
                                name="seat-kssignment" value="" data-seat="K5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-k6"><input id="seat-k6" type="checkbox" class="seat-check"
                                name="seat-kssignment" value="" data-seat="K6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
    
                <div class="seat-row">
                    <div class="seat one">
                        <label class="label" for="seat-l1"><input id="seat-l1" type="checkbox" class="seat-check"
                                name="seat-lssignment" value="" data-seat="L1" />
                            <!-- <span class="seat-label">One</span> -->
                        </label>
                    </div>
                    <div class="seat two">
                        <label class="label" for="seat-l2"><input id="seat-l2" type="checkbox" class="seat-check"
                                name="seat-lssignment" value="" data-seat="L2" />
                            <!-- <span class="seat-label">Two</span> -->
                        </label>
                    </div>
                    <div class="seat three">
                        <label class="label" for="seat-l3"><input id="seat-l3" type="checkbox" class="seat-check"
                                name="seat-lssignment" value="" data-seat="L3" />
                            <!-- <span class="seat-label">Three</span> -->
                        </label>
                    </div>
                    <div class="aisle"><span class="aisle-number">L</span></div>
                    <div class="seat four">
                        <label class="label" for="seat-l4"><input id="seat-l4" type="checkbox" class="seat-check"
                                name="seat-lssignment" value="" data-seat="L4" />
                            <!-- <span class="seat-label">Four</span> -->
                        </label>
                    </div>
                    <div class="seat five">
                        <label class="label" for="seat-l5"><input id="seat-l5" type="checkbox" class="seat-check"
                                name="seat-lssignment" value="" data-seat="L5" />
                            <!-- <span class="seat-label">Five</span> -->
                        </label>
                    </div>
                    <div class="seat six">
                        <label class="label" for="seat-l6"><input id="seat-l6" type="checkbox" class="seat-check"
                                name="seat-lssignment" value="" data-seat="L6" />
                            <!-- <span class="seat-label">Six</span> -->
                        </label>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- <div class="aircraft-details">
            <div class="aircraft-details-actions">
                <button type="button" class="btn btn-utility btn-info">
                    <span class="icon icon-information"></span>
                </button>
                <button type="button" class="btn btn-utility btn-close">
                    <span class="icon fa fa-times"></span>
                </button>
            </div>
            <table>
                <caption>
                    Aircraft Specifications
                </caption>
                <tr>
                    <th scope="row" rowspan="2">Seat width/pitch</th>
                    <td>Frist Class 18.5"/37"</td>
                </tr>
                <tr>
                    <td>Economy Class: 17"/32"</td>
                </tr>
                <tr>
                    <th scope="row">Accommodation</th>
                    <td>261 passengers</td>
                </tr>
                <tr>
                    <th scope="row">Cruising Speed</th>
                    <td>535mph</td>
                </tr>
                <tr>
                    <th scope="row">Range</th>
                    <td>3,740 miles</td>
                </tr>
                <tr>
                    <th scope="row">Engine</th>
                    <td>2 wing-mounted turbofans</td>
                </tr>
                <tr>
                    <th scope="row">Accommodation</th>
                    <td>261 passengers</td>
                </tr>
            </table>
        </div> --}}
    </section>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('/assets/admin/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        if (jQuery().select2) {
            $(".select2").select2();
        }
    </script>

    <script>
        var $body = $("body");

        $body.on("click", ".btn-utility", function() {
            alert("hii");
            $(".aircraft-details").toggleClass("open");
        });

        $(".btn-utility").click(function(e) {
            e.preventDefault();
            // alert("The paragraph was clicked.");
        });
    </script>
@endsection
