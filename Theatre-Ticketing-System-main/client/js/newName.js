<script>
function validateUsername() {
var newName,confName,output = true;


newName = document.frmChange.newName;
confName = document.frmChange.confName;

if(!newName.value) {
newName.focus();
document.getElementById("newName").innerHTML = "required";
output = false;
}
else if(!confName.value) {
confName.focus();
document.getElementById("confName").innerHTML = "required";
output = false;
}
if(newName.value != confName.value) {
newName.value="";
confName.value="";
newName.focus();
document.getElementById("confName").innerHTML = "not same";
output = false;
} 	
return output;
}
</script>