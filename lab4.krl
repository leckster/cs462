ruleset rotten_tomatoes {
	meta {
		name "Rotten Tomatoes"
		description <<
		  Get Data from Rotten Tomatoes
		>>
		author "Leckie Gunter"
		logging off
		use module a169x701 alias CloudRain
		use module a41x186  alias SquareTag
	  }
	global {
		datasource rotten_tomatoes <- "http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=h63rkg3745b4da82xdxbbkrg";
	}
	rule place_form is active {
		select when web cloudAppSelected
		pre {
			my_html = <<
				<div id="main">
					<form id="my_form">
						Title: <input type="text"/><br>
						<input type="submit" value="Submit"/>
					</form>
					<div id="movie_info">Search a movie title to see details.</div>
				</div>
			>>;
		}
		{
			SquareTag:inject_styling();
			CloudRain:createLoadPanel("Use Form to get Rotten Tomato Info", {}, my_html);
			watch("#my_form", "submit");
		}
	}
	rule get_movie_data {
		select when web submit "#my_form"
		pre {
			
		}
		{
			noop();
		}
	}
//	rule obtain_rating {
//		select when pageview url re#imdb.com/title/#
//		pre {
//			r = http:get(datasource:rotten_tomatoes("&q=thor"));
//			title = page:env("title");
//		}
//		if(true) then {
//			notify("Title",title) with sticky = true;
//		}
//	}
}
