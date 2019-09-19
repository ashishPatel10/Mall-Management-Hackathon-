
function setForm(value) {

    if(value == 'clothes'){
                document.getElementById('clothes').style='display:block;';
                document.getElementById('food').style='display:none;';
            }
            else {

                document.getElementById('food').style = 'display:block;';
                document.getElementById('clothes').style = 'display:none;';
            }
}
function type_select(s1,s2)
{
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "  ";
	if (s1.value=='top' && gender=='m') 
	{
		var optionArray = ["|","flshirts|Full Sleve Shirt","tshirt|T-Shirt","jacket|Jacket","cargo|Cargo","kurta|Kurta","hlshirts|Half Sleve Shirt","blazer|Blazer","suits|Suits"];
	}
	else if(s1.value=='top' && gender=='f')
	{
		var optionArray = ["|","kurti|Kurti","dress|Dress","tops|Top","jacket|Jacket","dupatta|Dupatta","saree|Saree","dressmaterial|Dress Material"];
	}
	else if(s1.value=='bottom' && gender=='f')
	{
		var optionArray = ["|","jeans|Jeans","skirt|Skirt","leggings|Leggings","gown|Gown"];
	}
	else if(s1.value=='bottom' && gender=='m')
	{
		var optionArray = ["|","denim|Denim","jeans|Jeans","tracks|Tracks","trouser|Trouser"];
	}
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");

		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}

var gender='';
function gender_select(value)
{
	var x=document.getElementById(value);
	if(x.value=='male'){
		gender= 'm';
	}
	else if(x.value=='female')
		gender='f';
}

function validateForm_clothes()
{
	var gender=document.getElementById('gender').value;
	
	if(gender=='select')
	{
		alert('Please select the gender');
		return false;
	}
	var type=document.getElementById('type').value;
	if(type=='select')
	{
		alert('Please select the type');
		return false;
	}
	var brand=document.getElementById('brand').value;
	if(brand=='select')
	{
		alert('Please select the brand');
		return false;
	}
	var color=document.getElementById('color').value;
	if(color=='select')
	{
		alert('Please select the color');
		return false;
	}
	var size=document.getElementById('size').value;
	if(size=='select')
	{
		alert('Please select the size');
		return false;
	}
}
function validateForm_food(){
	var brandf=document.getElementById('brandf').value; 
	if(brandf == 'select')
    {
    	msg="Please select the valid brand";
    	alert(msg);
    	return false;
    }
    
    
}
function updateValues(){
	gender_select('gender');
	type_select('type', 'app_type');
}