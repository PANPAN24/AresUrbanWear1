const URL_BASE = 'https://aresurbanwearback.000webhostapp.com/api/'



const testFetch = () => {
    fetch(`${URL_BASE}clientes`)
        .then(response => response.json())
        .then(data => console.log(data));
}