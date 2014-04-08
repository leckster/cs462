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
		if (not name[0].isnull()) then {
			notify("Welcome ", "Welcome: " + name[0]) with sticky = true;
		}
		fired {
			raise explicit event one;
		} else {
			raise explicit event zero;
		}
	}
	rule rule3 {
		select when explicit zero
		notify ("Welcome", "Welcome Monkey") with sticky = true;
	}
	rule count {
		select when pageview ".*"
		pre {
			count = ent:visitor_count + 1;
		}
		if( ent:visitor_count < 5) then {
			notify("Count", "The count is: " + count) with sticky = true;
		}
		fired {
			ent:visitor_count += 1 from 1;
		}
	}
	rule clear_count {
		select when pageview ".*"
		pre{
			query = page:url("query");
			name = query.extract(re#(?:^|&)(clear)=(?:\w+)#);
		}
		if (not name[0].isnull()) then {
			noop();
		}
		fired {
			clear ent:visitor_count;
		}
	}
}
