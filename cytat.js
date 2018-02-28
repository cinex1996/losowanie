function mk()
{
var person = prompt('Podaj swój cytat');

	var h1;
	if(window.XMLHttpRequest)
	{
		h1=newXMLHttpRequest();
		var d1='save.php?person=' + person;
		h1.open('GET', d1, false);
		h1.send();
		
	}
}