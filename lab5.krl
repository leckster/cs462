ruleset rotten_tomatoes {
	meta {
		//channel ID:13290550-9FC1-11E3-A8F0-B731B3AA5552
		//event ID:0
		//domain: foursquare
		//type: checkin
		//?_rid=
		name "Rotten Tomatoes"
		description <<
		  Update based on foursquare checkins
		>>
		author "Leckie Gunter"
		logging off
		use module a169x701 alias CloudRain
		use module a41x186  alias SquareTag
	  }
	global {
	
	rule update_checkin_info {
		select when foursqure checkin
		pre {
			title = event:attr("title");
			html = <<
				<h2>Movie Not Found</h2>
				<p>You searched:#{title}</p>
			>>
		}
		{
			replace_inner("#movie_info", html);
		}
	}
}
