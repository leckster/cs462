ruleset Lab3 {
	rule show_form {
		select when pageview ".*"
		pre {
			html = <<
				<p>This is my form</p>
				<form id="my_form" onsubmit="return false">
					First Name<input type="text" name="first_name"><br>
					Last Name<input type="text" name="last_name"><br>
					<input type="submit" value="Submit">
				</form>
			>>;
			first_name = ent:first_name || "";
			last_name = ent:last_name || "";
			
		}
		
		if(not first_name eq "" && not last_name eq "") then {
			replace_inner("#main", html);
			append("#main", "<p>#{first_name} #{last_name}</p>");
			watch("#my_form", "submit");
		}
	}
	
	rule catch_submit {
		select when web submit "#my_form"
		pre {
			ent:first_name = event:attr("first_name");
			ent:last_name = event:attr("last_name");
		}
		{
			notify("Button Clicked", "HI #{first_name} #{last_name}") with sticky = true;
		}
	}
	
	rule clear_name {
		select when pageview ".*"
		pre{
			query = page:url("query");
			clear = query.extract(re#(?:^|&)(clear=1)(?:$|&)#);
		}
		if (not clear[0].isnull()) then {
			noop();
		}
		fired {
			clear ent:first_name;
			clear ent:last_name;
		}
	}
}
