ruleset examine_location {
	meta {
		name "Foursquare Data"
		description <<
		  Store data for foursquare checkins
		>>
		author "Leckie Gunter"
		logging on
		
		use module a169x701 alias CloudRain
		use module a41x186  alias SquareTag
		use module b505200x5 alias location_data
	  }
	global {
	}
	rule show_fs_location {
		select when web cloudAppSelected
		pre {
			checkin_data = location_data:get_location_data("fs_checkin");
			checkin_as_string = checkin_data.as("str");
			venue = checkin_data.pick("$.venue");
			city = checkin_data.pick("$.city").as("str");
			shout = checkin_data.pick("$.shout").as("str");
			createdAt = checkin_data.pick("$.createdAt");
			my_html = <<
				<div id="main">
					<div id="checkin_info">
						<p>Venue: #{venue}</p>
						<p>City: #{city}</p>
						<p>Shout: #{shout}</p>
						<p>At: #{createdAt}</p>
						<p>Raw Data: #{checkin_as_string}</p>
					</div>
				</div>
			>>;
//			my_html = <<
//				<div id="main">
//					<p>#{checkin_data}</p>
//					<p>BLKDJOBIJDF</p>
//				</div>
//			>>;
		}
		{
			SquareTag:inject_styling();
			CloudRain:createLoadPanel("Latest Checkin Information Via Data Module", {}, my_html);
		}
	}
}
