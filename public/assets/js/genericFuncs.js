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

function opSelect(iId)
{
    _$('img1').style.filter = 'grayscale(100%)';
    _$('img2').style.filter = 'grayscale(100%)';
    _$('img3').style.filter = 'grayscale(100%)';
    _$('img4').style.filter = 'grayscale(100%)';

    _$('img'+iId).style.filter = 'grayscale(0%)';
}

function opSelectNivel(iId)
{
    iRand = parseInt(Math.random() * (2000 - 1000) + 1000);

    _$('img5').style.filter = 'grayscale(100%)';
    _$('img5').src = PATH_IMG + 'facil.png';

    _$('img6').style.filter = 'grayscale(100%)';
    _$('img6').src = PATH_IMG + 'medio.png';
    
    _$('img7').style.filter = 'grayscale(100%)';
    _$('img7').src = PATH_IMG + 'dificil.png';

    _$('img'+iId).style.filter = 'grayscale(0%)';
    sImg = _$('img'+iId).src;
    _$('img'+iId).src = sImg + 'on.png?v='+iRand;
}