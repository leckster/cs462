ruleset location_data {
	meta {
		name "Foursquare Data"
		description <<
		  Store data for foursquare checkins
		>>
		author "Leckie Gunter"
		logging on
		
		provides get_location_data
	  }
	global {
		get_location_data = function(key) {
			CheckinData = app:CheckinData || {};
			CheckinData{key}
		}
	}
	rule add_location_item {
		select when pds new_location_data
		pre {
			key = event:param("key");
			value = event:param("value");
			//new_map = {key.as("str") : value.as("str")};
			new_map = {"fs_checkin" : value.as("str")};
			CheckinData = app:CheckinData || {};
        }
        always {
            set app:CheckinData CheckinData.put(new_map);
			set app:CheckinData CheckinData.put({"test" : "THIS IS A TEST"});
        }
	}
}
