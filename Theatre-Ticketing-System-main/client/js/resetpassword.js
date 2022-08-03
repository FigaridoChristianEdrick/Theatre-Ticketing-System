//reset password
function showhide4(){
	var pword = document.getElementById('pword4');
	var toggle= document.getElementById('toggle0');
	toggle.classList.toggle('hide')
	if (pword.type === 'password') {
		pword.setAttribute('type' , 'text');
	}
	else{
		pword.setAttribute('type' , 'password');
	}
}
//conf pass
function showhide5(){
	var pword = document.getElementById('confpass');
	var toggle= document.getElementById('toggle1');
		
	if (pword.type === 'password') {
		pword.setAttribute('type' , 'text');
		toggle.classList.add('hide');
	}
	else{
		pword.setAttribute('type' , 'password');
		toggle.classList.remove('hide');
	}
}
