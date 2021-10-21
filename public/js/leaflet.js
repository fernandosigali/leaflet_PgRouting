
// Leaflet testes

// L.map abre o visor nas coordenadas indicadas, porém sem nenhuma camada. 
// Se deve referenciar o id da div na qual ele será inserido na página. 

var coords4326 = L.Projection.SphericalMercator;
let mymap = L.map('mapid', {
    crs: L.CRS.EPSG3857
}).setView([-20.241477812258132, -40.244630335475556], 50);
let btn = document.querySelector("#btn");
let inp1 = document.querySelector("#inp1");
let inp2 = document.querySelector("#inp2");
let btn2 = document.querySelector("#btn2");

// Adiciona a camada de mapa com as funcionalidades (leaflet)
L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', { 
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 20,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);


btn.onclick = function(){
    var oReq = new XMLHttpRequest(); 

    oReq.onload = function() {
        
        // A requisição é retornada em JSON, por isso o JSON.parse deve ser utilizado. 
        obj = JSON.parse(this.response);
        var cont = 0;
        var p;
        var myTimer = setInterval(() => {
            p = L.geoJSON(JSON.parse(obj[cont].geojson));
            mymap.addLayer(p);
            cont += 1;
            if (cont == obj.length){
                clearInterval(myTimer);
            }
        }, 500)

    };

    // Tenta a requisição numa route /mapa/get_pontos/ que retorna os dados dos pontos db
    oReq.open("get", "http://10.167.1.73:8000/patio/get_data_caminhos/", true); 
    oReq.send();
};

btn2.onclick = function(){
    var oReq = new XMLHttpRequest(); 

    oReq.onload = function() { 
        console.log(this.response)
        JSON.parse(this.response).forEach(element => { // APARENTEMENTE O L.geoJSON lê um objeto e não um geoJSON!!!
            let line = L.geoJSON(JSON.parse(element.geom)).addTo(mymap);
            line.setStyle({
                color: 'black'
            });
    })
};

    // Tenta a requisição numa route /mapa/get_pontos/ que retorna os dados dos pontos db
    oReq.open("get", `http://10.167.1.73:8000/patio/get_rota/${inp1.value}_${inp2.value}`, true); 
    oReq.send();
};


var oReq2 = new XMLHttpRequest(); 
oReq2.onload = function() {
    JSON.parse(this.response).forEach(element => { // APARENTEMENTE O L.geoJSON lê um objeto e não um geoJSON!!!
        L.geoJSON(JSON.parse(element.geojson)).addTo(mymap);
    })
};
oReq2.open("get", "http://10.167.1.73:8000/patio/get_data_vias/", true); 
oReq2.send();