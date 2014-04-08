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
			venue = event:attr("venue");
			city = event:attr("city");
			shout = event:attr("shout");
			createdAt = event:attr("createdAt");
		}
		{
			noop();
		}
		always {
			set ent:venue venue;
			set ent:city city;
			set ent:shout shout;
			set ent:createdAt createdAt;
			
			set ent:test "this fired again";
		}
	}
	
	rule location_show {
		select when web cloudAppSelected
		pre {
			
			venue = ent:venue;
			city = ent:city;
			shout = ent:shout;
			createdAt = ent:createdAt;
			
			test = ent:test;
			
			my_html = <<
				<div id="main">
					<div id="checkin_info">
						<p>Venue: #{venue}</p>
						<p>City: #{city}</p>
						<p>Shout: #{shout}</p>
						<p>At: #{createdAt}</p>
						<p>#{test}</p>
					</div>
				</div>
			>>;
		}
		{
			SquareTag:inject_styling();
			CloudRain:createLoadPanel("Latest Checkin Information via Channel 2", {}, my_html);
		}
	}
}
