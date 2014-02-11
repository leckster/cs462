ruleset Lab2 {
	rule rule1 {
		select when pageview ".*" {
			notify("Welcome!", "Good morning!") with sticky = true;
			notify("Second Notification box", "Good afternoon!") with sticky = true;
		}
	}
	rule rule2 {
		select when pageview ".*"
		pre {
			query = page:url("query");
		}
		if (not query.isnull()) then {
			name = query.extract(re#(\?|\&){1}name=([a-zA-Z]+)\&?#);
			
			notify("Welcome ", "Welcome: " + name) with sticky = true;
		}
		fired {
			last
		}
	}
	rule rule3 {
		select when pageview ".*"
		notify ("Welcome", "Welcome Monkey") with sticky = true;
	}
}
