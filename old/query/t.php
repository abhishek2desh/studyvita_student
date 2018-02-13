<style>
	#feedback { font-size: 1.4em; }
	.selectable .ui-selecting { background: #FECA40; }
	.selectable .ui-selected { background: #F39814; color: white; }
	.selectable { list-style-type: none; margin: 0; padding: 0; width: 100px; }
	.selectable li { margin: 3px; padding: 0px; float: left; width: 15px; height: 15px; font-size: 1em; text-align: center; }
</style>
<script>
	
	$(function() 
	{
		$( ".selectable" ).selectable();
	});
</script>
<?php
//$s2 = 25;
$s2 = $_GET['s'];
?>
<table style="height:50px;">
	
<?php
for($i=1; $i<=$s2; $i++)
{
	?>
	<tr>
		<td>
		
	<?php
	echo "<br />".$i;
	?>
		</td>
		<td><ol class="selectable">
	<li class="ui-state-default">A</li>
	<li class="ui-state-default">B</li>
	<li class="ui-state-default">C</li>
	<li class="ui-state-default">D</li>
	</ol>
		</td>
	</tr>
	<?php	
}
?>
</table>