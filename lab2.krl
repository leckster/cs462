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
			notify("Welcome Monkey", "Query: " + query) with sticky = true;
		}
		fired {
			last
		}
	}
	rule rule3 {
		select when pageview ".*"
		notify ("Hello", "Hello Monkey") with sticky = true;
	}
}
