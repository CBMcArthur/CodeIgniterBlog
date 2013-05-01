<h1>Create a blog posting</h1>
<p>Use the form below to write your blog posting.  Both the blog's title and its body is required.</p>
<div style="color:red;"><?php echo validation_errors(); ?></div>
<form method="post" action="<?php echo base_url() ?>blog/save">
	Title: <input type="text" name="title" size="72"><br />
	Body:<br/><textarea name="body" rows="20" cols="60"></textarea><br />
	<input type="submit" name="save" value="Save Posting">
</form>