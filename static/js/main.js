function deletechecked(link)
{
    var answer = confirm('Borrar registro?')
    if (answer){
        window.location = link;
    }
    return false;  
}
function changestate(link)
{
	var answer = confirm('Cambiar estado registro?')
    if (answer){
        window.location = link;
    }
    return false;
}
