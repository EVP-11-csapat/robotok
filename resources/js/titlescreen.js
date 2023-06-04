let robotTemplate = `
<tr class="bg-white hover:bg-gray-50">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
        [ID]
    </th>
    <td class="px-6 py-4">
        [MODEL]
    </td>
    <td class="px-6 py-4">
        [ACTIVE]
    </td>
    <td class="px-6 py-4">
        [CHARGE]
    </td>
    <td class="px-6 py-4">
        [ACTIVEHOURS]
    </td>
    <td class="px-6 py-4 text-center">
        <button type="button" id="activateRobot[ID]"
            class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Activate</button>
        <button type="button" id="deactivateRobot[ID]"
            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Deactivate</button>
    </td>
</tr>
`;

let chargerTemplate = `
<tr class="bg-white hover:bg-gray-50">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
        [ID]
    </th>
    <td class="px-6 py-4">
        [MODEL]
    </td>
    <td class="px-6 py-4">
        [ACTIVE]
    </td>
    <td class="px-6 py-4">
        [CHARGING]
    </td>
    <td class="px-6 py-4">
        [ACTIVEHOURS]
    </td>
    <td class="px-6 py-4 text-center">
        <button type="button" id="activateCharger[ID]"
            class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Activate</button>
        <button type="button" id="deactivateCharger[ID]"
            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Deactivate</button>
    </td>
</tr>
`;

let templaetTemplate = `
<tr class="bg-white hover:bg-gray-50">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
        [ID]
    </th>
    <td class="px-6 py-4">
        [NAME]
    </td>
    <td class="px-6 py-4">
        [PERISHABLE]
    </td>
</tr>
`;

let generatedTemplate = `
<tr class="bg-white hover:bg-gray-50">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
        [ID]
    </th>
    <td class="px-6 py-4">
        [NAME]
    </td>
    <td class="px-6 py-4">
        [PERISHABLE]
    </td>
    <td class="px-6 py-4">
        [ARRIVAL]
    </td>
    <td class="px-6 py-4">
        [REMAINING]
    </td>
</tr>
`;

let logTemplate = `
<tr class="bg-white border-b">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
        [HOUR]
    </th>
    <td class="px-6 py-4">
        [PACKING]
    </td>
    <td class="px-6 py-4">
        [CHARGING]
    </td>
    <td class="px-6 py-4">
        [DEPLETED]
    </td>
    <td class="px-6 py-4">
        [CHARGED]
    </td>
</tr>
`;

let currentDay = 0;
let id;

function checkAndGenerateCargo(id) {
    $.ajax({
        url: '/api/checkandgeneratecargo',
        type: 'POST',
        data: {
            id: id
        },
        success: (resp) => {
            console.log(resp);
        },
        error: (err) => {
            console.log(err);
        }
    });
}

function countAndRemoveDuplicates(arr) {
    const counts = {};
    const result = [];

    arr.forEach((obj) => {
        const key = JSON.stringify(obj);
        counts[key] = (counts[key] || 0) + 1;
    });

    Object.keys(counts).forEach((key) => {
        const obj = JSON.parse(key);
        obj.count = counts[key];
        result.push(obj);
    });

    return result;
}

const printLog = (log) => {
    let currentHour = 0;
    let logTableBody = $('#logTableBody');
    logTableBody.empty();
    console.log("STARTING LOG");
    log.forEach((hour) => {
        // console.log(hour);
        let useCargo = "";
        let useCharges = "";
        let useChargedRobots = "";
        let useDepletedRobots = "";

        if (!hour.cargo) {
            useCargo = "-";
        } else if (hour.cargo.length > 0) {
            // TODO: count duplicates
            // let cargo = hour.cargo;
            let cargo = countAndRemoveDuplicates(hour.cargo);
            cargo.forEach((cargo) => {
                useCargo += `${cargo.robotModel} 📦🚜 ${cargo.cargoName} (${cargo.count ? 'x' + cargo.count : 'x1'})<br>`;
            });
            console.log(useCargo);
        }
        if (!hour.charges) {
            useCharges = "-";
        } else if (hour.charges.length > 0) {
            // let charges = hour.charges;
            let charges = countAndRemoveDuplicates(hour.charges);
            charges.forEach((charge) => {
                useCharges += `${charge.chargerModel} 🔌 ${charge.robotModel} (${charge.count ? 'x' + charge.count : 'x1'})<br>`;
            });
        }
        if (!hour.chargedRobots) {
            useChargedRobots = "-";
        } else if (hour.chargedRobots.length > 0) {
            let chargedRobots = hour.chargedRobots;
            chargedRobots.forEach((robot) => {
                useChargedRobots += `${robot.robotModel} 🚜🔋<br>`;
            });
        }
        if (!hour.depletedRobots) {
            useDepletedRobots = "-";
        } else if (hour.depletedRobots.length > 0) {
            let depletedRobots = hour.depletedRobots;
            depletedRobots.forEach((robot) => {
                useDepletedRobots += `${robot.robotModel} 🚜⛽🚨<br>`;
            });
        }

        let logRow = logTemplate.replace('[HOUR]', currentHour)
            .replace('[PACKING]', useCargo)
            .replace('[CHARGING]', useCharges)
            .replace('[DEPLETED]', useDepletedRobots)
            .replace('[CHARGED]', useChargedRobots);
        logTableBody.append(logRow);
        currentHour++;
    });
    console.log("ENDING LOG");
};

jQuery(() => {
    if (!window.location.pathname.startsWith('/simulation/')) return;
    id = $('#simulationID').text();
    checkAndGenerateCargo(id);
    updateRobots();
    updateChargers();
    updateTempateTable();
    updateGeneratedTable();
    updateSimulationButton();
    $('#buyRobot').on('click', (e) => {
        e.preventDefault();
        let robotId = $('#robots').val();
        console.log(robotId);
        $.ajax({
            url: '/api/addrobot',
            type: 'POST',
            data: {
                id: robotId,
                simulationId: id
            },
            success: (resp) => {
                console.log(resp);
                updateRobots();
                updateSimulationButton();
            },
            error: (err) => {
                console.log(err);
            }
        });
    });

    $('#buyCharger').on('click', (e) => {
        e.preventDefault();
        let chargerId = $('#chargers').val();
        console.log(chargerId);
        $.ajax({
            url: '/api/addcharger',
            type: 'POST',
            data: {
                id: chargerId,
                simulationId: id
            },
            success: (resp) => {
                console.log(resp);
                updateChargers();
                updateSimulationButton();
            },
            error: (err) => {
                console.log(err);
            }
        });
    });

    $('#simulate').on('click', (e) => {
        e.preventDefault();
        $.ajax({
            url: '/api/simulate/' + id,
            type: 'GET',
            success: (resp) => {
                console.log(resp);
                printLog(resp.data);
                currentDay = currentDay + 1;
                updateRobots();
                updateChargers();
                updateGeneratedTable();
                updateSimulationButton();
            },
            error: (err) => {
                console.log(err);
            },
        });
    });

    $('#generate').on('click', (e) => {
        let amount = $('#numberofstuff').val();
        if (amount < 1) amount = 1;
        if (amount > 100) amount = 100;
        e.preventDefault();
        $.ajax({
            url: '/api/importcargo',
            type: 'POST',
            data: {
                day: currentDay,
                amount: amount,
                simulationId: id
            },
            success: (resp) => {
                console.log(resp);
                // updateRobots();
                // updateChargers();
                updateGeneratedTable();
            },
            error: (err) => {
                console.log(err);
            },
        });
    });
});

const updateRobots = () => {
    let robotTable = $('#robotTable')
    let robotTableBody = $('#robotTable > tbody');
    robotTableBody.empty();
    $.ajax({
        url: '/api/getrobots/' + id,
        type: 'GET',
        success: (resp) => {
            console.log(resp);
            resp.forEach(robot => {
                let row = robotTemplate.replace('[ID]', robot.id)
                    .replace('[ID]', robot.id)
                    .replace('[ID]', robot.id)
                    .replace('[MODEL]', robot.model)
                    .replace('[ACTIVE]', robot.active ? 'Active' : 'Inactive')
                    .replace('[CHARGE]', robot.charge)
                    .replace('[ACTIVEHOURS]', robot.active_hours);
                robotTableBody.append(row);
                $(`#activateRobot${robot.id}`).on('click', (e) => {
                    console.log(`Activate ${robot.id}`);
                    $.ajax({
                        url: '/api/activaterobot',
                        type: 'POST',
                        data: {
                            id: robot.id,
                            active: true,
                        },
                        success: (resp) => {
                            console.log(resp);
                            updateRobots();
                        },
                        error: (err) => {
                            console.log(err);
                        }
                    });
                });
                $(`#deactivateRobot${robot.id}`).on('click', (e) => {
                    console.log(`Deactivate ${robot.id}`);
                    $.ajax({
                        url: '/api/activaterobot',
                        type: 'POST',
                        data: {
                            id: robot.id,
                            active: false,
                        },
                        success: (resp) => {
                            console.log(resp);
                            updateRobots();
                        },
                        error: (err) => {
                            console.log(err);
                        }
                    });
                });
            });
        },
        error: (err) => {
            console.log(err);
        }
    });
};

const updateChargers = () => {
    let chargerTable = $('#chargerTable')
    let chargerTableBody = $('#chargerTable > tbody');
    chargerTableBody.empty();
    $.ajax({
        url: '/api/getchargers/' + id,
        type: 'GET',
        success: (resp) => {
            console.log(resp);
            resp.forEach(charger => {
                let row = chargerTemplate.replace('[ID]', charger.id)
                    .replace('[ID]', charger.id)
                    .replace('[ID]', charger.id)
                    .replace('[MODEL]', charger.model)
                    .replace('[ACTIVE]', charger.active ? 'Active' : 'Inactive')
                    .replace('[CHARGING]', charger.chargee)
                    .replace('[ACTIVEHOURS]', charger.active_hours);
                chargerTableBody.append(row);
                $(`#activateCharger${charger.id}`).on('click', (e) => {
                    console.log(`Activate ${charger.id}`);
                    $.ajax({
                        url: '/api/activatecharger',
                        type: 'POST',
                        data: {
                            id: charger.id,
                            active: true,
                        },
                        success: (resp) => {
                            console.log(resp);
                            updateChargers();
                        },
                        error: (err) => {
                            console.log(err);
                        }
                    });
                });
                $(`#deactivateCharger${charger.id}`).on('click', (e) => {
                    console.log(`Deactivate ${charger.id}`);
                    $.ajax({
                        url: '/api/activatecharger',
                        type: 'POST',
                        data: {
                            id: charger.id,
                            active: false,
                        },
                        success: (resp) => {
                            console.log(resp);
                            updateChargers();
                        },
                        error: (err) => {
                            console.log(err);
                        }
                    });
                });
            });
        },
        error: (err) => {
            console.log(err);
        }
    });
};

const updateTempateTable = () => {
    let templateTable = $('#templateTable')
    let templateTableBody = $('#templateTable > tbody');
    templateTableBody.empty();
    $.ajax({
        url: '/api/getcargotemplates/' + id,
        type: 'GET',
        success: (resp) => {
            console.log(resp);
            resp.data.forEach(template => {
                let row = templaetTemplate.replace('[ID]', template.id)
                    .replace('[NAME]', template.name)
                    .replace('[PERISHABLE]', template.perishable ? 'Yes' : 'No');
                templateTableBody.append(row);
            });
        },
        error: (err) => {
            console.log(err);
        }
    });
};

const updateGeneratedTable = () => {
    let generatedTable = $('#generatedTable')
    let generatedTableBody = $('#generatedTable > tbody');
    generatedTableBody.empty();
    $.ajax({
        url: '/api/getgeneratedcargo/' + id,
        type: 'GET',
        success: (resp) => {
            console.log(resp);
            resp.data.forEach(cargo => {
                let row = generatedTemplate.replace('[ID]', cargo.id)
                    .replace('[NAME]', cargo.name)
                    .replace('[PERISHABLE]', cargo.perishable ? 'Yes' : 'No')
                    .replace('[ARRIVAL]', cargo.arrival_day)
                    .replace('[REMAINING]', cargo.remaining_count);
                generatedTableBody.append(row);
            });
        },
        error: (err) => {
            console.log(err);
        }
    });
};

const updateSimulationButton = () => {
    // get current day
    console.log('ID: ' + id);
    $.ajax({
        url: '/api/getcurrentday/' + id,
        type: 'GET',
        success: (resp) => {
            console.log(resp);
            currentDay = resp;

            $.ajax({
                url: '/api/getcurrentbal/' + id,
                type: 'GET',
                success: (resp) => {
                    console.log(resp);

                    $('#simulate').text(`Simulate Day ${currentDay} - $${(resp * 100) / 100}`)
                },
                error: (err) => {
                    console.log(err);
                }
            })
        },
        error: (err) => {
            console.log(err);
        }
    });
};
