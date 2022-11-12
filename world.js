window.onload = function(){
    let lookUpBtn = document.getElementById("lookup");
    let request = new XMLHttpRequest();
    function countryLookup(){
        let country = document.getElementById("country").value;
        let url = "http://localhost/info2180-lab5/world.php?country=" + country;
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
    lookUpBtn.addEventListener("click", countryLookup);
};