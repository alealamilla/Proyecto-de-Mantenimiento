window.onload = function () {
    fetchAndRenderData()

}

async function NewEntry() {
    event.preventDefault();
    let url = route('works.store');
    let form = new FormData(document.getElementById("NewWork"));
    let pet = await fetch(url, { method: "POST", body: form });

    if (pet.ok) {
        Swal.fire({
            icon: "success",
            title: "Se guardaron los trabajos con exito",
            timer: 7000,
            showConfirmButton: true
        })
        fetchAndRenderData()
    } else {
        let resp = await pet.json();
        Swal.fire({
            icon: "error",
            body: resp
        })
    }
}

function fetchAndRenderData() {
    $.ajax({
        url: route('works.recap', Reception_Id),
        method: 'GET',
        success: function (response) {
            // Pass response data to the function for rendering
            renderData(response.data);
        },
        error: function (error) {
            console.error("Error fetching data:", error);
        }
    });
}

function renderData(data) {
    // Clear existing data in your display table
    $('#table-container').empty(); // Assuming an element with id `table-container`

    let grandTotal = 0; // To accumulate the total for all entries

    // Create a single table for all entries
    const table = `
        <table class="table table-striped table-hover" style="background-color: #ffdddd;">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                ${data.map(entry => {
                    // Calculate the total for each entry and accumulate it
                    let entryTotal = 0;
                    if (entry.service && entry.service.price) {
                        entryTotal += parseFloat(entry.service.price);
                    }
                    if (entry.sparepart && entry.sparepart.price) {
                        entryTotal += parseFloat(entry.sparepart.price);
                    }

                    grandTotal += entryTotal;

                    // Render rows for the current entry
                    return renderEntryRow(entry);
                }).join('')}
                <!-- Row for grand total price -->
                <tr>
                    <td colspan="2"><strong>Total General</strong></td>
                    <td><strong>$${grandTotal.toFixed(2)}</strong></td>
                </tr>
            </tbody>
        </table>
    `;

    // Append the single table to the container
    $('#table-container').append(table);
}

// Function to create rows for each entry based on available data
function renderEntryRow(entry) {
    let rows = '';

    // Check and add service entry row if exists
    if (entry.service) {
        rows += `
            <tr>
                <td>Servicio</td>
                <td>${entry.service.name}</td>
                <td>$${entry.service.price}</td>
            </tr>
        `;
    }

    // Check and add sparepart entry row if exists
    if (entry.sparepart) {
        rows += `
            <tr>
                <td>Repuesto</td>
                <td>${entry.sparepart.name}</td>
                <td>$${entry.sparepart.price}</td>
            </tr>
        `;
    }

    return rows;
}
