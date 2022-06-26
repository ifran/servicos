var PATH_IMG = 'public/assets/img/';

function _$(iId) 
{
    return document.getElementById(iId);
}

function ajaxRequest(sUrl, sDivId = '')
{
    sUrl = 'Application/' + sUrl;
    var oXmlhttp = new XMLHttpRequest();
    
    oXmlhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        if (this.responseText != '') 
        {
            if (sDivId != '') 
            {
                sDiv = this.responseText;
                _$(sDivId).innerHTML = sDiv;
            }
        }
      }
    };
  
    oXmlhttp.open("GET", sUrl , true);
    oXmlhttp.send();
}