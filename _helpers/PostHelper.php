<?php
namespace Codeception\Module;

// here you can define custom functions for PostGuy 

class PostHelper extends \Codeception\Module
{

	function confirmPostCount($resp, $count)
	{
		$posts = json_decode($resp, true);
		$this->assertEquals($count,count($posts['posts']), "There are {$count} posts in the response");
	}
	
	function postsArray()
	{
		$posts = array();
		$posts[11626] = array();
		$post = &$posts[11626];
		$post['externals'] = array();
		$post['locations'][0]['location_id'] = 5238;
		$post['locations'][0]['fsq_venue_id'] = "";
		$post['locations'][0]['geometry']['type'] = "Point";
		$post['locations'][0]['geometry']['coordinates'][0] = "30.43212890625";
		$post['locations'][0]['geometry']['coordinates'][1] = "-17.936928637549";
		$post['locations'][0]['geometry']['coordinates'][1] = "-17.936928637549";
		$post['locations'][0]['name'] = "Zvimba West";
		$post['locations'][0]['region'] = "";
		$post['maps'] = array();
		$post['media'] = array();
		$post['post_id'] = 11626;
		$post['users'][0]['user_id'] = 3063;
		$post['users'][0]['crowdmap_id'] = "27ee58b40ae7e5b671723b157f05477c1cde9590a9ff1fb5423be1d2787e465b7d3bcc17ec8a0a828f94f43f7b769a358dceea94a74c8491cce4a588a7826d33";
		$post['users'][0]['crowdmap_id_h'] = "19ed35e3a0ab8cdd480bcb78e06b464f";
		$post['users'][0]['username'] = "voazimbabwe";
		$post['users'][0]['name'] = "Zimbabwe 2013: What Are You Seeing?";
		$post['users'][0]['bio'] = "Gathered from across Zimbabwe, this map displays election-related reports from citizens like you. If polling in your area looks peaceful, troubling, or something in between, E-mail us at studio7@voanews.com or text us (SMS or WhatsApp) at 001-202-465-0318.";
		$post['users'][0]['plus'] = false;
		$post['users'][0]['baselayer'] = "esri_natgeo";
		$post['users'][0]['instagram_auto_post'] = false;
		$post['users'][0]['twitter_auto_post'] = true;
		$post['users'][0]['twitter_auto_post_retweets'] = false;
		$post['users'][0]['date_registered'] = 1374698526;
		$post['users'][0]['banned'] = false;
		$post['users'][0]['sms_number'] = false;
		$post['users'][0]['sms_confirmed'] = false;
		$post['users'][0]['avatar'] = null;
		$post['owner_map_id'] = 0;
		$post['media_id'] = 0;
		$post['location_id'] = 5238;
		$post['external_id'] = 0;
		$post['externals_images_id'] = 0;
		$post['app_id'] = 1;
		$post['message'] = "<p>Thank you guys for balanced news we are tired of zbc biased news that only cover Zanu Pf rallies.Right now i am in my constiency,Zvimba west and so far there are no reports of political violence except hate speech that has become the theme song of Zanu PF election campaign,for instance i attended a Zanu PF rally where a certain Cde Paraquat(not his real name) told people at the rally that i qoute 'ini paraquat handirove (vanhu ve Mdc) ndinobhabhatidza) I dont beat up opposition party supporters but i baptise'.God knows what he meant.I will continue updating on what is happening as we head to Wednesday.</p>";
		$post['date_posted'] = 1375156718;
		$post['public'] = true;
		$post['forig_shortcode'] = null;
		$post['autoposted'] = "0";
		$post['date_updated'] = 1398295077;
		$post['owner']['type'] = "user";
		$post['owner']['name'] = "Zimbabwe 2013: What Are You Seeing?";
		$post['owner']['url'] = "/user/voazimbabwe";
		$post['permissions']['edit'] = false;
		$post['permissions']['delete'] = false;
		$post['stub'] = "thank-you-guys-for-balanced-news-we-are-tired-of-zbc";
		$post['tags'] = array();
		$post['likes'] = array();
		$post['comments'] = array();

		$posts[11627] = array();
		$post = &$posts[11627];
		$post['externals'][0]['external_id'] = 5177;
		$post['externals'][0]['service_id'] = 1;
		$post['externals'][0]['provider'] = "Twitter";
		$post['externals'][0]['type'] = "html";
		$post['externals'][0]['id_on_service'] = "362059606781984768";
		$post['externals'][0]['content'] = "RT @verynicetweets: Our #verynice guide for #nonProfit business development just got to its 6th continent within 72 hours of launch: http:/…";
		$post['externals'][0]['datetime'] = 1375156711;
		$post['externals'][0]['lat'] = null;
		$post['externals'][0]['lon'] = null;
		$post['externals'][0]['url'] = "https://twitter.com/LA2050/statuses/362059606781984768";
		$post['externals'][0]['title'] = null;
		$post['externals'][0]['favicon_url'] = "https://twitter.com/favicons/favicon.ico";
		$post['externals'][0]['embed_html'] = "<blockquote class=\"twitter-tweet\"><p>Our <a href=\"https://twitter.com/search?q=%23verynice&amp;src=hash\">#verynice</a> guide for <a href=\"https://twitter.com/search?q=%23nonProfit&amp;src=hash\">#nonProfit</a> business development just got to its 6th continent within 72 hours of launch: <a href=\"http://t.co/UY0u7woGNt\">http://t.co/UY0u7woGNt</a></p>&mdash; Matthew Manos (@verynicetweets) <a href=\"https://twitter.com/verynicetweets/statuses/362058254773264384\">July 30, 2013</a></blockquote>\n";
		$post['externals'][0]['images'] = array();
		$post['locations'] = array();
		$post['maps'] = array();
		$post['media'] = array();
		$post['post_id'] = 11627;
		$post['users'][0]['user_id'] = 785;
		$post['users'][0]['crowdmap_id'] = "a32c8f9bdff8bdfd1dd87fe2fa613e359061aa9230ecb53b5c6b895a494eb1752092d208afbced4ca7627f29e5e71c7ab8890e52361adc74b6c22fe58c5af059";
		$post['users'][0]['crowdmap_id_h'] = "5e7d3c00e9d449bab949e2b2bc90ecba";
		$post['users'][0]['username'] = "shaunanep";
		$post['users'][0]['name'] = "LA2050";
		$post['users'][0]['bio'] = "Together, shaping the future of Los Angeles.";
		$post['users'][0]['plus'] = false;
		$post['users'][0]['baselayer'] = "crowdmap_satellite";
		$post['users'][0]['instagram_auto_post'] = true;
		$post['users'][0]['twitter_auto_post'] = true;
		$post['users'][0]['twitter_auto_post_retweets'] = false;
		$post['users'][0]['date_registered'] = 1368293462;
		$post['users'][0]['banned'] = false;
		$post['users'][0]['sms_number'] = false;
		$post['users'][0]['sms_confirmed'] = false;
		$post['users'][0]['avatar'] = null;
		$post['owner_map_id'] = 0;
		$post['media_id'] = 0;
		$post['location_id'] = 0;
		$post['external_id'] = 5177;
		$post['externals_images_id'] = 0;
		$post['app_id'] = 1;
		$post['message'] = "";
		$post['date_posted'] = 1375156711;
		$post['public'] = true;
		$post['forig_shortcode'] = null;
		$post['autoposted'] = "0";
		$post['date_updated'] = 1375156711;
		$post['owner']['type'] = "user";
		$post['owner']['name'] = "LA2050";
		$post['owner']['url'] = "/user/shaunanep";
		$post['permissions']['edit'] = false;
		$post['permissions']['delete'] = false;
		$post['stub'] = "";
		$post['tags'] = array();
		$post['likes'] = array();
		$post['comments'] = array();

		$posts[11628] = array();
		$post = &$posts[11628];
		$post['externals'][0]['external_id'] = 5178;
		$post['externals'][0]['service_id'] = 1;
		$post['externals'][0]['provider'] = "Twitter";
		$post['externals'][0]['type'] = "html";
		$post['externals'][0]['id_on_service'] = "362059594245214209";
		$post['externals'][0]['content'] = "RT @MetroLibrary: Streetsblog Summer Series Rolls with Mega-Discussion on Bicycling in L.A. http://t.co/qhRWUYE7VC via @streetsblogla";
		$post['externals'][0]['datetime'] = 1375156708;
		$post['externals'][0]['lat'] = null;
		$post['externals'][0]['lon'] = null;
		$post['externals'][0]['url'] = "https://twitter.com/LA2050/statuses/362059594245214209";
		$post['externals'][0]['title'] = null;
		$post['externals'][0]['favicon_url'] = "https://twitter.com/favicons/favicon.ico";
		$post['externals'][0]['embed_html'] = "<blockquote class=\"twitter-tweet\"><p>Streetsblog Summer Series Rolls with Mega-Discussion on Bicycling in L.A. <a href=\"http://t.co/qhRWUYE7VC\">http://t.co/qhRWUYE7VC</a> via <a href=\"https://twitter.com/StreetsblogLA\">@streetsblogla</a></p>&mdash; Metro Library (@MetroLibrary) <a href=\"https://twitter.com/MetroLibrary/statuses/362058235403976704\">July 30, 2013</a></blockquote>\n";
		$post['externals'][0]['images'] = array();
		$post['locations'] = array();
		$post['maps'] = array();
		$post['media'] = array();
		$post['post_id'] = 11628;
		$post['users'][0]['user_id'] = 785;
		$post['users'][0]['crowdmap_id'] = "a32c8f9bdff8bdfd1dd87fe2fa613e359061aa9230ecb53b5c6b895a494eb1752092d208afbced4ca7627f29e5e71c7ab8890e52361adc74b6c22fe58c5af059";
		$post['users'][0]['crowdmap_id_h'] = "5e7d3c00e9d449bab949e2b2bc90ecba";
		$post['users'][0]['username'] = "shaunanep";
		$post['users'][0]['name'] = "LA2050";
		$post['users'][0]['bio'] = "Together, shaping the future of Los Angeles.";
		$post['users'][0]['plus'] = false;
		$post['users'][0]['baselayer'] = "crowdmap_satellite";
		$post['users'][0]['instagram_auto_post'] = true;
		$post['users'][0]['twitter_auto_post'] = true;
		$post['users'][0]['twitter_auto_post_retweets'] = false;
		$post['users'][0]['date_registered'] = 1368293462;
		$post['users'][0]['banned'] = false;
		$post['users'][0]['sms_number'] = false;
		$post['users'][0]['sms_confirmed'] = false;
		$post['users'][0]['avatar'] = null;
		$post['owner_map_id'] = 0;
		$post['media_id'] = 0;
		$post['location_id'] = 0;
		$post['external_id'] = 5178;
		$post['externals_images_id'] = 0;
		$post['app_id'] = 1;
		$post['message'] = "";
		$post['date_posted'] = 1375156708;
		$post['public'] = true;
		$post['forig_shortcode'] = null;
		$post['autoposted'] = "0";
		$post['date_updated'] = 1375156708;
		$post['owner']['type'] = "user";
		$post['owner']['name'] = "LA2050";
		$post['owner']['url'] = "/user/shaunanep";
		$post['permissions']['edit'] = false;
		$post['permissions']['delete'] = false;
		$post['stub'] = "";
		$post['tags'] = array();
		$post['likes'] = array();
		$post['comments'] = array();
		
		$posts[11625] = array();
		$post = &$posts[11625];
		$post['externals'][0]['external_id'] = 5176;
		$post['externals'][0]['service_id'] = 1;
		$post['externals'][0]['provider'] = "Twitter";
		$post['externals'][0]['type'] = "html";
		$post['externals'][0]['id_on_service'] = "362058437502304257";
		$post['externals'][0]['content'] = "Hoy, por cierto @getur, me dice un trekkie: \"Este Khan me gustó por bla bla bla\", mientra que yo gritaba como Kirk: Se me olvidó el estreno.";
		$post['externals'][0]['datetime'] = 1375156432;
		$post['externals'][0]['lat'] = null;
		$post['externals'][0]['lon'] = null;
		$post['externals'][0]['url'] = "https://twitter.com/mamanzana/statuses/362058437502304257";
		$post['externals'][0]['title'] = null;
		$post['externals'][0]['favicon_url'] = "https://twitter.com/favicons/favicon.ico";
		$post['externals'][0]['embed_html'] = "<blockquote class=\"twitter-tweet\"><p>Hoy, por cierto <a href=\"https://twitter.com/getur\">@getur</a>, me dice un trekkie: &quot;Este Khan me gustó por bla bla bla&quot;, mientra que yo gritaba como Kirk: Se me olvidó el estreno.</p>&mdash; Marcos Manzanares (@mamanzana) <a href=\"https://twitter.com/mamanzana/statuses/362058437502304257\">July 30, 2013</a></blockquote>\n";
		$post['externals'][0]['images'] = array();
		$post['locations'] = array();
		$post['maps'] = array();
		$post['media'] = array();
		$post['post_id'] = 11625;
		$post['users'][0]['user_id'] = 1947;
		$post['users'][0]['crowdmap_id'] = "4329e6adaeda86b213385fb097acf6662db32d46bb04eaca99aecf5b0454b29686ebc02c9942bdc7dac0652880005a94e88b6088e02bd46968ae992488748e64";
		$post['users'][0]['crowdmap_id_h'] = "c333651c397909a86a2c60a4ea026644";
		$post['users'][0]['username'] = "mamanzana";
		$post['users'][0]['name'] = "Marcos Manzanares";
		$post['users'][0]['bio'] = "";
		$post['users'][0]['plus'] = false;
		$post['users'][0]['baselayer'] = "crowdmap_satellite";
		$post['users'][0]['instagram_auto_post'] = false;
		$post['users'][0]['twitter_auto_post'] = true;
		$post['users'][0]['twitter_auto_post_retweets'] = false;
		$post['users'][0]['date_registered'] = 1371481870;
		$post['users'][0]['banned'] = false;
		$post['users'][0]['sms_number'] = false;
		$post['users'][0]['sms_confirmed'] = false;
		$post['users'][0]['avatar'] = null;
		$post['owner_map_id'] = 0;
		$post['media_id'] = 0;
		$post['location_id'] = 0;
		$post['external_id'] = 5176;
		$post['externals_images_id'] = 0;
		$post['app_id'] = 1;
		$post['message'] = "";
		$post['date_posted'] = 1375156432;
		$post['public'] = true;
		$post['forig_shortcode'] = null;
		$post['autoposted'] = "0";
		$post['date_updated'] = 1375156432;
		$post['owner']['type'] = "user";
		$post['owner']['name'] = "Marcos Manzanares";
		$post['owner']['url'] = "/user/mamanzana";
		$post['permissions']['edit'] = false;
		$post['permissions']['delete'] = false;
		$post['stub'] = "";
		$post['tags'] = array();
		$post['likes'] = array();
		$post['comments'] = array();		

		$posts[11624] = array();
		$post = &$posts[11624];
		$post['externals'] = array();
		$post['locations'][0]['location_id'] = 5239;
		$post['locations'][0]['fsq_venue_id'] = "";
		$post['locations'][0]['geometry']['type'] = "Point";
		$post['locations'][0]['geometry']['coordinates'][0] = 31.673583984375;
		$post['locations'][0]['geometry']['coordinates'][1] = -21.028109978643;
		$post['locations'][0]['name'] = "Chiredzi";
		$post['locations'][0]['region'] = "";
		$post['maps'] = array();
		$post['media'] = array();
		$post['post_id'] = 11624;
		$post['users'][0]['user_id'] = 6657;
		$post['users'][0]['crowdmap_id'] = "6d017506671d5e5d6bbd14c2ce0159713f106c5b75208ad4d2540683026801afd2f0c79ee339f2584bcd7306f0bb6a8cd681aa9f1ad7d4be3c6c881f32efc0af";
		$post['users'][0]['crowdmap_id_h'] = "0006a0b51df6fb5e8378e80b1caa1dd0";
		$post['users'][0]['username'] = "zackhalloran";
		$post['users'][0]['name'] = "Zachary Halloran";
		$post['users'][0]['bio'] = "";
		$post['users'][0]['plus'] = false;
		$post['users'][0]['baselayer'] = "crowdmap_satellite";
		$post['users'][0]['instagram_auto_post'] = false;
		$post['users'][0]['twitter_auto_post'] = false;
		$post['users'][0]['twitter_auto_post_retweets'] = false;
		$post['users'][0]['date_registered'] = 1389679540;
		$post['users'][0]['banned'] = false;
		$post['users'][0]['sms_number'] = false;
		$post['users'][0]['sms_confirmed'] = false;
		$post['users'][0]['avatar'] = "https://www.gravatar.com/avatar/62502587065b90b5c1ee581e9952e4b0?r=PG&s=200&d=404";
		$post['owner_map_id'] = 0;
		$post['media_id'] = 0;
		$post['location_id'] = 5239;
		$post['external_id'] = 0;
		$post['externals_images_id'] = 0;
		$post['app_id'] = 1;
		$post['message'] = "<p>I'm in RSA but iv a sister who lives it Chiredzi she is saying the situation iv very stable as compared to 2008. But Zanu pf is developing last min jitters and starting last minute intimidations but on a small scale. She said at one meeting they were forced to attend by Zanu pf they were told that even if MDC wins they wd rig the elections in their favour lyk they did in 2008.</p>";
		$post['date_posted'] = 1375155698;
		$post['public'] = true;
		$post['forig_shortcode'] = null;
		$post['autoposted'] = "0";
		$post['date_updated'] = 1375155698;
		$post['owner']['type'] = "user";
		$post['owner']['name'] = "Zachary Halloran";
		$post['owner']['avatar'] = "https://www.gravatar.com/avatar/62502587065b90b5c1ee581e9952e4b0?r=PG&s=200&d=404";
		$post['owner']['url'] = "/user/zackhalloran";
		$post['permissions']['edit'] = false;
		$post['permissions']['delete'] = false;
		$post['stub'] = "im-in-rsa-but-iv-a-sister-who-lives-it-chiredzi-she";
		$post['tags'] = array();
		$post['likes'] = array();
		$post['comments'] = array();
		

		$posts[11623] = array();
		$post = &$posts[11623];
		$post['externals'] = array();
		$post['locations'][0]['location_id'] = 5236;
		$post['locations'][0]['fsq_venue_id'] = "";
		$post['locations'][0]['geometry']['type'] = "Point";
		$post['locations'][0]['geometry']['coordinates'][0] = 31.335754394531;
		$post['locations'][0]['geometry']['coordinates'][1] = -17.285086527937;
		$post['locations'][0]['name'] = "";
		$post['locations'][0]['region'] = "";
		$post['maps'] = array();
		$post['media'] = array();
		$post['post_id'] = 11623;
		$post['users'][0]['user_id'] = 3063;
		$post['users'][0]['crowdmap_id'] = "27ee58b40ae7e5b671723b157f05477c1cde9590a9ff1fb5423be1d2787e465b7d3bcc17ec8a0a828f94f43f7b769a358dceea94a74c8491cce4a588a7826d33";
		$post['users'][0]['crowdmap_id_h'] = "19ed35e3a0ab8cdd480bcb78e06b464f";
		$post['users'][0]['username'] = "voazimbabwe";
		$post['users'][0]['name'] = "Zimbabwe 2013: What Are You Seeing?";
		$post['users'][0]['bio'] = "Gathered from across Zimbabwe, this map displays election-related reports from citizens like you. If polling in your area looks peaceful, troubling, or something in between, E-mail us at studio7@voanews.com or text us (SMS or WhatsApp) at 001-202-465-0318.";
		$post['users'][0]['plus'] = false;
		$post['users'][0]['baselayer'] = "esri_natgeo";
		$post['users'][0]['instagram_auto_post'] = false;
		$post['users'][0]['twitter_auto_post'] = true;
		$post['users'][0]['twitter_auto_post_retweets'] = false;
		$post['users'][0]['date_registered'] = 1374698526;
		$post['users'][0]['banned'] = false;
		$post['users'][0]['sms_number'] = false;
		$post['users'][0]['sms_confirmed'] = false;
		$post['users'][0]['avatar'] = null;
		$post['owner_map_id'] = 0;
		$post['media_id'] = 0;
		$post['location_id'] = 5236;
		$post['external_id'] = 0;
		$post['externals_images_id'] = 0;
		$post['app_id'] = 1;
		$post['message'] = "<p>In Bindura area there were sporadic instances of violence at kcc church farm and in bindura south but the culprits remain at large.</p>";
		$post['date_posted'] = 1375155513;
		$post['public'] = true;
		$post['forig_shortcode'] = null;
		$post['autoposted'] = "0";
		$post['date_updated'] = 1375155513;
		$post['owner']['type'] = "user";
		$post['owner']['name'] = "Zimbabwe 2013: What Are You Seeing?";
		$post['owner']['url'] = "/user/voazimbabwe";
		$post['permissions']['edit'] = false;
		$post['permissions']['delete'] = false;
		$post['stub'] = "in-bindura-area-there-were-sporadic-instances-of-violence";
		$post['tags'] = array();
		$post['likes'] = array();
		$post['comments'] = array();		
		
		$posts[11622] = array();
		$post = &$posts[11622];
		$post['externals'][0]['external_id'] = 5175;
		$post['externals'][0]['service_id'] = 1;
		$post['externals'][0]['provider'] = "Twitter";
		$post['externals'][0]['type'] = "html";
		$post['externals'][0]['id_on_service'] = "362050522779365378";
		$post['externals'][0]['content'] = "RT @syahirasharif: apa yang main2 agama islam nya? kalau hina la sangat haiwan tu, takkan wujudnya di dunia ni.";
		$post['externals'][0]['datetime'] = 1375154545;
		$post['externals'][0]['lat'] = null;
		$post['externals'][0]['lon'] = null;
		$post['externals'][0]['url'] = "https://twitter.com/Inbarajs/statuses/362050522779365378";
		$post['externals'][0]['title'] = null;
		$post['externals'][0]['favicon_url'] = "https://twitter.com/favicons/favicon.ico";
		$post['externals'][0]['embed_html'] = "<blockquote class=\"twitter-tweet\"><p>apa yang main2 agama islam nya? kalau hina la sangat haiwan tu, takkan wujudnya di dunia ni.</p>&mdash; Syahira (@syahirasharif) <a href=\"https://twitter.com/syahirasharif/statuses/362050245204520961\">July 30, 2013</a></blockquote>\n";
		$post['externals'][0]['images'] = array();
		
		$post['locations'] = array();
		$post['maps'] = array();
		$post['media'] = array();
		$post['post_id'] = 11622;
		
		$post['users'][0]['user_id'] = 2766;
		$post['users'][0]['crowdmap_id'] = "060f8f10527a820d0f90f597d91b58add9d8209f910b10c0f9bfe7daca8d74270d2b8e9e5fb03188108a8f2f88f4cd9515a4b96cf80f443b11f22dbde18a8fa2";
		$post['users'][0]['crowdmap_id_h'] = "5259a24ac2863a2820ace7d14185cc2b";
		$post['users'][0]['username'] = "inbaraj";
		$post['users'][0]['name'] = "Inbaraj Suppiah";
		$post['users'][0]['bio'] = "";
		$post['users'][0]['plus'] = false;
		$post['users'][0]['baselayer'] = "crowdmap_satellite";
		$post['users'][0]['instagram_auto_post'] = false;
		$post['users'][0]['twitter_auto_post'] = true;
		$post['users'][0]['twitter_auto_post_retweets'] = false;
		$post['users'][0]['date_registered'] = 1373740988;
		$post['users'][0]['banned'] = false;
		$post['users'][0]['sms_number'] = false;
		$post['users'][0]['sms_confirmed'] = false;
		$post['users'][0]['avatar'] = null;
		$post['owner_map_id'] = 0;
		$post['media_id'] = 0;
		$post['location_id'] = 0;
		$post['external_id'] = 5175;
		$post['externals_images_id'] = 0;
		$post['app_id'] = 1;
		$post['message'] = "";
		$post['date_posted'] = 1375154545;
		$post['public'] = true;
		$post['forig_shortcode'] = null;
		$post['autoposted'] = 0;
		$post['date_updated'] = 1375154545;
		$post['owner']['type'] = "user";
		$post['owner']['name'] = "Inbaraj Suppiah";
		$post['owner']['url'] = "/user/inbaraj";
		$post['permissions']['edit'] = false;
		$post['permissions']['delete'] = false;
		$post['stub'] = "";
		$post['tags'] = array();
		$post['likes'] = array();
		$post['comments'] = array();
		
		$posts[11608] = array();
		$post = &$posts[11608];
		$post['externals'] = array();
		$post['locations'][0]['location_id'] = 5234;
		$post['locations'][0]['fsq_venue_id'] = "";
		$post['locations'][0]['geometry']['type'] = "Point";
		$post['locations'][0]['geometry']['coordinates'][0] = "-34.887084960938";
		$post['locations'][0]['geometry']['coordinates'][1] = "-8.0701073044391";
		$post['locations'][0]['name'] = "";
		$post['locations'][0]['region'] = "";
		
		$post['maps'][0]['approved'] = true;
		$post['maps'][0]['map_id'] = 1810;
		$post['maps'][0]['users']['user_id'] = 2990;
		$post['maps'][0]['users']['crowdmap_id'] = "db319cfda69c3fc879e636742878e026d0e0adfc88198b564075102f1adca023e58aa290c332c6b75180b38f2725f16b76d31416fc2679b8a78c2dcd1d5b2cc6";
		$post['maps'][0]['users']['crowdmap_id_h'] = "f165c5d0c95a55f8e65129a685cf36cc";
		$post['maps'][0]['users']['username'] = "alice";
		$post['maps'][0]['users']['name'] = "violência sexual no brasil";
		$post['maps'][0]['users']['bio'] = "";
		$post['maps'][0]['users']['plus'] = false;
		$post['maps'][0]['users']['baselayer'] = "crowdmap_satellite";
		$post['maps'][0]['users']['instagram_auto_post'] = false;
		$post['maps'][0]['users']['twitter_auto_post'] = false;
		$post['maps'][0]['users']['twitter_auto_post_retweets'] = false;
		$post['maps'][0]['users']['date_registered'] = 1374502917;
		$post['maps'][0]['users']['banned'] = false;
		$post['maps'][0]['users']['sms_number'] = false;
		$post['maps'][0]['users']['sms_confirmed'] = false;
		$post['maps'][0]['users']['avatar'] = null;
		$post['maps'][0]['user_id'] = 2990;
		$post['maps'][0]['app_id'] = 1;
		$post['maps'][0]['subdomain'] = "violenciasexualnobrasil";
		$post['maps'][0]['name'] = "Violência Sexual no Brasil";
		$post['maps'][0]['description'] = "Esse é um mapa colaborativo. Tod@s e qualquer um pode colocar seu ponto no mapa, leva alguns minutos. Tem como objetivo tornar visível o invisível: a Cultura do ESTUPRO no Brasil.  Para ver o mapa abaixo desse texto, clique em \"view map\". Para registros coloque \"Criar Post\". Após escrever seu registro, marque abaixo com o balãozinho, ache o local no mapa e clique \"criar uma localidade\". Então, publique. O texto fica anônimo. Vamos mapear registros, notícias e relatos de pessoas que tenham sofrido violência sexual no Brasil. Pedimos que enviem apenas relatos verídicos. Essa é uma iniciativa autônoma e visa tão somente a ilustração da grave situação de abusos sexuais no pais. Pode-se contribuir de duas maneiras: simplismente colocando um ponto no mapa ou tornando-se colaborador do mapa, ao criar loggin no site, ajudando a alimentar o banco de dados. Que sirva para a reflexão e quem sabe, a ação.";
		$post['maps'][0]['banner'] = "https://b25c7ada827abcbc0630-5454a9e6f7100566866dd221e5013c79.ssl.cf2.rackcdn.com/51f119e1b6f935.35596361_c.JPG";
		$post['maps'][0]['avatar'] = "https://b25c7ada827abcbc0630-5454a9e6f7100566866dd221e5013c79.ssl.cf2.rackcdn.com/51f10f700c8a74.71259785_c.jpg";
		$post['maps'][0]['public'] = true;
		$post['maps'][0]['moderation'] = "auto";
		$post['maps'][0]['date_created'] = 1374502995;
		$post['maps'][0]['center']['type'] = "Point";
		$post['maps'][0]['center']['coordinates'][0] = "-44.64355683747";
		$post['maps'][0]['center']['coordinates'][1] = "-20.8222750451";
		$post['maps'][0]['post_count'] = 30;
		$post['maps'][0]['marker'] = false;
		
		$post['media'] = array();
		$post['post_id'] = 11608;
		
		$post['users'][0]['user_id'] = 1;
		$post['users'][0]['crowdmap_id'] = "";
		$post['users'][0]['crowdmap_id_h'] = "";
		$post['users'][0]['username'] = "anonymous";
		$post['users'][0]['name'] = "Anonymous";
		$post['users'][0]['bio'] = "";
		$post['users'][0]['plus'] = false;
		$post['users'][0]['baselayer'] = "crowdmap_satellite";
		$post['users'][0]['instagram_auto_post'] = false;
		$post['users'][0]['twitter_auto_post'] = false;
		$post['users'][0]['twitter_auto_post_retweets'] = false;
		$post['users'][0]['date_registered'] = 1363603003;
		$post['users'][0]['banned'] = false;
		$post['users'][0]['sms_number'] = false;
		$post['users'][0]['sms_confirmed'] = false;

		$post['owner_map_id'] = 0;
		$post['media_id'] = 0;
		$post['location_id'] = 5234;
		$post['external_id'] = 0;
		$post['externals_images_id'] = 0;
		$post['app_id'] = 1;
		$post['message'] = "<p>Aos 17 anos, perdi a virgindade. Minha primeira relação sexual com o namorado foi forçada. Ano: 1992.</p>";
		$post['date_posted'] = 1375144534;
		$post['public'] = true;
		$post['forig_shortcode'] = null;
		$post['autoposted'] = 0;
		$post['date_updated'] = 1375144534;
		$post['owner']['type'] = "user";
		$post['owner']['name'] = "Anonymous";
		$post['owner']['url'] = "/user/anonymous";
		$post['permissions']['edit'] = false;
		$post['permissions']['delete'] = false;
		$post['stub'] = "aos-17-anos-perdi-a-virgindade-minha-primeira-relao";
		$post['tags'] = array();
		$post['likes'] = array();
		$post['comments'] = array();
		
		return $posts;
		
	}
	
	//comprehensive check of the post objects returned by a basic posts request
	function spotCheckObjs($resp)
	{
		$RESTposts = json_decode($resp, true);
		
		$posts = fixtures::postsArray();
		
		//check the first post in the JSON response
		$post = $RESTposts['posts'][0];
		$this->assertEquals($post, $posts[11626]);
		
		//check seventh item
		$post = $RESTposts['posts'][6];
		$this->assertEquals($post, $posts[11622]);
		
		//check twentieth item
		$post = $RESTposts['posts'][19];
		$this->assertEquals($post, $posts[11608]);
		
	}
	
	//comprehensive check of the post objects returned by a posts request
	function checkPostObjs($resp, $post_ids, $update_ids=array())
	{
		$RESTposts = json_decode($resp, true);
		
		$posts = fixtures::postsArray();
		
		$this->assertEquals(count($RESTposts['posts']), count($post_ids));
		
		foreach ($RESTposts['posts'] as $index => $post)
		{
			//if update ids have been passed, checks to make sure the date_updated value is greater than before,
			//then sets the date_updated value of the response to the expected value to test the rest of the object
			if (in_array($post['post_id'],$update_ids)) {
				$this->assertTrue($post['date_updated'] > $posts[$post_ids[$index]]['date_updated']);
				$post['date_updated'] = $posts[$post_ids[$index]]['date_updated'];
			}
			$this->assertEquals($post, $posts[$post_ids[$index]]);
		}
	}

}