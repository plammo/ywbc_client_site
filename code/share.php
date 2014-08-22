<?php

require_once('includes/home_head.php');

?>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

<div class="row row_share_0 share">
<div class="col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
<h1> let's share</h1>
</div>
</div>

<div class="row row_share_1 share">
<div class="col-xs-2 col-xs-offset-1 col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5 col-lg-2 col-lg-offset-5">
<img src="images/Flickr_bw.png" alt="pic" title="pic of flickr icon" class="img-responsive">
</div>
</div>


<div class="row share_row_2 share">
	<div class="hidden-xs col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 images" id="data_container"></div>
</div>


<!--<div class="row row_share_3 share">
<div class="col-xs-2 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
<img src="images/fb_white.png" alt="pic" title="pic of flickr icon" class="img-responsive">
</div>
</div>


<div class="row row_share_4 share">
<div class="col-xs-2 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
<img src="images/twit_white.png" alt="pic" title="pic of flickr icon" class="img-responsive">
</div>
</div>-->


<div class="row row_share_7 share">
<div class="col-xs-2 col-xs-offset-1 col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2">
<img src="images/comm.png" alt="pic" title="pic of flickr icon" class="img-responsive">
</div>
</div>

<div class="row row_share_6 share">
<div class="col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
<input type="text" class="form-control input-lg" placeholder="Customer Endorsement">
<br>
<input type="text" class="form-control input-lg" placeholder="Customer Endorsement">
</div>
</div>


<div class="row row_share_3 share">
<div class="col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
<h2> leave a comment</h2>
</div>
</div>



<div class="col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
<input type="text" class="form-control input-lg" placeholder="Text input">
</div>






<div class="row row_share_4 share">
<div class="col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
<h2> or follow us on</h2>
</div>
</div>

<div class="row row_share_5 share">
	<div class="col-xs-2 col-xs-offset-1 col-sm-2 col-sm-offset-4 col-md-2 col-md-offset-4 col-lg-2 col-lg-offset-4">
	<img src="images/fb_white.png" alt="pic" title="pic of flickr icon" class="img-responsive">
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-0 col-lg-2 col-lg-offset-0">
	<img src="images/twit_white.png" alt="pic" title="pic of flickr icon" class="img-responsive">
</div>
</div>






<script type="text/javascript">

$(document).ready(function(){

		var id = '';

		getImages(id);



	function getImages(id){


		$.ajax({

			type:'GET',
			url: 'https://api.flickr.com/services/feeds/photos_public.gne',
			data: 'id='+id+'&format=json&jsoncallback=?',
			success: function(feed){

				
				var thumbs = [];

				$.each(feed.items, function(i, item){

				var imgs = (item.media.m).replace(
						/^(.*?)_m\.jpg/,
						'<a href="$1.jpg"><img src="$1_s.jpg" /></a>');

					//push the images into the thumbs array
					thumbs.push(imgs);
					
				});

				//output the contents of the thumbs array to the html element data_container
				$('#data_container').html(thumbs.join(''));

			},

			dataType: 'jsonp'
		});

	}





});

</script>





<?php

require_once('includes/footer.php');

?>