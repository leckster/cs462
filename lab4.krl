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
			  <h5>Hello, world!</h5>
			>>;
		}
		{
			SquareTag:inject_styling();
			CloudRain:createLoadPanel("Hello World!", {}, my_html);
			replace_inner("#main", html);
			watch("#my_form", "submit");
		}
	}
//	rule get_movie_data {
//		select when web submit "#my_form"
//		pre {
//			
//		}
//		{
//			
//		}
//	}
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
