function validation() {
  let email = document.getElementById("floatingInput").value.trim();
  let password = document.getElementById("floatingPassword").value.trim();

  // Check if fields are empty
  if (!email || !password) {
    alert("Please fill all fields");
    return false;
  }

  // Improved Email Validation using Regex
  let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!emailPattern.test(email)) {
    alert("Please enter a valid email address");
    return false;
  }

  // Stronger Password Validation
  if (password.length < 8) {
    alert("Your Password must be at least 8 characters long.");
    return false;
  }

  if (!/[A-Z]/.test(password)) {
    alert("Your Password must contain at least one uppercase letter.");
    return false;
  }

  if (!/[a-z]/.test(password)) {
    alert("Your Password must contain at least one lowercase letter.");
    return false;
  }

  if (!/[0-9]/.test(password)) {
    alert("Your Password must contain at least one number.");
    return false;
  }

  if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
    alert("Your Password must contain at least one special character.");
    return false;
  }

  return true; // If all checks pass
}
