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

let currentDay = 1;

$(document).ready(() => {
    updateRobots();
    updateChargers();
    $('#buyRobot').on('click', (e) => {
        e.preventDefault();
        let robotId = $('#robots').val();
        console.log(robotId);
        $.ajax({
            url: '/api/addrobot',
            type: 'POST',
            data: {
                id: robotId
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

    $('#buyCharger').on('click', (e) => {
        e.preventDefault();
        let chargerId = $('#chargers').val();
        console.log(chargerId);
        $.ajax({
            url: '/api/addcharger',
            type: 'POST',
            data: {
                id: chargerId
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

    $('#simulate').on('click', (e) => {
        e.preventDefault();
        $.ajax({
            url: '/api/simulate',
            type: 'GET',
            success: (resp) => {
                console.log(resp);
                $('#log').html(resp.log.replace(/\n/g, '<br>'));
                updateRobots();
                updateChargers();
            },
            error: (err) => {
                console.log(err);
            },
        });
    });

    $('#generate').on('click', (e) => {
        e.preventDefault();
        $.ajax({
            url: '/api/importcargo',
            type: 'POST',
            data: {
                day: currentDay,
                amount: 2
            },
            success: (resp) => {
                console.log(resp);
                updateRobots();
                updateChargers();
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
        url: '/api/getrobots',
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
                            active: true
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
                            active: false
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
        url: '/api/getchargers',
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
                            active: true
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
                            active: false
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
