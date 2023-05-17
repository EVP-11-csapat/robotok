let cargoData = [];
let cargoTableBody;

jQuery(() => {
    if (window.location.pathname != '/create') return;
    cargoTableBody = $('#cargoTable');

    $('#cancelButton').on('click', () => {
        window.location.replace('/');
    });

    $('#submitButton').on('click', () => {
        $.ajax({
            url: '/api/createSimulation',
            type: 'POST',
            data: {
                cargoData: cargoData,
                shouldGenerateCargo: cargoData.length == 0,
            },
            success: (data) => {
                console.log(data);
                window.location.replace('/simulation/' + data.id);
            },
            error: (data) => {
                console.log(data);
            }
        });
    });

    $('#createForm').on('submit', (e) => {
        e.preventDefault();
    });
    $('#addCargoButton').on('click', (e) => {
        e.preventDefault();
        let name = $('#name').val();
        if (name == '') return;
        let perishable = $('#perishable').is(':checked');
        let cargo = {
            name: name,
            perishable: perishable ? 1 : 0,
        };
        cargoData.push(cargo);
        updateCargoTable();
        $('#name').val('');
        $('#perishable').prop('checked', false);
    });
});

let tableRowTemplate = `
<tr>
    <td class="px-4 py-2 border">[NAME]</td>
    <td class="px-4 py-2 border">[PERISHABLE]</td>
    <td class="px-4 py-2 border">
        <button class="text-red-500 hover:text-red-700" id="CARGOBUTTON[INDEX]">DELETE</button>
    </td>
</tr>
`

const updateCargoTable = () => {
    cargoTableBody.empty();
    cargoData.forEach((cargo, index) => {
        let cargoRow = tableRowTemplate.replace('[NAME]', cargo.name)
                        .replace('[PERISHABLE]', cargo.perishable ? 'Yes' : 'No')
                        .replace('[INDEX]', index);
        cargoTableBody.append(cargoRow);
        $(`#CARGOBUTTON${index}`).on('click', () => {
            cargoData.splice(index, 1);
            updateCargoTable();
        });
    });
};
