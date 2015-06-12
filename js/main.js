
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


var hitu={
	f1:function(obj){
		hitu.f2(obj);
	},
	changemonth:function (obj){
		$(obj).attr("data-month",$(obj).val());
	},
	f2:function(obj){
		button.sendreq_v2_t4(obj,null, function(d){
			$('#divforcalender').html(d);
			$('select').material_select();
		});
	},
	changeyear:function (obj){
		$(obj).attr("data-year",$(obj).val());
	},

	change:function(obj){
		$(obj).attr("data-year",$(obj).val());
	}
};


var himanshu={
  f1:function(){
    var mystart = document.getElementById('startdate').value;
    var myend = document.getElementById('enddate').value;

    if($("[name='time[]']:checked").length==0 || $("[name='days[]']:checked").length==0){
      window.alert("Please select some slot or days to add");
      $("input[name=addHidden]").val('');
    }
    else if(mystart=='' || myend==''){
      window.alert("Please add a start and end date");
    }
    else
      $("input[name=addHidden]").val('addSet');
  },
  f2:function(){
    if($("[name='time[]']:checked").length==0){
      window.alert("Please select some slot to delete");
      $("input[name=deleteHidden]").val('');
    }
    else
      $("input[name=deleteHidden]").val('deleteSet');
  },
  f12:function(obj){

      if(obj.checked==true){
        $("input[type=checkbox][class=myCheckbox]").each(function () {
                $(this).prop("checked", true);        });
      }
      else{
        $("input[type=checkbox][class=myCheckbox]").each(function () {
                $(this).prop("checked", false);        });        
      }
  }, 
  f22:function(obj){
      if(obj.checked==true){
        $("input[type=checkbox][class=myCheckbox1]").each(function () {
                $(this).prop("checked", true);        });
      }
      else{
        $("input[type=checkbox][class=myCheckbox1]").each(function () {
                $(this).prop("checked", false);        });        
      }
  }
}



function opencalpopup(obj){
	mohit.popup("timeslot",{"body":"<img src='photo/icons/loading.gif' />"});
	button.sendreq_v2_t4(obj,null,function(d){
		$("#"+"timeslotPopup"+"body").html(d);
	});	
}

var ms={
	getselected:function(id){//1 indexed listing
		if(id==null)
			id="disppopupslots";
		var alls=$("#"+id).find("input[type=checkbox]");
		var outp=[];
		for(var i=0;i<alls.length;i++){
			if(alls[i].checked)
				outp.push(i+1);
		}
		return outp;
	}
};


function selectallmatched(obj,sel){
	for(var i=0;i<sel.length;i++){
		sel[i].checked=obj.checked;
	}
}
