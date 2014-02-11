ruleset Lab2 {
  
  rule lab2 {
    select when pageview ".*"
	notify("Welcome!", "Good morning!") with sticky = true;
	notify("Second Notification box", "Good afternoon!") with sticky = true;
  }
}
