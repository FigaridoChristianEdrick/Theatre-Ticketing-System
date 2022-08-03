//reset password
const pword4 = document.getElementById('pword4');
const toggle4 = document.querySelector('span i');
	
	function showhide4(){
		if (pword4.type === 'password') {
			pword4.setAttribute('type' , 'text');
			toggle4.classList.add('hide-btn')
		}
		else{
			pword4.setAttribute('type' , 'password');
			toggle4.classList.remove('hide-btn');
		}
	}