function SeleValid()
 			{
 					var sele=document.getElementById('center').value;
 					var sele1=document.getElementById('center1').value;
 					var sele2=document.getElementById('center2').value;
 					if (sele=="" || sele==null) {
 						alert("Please Select Center and Course");
 						center.focus();
 						return false;
 					}
 					if (sele1=="" || sele1==null) {
 						alert("Please Select Center and Course");
 						center.focus();
 						return false;
 					}
 					if (sele2=="" || sele2==null) {
 						alert("Please Select Center and Course");
 						center.focus();
 						return false;
 					}
 					return true;
 			}