<table border="1">
<?php
foreach ($users as $user) {
	echo "<tr>";
	echo "<td>$user->name</td>";
	echo "<td>$user->email</td>";
	echo "<td>$user->password</td>";
	echo "<td>$user->created</td>";
	echo "<td>$user->modified</td>";
	echo "</tr>";
}
?>
</table>

<?php
echo $this->Html->link('Add user', ['controller' => 'Users', 'action' => 'add']);