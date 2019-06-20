<form method="POST">
    <div class="form-group">
    <label for="InputAccount">Account name</label>
    <input type="text" name="account" class="form-control" id="InputAccount" aria-describedby="accountHelp" placeholder="Enter desired account name" maxlength="32" required>
    <small id="accountHelp" class="form-text text-muted">Maximum 32 characters. (^[0-9a-zA-Z]{1,32}$)</small>
    </div>
    <div class="form-group">
    <label for="InputPassword">Password</label>
    <input type="password" name="password" class="form-control" id="InputPassword" aria-describedby="passwordHelp" placeholder="Password" required>
    <small id="passwordHelp" class="form-text text-muted">Your password is encrypted in the database, unreadable.</small>
    </div>
    <button type="submit" class="btn btn-primary">Create Account</button>
</form>