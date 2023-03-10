<x-app-layout>
    <form method="GET" action="{{ route('search') }}" class="row1 g-31 form-input1 search-form">
        <section class="backgroundColor">
            <div class="container">
                <div class="property">
                    <div class="d-flex drop-menu destination-drop">
                        <p class="select-search">DESTINATION</p>
                        <div class="select-destionation destination-label">
                            <span>{{ @request()->city ? @request()->city : 'Destination' }}</span>
                            <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                        <div class="dropdown-open">
                            @foreach ($cities as $city)
                                <span class="custom-option select-destination-name"
                                    data-value="{{ $city }}">{{ $city }}</span>
                            @endforeach
                            <input type="text" class="d-none" name="city" value="{{ @request()->city }}" />
                        </div>
                    </div>
                    <div class="date-input">
                        <div class="d-flex drop-menu" style="flex-direction: row; justify-content: space-between">
                            <p class="select-search">ARRIVAL</p>
                            <p class="select-search">DEPARTURE</p>
                        </div>
                        <input id="daterange" type="text" name="daterange" value="" inputmode="none" />
                    </div>
                    <div class="d-flex drop-menu destination-drop ml-4">
                        <p class="select-search">GUESTS</p>
                        <div class="select-destionation guests-label">
                            <span>{{ @request()->guests ? @request()->guests : 'Guests' }}</span>
                            <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                        <div class="dropdown-open">
                            @for ($i = 1; $i <= $maxGuests; $i++)
                                <span class="custom-option select-guest-name"
                                    data-value="{{ $i }}">{{ $i }}</span>
                            @endfor
                            <input type="text" class="d-none" name="guests" value="{{ @request()->guests }}" />
                        </div>
                    </div>
                    <input type="text" class="d-none" name="sort_by" value="{{ @request()->sort_by }}" />
                    <div class="d-flex drop-menu guests-border">
                        <p class="select-search">CLIENT BUDGET</p>
                        <div class="select-destionation">
                            <span>{{ @request()->price ? '$' . @request()->price : 'Price' }}</span>
                            <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                        <div class="dropdown-open guests-open budget">
                            <span>{{ @request()->price ? '$' . request()->price : 'Price' }}</span>
                            <input type="range" min="100" max="50000" step="100"
                                value="{{ @request()->price ? request()->price : 500 }}" id="price"
                                name="price" />
                            <div class="budget-applay">
                                <button class="budget-applay-button">Apply</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex drop-menu">
                        <button class="search-btn">Search</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="backgroundColor">
            <div class="container">
                <div class="sort">
                    <div class="sort-filter">
                        <div class="select-destionation sort-by">
                            <p>{{ @request()->sort_by ? @request()->sort_by : 'Sort by' }}</p>
                            <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                        <div class="dropdown-open">
                            <span selected="" class="custom-option select-sortby"
                                data-value="Price Low to High">Price
                                Low to High</span>
                            <span selected class="custom-option select-sortby"
                                data-value="Property Name A to Z">Property
                                Name A to Z</span>
                            <span selected class="custom-option select-sortby" data-value="No. of Guests">No. of
                                Guests</span>
                        </div>
                        <div class="select-drop show-filter">
                            <p>Show filter</p>
                            <img class="arrow-filter" src="{{ asset('img') }}/downninvalid-name@3x.png" />
                        </div>
                    </div>

                    <div class="property-filter">
                        <div class="filter-menu">
                            <div class="d-flex drop-menu">
                                <p class="select-search">PROPERTY TYPE</p>
                                <div class="select-destionation property_type-label">
                                    <p class="value-drop">
                                        {{ @request()->property_type ? @request()->property_type : 'PROPERTY TYPE' }}
                                    </p>
                                    <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                                </div>
                                <div class="dropdown-open">
                                    @foreach ($propertyTypes as $propertyType)
                                        <span class="custom-option select-property_type-name"
                                            data-value="{{ $propertyType }}">{{ $propertyType }}</span>
                                    @endforeach
                                    <input type="text" class="d-none" name="property_type"
                                        value="{{ @request()->property_type }}" />
                                </div>
                            </div>
                            <div class="d-flex drop-menu">
                                <p class="select-search">BATHROOMS</p>
                                <div class="select-destionation bathrooms-label">
                                    <p class="value-drop">
                                        {{ @request()->bathrooms ? @request()->bathrooms : 'BATHROOMS' }}</p>
                                    <img src="{{ asset('img') }}/downninvalid-name@3x.png" />
                                </div>
                                <div class="dropdown-open">
                                    @for ($i = 1; $i <= $bathrooms; $i++)
                                        <span class="custom-option select-bathroom-name"
                                            data-value="{{ $i }}">{{ $i }}</span>
                                    @endfor
                                    <input type="text" class="d-none" name="bathrooms"
                                        value="{{ @request()->bathrooms }}" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex drop-menu btn-filter">
                            <a href="{{ route('search') }}" class="search-btn clear">Clear</a>
                            <button type="submit" class="search-btn applay">Applay</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <section class="backgroundColor">

        @if (count($properties))
            <div class="container availabile">
                <h3>Available Properties</h3>
                <div class="properties-card">
                    @forelse($properties as $property)
                        <div class="card-info">
                            <div class="card-img">
                                <div class="shadow-left"></div>
                                <img src="{{ asset('img') }}/4sliderbitmap-copy-3@3x.png" />
                                <div class="shadow-right"></div>
                                <div class="properties-slide">
                                    <img src="{{ asset('img') }}/sliderinvalid-name@3x.png" />
                                </div>
                            </div>
                            <div class="card-content">
                                <img class="profile-picture" src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                <h4>{{ hasRole('Contact_Person') ? $property->name : $property->property_id }}</h4>
                                <div class="vila-info d-flex">
                                    <div class="name-vila col-lg-5">
                                        <p>{{ $property->destination }}<br />
                                            {{ $property->community }}</p>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="publisher-contact d-flex">
                                            <p class="publisher">Publisher:</p>
                                            <p>Tripwix</p>
                                        </div>
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Contact:</p>
                                            <p>Roberto Carneiro</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bedrooms">
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Bedrooms:</p>
                                        <p>{{ $property->no_of_bedrooms }}</p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Max Guests:</p>
                                        <p>{{ $property->max_guests }}</p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Bathrooms:</p>
                                        <p>{{ $property->no_of_bathrooms }}</p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Guest Total:</p>
                                        @if ($property->total_price > 0)
                                            <p>{!! $property->currency_symbol !!}{{ number_format($property->total_price, 2) }}
                                            </p>
                                        @else
                                            <p>N/A</p>
                                        @endif
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Comission:</p>
                                        <p>{{ $property->commission }}%</p>
                                    </div>
                                    <div class="publisher-contact d-flex">
                                        <p class="contact-card">Payout:</p>
                                        <p>
                                            @if ($property->total_price > 0)
                                                {!! $property->currency_symbol !!}
                                                {{ number_format(($property->total_price * str_replace('%', '', $property->commission)) / 100, 2) }}
                                            @else
                                                {{ 'N/A' }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-btn">
                                <button class="request">Request</button>
                                <button class="download">Download</button>
                            </div>
                            <div class="download-card-open">
                                <div class="arrow-back arrow-back-download">
                                    <img src="{{ asset('img') }}/arrowinvalid-name@3x.png" />
                                    <p>Back</p>
                                </div>
                                <div class="card-img download-card">
                                    <img src="{{ asset('img') }}/4sliderbitmap-copy-3@3x.png" />
                                </div>
                                <div class="card-content">
                                    <img class="profile-picture" src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                    <h4>Download</h4>
                                    <div class="download-file">
                                        <div>
                                            <p>PDF</p>
                                            <a target="_blank" href="{{ $property->pdf_link }}">Download</a>
                                        </div>
                                        <div>
                                            <p>Rates</p>
                                            <a target="_blank" href="{{ $property->price_doc_link }}">Download</a>
                                        </div>
                                        <div>
                                            <p>HQ Photos</p>
                                            <a target="_blank"
                                                href="{{ $property->images_folder_link }}">Download</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-btn ical">
                                    <p>iCal link:</p>
                                    <div class="ical-link">
                                        <input value="{{ $property->ical_link }}" />
                                        <button class="ical-copy-btn">Copy</button>
                                    </div>
                                </div>
                            </div>
                            <div class="download-card-request-open">
                                <div class="arrow-back arrow-back-request">
                                    <img src="{{ asset('img') }}/arrowinvalid-name@3x.png" />
                                    <p>Back</p>
                                </div>
                                <div class="card-img download-card">
                                    <img src="{{ asset('img') }}/4sliderbitmap-copy-3@3x.png" />
                                </div>
                                <div class="card-content">
                                    <img class="profile-picture" src="{{ asset('img') }}/100k-ai-faces-6.jpg" />
                                    <h4>Request to Book</h4>
                                    <div class="bedrooms">
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Checkin:</p>
                                            <p>{{ date('d / M / Y', strtotime($startDate)) }}</p>
                                        </div>
                                        <div class="publisher-contact d-flex icon-i">
                                            <p class="contact-card">Guest Pays:</p>
                                            <div class="cost-info">
                                                @if ($property->total_price > 0)
                                                    <p>{!! $property->currency_symbol !!}{{ number_format($property->total_price, 2) }}
                                                    </p>
                                                @else
                                                    <p>N/A</p>
                                                @endif
                                                <img class="info-i"
                                                    src="{{ asset('img') }}/infoinvalid-name@3x.png" />
                                            </div>
                                        </div>
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Checkout:</p>
                                            <p>{{ date('d / M / Y', strtotime($endDate)) }}</p>
                                        </div>
                                        <div class="publisher-contact d-flex icon-i">
                                            <p class="contact-card">Your Payout:</p>
                                            <div class="cost-info">
                                                <p>
                                                    @if ($property->total_price > 0)
                                                        {!! $property->currency_symbol !!}
                                                        {{ number_format(($property->total_price * str_replace('%', '', $property->commission)) / 100, 2) }}
                                                    @else
                                                        {{ 'N/A' }}
                                                    @endif
                                                </p>
                                                <img class="info-i"
                                                    src="{{ asset('img') }}/infoinvalid-name@3x.png" />
                                            </div>
                                        </div>
                                        <div class="publisher-contact d-flex">
                                            <p class="contact-card">Nights:</p>
                                            <p>{{ count($rangeDatesArray) }}</p>
                                        </div>
                                        <div class="publisher-contact d-flex icon-i">
                                            <p class="contact-card">Property:</p>
                                            <div class="cost-info">
                                                <p>{{ $property->property_type }}</p>
                                                <img class="info-i"
                                                    src="{{ asset('img') }}/infoinvalid-name@3x.png" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-request">
                                        <p>Message for Roberto:</p>
                                        <textarea rows="4" maxlength="50"></textarea>
                                        <p class="request-info">
                                            Roberto Carneiro from Tripwix will reach out to you.
                                        </p>
                                    </div>
                                </div>
                                <div class="card-btn-request">
                                    <button class="request download send-request">Submit request</button>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        @else
            <div class="container">
                <div class="search-no-available">
                    <h3>No Available Properties</h3>
                    <p>We didn't find any properties based on your chosen filterset.</p>
                    <button onclick="window.location.href='{{ route('search') }}'">Reset Filters & Search</button>
                </div>
            </div>
        @endif



        @if ($properties)
            <div class="row justify-content-center float-end pt-3 pagina w-100">
                {!! $properties->appends($_GET)->links('pagination::bootstrap-4') !!}
            </div>
        @endif

        {{-- <div class="pagination-container">
                <button class="prev-btn">Previous</button>
                <button class="next-btn">Next</button>
            </div>
            <div class="pagination"></div> --}}
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css') }}/daterangepicker.css" />
    @endpush

    @push('scripts')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script type="text/javascript" src="{{ asset('js') }}/script.js"></script>
        <script>
            $(document).ready(function() {

                $('.select-destination-name').click(function() {
                    $('.destination-label span').html($(this).attr('data-value'));
                    $('input[name=city]').val($(this).attr('data-value'));
                });
                $('.select-guest-name').click(function() {
                    $('.guests-label span').html($(this).attr('data-value'));
                    $('input[name=guests]').val($(this).attr('data-value'));
                });
                $('.select-property_type-name').click(function() {
                    $('.property_type-label p').html($(this).attr('data-value'));
                    $('input[name=property_type]').val($(this).attr('data-value'));
                });
                $('.select-bathroom-name').click(function() {
                    $('.bathrooms-label p').html($(this).attr('data-value'));
                    $('input[name=bathrooms]').val($(this).attr('data-value'));
                });

                $('.select-sortby').click(function() {
                    $('input[name=sort_by]').val($(this).attr('data-value'));
                    $('form.search-form').submit();
                });


                $('.ical-copy-btn').click(function() {
                    var copyText = $(this).parents(".ical-link").find('input');
                    copyText.select();
                    navigator.clipboard.writeText(copyText.val());
                });

                $(".send-request").click(function(e) {
                    e.preventDefault();
                    const _self = $(this);

                    _self.LoadingOverlay('show');

                    setTimeout(function() {
                        successMessage('Request successfully sent');
                        _self.LoadingOverlay('hide');
                        $(".arrow-back-request").click();
                    }, 3000);


                    // $.ajax({
                    //     type: 'post',
                    //     url: _form.attr('action'),
                    //     processData: false,
                    //     dataType: 'json',
                    //     data: formData,
                    //     success: function(res) {
                    //         if (res.success) {
                    //             //successMessage('Task successfully created');
                    //             ticketForm.classList.remove('open')
                    //             ticketFormThanks.classList.add('open')
                    //             $("#property_id").val('');
                    //             $(".datepicker").val('');
                    //         } else {
                    //             errorMessage('Task not created');
                    //         }
                    //     },
                    //     error: function(request, status, error) {
                    //         showAjaxErrorMessage(request);
                    //     },
                    //     complete: function(res) {
                    //         _self.LoadingOverlay('hide');
                    //     }
                    // });
                });

            });

            $("#daterange").daterangepicker({
                    autoApply: true,
                    opens: "center",
                },
                function(start, end, label) {
                    console.log(
                        "New date range selected: " +
                        start.format("YYYY-MM-DD") +
                        " to " +
                        end.format("YYYY-MM-DD") +
                        " (predefined range: " +
                        label +
                        ")"
                    );
                }
            );


            /**
             * Show Success Message
             * @param message
             * @param title
             */
            function successMessage(message, title) {
                if (!title) title = "Success!";
                toastr.remove();
                toastr.success(message, '', {
                    closeButton: true,
                    timeOut: 4000,
                    progressBar: true,
                    newestOnTop: true
                });
            }

            /**
             * Show Error Message
             * @param message
             * @param title
             */
            function errorMessage(message, title) {
                if (!title) title = "Error!";
                toastr.remove();
                toastr.error(message, '', {
                    closeButton: true,
                    timeOut: 4000,
                    progressBar: true,
                    newestOnTop: true
                });
            }
        </script>
    @endpush

</x-app-layout>
