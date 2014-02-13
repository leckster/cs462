ruleset Lab3 {
	rule show_form {
		select when pageview ".*"
		pre {
			html = <<
					<p>This is my form...</p>
					>>
		}
		replace_inner("#main", html);
	}
	rule catch_submit {
		select when pageview ".*"
		pre {
			first_name = ent:first_name;
			last_name = ent:last_name;
		}
		if(not ent:fist_name.isnull() && not ent:last_name.isnull()) then {
			notify("Name", "First Name: " + first_name + " Last Name: " + last_name) with sticky = true;
		}
		fired {
			ent:first_name = "Leckie";
			ent:last_name = "Gunter";
		}
	}
	rule clear_name {
		select when pageview ".*"
		pre{
			query = page:url("query");
			name = query.extract(re#(?:^|&)(clear=1)(?:$|&)#);
		}
		if (not name[0].isnull()) then {
			noop();
		}
		fired {
			clear ent:first_name;
			clear ent:last_name;
		}
	}
}
