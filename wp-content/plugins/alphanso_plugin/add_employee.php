<?php
function add_new_employee() {

    if (isset($_POST['insert'])) {

        global $wpdb;
        $name = $_POST['name'];
        $role = $_POST['role'];
        $contact = $_POST['contact'];
//        var_dump($_POST);

        $table_name = $wpdb->prefix . 'employee_list';
        $wpdb->insert(
                "$table_name", //table
                array('name' => $name, 'role' => $role, 'contact' => $contact), //data
                array('%s', '%s', '%s') //data format
        );

        $message.="Emplotee Added";
}?>
<style>
	table {
		border-collapse: collapse;


	}

	table, td, th {
		border: 1px solid black;
		padding: 20px;
		text-align: center;
	}
</style>
<div class="wrap">
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<table>
			<tbody>
				<tr>
					<th>Name</th>
					<td><input type="text" placeholder="Name" name="name"/></td>
				</tr>
				<tr>
					<th>Role</th>
					<td><input type="text" placeholder="role" name="role"/></td>
				</tr>
				<tr>
					<th>Contact</th>
					<td><input type="text" placeholder="contact" name="contact"/></td>
				</tr>
				<tr>

					<td colspan="2"><input type="submit" name="insert"/></td>
				</tr>
			</tbody>

		</table>
	</form>
</div>
    <?php
}

add_shortcode('short_employee_list', 'employee_list');
?>