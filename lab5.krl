ruleset b505200x4 {
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
			checkin = ent:last_checkin.as("str");
			venue = ent:checkin_venue.pick("$.name").as("str");
			city = ent:checkin_city.as("str");
			createdAt = ent:checkin_created_at.as("str");
			firstName = ent:checkin_fname.as("str");
			lastName = ent:checkin_lname.as("str");
			my_html = <<
				<div id="main">
					<div id="checkin_info">
						<p>Have a user login with foursquare to display data.</p>
						<p>#{checkin}</p>
						<p>#{firstName} #{lastName}</p>
						<p>#{city}</p>
						<p>#{venue}</p>
						<p>#{createdAt}</p>
					</div>
				</div>
			>>;
		}
		{
			SquareTag:inject_styling();
			CloudRain:createLoadPanel("Latest Checkin Information", {}, my_html);
		}
	}
	rule process_fs_checkin is active{
		select when foursquare checkin
		pre {
			checkinString = event:attr("checkin");
			checkin = checkinString.decode();
			venue = checkin.pick("$..venue");
			city = checkin.pick("$..city");
			createdAt = checkin.pick("$..createdAt");

			fname = checkin.pick("$..firstName");
			lname = checkin.pick("$..lastName");
		}
		if(checkin) then {
			noop();
		}
		fired {
			set ent:last_checkin checkinString;
			set ent:checkin_venue venue;
			set ent:checkin_city city;
			set ent:checkin_created_at createdAt;
			set ent:checkin_fname fname;
			set ent:checkin_lname lname;
		}
		else {
			set ent:last_checkin "test";
		}
	}
}
