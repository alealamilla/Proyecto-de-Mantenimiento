window.onload = function () {
    BringCars(owner_id);
    
}

async function BringCars($family) {
    let pet = await fetch(route("cars.preview", $family));
    let answer = await pet.json();
    let html = "";
    answer.forEach(e => {
        html += `
        <div class="col-2 mx-4 my-2">
            <div class="row  bg-white d-flex justify-content-between align-items-center"
                style="border-radius: 10px; ">
                <div class="col-9">
                    <p>Modelo: ${e.brand.name}</p>
                    <p>Placas: ${e.placas}</p>
                </div>
                <div class="col-3">
                    <a href="${route('cars.edit', e.id)}"> <span class="mdi--edit-circle"></span></a>
                </div>
            </div>
         </div>
         `
    });
    document.getElementById("car-list").innerHTML = html
}

async function getTypes(brand_id) {
    let url = route("types.preview", brand_id)
    let peticion = await fetch(url)
    if (peticion.ok) {
        let respuesta = await peticion.json()
        let html = ""
        respuesta.forEach(type => {
            html += `<option value="${type.id}">${type.name}</option>`;
        });
        document.getElementById("type_id").innerHTML = html


    }

}