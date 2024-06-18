<form action="/register" method = "POST">
    @csrf
  
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    <div class="form-group">
      <button type="submit">Register</button>
    </div>
</form>