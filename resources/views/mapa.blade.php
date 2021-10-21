<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <title>Testando o leaflet</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
        <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    </header>
    <body>
        <h1>Teste do leaflet</h1>

        <div id="mapid" style="width: 1600px; height: 700px;"></div>
        
        <div class="form-center">
            <form>
                <label for="ini">Inicio</label><br>
                <input type="text" id="inp1" name="ini"><br>
                <label for="fim">Fim:</label><br>
                <input type="text" id="inp2" name="fim">
            </form> 
        </div>

            </br>
            </br>

        <div>
            <button id='btn2' class='btn'>Obter Rota</button>
        </div>

            </br>
            </br>

        <div>
            <button id='btn' class='btn'>Carregar Dados</button>
        </div>
        
        <script src="{{asset('js\leaflet.js')}}"></script>
    </body>
</html>