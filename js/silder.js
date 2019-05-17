var obj=null;
var As=document.getElementById('nav').getElementsByTagName('a');
obj = As[0];
for(i=1;i<As.length;i++){
	// console.log(As[8]);
	// if(window.location.href.indexOf(As[i].href)>=0)
	// 	obj=As[i];
	if(window.location.href.indexOf("index")>=0){
		obj=As[0];
		break;
	}
	if(window.location.href.indexOf("news")>=0){
		obj=As[1];
		break;
	}
	if(window.location.href.indexOf("appraise")>=0){
		obj=As[2];
		break;
	}
	if(window.location.href.indexOf("facilities")>=0){
		obj=As[3];
		break;
	}
	if(window.location.href.indexOf("experts")>=0){
		obj=As[4];
		break;
	}
	if(window.location.href.indexOf("leaguer")>=0||
		window.location.href.indexOf("routine")>=0||
		window.location.href.indexOf("director")>=0||
		window.location.href.indexOf("president")>=0){
		obj=As[5];
		break;
	}
	if(window.location.href.indexOf("standard")>=0){
		obj=As[6];
		break;
	}
	if(window.location.href.indexOf("policy")>=0){
		obj=As[7];
		break;
	}
	if(window.location.href.indexOf("message")>=0){
		obj=As[8];
		break;
	}
	if(window.location.href.indexOf("about")>=0){
		obj=As[9];
		break;
	}
	// console.log(window.location.href);
}
obj.id='nav_current';
