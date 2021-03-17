var pinfo = document.getElementById("play");

pinfo.currentTime = pos;

setInterval(function()
{
    var time = pinfo.currentTime;

    setfilmcont(film, time);
}, 60);