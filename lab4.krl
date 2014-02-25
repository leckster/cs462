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
		apikey = "h63rkg3745b4da82xdxbbkrg";
		getRTMovieData = function(title) {
			data =  http:get("http://api.rottentomatoes.com/api/public/v1.0/movies.json",{
				"apikey":apikey, 
				"q":title,
				"page_limit": 1
			});
			content = data.pick("$.content").decode();
			movies = content.pick("$.movies");
			movie = movies[0];
			movie
		}
	}
	rule place_form is active {
		select when web cloudAppSelected
		pre {
			my_html = <<
				<div id="main">
					<form id="my_form">
						Title: <input type="text" name="title"/><br>
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
			title = get(event:attr("title"));
		}
		{
			replace_inner("#movie_info", getRTMovieData(title));
			notify("Title", title) with sticky = true;
		}
	}
}
