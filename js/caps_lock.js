const inpPassword = document.getElementById('pw');
const capsLockWarn = document.querySelector('#caps-lock-warn');
			
inpPassword.addEventListener('keyup', function(e)
{
	const isCapsLockOn = e.getModifierState('CapsLock');
	capsLockWarn.style.display = isCapsLockOn ? 'block' : 'none';
});