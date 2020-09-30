<h1 class="wp-heading-inline">Request help</h1>
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
				<td><label>Title</label></td>
				<td><input required="required" type="text" name="title" class="form-control"  value="" style='width: 100%' placeholder="Title"></td>
			</tr>
			<tr>
				<td><label>Description</label></td>
				<td><textarea required="required" class="form-control"  name="description" rows="5"  style='width: 100%;height: 150px;' placeholder="Description"></textarea></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="add_request_help" value="submit" class="page-title-action">
					<a href="<?php menu_page_url('snippet-menu-function') ?>" class="page-title-action">Cancel</a>
				</td>
			</tr>
		</tbody>
	</table>
	
</form>