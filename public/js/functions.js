function setSelected(name, value)
{
	var selectBox = document.getElementsByName(name)[0];
	for (i = 0; i < selectBox.length; i++)
	{
		if (selectBox[i].value == value)
		{
			selectBox.selectedIndex = i;
			break;
		}
	}
}

function setSelectedMultiple(name, values)
{
	var selectBox = document.getElementsByName(name)[0];
	
	for (var i = 0, l = selectBox.options.length, o; i < l; i++)
	{
		o = selectBox.options[i];
		if (values.indexOf(o.value) != -1)
		{
			o.selected = true;
		}
	}
}

function expandEvents(id)
{
	document.getElementById('link' + id).style.display = 'none';
	document.getElementById('expand' + id).style.display = 'inherit';
}