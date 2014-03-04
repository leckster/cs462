ruleset rotten_tomatoes {
	meta {
		//channel ID:13290550-9FC1-11E3-A8F0-B731B3AA5552
		//event ID:0
		//domain: foursquare
		//type: checkin
		//?_rid=
		name "Foursquare Checkin"
		description <<
		  Update based on foursquare checkins
		>>
		author "Leckie Gunter"
		logging off
		use module a169x701 alias CloudRain
		use module a41x186  alias SquareTag
	  }
	global {
		
	}
	rule display_checkin is active {
		select when web cloudAppSelected
		pre {
			checkin = ent:last_checkin;
		}
		if(checkin) then {
			notify("Checkin exists", checkin);
		}
	}
	rule process_fs_checkin {
		select when foursquare checkin
		pre {
			checkin = event:attr("checkin");
		}
		if(checkin) then {
			noop();
		}
		fired {
			set ent:last_checkin checkin;
		}
	}
}
