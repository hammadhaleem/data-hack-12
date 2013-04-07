  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 <script>

function toggleSlides(){
	$('.toggler').click(function(e){
		var id=$(this).attr('id');
		var widgetId=id.substring(id.indexOf('-')+1,id.length);
		$('#'+widgetId).slideToggle();
		$(this).toggleClass('sliderExpanded');
		$('.closeSlider').click(function(){
				$(this).parent().hide('slow');
				var relatedToggler='toggler-'+$(this).parent().attr('id');
				$('#'+relatedToggler).removeClass('sliderExpanded');
		});
	});
};
$(function(){
	toggleSlides();
});

</script>

<style >
	.slider{
		display:none;
	}
	.collapseSlider{
		display:none;
	}
	.sliderExpanded .collapseSlider{
		display:block;
		
	}
	.sliderExpanded .expandSlider{
		display:none;
}

    
</style>	
	<div class="tabbable">
		<div class="tab-content">
			<div class="span3">
				<h4>Crop Details </h4>
					<!--<p><?php include "read.php" ; ?></p>-->
				 <div class="slider" id="slideOne">
					<!--<p><?php include "edit.php" ; ?></p>-->
				 </div>
 				<p class="toggler" id="toggler-slideOne">
					<b><span class="expandSlider">Know More </span><span class="collapseSlider">HIDE</span></b>
				</p>
				</hr>

				
			</div>
			<div class="span3">
				<ul>
					<h3>Visualizations </h3>
						
					<ul>
						<li><a href="/wheat/state/Assam">Wheat Prices Visualization </a></li>
						<li><a href="/rice/state/Assam">Rice Prices Visualization </a></li>
						<li><a href="/viz">Crop prices  realizations </a></li>
					<ul>
						<a href="/wheat/state/Assam"><b>
							<img src="http://hack-12-plan.herokuapp.com/img/viz.png" width="200" height="150" />
							Detailed Analysis &visualizations </b></a>
							
				</ul>
			</div>

		</div><!-- /.tab-content -->
	</div><!-- /.tabbable -->
