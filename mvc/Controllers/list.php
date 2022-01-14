<?php
require_once "../Models/listModel.php";

$model=new listModel();
$hotels=$model->getHotels();

//https://www.booking.com/searchresults.es.html?label=mallorca-OGAxfyOJnHv4zrl42tQHqgS520674283837%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atikwd-328204198010%3Alp20287%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YTiRJUvwM0AZDoPI6XBbFtM&sid=921ce6aa0e349dbf2ac61d60018bfb0b&aid=1610834&sb_lp=1&src=index&error_url=https%3A%2F%2Fwww.booking.com%2Findex.es.html%3Faid%3D1610834%3Blabel%3Dmallorca-OGAxfyOJnHv4zrl42tQHqgS520674283837%253Apl%253Ata%253Ap1%253Ap2%253Aac%253Aap%253Aneg%253Afi%253Atikwd-328204198010%253Alp20287%253Ali%253Adec%253Adm%253Appccp%253DUmFuZG9tSVYkc2RlIyh9YTiRJUvwM0AZDoPI6XBbFtM%3Bsid%3D921ce6aa0e349dbf2ac61d60018bfb0b%3Bsb_price_type%3Dtotal%3Bsrpvid%3Df2538b05e2050403%26%3B&ss=Mallorca%2C+Espa%C3%B1a&is_ski_area=&checkin_year=&checkin_month=&checkout_year=&checkout_month=&group_adults=2&group_children=0&no_rooms=1&b_h4u_keep_filters=&from_sf=1&dest_id=767&dest_type=region&search_pageview_id=b9248b3483e901dd&search_selected=true&nflt=ht_id%3D204
require_once "../Views/listView.php";