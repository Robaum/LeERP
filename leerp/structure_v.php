<html>
  <head>
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages:['orgchart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
        data.addRows([
        <?php
        	//echo "['Alice', '', ''],";
        	//echo "['Mark', 'Alice', ''],";
        	//echo "['Brad', 'Alice', '']";
        	include('connect.php');
        	$tbl_name="structure";
			$sql="SELECT * FROM $tbl_name";
			$result=mysql_query($sql);
			$data = '';
			while($row = mysql_fetch_object($result)){
				$data.= "['".$row->posicion."', '".$row->jefe."', ''],";
			}
			echo substr($data, 0 , -1);
        ?>
        ]);
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        chart.draw(data, {allowHtml:true});
      }
    </script>
  </head>
<!--
[{v:'Mike', f:'Mike<div style="color:red; font-style:italic">President</div>'}, '', 'The President'],
          [{v:'Jim', f:'Jim<div style="color:red; font-style:italic">Vice President</div>'}, 'Mike', 'VP'],
          ['Alice', 'Mike', ''],
          ['Bob', 'Jim', 'Bob Sponge'],
          ['Carol', 'Bob', '']
-->
  <body>
    <div id='chart_div'></div>
  </body>
</html>

