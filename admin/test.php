<?php include "validate_form.php";?>
<div class="container">
	<div class="header">
		<h2>Create Account</h2>
	</div>
	<form id="form" class="form">
		<div class="form-control">
			<label for="username">Username</label>
			<input type="text" placeholder="florinpop17" class="name" onmouseover="validate_name()" />
			<p class="error"></p>
			<i class="fas fa-exclamation-circle"></i>     

            <label for="username">Username</label>
			<input type="text" placeholder="florinpop17" onkeypress="testuser()" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<button  class="test">Submit</button>
	</form>
</div>

