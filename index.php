<?php
/*
Template Name: ページテンプレート -
*/
?>

<?php get_header();?>

<main class="main">

	<?php
		$content = get_post($wp_query->post->ID)->post_content;
		$slug =  get_post($wp_query->post->ID)->post_name;
		$fileUrl = file_exists(get_template_directory_uri().'/html/'.$slug.'.html') ? 'html/'.$slug.'.html' : 'html/'.$slug.'.php';


		if($content == '' && $content == '<p></p>' ){
			the_content();
		}else{
			include $fileUrl;
		}
	?>

</main>

<?php get_footer();?>