ruleset b505200x4 {
	meta {
		//channel ID:13290550-9FC1-11E3-A8F0-B731B3AA5552
		//event ID:0
		//domain: foursquare
		//type: checkin
		//?_rid=
		//https://cs.kobj.net/sky/event/13290550-9FC1-11E3-A8F0-B731B3AA5552/0/foursquare/checkin?_rids=b505200x4
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
		subscription_maps = [
			{
				//"name": "Leckster+1",
				"cid": "58E287B0-B42F-11E3-954D-DEC687B7806A"
			},
			{
				//"name": "Leckster+2",
				"cid": "5C88DE46-B42F-11E3-B404-D9A9AD931101"
			}
		];
	}
	rule display_checkin is active {
		select when web cloudAppSelected
		pre {
			venue = ent:checkin_venue.pick("$.name").as("str");
			city = ent:checkin_city.as("str");
			createdAt = ent:checkin_created_at.as("str");
			shout = ent:checkin_shout.as("str");
			firstName = ent:checkin_fname.as("str");
			lastName = ent:checkin_lname.as("str");
			
			cid = ent:sub_map;
			my_html = <<
				<div id="main">
					<div id="checkin_info">
						<p>Name: #{firstName} #{lastName}</p>
						<p>City: #{city}</p>
						<p>Venue: #{venue}</p>
						<p>Shout: #{shout}</p>
						<p>At: #{createdAt}</p>
						<p>CID: #{cid}</p>
					</div>
				</div>
			>>;
		}
		{
			SquareTag:inject_styling();
			CloudRain:createLoadPanel("Latest Checkin Information", {}, my_html);
		}
	}
	rule dispatch is active{
		select when foursquare checkin
			foreach subscription_maps setting (sub_map)
				pre {
					checkinString = event:attr("checkin");
					checkin = checkinString.decode();
					venue = checkin.pick("$..venue");
					city = checkin.pick("$..city");
					shout = checkin.pick("$..shout");
					createdAt = checkin.pick("$..createdAt");
					lat = checkin.pick("$..lat");
					lng = checkin.pick("$..lng");

					cid = sub_map.pick("$..cid");
				}
				{
					event:send(sub_map, "location", "notification") with attrs = {
						"venue" : venue.pick("$.name"),
						"city" : city,
						"shout" : shout,
						"createdAt" : createdAt,
						"lat" : lat,
						"lng" : lng
					};
				}
				always {
					set ent:sub_map cid;
				}
	}
	rule process_fs_checkin is active{
		select when foursquare checkin
		pre {
			checkinString = event:attr("checkin");
			checkin = checkinString.decode();
			venue = checkin.pick("$..venue");
			city = checkin.pick("$..city");
			shout = checkin.pick("$..shout");
			createdAt = checkin.pick("$..createdAt");
			lat = checkin.pick("$..lat");
			lng = checkin.pick("$..lng");
			
			checkin_map = {
				"venue" : venue.pick("$.name"),
				"city" : city,
				"shout" : shout,
				"createdAt" : createdAt,
				"lat" : lat,
				"lng" : lng
			};

			fname = checkin.pick("$..firstName");
			lname = checkin.pick("$..lastName");
		}
		if(checkin) then {
			send_directive(venue.pick("$.name")) with key = "checkin" and value = venue.pick("$.name");

		}
		fired {
			//Modify the process_fs_checkin rule from the Foursquare Checkin exercise to raise a pds:new_location_data event 
			//the key attribute should be fs_checkin and 
			//the value attribute should be a map with the venue, city, shout, and createdAt event attributes. 
			set ent:checkin_venue venue;
			set ent:checkin_city city;
			set ent:checkin_shout shout;
			set ent:checkin_created_at createdAt;
			set ent:checkin_fname fname;
			set ent:checkin_lname lname;
			
			raise pds event new_location_data for b505200x5 with key = "fs_checkin" and value = checkin_map;
		}
		else {
			set ent:last_checkin "test";
		}
	}
}
