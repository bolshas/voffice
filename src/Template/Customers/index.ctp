<table class="table">
	<tr>
		<td><b>Name</b></td>
		<td><b>Corporate Id</b></td>
		<td><b>Address</b></td>
		<td><b>Phone Number</b></td>
		<td><b>Email</b></td>
		<td><b>Client Executive</b></td>
		<td><b>Created</b></td>
		<td><b>Modified</b></td>
		<td colspan="3"><b>actions</b></td>
	</tr>
<?php
foreach ($customers as $customer) {
	echo "<tr>";
	echo "<td>$customer->name</td>";
	echo "<td>$customer->corporateId</td>";
	echo "<td>$customer->address</td>";
	echo "<td>$customer->phoneNumber</td>";
	echo "<td>$customer->email</td>";
	echo "<td>" . $this->Html->link($customer->user->name, ['controller' => 'users', 'action' => 'view', $customer->user->id]) . "</td>";
	echo "<td>$customer->created</td>";
	echo "<td>$customer->modified</td>";
	echo "<td>" . $this->Html->link('view', ['action' => 'view', $customer->id]) . "</td>";
	echo "<td>" . $this->Html->link('edit', ['action' => 'edit', $customer->id]) . "</td>";
	echo "<td>" . $this->Html->link('delete', ['action' => 'delete', $customer->id]) . "</td>";
	echo "</tr>";
}
?>
</table>

<?php
echo $this->Html->link('Add customer', ['controller' => 'customers', 'action' => 'add']);
echo "<br>";
echo $this->Paginator->numbers(['prev' => true, 'next' => true]);