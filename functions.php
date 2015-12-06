<?php

require_once('inc/OAuth.php');
require_once('inc/TwitterOAuth.php');

add_action('init', 'register_custom_post_types');
add_action('init', 'register_navigation_menus');
add_action('init', 'register_sidebar_menus');
add_theme_support('post-thumbnails');


function timthumb($url, $args = array()){

	$args['src'] = $url;

	$argString = http_build_query($args);


	$requestUri = get_template_directory_uri() . "/timthumb.php?" . $argString;
	return $requestUri;
}


function getWeeklySpecials(){
	$query = new WP_Query(array(
		'post_type'	=> 'weekly-specials',
		'orderby'		=> 'menu_order title',
		'order'			=> 'ASC'
	));

	$specials = array();
	while($query->have_posts()){

		$query->the_post();
		$specials[] = array(
			'name'	=> get_the_title(),
			'price'	=> get_field('price')
		);
	}
	wp_reset_postdata();
	return $specials;
}


function getMarketPrices(){
	$query = new WP_Query(array(
		'post_type'	=> 'market-prices',
		'orderby'		=> 'menu_order title',
		'order'			=> 'ASC'
	));

	$marketPrices = array();

	while($query->have_posts()){
		$query->the_post();

		$image = has_post_thumbnail(get_the_ID()) ? wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium') : false;

		$marketPrices[] = array(
			'title'		=> get_the_title(),
			'tagline'	=> get_field('tag_line'),
			'prices'	=> get_field('market_prices'),
			'nav'		=> get_field('navigation_title'),
			'image'	=> $image
		);
	}
	wp_reset_postdata();
	return $marketPrices;
}

function getGallery(){
	$query = new WP_Query(array(
		'post_type'	=> 'gallery',
		'orderby'		=> 'menu_order title',
		'order'			=> 'ASC'
	));

	$gallery = array();

	while($query->have_posts()){
		$query->the_post();
		$gallery[] = array(
			'title'		=> get_the_title(),
			'gallery'	=> get_field('gallery')
		);
	}

	wp_reset_postdata();
	return $gallery;
}

function getJobOpenings() {
	$query = new WP_Query(array(
		'post_type' => 'jobs',
		'orderby' => 'menu_order title',
		'order' => 'ASC'
	));

	$jobs = array();
	while ($query->have_posts()) {
		$query->the_post();
		$jobs[] = array(
			'title' => get_the_title(),
			'content' => apply_filters('the_content', get_the_content()),
		);
	}
	return $jobs;
}


function submitContactForm(){
	$nonce = $_POST['nonce'];
	if (!wp_verify_nonce($nonce, 'submitContactForm')){
		exit(0);
	}
	$to = get_field('contact_email','option');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$message = $_POST['message'];

	$mail = "New contact form submission<br/><br/>";
	$mail .= "Name: $name<br/>";
	$mail .= "Email: $email<br/>";
	$mail .= "Number: $number<br/>";
	$mail .= "Message:<br/>$message<br/>";

	add_filter( 'wp_mail_content_type', 'set_html_content_type' );
	wp_mail($to, 'New Website Message', $mail);
	remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

	exit(0);
}
add_action( 'wp_ajax_submitContactForm', 'submitContactForm' );
add_action( 'wp_ajax_nopriv_submitContactForm', 'submitContactForm' );

function set_html_content_type() {
	return 'text/html';
}



function getYelpReviews(){
	$consumer_key	= get_field('yelp_consumer_key', 'option');
	$consumer_secret = get_field('yelp_consumer_secret', 'option');
	$token = get_field('yelp_access_token', 'option');
	$token_secret = get_field('yelp_access_token_secret', 'option');

	$token = new OAuthToken($token, $token_secret);
	$consumer = new OAuthConsumer($consumer_key, $consumer_secret);
	$signatureMethod = new OAuthSignatureMethod_HMAC_SHA1();


	$unsigned_url = "http://api.yelp.com/v2/business/yankee-lobster-fish-market-boston";
	$oathrequest = OAuthRequest::from_consumer_and_token($consumer, $token, 'GET', $unsigned_url);

	$oathrequest->sign_request($signatureMethod, $consumer, $token);

	$signed_url = $oathrequest->to_url();
	$ch = curl_init($signed_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$data = curl_exec($ch);
	curl_close($ch);

	$response = json_decode($data, true);
	return $response;



}

function getFacebookPost(){
	$clazz = rfbp_get_class();
	$fbposts = $clazz->get_posts();

	$_posts;
	foreach($fbposts as $fbpost){
		if (!empty($fbpost['content'])){
			$_posts[] = $fbpost;
		}
	}
	return array_slice($_posts, 0, 3);
}



function getLatestTweets(){
	$consumerKey = get_field('twitter_consumer_key', 'option');
	$consumerSecret = get_field('twitter_consumer_secret', 'option');
	$accessToken = get_field('twitter_access_token', 'option');;
	$accessSecret = get_field('twitter_access_token_secret', 'option');
	$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessSecret);

	$username = "yankeelobster";
	$tweetData = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=$username&count=3");

	$tweets = array();

	foreach ($tweetData as $tweet){
		$replace_index = array();
		if ( !empty($tweet->entities) ) {
			foreach ($tweet->entities as $area => $items) {
				switch ( $area ) {
					case 'hashtags':
						$find = 'text';
						$prefix = '#';
						$url = 'https://twitter.com/search/?src=hash&q=%23';
						break;
					case 'user_mentions':
						$find = 'screen_name';
						$prefix = '@';
						$url = 'https://twitter.com/';
						break;
					case 'media': case 'urls':
						$find = 'display_url';
						$prefix = '';
						$url = '';
						break;
					default: break;
				}
				foreach ($items as $item) {
					$text = $tweet->text;
					$string = $item->$find;
					$href = $url.$string;
					if (!(strpos($href, 'http://') === 0) && !(strpos($href, 'https://') === 0)) $href = "http://".$href;
					$replace = substr($text,$item->indices[0],$item->indices[1]-$item->indices[0]);
					$with = "<a href=\"$href\" target=\"_blank\">{$prefix}{$string}</a>";
					$replace_index[$replace] = $with;
				}
			}
			foreach ($replace_index as $replace => $with) $tweet->text = str_replace($replace,$with,$tweet->text);
		}

		$tweets[] = array(
			'user'		=> $tweet->user,
			'id'		=> $tweet->id,
			'text'		=> $tweet->text,
			'createdat'	=> $tweet->created_at,
			'timeago'	=> time_elapsed_string(strtotime($tweet->created_at))
		);
	}

	return $tweets;
}

function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 Seconds';
    }

    $a = array( 12 * 30 * 24 * 60 * 60  =>  'Year',
                30 * 24 * 60 * 60       =>  'Month',
                24 * 60 * 60            =>  'Day',
                60 * 60                 =>  'Hour',
                60                      =>  'Minute',
                1                       =>  'Second'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' Ago';
        }
    }
}


function partitionList( $list, $p ) {
    $listlen = count( $list );
    $partlen = floor( $listlen / $p );
    $partrem = $listlen % $p;
    $partition = array();
    $mark = 0;
    for ($px = 0; $px < $p; $px++) {
        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
        $partition[$px] = array_slice( $list, $mark, $incr );
        $mark += $incr;
    }
    return $partition;
}


if (function_exists('acf_add_options_sub_page')){
	acf_add_options_sub_page( 'Hours & Location' );
	acf_add_options_sub_page( 'Yankee Settings' );
}


function register_sidebar_menus(){
	register_sidebar(array(
		'name'	=> 'Yelp Reviews',
		'id'		=> 'yelp-reviews'
	));
}


function register_navigation_menus(){
	register_nav_menus(array(
		'header-navigation'	=> 'Header Navigation'
	));
}

function register_custom_post_types(){

	$postType = array(
		'labels'			=> array(
			'name'			=> 'Market Prices',
			'singular_name'	=> 'Market Price',
			'edit_item'		=> 'Edit Market Price',
			'view_item'		=> 'View Market Price',
			'menu_name'		=> 'Market Prices'
		),
		'public'			=> true,
		'capability_type'	=> 'post',
		'show_ui'			=> true,
		'hierarchical'		=> true,
		'rewrite'			=> array('slug'	=> 'market-prices'),
		'supports'			=> array('title','editor','revisions','thumbnail'),
		'show_in_nav_menus'	=> true,
		'has_archive'		=> true
	);
	register_post_type('market-prices', $postType);



	$postType = array(
		'labels'			=> array(
			'name'			=> 'Weekly Specials',
			'singular_name'	=> 'Weekly Special',
			'edit_item'		=> 'Edit Weekly Special',
			'view_item'		=> 'View Weekly Special',
			'menu_name'		=> 'Weekly Specials'
		),
		'public'			=> true,
		'capability_type'	=> 'post',
		'show_ui'			=> true,
		'hierarchical'		=> true,
		'rewrite'			=> array('slug'	=> 'weekly-specials'),
		'supports'			=> array('title','editor','revisions'),
		'show_in_nav_menus'	=> true,
		'has_archive'		=> false
	);
	register_post_type('weekly-specials', $postType);


	$postType = array(
		'labels'			=> array(
			'name'			=> 'Gallery',
			'singular_name'	=> 'Gallery',
			'edit_item'		=> 'Edit Gallery',
			'view_item'		=> 'View Gallery',
			'menu_name'		=> 'Gallery'
		),
		'public'			=> true,
		'capability_type'	=> 'post',
		'show_ui'			=> true,
		'hierarchical'		=> true,
		'rewrite'			=> array('slug'	=> 'gallery'),
		'supports'			=> array('title','editor','revisions'),
		'show_in_nav_menus'	=> true,
		'has_archive'		=> true
	);
	register_post_type('gallery', $postType);

	$postType = array(
		'labels' => array(
			'name' => 'Job Openings',
			'singular_name' => 'Job Opening',
			'edit_item' => 'Edit Job Opening',
			'view_item' => 'View Job Opening',
			'menu_name' => 'Jobs'
		),
		'public' => true,
		'capability_type' => 'post',
		'show_ui' => true,
		'hierarchical' => true,
		'rewrite' => array('slug' => 'jobs'),
		'supports' => array('title', 'editor', 'revisions', 'excerpt'),
		'show_in_nav_menus' => true,
		'has_archive' => false
	);
	register_post_type('jobs', $postType);
}
