<!--************************************
				Clinic Map Start
		*************************************-->
@section('styles')
    <style>
        #map {
            width: 100%;
            height: 650px;
            background-color: grey;
        }
    </style>
@endsection

<div id="map"></div>

@section('scripts')
    <script>
        function initMap() {

            var address = [];
            var clinicName = [];
            var markerIcon = [];
            var markerArray = [];

            var geocoder = new google.maps.Geocoder();

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: 44.1565705, lng: 10.9720465},
                styles: [
                    {
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            }
                        ]
                    },
                    {
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#c8cdd6"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#616161"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#bdbdbd"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#eeeeee"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#757575"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#e5e5e5"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#757575"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#dadada"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#616161"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                        ]
                    },
                    {
                        "featureType": "transit.line",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#e5e5e5"
                            }
                        ]
                    },
                    {
                        "featureType": "transit.station",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#eeeeee"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#c9c9c9"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#92c1d6"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                        ]
                    }
                ]
            });

            var markerCluster = new MarkerClusterer(map, markerArray,
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});


            @foreach($clinics as $clinic)
                var index = "{{ $loop->index }}";
                address[index] = "{{ $clinic->address }}";

                geocoder.geocode({ 'address': address[index]}, function(results){
                    clinicName[index] = "{{ $clinic->name }}";
                    markerIcon[index] = "{{ asset("storage/".$clinic->marker) }}";
                    var contentString = '<div id="content">'+
                        '<div id="siteNotice">'+
                        '</div>'+
                        '<h1 id="firstHeading" class="firstHeading">{{ $clinic->name }}</h1>'+
                        '<img src="{{ asset("storage/".$clinic->thumb) }}" alt="{{ $clinic->name }} thumb">'+
                        '<div id="bodyContent">'+
                        '<p><b>{{ $clinic->address }}</b></p>'+
                        '<a href="{{ $clinic->url }}" target="_blank"><i class="fa fa-link"></i> Sito web</a>'+
                        '</div>'+
                        '</div>';
                    var marker  = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        icon: markerIcon[index],
                        title: clinicName[index]
                    });
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                    markerCluster.addMarker(marker);
                });

            @endforeach



        }
    </script>

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-WRcZN-DxOGNpDKDbwdXZyKRszkPFHx8&callback=initMap">
    </script>

@endsection

<!--************************************
        Clinic Map End
*************************************-->

