<h1>Kirkman's Blog</h1>
Use the options on the right to log into the blog and peform other options when they are available.  Below is a list of all of the current blog postings.
<ul>
	<?php 
		foreach ($blog_posts as $post):
			echo '<li><a href="'.base_url().'blog/posts/'.$post->id.'">'.$post->title.'</a></li>';
		endforeach;
	?>
</ul>