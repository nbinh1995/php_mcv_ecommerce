    
function validateAccount(this) {
    oldpass = this[old_pass];
    newpass = this[new_pass];
    if(oldpass.value === newpass.value) return true;
    else return false;  
  }
  function validateRegister(this) {
    pass =this[password];
    conpass = this[confirm_password];
    if(pass.value === conpass.value) return true;
    else return false;  
  }