<table>
		<tr>
			<td>
				<form action="login.php" method="POST">
				<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name">

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password">

     	<button type="submit">Login</button>
					
					
				</form>
			</td>
			<td>
				<p>Don't have an account?</p>
				<a href="signup.php" class="green-button">Sign Up</a>
			</td>
		</tr>
	</table>