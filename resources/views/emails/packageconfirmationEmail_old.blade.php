<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>
    <title>Package Confirmation Email</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/user/img/common/travel-logo.jpg') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body
    style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #f8fafc; color: #74787e; height: 100%; hyphens: auto; line-height: 1.4; margin: 0; -moz-hyphens: auto; -ms-word-break: break-all; width: 100% !important; -webkit-hyphens: auto; -webkit-text-size-adjust: none; word-break: break-word;">
    <style>
        .pjct_img {
            display: flex;
            align-items: center;
            justify-content: space-between;
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
            font-size: 22px;
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

        .pckg_cnfrm_email table {
            width: 100%;
            border: 1px solid gray;
            margin-top: 20px;
        }

        .pckg_cnfrm_email table tr {
            border: 1px solid gray;
        }

        .pckg_cnfrm_email table tr th,
        .pckg_cnfrm_email table tr td {
            padding: 5px 10px;
            font-size: 16px;
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
    </style>
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
                <div class="pjct_img">
                    <img src="/storage/admin/img/company-logos/Logo1_1712568620.jpg" alt="">
                    <div class="pcg_cnfrm_title">
                        <h3>Hi Rahul Daibagna</h3>
                    </div>
                </div>
                <div class="pcg_cnfrm_name">
                    <div class="pcg_cnfrm_title">
                        <h3>Your Travel Code TRV-0002 and Your Package Name Top Selling 3 Nights And 4 Days Pattaya Tour
                            Packages is Confirmed</h3>
                        <p>2 N - 3 D</p>
                        <h4>Booking ID : TRV-0006</h4>
                    </div>
                    <div class="pcg_cnfrm_img">
                        <img src="/storage/admin/img/package-images/packagephoto_1712649884.png" alt="">
                    </div>
                </div>
                <table style="width: 100%;">
                    <tr>
                        <th>Full Name</th>
                        <th>Selected City Name</th>
                        <th>Journey Date</th>
                        <th style="width: 30%">Address</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>PinCode</th>
                    </tr>
                    <tr>
                        <td>Rahul Daibagna</td>
                        <td>Kolkata</td>
                        <td>25-06-2024</td>
                        <td>Kestopur Ghoshpara, Chandiberia, Near Power House</td>
                        <td>Kolkata</td>
                        <td>Kolkata</td>
                        <td>India</td>
                        <td>700102</td>
                    </tr>
                </table>
            </div>

            <div class="pcg_cnfirm_tbl">
                <div class="pcg_cnfrm_gust">
                    <div class="pcg_cnfrm_name">
                        <div class="pcg_cnfrm_title">
                            <h3>No Of Adult <small>(Above 18 Years)</small></h3>
                            <h4>Number Of Adult : 1</h4>
                        </div>
                    </div>
                    <table style="width: 100%;">
                        <tr>
                            <th style="width: 65%">Full Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                        </tr>
                        <tr>
                            <td>Rahul Daibagna</td>
                            <td>27</td>
                            <td>Male</td>
                        </tr>
                    </table>
                </div>
                <div class="pcg_cnfrm_gust">
                    <div class="pcg_cnfrm_name">
                        <div class="pcg_cnfrm_title">
                            <h3>No Of Children <small>(Within 18 Years)</small></h3>
                            <h4>Number Of Children : 1</h4>
                        </div>
                    </div>
                    <table style="width: 100%;">
                        <tr>
                            <th style="width: 65%">Full Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                        </tr>
                        <tr>
                            <td>Radhe Daibagna</td>
                            <td>17</td>
                            <td>Male</td>
                        </tr>
                    </table>
                </div>
                <div class="pcg_cnfrm_gust">
                    <div class="pcg_cnfrm_name">
                        <div class="pcg_cnfrm_title">
                            <h3>No Of Infant <small>(0-2 years)</small></h3>
                            <h4>Number Of Children : 1</h4>
                        </div>
                    </div>
                    <table style="width: 100%;">
                        <tr>
                            <th style="width: 65%">Full Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                        </tr>
                        <tr>
                            <td>Nitai Daibagna</td>
                            <td>2</td>
                            <td>Male</td>
                        </tr>
                    </table>
                </div>
                <div class="pcg_cnfrm_amnt">
                    <div class="flx_grow-1">

                        <div class="totl_amnt">
                            <h3>
                                Total :-
                            </h3>
                            <h3>
                                <i class="fa fa-inr" aria-hidden="true"></i> 1/-
                            </h3>
                        </div>
                        <div class="totl_amnt bdr_b">
                            <h3>
                                Discount :-
                            </h3>
                            <h3>
                                <i class="fa fa-inr" aria-hidden="true"></i> 0/-
                            </h3>
                        </div>
                        <div class="totl_amnt bdr_b">
                            <h3 class="grandPrice">
                                Grand Total :-
                                <p class="price_word">Rupees One only</p>
                            </h3>
                            <h3 class="grandPrice">
                                <i class="fas fa-rupee-sign fa-xs"></i> 1/-
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="paid_suc">
                    <h4>Paid Successfully</h4>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
