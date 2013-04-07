    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['Provinces', 'max price ', 'Avg Price '],
   	 
	<?php 
	
		$query = "SELECT distinct(`district`) FROM `wheat` WHERE `state` = '".$_GET['state']."'" ;
		$result = mysql_query($query);
	//echo $query ; 
		while($row = mysql_fetch_assoc($result))
			{
				$query2="SELECT MAX(`max_price`) FROM  `wheat`  where `district` ='".$row['district']."' " ; 
				//echo $query2 ;
				$result1 = mysql_query($query2);
				$row1 = mysql_fetch_assoc($result1);
				
				$query3="SELECT MAX(`modal_price`) FROM  `wheat`  where `district`= '".$row['district']."' " ; 
				//echo $query3 ;
				$result2 = mysql_query($query3);
				$row2 = mysql_fetch_assoc($result2);


				echo "['".$row['district'] ."',".$row1['MAX(`max_price`)'].",".$row2['MAX(`modal_price`)']."],\n";
			}
	?>
      ]);

      var options = {
        region: 'IN',
        displayMode: 'markers',
        colorAxis: {colors: ['green', 'blue']}
      };
	
      var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    };
    </script>
    <div class="row">
	<div class="span3">
		<p>Wheat Cost for last year for all districts </p>
		<b>Current state :: <?php echo $_GET['state']; ?> </b>
		<select id="states">
		<?php $states = get_states('wheat');
			while($r = mysql_fetch_array($states)){
				echo '<option value="'.$r['state'].'">'.$r['state'].'</option>';
			}
		?>
		</select>
	</div>
	<div class ="span8">
		<?php if (isset($_GET['state']))
		echo '<div id="canvas"><div id="visualization"><div id="chart_div" style="width: 900px; height: 500px;"></div></div></div>' ; ?> 
   </div>
</div>

<script type="text/javascript">
	$('#states').change(function (e){
		window.location.replace($(this).val());
	});
</script>
