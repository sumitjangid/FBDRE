<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Custom CSS -->
<link href="<?php echo base_url();?>/css/custom.css" rel="stylesheet">

		<!-- Header -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="userPic"><img class="img-responsive" src="<?php echo $fb_data["picture"]["url"];?>" alt=""/></div>
						<div class="intro-text">
							<span class="name"><h2>Welcome</h2></span>
							<hr class="star-light">
							<span class="name"><h2><?php echo $fb_data["name"];?></h2></span>
						</div>
					</div>
				</div>
			</div>
		</header>
		<section id="portfolio">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Services</h2>
						<hr class="star-primary">
						<a href="<?php echo base_url('user/permissions');?>"><i class="fa fa-search-plus"></i> Fetch Images from Facebook</a>
						<hr class="star-primary">
					</div>
				</div>
				<div class="row" id="fetchImages" style="display:none;">
					<div class="col-sm-12">
						<h3>Fetching Images</h3>
						<div class="bs-component">
							<div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width:100%" id="imgProgess"></div></div>
						</div>
					</div>
				</div>
				<div class="row" id="duplicateFound">
					<?php if(count($duplicate) > 0):foreach($duplicate as $record):?>
					<div class="col-sm-1 portfolio-item">
						<a href="#FB_<?php echo $record['fb_id']?>" class="portfolio-link" data-toggle="modal">
							<div class="caption"><div class="caption-content"><i class="fa fa-search-plus fa-1x"></i></div></div>
							<img src="<?php echo $record['url']?>" class="img-responsive" alt="">
						</a>
					</div>
					<?php endforeach;else:?>
						<h1>NO DUPLICATE FOUND.</h1>
					<?php endif;?>
				</div>
			</div>
		</section>
		<div id="FB_popups">
		<?php if(count($duplicate) > 0):foreach($duplicate as $record):?>
		<div class="portfolio-modal modal fade" id="FB_<?php echo $record['fb_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<div class="close-modal" data-dismiss="modal"><div class="lr"><div class="rl"></div></div></div>
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body">
								<h2><?php echo ($record['album_name'])?$record['album_name']:"N/A"?></h2>
								<hr class="star-primary">
								<img src="<?php echo $record['large_img']?>" class="img-responsive img-centered" alt="">
								<p>This Image found duplicate on <a href="http://fb.com/<?php echo $record['fb_id'];?>" target="_blank">Facebook</a>. Links of the image::</p>
								<ul class="list-inline item-details">
									<?php foreach(explode(',',$record['fb_ids']) as $key=> $imgId):?>
									<li><strong><a href="http://fb.com/<?php echo $imgId?>" target="_blank">Link <?php echo $key+1?></a></strong> | </li>
									<?php endforeach;?>
								</ul>
								<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; endif;?>
		</div>
		<script>
			var TotalImages = <?php echo $total_images?>;
			var ImgToFetch = <?php echo $imgToFetch?>;
			var DuplicateFound = [];
		</script>
