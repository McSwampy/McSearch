function notification(){
	obj							= {};
	obj.ticksLeft				= 10;
	obj.ticksTimer				= null;
	obj.hideTimer				= null;
	obj.notDivh					= null;
	obj.opacity					= 100;
	obj.tick					= function (){
		obj.ticksLeft--;
		if(obj.ticksLeft == 0){
			obj.hideTimer		= setInterval(obj.hideTick, 50);
		}
	};
	obj.hideTick				= function (){
		obj.opacity				-= 5;
		if(obj.opacity <= 5){
			obj.notDivh.style.opacity	= '0.0';
			obj.notDivh.style.display		= 'none';
			obj.notDivh.remove();
			clearInterval(obj.ticksTimer);
			clearInterval(obj.hideTimer);
		}else{
			obj.notDivh.style.opacity	= '0.'+obj.opacity;
		}
	};
	obj.create					= function (){
		notDiv				= document.getElementById('notificationDiv');
		if(notDiv == null){
			notDiv			= document.createElement('div');
			notDiv.id			= 'notificationDiv';
			document.body.appendChild(notDiv);
		}
		obj.notDivh				= document.createElement('div');
		obj.notDivh.className	= 'error';
		title				= document.createElement('h1');
		title.innerHTML			= 'Error';
		text				= document.createElement('p');
		text.innerHTML			= 'Some error has occured';
		obj.notDivh.appendChild(title);
		obj.notDivh.appendChild(text);
		notDiv.appendChild(obj.notDivh);
		setInterval(obj.tick, 100);
	};
	obj.create();
}

function createAlert(){
	new notification();
}