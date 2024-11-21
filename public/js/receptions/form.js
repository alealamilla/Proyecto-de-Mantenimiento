async function getcars(owner_id) {
    let url = route("cars.preview", owner_id)
    let peticion = await fetch(url)
    if (peticion.ok) {
        let respuesta = await peticion.json()
        let html = ""
        respuesta.forEach(car => {
            html += `<option value="${car.id}">${car.brand.name} ${car.placas}</option>`;
        });
        document.getElementById("car_id").innerHTML = html


    }

}
