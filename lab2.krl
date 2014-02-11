ruleset Lab2 {
	
	
	rule rule1 
		select when pageview ".*" {
			notify("Welcome!", "Good morning!") with sticky = true;
			notify("Second Notification box", "Good afternoon!") with sticky = true;
		}
	}
	
}
