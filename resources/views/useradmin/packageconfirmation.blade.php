<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>
    <title>Package Confirmation</title>
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
            text-align: right;
            padding: 10px;
            /* float: right; */
            margin-top: 5px;
            display: flex;
            justify-content: right;
            padding-right: 0;
        }

        .paid_suc img {
            width: 220px;
            object-fit: cover;
            height: 100%;
            border-radius: 30px;
        }

        /* .paid_suc h4 {
            background-color: #1a1e21;
            padding: 10px;
            color: #fff;
            font-size: 18px;
            width: 20%;
            border-radius: 3px;
        } */

        .pdf_dwnld {
            text-align: center;
            margin-bottom: 20px;
        }

        .pdf_dwnld button {
            border: 1px solid black;
            padding: 7px 20px;
            color: #fff;
            background-color: #000;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 400;
        }

        .pckg_cnfrm_email .custmr_dtls_tbl{
            width: 30%;
        }

        @media only screen and (max-width: 600px) {
            .pckg_cnfrm_email .custmr_dtls_tbl{
            width: 100%;
        }
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
                    @if ($companylogo->company_logo_1)
                        <img src="/{{ $companylogo->company_logo_1 }}" alt="{{ $companylogo->company_name }}">
                    @else
                    @endif
                    {{-- <img src="/storage/admin/img/company-logos/Logo1_1712568620.jpg" alt=""> --}}
                    <div class="pcg_cnfrm_title">
                        <h3>Hi!
                            @if (Auth::User()->middle_name)
                                {{ Auth::User()->first_name }} {{ Auth::User()->middle_name }}
                                {{ Auth::User()->last_name }}
                            @else
                                {{ Auth::User()->first_name }} {{ Auth::User()->last_name }}
                            @endif
                        </h3>
                    </div>
                </div>
                <div class="pcg_cnfrm_name">
                    <div class="pcg_cnfrm_title">
                        <h3>{{ getpackageName($details->pacakge_id) }}</h3>
                        <p>{{ getDaysandNight($details->pacakge_id) }}</p>
                        <h4 id="bookingID">Booking ID :{{ $bookingID }}</h4>
                    </div>
                    <div class="pcg_cnfrm_img">
                        <img src="/{{ getpackageImage($details->pacakge_id) }}" alt="" id="packImage">
                    </div>
                </div>

                <table class="custmr_dtls_tbl">
                    <tbody>
                        <tr>
                            <th colspan="2">CUSTOMER DETAILS </th>
                        </tr>
                        <tr>
                            <th>Full Name</th>
                            <td>
                                @if (Auth::User()->middle_name)
                                    {{ Auth::User()->first_name }} {{ Auth::User()->middle_name }}
                                    {{ Auth::User()->last_name }}
                                @else
                                    {{ Auth::User()->first_name }} {{ Auth::User()->last_name }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>
                                {{ Auth::User()->phonenumber }}
                            </td>
                        </tr>
                        <tr>
                            <th>Contact Email</th>
                            <td>
                                {{ Auth::User()->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>Pacakge Cost</th>
                            <td>
                                {{ $details->pacakge_cost }} / Per Head
                            </td>
                        </tr>
                        <tr>
                            <th>No Of Passenger</th>
                            <td>
                                {{ $Totalpac->total }} Pac
                            </td>
                        </tr>

                    </tbody>
                </table>
                <table style="width: 100%;" class="mt-4">
                    <tr>
                        <th>Starting From</th>
                        <th>Journey Date</th>
                        <th style="width: 30%">Address</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>PinCode</th>
                    </tr>
                    <tr>
                        <td>{{ getCityNamewithoutcomma($details->city_id) }}</td>
                        <td>{{ date('d-m-Y', strtotime($details->journey_date)) }}</td>
                        <td>{!! $details->user_address !!}</td>
                        <td>{{ $details->user_state }}</td>
                        <td>{{ $details->user_city }}</td>
                        <td>{{ $details->user_country }}</td>
                        <td>{{ $details->user_pincode }}</td>
                    </tr>
                </table>
            </div>

            <div class="pcg_cnfirm_tbl">
                <div class="pcg_cnfrm_gust">
                    <div class="pcg_cnfrm_name">
                        <div class="pcg_cnfrm_title">
                            <h3>No Of Adult <small>(Above 18 Years)</small></h3>
                            <h4>Adult : {{ $details->no_of_adult }}</h4>
                        </div>
                    </div>
                    <table style="width: 100%;">
                        <tr>
                            <th style="width: 65%">Full Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                        </tr>
                        @foreach ($adultdetails as $adultitem)
                            <tr>
                                <td>{{ $adultitem->full_name }}</td>
                                <td>{{ $adultitem->age }}</td>
                                <td>
                                    @if ($adultitem->sex == 1)
                                        Male
                                    @elseif ($adultitem->sex == 2)
                                        FeMale
                                    @else
                                        Others
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <div class="pcg_cnfrm_gust">
                    <div class="pcg_cnfrm_name">
                        <div class="pcg_cnfrm_title">
                            <h3>No Of Children <small>(Within 18 Years)</small></h3>
                            <h4>Children : {{ $details->no_of_child }}</h4>
                        </div>
                    </div>
                    <table style="width: 100%;">
                        <tr>
                            <th style="width: 65%">Full Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                        </tr>
                        @foreach ($childdetails as $childitem)
                            <tr>
                                <td>{{ $childitem->full_name }}</td>
                                <td>{{ $childitem->age }}</td>
                                <td>
                                    @if ($childitem->sex == 1)
                                        Male
                                    @elseif ($childitem->sex == 2)
                                        FeMale
                                    @else
                                        Others
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="pcg_cnfrm_gust">
                    <div class="pcg_cnfrm_name">
                        <div class="pcg_cnfrm_title">
                            <h3>No Of Infant <small>(0-2 years)</small></h3>
                            <h4>Infant : {{ $details->no_of_infant }}</h4>
                        </div>
                    </div>
                    <table style="width: 100%;">
                        <tr>
                            <th style="width: 65%">Full Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                        </tr>
                        @foreach ($infantdetails as $infantitem)
                            <tr>
                                <td>{{ $infantitem->full_name }}</td>
                                <td>{{ $infantitem->age }}</td>
                                <td>
                                    @if ($infantitem->sex == 1)
                                        Male
                                    @else
                                        FeMale
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="pcg_cnfrm_amnt">
                    <div class="flx_grow-1">

                        <div class="totl_amnt bdr_b">
                            <h3 class="grandPrice">
                                Total Amount Paid:
                                <p class="price_word">Rupees One only</p>
                            </h3>
                            <h3 id="grandPrice">
                                <i class="fa fa-inr" aria-hidden="true"></i>{{ $totalAmount->amount }}
                            </h3>

                        </div>
                        {{-- <div class="totl_amnt bdr_b">
                            <h3>
                                Discount :-
                            </h3>
                            <h3>
                                <i class="fa fa-inr" aria-hidden="true"></i> 0/-
                            </h3>
                        </div> --}}
                        {{-- <div class="totl_amnt bdr_b">
                            <h3 class="grandPrice">
                                Grand Total :-
                                <p class="price_word">Rupees One only</p>
                            </h3>
                            <h3 class="grandPrice">
                                <i class="fas fa-rupee-sign fa-xs"></i> 1/-
                            </h3>
                        </div> --}}
                    </div>
                </div>
                <div class="paid_suc">
                    <img src="/assets/user/img/paid.png" alt="" width="50" height="50"> 
                </div>
            </div>
        </div>

        <div class="pdf_dwnld">
            <button id="cmd">Download As PDF</button>
        </div>
    </div>

    <script src="{{ asset('assets/user/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script>
        function convertNumberToWords(num) {
            var ones = ["", "One ", "Two ", "Three ", "Four ", "Five ", "Six ", "Seven ", "Eight ", "Nine ", "Ten ",
                "Eleven ", "Twelve ", "Thirteen ", "Fourteen ", "Fifteen ", "Sixteen ", "Seventeen ", "Eighteen ",
                "Nineteen "
            ];
            var tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
            if ((num = num.toString()).length > 9) return "Overflow: Maximum 9 digits supported";
            n = ("000000000" + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return;
            var str = "";
            str += n[1] != 0 ? (ones[Number(n[1])] || tens[n[1][0]] + " " + ones[n[1][1]]) + "Crore " : "";
            str += n[2] != 0 ? (ones[Number(n[2])] || tens[n[2][0]] + " " + ones[n[2][1]]) + "Lakh " : "";
            str += n[3] != 0 ? (ones[Number(n[3])] || tens[n[3][0]] + " " + ones[n[3][1]]) + "Thousand " : "";
            str += n[4] != 0 ? (ones[Number(n[4])] || tens[n[4][0]] + " " + ones[n[4][1]]) + "Hundred " : "";
            str += n[5] != 0 ? (str != "" ? "and " : "") + (ones[Number(n[5])] || tens[n[5][0]] + " " + ones[n[5][1]]) : "";
            return str;
        }


        $(document).ready(function() {
            var inAWord = "";
            var grandTotal = 0;
            grandTotal = parseInt($("#grandPrice").text());
            inAWord = grandTotal;

            var words = convertNumberToWords(inAWord);
            if (words == '') {

                $('.price_word').text('Rupees zero only');
            } else {
                $('.price_word').text('Rupees ' + words + ' only');
            }
        });

        $('#cmd').click(function() {
            var HTML_Width = $(".container").width();
            var HTML_Height = $(".container").height();
            var imagePath = $('#packImage').attr('src');
            var top_left_margin = 15;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;

            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;


            html2canvas($(".container")[0], {
                allowTaint: true
            }).then(function(canvas) {
                canvas.getContext('2d');

                console.log(canvas.height + "  " + canvas.width);


                var imgData = canvas.toDataURL(imagePath, 1.0);
                var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width,
                    canvas_image_height);


                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(PDF_Width, PDF_Height);
                    pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4),
                        canvas_image_width, canvas_image_height);
                }

                pdf.save($('#bookingID').text() + ".pdf");
            });
        });
    </script>
</body>

</html>
