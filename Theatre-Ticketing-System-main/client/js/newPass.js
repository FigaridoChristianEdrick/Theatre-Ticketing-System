<script>
function validatePassword() {
var newpass,confpass,output = true;


newpass = document.frmChange.newpass;
confpass = document.frmChange.confpass;

if(!newpass.value) {
newpass.focus();
document.getElementById("newpass").innerHTML = "required";
output = false;
}
else if(!confpass.value) {
confpass.focus();
document.getElementById("confpass").innerHTML = "required";
output = false;
}
if(newpass.value != confpass.value) {
newpass.value="";
confpass.value="";
newpass.focus();
document.getElementById("confpass").innerHTML = "not same";
output = false;
} 	
return output;
}
</script>