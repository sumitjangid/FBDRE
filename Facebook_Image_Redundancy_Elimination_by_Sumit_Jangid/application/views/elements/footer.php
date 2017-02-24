<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
		
		<link href="<?php echo base_url();?>/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="<?php echo base_url();?>/css/custom.css" rel="stylesheet">
		
		<!-- Custom Fonts -->
		<link href="<?php echo base_url();?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">



		<!-- About Section -->
		<section class="success" id="about">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>About</h2>
						<hr class="star-light">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 ">
						<div class="col-lg-20 text-center">
						<div class="img-box">
						<img class="col-lg-20 text-center" class="img-responsive img-circle" alt="" src="<?php echo base_url('img/Sumit.png')?>">
							<div class="col-lg-20 text-center">
							<h6>Developer</h6><h6>Sumit Jangid</h6>	
							<div class="col-lg-20 text-justify">	
							<p> <font size="2" color="white"><p style="font-family:Lucida Calligraphy;">Hello! I'm a designer and front end developer. 
							Currently achieving a Masters degree in Computer Science from California State University, Fullerton.
							I specialize in designing and developing user interfaces and digital products. My attention to detail is extreme and 
							I love to continually learn what's new all things design-related.
							I have a strong passion for the creativity and discipline that goes into front-end development.
							Keeping in mind scalability and clean code that is maintainable and readable.
							In my free time, I enjoy being outdoors, listening to music, traveling and experiencing new and exciting adventures.
							</p></font></p>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="col-lg-20 text-center">
					<div class="img-box">
						<img class="col-lg-20 text-center" class="img-responsive img-circle" alt="" src="<?php echo base_url('img/Wang.png')?>">
							<div class="col-lg-20 text-center">
							<h6>Advisor</h6><h6>Dr. Shawn X. Wang</h6>
							<div class="col-lg-20 text-justify">
							<p> <font size="2" color="white"><p style="font-family:Lucida Calligraphy;">Dr. Shawn X. Wang is a professor of computer science at Cal State Fullerton. 
							Dr. Wang holds a BS in mathematics from Xiamen University, an MS in computer science from Fudan University, and a PhD in computer and information science 
							from New Jersey Institute of Technology. His research interests include databases, knowledge discovery, data mining, and bioinformatics. 
							Dr. Wang is a member of ACM, ACM SIGMOD, and IEEE Computer Society. He is listed in Who's Who in Science and Engineering and Who's Who in America. 
							Dr. Wang is a member of the Academic Senate. 
							</p></font></p>	
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="col-lg-20 text-center">
					<div class="img-box">
						<img class="col-lg-20 text-center" class="img-responsive img-circle" alt="" src="<?php echo base_url('img/Cong.png')?>">
						<div class="col-lg-20 text-center">
							<h6>Reviewer</h6> <h6>Dr. Bin Cong</h6>
							<div class="col-lg-20 text-justify">
							<p> <font size="2" color="white"><p style="font-family:Lucida Calligraphy;">Dr. Bin Cong received the Bachelor's degree in Computer Science from Nanjing University in 1982, 
							and his Ph.D degree in Computer Science from University of Texas at Dallas in 1991.

							From 1991 to 1997, Dr. Cong was a member of the Computer Science Faculty at South Dakota State University, where he reached tenured Associated Professor position. 
							He served as an Associate Professor at Department of Computer Science in Cal Poly, San Luis Obispo from 1997 to 1998. Since August 1998, 
							Dr. Cong has been a faculty member of Computer Science Department at Cal State Fullerton, he received early promotion and tenure in 2000 and 2001. 
							</p></font></p>
							</div>
						</div>	
					</div>
				</div>
				</div>
			</div>
		</section>

		<!-- Contact Section -->
		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Contact Me</h2>
						<hr class="star-primary">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
						<!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
						<form name="sentMessage" id="contactForm" novalidate>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Name</label>
									<input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Email Address</label>
									<input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Phone Number</label>
									<input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Message</label>
									<textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<br>
							<div id="success"></div>
							<div class="row">
								<div class="form-group col-xs-12">
									<button type="submit" class="btn btn-success btn-lg">Send</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<!-- Footer -->
		<footer class="text-center">
			<div class="footer-above">
				<div class="container">
					<div class="row">
						<div class="footer-col col-md-6">
							<h3>Location</h3>
							<p>California State University, Fullerton<br>800 N. State College Blvd.<br>Fullerton, CA 92831</p>
						</div>
						<div class="footer-col col-md-6">
							<h3>Share Around the Web</h3>
							<ul class="list-inline">
								<li><a href="https://www.facebook.com/sharer.php?u=http://ec2-52-32-195-251.us-west-2.compute.amazonaws.com/" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a></li>
								<li><a href="https://plus.google.com/share?url=http://ec2-52-32-195-251.us-west-2.compute.amazonaws.com/" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a></li>
								<li><a href="https://twitter.com/home?status=http%3A//ec2-52-32-195-251.us-west-2.compute.amazonaws.com/" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a></li></li>
								<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A//ec2-52-32-195-251.us-west-2.compute.amazonaws.com/&title=Image%20Redundancy%20Elimination&summary=Application%20which%20keeps%20Image%20Redundancy%20in%20control.&source=" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-below">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							Copyright &copy; <?php echo date('Y');?> - Image Redundancy Elimination. All rights reserved.
						</div>
						<div class="col-sm-6 text-right">
							<p><a href="<?php echo base_url('#primary');?>"  data-toggle="modal"> <font size="3">Privacy Policy</font> </a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>


					<!-- POPUP Terms of Use and Privacy Policy  -->

			<!-- Modal -->
			<div class="modal fade" id="primary" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header modal-header-primary">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                <h1> Privacy Policy</h1>
			            </div>
			            <div class="modal-body">
			<!-- privacy goes here-->
			              

			<h3>What informaton do we collect?</h3>

			<p>We collect information after the permission granted by you when you register on our site or fill out a form.
			    Once you are logged-in using your Facebook account managed and secured by Facebook, Inc., 
			    we will then use your Profile Name and Profile Picture to display your details only to you. 
			    Once you click on <b>'Fetching Images'</b> link, your album pictures will be used to find the redundancy of 
			    the images and links to the duplicate images will be provided.</p>

			    <h3>What do we use your information for?</h3>
			    <p>I am developing this application as my final year graduate project. 
			        I will be using your album pictures to compare within them and find out the duplication of the images and 
			        provide you the links of the redundant images.</p>

			        <h3>How do we protect your information?</h3>
			        <p>We will be using MD5 Message-Digest algorithm as it is a widely used 
			            Cryptogrophic hash function producing a 128-bit (16-byte) hash value, typically expressed 
			            in text format as a 32 digit hexadecimal number. MD5 has been utilized in a wide variety of Cryptographic applications, 
			            and it is also commonly used to verify data integrity.
			        </p>

			        <h3>Do we disclose any information to outside parties?</h3>
			        <p>NO, we do not sell, trade, or otherwise transfer any of your personal identifiable 
			            information or Facebook information to any outside parties. This project is solely for academic evaluation purpose.</p>

			        <h3>Terms and Conditions.</h3>
			        <p>Strictly following to Facebook Inc. terms and conditions.</p>

			        <h3>Your Consent.</h3>
			        <p>By using our site, you consent to our privacy policy.</p>

			        <h3>Changes to our Privacy Policy.</h3>
			        <p>If we decide to change our privacy policy, we will post those changes on this page. This policy was last modified on <b>03/01/2016.</b></p>

			        <h3>Contact Us</h3>
			        <p >If there are any questions regarding this privacy policy you may contact us using the information below.</p>

			        <p>California State University, Fullerton <br/>800 N. State College Blvd.<br/>Fullerton, CA 92831. <br/>USA <br/>Email: 
			            <a href="<?php echo base_url('#contact')?>" ><font size="3">sumit.jangid@csu.fullerton.edu</font> </a></p>  


			            </div>
			            <div class="modal-footer">
			                <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Close</button>
			            </div>
			        </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->











		<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
		<!--<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">-->
		<div class="scroll-top page-scroll">
			<a class="btn btn-primary" href="#page-top">
				<i class="fa fa-chevron-up"></i>
			</a>
		</div>

		<!-- jQuery -->
		<script src="<?php echo base_url();?>/js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="<?php echo base_url();?>/js/classie.js"></script>
		<script src="<?php echo base_url();?>/js/cbpAnimatedHeader.js"></script>

		<!-- Contact Form JavaScript -->
		<script src="<?php echo base_url();?>/js/jqBootstrapValidation.js"></script>
		<script src="<?php echo base_url();?>/js/custom.js"></script>
	</body>
</html>