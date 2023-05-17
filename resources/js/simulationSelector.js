jQuery(() => {
    if (window.location.pathname != '/') return;
    $('#newSimulation').on('click', () => {
        window.location.replace('/create');
    });
    $('#joinSimulation').on('click', () => {
        let id = $('#simulation').val();
        window.location.replace('/simulation/' + id);
    });
});
