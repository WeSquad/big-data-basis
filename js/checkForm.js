function checkUsername()
{	
	if ( document.forms[0].username.value.length > '6')
	{
		var d= "<img width=\"20\" height=\"20\" src=\"../../../../images/Valid.png\">";
		document.getElementById("zone_formulaire3_1").innerHTML = d;		
	}  else
	{
		
		var d= "<img width=\"20\" height=\"20\" src=\"../../../../images/false.png\">";
		document.getElementById("zone_formulaire3_1").innerHTML = d;		
	}
}
function checkPassword()
{
	if ( document.forms[0].password.value.length > '2' && document.forms[0].password.value.length < '10')
	{
		var d= "<img width=\"20\" height=\"20\" src=\"../../../../images/Valid.png\">";
		document.getElementById("zone_formulaire5_1").innerHTML = d;
		
	}  else
	{
		
		var d= "<img width=\"20\" height=\"20\" src=\"../../../../images/false.png\">";
		document.getElementById("zone_formulaire5_1").innerHTML = d;		
	}
}