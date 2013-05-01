<h1>Comment on <a href="<?php echo base_url() ?>blog/posts/<?php echo $blog_info->id ?>">"<?php echo $blog_info->title ?>"</a></h1>
<p>Use the form below to make your comment.</p>
<div style="color:red;"><?php echo validation_errors(); ?></div>
<form method="post" action="<?php echo base_url() ?>blog/save_comment">
	Comment: <br /><textarea name="comment" rows="20" cols="60"></textarea><br />
	<input type="hidden" name="blog_id" value="<?php echo $blog_info->id ?>">
	<input type="submit" name="save" value="Save Posting">
</form>