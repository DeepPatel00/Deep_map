@extends('frontend.common')
@section('content')
<!-- //<script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyC_Yi_KcNZX010EvloyvFkg1cwRNaiz8js" type="text/javascript"></script>
<div id="map" style="height: 800px; width: auto;">
</div>

@endsection
@section('page_script')
<script>
    function loadMap() {

        var locations = [
            <?php if (!empty($club)) {
                foreach ($club as $c) { ?>['<?= $c->name ?> - Club', <?= $c->latitude ?>, <?= $c->longitude ?>],
            <?php }
            } ?>
            <?php if (!empty($event)) {
                foreach ($event as $e) { ?>['<?= $e->name ?> - Event', <?= $e->latitude ?>, <?= $e->longitude ?>],
            <?php }
            } ?>
        ];

        let mapOptions = {
            center: new google.maps.LatLng(37.0902, 95.7129),
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.SATELLITE
        }

        // Moved this line up here
        this.map = new google.maps.Map(document.getElementById('map'), mapOptions); // changed the "native element" to a standard DOM element for the sake of this example

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: this.map // You are using this.map here so it needs to be created before
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(Map, marker);
                }
            })(marker, i));
        }
    }

    loadMap();
</script>
@endsection