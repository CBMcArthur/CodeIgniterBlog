<h1><?php echo $blog_posting->title ?></h1>
<p><b>Author:</b> <?php echo $blog_posting->username ?></p>
<p><?php echo $blog_posting->body ?></p>
<h2>Comments</h2>
<ol>
<?php 
	if (count($comments) == 0):
		echo "<b>No comments have been made yet.</b>";
	else:
		foreach ($comments as $comment):
			echo "<li>From ".$comment->username.": ".$comment->comment."</li>";
		endforeach;
	endif;
?>
</ol>
<?php
	if ($this->session->userdata('user_type') == 3):
		echo '<p><a href="'.base_url().'blog/comment/'.$blog_posting->id.'">Leave a comment!</a></p>';
	endif;
?>
