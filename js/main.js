function AJAX(destination){
	obj										= {};
	obj.displayErrorDetails					= true;
	obj.standardErrorText					= 'An error occured. Please try again later';
	obj.URL									= destination;
	obj.type								= 'POST';
	obj.sync								= true;
	obj.error								= true;
	obj.into								= '';
	obj.headers								= [];
	obj.data								= [];
	obj.timeOut								= 60000;
	obj.setDefaultError						= function(val){
		obj.standardErrorText				= val;
	};
	obj.errorDetails						= function(val){
		obj.displayErrorDetails				= val;
	};
	obj.setTarget							= function(into){
		obj.into							= into;
	};
	obj.showError							= function(type){
		obj.error							= type;
	};
	obj.addHeader							= function(key, val){
		obj.headers[key]					= val;
	};
	obj.addData								= function(key, val){
		obj.data[key]						= val;
	};
	obj.removeAllData						= function(){
		obj.data							= [];
	};
	obj.setURL								= function(url){
		obj.URL								= url;
	};
	obj.setSyncType							= function(bool){
		obj.sync							= bool;
	};
	obj.setHTTPType							= function(type){
		obj.type							= type;
	};
	obj.setTimeout							= function(newTimeOut){
		obj.timeOut							= newTimeOut;
	};
	obj.query								= function(){
		var headersToSend					= obj.headers;
		var dataToSend						= obj.data;
		var data							= "";
		for (var k in dataToSend){
			if (typeof dataToSend[k] !== 'function') {
				data						= data + k+'='+dataToSend[k]+'&';
			}
		}
		var place							= obj.into;
		var xhttp							= new XMLHttpRequest();
		var all								= obj.URL+"?"+data;
		var type							= obj.type;
		var url								= obj.URL;
		var sync							= obj.sync;
		var timeOut							= obj.timeOut;
		var showError						= obj.error;
		var showErrorDetails				= obj.displayErrorDetails;
		var standardErrorTextToShow			= obj.standardErrorText;

		var hiddenForm						= document.getElementById('tiahfyp');
		if(hiddenForm != null){
			var inputs = hiddenForm.getElementsByTagName("input");
			for(var k in inputs){
				name						= inputs[k].name;
				val							= inputs[k].value;
				if(name != null && val != null){
					data + name+'='+val+'&';
				}
			}
		}
		xhttp.onreadystatechange	= function(){
			if (this.readyState == 4 && this.status == 200) {
				try{
					var obj = JSON.parse(this.responseText);
					if(obj.CONTENT.ANDROID != null){
						ajaxResponse(obj.CONTENT.ANDROID);
						return;
					}
					if (obj.STATUS == 'ERROR') {
						showText				= obj.CONTENT.VC_ERROR_DECRIPTION;
						showTitle				= obj.CONTENT.VC_ERROR_TITLE;
						closeOnErrorClose		= obj.BL_ANDROID_CLOSE ? obj.BL_ANDROID_CLOSE : false;
						logoffAfterClose		= obj.BL_ANDROID_LOGOFF ? obj.BL_ANDROID_LOGOFF : false;
						if(showText == 'Session inactive. Start new session.'){
							inactiveSession		= true;
						}
						if(showError){
							hideCustomLoader();
							if(showErrorDetails){
								MsgBox(showText, showTitle);
							}else{
								/*MsgBox(standardErrorTextToShow, 'Error');*/
								MsgBox(showText, showTitle);
							}
						}
					} else if (obj.STATUS == 'SUCCESS') {
						showText				= obj.CONTENT.VC_SUCCESS_DECRIPTION;
						showTitle				= obj.CONTENT.VC_SUCCESS_TITLE;
						closeOnErrorClose		= obj.BL_ANDROID_CLOSE;
						showMsgBox				= obj.BL_SHOW_MESSAGE;
						logoffAfterClose		= obj.BL_ANDROID_LOGOFF ? obj.BL_ANDROID_LOGOFF : false;
						if(showMsgBox){
							MsgBox(showText, showTitle);
						}else{
							AJAXR(place, showText);
							hideCustomLoader();
						}
					} else if (obj.STATUS == 'EXECUTE'){
						passedScript			= obj.CONTENT.TX_SCRIPT;
						try {
							eval(passedScript);
						} catch (err) {
						}
					} else{
						AJAXR(place, this.responseText);
						hideCustomLoader();
					}
				} catch (err) {
					AJAXR(place, this.responseText);
					hideCustomLoader();
				}
			}
			if(this.readyState == 4 && this.status == 0){
				timeOutFunc('');
			}
		};
		xhttp.open(type, all, sync);
		for (var k in headersToSend){
			if(headersToSend[k] != '' || headersToSend[k] != null){
				xhttp.setRequestHeader(k , headersToSend[k]);
			}
		}
		try{
			xhttp.send();
		}catch (e) {
		}
		xhttp.timeout = timeOut;
		xhttp.ontimeout = function (e) {
			timeOutFunc('');
		};
	};
	return obj;
}
var a = new AJAX('/');

function enableSite(el){
	a.addData('ID', el.getAttribute('xid'));
	a.addData('SC', el.getAttribute('SC'));
	a.addData('SF', el.getAttribute('SF'));
	a.query();
}

function AJAXR(place, content){
	var obj = JSON.parse(content);
	for(i = 0; i < obj.length; i++){
		var jsonItem = obj[i];
		switch(jsonItem.ACTION){
			case 'WARNING':
				Notification("Warning", jsonItem.CONTENT, "warning")
				break;
			case 'SUCCESS':
				Notification("Success", jsonItem.CONTENT, "good")
				break;
			case 'ERROR':
				Notification("Error", jsonItem.CONTENT, "error")
				break;
			case 'INNERHTML':
				document.getElementById(jsonItem.CONTENT.ID).innerHTML = jsonItem.CONTENT.VALUE;
				break;
			case 'SET_CLASS':
				document.getElementById(jsonItem.CONTENT.ID).className = jsonItem.CONTENT.VALUE;
				break;
		}
	}
}

function hideCustomLoader(){
	
}

function showCustomLoader(){
	
}

var lastLoadPage;

function buttonClick(el){
	a.addData('PARAMETER', encodeURIComponent(el.getAttribute('PARAMETER')));
	a.addData('DATA', encodeURIComponent(el.getAttribute('data')));
	a.query();
}

function loadPage(el){
	lastLoadPage = encodeURIComponent(el.getAttribute('data'));
	buttonClick(el);
}

function search(el){
	a.addData('SEARCH', encodeURIComponent(document.getElementById(el.getAttribute('from')).value));
	a.addData('DATA',lastLoadPage);
	a.query();
}

function submitForm(el, p){
	a.addData('PARAMETER', 'FORM');
	a.addData('DATA', encodeURIComponent(el.getAttribute('data')));
	var form = el;
	for(i = 1; i <= p; i++)
		form = form.parentNode;
	var children = form.childNodes;
	for(c = 0; c < children.length; c++){
		var childElement = children[c];
		if(childElement.type == 'text' || childElement.type == 'password')
			a.addData(childElement.name, childElement.value);
	}
	a.query();
}

function Notification(Title, Message, Icon){
	var obj										= {};
	obj.progress								= 0;
	obj.fadeTime								= 500;
	obj.fadeTicks								= 50;
	obj.fadeInterval							= 0;
	obj.opacity									= 1;
	obj.time									= 2;
	obj.ticks									= 500;
	obj.element									= null;
	obj.progress								= null;
	obj.progressPos								= 0;
	obj.progressIncrement						= 0;
	obj.Show									= function(){
		obj.element								= document.createElement('div');
		obj.element.className					= "Notification "+Icon;
		content									= document.createElement('div');
		content.className						= "Content";
		content.innerHTML						= ""+
		"<h1>"+Title+"</h1>"+
		"<label>"+Message+"</label>"+
		"";
		obj.element.appendChild(content);
		var progressDiv							= document.createElement('div');
		progressDiv.className					= 'ProgressDiv';
		obj.progress							= document.createElement('div');
		progressDiv.appendChild(obj.progress);
		obj.element.appendChild(progressDiv);
		obj.progressIncrement					= 100 / obj.ticks;
		document.getElementById('Notifications').appendChild(obj.element);
		obj.StartWait();
	};
	obj.StartWait								= function(){
		if(obj.progressPos >= 100){
			obj.fadeInterval					= 1;
			obj.FadeTick();
			return;
		}
		setTimeout(obj.Tick, obj.time);
	};
	obj.Clear									= function(){
		obj.opacity								= 0;
		obj.progressPos							= 100;
		obj.element.remove();
		obj										= null;
		return;
	};
	obj.FadeTick								= function(){
		obj.opacity								= ((obj.opacity * 100) - obj.fadeInterval) / 100;
		if(obj.opacity <= 0){
			obj.element.remove();
			obj									= null;
			return;
		}
		obj.element.style.opacity				= obj.opacity;
		setTimeout(obj.FadeTick, (obj.fadeTime / obj.fadeTicks));
	};
	obj.Tick									= function(){
		try{
			obj.progressPos						+= obj.progressIncrement;
			obj.progress.style.width			= obj.progressPos+"%";
			obj.StartWait();
		}catch(e){
			
		}
	};
	obj.Show();
	return obj;
}