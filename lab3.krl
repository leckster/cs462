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
		}
		{
			replace_inner("#main", html);
			watch("#my_form", "submit");
		}
	}
	
	rule catch_submit {
		select when web click "#submit_button"
		pre {
			first_name = event:attr("first_name");
			last_name = event:attr("last_name");
		}
		{
			notify("Button Clicked", "HI " + first_name + " " + last_name) with sticky = true;
		}
	}
//	rule catch_submit {
//		select when pageview ".*"
//		pre {
//			first_name = ent:first_name || "";
//			last_name = ent:last_name || "";
//		}
//		if(not first_name eq "" || not last_name eq "") then {
//			notify("Name", "First Name: " + first_name + " Last Name: " + last_name) with sticky = true;
//		}
////		if(true) then {
////			notify ("HELLO", "HELLO") with sticky = true;
////		}
//		fired {
//			ent:first_name = "Leckie";
//			ent:last_name = "Gunter";
//		}
//	}
//	rule clear_name {
//		select when pageview ".*"
//		pre{
//			query = page:url("query");
//			clear = query.extract(re#(?:^|&)(clear=1)(?:$|&)#);
//		}
//		if (not clear[0].isnull()) then {
//			noop();
//		}
//		fired {
//			clear ent:first_name;
//			clear ent:last_name;
//		}
//	}
}
