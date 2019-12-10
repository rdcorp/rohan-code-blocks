<?php
/**
 *  Agents audio demos
 */
	add_action( 'wp_footer', 'dpn_agents_audio' );  

function dpn_agents_audio() { ?>
	<script type="text/javascript" >
	jQuery(document).ready(function($) {
	//console.log("FF");	
	<?php
		global $post;
		?>
		var post_id = <?php	echo $post->ID;	?>;
		var ajaxurl = <?php echo "'" . get_site_url() . "/wp-admin/admin-ajax.php'"; ?>;
		var data = {
			'action': 'load_audios',
			'post_id': post_id
		};
		jQuery.post(ajaxurl, data, function(response) {
			var audio_list = JSON.parse(response);
			if(jQuery.isArray(audio_list)) {
				var i = 0;
				jQuery.each(audio_list, function( index, value ) {
					var file_name = value[0];
					var file_path = value[1];
					file_path = file_path.replace("http://","https://");
					document.getElementById('dpn_talent_audios').insertAdjacentHTML('beforeend', '<p>'+file_name+'</p><audio id="audio-player-'+i+'" controls="controls" src="'+file_path+'" type="audio/mpeg">');
					jQuery("#dpn_talent_audios").fadeIn();
					i = i + 1;
				});	
			}

		});
	});
	</script> <?php
}

add_action( 'wp_ajax_load_audios', 'load_audios' );
add_action( 'wp_ajax_nopriv_load_audios', 'load_audios' );

function load_audios() {
	$post_id = $_POST["post_id"];
	$output = array();
	$base_audio_path = get_option("options_base_audio_location");
	//var_dump($base_audio_path);
	
	if( have_rows('audio_demos',$post_id) ):
		while( have_rows('audio_demos',$post_id) ): the_row(); 
		//var_dump("OUTPUT!!");
		//var_dump($output);
			$file_type = get_sub_field('type');
			//var_dump("FILE TYPE!!");
			//var_dump($file_type);	
			if($file_type == "file") {
				$file = get_sub_field('file'); 
				//var_dump("FILE!!");
				//var_dump($file);	
				$file_path = $file["file_path"];
				$file_path = $base_audio_path . $file_path;
				$file_name = $file["file_name"];
				$temp_file = array($file_name,$file_path);
				array_push($output, $temp_file );
			}
			elseif($file_type == "media") {
				$file_id = get_sub_field('audio_file'); 
				if(is_numeric($file_arr)) {
					$file_name = get_the_title($file_id);
					$file_path = wp_get_attachment_url($file_id);
					$temp_file = array($file_name,$file_path);
					array_push($output, $temp_file );
				}
			}
		 endwhile;
	
		//var_dump("OUTPUT!!");
		//var_dump($output);
		echo json_encode($output);

 
	endif;

	wp_die(); // this is required to terminate immediately and return a proper response
}
?>
