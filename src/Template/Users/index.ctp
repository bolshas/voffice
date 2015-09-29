<table border="1">
	<tr>
		<td><b>name</b></td>
		<td><b>email</b></td>
		<td><b>created</b></td>
		<td><b>modified</b></td>
		<td colspan="3"><b>actions</b></td>
	</tr>
<?php
foreach ($users as $user) {
	echo "<tr>";
	echo "<td>$user->name</td>";
	echo "<td>$user->email</td>";
	echo "<td>$user->created</td>";
	echo "<td>$user->modified</td>";
	echo "<td>" . $this->Html->link('view', ['action' => 'view', $user->id]) . "</td>";
	echo "<td>" . $this->Html->link('edit', ['action' => 'edit', $user->id]) . "</td>";
	echo "<td>" . $this->Html->link('delete', ['action' => 'delete', $user->id]) . "</td>";
	echo "</tr>";
}
?>
</table>

<?php
echo $this->Html->link('Add user', ['controller' => 'Users', 'action' => 'add']);
echo "<br>";
echo $this->Paginator->prev();
echo $this->Paginator->counter();
echo $this->Paginator->next();