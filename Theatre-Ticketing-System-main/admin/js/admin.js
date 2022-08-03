//admin login
const pword = document.getElementById('pword');
const toggle = document.querySelector('span i');

	function showhide(){
		if (pword.type === 'password') {
			pword.setAttribute('type' , 'text');
			toggle.classList.add('hide');
		}
		else{
			pword.setAttribute('type' , 'password');
			toggle.classList.remove('hide');
		}
	}