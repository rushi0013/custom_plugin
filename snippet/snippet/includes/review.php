<h1 class="wp-heading-inline">Review snippet</h1>
<form action="<?php menu_page_url('snippet-menu-function') ?>" method="post">
	
	<table class="wp-list-table"  style="float: left;width: 70%"> 
		<tbody>
			<tr>
				<td><label>Name</label></td>
				<td><input required="required" type="text" name="name" class="form-control"  value="" style='width: 100%' placeholder="Name"></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><input required="required" type="text" name="email" class="form-control"  value="" style='width: 100%' placeholder="Email"></td>
			</tr>
			<tr>
				<td><label>Review</label></td>
				<td><textarea required="required" class="form-control"  name="description" rows="5"  style='width: 100%;height: 150px;' placeholder="Review"></textarea></td>
			</tr>
			<tr>
				<td><label>Rating</label></td>
				<td>
					<fieldset class="starability-basic">
				      
				      <input type="radio" id="rate1" name="review" value="1" checked="checked">
				      <label for="rate1">1</label>

				      <input type="radio" id="rate2" name="review" value="2">
				      <label for="rate2">2</label>

				      <input type="radio" id="rate3" name="review" value="3">
				      <label for="rate3">3</label>

				      <input type="radio" id="rate4" name="review" value="4">
				      <label for="rate4">4</label>

				      <input type="radio" id="rate5" name="review" value="5">
				      <label for="rate5">5</label>

				      <span class="starability-focus-ring"></span>

				    </fieldset>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="snippet_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
					<input type="hidden" name="id" value="<?php echo isset($_GET['review']) ? $_GET['review'] : '' ?>">
					<input type="submit" name="add_review" value="submit" class="page-title-action">
					<a href="<?php menu_page_url('snippet-menu-function') ?>" class="page-title-action">Cancel</a>
				</td>
			</tr>
		</tbody>
	</table>
	
</form>