ruleset Lab2 {
  
  rule lab2 {
    select when pageview ".*"
		notify(“Welcome!”, “Good morning!”)
  }
}
