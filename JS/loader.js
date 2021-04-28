function verwijder(id) {
    let xmlHttp = new XMLHttpRequest();

    var url = `../backend/controllers/loader.php?ID=${id}`;

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            const result = xmlHttp.responseText;

            // document.getElementById('resultaat').innerHTML = result;
            console.log(result);
        }
    }


    // verstuur de request
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
    confirm("succesvol verwijderd")
    window.location.replace("pages.php");
      
}