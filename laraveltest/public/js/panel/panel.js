/*CONTANTES*/
const BTN_GENERAR_FACTURA = document.getElementById("btngenerar");
const TBODY_TABLA_FACTURAS = document.getElementById("bodyTableFacturas");

/*EVENTOS*/
BTN_GENERAR_FACTURA.addEventListener("click", function () {
    fetch("panel/generar_factura_pendiente", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "x-csrf-token": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({}),
    })
        .then((response) => response.json())
        .then((data) => {
            const FACTURAS = data;

            if (FACTURAS.length > 0) {
                let fragment = document.createDocumentFragment();
                for (const factura of FACTURAS) {
                    let fecha = new Date(factura.created_at);
                    let dia = fecha.getDate();
                    // mes formato mm
                    let mes = fecha.getMonth() + 1;
                    let anio = fecha.getFullYear();
                    let hora = fecha.getHours();
                    let minutos = fecha.getMinutes();
                    let ampm = hora >= 12 ? "pm" : "am";
                    hora = hora % 12;
                    hora = hora ? hora : 12;
                    minutos = minutos < 10 ? "0" + minutos : minutos;

                    let strTime =
                        dia +
                        "/" +
                        mes +
                        "/" +
                        anio +
                        " " +
                        hora +
                        ":" +
                        minutos +
                        " " +
                        ampm;

                    let tr = document.createElement("tr");
                    tr.innerHTML = `
                        <th>${factura.id}</th>
                        <td>${factura.user.name}</td>
                        <td>${factura.estado}</td>
                        <td>${strTime}</td>
                        <td>
                            <a href="panel/factura/${factura.id}" class="btn btn-primary btn-sm">Ver</a>
                        </td>
                        `;

                    fragment.appendChild(tr);
                }
                TBODY_TABLA_FACTURAS.innerHTML = "";
                TBODY_TABLA_FACTURAS.appendChild(fragment);
            } else {
                console.log("No hay facturas pendientes");
            }
        });
});
