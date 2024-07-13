<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>
    {{-- <title>Mail</title> --}}
    {{-- <link rel="icon" type="image/png" href="{{ asset('assets/user/img/common/travel-logo.jpg') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .pjct_img {
            display: flex;
            align-items: center;
            justify-content: space-between !important;
            margin-bottom: 20px;
        }

        .pjct_img img {
            width: 90px;
            height: 60px;
        }

        .pcg_cnfrm_name {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
        }

        .pcg_cnfirm_tbl {
            background-color: #eff2f8;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px
        }

        .pcg_cnfrm_title h3 {
            font-size: 20px;
            /* margin: 20px 0; */
            color: #000;
            font-weight: 500;
            margin-bottom: 10px;
            margin-top: 0;
        }

        .pcg_cnfrm_title p {
            font-size: 16px;
            color: #000;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .pcg_cnfrm_name h4 {
            font-size: 20px;
            margin: 20px 0;
            color: #000;
            font-weight: 500;
            margin-top: 0;
        }

        .pcg_cnfrm_img img {
            width: 150px;
            height: 130px;
            object-fit: cover;
            box-shadow: 0 0 10px #00000045;
            border-radius: 10px;
        }


        .pckg_cnfrm_email table tr th,
        .pckg_cnfrm_email table tr td {
            padding: 5px 10px;
            font-size: 14px;
            color: #000;
            border-right: 1px solid gray;
        }

        .pcg_cnfrm_gust {
            margin-bottom: 20px;
        }

        .pcg_cnfrm_amnt {
            display: flex;
            flex-direction: column;
            align-items: end;
        }

        .flx_grow_1 {
            flex-grow: 1 !important;
        }

        .totl_amnt {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            /* border-bottom: 2px solid black; */
        }

        .bdr_b {
            border-bottom: 2px solid black;
        }

        .totl_amnt h3 {
            font-size: 18px;
            font-weight: 500;
            color: #000;
            border-bottom: none;
            padding-bottom: 11px;
            position: relative;
        }

        .totl_amnt .grandPrice {
            font-size: 20px;
            font-weight: 700;
            border-bottom: none;
            /* padding-bottom: 0; */
            padding: 5px 0;
            position: relative;
            /* border-bottom: 3px solid #000; */
        }

        .price_word,
        .gst_count {
            font-size: 14px;
            font-weight: 600;
            padding: 5px 10px;
            color: #292929;
            background: #dcdcdc;
            border-radius: 5px;
            margin-right: 10px;
            margin-top: 5px;
            margin-bottom: 0;
        }

        .paid_suc {
            text-align: center;
            padding: 10px;
            /* float: right; */
            margin-top: 5px;
            display: flex;
            justify-content: center;
        }

        .paid_suc h4 {
            background-color: #1a1e21;
            padding: 10px;
            color: #fff;
            font-size: 18px;
            width: 20%;
            border-radius: 3px;
        }

        .mail_cntct_us h4 {
            font-size: 22px;
            color: #000;
            margin-bottom: 20px;
        }

        .mail_cntct_us p {
            font-size: 16px;
            color: #000;
            margin-bottom: 10px;
        }

        .mail_cntct_us p span {
            margin-left: 10px;
        }

        @media only screen and (max-width: 600px) {
            .pcg_cnfrm_img {
                width: 100%;
            }

            .pcg_cnfrm_img img {
                width: 100%;
                height: 209px;
                object-fit: cover;
                box-shadow: 0 0 10px #00000045;
                border-radius: 10px;
            }

            .pcg_cnfrm_name {
                flex-direction: column;
            }
        }

        .pckg_cnfrm_email table {
            border: 1px solid gray;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
            margin-top: 20px;
        }

        .pckg_cnfrm_email table tr {
            background-color: #f8f8f8;
            border: 1px solid gray;
        }

        .pckg_cnfrm_email table tr th{
            text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {
            .pckg_cnfrm_email table {
                border: 0;
            }

            .pckg_cnfrm_email table caption {
                font-size: 1.3em;
            }

            .pckg_cnfrm_email table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            .pckg_cnfrm_email table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            .pckg_cnfrm_email table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            .pckg_cnfrm_email table td::before {
                /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            .pckg_cnfrm_email table td:last-child {
                border-bottom: 0;
            }
        }
    </style>
</head>

<body
    style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #f8fafc; color: #74787e; height: 100%; hyphens: auto; line-height: 1.4; margin: 0; -moz-hyphens: auto; -ms-word-break: break-all; width: 100% !important; -webkit-hyphens: auto; -webkit-text-size-adjust: none; word-break: break-word;">

    <div class="pckg_cnfrm_email">
        <div class="container">
            {{-- <div class="pcg_cnfirm_tbl mt-3">
                <div class="pjct_img">
                    <img src="/storage/admin/img/company-logos/Logo1_1712568620.jpg" alt="">
                    <div class="pcg_cnfrm_title">
                        <h3>Hi Rahul Daibagna</h3>
                    </div>
                </div>
                <div class="pcg_cnfrm_name">
                    <div class="pcg_cnfrm_title">
                        <h4>Your Travel Code TRV-0002 and Your Package Name Top Selling 3 Nights And 4 Days Pattaya Tour
                            Packages is Confirmed</h4>
                    </div>
                </div>
            </div> --}}
            <div class="pcg_cnfirm_tbl">
                <div class="pjct_img justify-content-between">
                    <img src="assets/user/img/logotravelhost.jpg" alt="">
                    <div class="pcg_cnfrm_title">
                        <h3>{{ $data['greetings'] }}</h3>
                    </div>
                </div>
                <div class="pcg_cnfrm_name">
                    <div class="pcg_cnfrm_title">
                        <h3>{{ $data['confirmation'] }}</h3>
                        <p>{{ $data['days'] }}</p>
                        <h4>Booking ID : {{ $data['bookingid'] }}</h4>
                    </div>
                    <div class="pcg_cnfrm_img">
                        {{-- <img src="/storage/admin/img/package-images/packagephoto_1712649884.png" alt=""> --}}
                        <img src="{{ $data['pacakageimg'] }}" alt="">
                    </div>
                </div>
                {{-- <table style="width: 100%;">
                    <tr>
                        <th>Description</th>
                        <th>No Of Person</th>
                        <th>Package Cost</th>
                        <th>Total Cost</th>
                    </tr>
                    <tr>
                        <td>{{ $data['pacakagenametable'] }}</td>
                        <td>{{ $data['noofpeople'] }}</td>
                        <td>{{ $data['pacakgeCost'] }}</td>
                        <td>{{ $data['total'] }}</td>
                    </tr>
                </table> --}}

                <table>
                    <thead>
                        <tr>
                            <th scope="col">Description</th>
                            <th scope="col">No Of Person</th>
                            <th scope="col">Package Cost</th>
                            <th scope="col">Total Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Account">{{ $data['pacakagenametable'] }}</td>
                            <td data-label="Due Date">{{ $data['noofpeople'] }}</td>
                            <td data-label="Amount">{{ $data['pacakgeCost'] }}</td>
                            <td data-label="Period">{{ $data['total'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="pcg_cnfirm_tbl">

                <div class="pcg_cnfrm_amnt">
                    <div class="flx_grow-1">
                        <div class="bdr_b">
                            <div class="totl_amnt">
                                <h3>
                                    Total :-
                                </h3>
                                <h3>
                                    <i class="fa fa-inr" aria-hidden="true"></i> {{ $data['maintotal'] }}
                                </h3>
                            </div>
                            {{-- <div class="totl_amnt ">
                            <h3>
                                Discount :-
                            </h3>
                            <h3>
                                <i class="fa fa-inr" aria-hidden="true"></i> 0/-
                            </h3>
                        </div> --}}
                        </div>
                        <div class="totl_amnt bdr_b">
                            <h3 class="grandPrice">
                                Grand Total :-
                                <p class="price_word">Paid Successfully</p>
                            </h3>
                            <h3 class="grandPrice" id="grandPrice">
                                <i class="fas fa-rupee-sign fa-xs"></i> {{ $data['grandtotal'] }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="mail_cntct_us">
                    <h4>Contact Us</h4>
                    <p>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>+91-7978 868 144</span>
                    </p>
                    <p>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        {{-- <i class="fa fa-facebook" aria-hidden="true"></i> --}}
                        <span>corporate@travelhostonline.in</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
