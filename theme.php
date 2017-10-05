<?php

/**
 * e107 website system
 *
 * Copyright (C) 2008-2017 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * @file
 * Game Plus Theme for e107 v2.x.
 */

if(!defined('e107_INIT')) { exit; }

// [multilanguage]
e107::lan('theme'); // loads e107_themes/CURRENT_THEME/languages/English.php (when English is selected)

define("BOOTSTRAP", 3);
define("FONTAWESOME", 4);
define('VIEWPORT', "width=device-width, initial-scale=1.0");

//e107::library('load', 'bootstrap'); // see theme.xml
//e107::library('load', 'fontawesome'); // see theme.xml

// CDN provider for Bootswatch.
$cndPref = e107::pref('theme', 'cdn', 'cdnjs');

switch($cndPref) {

	case "jsdelivr":
	//	e107::css('url', 'https://cdn.jsdelivr.net/bootstrap/3.3.7/css/bootstrap.min.css');
	//	e107::css('url',    'https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css');
	//	e107::js("footer", "https://cdn.jsdelivr.net/bootstrap/3.3.6/js/bootstrap.min.js", 'jquery');
	break;			
	
	case "cdnjs":
	default:
	//	e107::css('url', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css');
	//	e107::css('url', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
	//	e107::js("footer", "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js", 'jquery', 2);

}

/* @example prefetch  */
//e107::link(array('rel'=>'prefetch', 'href'=>THEME.'images/browsers.png'));

e107::css("theme", 			"css/animate.css"); 


e107::js("theme", 			"js/isotope.pkgd.js");
e107::js("theme", 			"js/imagesloaded.pkgd.js");
e107::js("theme", 			"js/responsive-tabs_mod_by_fizi.js");
e107::js("theme", 			"js/jquery.lettering.js");
e107::js("theme", 			"js/custom.js");

e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'})"); // activate bootstrap tooltips. 

// Legacy Stuff.
define('OTHERNEWS_COLS',false); // no tables, only divs. 
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS',false); // no tables, only divs. 
define('OTHERNEWS2_LIMIT', 3); // Limit to 3.

// Theme disclaimer is displayed in your site disclaimer appended to the site disclaimer text.
// Uncomment the line below to set a theme disclaimer (remove the // ).
define('THEME_DISCLAIMER', "<br />".LAN_THEME_6.""); 

// applied before every layout.
// $LAYOUT['_header_'] = "";

// applied after every layout. 
// $LAYOUT['_footer_'] = "";

$LAYOUT = array();

// Default Header layout for ALL layouts
$LAYOUT['_header_'] = "";


// Default Footer layout for ALL layouts
$LAYOUT['_footer_'] = "";


// Blog Default layout 
$LAYOUT['blog_with_sidebar'] =  "
<div class='container-fluid'>
  <div class='row'>
    <div class='leftcol col-md-3 col-lg-2'>
      {BOOTSTRAP_USERNAV}
      <div class='sidebar-nav'>
        <div class='navbar navbar-default' role='navigation'>
          <div class='navbar-header'>
            <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.sidebar-navbar-collapse'>
              <span class='sr-only'>Toggle navigation</span>
              <span class='icon-bar'></span>
              <span class='icon-bar'></span>
              <span class='icon-bar'></span>
            </button>
            <span class='visible-xs visible-sm navbar-brand'>
              <div class='sitename'><a href='".e_HTTP."index.php' title=\"{SITENAME}\" >{SITENAME}</a></div>
            </span>
            <div class='hidden-xs hidden-sm navbar-brand'>
              <div class='sitename'><a href='".e_HTTP."index.php' title=\"{SITENAME}\" >{SITENAME}</a></div> 
              <div class='sitetag'>{SITETAG}</div>
              <div class='social-connected'>
                {XURL_ICONS}
              </div>
              <hr />
            </div>
          </div>
          <div class='navbar-collapse collapse sidebar-navbar-collapse'>
            {NAVIGATION=main}
            <div class='search'>
              {SEARCH}
            </div>
          </div>
        </div>
      </div>
      <div class='hidden-xs hidden-sm sidebar-menus'>
        {SETSTYLE=leftcol}
        {MENU=1}
        {MENU=2}
      </div>
      <div class='hidden-xs hidden-sm sidebar-footer-info'>
        {SITEDISCLAIMER}
        {THEME_DISCLAIMER}
      </div>
    </div> 
    <div class='col-md-9 col-lg-8 col-lg-offset-right-2'>
      <div class='rightcol'>
        {SETSTYLE=rightcol}
        {ALERTS}
{---}
        <div class='visible-xs visible-sm bottom-menus'>
          {SETSTYLE=bottomcol}
          {MENU=3}
          {MENU=4}
        </div>
        <div class='visible-xs visible-sm bottom-footer-info'>
          <div class='social-connected'>
            {XURL_ICONS: size=2x}
          </div>
          {SITEDISCLAIMER}
          {THEME_DISCLAIMER}
        </div>
      </div>
    </div>
  </div>
</div>    
";  


function rand_tag(){

		if(!file_exists(e_BASE."files/taglines.txt"))
		{
			return null;
		}

        $tags = file(e_BASE."files/taglines.txt");
        return stripslashes(htmlspecialchars($tags[rand(0, count($tags))]));
}


//        [newsstyle]
/* NEWSSTYLE IS UNUSED FOR NOW */
/* NEWSSTYLE IS IN THEME FOLDER/TEMPLATES/NEWS/news_template.php */

      

//  [list of news category]
/* NEWSLISTSTYLE IS UNUSED FOR NOW */
/* NEWSLISTSTYLE IS IN THEME FOLDER/TEMPLATES/NEWS/news_template.php */



// define('ICONPRINTPDF', 'pdf.png');
// define('ICONMAIL', 'email.png');
// define('ICONPRINT', 'printer.png');
// define('ICONSTYLE', 'float: left; border:0');
define('COMMENTLINK', 	e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', LAN_THEME_2);
define('PRE_EXTENDEDSTRING', '');
define('EXTENDEDSTRING', LAN_THEME_3.'&nbsp;<i class="fa fa-long-arrow-right"></i>');
define('POST_EXTENDEDSTRING', '');
define('TRACKBACKSTRING', LAN_THEME_7);
define('TRACKBACKBEFORESTRING', '&nbsp;|&nbsp;');


// linkstyle
/* LINKSTYLE IS UNUSED FOR NOW */
/* LINKSTYLE IS IN THEME FOLDER/TEMPLATES/navigation_template.php */


/**
 * @param string $caption
 * @param string $text
 * @param string $id : id of the current render
 * @param array $info : current style and other menu data. 
 */ 


 function tablestyle($caption, $text, $id='', $info=array()){

//	global $style; // no longer needed.

  $style = $info['setStyle'];
  
  echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";
	
	$type = $style;

	//@todo a switch will be faster than all these elseif statements. 
	
	switch($style){
    
    case "wmessage":
      echo "<div class='wmessage-box'>                             
              <div class='wmessage-title'>             		                                                      
                <h2>{$caption}</h2>
              </div>
              <div class='wmessage-body'>{$text}</div>
            </div>";
    break;
    
    case "leftcol":
      echo "<div class='leftmenu-box'>                             
              <div class='leftmenu-box-title'>             		                                                      
                <h2>{$caption}</h2>
                <hr />
              </div>
              <div class='leftmenu-box-body'>{$text}</div>
            </div>";
    break;
    
    case "rightcol":
      echo "<div class='rightmenu-box'>
              <div class='rightmenu-box-title'>             		                                                      
                <h2>{$caption}</h2>
              </div>
              <div class='rightmenu-box-body'>{$text}</div>                                                     
            </div>";
    break;
    
    case "bottomcol":
      echo "<div class='bottommenu-box'>                             
              <div class='bottommenu-box-title'>             		                                                      
                <h2>{$caption}</h2>
                <hr />
              </div>
              <div class='bottommenu-box-body'>{$text}</div>
            </div>";
    break;
    
    default: 
      echo "<div class='othermenu-box'>
		          <div class='othermenu-box-title'>
                <h2>{$caption}</h2>
              </div>	                                 
              <div class='othermenu-box-body'>{$text}</div>                       
            </div>";
	}
}
    

// chatbox post style
// $CHATBOXSTYLE in THEME FOLDER/templates/chatbox_menu/chat_template.php    


// Image Version Example
// $SEARCH_SHORTCODE in THEME FOLDER/search_template.php

?>