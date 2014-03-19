ruleset location_near {
	meta {
		//89D1D9E8-AF16-11E3-9EBD-A6BEE71C24E1
		//https://cs.kobj.net/sky/event/89D1D9E8-AF16-11E3-9EBD-A6BEE71C24E1/0/location/new_current?_rids=b505200x7
		name "Location Near"
		description <<
		  Checks if a checkin is near the stored location in the PDS module
		>>
		author "Leckie Gunter"
		logging on
		
		use module a169x701 alias CloudRain
		use module a41x186  alias SquareTag
		use module b505200x5 alias location_data
	  }
	rule nearby is active{
		select when location new_current
		pre {
			locationString = event:attr("checkin");
			location = locationString.decode();
			new_lat = location.pick("$..lat");
			new_lng = location.pick("$..lng");
			
			checkin_data = location_data:get_location_data("fs_checkin");
			stored_lat = checkin_data.pick("$.lat");
			stored_lng = checkin_data.pick("$.lng");
			
			r90   = math:pi()/2;      
			rEk   = 6378;         // radius of the Earth in km

			// point a
			lata  = new_lat;
			lnga  = new_lng;

			// point b
			latb  = stored_lat;
			lngb  = stored_lng;

			// convert co-ordinates to radians
			rlata = math:deg2rad(lata);
			rlnga = math:deg2rad(lnga);
			rlatb = math:deg2rad(latb);
			rlngb = math:deg2rad(lngb);

			// distance between two co-ordinates in kilometers
			dE = math:great_circle_distance(rlnga,r90 - rlata, rlngb,r90 - rlatb, rEk);
			
			//8.04 km == 5 miles
		}
		if(dE < 8.04) then {
//			send_directive(venue.pick("$.name")) with key = "checkin" and value = venue.pick("$.name");
			noop();
		}
		fired {
			raise explicit event location_nearby for b505200x8 with distance = dE;
			set ent:lat new_lat;
			set ent:lng new_lng;
			set ent:dist dE;
		}
		else {
			raise explicit event location_far for b505200x8 with distance = dE;
		}
	}
	
	rule show_lat_lng {
		select when web cloudAppSelected
		pre {
			lat = ent:lat;
			lng = ent:lng;
			dist = ent:dist;
			
			my_html = <<
				<div id="main">
					<p>Lat: #{lat}</p>
					<p>Long: #{lng}</p>
					<p>Dist: #{dist}</p>
				</div>
			>>;
		}
		{
			SquareTag:inject_styling();
			CloudRain:createLoadPanel("Latest Checkin Information Via Data Module", {}, my_html);
		}
	}
}
