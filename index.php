<?php wp_head(); ?>

<?php  get_header(); ?>

<main id="main" class="site-main" role="main">
	<article>
		<div id="contenttarget"></div>
			<?php $wpjsonurl = site_url() . '/wp-json/wp/v2/pages/'.get_the_id().''; ?>
			<script type="text/javascript">
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var obj = JSON.parse(this.response);
						function html_entity_decode(message) {
							var element = document.createElement('div');
							element.innerHTML = message;
							return element.innerHTML;
						}
						document.getElementById('contenttarget').innerHTML = html_entity_decode(obj.content.rendered);
					}
				};
				xhttp.open('GET', '<?php echo $wpjsonurl ?>', true);
				xhttp.send();
			</script>

	</article>
</main>

<?php get_footer(); ?>
<?php wp_footer(); ?>
