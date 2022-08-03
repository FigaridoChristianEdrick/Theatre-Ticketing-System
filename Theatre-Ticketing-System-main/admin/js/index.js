//create account
const pword3 = document.getElementById('pword3');
const toggle1 = document.querySelector('span i');

	function showhide1(){
		if (pword3.type === 'password') {
			pword3.setAttribute('type' , 'text');
			toggle3.classList.add('hide');
		}
		else{
			pword3.setAttribute('type' , 'password');
			toggle3.classList.remove('hide');
		}
	}
//user login 
const pword2 = document.getElementById('pword2');
const toggle2 = document.querySelector('span i');
	
	function showhide2(){
		if (pword2.type === 'password') {
			pword2.setAttribute('type' , 'text');
			toggle2.classList.add('hide');
		}
		else{
			pword2.setAttribute('type' , 'password');
			toggle2.classList.remove('hide');
		}
	}


