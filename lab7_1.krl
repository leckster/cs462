ruleset location_near {
	meta {
		//89D1D9E8-AF16-11E3-9EBD-A6BEE71C24E1
		//https://cs.kobj.net/sky/event/89D1D9E8-AF16-11E3-9EBD-A6BEE71C24E1/0/location/new_current?_rids=b505200x7
		name "Location Near"
		description <<
		  Checks if a checkin is near the stored location in the PDS module
		>>
		author "Leckie Gunter"
		logging on
		
		key twilio {"account_sid" : "ACebfdd735cd36788c41c9a0e1e0a94d4d",
                    "auth_token"  : "ad8b80003b388cf2d31aa50c3738800f"
        }
		
        use module a8x115 alias twilio with twiliokeys = keys:twilio()
		
		//SID:ACebfdd735cd36788c41c9a0e1e0a94d4d
		//AuthToken:ad8b80003b388cf2d31aa50c3738800f
		
	  }
	rule send_text is active{
		select when explicit location_near
		twilio:send_sms("13852041887", "13852357234", event:attr("distance"));
	}
}
