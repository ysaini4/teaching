
function uploadfile(obj,name){
	var formjobj=$(obj).parent();
	if(!(formjobj.find("input[name="+name+"]").length>0)){
		var elm=document.createElement("input");
		elm.setAttribute("type","file");
		elm.setAttribute("name",name);
		elm.setAttribute("style","display:none;");
		elm.onchange=function (){
			formjobj.submit();
		}
		formjobj[0].appendChild(elm);
	}
	else{
		var elm=formjobj.find("input[name="+name+"]")[0];
	}
	elm.click();
}

function topicssubtopic(obj){//assuming a variable topics is already defined
	temp=obj;
	var ids=["selectclass","selectsubject","selecttopic"];
	var cstval=[];
	for(var i=0;i<ids.length;i++){
		cstval[i]=$("#"+ids[i]).val();
	}
	function getslist(inp,stext){
		outp=[['',stext]];
		for(var i in inp){
			outp.push([i,inp[i].name]);
		}
		return outp;
	}
	if(obj.id=="selectclass" && typeof(topics[obj.value])!='undefined'){
		var selectedHTML=selects.arr2opt(getslist(topics[obj.value]['children'],"Select Subject"));
		$("#selectsubject").html(selectedHTML);
	}
	if(obj.id=="selectsubject" && typeof(topics[cstval[0]])!='undefined' && typeof(topics[cstval[0]]['children'][cstval[1]])!='undefined' ){
		var selectedHTML=selects.arr2opt(getslist( topics[cstval[0]]['children'][cstval[1]]['children'] ,"Select Topics"));
		$("#selecttopic").html(selectedHTML);
	}
	$('select').material_select();
}