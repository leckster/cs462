ruleset Lab2 {
  meta {
    name "Lab 2 - Rule Exercise"
    description <<
      Lab 2 Rule Exercise
    >>
    author "Leckie Gunter"
    logging off
  }
  dispatch {
  }
  global {
  }
  rule lab2 {
    select when pageview url re#ktest.heroku.com#
    pre {
      my_html = <<
		
      >>;
    }
    {
		notify(“Welcome!”, “Good morning!”)
    }
  }
}
