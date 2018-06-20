<?php

// restApiPostLoader

function restApiPostLoader($atts) {?>

  <div id="contenttarget"></div>

  <?php

    $initPostAmount = (int)$atts["numberofposts"];
    $wpjsonurl = site_url() . '/wp-json/wp/v2/posts?per_page='.$initPostAmount.'';

    $wpjsonurlposts = site_url() . '/wp-json/wp/v2/posts';
    $wpjsonurlcatgories = site_url() . '/wp-json/wp/v2/categories?filter[orderby]=title&order=asc&hide_empty=true';

  ?>


    <script type="text/javascript">

      var filterUsage = false,
          initPostAmount = "<?php echo $initPostAmount ?>";

      const site_url = "<?php echo site_url() ?>";

      // Loadmore posts

      var loadMoreBtn =	document.querySelector(".j-loadmore");

      <?php
        if (isset($atts["usefilter"])){?>
            var filterUsage = true;
        <?php };
      ?>

      // Total Post Count * XP-WP-Total

      totalPostCount()

      function totalPostCount(){
        var client = new XMLHttpRequest(),
            wpjsonurlposts = "<?php echo $wpjsonurl ?>";

        // if filtered view is category

        if (contenttarget.getAttribute("post-cat") > 0 ){
          var catID = contenttarget.getAttribute("post-cat"),
              wpjsonurlposts = site_url + "/wp-json/wp/v2/posts?categories=" + catID + "&per_page=" + initPostAmount + "";
        }

        client.open('GET', wpjsonurlposts, true);
        client.send();

        client.onreadystatechange = function() {
          if(this.readyState == this.HEADERS_RECEIVED) {
            var totalPostCount = client.getResponseHeader('X-WP-Total');
            document.getElementById("contenttarget").setAttribute("post-count", totalPostCount );
          }
        }
      }

      // Post Categories

      if (filterUsage){ getPostCategories() };

      function getPostCategories(){
        var postCategories = new XMLHttpRequest();

        postCategories.open('GET', '<?php echo $wpjsonurlcatgories ?>', true);
        postCategories.send();

        postCategories.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

              var catFilter = document.createElement("form"),
                  filterSelect = document.createElement("select"),
                  catObj = JSON.parse(this.response);

              filterSelect.classList.add("filterselect");

              catObj.forEach(function (catItem) {
                var optionObj = document.createElement("OPTION");
                optionObj.text = catItem.name;
                optionObj.value = catItem.id;
                filterSelect.appendChild(optionObj);
              });

              // Reset button

              var optionObjReset = document.createElement("OPTION");
              optionObjReset.text = "All Categories";
              optionObjReset.value = "-1";

              filterSelect.insertBefore(optionObjReset, filterSelect.firstChild);
              catFilter.appendChild(filterSelect);

              // Set reset as index
              filterSelect.selectedIndex = "0";

              // Insert filter
              document.getElementById("contenttarget").appendChild(catFilter);

              // Filter selector

              var filterSelect =	document.querySelector(".filterselect");
              filterSelect.addEventListener("change", addCatFilter);

              function addCatFilter(){
                var filterTriggerd = true;

                document.querySelectorAll(".postItem").forEach(function (prevItem) {
                  prevItem.remove();
                });

                document.getElementById("contenttarget").setAttribute("post-cat", this.options[this.selectedIndex].value );

                // reset totalPostCount & WP JSON URL

                totalPostCount();
                requestPosts("reset");
                countRenderedPosts();

              };
          }
        };

      }

      // Request the Posts

      // initial
      requestPosts();

      function requestPosts(value){

        if (typeof pagenumber === 'undefined' | value === "reset"  )  {
          pagenumber = 1;
        }else{
          pagenumber++;
        }

        var xhttp = new XMLHttpRequest(),
            wpjsonurl = "<?php echo $wpjsonurl ?>",
            wpjsonurl = wpjsonurl + '&page=' + pagenumber;

        if (contenttarget.getAttribute("post-cat") > 0 ){
          var wpjsonurl = site_url + "/wp-json/wp/v2/posts?categories="+contenttarget.getAttribute("post-cat")+"&per_page="+initPostAmount+"&page="+ pagenumber;
        };

        xhttp.open('GET', wpjsonurl, true);
        xhttp.send();

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

                  blogItem.classList.add("postItem");

                  document.getElementById("contenttarget").appendChild(blogItem);

            });
              countRenderedPosts();
          }

        };
      }

      function countRenderedPosts(){

        if (document.querySelector(".j-loadmore")){document.querySelector(".j-loadmore").remove(1);}
        renderLoadMore();

      }

      function renderLoadMore(){

        var linkObj = document.createElement("a"),
        linkTitle = document.createTextNode("Load more");
        linkObj.appendChild(linkTitle);

        linkObj.classList.add("cta");
        linkObj.classList.add("j-loadmore");

        document.getElementById("contenttarget").appendChild(linkObj);

        document.querySelector(".j-loadmore").addEventListener('click', function(e){
          e.preventDefault()

          if (parseInt(document.getElementById("contenttarget").getAttribute("post-count")) !== document.querySelectorAll(".postItem").length){
            requestPosts();
            countRenderedPosts();
          }else{
            document.querySelector(".j-loadmore").remove(1);
          }
        });

      }

    </script>
    <?php
};

add_shortcode( 'restApiPostLoader', 'restApiPostLoader' );
