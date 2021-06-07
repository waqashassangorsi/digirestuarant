
<?php 
require_once(APPPATH."views\includes/header.php"); 
require_once(APPPATH."views\includes/alerts.php"); 
?>


			<div class="panel-heading">
				<div class="panel-title h4">
					<b>Add Company Information</b>
				</div>
				
			
			</div>
			
			<div class="panel-body">
				
				<form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>/Company/add" >
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Business Name
</label>
						
						<div class="col-sm-5">
							<input type="text" required name="businessname" class="form-control" id="field-1" placeholder="" value="<?php if(isset($company->bznzname)){ echo $company->bznzname;} ?>">
						</div>

					    	<input type="hidden" name="c_id" value="<?php if(isset($company->c_id)){ echo $company->c_id; }else{echo 0;} ?>">

					</div>
					
				

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Address</label>
						
						<div class="col-sm-5">
							<textarea class="form-control" name="address" id="field-ta" placeholder="Textarea"><?php if(isset($company->address)){ echo $company->address;} ?></textarea>
						</div>
					</div>
					
					<div>
						
						<h4><b>Pick Up Your Business Location</b></h4>
						<div class="col-sm-12" style="margin-top: 15px;">
								<input id="search_box"class="form-control" style="margin-top: 9px !important; width: 49%; z-index: 0;position: absolute;left: 188px;top: 1px;height: 39px;border: 1px solid;background-color: white;font-weight: bold; display:none;" type="text" placeholder="Search Box">
                                    <div id="mapp"  style="width: 100%; height: 400px;" ></div>
							<input type="hidden" name="lat" id="latitude" value="">
							<input type="hidden" name="long" id="longitude" value="">
						</div>

					</div>
					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" name="submit" class="btn btn-info btn-lg">Save</button>
						</div>
					</div>
				</form>
				
			</div>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9EPIEhD6cT-JutxmsvFkYcmd-__UJxj4&libraries=places&callback=initAutocomplete"
         async defer>
         
</script>		

<script>
	var markers = [];
      function initAutocomplete() {
      	<?php
      	if(isset($company->lat)){ $latitude = $company->lat;}else{ $latitude = "33.7204997";}
      	 
      	if(isset($company->long)){ $longitude = $company->long;}else{ $longitude = "73.04052769999998";}
        ?>
        var map = new google.maps.Map(document.getElementById('mapp'), {
          zoom: 12,
	  center: {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>}
        });
        
        var myLatlng = new google.maps.LatLng(<?php echo $latitude; ?>,<?php echo $longitude; ?>);
	addMarker(myLatlng,map);
	
        // Create the search box and link it to the UI element.
        var input = document.getElementById('search_box');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        map.addListener('click', function(event) {
        	addMarker(event.latLng,map);
        });
        // Adds a marker to the map and push to the array.
	
        
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            
            
            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: 'https://khaadim.com/img/newmarpmarker.png',
              title: place.name,
              position: place.geometry.location
            }));
            
            update_latlng(place.geometry.location);
            
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }
      
      function addMarker(location,map) {
		for (var i = 0; i < markers.length; i++) {
			markers[0].setMap(null);
		}
		markers = [];
		var marker = new google.maps.Marker({
			position: location,
			icon: 'https://www.khaadim.pk/dashboard/img/48.png',
			map: map
		});
		markers.push(marker);
		
		update_latlng(location);
	}
	
	function update_latlng(location) {
		document.getElementById('latitude').value=location.lat();
		document.getElementById('longitude').value=location.lng();
	}

    </script>
    



<?php
require_once(APPPATH."views\includes/footer.php"); 

 ?>
 