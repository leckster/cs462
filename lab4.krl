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
						Title: <input type="text" name="input_title"/><br>
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
//	Movie thumbnail
//	Title
//	Release Year
//	Synopsis
//	Critic ratings
//	and other data you find interesting. 
	rule get_movie_data {
		select when web submit "#my_form"
		pre {
			input_title = event:attr("input_title");
			dataString = getRTMovieData(input_title);
			//dataString = data.as("str");
			
			title = dataString.pick("$.title").as("str");
			synopsis = dataString.pick("$..synopsis").as("str");
			mpaa_rating = dataString.pick("$..mpaa_rating").as("str");
			release_date = dataString.pick("$..release_dates.theater").as("str");
			thumbnail = dataString.pick("$..posters.thumbnail").as("str");
			
			ratings = dataString.pick("$..ratings");
			
			critic_rating = ratings.pick("$.critics_rating").as("str");
			critic_score = ratings.pick("$.critics_score").as("str");
			audience_rating = ratings.pick("$.audience_rating").as("str");
			audience_score = ratings.pick("$.audience_score").as("str");


			movie_html = <<
					<h2>Movie Data:</h2>
					<p>
						<img src=#{thumbnail}></img>
					</p>
					<h3>#{title}</h3>
					<p>Release Date:#{release_date}</p>	
					<p>MPAA Rating: #{mpaa_rating}</p>
					<p>#{synopsis}</p>
					<div id="critic_review">
						<h3>Critics Said:</h3>
						<p>Critic Rating:#{critic_rating}</p>
						<p>Critic Score:#{critic_score}</p>
					</div>
					<div id="audience_review">
						<h3>Audience Said:</h3>
						<p>Audience Rating:#{audience_rating}</p>
						<p>Audience Score:#{audience_score}</p>
					</div>
				>>;
		}
		{
			replace_inner("#movie_info", movie_html);
		}
	}
}
