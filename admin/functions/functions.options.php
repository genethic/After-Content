<?php

add_action( 'init','of_options' );

if ( !function_exists('of_options') ) {
	function of_options() {	
	
		$post_pagination_css = '.post-links {
float:left;
width:100%;
margin-top:20px;
padding:20px 0;
border-bottom:1px solid #eee;
border-top:1px solid #eee;
box-sizing:border-box;
}

.post-links a{
color:#1abc9c;
font-size: 18px;
font-weight: 600;
}

.post-links a:hover{
text-decoration:underline;
}

.post-links .previous{
float:left;
width:50%;
}

.post-links .next{
float:right;
width:50%;
text-align:right;
}';
		
		$related_content_css = '.related-post-wrapper {
float:left;
margin:3% 0;
width:100%;
box-sizing:border-box;
}
.related-post-wrapper > h3 {
border-bottom:1px solid #111;
float:left;
margin-bottom:1%;
width:100%;
}
.related-post {
float:left;
margin-left:4%;
width:22%;
position:relative;
}
.related-post:nth-of-type(4n+1) {
clear:left;
margin-left:0;
}
.related-post h3 {
width:100%;
float:left;
margin-top:5px;
}
.related-post h3 a {
color:#222;
font-size:14px;
line-height:20px;
overflow:hidden;
float:left;
width:100%;
margin-top:5px;
}

.related-post-thumbnail {
float:left;
position:relative;
width:100%;
}

.related-post-thumbnail img {
width:100% !important;
}';
		
		$author_info_css = '.author-info {
margin:3% 0;
float:left;
width:100%;
}
.author-info h2 {
line-height:18px;
margin:0 0 2% 0;
}
.author-info-avatar {
float:left;
width:20%;
}
.author-info-avatar img {
height:80%;
width:100% !important;
}
.author-info-desc {
float:right;
padding-left:3%;
width:80%;
box-sizing:border-box;
}
.author-info-links {
float:right;
margin-top:10px;
width:auto;
}

.author-info-links a{
font-size:14px;
}

.author-info-links:hover {
text-decoration:underline;
}
.author-info .social-profile-buttons {
float:left;
margin-right:0;
margin-top:10px;
margin-bottom: 0;
width:auto;
}
.author-info .social-profile-buttons a {
margin-left:0;
margin-right:10px;
font-size:15px;
color: #444;
}';
		
		$social_sharing_css = '.social-sharing {
float:left;
width:100%;
}

.social-sharing p{
display:inline;
}

.social-sharing .fb-like{
margin-bottom:0 !important;
margin-right: 20px !important;
}

.social-sharing #twitter-widget-0{
margin-bottom:0 !important;
margin-right: 20px !important;
}

#___plusone_0 {
width:auto  !important;
}';

$post_meta_css = '.afc-post-meta { 
float:left;
width:100%;
padding:3%;
margin:3% 0 !important;
border: 1px solid #ddd;
 }';
		
		$text_css = '.afc-text {
float:left;
width:100%;
padding:3%;
margin:3% 0 !important;
border: 1px solid #ddd;
}';
		
		$image_css = '.afc-image {
float:left;
width:100%;
padding:1%;
margin:3% 0 !important;
border: 1px solid #ddd;
}
.afc-image img{
width:auto !important;
display:block;
margin: 0 auto !important;
}';
		
		$banner_css = '';
		
		//array of options for select, multichek and radio options
		$of_options_related_type = array ( 
			'tag' => "By tags", 
			'cat' => "By category",
		);
		
		$of_options_share_buttons = array (
			"facebook"	=> "Facebook like",
			"twitter"	=> "Twitter follow",
			"google-plus"	=> "Google +1",
		);
						
		$of_options_author_info = array (
			"title"	=> "Title",
			"avatar"	=> "Avatar",
			"bio"	=> "Biography",
			"social"	=> "Social profile links",
			"posts_link" => "Link to posts"
		);
									
		$of_options_facebook_button_layout = array(
			"standard" => "Standard",
			"box_count" => "Box count",
			"button_count" => "Button count",
			"button" => "Button",
		);
		
		$of_options_twitter_show_count = array(
			"none" => "None",
			"horizontal" => "Horizontal",
			"vertical" => "Vertical",
		);
		
		$of_options_google_plus_size = array(
			"small" => "Small",
			"medium" => "Medium",
			"standard" => "Standard",
			"tall" => "Tall",
		);
		

		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();
				
$of_options[] = array( 	"name" 		=> "Post pagination",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png"
				);
				
$of_options[] = array( 	"name" 		=> "Activate pagination",
						"desc" 		=> "If you activate this option, will show post pagination after posts content.",
						"id" 		=> "afc_pagination_active",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Previous link format",
						"desc" 		=> "You must use %link to locate the link in the sentence.",
						"id" 		=> "afc_prev_format",
						"std" 		=> "&laquo; %link",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Previous link text",
						"desc" 		=> "You can use %title to show the previous posts title in the link.",
						"id" 		=> "afc_prev_link",
						"std" 		=> "%title",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Next link format",
						"desc" 		=> "You must use %link to locate the link in the sentence.",
						"id" 		=> "afc_next_format",
						"std" 		=> "%link &raquo;",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Next link text",
						"desc" 		=> "You can use %title to show the previous posts title in the link.",
						"id" 		=> "afc_next_link",
						"std" 		=> "%title",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "In cat",
						"desc" 		=> "Previous / next post must be within the same category as the current post.",
						"id" 		=> "afc_links_cat",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "afc_post_pagination_css",
						"std" 		=> $post_pagination_css,
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Related content",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png",
				);
				
$of_options[] = array( 	"name" 		=> "Activate related content",
						"desc" 		=> "If you activate this option, will show related content after posts content.",
						"id" 		=> "afc_related_active",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Related by tags or by category?",
						"id" 		=> "afc_related_type",
						"std" 		=> "cat",
						"type" 		=> "radio",
						"options" 	=> $of_options_related_type
				);
				
$of_options[] = array( 	"name" 		=> "Title",
						"desc" 		=> "Title to show before related content posts",
						"id" 		=> "afc_related_title",
						"std" 		=> "RELATED CONTENT",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Number",
						"desc" 		=> "Number of posts you want to show",
						"id" 		=> "afc_number_posts",
						"std" 		=> "4",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Display image",
						"desc" 		=> "Show the post thumbnail of related posts",
						"id" 		=> "afc_display_img",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "afc_related_content_css",
						"std" 		=> $related_content_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Author info",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png"
				);
				
$of_options[] = array( 	"name" 		=> "Activate author info",
						"desc" 		=> "If you activate this option, will show author info after posts content.",
						"id" 		=> "afc_author_active",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "What info do you want to show?",
						"id" 		=> "afc_author_info",
						"std" 		=> array("title", "avatar", "bio", "posts_link"),
						"type" 		=> "multicheck",
						"options"	=> $of_options_author_info,
				);
				
$of_options[] = array( 	"name" 		=> "Title",
						"desc" 		=> "Title to show before biography",
						"id" 		=> "afc_author_title",
						"std" 		=> "About %s",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "afc_author_info_css",
						"std" 		=> $author_info_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Social sharing",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png"
				);
				
$of_options[] = array( 	"name" 		=> "Activate social sharing",
						"desc" 		=> "If you activate this option, will show social sharing after posts content.",
						"id" 		=> "afc_social_sharing_active",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "What buttons do you want to show?",
						"id" 		=> "afc_share_buttons",
						"std" 		=> array("facebook", "twitter", "google-plus"),
						"type" 		=> "multicheck",
						"options"	=> $of_options_share_buttons,
				);
				
$of_options[] = array( 	"name" 		=> "Facebook",
						"desc" 		=> "Facebook button layout",
						"id" 		=> "afc_fb_button_layout",
						"std" 		=> "button_count",
						"type" 		=> "select",
						"options"	=> $of_options_facebook_button_layout,
				);

$of_options[] = array( 	"name" 		=> "Include share button",
						"id" 		=> "afc_facebook_share_button",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Twitter",
						"desc" 		=> "Show count",
						"id" 		=> "afc_twitter_show_count",
						"std" 		=> "none",
						"type" 		=> "select",
						"options"	=> $of_options_twitter_show_count,
				);
				
$of_options[] = array( 	"name"		=>"Google plus",
						"desc" 		=> "Google plus size",
						"id" 		=> "afc_google_plus_size",
						"std" 		=> "standard",
						"type" 		=> "select",
						"options"	=> $of_options_google_plus_size,
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "afc_social_sharing_css",
						"std" 		=> $social_sharing_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Post meta",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png"
				);
				
$of_options[] = array( 	"name" 		=> "Add post meta info",
						"desc" 		=> "If you activate this option, will show post meta after posts content.",
						"id" 		=> "afc_post_meta",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Exclude meta",
						"desc" 		=> "Add the key of the custom meta you want to exclude, comma separated. .",
						"id" 		=> "afc_exclude_meta",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "afc_post_meta_css",
						"std" 		=> $post_meta_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Text",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png"
				);
				
$of_options[] = array( 	"name" 		=> "Add text",
						"desc" 		=> "If you activate this option, will show custom text after posts content.",
						"id" 		=> "afc_add_text",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Custom text",
						"id" 		=> "afc_after_post_text",
						"std" 		=> "My custom text",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "afc_text_css",
						"std" 		=> $text_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Image",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png"
				);
				
$of_options[] = array( 	"name" 		=> "Add image",
						"desc" 		=> "If you activate this option, will show custom image after posts content.",
						"id" 		=> "afc_add_image",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Custom image",
						"id" 		=> "afc_after_post_img",
						"std" 		=> "",
						 "mod"      => "min",
						"type" 		=> "media"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "afc_image_css",
						"std" 		=> $image_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Banner",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png"
				);
				
$of_options[] = array( 	"name" 		=> "Add banner",
						"desc" 		=> "If you activate this option, will show custom banner after posts content.",
						"id" 		=> "afc_add_banner",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Adsense banner",
						"id" 		=> "afc_adsense_banner_code",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "afc_banner_css",
						"std" 		=> $banner_css,
						"type" 		=> "textarea"
				);
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
