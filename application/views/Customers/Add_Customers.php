
<?php 
require_once(APPPATH."views\includes/header.php"); 
require_once(APPPATH."views\includes/alerts.php"); 
?>
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo SURL; ?>"><i class="entypo-home"></i>Home</a>
	</li>
	<li>			
		<a href="<?php echo $Controller_url; ?>"><?php echo $Controller_name; ?></a>
	</li>
	<li>			
		<a href="<?php echo $method_url; ?>"><?php echo $method_name; ?></a>
	</li>
	
</ol>

<div class="panel-heading">
	<div class="panel-title h4">
		<b><?php echo $Controller_name;?></b>
	</div>
				
</div>
<div class="panel-body">
				<form role="form" method="post" action="<?php echo base_url();?>Customers/AddCustomers" class="form-horizontal form-groups-bordered">
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Customer Name</label>
						
						<div class="col-sm-5">
							<input type="text" name="name" class="form-control" id="field-1" placeholder="Enter Name" required value="<?php if(isset($record->c_name)){ echo ucwords($record->c_name);}?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Customer Address</label>
						
						<div class="col-sm-5">
							<input type="text" name="address" class="form-control" placeholder="Enter Address" autocomplete="off" required value="<?php if(isset($record->c_address)){ echo $record->c_address;}?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Customer Cell #</label>
						
						<div class="col-sm-5">
							<input type="number" name="cellno" value="<?php if(isset($record->cell_no)){ echo $record->cell_no;}?>" required class="form-control" id="field-1">
						</div>
					</div>


					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Area Id</label>
						
						<div class="col-sm-5">
							<?php //echo $record->c_area_id;?>
							<select name="area" class="select2 form-control" data-allow-clear="true" data-placeholder="Select Parent Category..." required>
								<?php foreach($area as $key=>$value){  ?>
									<option value="<?php echo $value['area_id']; ?>" <?php if(isset($edit)){if($value['area_id'] == $record->c_area_id){ echo "selected";}}?> >
										<?php echo $value['name'];?>
									</option>
									
								
								<?php } ?>
							</select>
							
						</div>
					</div>


					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Customer Opening Balance (Rs)</label>
						
						<div class="col-sm-5">
							<input type="text" name="opngbl" value="<?php if(isset($record->c_opngbl)){ echo $record->c_opngbl;}?>" required class="form-control" id="field-1">
							
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Customer Type</label>
						
						<div class="col-sm-5">
							<select class="form-control" name="status">
								<option value="Payable" <?php if(isset($record->opn_type)){ if($record->opn_type == "Payable"){ echo "selected";}}?>>Payable</option>
								<option value="Receiveable"  <?php if(isset($record->opn_type)){ if($record->opn_type == "Receiveable"){ echo "selected";}}?>>Receiveable</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Customer Status</label>
						
						<div class="col-sm-5">
							<select class="form-control" name="cus_status">
								<option value="Active" <?php if(isset($record->status)){ if($record->status == "Active"){ echo "selected";}}?>>Active</option>
								<option value="InActive"  <?php if(isset($record->status)){ if($record->status == "InActive"){ echo "selected";}}?>>InActive</option>
							</select>
						</div>
					</div>


					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Pick Customer Location</label>
						
						<div class="col-sm-5">
							<input id="search_box"class="form-control" style="margin-top: 9px !important; width: 49%; z-index: 0;position: absolute;left: 188px;top: 1px;height: 39px;border: 1px solid;background-color: white;font-weight: bold; display:none;" type="text" placeholder="Search Box">
                                    <div id="mapp"  style="width: 100%; height: 400px;" ></div>
									<input type="hidden" name="lat" id="latitude" value="">
									<input type="hidden" name="long" id="longitude" value="">
							
						</div>
					</div>



					<?php 
						if(isset($edit)){
					?>
					<input type="hidden" name="edit" value="<?php echo $edit;?>">
				    <?php } ?>


					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="Submit" name="Submit" class="btn btn-red">Save</button>
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
      	if(isset($record->lat)){ $latitude = $record->lat;}else{ $latitude = "33.7204997";}
      	 
      	if(isset($record->longi)){ $longitude = $record->longi;}else{ $longitude = "73.04052769999998";}
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


   <script src="assets/js/select2/select2.min.js"></script>
<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="assets/js/select2/select2.css"> 	
		

<?php
require_once(APPPATH."views\includes/footer.php"); 

 ?>



		
			
			