var courses=new Array();

			courses['HYDERABAD']=new Array('CIVIL ENGG','EC ENGG','CS ENGG','IT ENGG');
			courses['BANGALORE']=new Array('CIVIL ENGG','EC ENGG','CS ENGG');
			courses['DARBHANGA']=new Array('CIVIL ENGG','EC ENGG','CS ENGG');
			courses['KADAPA']=new Array('CIVIL ENGG','MECHANICAL ENGG','EE ENGG','APPAREL TECH');
			courses['CUTTACK']=new Array('CIVIL ENGG','MECHANICAL ENGG','EE ENGG','AUTOMOBILE ENGG');

			function setStates()
			{
				centerSelect=document.getElementById('center');
				courseList=courses[centerSelect.value];
				changeSelect('course',courseList,courseList);
			}
			function setStates1()
			{
				centerSelect=document.getElementById('center1');
				courseList=courses[centerSelect.value];
				changeSelect('course1',courseList,courseList);
			}
			function setStates2()
			{
				centerSelect=document.getElementById('center2');
				courseList=courses[centerSelect.value];
				changeSelect('course2',courseList,courseList);
			}
			function changeSelect(fieldID, newOptions,newValues)
			{
				selectField=document.getElementById(fieldID);
				selectField.options.length=0;
				for(i=0;i<newOptions.length;i++)
				{
					selectField.options[selectField.length]=new Option(newOptions[i],newValues[i]);
				}
			}
