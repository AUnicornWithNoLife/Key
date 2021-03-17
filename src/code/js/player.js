document.getElementById('ptf').addEventListener('loadeddata', function()
{
    var ptf = this;

    ptf.currentTime = pos;

    setInterval(function()
    {
        var time = ptf.currentTime;

        setfilmcont(film, String(time));
    }, 60000);
}, false);