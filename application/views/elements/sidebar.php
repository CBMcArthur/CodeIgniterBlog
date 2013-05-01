<div class="sidebar" style="float:right";>
  <p>Blog Options:</p>
  <ul>
	<?php	
		foreach ($sidebar_options as $option => $href):
			echo '<li><a href="'.$href.'">'.$option.'</a></li>';
		endforeach;
	?>
  </ul>
</div>