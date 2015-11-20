function showOverlay()
{
    var background = document.createElement('div');
    var overlay = document.createElement('div');
    var closeButton = document.createElement('div');
    var text = document.createElement('p');
    
    background.id = 'backgroundDiv';
    overlay.id = 'overlayDiv';
    closeButton.id = 'closeButton';
    
    closeButton.onclick = removeOverlay;
    text.innerHTML = '<p>Thank you for signing up! Check your emails for new \
            deals, as they are going to be coming soon!</p>';
    
    overlay.appendChild(closeButton);
    overlay.appendChild(text);
    background.appendChild(overlay);
    document.body.appendChild(background);
}

function removeOverlay()
{
    window.location.href = '//goodlynx.com';
}