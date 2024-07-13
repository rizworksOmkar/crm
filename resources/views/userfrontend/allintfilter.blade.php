@foreach ($filteredPacakages as $key => $item)
    <div class="cruise_search_item">
        <div class="row">
            <div class="col-lg-3">
                <div class="cruise_item_img">
                    <img src="/{{ $item->package_image }}" alt="img" class="small-image rounded">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cruise_item_inner_content">
                    <div class="cruise_content_top_wrapper">
                        <div class="cruise_content_top_left cruise_content_w_100">
                            <h4>{{ $item->package_name }}</h4>
                            <ul>
                                <li>{{ $item->for_number_of_nights }} Nights / {{ $item->for_number_of_days }} Days</li>
                            </ul>
                            <div class="duration">
                                @if ($item->noofdaysbycity)
                                    <p class="cruise_duration text_ellipsis">{!! $item->noofdaysbycity !!}</p>
                                    <p class="cruise_duration_hbr">{!! $item->noofdaysbycity !!}</p>
                                @endif
                            </div>
                            <p><small>{{ getPackagetype($item->package_type_id) }}</small></p>
                            <p class="cuntry_sec text_ellipsis"><i class="fas fa-map-marker-alt"></i>
                                {{ getCountryName($item->country_id) }}</p>
                        </div>
                    </div>
                    <div class="cruise_content_middel_wrapper">
                        <div class="cruise_content_middel_left">
                            <div class="cruise_content_middel-cancel d-none">
                                <h5>Free cancellation,</h5>
                                <p>Cancel your booking at any time</p>
                            </div>
                            <div class="package_details_top_bottom">
                                @if ($item->pcakage_flight == 1)
                                    <div class="package_details_top_bottom_item">
                                        <div class="package_details_top_bottom_icon">
                                            <i class="fa fa-plane" aria-hidden="true"></i>
                                        </div>
                                        <div class="package_details_top_bottom_text">
                                            <h5>Flight</h5>
                                        </div>
                                    </div>
                                @endif
                                @if ($item->pcakage_transfer == 1)
                                    <div class="package_details_top_bottom_item">
                                        <div class="package_details_top_bottom_icon">
                                            <i class="fa fa-bus" aria-hidden="true"></i>
                                        </div>
                                        <div class="package_details_top_bottom_text">
                                            <h5>Transfer</h5>
                                        </div>
                                    </div>
                                @endif
                                @if ($item->pcakage_hotel == 1)
                                    <div class="package_details_top_bottom_item">
                                        <div class="package_details_top_bottom_icon">
                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                        </div>
                                        <div class="package_details_top_bottom_text">
                                            <h5>Hotel</h5>
                                        </div>
                                    </div>
                                @endif
                                @if ($item->pcakage_sightseeing == 1)
                                    <div class="package_details_top_bottom_item">
                                        <div class="package_details_top_bottom_icon">
                                            <i class="fa fa-binoculars" aria-hidden="true"></i>
                                        </div>
                                        <div class="package_details_top_bottom_text">
                                            <h5>Sightseeing</h5>
                                        </div>
                                    </div>
                                @endif
                                @if ($item->pcakage_meals == 1)
                                    <div class="package_details_top_bottom_item">
                                        <div class="package_details_top_bottom_icon">
                                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                                        </div>
                                        <div class="package_details_top_bottom_text">
                                            <h5>Meals</h5>
                                        </div>
                                    </div>
                                @endif
                                @if ($item->pcakage_train == 1)
                                    <div class="package_details_top_bottom_item">
                                        <div class="package_details_top_bottom_icon">
                                            <i class="fa fa-train" aria-hidden="true"></i>
                                        </div>
                                        <div class="package_details_top_bottom_text">
                                            <h5>Train</h5>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="cruise_content_bottom_wrapper">
                        <div class="cruise_content_bottom_left">
                            <p class="cruise_content_bottom_activity">
                                <small class="text_ellipsis">
                                    {{ getPackageActivity($item->activity_type_id) }}
                                </small>
                                <span class="cruise_content_bottom_box">
                                    {{ getPackageActivity($item->activity_type_id) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="cruise_content_rate">
                    <div class="prtnr-exclusive">
                        <h5>Partner Exclusive Rate</h5>
                    </div>
                    <div class="cruise_content_box_btm">
                        <div class="cruise_content_top_right">
                            <h5>4.8/5 Excellent</h5>
                        </div>
                        <div class="cruise_content_middel_right">
                            <p><i class="fas fa-rupee-sign fa-xs"></i><strike>{{ $item->rack_price }}</strike></p>
                            <h3><i class="fas fa-rupee-sign fa-xs"></i>{{ $item->off_season_price_pp }}<sup><span>/</span> Per person</sup></h3>
                        </div>
                    </div>
                    <div class="cruise_content_bottom_right br-n text-center cruise_content_w_100">
                        <a href="/package-details/{{ $item->id }}" class="btn btn_theme btn_md">View details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
