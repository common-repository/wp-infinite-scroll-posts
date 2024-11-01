<?php
/**
 * Template to display options page
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div>
   <div class="wpesp_top">
  <h3> <?php _e( "WP EasyScroll Posts", "wp-easy-scroll-posts" ) ?> <small><?php _e("By","wp-easy-scroll-posts") ?> <a class="wpesp_a" href="https://www.startbitsolutions.com" target="_blank">Startbit IT Solutions Pvt. Ltd.</a>
  </h3>
    </div> <!-- ------End of top-----------  -->
    
<div class="wpesp_inner_wrap">
<?php settings_errors(); ?>
  <div class="left">
<form method="post" action="options.php" id="wp_easy_scroll_posts_form">
<h3 class="wpesp_title"><?php _e("Configuration Setting","wp-easy-scroll-posts") ?></h3>
 <div id="" class="togglediv">
<?php settings_fields( $this->parent->slug_ ); ?>
<table class="form-table wpesp_admintbl">
	<tr>
		<th>
			<label><?php _e( 'Content Selector', 'wp-easy-scroll-posts' ); ?></label>
		</th>
		<td>
			<input type="text" name="wp_easy_scroll_posts[contentSelector]" id="wp_easy_scroll_posts[contentSelector]" value="<?php echo esc_attr( $this->parent->options->contentSelector ); ?>" class="regular-text" /><br />
			<span class="description"><?php _e( 'Div containing your theme\'s content', 'wp-easy-scroll-posts' ); ?></span>
		</td>
	</tr>
	<tr>
		<th>
			<label><?php _e( 'Navigation Selector', 'wp-easy-scroll-posts' ); ?></label>
		</th>
		<td>
			<input type="text" name="wp_easy_scroll_posts[navSelector]" id="wp_easy_scroll_posts[navSelector]" value="<?php echo esc_attr( $this->parent->options->navSelector ); ?>" class="regular-text" /><br />
			<span class="description"><?php _e( 'Div containing your theme\'s navigation', 'wp-easy-scroll-posts' ); ?></span>		
		</td>
	</tr>
	<tr>
		<th>
			<label><?php _e( 'Next Selector', 'wp-easy-scroll-posts' ); ?></label>		
		</th>
		<td>
			<input type="text" name="wp_easy_scroll_posts[nextSelector]" id="wp_easy_scroll_posts[nextSelector]" value="<?php echo esc_attr( $this->parent->options->nextSelector ); ?>" class="regular-text"  /><br />
			<span class="description"><?php _e( 'Link to next page of content', 'wp-easy-scroll-posts' ); ?></span>		
		</td>
	</tr>
	<tr>
		<th>
			<label><?php _e( 'Item Selector', 'wp-easy-scroll-posts' ); ?>	</label>	
		</th>
		<td>
			<input type="text" name="wp_easy_scroll_posts[itemSelector]" id="wp_easy_scroll_posts[itemSelector]" value="<?php echo esc_attr( $this->parent->options->itemSelector ); ?>" class="regular-text" /><br />
			<span class="description"><?php _e( 'Div containing an individual post', 'wp-easy-scroll-posts' ); ?></span>
		</td>
	</tr>
	</table>
	</div>
<h3 class="wpesp_title"><?php _e("Front-end Setting","wp-easy-scroll-posts") ?></h3>
 <div id="" class="togglediv">
 <table class="form-table wpesp_admintbl">
  	<tr>
		<th>
			<label><?php _e( 'Loading Image', 'wp-easy-scroll-posts' ); ?></label>	
		</th>
		<td>
		   <p>
			<?php _e( 'Current Image:', 'wp-easy-scroll-posts' ); ?> <img id="hd" src="<?php echo esc_attr( $this->parent->options->loading["img"] ); ?>" alt="<?php _e( 'Current Loading Image', 'wp-easy-scroll-posts' ); ?>" />
        <img style="display:none;" id="sh" src="" alt="" >			
			</p><br />
			<p><?php _e( 'New Image:', 'wp-easy-scroll-posts' ); ?>
			<input id="wp-easy-scroll-posts-upload-image" type="text" size="36" name="wp_easy_scroll_posts[loading][img]" value="<?php echo esc_attr( $this->parent->options->loading['img'] ); ?>" />
			</p> 
			<input id="wp-easy-scroll-posts-upload-image-button" type="button" value="<?php _e( 'Upload New Image', 'wp-easy-scroll-posts' ); ?>" /> <?php if ( $this->parent->options->loading["img"]
				!= $this->parent->options->defaults["loading"]['img'] ) { ?>
		( <a class="wpesp_a" href="#" id="use_default"><?php _e( 'Use Default', 'wp-easy-scroll-posts' ); ?></a> )
		<?php } ?>
		<br />
			<span class="description"><?php _e( 'URL of existing or uploaded image to display as new posts are retrieved', 'wp-easy-scroll-posts' ); ?></span>
		</td>
	</tr>
	<tr>
		<th>
			<label><?php _e( 'Loading Message', 'wp-easy-scroll-posts' ); ?>	</label>	
		</th>
		<td>
			<div id="<?php echo user_can_richedit() ? 'postdivrich' : 'postdiv'; ?>" class="postarea">
    			<?php
 				$editor_id ='msgText';
    			$content=  $this->parent->options->loading['msgText'];
wp_editor( $content, $editor_id, $settings = array('textarea_name'=>'wp_easy_scroll_posts[loading][msgText]','textarea_rows'=>'8') );    			
    			 ?>
 
			<span class="description"><?php _e( 'Text to display as new posts are retrieved', 'wp-easy-scroll-posts' ); ?></span>	
    		</div> 
		</td>
	</tr>
		<tr>
		<th>
			<label><?php _e( 'Loading Align', 'wp-easy-scroll-posts' ); ?>	</label>	
		</th>
		<td>
    		<select name="wp_easy_scroll_posts[loading][align]" class="wp_easy_scroll_posts[loading][align]" id="wp_easy_scroll_posts[loading][align]">
    	  <?php $align = esc_attr( $this->parent->options->loading["align"] );
    		$right = "";
    		$left = "";
    		$center = "";
    		 if ($align=='right'){
    		 	 $right = 'selected="selected"';
    		 	} else if($align=='left'){
    		 		$left = 'selected="selected"';
    		 		} else {
    		 			$center = 'selected="selected"';
    		 			}
    		 
				echo '<option value="center" '.$center.' >Center</option>
				<option value="left" '.$left.' >Left</option>
				<option value="right" '.$right.' >Right</option>';
				?>
			</select>
			<br />
			<span class="description"><?php _e( 'Loading Image and Text alignment options.', 'wp-easy-scroll-posts' ); ?></span>
    		
		</td>
	</tr>
	<tr>
		<th>
			<label><?php _e( 'Finished Message', 'wp-easy-scroll-posts' ); ?> </label>
		</th>
		<td>
			<div id="<?php echo user_can_richedit() ? 'postdivrich' : 'postdiv'; ?>" class="postarea">
    		
    			 <?php
 				$editor_id ='finishedMsg';
    			$content=  $this->parent->options->loading['finishedMsg'];
wp_editor( $content, $editor_id, $settings = array('textarea_name'=>'wp_easy_scroll_posts[loading][finishedMsg]','textarea_rows'=>'8') );    			
    			 ?>
			<span class="description"><?php _e( 'Text to display when no additional posts are available', 'wp-easy-scroll-posts' ); ?></span>	
    		</div>
		</td>
	</tr>
</table>
<p class="submit">
	<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'wp-easy-scroll-posts' ); ?>" />
</p>
</div>
</form>
	 </div> <!-- --------End of left div--------- -->
 <div class="wpesp_right">
	<center>
<div class="wpesp_bottom">
		    <h3 id="download-comments-vivascroll" class="wpesp_title"><?php _e( 'Download Free Plugins', 'wp-easy-scroll-posts' ); ?></h3>
     <div id="downloadtbl-comments-vivascroll" class="wpesp_togglediv">  
	<h3 class="wpesp_company">
<p> Startbit IT Solutions Pvt. Ltd. is an ISO 9001:2015 Certified Company is a Global IT Services company with expertise in outsourced product development and custom software development with focusing on software development, IT consulting, customized development.We have 1000+ satisfied clients worldwide.</p>	
<?php _e( 'following plugins for you', 'wp-easy-scroll-posts' ); ?>:
</h3>
<ul class="">
<li><a class="wpesp_a" target="_blank" href="http://wordpress.org/plugins/wp-twitter-feeds/">WP Twitter Feeds</a></li>
<li><a class="wpesp_a" target="_blank" href="http://wordpress.org/plugins/wp-fb-share-like-button/">WP FB Share & Like Button</a></li>
<li><a class="wpesp_a" target="_blank" href="http://wordpress.org/plugins/wp-facebook-fanbox-widget/">WP FB FanBox</a></li>
<li><a class="wpesp_a" target="_blank" href="http://wordpress.org/plugins/wp-responsive-jquery-slider/">WP Responsive Jquery Slider</a></li>
<li><a class="wpesp_a" target="_blank" href="https://wordpress.org/plugins/wp-infinite-scroll-posts/">WP EasyScroll Posts</a></li>
<li><a class="wpesp_a" target="_blank" href="http://wordpress.org/plugins/wp-qr-code-generator/">WP QR Code Generator</a></li>
<li><a class="wpesp_a" target="_blank" href="https://wordpress.org/plugins/wp-easy-popup/">WP Easy Popup</a></li>
<li><a class="wpesp_a" target="_blank" href="https://wordpress.org/plugins/vi-random-posts-widget/">Vi Random Post Widget</a></li>
</ul>
  </div> 
</div>		
	</center>
 </div><!-- --------End of right div--------- -->
</div> <!-- --------End of inner_wrap--------- -->
</div> <!-- ---------End of wrap-------- -->

<script type="text/javascript">
				    		jQuery(document).ready(function($){
									$( '#wp-easy-scroll-posts-upload-image-button' ).on( 'click', function() {

								tb_show('test', 'media-upload.php?type=image&TB_iframe=1');
						
										window.send_to_editor = function( html ) 
										{
										   imgurl = $(html).attr('src');
										
											jQuery( '#wp-easy-scroll-posts-upload-image' ).val(imgurl);
											jQuery('#hd').hide();
											jQuery('#sh').show();
											jQuery('#sh').attr("src",imgurl);											
											tb_remove();
											
										}
										
									});
								});	
	               </script>

