<?php wp_head(); ?>

<?php  get_header(); ?>

<main id="main" class="site-main" role="main">
	<article>
		<div id="contenttarget"></div>
			<?php $wpjsonurl = site_url() . '/wp-json/wp/v2/posts?per_page=2'; ?>
			<script type="text/javascript">
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var obj = JSON.parse(this.response);

						obj.forEach(function (objItem) {
							var blogItem = document.createElement("div"),
									titleObj = document.createElement("h3"),
									titleNode = document.createTextNode(objItem.title.rendered),
									excerptObj = document.createElement("p") ,
									excerptNode = document.createTextNode(objItem.title.rendered),
									linkObj = document.createElement("a") ,
									linkTitle = document.createTextNode("Read more"),
									att = document.createAttribute("href");

									att.value = objItem.link;
									linkObj.setAttributeNode(att);
									linkObj.appendChild(linkTitle);

									titleObj.appendChild(titleNode);
									excerptObj.appendChild(excerptNode);

									blogItem.appendChild(titleObj);
									blogItem.appendChild(excerptObj);
									blogItem.appendChild(linkObj);

									document.getElementById("contenttarget").appendChild(blogItem);

					  });
					}
				};

				xhttp.open('GET', '<?php echo $wpjsonurl ?>', true);
				xhttp.send();

			</script>
	</article>
</main>

<?php get_footer(); ?>
<?php wp_footer(); ?>
