//user login 
function showhide(){
	var pword = document.getElementById('pword');
	var toggle= document.querySelector('span i');
		
	if (pword.type === 'password') {
		pword.setAttribute('type' , 'text');
		toggle.classList.add('hide');
	}
	else{
		pword.setAttribute('type' , 'password');
		toggle.classList.remove('hide');
	}
}
//register pass
function showhide1(){
	var pword = document.getElementById('regpass');
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
//conf pass
function showhide2(){
	var pword = document.getElementById('cpword');
	var toggle= document.getElementById('toggle2');
		
	if (pword.type === 'password') {
		pword.setAttribute('type' , 'text');
		toggle.classList.add('hide');
	}
	else{
		pword.setAttribute('type' , 'password');
		toggle.classList.remove('hide');
	}
}



