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
		
	  }
	rule nearby is active{
		select when location new_current
		pre {
			locationString = event:attr("checkin");
			location = locationString.decode();
			
			lat = location.pick("$..lat");
			lng = location.pick("$..lng");
			
			r90   = math:pi()/2;      
			rEk   = 6378;         // radius of the Earth in km

			// point a
			lata  = 40.4267290;
			lnga  = -111.9025358;

			// point b
			latb  = 43.8310154;
			lngb  = -111.7747790;

			// convert co-ordinates to radians
			rlata = math:deg2rad(lata);
			rlnga = math:deg2rad(lnga);
			rlatb = math:deg2rad(latb);
			rlngb = math:deg2rad(lngb);

			// distance between two co-ordinates in radians
			dR = math:great_circle_distance(rlnga,r90 - rlata, rlngb,r90 - rlatb);

			// distance between two co-ordinates in kilometers
			dE = math:great_circle_distance(rlnga,r90 - rlata, rlngb,r90 - rlatb, rEk);
			
			
		}
		if(checkin) then {
			send_directive(venue.pick("$.name")) with key = "checkin" and value = venue.pick("$.name");

		}
		fired {
			
			raise pds event new_location_data for b505200x5 with key = "fs_checkin" and value = checkin_map;
		}
		else {
			set ent:last_checkin "test";
		}
	}
}
