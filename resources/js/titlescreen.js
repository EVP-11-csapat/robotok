$(document).ready(() => {
    $('#buyRobot').on('click', (e) => {
        e.preventDefault();
        let data = $('#robots').val();
        console.log(data);
    })
})
