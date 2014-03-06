<?php
# Commodity, District and Market Lookup {array format}
include_once ("select_lookup.php");

# Default Commodity
$type=(@$_GET['commodity']) ? : "Rice";
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="data.gov.in Commodity Daily Price Details API">
	<meta name="author" content="ngiriraj">

	<!-- INCLUDES JS/CSS -->
	<!-- jquery -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
	
	

	<style>
	.author {
    background-color: #FFFFFF;
    border-radius: 500px;
    box-shadow: 0 1px 3px #C3C3C3;
    margin: 5px;
    overflow: hidden;
    padding: 5px;
    transition: box-shadow 0.2s ease-in-out 0s;
	}
	</style>
    <!-- Bootstrap core CSS -->
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script type="text/javaScript">
	
		$(document).ready(function(){
		
			$("#datashow").html(loading);
			
			var pin = $("#commodity_input").val();
			$.ajax({
				url: 'commodity.php?type=Commodity&val='+pin,				
				success: function ( data ) {
					$("#datashow").html(data);
					
				}
			});
			
		var loading = "<tr><td align='center'><img src='http://www.edsheeran.com/_img/loading-sml.gif'></td></tr>";
		$(".search").live("click",function(e){
			$("#datashow").html(loading);
			
			var pin = $("#commodity_input").val();
			$.ajax({
				url: 'commodity.php?type=Commodity&val='+pin,				
				success: function ( data ) {
					$("#datashow").html(data);
					
				}
			});
			
		});

		
		var loading = "<tr><td align='center'><img src='http://www.edsheeran.com/_img/loading-sml.gif'></td></tr>";
		$(".search_market").live("click",function(e){
			$("#datashow_market").html(loading);
			
			var pin = $("#market_input").val();
			$.ajax({
				url: 'commodity.php?type=Market&val='+pin,				
				success: function ( data ) {
					$("#datashow_market").html(data);
					
				}
			});
			
		});
		
		var loading = "<tr><td align='center'><img src='http://www.edsheeran.com/_img/loading-sml.gif'></td></tr>";
		$(".search_district").live("click",function(e){
			$("#datashow_district").html(loading);
			
			var pin = $("#district_input").val();
			$.ajax({
				url: 'commodity.php?type=District&val='+pin,				
				success: function ( data ) {
					$("#datashow_district").html(data);
					
				}
			});
			
		});
		
		});
	</script>
  </head>

	<body>
		<!-- Navigator -->
		<div class="navbar navbar-default">
        <div class="container">
		<img class="author" src="http://www.tracyremelius.com/wp-content/uploads/2013/08/whole-grains.jpg" width="100px">
          <div class="navbar-header" style='height:70px;'>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
			
            <a class="navbar-brand">Commodity Market<BR> Price Daily</a>
          </div>
          
        </div>
      </div>

		<p style="padding-left:15px">Source : data.gov.in</p>
		<p style="padding-left:15px">Last update on 05-Mar-2014</p>
    
								
								</table>
        <div class="col-lg-8">
            <div class="alert alert-dismissable alert-success">

			<form class="bs-example form-horizontal">
				<div class="bs-example">
					  <ul class="nav nav-tabs" style="margin-bottom: 15px;">
						<li class="active"><a href="#pincode_tab" data-toggle="tab">Commodity</a></li>
						<li><a href="#location_tab" data-toggle="tab">Marketwise</a></li>               
						<li><a href="#taluk_tab" data-toggle="tab">Districtwise</a></li>               
					  </ul>
				  
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="pincode_tab">
							<div class="form-group " id="pinwise">
								<div class="col-lg-7">
									
									<select id="commodity_input" class="form-control">
										<?php
											asort($commodity_name);
											foreach(array_unique($commodity_name) as $cname){
												if ($type == $cname){
													echo "<option selected='selected' value='".$cname."'>".$cname."</option>";
												}else{
													echo "<option value='".$cname."'>".$cname."</option>";
												}
											}
										?>
										
  
									</select>
								</div>
								
								<div class="col-lg-1">
									<button type="button" class="btn btn-primary search" >Search</button>
								</div>
							</div>
						  
							<div class="table-responsive">
								<table id="datashow" class="table table-striped table-bordered" style="width:100%">
								
								</table>
							</div>
						</div>
					
					<div class="tab-pane fade" id="location_tab">
						<div class="form-group " id="locationwise">						
							<div class="col-lg-7">
								<select id="market_input" class="form-control">
										<?php
											asort($market_name);
											foreach(array_unique($market_name) as $cname){
												echo "<option value='".$cname."'>".$cname."</option>";
											}
										?>
										
  
									</select>
						  	</div>
							
							<div class="col-lg-1">
								<button type="button" class="btn btn-primary search_market" >Search</button>
							</div>
						</div>
						
						<div class="table-responsive">
							<table id="datashow_market" class="table table-striped table-bordered" style="width:100%">
							</table>
						</div>
					</div>
					
					
					<div class="tab-pane fade" id="taluk_tab">
						<div class="form-group " id="Talukwise">
							<div class="col-lg-7">
								<select id="district_input" class="form-control">
										<?php
											asort($district_name);
											foreach(array_unique($district_name) as $cname){
												echo "<option value='".$cname."'>".$cname."</option>";
											}
										?>
										
  
									</select>
							</div>
							
							<div class="col-lg-1">
								<button type="button" class="btn btn-primary search_district" >Search</button>
							</div>
						</div>
						
						<div class="table-responsive">
							<table id="datashow_district" class="table table-striped table-bordered" style="width:100%">
							
							</table>
						</div>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
         
         
          <div class="col-lg-4">
              <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Social Media</h3>
              </div>
              <div class="panel-body">
                	<p align='right'>
	<span id="fb-root"></span>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=482962811753376";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, "script", "facebook-jssdk"));</script>
		
		<div class="fb-like"  data-layout="button_count" data-width="450" data-show-faces="true" data-font="segoe ui" data-href=""></div>

		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
		<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
		<script type="IN/Share" data-counter="right" ></script>
		<!-- Place this tag where you want the share button to render. -->
		<div class="g-plus" data-action="share" data-annotation="bubble" ></div>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="kayalshri"  data-text=" (source : data.gov.in) ">Tweet</a>
		</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">About Data</h3>
              </div>
              <div class="panel-body">
					<h3>Current Daily Price of Various Commodities from Various Markets (Mandis)</h3>
					The data refers to prices of various commodities. It has the wholesale maximum price, minimum price and modal price on daily basis. This dataset is generated through the AGMARKNET Portal (http://agmarknet.nic.in), which disseminates daily market information of various commodities.
              </div>
            </div>
			
		
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">About Author</h3>
              </div>
              <div class="panel-body">
   
	   <center>

        
        <img class="author" src="http://ngiriraj.com/socialMedia/oauthlogin/giri.jpeg">
        <h1>Giriraj Namachivayam</h1>
        <p class="lead">Email : kayalshri@gmail.com, Website: http://ngiriraj.com</p><br>
					<a href="http://www.facebook.com/giri.raj.1656" target="_blank"><img src="http://ngiriraj.com/album/images/social/facebook.png"></a>
					<a href="https://github.com/kayalshri/" target="_blank"><img src="http://ngiriraj.com/album/images/social/github.png"></a>
					<a href="https://plus.google.com/118120279875027579783" target="_blank"><img src="http://ngiriraj.com/album/images/social/googleplus.png"></a>
					<a href="http://www.linkedin.com/in/giriraaj" target="_blank"><img src="http://ngiriraj.com/album/images/social/linkedin.png"></a>
					<a href="https://twitter.com/kayalshri" target="_blank"><img src="http://ngiriraj.com/album/images/social/twitter.png"></a>
					<a href="http://www.vimeo.com/user16459042" target="_blank"><img src="http://ngiriraj.com/album/images/social/vimeo.png"></a>
					<a href="http://www.youtube.com/user/kayalshri" target="_blank"><img src="http://ngiriraj.com/album/images/social/youtube.png"></a>
					<a href="http://www.flickr.com/photos/kayalshri" target="_blank"><img src="http://ngiriraj.com/album/images/social/flickr.png"></a>
					<a href="http://girirajcollections.blogspot.in" target="_blank"><img src="http://ngiriraj.com/album/images/social/rss.png"></a>
        </center>
<BR>
		Disclaimer: The information is the latest from data.gov.in. We request the users to check with the relavent site before using it.
The author is not resposible for anything regarding the information. Therefore, future liability claims due to the information given will be rejected.
<br><BR>
<script type="text/javascript" src="http://feedjit.com/serve/?vv=1022&amp;tft=3&amp;dd=0&amp;wid=470e280ec9d92404&amp;pid=0&amp;proid=0&amp;bc=DCE0C5&amp;tc=303030&amp;brd1=CED6A3&amp;lnk=8A8A03&amp;hc=BABD93&amp;hfc=706B38&amp;btn=4F4F4F&amp;ww=200&amp;wne=2&amp;wh=Live+Traffic+Feed&amp;hl=0&amp;hlnks=0&amp;hfce=0&amp;srefs=1&amp;hbars=0&amp;went=10"></script>
              </div>
            </div>
          </div>
        </div>
		  
		  

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Latest compiled and minified CSS http://bootswatch.com/superhero/bootstrap.min.css  //netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css -->
<link rel="stylesheet" href="http://bootswatch.com/shamrock/bootstrap.min.css">

<!-- Optional theme 
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
-->

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</body>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38615761-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</html>
