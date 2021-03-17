function setupvid()
{
    var ptf = document.getElementById("ptf");

    ptf.currentTime = pos;

    setInterval(function()
    {
        var time = ptf.currentTime;

        setfilmcont(film, String(time));
    }, 60000);
}