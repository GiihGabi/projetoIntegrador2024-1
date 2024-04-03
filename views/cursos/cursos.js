function loadData(id){
	getUrl(`${BASEURL}/cursos/loadData/${id}`)
	.then(res=>{	   
	    if(res.data.length>0){
			var txtcod=document.querySelector("#txtcodcurso");
			var txtnome=document.querySelector("#txtnomecurso");
				txtcod.value=res.data[0].codigo;
				txtcod.dispatchEvent(new Event('change'));
				txtcod.readOnly=true;
				txtnome.value=res.data[0].nome;
				txtnome.dispatchEvent(new Event('change'));
				activateLabel(document.querySelector("label[for='txtcodcurso']"));
				activateLabel(document.querySelector("label[for='txtnomecurso']"));
				
				showEdit();
		}
	});
}

function delData(id){
	if(confirm("Confirma a Exclusão do Registro?")){
	var params={id: id};
	deleteItem(`${BASEURL}/cursos/del`,params)
	.then(res=>{	   
		alert(res.data.texto);
		if(res.data.codigo=="1"){
			listaCursos();
		}		 
	});
	}
}

function listaCursos(){
		
	document.querySelector("#lscursos").innerHTML="";
	getUrl(BASEURL+"/cursos/listaCursos")
	   .then(res=>{	   
			var txt="";
			for(var i=0;i<res.data.length;i++){
				var reg=res.data[i];
				var row = document.createElement("tr");
				var bEdit=`<a href='javascript:void(0)' onclick='loadData(${reg.codigo});'><i class="fas fa-edit"></i></a>`;
				var bDel=`<a href='javascript:void(0)' onclick='delData(${reg.codigo});'><i class="fas fa-trash"></i></a>`;
				txt+=`<tr><td>${reg.codigo}</td><td>${reg.nome}</td><td>${bEdit} ${bDel}</td></tr>`;
			}
		    document.querySelector("#lscursos").innerHTML=txt;
	});
}

function reset(){
	document.querySelector("#frmCadCurso").reset();
	document.querySelector("#txtcodcurso").readOnly=false;
	hideEdit();
  }

document.addEventListener("DOMContentLoaded",()=>{

	reset();
	listaCursos();
	document.querySelector("#btnInc").addEventListener("click",function(){             
		let form = document.querySelector("#frmCadCurso");
		postForm(`${BASEURL}/cursos/addCurso`,form).then(res=>{
		   // console.log(res.data);
		   alert(res.data.texto);
		   if(res.data.codigo=="1"){
			   reset();
			   listaCursos();
		   }		 
		})
	});

	document.querySelector("#btnSave").addEventListener("click",function(){             
		let form = document.querySelector("#frmCadCurso");
		postForm(`${BASEURL}/cursos/save`,form).then(res=>{
		   // console.log(res.data);
		   alert(res.data.texto);
		   if(res.data.codigo=="1"){
			   reset();
			   listaCursos();
		   }		 
		})
	});

	document.querySelector("#btnCancel").addEventListener("click",function(){
			reset();
	});
	

});
