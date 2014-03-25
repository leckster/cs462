ruleset location_near {
	meta {
		name "Location Notification Catcher"
		description <<
		  Receives a location notification event 
		>>
		author "Leckie Gunter"
		logging on
		
		use module a169x701 alias CloudRain
		use module a41x186  alias SquareTag
	  }
	rule location_catch is active{
		select when location notification
		pre {
			checkin_data = event:attr("checkin");
		}
		{
			noop();
		}
		always {
			set ent:checkin checkin_data;
			set ent:test "this fired";
		}
	}
	
	rule location_show {
		select when web cloudAppSelected
		pre {
			checkin_data = ent:checkin;
			checkin_as_string = checkin_data.as("str");
			
			venue = checkin_data.pick("$.venue");
			city = checkin_data.pick("$.city").as("str");
			shout = checkin_data.pick("$.shout").as("str");
			createdAt = checkin_data.pick("$.createdAt");
			
			test = ent:test;
			
			my_html = <<
				<div id="main">
					<div id="checkin_info">
						<p>Venue: #{venue}</p>
						<p>City: #{city}</p>
						<p>Shout: #{shout}</p>
						<p>At: #{createdAt}</p>
						<p>Raw Data: #{checkin_as_string}</p>
						<p>#{test}</p>
					</div>
				</div>
			>>;
		}
		{
			SquareTag:inject_styling();
			CloudRain:createLoadPanel("Latest Checkin Information via CID", {}, my_html);
		}
	}
}
