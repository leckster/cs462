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
			name = query.extract(re#(?:^|&)name=(\w+)#);
		}
		if (not name.isnull()) then {
			notify("Welcome ", "Welcome: " + name[0]) with sticky = true;
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
