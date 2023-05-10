$(document).ready(() => {
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
            },
            error: (err) => {
                console.log(err);
            }
        });
    });
});
