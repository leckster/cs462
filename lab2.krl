ruleset Lab2 {
	
	
	rule rule1 {
		select when pageview ".*" {
			notify("Welcome!", "Good morning!") with sticky = true;
			notify("Second Notification box", "Good afternoon!") with sticky = true;
		}
	}
	rule rule3 {
		select when pageview ".*"
		pre {
			query = page:url("query")
		} 
		if (true) then {
			notify("Welcome Monkey: " + query) with sticky = true;
		}
	}
}
