ruleset rotten_tomatoes {
	global {
		datasource rotten_tomatoes <- "http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=h63rkg3745b4da82xdxbbkrg";
	}
	rule obtain_rating {
		select when pageview url re#imdb.com/title/#
		pre {
			r = http:get(datasource:rotten_tomatoes("&q=thor"));
			title = page:env("title");
		}
		if(true) then {
			notify("Title",title) with sticky = true;
		}
	}
}
