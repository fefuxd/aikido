// VERIFICA IDADE E ABRE OU FECHA RESPONSÁVEL

       function verifIdade() {
       var Bdate = document.getElementById('bday').value;
       var Bday = +new Date(Bdate);
	   var idade = ~~ ((Date.now() - Bday) / (31557600000));
	   if (idade >= 18) {
           fechaResponsavel('#responsavel');
	   }
	   else {
           abreResponsavel('#responsavel');
	   }
	   
	   function abreResponsavel(sel) {
           $(sel).slideDown();
           document.getElementById("nomeResp").required = true;
           document.getElementById("rgResp").required = true;
           document.getElementById("cpfResp").required = true;
           document.getElementById("rgAluno").required = false;
           document.getElementById("cpfAluno").required = false;
           document.getElementById("rgLabel").innerHTML = 'RG';
           document.getElementById("cpfLabel").innerHTML = 'CPF';
       } 
		
	   function fechaResponsavel(sel) {
           $(sel).slideUp();
           document.getElementById("nomeResp").required = false;
           document.getElementById("rgResp").required = false;
           document.getElementById("cpfResp").required = false;
           document.getElementById("rgAluno").required = true;
           document.getElementById("cpfAluno").required = true;
           document.getElementById("rgLabel").innerHTML = 'RG <span style="font-weight:bold;">*</span> <span style="font-size:10px;">(Não utilizar pontos nem traços)</span>';
           document.getElementById("cpfLabel").innerHTML = 'CPF <span style="font-weight:bold;">*</span> <span style="font-size:10px;">(Não utilizar pontos nem traços)</span>';
       } 
	
            }
			
			
			
// VERIFICA IDADE ALTERAÇÃO

function verifIdadeAlt() {
        var Bdate = document.getElementById('bday').value;
        var Bday = +new Date(Bdate);
	   var idade = ~~ ((Date.now() - Bday) / (31557600000));
	   if (idade >= 18) {
           fechaResponsavel('#responsavel');
	   }
	   else {
           abreResponsavel('#responsavel');
	   }
	   
	   function abreResponsavel(sel) {
           $(sel).slideDown();
       } 
		
	   function fechaResponsavel(sel) {
           $(sel).slideUp();
       } 
	
            }			
			


// VERIFICA CPF


function VerificaCPF () {
if (vercpf(document.formCad.cpf.value.replace(/[^0-9]/g,''))) {
	}
else {
	errors="1";
	if (errors) alert('CPF NÃO VÁLIDO');
	document.retorno = (errors == '');
	document.formCad.cpf.value = '';
}
}

function vercpf (cpf) 
{if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
return false;
add = 0;
for (i=0; i < 9; i ++)
add += parseInt(cpf.charAt(i)) * (10 - i);
rev = 11 - (add % 11);
if (rev == 10 || rev == 11)
rev = 0;
if (rev != parseInt(cpf.charAt(9)))
return false;
add = 0;
for (i = 0; i < 10; i ++)
add += parseInt(cpf.charAt(i)) * (11 - i);
rev = 11 - (add % 11);
if (rev == 10 || rev == 11)
rev = 0;
if (rev != parseInt(cpf.charAt(10)))
return false;
return true;
}





// VERIFICA CPF RESPONSAVEL

function VerificaCPFResp () {
if (vercpf(document.formCad.cpfResp.value.replace(/[^0-9]/g,''))) {
	}
else {
	errors="1";
	if (errors) alert('CPF NÃO VÁLIDO');
	document.retorno = (errors == '');
	document.formCad.cpfResp.value = '';
}
}

function vercpf (cpf) 
{if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
return false;
add = 0;
for (i=0; i < 9; i ++)
add += parseInt(cpf.charAt(i)) * (10 - i);
rev = 11 - (add % 11);
if (rev == 10 || rev == 11)
rev = 0;
if (rev != parseInt(cpf.charAt(9)))
return false;
add = 0;
for (i = 0; i < 10; i ++)
add += parseInt(cpf.charAt(i)) * (11 - i);
rev = 11 - (add % 11);
if (rev == 10 || rev == 11)
rev = 0;
if (rev != parseInt(cpf.charAt(10)))
return false;
return true;
}











