function clearInput()
{
    document.getElementById('email_text').value = '';
    document.getElementById('email_text').style.fontStyle = 'normal';
    document.getElementById('email_text').style.color = '#000000';
}

function restoreInput()
{
    if (document.getElementById('email_text').value == '')
    {
	document.getElementById('email_text').value = 'Type your email here';
	document.getElementById('email_text').style.fontStyle = 'italic';
	document.getElementById('email_text').style.color = '#d0d0d0';
    }
}

function showError(element, error)
{
	document.getElementById(element).className = 'show-error';
	document.getElementById(element).innerHTML = "<p>" + error + "</p>";
}

function hideError(element)
{
	document.getElementById(element).className = 'hidden-error';
}