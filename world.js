window.onload = function(){
    let lookUpBtn = document.getElementById("lookup");
    let cityBtn = document.getElementById("citySearch");
    let request = new XMLHttpRequest();

    function processXMLRequest(url){
        request.onreadystatechange = function(){
            if (request.readyState == XMLHttpRequest.DONE){
                if (request.status == 200){
                    document.getElementById("result").innerHTML = request.responseText;
                }
            }
        }
        request.open("GET", url);
        request.send();
    }
    function countryLookup(){
        let country = document.getElementById("country").value;
        let url = "http://localhost/info2180-lab5/world.php?country=" + country;
        processXMLRequest(url);
    }
    
    function cityLookup(){
        let country = document.getElementById("country").value;
        let url = "http://localhost/info2180-lab5/world.php?country=" + country + "&lookup=cities";
        processXMLRequest(url);
    }
    lookUpBtn.addEventListener("click", countryLookup);
    cityBtn.addEventListener("click", cityLookup);
};